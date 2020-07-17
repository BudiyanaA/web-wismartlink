<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keluarga_penghuni extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Keluarga_penghuni_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Keluarga_penghuni_model->get_all()->result();
        $data['folder'] = 'keluarga_penghuni';
        $data['page'] = 'Keluarga_penghuni';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_all_user = $this->db->query("select * from user where level = 8")->result();
        $get_all_hubungan = $this->db->query("select * from role where id IN (9, 10, 11)")->result();
        $data = array(
            'get_all_user' => $get_all_user,
            'get_all_hubungan' => $get_all_hubungan,
            'id' => set_value('id'),
            'user_id' => set_value('user_id'),
            'nama' => set_value('nama'),
            'hubungan' => set_value('hubungan'),
            'tgl_lahir' => set_value('tgl_lahir'),
            'jk' => set_value('jk'),
            'hubungan' => set_value('hubungan'),
            'img' => set_value('img'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Keluarga_penghuni/create_action',
            'page' => 'Keluarga penghuni Add',
            'folder' => 'keluarga_penghuni',
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
                    'user_refer' => $this->input->post('user_id', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                    'jk' => $this->input->post('jk', TRUE),
                    'level' => $this->input->post('hubungan', TRUE),
                    'img' => '/assets/img/user/' . $rand . '.' . $ext,
                );
                // }
                $simpan = $this->Keluarga_penghuni_model->insert($data);
            } else {
                $data = array(
                    'user_refer' => $this->input->post('user_id', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                    'jk' => $this->input->post('jk', TRUE),
                    'level' => $this->input->post('hubungan', TRUE),
                );
                $simpan = $this->Keluarga_penghuni_model->insert($data);
            }
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Keluarga_penghuni'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Keluarga_penghuni_model->get_by_id($id);
        $get_user = $this->db->query("select * from user where user_id = '$row->user_refer'")->row();
        $get_role = $this->db->query("select * from role where id = '$row->level'")->row();
        $get_all_user = $this->db->query("select * from user where level = 8")->result();
        $get_all_hubungan = $this->db->query("select * from role where id IN (9, 10, 11)")->result();
            
        $data = array(
            'get_all_user' => $get_all_user,
            'get_all_hubungan' => $get_all_hubungan,
            'user_id' => set_value('user_id', $get_user->user_id),
            'id' => set_value('id', $row->user_id),
            'nama' => set_value('nama', $row->nama),
            'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
            'jk' => set_value('jk', $row->jk),
            'hubungan' => set_value('hubungan', $get_role->role_name),
            'img' => set_value('img', base_url() . $row->img),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Keluarga_penghuni/update_action/"' . $id . '"',
            'page' => 'Keluarga Penghuni Update',
            'folder' => 'keluarga_penghuni',
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
                'user_refer' => $this->input->post('user_id', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'level' => $this->input->post('hubungan', TRUE),
                'img' => '/assets/img/user/' . $rand . '.' . $ext,
            );
        } else {
            $data = array(
                'user_refer' => $this->input->post('user_id', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'level' => $this->input->post('hubungan', TRUE),
            );
        }

        $this->Keluarga_penghuni_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Keluarga_penghuni'));
    }

    public function read($id)
    {
        $row = $this->Keluarga_penghuni_model->get_by_id($id);
        $get_user = $this->db->query("select * from user where user_id = '$row->user_refer'")->row();
        $get_role = $this->db->query("select * from role where id = '$row->level'")->row();
        $get_all_user = $this->db->query("select * from user")->result();
        $get_all_hubungan = $this->db->query("select * from role where id IN (9, 10, 11)")->result();

        $data = array(
            'get_all_user' => $get_all_user,
            'get_all_hubungan' => $get_all_hubungan,
            'user_id' => set_value('user_id', $get_user->user_id),
            'id' => set_value('id', $row->user_id),
            'nama' => set_value('nama', $row->nama),
            'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
            'jk' => set_value('jk', $row->jk),
            'hubungan' => set_value('hubungan', $get_role->role_name),
            'img' => set_value('img', base_url() . $row->img),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Keluarga_penghuni/update_action/"' . $id . '"',
            'page' => 'Keluarga Penghuni View',
            'folder' => 'keluarga_penghuni',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Keluarga_penghuni_model->get_by_id($id);

        if ($row) {
            $this->Keluarga_penghuni_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Keluarga_penghuni'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Keluarga_penghuni'));
        }
    }

    function get_data()
    {
        $list = $this->Keluarga_penghuni_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $get_user = $this->db->query("select * from user where user_id = '$field->user_refer'")->row();
            $get_role = $this->db->query("select * from role where id = '$field->level'")->row();
            // var_dump($field->user_id);die();
            $no++;
            $row = array(); 
            $img = '<img src=' . base_url() . $field->img . ' width="45%">';
            $row[] = $no;
            $row[] = $field->nama;
            $row[] = $get_user->nama;
            $row[] = $get_role->role_name;
            $row[] = $img;
            $row[] = '<td> 
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Keluarga_penghuni/read/' . $field->user_id . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Keluarga_penghuni/update/' . $field->user_id . '">
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
            "recordsTotal" => $this->Keluarga_penghuni_model->count_all(),
            "recordsFiltered" => $this->Keluarga_penghuni_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        $this->form_validation->set_rules('hubungan', 'hubungan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
