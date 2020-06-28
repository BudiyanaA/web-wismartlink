<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Voucher extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
        $this->load->model('Voucher_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'voucher';
        $data['page'] = 'Voucher';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $data = array(
            'id' => set_value('id'),
            'title' => set_value('title'),
            'image' => set_value('image'),
            'description' => set_value('description'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Voucher/create_action',
            'page' => 'Voucher Add',
            'folder' => 'voucher',
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
            $files = $_FILES['image']['name'];
            $ada = explode(".", $files);
            $ext = end($ada);
            $config['upload_path'] = './assets/upload/voucher/';
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
            $config['max_size'] = '2048';
            $config['max_width']  = '2047';
            $config['max_height']  = '1366';
            $config['file_name'] = $nmfile;
            $this->upload->initialize($config);
            if (!empty($_FILES['image']['name'])) {
                $this->upload->do_upload('image');
                $data = array(
                    'title' => $this->input->post('title', TRUE),
                    'image' => $rand . '.' . $ext,
                    'description' => $this->input->post('description', TRUE),
                );
                // }
                $simpan = $this->Voucher_model->insert($data);
            } else {
                $data = array(
                    'title' => $this->input->post('title', TRUE),
                    'description' => $this->input->post('description', TRUE),
                );
                $simpan = $this->Voucher_model->insert($data);
            }
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Voucher'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Voucher_model->get_by_id($id);
        $data = array(
            'id' => set_value('id', $row->id),
            'title' => set_value('title', $row->title),
            'image' => set_value('image', $row->image),
            'description' => set_value('description', $row->description),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Voucher/update_action/"' . $id . '"',
            'page' => 'Voucher Update',
            'folder' => 'voucher',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['image']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/upload/voucher/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (!empty($_FILES['image']['name'])) {
            $this->upload->do_upload('image');
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'image' => $rand . '.' . $ext,
                'description' => $this->input->post('description', TRUE),
            );
        } else {
            $data = array(
                'title' => $this->input->post('title', TRUE),
                'description' => $this->input->post('description', TRUE),
            );
        }

        $this->Voucher_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Voucher'));
    }

    public function read($id)
    {
        // $row = $this->db->query("select e.id, e.img, u.nama, e.nama_resto, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt
        // from restaurant e 
        // left join user u on e.id_user = u.user_id
        // left join unit un on u.idunit = un.id_unit
        // left join gedung g on un.id_gedung = g.id_gedung
        // left join apartemen a on g.id_apt = a.id_apt
        // where e.id = '$id'
        // ")->row();
        $row = $this->db->query("select *
        from voucher
        ")->row();

        $image = base_url() . 'assets/upload/voucher/' . $row->image;

        $data = array(
            'id' => set_value('id', $row->id),
            'title' => set_value('title', $row->title),
            'image' => set_value('image', $image),
            'description' => set_value('description', $row->description),
            // 'img' => set_value('img', $row->img),
            // 'email' => set_value('email', $row->email),
            // 'nama' => set_value('nama', $row->nama),
            // 'nama_resto' => set_value('nama_resto', $row->nama_resto),
            // 'nomor' => set_value('nomor', $row->nomor),
            // 'lantai' => set_value('lantai', $row->lantai),
            // 'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            // 'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Restaurant/update_action/"' . $id . '"',
            'page' => 'Voucher View',
            'folder' => 'voucher',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Voucher_model->get_by_id($id);

        if ($row) {
            $this->Voucher_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Voucher'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Voucher'));
        }
    }

    public function approve($id)
    {
        $row = $this->Voucher_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_approve' => '1',
            );
            // var_dump($id);
            // die();
            $this->Voucher_model->update($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Restaurant'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Restaurant'));
        }
    }

    function get_data()
    {
        $list = $this->Voucher_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            // if ($field->is_approve != '1') {
            //     $approve = '
            //     <li><a onclick="approve(' . $field->id . '); return false;">
            //     <i class="fa fa-check"></i> Approve </a></li>
            //     ';

            //     $status = 'Pending';
            // } else {
            //     $approve = '';
            //     $status = 'Approved';
            // }
            // $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            $image = '<img src=' . base_url() . 'assets/upload/voucher/' . $field->image . ' width="100%">';
            $row = array();
            $row[] = $no;
            $row[] = $field->title;
            $row[] = $image;
            $row[] = $field->description;

            $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Voucher/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a href="' . base_url() . 'index.php/Voucher/update/' . $field->id . '">
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
            "recordsTotal" => $this->Voucher_model->count_all(),
            "recordsFiltered" => $this->Voucher_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('title', 'Judul', 'trim|required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
