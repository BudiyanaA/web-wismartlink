<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['list'] = $this->User_model->get_all()->result();
        $data['folder'] = 'user';
        $data['page'] = 'User';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }


    public function create()
    {
        $data = array(
            'get_level_user' => $this->User_model->get_all_level(),
            'user_id' => set_value('user_id'),
            'nama' => set_value('nama'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'email' => set_value('email'),
            'phone_number' => set_value('phone_number'),
            'level' => set_value('level'),
            'status' => set_value('status'),
            'leveluser_id' => set_value('leveluser_id'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/User/create_action',
            'page' => 'User Add',
            'folder' => 'user',
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
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => encryptFH($this->input->post('password', TRUE)),
                'phone_number' => $this->input->post('phone_number', TRUE),
                'level' => $this->input->post('level', TRUE),
            );
            $simpan = $this->User_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/User'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->User_model->get_by_id($id);
        $get_level_by_id = $this->User_model->get_by_level_id($row->level);
        $data = array(
            'get_level_user' => $this->User_model->get_all_level(),
            'role_name' => $get_level_by_id->role_name,
            'user_id' => set_value('user_id', $row->user_id),
            'nama' => set_value('nama', $row->nama),
            'username' => set_value('username', $row->username),
            'password' => set_value('password', $row->password),
            'email' => set_value('email', $row->email),
            'phone_number' => set_value('phone_number', $row->phone_number),
            'status' => set_value('status', $row->status),
            'leveluser_id' => set_value('leveluser_id', $row->level),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/User/update_action/"' . $id . '"',
            'page' => 'User Update',
            'folder' => 'user',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => encryptFH($this->input->post('password', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'phone_number' => $this->input->post('phone_number', TRUE),
                'level' => $this->input->post('level', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            // var_dump($data);die();

            $this->User_model->update($this->input->post('user_id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Success');
            redirect(base_url('index.php/User'));
        }
    }

    public function read($id)
    {
        $row = $this->User_model->get_by_id($id);
        // var_dump($row);
        $get_level_by_id = $this->User_model->get_by_level_id($row->level);
        $data = array(
            'get_level_user' => $this->User_model->get_all_level(),
            'role_name' => $get_level_by_id->role_name,
            'user_id' => set_value('user_id', $row->user_id),
            'nama' => set_value('nama', $row->nama),
            'username' => set_value('username', $row->username),
            'password' => set_value('password', $row->password),
            'email' => set_value('email', $row->email),
            'phone_number' => set_value('phone_number', $row->phone_number),
            'status' => set_value('status', $row->status),
            'leveluser_id' => set_value('leveluser_id', $row->level),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/User/update_action/"' . $id . '"',
            'page' => 'User View',
            'folder' => 'user',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/User'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/User'));
        }
    }

    function get_data_user()
    {
        $list = $this->User_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $field->email;
            $row[] = $field->role_name;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/User/read/' . $field->user_id . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/User/update/' . $field->user_id . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->User_model->count_all(),
            "recordsFiltered" => $this->User_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('level', 'Level Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
