<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
        $this->load->model('Scan_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'scan';
        $data['page'] = 'Scan';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        // $row = $this->db->query("select e.id, e.img, u.nama, e.nama_resto, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt
        // from restaurant e 
        // left join user u on e.id_user = u.user_id
        // left join unit un on u.idunit = un.id_unit
        // left join gedung g on un.id_gedung = g.id_gedung
        // left join apartemen a on g.id_apt = a.id_apt
        // where e.id = '$id'
        // ")->row();

        $row = $this->db->query("select *
        from absensi
        ")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'user_id' => set_value('user_id', $row->user_id),
            'fasilitas_id' => set_value('fasilitas_id', $row->fasilitas_id),
            'time' => set_value('time', $row->time),
            // 'nama_resto' => set_value('nama_resto', $row->nama_resto),
            // 'nomor' => set_value('nomor', $row->nomor),
            // 'lantai' => set_value('lantai', $row->lantai),
            // 'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            // 'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Restaurant/update_action/"' . $id . '"',
            'page' => 'Scan View',
            'folder' => 'scan',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function approve($id)
    {
        $row = $this->Scan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_approve' => '1',
            );
            // var_dump($id);
            // die();
            $this->Scan_model->update($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Restaurant'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Restaurant'));
        }
    }

    function get_data()
    {
        $list = $this->Scan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            // if ($field->is_approve != '1') {
            //     $approve = '
            //     <li><a onclick="approve(' . $field->id . '); return false;">
            //     <i class="fa fa-check"></i> Approve </a></li>
            //     ';

            //     $status = 'Pending';
            // } else {
            //     $approve = '';
            //     $status = 'Approved';
            // }

            // $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            // $pic = '<img src=' . $field->img . ' width="45%">';
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->fasilitas;
            $row[] = longdate_indo(substr($field->time, 0, 10))." pada ".substr($field->time, 11, 8);

            $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Scan/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Scan_model->count_all(),
            "recordsFiltered" => $this->Scan_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
