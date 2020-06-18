<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Support_staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Support_staff_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Support_staff_model->get_all()->result();
        $data['folder'] = 'support_staff';
        $data['page'] = 'Support_staff';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_role = $this->db->query("select * from role")->result();
        $data = array(
            'get_role' => $get_role,
            'id' => set_value('id'),
            'nama_staff' => set_value('nama_staff'),
            'email' => set_value('email'),
            'role' => set_value('role'),
            'img' => set_value('img'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Support_staff/create_action',
            'page' => 'Support Staff Add',
            'folder' => 'support_staff',
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
            $config['upload_path'] = './assets/img/support_staff/';
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
            $config['max_size'] = '2048';
            $config['max_width']  = '2047';
            $config['max_height']  = '1366';
            $config['file_name'] = $nmfile;
            $this->upload->initialize($config);
            if (!empty($_FILES['img']['name'])) {
                $this->upload->do_upload('img');
                $data = array(
                    'nama_staff' => $this->input->post('nama_staff', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'role' => $this->input->post('role', TRUE),
                    'img' => 'http://nama_domain_anda.com/apartemen/assets/img/support_staff/' . $rand . '.' . $ext,
                );
                // }
                $simpan = $this->Support_staff_model->insert($data);
            } else {
                $data = array(
                    'nama_staff' => $this->input->post('nama_staff', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'role' => $this->input->post('role', TRUE),
                );
                $simpan = $this->Support_staff_model->insert($data);
            }
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Support_staff'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Support_staff_model->get_by_id($id);
        $get_role = $this->db->query("select * from role where id = '$row->role'")->row();
        $get_roles = $this->db->query("select * from role")->result();
        $data = array(
            'get_roles' => $get_roles,
            'id' => set_value('id', $row->id),
            'nama_staff' => set_value('nama_staff', $row->nama_staff),
            'email' => set_value('email', $row->email),
            'role' => set_value('role', $row->role),
            'role_name' => set_value('role', $get_role->role_name),
            'img' => set_value('img', $row->img),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Support_staff/update_action/"' . $id . '"',
            'page' => 'Support Staff Type Update',
            'folder' => 'support_staff',
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
        $config['upload_path'] = './assets/img/support_staff/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (!empty($_FILES['img']['name'])) {
            $this->upload->do_upload('img');
            $data = array(
                'nama_staff' => $this->input->post('nama_staff', TRUE),
                'email' => $this->input->post('email', TRUE),
                'role' => $this->input->post('role', TRUE),
                'img' => 'http://nama_domain_anda.com/apartemen/assets/img/support_staff/' . $rand . '.' . $ext,
            );
        } else {
            $data = array(
                'nama_staff' => $this->input->post('nama_staff', TRUE),
                'email' => $this->input->post('email', TRUE),
                'role' => $this->input->post('role', TRUE),
            );
        }

        $this->Support_staff_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Support_staff'));
    }

    public function read($id)
    {
        $row = $this->Support_staff_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'nama_staff' => set_value('nama_staff', $row->nama_staff),
            'email' => set_value('email', $row->email),
            'role' => set_value('role', $row->role),
            'img' => set_value('img', $row->img),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Support_staff/update_action/"' . $id . '"',
            'page' => 'Support Staff View',
            'folder' => 'support_staff',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Support_staff_model->get_by_id($id);

        if ($row) {
            $this->Support_staff_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Support_staff'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Support_staff'));
        }
    }

    function get_data()
    {
        $list = $this->Support_staff_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $get_role = $this->db->query("select * from role where id = '$field->role'")->row();
            // var_dump($get_role);die();
            $no++;
            $row = array();
            $img = '<img src=' . $field->img . ' width="45%">';
            $row[] = $no;
            $row[] = $field->nama_staff;
            $row[] = $field->email;
            $row[] = $get_role->role_name;
            $row[] = $img;
            $row[] = '<td> 
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Support_staff/read/' . $field->id . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Support_staff/update/' . $field->id . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->id . '); return false;">
                                        <i class="icon-trash"></i> Hapus </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Support_staff_model->count_all(),
            "recordsFiltered" => $this->Support_staff_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_staff', 'Nama Staff', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
