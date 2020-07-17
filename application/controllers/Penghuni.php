<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penghuni extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Penghuni_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Penghuni_model->get_all()->result();
        $data['folder'] = 'penghuni';
        $data['page'] = 'Penghuni';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_unit = $this->db->query("select * from unit where status = '0'")->result();

        $data = array(
            'get_unit' => $get_unit,
            'user_id' => set_value('user_id'),
            'nama' => set_value('nama'),
            'email' => set_value('email'),
            'username' => set_value('username'),
            'phone_number' => set_value('phone_number'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'jk' => set_value('jk'),
            'no_ktp' => set_value('no_ktp'),
            'status' => set_value('status'),
            'idunit' => set_value('idunit'),
            'img' => set_value('img'),
            'nomor_rekening' => set_value('nomor_rekening'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Penghuni/create_action',
            'page' => 'Penghuni Add',
            'folder' => 'penghuni',
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
            $this->load->library('upload');
            $rand = substr(hash('sha512', rand()), 0, 20);
            $nmfile = $rand;
            $files = $_FILES['img']['name'];
            $ada = explode(".", $files);
            $ext = end($ada);
            $config['upload_path'] = './assets/img/user/';
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
            $config['max_size'] = '2048';
            $config['max_width']  = '2047';
            $config['max_height']  = '1366';
            $config['file_name'] = $nmfile;
            $this->upload->initialize($config);
            if (!empty($_FILES['img']['name'])) {
                $this->upload->do_upload('img');
                $data = array(
                    'nama' => $this->input->post('nama', TRUE),
                    'username' => $this->input->post('username', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'phone_number' => $this->input->post('phone_number', TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                    'jk' => $this->input->post('jk', TRUE),
                    'no_ktp' => $this->input->post('no_ktp', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'idunit' => $this->input->post('idunit', TRUE),
                    'img' => 'http://nama_domain_anda.com/apartemen/assets/img/user/' . $rand . '.' . $ext,
                    'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
                );
                // }
                $simpan = $this->Penghuni_model->insert($data);
            } else {
                $data = array(
                    'nama' => $this->input->post('nama', TRUE),
                    'username' => $this->input->post('username', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'phone_number' => $this->input->post('phone_number', TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                    'jk' => $this->input->post('jk', TRUE),
                    'no_ktp' => $this->input->post('no_ktp', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'idunit' => $this->input->post('idunit', TRUE),
                    'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
                );
                $simpan = $this->Penghuni_model->insert($data);
            }
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Penghuni'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $get_unit = $this->db->query("select * from unit where status = '0'")->result();
        $row = $this->Penghuni_model->get_by_id($id);
        $data = array(
            'get_unit' => $get_unit,
            'user_id' => set_value('user_id', $row->user_id),
            'nama' => set_value('nama', $row->nama),
            'email' => set_value('email', $row->email),
            'status' => set_value('status', $row->status),
            'username' => set_value('username', $row->username),
            'phone_number' => set_value('phone_number', $row->phone_number),
            'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
            'jk' => set_value('jk', $row->jk),
            'no_ktp' => set_value('no_ktp', $row->no_ktp),
            'idunit' => set_value('idunit', $row->idunit),
            'nomor_rekening' => set_value('nomor_rekening', $row->nomor_rekening),
            'img' => set_value('img', $row->img),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Penghuni/update_action/"' . $id . '"',
            'page' => 'Penghuni Update',
            'folder' => 'penghuni',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/user/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (!empty($_FILES['img']['name'])) {
            $this->upload->do_upload('img');
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone_number' => $this->input->post('phone_number', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'no_ktp' => $this->input->post('no_ktp', TRUE),
                'status' => $this->input->post('status', TRUE),
                'idunit' => $this->input->post('idunit', TRUE),
                'img' => 'http://nama_domain_anda.com/apartemen/assets/img/user/' . $rand . '.' . $ext,
                'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
            );
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'phone_number' => $this->input->post('phone_number', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'no_ktp' => $this->input->post('no_ktp', TRUE),
                'status' => $this->input->post('status', TRUE),
                'idunit' => $this->input->post('idunit', TRUE),
                'nomor_rekening' => $this->input->post('nomor_rekening', TRUE),
            );
        }

        $this->Penghuni_model->update($this->input->post('user_id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Penghuni'));
    }

    public function read($id)
    {
        $row = $this->Penghuni_model->get_by_id($id);
        $get_unit = $this->db->query("select * from unit where status = '0'")->result();
        $data = array(
            'get_unit' => $get_unit,
            'user_id' => set_value('user_id', $row->user_id),
            'nama' => set_value('nama', $row->nama),
            'email' => set_value('email', $row->email),
            'status' => set_value('status', $row->status),
            'username' => set_value('username', $row->username),
            'phone_number' => set_value('nama', $row->phone_number),
            'tgl_lahir' => set_value('email', $row->tgl_lahir),
            'jk' => set_value('status', $row->jk),
            'no_ktp' => set_value('jk', $row->no_ktp),
            'idunit' => set_value('idunit', $row->idunit),
            'nomor_rekening' => set_value('nomor_rekening', $row->nomor_rekening),
            'img' => set_value('img', $row->img),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Penghuni/update_action/"' . $id . '"',
            'page' => 'Penghuni View',
            'folder' => 'penghuni',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Penghuni_model->get_by_id($id);

        if ($row) {
            $this->Penghuni_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Penghuni'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Penghuni'));
        }
    }

    function get_data()
    {
        $list = $this->Penghuni_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            // var_dump($get_role);die();
            $no++;
            $row = array();
            $img = '<img src=' . base_url() . $field->img . ' width="45%">';
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->email;
            $row[] = $field->status;
            $row[] = $img;
            $row[] = '<td> 
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Penghuni/read/' . $field->user_id . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Penghuni/update/' . $field->user_id . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->user_id . '); return false;">
                                        <i class="icon-trash"></i> Hapus </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Penghuni_model->count_all(),
            "recordsFiltered" => $this->Penghuni_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
