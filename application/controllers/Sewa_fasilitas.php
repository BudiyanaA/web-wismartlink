<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sewa_fasilitas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Sewa_fasilitas_model');
        $this->load->model('Apartemen_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'sewa_fasilitas';
        $data['page'] = 'Sewa Fasilitas';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_fasilitas = $this->db->query("select * from fasilitas_gedung")->result();
        $data = array(
            'get_users' => $get_users,
            'get_fasilitas' => $get_fasilitas,
            'id' => set_value('id'),
            'fasilitas_id' => set_value('fasilitas_id'),
            'id_user' => set_value('id_user'),
            // 'tanggal_sewa' => set_value('tanggal_sewa'),
            'tanggal_mulai_sewa' => set_value('tanggal_mulai_sewa'),
            'tanggal_selesai_sewa' => set_value('tanggal_selesai_sewa'),
            'is_paid' => set_value('is_paid'),
            'status' => set_value('status'),
            'biaya' => set_value('biaya', 0),
            'invoice_no' => set_value('invoice_no'),
            'tanggal_bayar' => set_value('tanggal_bayar'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Sewa_fasilitas/create_action',
            'page' => 'Sewa Fasilitas Add',
            'folder' => 'sewa_fasilitas',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function create_action()
    {
        $data = array(
            'fasilitas_id' => $this->input->post('fasilitas', TRUE),
            'id_user' => $this->input->post('user', TRUE),
            'request_start' => $this->input->post('tanggal_mulai_sewa', TRUE),
            'request_end' => $this->input->post('tanggal_selesai_sewa', TRUE),
            'is_paid' => $this->input->post('is_paid', TRUE),
            'status' => $this->input->post('status', TRUE),
            'biaya' => $this->input->post('biaya', TRUE),
            'invoice_no' => $this->input->post('invoice_no', TRUE),
            'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
        );
        $simpan = $this->Sewa_fasilitas_model->insert($data);

        if ($simpan) {
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(base_url('index.php/Sewa_fasilitas'));
        } else {
            $this->session->set_flashdata('error', 'Failed to Saved Data');
            $this->create();
        }
    }

    public function update($id)
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_fasilitas = $this->db->query("select * from fasilitas_gedung")->result();
        $row = $this->Sewa_fasilitas_model->get_by_id($id);
        if ($row->is_paid == '1') {
            $lunas = 'Lunas';
        } else {
            $lunas = 'Belum Lunas';
        }
        $row->tanggal_bayar?$tanggal_bayar=$row->tanggal_bayar:$tanggal_bayar='0000-00-00 00:00:00';
        $data = array(
            'get_users' => $get_users,
            'get_fasilitas' => $get_fasilitas,
            'id' => set_value('id', $row->id),
            'fasilitas_id' => set_value('fasilitas_id', $row->fasilitas_id),
            'id_user' => set_value('id_user', $row->id_user),
            // 'tanggal_sewa' => set_value('tanggal_sewa', $tanggal_sewa),
            'tanggal_mulai_sewa' => set_value('tanggal_mulai_sewa', date('Y-m-d\TH:i:s', strtotime($row->request_start))),
            'tanggal_selesai_sewa' => set_value('tanggal_selesai_sewa', date('Y-m-d\TH:i:s', strtotime($row->request_end))),
            'is_paid' => set_value('is_paid', $lunas),
            'status' => set_value('status', $row->status),
            'biaya' => set_value('biaya', $row->biaya),
            'invoice_no' => set_value('invoice_no', $row->invoice_no),
            'tanggal_bayar' => set_value('tanggal_bayar', date('Y-m-d\TH:i:s', strtotime($tanggal_bayar))),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Sewa_fasilitas/update_action/"' . $id . '"',
            'page' => 'Sewa Fasilitas Update',
            'folder' => 'sewa_fasilitas',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'fasilitas_id' => $this->input->post('fasilitas', TRUE),
            'id_user' => $this->input->post('user', TRUE),
            'request_start' => $this->input->post('tanggal_mulai_sewa', TRUE),
            'request_end' => $this->input->post('tanggal_selesai_sewa', TRUE),
            'is_paid' => $this->input->post('is_paid', TRUE),
            'status' => $this->input->post('status', TRUE),
            'biaya' => $this->input->post('biaya', TRUE),
            'invoice_no' => $this->input->post('invoice_no', TRUE),
            'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
        );

        $this->Apartemen_model->update('id', $this->input->post('id', TRUE), $data, 'request_fasilitas');
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Sewa_fasilitas'));
        
    }

    public function read($id)
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_fasilitas = $this->db->query("select * from fasilitas_gedung")->result();
        $row = $this->Sewa_fasilitas_model->get_by_id($id);
        if ($row->is_paid == '1') {
            $lunas = 'Lunas';
        } else {
            $lunas = 'Belum Lunas';
        }
        $tanggal_sewa = $row->request_start . ' - ' . $row->request_end;
        $row->tanggal_bayar?$tanggal_bayar=$row->tanggal_bayar:$tanggal_bayar='0000-00-00 00:00:00';
        $get_nama_penghuni = $this->db->query("select * from user where user_id = '" . $row->id_user . "'")->row();    
        $get_unit = $this->db->query("select * from unit join gedung on gedung.id_gedung = unit.id_gedung where id_unit = '" . $get_nama_penghuni->idunit . "'")->row();
        $get_nama_apt = $this->db->query("select * from apartemen where id_apt = '" . $get_unit->id_apt . "'")->row();
        $get_nama_gedung = $this->db->query("select * from gedung where id_gedung = '" . $get_unit->id_gedung . "'")->row();
        $alamat = 'Apartemen ' . $get_nama_apt->nama_apt . ', Gedung ' . $get_nama_gedung->nama_gedung . ', ' . $get_unit->nama_unit . ', Lantai ' . $get_unit->lantai . ', Nomor ' . $get_unit->nomor;
        
        $data = array(
            'get_users' => $get_users,
            'get_fasilitas' => $get_fasilitas,
            'id' => set_value('id', $row->id),
            'fasilitas_id' => set_value('fasilitas_id', $row->fasilitas_id),
            'id_user' => set_value('id_user', $row->id_user),
            'alamat' => set_value('alamat', $alamat),
            // 'tanggal_sewa' => set_value('tanggal_sewa', $tanggal_sewa),
            'tanggal_mulai_sewa' => set_value('tanggal_mulai_sewa', date('Y-m-d\TH:i:s', strtotime($row->request_start))),
            'tanggal_selesai_sewa' => set_value('tanggal_selesai_sewa', date('Y-m-d\TH:i:s', strtotime($row->request_end))),
            'is_paid' => set_value('is_paid', $lunas),
            'status' => set_value('status', $row->status),
            'biaya' => set_value('biaya', $row->biaya),
            'invoice_no' => set_value('invoice_no', $row->invoice_no),
            'tanggal_bayar' => set_value('tanggal_bayar', date('Y-m-d\TH:i:s', strtotime($tanggal_bayar))),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Sewa_fasilitas/update_action/"' . $id . '"',
            'page' => 'Sewa Fasilitas View',
            'folder' => 'sewa_fasilitas',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Sewa_fasilitas_model->get_by_id($id);

        if ($row) {
            $this->Sewa_fasilitas_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Sewa_fasilitas'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Sewa_fasilitas'));
        }
    }

    public function accept($id)
    {
        $row = $this->Sewa_fasilitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'Accept',
            );
            // var_dump($data);die();
            $this->Apartemen_model->update('id', $row->id, $data, 'request_fasilitas');
            $this->session->set_flashdata('success', 'Update Success');
            redirect(base_url('index.php/Sewa_fasilitas'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Sewa_fasilitas'));
        }
    }

    public function reject($id)
    {
        $row = $this->Sewa_fasilitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'Rejected',
            );
            $this->Apartemen_model->update('id', $row->id, $data, 'request_fasilitas');
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Sewa_fasilitas'));
        } else {
            $this->session->set_flashdata('error', 'Update Failed');
            redirect(base_url('index.php/Sewa_fasilitas'));
        }
    }

    function get_data_sewa_fasilitas()
    {
        $list = $this->Sewa_fasilitas_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->is_paid == '1') {
                $lunas = 'Lunas';
            } else {
                $lunas = 'Belum Lunas';
            }
            $tanggal_sewa = $field->request_start . ' - ' . $field->request_end;
            $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->fasilitas;
            $row[] = $field->nama;
            $row[] = $alamat;
            $row[] = $tanggal_sewa;
            $row[] = $field->status;
            $row[] = $lunas;
            if ($field->status == 'Submitted') {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Sewa_fasilitas/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a onclick="accept(' . $field->id . '); return false;">
                                <i class="icon-check"></i> Accept </a>
                        </li>
                        <li>
                            <a onclick="reject(' . $field->id . '); return false;">
                                <i class="icon-close"></i> Reject </a>
                        </li>
                        <li>
                            <a href="' . base_url() . 'index.php/Sewa_fasilitas/update/' . $field->id . '">
                                <i class="icon-pencil"></i> Edit </a>
                        </li>
                        <li>
                            <a onclick="confirmDelete(' . $field->id . '); return false;">
                                <i class="icon-trash"></i> Hapus </a>
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
                            <a href="' . base_url() . 'index.php/Sewa_fasilitas/read/' . $field->id . '">
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
            "recordsTotal" => $this->Sewa_fasilitas_model->count_all(),
            "recordsFiltered" => $this->Sewa_fasilitas_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}
