<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Ticket_model');
        $this->load->model('Apartemen_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Ticket_model->get_all()->result();
        $data['folder'] = 'ticket';
        $data['page'] = 'Ticket';
        $data['page_name'] = 'index';

        $data['new'] = $this->db->query("select COUNT(*) as newCount from ticket where status = 'New'")->row('newCount');
        $data['processed'] = $this->db->query("select COUNT(*) as newCount from ticket where status = 'Processed'")->row('newCount');
        $data['completed'] = $this->db->query("select COUNT(*) as newCount from ticket where status = 'Selesai'")->row('newCount');
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        $row = $this->Ticket_model->get_by_id($id);
        if ($row->pic_id != NULL || $row->pic_id != "") {
            $get_nama_staff = $this->db->query("select * from support_staff where id = '" . $row->pic_id . "'")->row();
            $nama_staff = $get_nama_staff->nama_staff;
        } else {
            $nama_staff = '';
        }
        $get_message_tiket = $this->db->query("select * from ticket_message where ticket_id = '" . $id . "' order by id asc limit 1")->row();
        if ($get_message_tiket == NULL || $get_message_tiket == "") {
            $message = "";
            $id_message = "";
        } else {
            $message = $get_message_tiket->message;
            $id_message = $get_message_tiket->id;
        }
        $get_nama_penghuni = $this->db->query("select * from user where user_id = '" . $row->id_user . "'")->row();
        $get_nama_apt = $this->db->query("select * from apartemen where id_apt = '" . $get_nama_penghuni->user_id . "'")->row();
        $get_unit = $this->db->query("select * from unit where id_unit = '" . $get_nama_penghuni->idunit . "'")->row();
        $get_nama_gedung = $this->db->query("select * from gedung where id_gedung = '" . $get_unit->id_gedung . "'")->row();
        $get_staff = $this->db->query("select * from support_staff")->result();
        $alamat = 'Apartemen ' . $get_nama_apt->nama_apt . ', Gedung ' . $get_nama_gedung->nama_gedung . ', ' . $get_unit->nama_unit . ', Lantai ' . $get_unit->lantai . ', Nomor ' . $get_unit->nomor;
        $data = array(
            'get_staff' => $get_staff,
            'id' => set_value('id', $row->id),
            'created_date' => set_value('created_date', $row->created_date),
            'message' => set_value('message', $message),
            'id_message_ticket' => set_value('id_message_ticket', $id_message),
            'kode_tiket' => set_value('kode_tiket', $row->kode_tiket),
            'nama_staff' => set_value('nama_staff', $nama_staff),
            'keterangan' => set_value('keterangan', $row->keterangan),
            'nama' => set_value('nama', $get_nama_penghuni->nama),
            'email' => set_value('nama', $get_nama_penghuni->email),
            'img' => set_value('nama', base_url() . $get_nama_penghuni->img),
            'alamat' => set_value('alamat', $alamat),
            'status' => set_value('status', $row->status),
            'level' => set_value('level', $row->level),
            'pic_id' => set_value('pic_id', $row->pic_id),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Ticket/update_action/"' . $id . '"',
            'page' => 'Ticket View',
            'folder' => 'ticket',
            'page_name' => 'detail',
        );

        $data['new'] = $this->db->query("select COUNT(*) as newCount from ticket where status = 'New'")->row('newCount');
        $data['processed'] = $this->db->query("select COUNT(*) as newCount from ticket where status = 'Processed'")->row('newCount');
        $data['completed'] = $this->db->query("select COUNT(*) as newCount from ticket where status = 'Selesai'")->row('newCount');
        $this->load->view('template/index', $data);
    }

    public function pilih_teknisi($id)
    {
        $row = $this->Ticket_model->get_by_id($id);
        $get_teknisi = $this->db->query("select * from teknisi")->result();
        $data = array(
            'id' => set_value('id', $id),
            'id_teknisi' => set_value('id_teknisi'),
            'get_teknisi' => $get_teknisi,
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Maintenance/update_action/"' . $id . '"',
            'page' => 'Maintenance View',
            'folder' => 'maintenance',
            'page_name' => 'pilih_teknisi',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        // var_dump($this->input->post('pic_id', TRUE));
        // die();
        $data = array(
            'status' => 'Processed',
            'pic_id' => $this->input->post('pic_id', TRUE),
        );
        $this->Apartemen_model->update('id', $this->input->post('id', TRUE), $data, 'ticket');
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(base_url('index.php/Ticket'));
    }
    public function accept($id)
    {
        $row = $this->Ticket_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'Accepted',
            );
            // var_dump($data);die();
            $this->Apartemen_model->update('id', $row->id, $data, 'request_maintenance');
            $this->session->set_flashdata('success', 'Update Success');
            redirect(base_url('index.php/Maintenance'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Maintenance'));
        }
    }


    function get_data()
    {
        $list = $this->Ticket_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $get_user = $this->db->query("select * from user where user_id = '$field->id_user'")->row();
            $no++;
            if ($field->pic_id != NULL || $field->pic_id != "") {
                $get_nama_staff = $this->db->query("select * from support_staff where id = '" . $field->pic_id . "'")->row();
                $nama_staff = $get_nama_staff->nama_staff;
            } else {
                $nama_staff = '';
            }

            $row = array();
            $row[] = $no;
            $row[] = $field->kode_tiket;
            $row[] = $field->keterangan;
            $row[] = $get_user->nama;
            $row[] = $field->created_date;
            $row[] = $nama_staff;
            $row[] = $get_user->email;
            
            if ($field->status == 'New') {
                $row[] = '<span class="label label-sm label-warning"> ' . $field->status . ' </span>';
            } else if ($field->status == 'Processed') {
                $row[] = '<span class="label label-sm label-info"> ' . $field->status . ' </span>';
            } else {
                $row[] = '<span class="label label-sm label-success"> ' . $field->status . ' </span>';
            }

            if ($field->status == 'Submitted') {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Ticket/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a onclick="accept(' . $field->id . '); return false;">
                                <i class="icon-check"></i> Accept </a>
                        </li>
                    </ul>
                </div>
            </td>';
            } else {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Ticket/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            }
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
