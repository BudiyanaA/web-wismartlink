<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Level_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Level_user_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'level_user';
        $data['page'] = 'Level user';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $data = array(
            'id' => set_value('id'),
            'level_name' => set_value('level_name'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/level_user/create_action',
            'page' => 'level user Add',
            'folder' => 'level_user',
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
                'level_name' => $this->input->post('level_name', TRUE),
            );
            $simpan = $this->Level_user_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Level_user'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Level_user_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'level_name' => set_value('level_name', $row->role_name),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Level_user/update_action/"' . $id . '"',
            'page' => 'level_user Type Update',
            'folder' => 'level_user',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'role_name' => $this->input->post('level_name', TRUE),
        );

        $this->Level_user_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Level_user'));
    }

    public function read($id)
    {
        $row = $this->Level_user_model->get_by_id($id);

        $data = array(
            'id' => set_value('id', $row->id),
            'level_name' => set_value('level_name', $row->role_name),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/level_user/update_action/"' . $id . '"',
            'page' => 'level user View',
            'folder' => 'level_user',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Level_user_model->get_by_id($id);

        if ($row) {
            $this->Level_user_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Level_user'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Level_user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('level_name', 'level_name', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_data()
    {
        $list = $this->Level_user_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->role_name;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Level_user/read/' . $field->id . '">
                                        <i class="icon-eye"></i> Lihat Detail </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Level_user/update/' . $field->id . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Level_user_model->count_all(),
            "recordsFiltered" => $this->Level_user_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    
    //<li>
    //<a onclick="confirmDelete(' . $field->id . '); return false;">
    //    <i class="icon-trash"></i> Hapus </a>
    //</li>
}
