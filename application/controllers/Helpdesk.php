<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helpdesk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Ticket_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'helpdesk';
        $data['page'] = 'Helpdesk';
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
        from ticket
        ")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'id_user' => set_value('id_user', $row->id_user),
            'kode_tiket' => set_value('kode_tiket', $row->kode_tiket),
            'keterangan' => set_value('keterangan', $row->keterangan),
            'level' => set_value('level', $row->level),
            'status' => set_value('status', $row->status),
            'pic_id' => set_value('pic_id', $row->pic_id),
            // 'lantai' => set_value('lantai', $row->lantai),
            // 'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            // 'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Restaurant/update_action/"' . $id . '"',
            'page' => 'Helpdesk View',
            'folder' => 'helpdesk',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function approve($id)
    {
        $row = $this->Restaurant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_approve' => '1',
            );
            // var_dump($id);
            // die();
            $this->Restaurant_model->update($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Restaurant'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Restaurant'));
        }
    }

    function get_data()
    {
        $list = $this->Ticket_model->get_datatables();
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
            if ($field->pic_id != NULL || $field->pic_id != "") {
                $get_nama_staff = $this->db->query("select * from support_staff where id = '" . $field->pic_id . "'")->row();
                $nama_staff = $get_nama_staff->nama_staff;
            } else {
                $nama_staff = '';
            }

            // $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            // $pic = '<img src=' . $field->img . ' width="45%">';
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->kode_tiket;
            $row[] = $field->keterangan;
            $row[] = $field->level;
            $row[] = $field->status;
            $row[] = $nama_staff;

            $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Helpdesk/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Ticket_model->count_all(),
            "recordsFiltered" => $this->Ticket_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
