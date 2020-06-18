<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Generic extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Generic_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }

    }

    public function index()
    {
        $data['folder'] = 'generic';
        $data['page'] = 'Generic';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $data = array(
            'id' => set_value('id'),
            'title' => set_value('title'),
            'description' => set_value('description'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Generic/create_action',
            'page' => 'Generic Add',
            'folder' => 'generic',
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
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
            );
            $simpan = $this->Generic_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Generic'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Generic_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'title' => set_value('title', $row->title),
            'description' => set_value('description', $row->description),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Generic/update_action/"' . $id . '"',
            'page' => 'Generic Type Update',
            'folder' => 'generic',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'title' => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
        );

        $this->Generic_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Generic'));
    }

    public function read($id)
    {
        $row = $this->Generic_model->get_by_id($id);

        $data = array(
            'id' => set_value('id', $row->id),
            'title' => set_value('title', $row->title),
            'description' => set_value('description', $row->description),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Generic/update_action/"' . $id . '"',
            'page' => 'Generic View',
            'folder' => 'generic',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Generic_model->get_by_id($id);

        if ($row) {
            $this->Generic_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Generic'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Generic'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_data_generic()
    {
        $list = $this->Generic_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->title;
            $row[] = $field->description;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Generic/read/' . $field->id . '">
                                        <i class="icon-eye"></i> Lihat Detail </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Generic/update/' . $field->id . '">
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
            "recordsTotal" => $this->Generic_model->count_all(),
            "recordsFiltered" => $this->Generic_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
