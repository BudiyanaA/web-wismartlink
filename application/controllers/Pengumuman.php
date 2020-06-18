<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Pengumuman_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'pengumuman';
        $data['page'] = 'Pengumuman';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $data = array(
            'id' => set_value('id'),
            'title' => set_value('title'),
            'desc' => set_value('desc'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Pengumuman/create_action',
            'page' => 'Pengumuman Add',
            'folder' => 'pengumuman',
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
                'desc' => $this->input->post('desc', TRUE),
            );
            $simpan = $this->Pengumuman_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Pengumuman'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'title' => set_value('title', $row->title),
            'desc' => set_value('desc', $row->desc),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Pengumuman/update_action/"' . $id . '"',
            'page' => 'Pengumuman Type Update',
            'folder' => 'pengumuman',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'title' => $this->input->post('title', TRUE),
            'desc' => $this->input->post('desc', TRUE),
        );

        $this->Pengumuman_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Pengumuman'));
    }

    public function read($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);

        $data = array(
            'id' => set_value('id', $row->id),
            'title' => set_value('title', $row->title),
            'desc' => set_value('desc', $row->desc),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Pengumuman/update_action/"' . $id . '"',
            'page' => 'Pengumuman View',
            'folder' => 'pengumuman',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Pengumuman_model->get_by_id($id);

        if ($row) {
            $this->Pengumuman_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Pengumuman'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Pengumuman'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('desc', 'desc', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_data()
    {
        $list = $this->Pengumuman_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->title;
            $row[] = $field->desc;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Pengumuman/read/' . $field->id . '">
                                        <i class="icon-eye"></i> Lihat Detail </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Pengumuman/update/' . $field->id . '">
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
            "recordsTotal" => $this->Pengumuman_model->count_all(),
            "recordsFiltered" => $this->Pengumuman_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
