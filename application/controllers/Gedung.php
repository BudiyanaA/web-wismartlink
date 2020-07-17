<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gedung extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Gedung_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Gedung_model->get_all()->result();
        $data['folder'] = 'gedung';
        $data['page'] = 'Gedung';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        // $get_all_apartemen = $this->db->query("select * from apartemen")->result();
        $data = array(
            // 'get_all_apt' => $get_all_apartemen,
            'kode_gedung' => set_value('kode_gedung'),
            'nama_gedung' => set_value('nama_gedung'),
            'alamat' => set_value('alamat'),
            'kota' => set_value('kota'),
            // 'id_apt' => set_value('id_apt'),
            'id_gedung' => set_value('id_gedung'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Gedung/create_action',
            'page' => 'Gedung Add',
            'folder' => 'gedung',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_gedung' => $this->input->post('kode_gedung', TRUE),
                'nama_gedung' => $this->input->post('nama_gedung', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'kota' => $this->input->post('kota', TRUE),
                // 'id_apt' => $this->input->post('id_apt', TRUE),
                'id_apt' => 1
            );
            $simpan = $this->Gedung_model->insert($data);
        }
        if ($simpan) {
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(base_url('index.php/Gedung'));
        } else {
            $this->session->set_flashdata('error', 'Failed to Saved Data');
            $this->create();
        }
    }

    public function update($id)
    {
        $row = $this->Gedung_model->get_by_id($id);
        $get_user = $this->db->query("select * from apartemen where id_apt = '$row->id_apt'")->row();
        // $get_all_apartemen = $this->db->query("select * from apartemen")->result();
        $data = array(
            // 'get_all_apt' => $get_all_apartemen,
            // 'id_apt' => set_value('id_apt', $get_user->id_apt),
            'id_gedung' => set_value('id_gedung', $row->id_gedung),
            'kode_gedung' => set_value('kode_gedung', $row->kode_gedung),
            'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            'alamat' => set_value('alamat', $row->alamat),
            'kota' => set_value('kota', $row->kota),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Gedung/update_action/"' . $id . '"',
            'page' => 'Gedung Update',
            'folder' => 'gedung',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'kode_gedung' => $this->input->post('kode_gedung', TRUE),
            'nama_gedung' => $this->input->post('nama_gedung', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'kota' => $this->input->post('kota', TRUE),
            // 'id_apt' => $this->input->post('id_apt', TRUE),
        );

        $this->Gedung_model->update($this->input->post('id_gedung', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Gedung'));
    }

    public function read($id)
    {
        $row = $this->Gedung_model->get_by_id($id);
        $get_user = $this->db->query("select * from apartemen where id_apt = '$row->id_apt'")->row();
        // $get_all_apartemen = $this->db->query("select * from apartemen")->result();
        $data = array(
            // 'get_all_apt' => $get_all_apartemen,
            // 'id_apt' => set_value('id_apt', $get_user->id_apt),
            'id_gedung' => set_value('id_gedung', $row->id_gedung),
            'kode_gedung' => set_value('kode_gedung', $row->kode_gedung),
            'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            'alamat' => set_value('alamat', $row->alamat),
            'kota' => set_value('kota', $row->kota),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Gedung/update_action/"' . $id . '"',
            'page' => 'Gedung Update',
            'folder' => 'gedung',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Gedung_model->get_by_id($id);

        if ($row) {
            $this->Gedung_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Gedung'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Gedung'));
        }
    }

    function get_data()
    {
        $list = $this->Gedung_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            // $get_apt = $this->db->query("select * from apartemen where id_apt = '$field->id_apt'")->row();
            // var_dump($field->user_id);die();
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode_gedung;
            $row[] = $field->nama_gedung;
            $row[] = $field->alamat;
            $row[] = $field->kota;
            // $row[] = $get_apt->nama_apt;
            $row[] = '<td> 
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Gedung/read/' . $field->id_gedung . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Gedung/update/' . $field->id_gedung . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->id_gedung . '); return false;">
                                        <i class="icon-trash"></i> Hapus </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Gedung_model->count_all(),
            "recordsFiltered" => $this->Gedung_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_gedung', 'kode_gedung', 'trim|required');
        $this->form_validation->set_rules('nama_gedung', 'nama_gedung', 'trim|required');
        // $this->form_validation->set_rules('id_apt', 'Apartemen', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
