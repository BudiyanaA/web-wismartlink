<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Teknisi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Teknisi_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Teknisi_model->get_all()->result();
        $data['folder'] = 'teknisi';
        $data['page'] = 'Teknisi';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $data = array(
            'id' => set_value('id'),
            'nama_teknisi' => set_value('nama_teknisi'),
            'img' => set_value('img'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Teknisi/create_action',
            'page' => 'Teknisi Add',
            'folder' => 'teknisi',
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
            $config['upload_path'] = './assets/img/teknisi/';
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
            $config['max_size'] = '2048';
            $config['max_width']  = '2047';
            $config['max_height']  = '1366';
            $config['file_name'] = $nmfile;
            $this->upload->initialize($config);
            if (!empty($_FILES['img']['name'])) {
                $this->upload->do_upload('img');
                $data = array(
                    'nama_teknisi' => $this->input->post('nama_teknisi', TRUE),
                    'img' => '/assets/img/teknisi/' . $rand . '.' . $ext,
                );
                // }
                $simpan = $this->Teknisi_model->insert($data);
            } else {
                $data = array(
                    'nama_teknisi' => $this->input->post('nama_teknisi', TRUE),
                );
                $simpan = $this->Teknisi_model->insert($data);
            }
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Teknisi'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Teknisi_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'nama_teknisi' => set_value('nama_teknisi', $row->nama_teknisi),
            'img' => set_value('img', $row->img),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Teknisi/update_action/"' . $id . '"',
            'page' => 'Teknisi Type Update',
            'folder' => 'teknisi',
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
        $config['upload_path'] = './assets/img/teknisi/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (!empty($_FILES['img']['name'])) {
            $this->upload->do_upload('img');
            $data = array(
                'nama_teknisi' => $this->input->post('nama_teknisi', TRUE),
                'img' => '/apartemen/assets/img/teknisi/' . $rand . '.' . $ext,
            );
        } else {
            $data = array(
                'nama_teknisi' => $this->input->post('nama_teknisi', TRUE),
            );
        }

        $this->Teknisi_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Teknisi'));
    }

    public function read($id)
    {
        $row = $this->Teknisi_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'nama_teknisi' => set_value('nama_teknisi', $row->nama_teknisi),
            'img' => set_value('img', base_url() . $row->img),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Teknisi/update_action/"' . $id . '"',
            'page' => 'Teknisi View',
            'folder' => 'teknisi',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Teknisi_model->get_by_id($id);

        if ($row) {
            $this->Teknisi_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Teknisi'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Teknisi'));
        }
    }

    function get_data()
    {
        $list = $this->Teknisi_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $img = '<img src=' . base_url() . $field->img . ' width="45%">';
            $row[] = $no;
            $row[] = $field->nama_teknisi;
            $row[] = $img;
            $row[] = '<td>
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Teknisi/read/' . $field->id . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>

                                <li>
                                    <a href="' . base_url() . 'index.php/Teknisi/update/' . $field->id . '">
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
            "recordsTotal" => $this->Teknisi_model->count_all(),
            "recordsFiltered" => $this->Teknisi_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_teknisi', 'Nama Teknisi', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
