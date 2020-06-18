<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emergency extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Emergency_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }

    }

    public function index()
    {

        $data['folder'] = 'emergency';
        $data['page'] = 'Emergency';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        $row = $this->db->query("select e.id, e.is_closed, u.nama, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt, e.insert_date 
        from emergency e 
        left join user u on e.user_id = u.user_id
        left join unit un on u.idunit = un.id_unit
        left join gedung g on un.id_gedung = g.id_gedung
        left join apartemen a on g.id_apt = a.id_apt
        where e.id = '$id'
        ")->row();
        if ($row->is_closed == '0') {
            $is_closed = 'Dalam Pengerjaan';
        } else {
            $is_closed = 'Selesai';
        }

        $data = array(
            'id' => set_value('id', $row->id),
            'is_closed' => set_value('is_closed', $is_closed),
            'email' => set_value('email', $row->email),
            'nama' => set_value('nama', $row->nama),
            'nomor' => set_value('nomor', $row->nomor),
            'lantai' => set_value('lantai', $row->lantai),
            'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'insert_date' => set_value('insert_date', $row->insert_date),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Emergency/update_action/"' . $id . '"',
            'page' => 'Emergency View',
            'folder' => 'emergency',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function selesai($id)
    {
        $row = $this->Emergency_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_closed' => '1',
            );
            $this->Emergency_model->update($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Emergency'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Emergency'));
        }
    }

    function get_data_emergency()
    {
        $list = $this->Emergency_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->is_closed == '0') {
                $is_closed = 'Dalam Pengerjaan';
            } else {
                $is_closed = 'Selesai';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->nama_unit;
            $row[] = $field->nomor;
            $row[] = $field->lantai;
            $row[] = $field->nama_gedung;
            $row[] = $field->nama_apt;
            $row[] = $field->insert_date;
            $row[] = $is_closed;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Emergency/read/' . $field->id . '">
                                        <i class="icon-eye"></i> Lihat Detail </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->id . '); return false;">
                                        <i class="icon-pencil"></i> Selesai </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Emergency_model->count_all(),
            "recordsFiltered" => $this->Emergency_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
