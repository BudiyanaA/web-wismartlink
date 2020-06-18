<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Room_service extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Room_service_model');
        $this->load->model('Apartemen_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'room_service';
        $data['page'] = 'Room Service';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function selesai($id)
    {
        $row = $this->Room_service_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'Finished',
            );
            // var_dump($data);die();
            $this->Apartemen_model->update('id', $row->id, $data, 'request_room_service');
            $this->session->set_flashdata('success', 'Update Success');
            redirect(base_url('index.php/Room_service'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Room_service'));
        }
    }

    public function read($id)
    {
        $row = $this->Room_service_model->get_by_id($id);
        if ($row->is_paid == '1') {
            $lunas = 'Lunas';
        } else {
            $lunas = 'Belum Lunas';
        }
        $request_date = $row->request_date;
        $get_nama_penghuni = $this->db->query("select * from user where user_id = '" . $row->id_user . "'")->row();
        $get_nama_apt = $this->db->query("select * from apartemen where id_apt = '" . $get_nama_penghuni->user_id . "'")->row();
        $get_unit = $this->db->query("select * from unit where id_unit = '" . $get_nama_penghuni->idunit . "'")->row();
        $get_nama_gedung = $this->db->query("select * from gedung where id_gedung = '" . $get_unit->id_gedung . "'")->row();
        $alamat = 'Apartemen ' . $get_nama_apt->nama_apt . ', Gedung ' . $get_nama_gedung->nama_gedung . ', ' . $get_unit->nama_unit . ', Lantai ' . $get_unit->lantai . ', Nomor ' . $get_unit->nomor;
        $data = array(
            'id' => set_value('id', $row->id),
            'request' => set_value('request', $row->request),
            'nama' => set_value('nama', $get_nama_penghuni->nama),
            'alamat' => set_value('alamat', $alamat),
            'request_date' => set_value('request_date', $request_date),
            'is_paid' => set_value('is_paid', $lunas),
            'status' => set_value('status', $row->status),
            'charge' => set_value('charge', $row->charge),
            'invoice_no' => set_value('invoice_no', $row->invoice_no),
            'tanggal_bayar' => set_value('tanggal_bayar', $row->tanggal_bayar),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Room_service/update_action/"' . $id . '"',
            'page' => 'Room Service View',
            'folder' => 'room_service',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }



    function get_data()
    {
        $list = $this->Room_service_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->is_paid == '1') {
                $lunas = 'Lunas';
            } else {
                $lunas = 'Belum Lunas';
            }
            $tanggal_sewa = $field->request_date;
            $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->request;
            $row[] = $field->nama;
            $row[] = $alamat;
            $row[] = $tanggal_sewa;
            $row[] = $field->status;


            if ($field->status == 'Submitted') {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Room_service/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a onclick="selesai(' . $field->id . '); return false;">
                                <i class="icon-check"></i> Selesai </a>
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
                            <a href="' . base_url() . 'index.php/Room_service/read/' . $field->id . '">
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
            "recordsTotal" => $this->Room_service_model->count_all(),
            "recordsFiltered" => $this->Room_service_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('comment', 'comment', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
