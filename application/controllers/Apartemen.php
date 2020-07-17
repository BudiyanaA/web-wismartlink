<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Apartemen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Apartemen_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    // public function index()
    // {
    //     $data['folder'] = 'apartemen';
    //     $data['page'] = 'Apartemen';
    //     $data['page_name'] = 'index';
    //     $this->load->view('template/index', $data);
    // }

    public function create()
    {
        $data = array(
            'id_apt' => set_value('id_apt'),
            'kode_apt' => set_value('kode_apt'),
            'nama_apt' => set_value('nama_apt'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Apartemen/create_action',
            'page' => 'Apartemen Add',
            'folder' => 'apartemen',
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
                'nama_apt' => $this->input->post('nama_apt', TRUE),
                'kode_apt' => $this->input->post('kode_apt', TRUE),
            );
            $simpan = $this->Apartemen_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Apartemen'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function index($id=1)
    {
        $row = $this->Apartemen_model->get_by_id($id);
        $data = array(
            'id_apt' => set_value('id_apt', $row->id_apt),
            'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'kode_apt' => set_value('kode_apt', $row->kode_apt),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Apartemen/update_action/"' . $id . '"',
            'page' => 'Apartemen Type Update',
            'folder' => 'apartemen',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'nama_apt' => $this->input->post('nama_apt', TRUE),
            'kode_apt' => $this->input->post('kode_apt', TRUE),
        );

        $this->Apartemen_model->update('id_apt', $this->input->post('id_apt', TRUE), $data, 'apartemen');
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Apartemen'));
    }

    public function read($id)
    {
        $row = $this->Apartemen_model->get_by_id($id);

        $data = array(
            'id_apt' => set_value('id_apt', $row->id_apt),
            'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'kode_apt' => set_value('kode_apt', $row->kode_apt),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Apartemen/update_action/"' . $id . '"',
            'page' => 'Apartemen View',
            'folder' => 'apartemen',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Apartemen_model->get_by_id($id);

        if ($row) {
            $this->Apartemen_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Apartemen'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Apartemen'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_apt', 'nama_apt', 'trim|required');
        $this->form_validation->set_rules('kode_apt', 'kode_apt', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_data()
    {
        $list = $this->Apartemen_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_apt;
            $row[] = $field->kode_apt;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Apartemen/read/' . $field->id_apt . '">
                                        <i class="icon-eye"></i> Lihat Detail </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Apartemen/update/' . $field->id_apt . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->id_apt . '); return false;">
                                        <i class="icon-trash"></i> Hapus </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Apartemen_model->count_all(),
            "recordsFiltered" => $this->Apartemen_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
