<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Notifikasi_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'notifikasi';
        $data['page'] = 'Notifikasi';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_all_user = $this->db->query("select * from user")->result();
        $data = array(
            'get_all_user' => $get_all_user,
            'id' => set_value('id'),
            'id_user' => set_value('id_user'),
            'title' => set_value('title'),
            'desc' => set_value('desc'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Notifikasi/create_action',
            'page' => 'Notifikasi Add',
            'folder' => 'notifikasi',
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
                'id_user' => $this->input->post('id_user', TRUE),
                'title' => $this->input->post('title', TRUE),
                'desc' => $this->input->post('desc', TRUE),
            );
            $simpan = $this->Notifikasi_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Notifikasi'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Notifikasi_model->get_by_id($id);
        $get_all_user = $this->db->query("select * from user")->result();
        $data = array(
            'get_all_user' => $get_all_user,
            'id' => set_value('id', $row->id),
            'id_user' => set_value('id_user', $row->id_user),
            'title' => set_value('title', $row->title),
            'desc' => set_value('desc', $row->desc),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Notifikasi/update_action/"' . $id . '"',
            'page' => 'Notifikasi Type Update',
            'folder' => 'notifikasi',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'id_user' => $this->input->post('id_user', TRUE),
            'title' => $this->input->post('title', TRUE),
            'desc' => $this->input->post('desc', TRUE),
        );

        $this->Notifikasi_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Notifikasi'));
    }

    public function read($id)
    {
        $row = $this->Notifikasi_model->get_by_id($id);

        $get_all_user = $this->db->query("select * from user")->result();
        $data = array(
            'get_all_user' => $get_all_user,
            'id' => set_value('id', $row->id),
            'id_user' => set_value('id_user', $row->id_user),
            'title' => set_value('title', $row->title),
            'desc' => set_value('desc', $row->desc),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Notifikasi/update_action/"' . $id . '"',
            'page' => 'Notifikasi View',
            'folder' => 'notifikasi',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Notifikasi_model->get_by_id($id);

        if ($row) {
            $this->Notifikasi_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Notifikasi'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Notifikasi'));
        }
    }

    public function send($id)
    {
        $data = array(
            'sent' => '1',
        );

        $this->Notifikasi_model->update($id, $data);
        $this->session->set_flashdata('success', 'Sent Success');
        redirect(base_url('index.php/Notifikasi'));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('desc', 'desc', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_data()
    {
        $list = $this->Notifikasi_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $get_user = $this->db->query("select * from user where user_id = '$field->id_user'")->row();
            if($field->sent == '1'){
                $sent = 'Terkirim';
            }else{
                $sent = 'Belum Terkirim';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $get_user->nama;
            $row[] = $field->title;
            $row[] = $field->desc;
            $row[] = $sent;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Notifikasi/read/' . $field->id . '">
                                        <i class="icon-eye"></i> Lihat Detail </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Notifikasi/update/' . $field->id . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->id . '); return false;">
                                        <i class="icon-trash"></i> Hapus </a>
                                </li>
                                <li>
                                    <a onclick="send(' . $field->id . '); return false;">
                                        <i class="icon-bell"></i> Kirim Notifikasi </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Notifikasi_model->count_all(),
            "recordsFiltered" => $this->Notifikasi_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
