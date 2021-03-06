<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Maintenance_model');
        $this->load->model('Apartemen_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Maintenance_model->get_all()->result();
        $data['folder'] = 'maintenance';
        $data['page'] = 'Maintenance';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_teknisi = $this->db->query("select * from teknisi")->result();
        $data = array(
            'get_users' => $get_users,
            'get_teknisi' => $get_teknisi,
            'id' => set_value('id'),
            'id_teknisi' => set_value('id_teknisi'),
            'request' => set_value('request'),
            'id_user' => set_value('id_user'),
            'alamat' => set_value('alamat'),
            'request_date' => set_value('request_date'),
            'is_paid' => set_value('is_paid'),
            'status' => set_value('status'),
            'charge' => set_value('charge', 0),
            'invoice_no' => set_value('invoice_no'),
            'tanggal_bayar' => set_value('tanggal_bayar'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Maintenance/create_action',
            'page' => 'Maintenance Add',
            'folder' => 'maintenance',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }
    

    public function create_action()
    {
        $data = array(
            'id_user' => $this->input->post('user', TRUE),
            'request' => $this->input->post('request', TRUE),
            'request_date' => $this->input->post('request_date', TRUE),
            'is_paid' => $this->input->post('is_paid', TRUE),
            'status' => $this->input->post('status', TRUE),
            'charge' => $this->input->post('charge', TRUE),
            'invoice_no' => $this->input->post('invoice_no', TRUE),
            'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
            'id_teknisi' => $this->input->post('id_teknisi', TRUE),
        );
        $simpan = $this->Maintenance_model->insert($data);

        if ($simpan) {
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(base_url('index.php/Maintenance'));
        } else {
            $this->session->set_flashdata('error', 'Failed to Saved Data');
            $this->create();
        }
    }

    public function update($id)
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_teknisi = $this->db->query("select * from teknisi")->result();
        $row = $this->Maintenance_model->get_by_id($id);
        if ($row->is_paid == '1') {
            $lunas = 'Lunas';
        } else {
            $lunas = 'Belum Lunas';
        }
        $request_date = $row->request_date;
        $data = array(
            'get_users' => $get_users,
            'get_teknisi' => $get_teknisi,
            'id' => set_value('id', $row->id),
            'id_teknisi' => set_value('id_teknisi', $row->id_teknisi),
            'request' => set_value('request', $row->request),
            'id_user' => set_value('id_user', $row->id_user),
            'request_date' => set_value('request_date', date('Y-m-d\TH:i:s', strtotime($request_date))),
            'is_paid' => set_value('is_paid', $lunas),
            'status' => set_value('status', $row->status),
            'charge' => set_value('charge', $row->charge),
            'invoice_no' => set_value('invoice_no', $row->invoice_no),
            'tanggal_bayar' => set_value('tanggal_bayar', date('Y-m-d\TH:i:s', strtotime($row->tanggal_bayar))),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Maintenance/update_form_action/"' . $id . '"',
            'page' => 'Maintenance Update',
            'folder' => 'maintenance',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_form_action()
    {
        $data = array(
            'id_user' => $this->input->post('user', TRUE),
            'request' => $this->input->post('request', TRUE),
            'request_date' => $this->input->post('request_date', TRUE),
            'is_paid' => $this->input->post('is_paid', TRUE),
            'status' => $this->input->post('status', TRUE),
            'charge' => $this->input->post('charge', TRUE),
            'invoice_no' => $this->input->post('invoice_no', TRUE),
            'tanggal_bayar' => $this->input->post('tanggal_bayar', TRUE),
            'id_teknisi' => $this->input->post('id_teknisi', TRUE),
        );

        $this->Apartemen_model->update('id', $this->input->post('id', TRUE), $data, 'request_maintenance');
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Maintenance'));
        
    }

    public function read($id)
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_teknisi = $this->db->query("select * from teknisi")->result();
        $row = $this->Maintenance_model->get_by_id($id);
        if ($row->is_paid == '1') {
            $lunas = 'Lunas';
        } else {
            $lunas = 'Belum Lunas';
        }
        $request_date = $row->request_date;
        $get_nama_teknisi = $this->db->query("select * from teknisi where id = '" . $row->id_teknisi . "'")->row();
        $get_nama_penghuni = $this->db->query("select * from user where user_id = '" . $row->id_user . "'")->row();
        $get_nama_apt = $this->db->query("select * from apartemen where id_apt = '" . $get_nama_penghuni->user_id . "'")->row();
        $get_unit = $this->db->query("select * from unit where id_unit = '" . $get_nama_penghuni->idunit . "'")->row();
        $get_nama_gedung = $this->db->query("select * from gedung where id_gedung = '" . $get_unit->id_gedung . "'")->row();
        $alamat = 'Apartemen ' . $get_nama_apt->nama_apt . ', Gedung ' . $get_nama_gedung->nama_gedung . ', ' . $get_unit->nama_unit . ', Lantai ' . $get_unit->lantai . ', Nomor ' . $get_unit->nomor;
        $data = array(
            'get_users' => $get_users,
            'get_teknisi' => $get_teknisi,
            'id' => set_value('id', $row->id),
            'id_teknisi' => set_value('id_teknisi', $row->id_teknisi),
            'request' => set_value('request', $row->request),
            'id_user' => set_value('id_user', $row->id_user),
            'alamat' => set_value('alamat', $alamat),
            'request_date' => set_value('request_date', date('Y-m-d\TH:i:s', strtotime($request_date))),
            'is_paid' => set_value('is_paid', $lunas),
            'status' => set_value('status', $row->status),
            'charge' => set_value('charge', $row->charge),
            'invoice_no' => set_value('invoice_no', $row->invoice_no),
            'tanggal_bayar' => set_value('tanggal_bayar', date('Y-m-d\TH:i:s', strtotime($row->tanggal_bayar))),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Maintenance/update_action/"' . $id . '"',
            'page' => 'Maintenance View',
            'folder' => 'maintenance',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Maintenance_model->get_by_id($id);

        if ($row) {
            $this->Maintenance_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Maintenance'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Maintenance'));
        }
    }

    public function pilih_teknisi($id)
    {
        $row = $this->Maintenance_model->get_by_id($id);
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
        // var_dump($this->input->post('id', TRUE));
        // die();
        $data = array(
            'id_teknisi' => $this->input->post('id_teknisi', TRUE),
        );
        $this->Apartemen_model->update('id', $this->input->post('id', TRUE), $data, 'request_maintenance');
        $this->session->set_flashdata('success', 'Create Record Success');
        redirect(base_url('index.php/Maintenance'));
    }

    public function accept($id)
    {
        $row = $this->Maintenance_model->get_by_id($id);

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


    function get_data_maintenance()
    {
        $list = $this->Maintenance_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->is_paid == '1') {
                $lunas = 'Lunas';
            } else {
                $lunas = 'Belum Lunas';
            }
            $get_teknisi = $this->db->query("select * from teknisi")->result();
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
            if ($field->nama_teknisi == NULL || $field->nama_teknisi == "") {
                $row[] = '<a href="' . base_url() . 'index.php/Maintenance/pilih_teknisi/' . $field->id . '" class=" btn green btn-outline sbold"> Pilih Teknisi </a>';
            } else {
                $row[] = $field->nama_teknisi;
            }


            if ($field->status == 'Submitted') {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Maintenance/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a onclick="accept(' . $field->id . '); return false;">
                                <i class="icon-check"></i> Accept </a>
                        </li>
                        <li>
                            <a href="' . base_url() . 'index.php/Maintenance/update/' . $field->id . '">
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
                            <a href="' . base_url() . 'index.php/Maintenance/read/' . $field->id . '">
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
            "recordsTotal" => $this->Maintenance_model->count_all(),
            "recordsFiltered" => $this->Maintenance_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
