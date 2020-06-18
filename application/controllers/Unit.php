<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Unit_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Unit_model->get_all()->result();
        $data['folder'] = 'unit';
        $data['page'] = 'Unit';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $get_all_gedung = $this->db->query("select * from gedung")->result();
        $data = array(
            'get_all_gedung' => $get_all_gedung,
            'nama_unit' => set_value('nama_unit'),
            'nomor' => set_value('nomor'),
            'id_gedung' => set_value('id_gedung'),
            'spek' => set_value('spek'),
            'foto' => set_value('foto'),
            'id_unit' => set_value('id_unit'),
            'ket' => set_value('ket'),
            'lantai' => set_value('lantai'),
            'biaya_sewa' => set_value('biaya_sewa'),
            'kode_unit' => set_value('kode_unit'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Unit/create_action',
            'page' => 'Unit Add',
            'folder' => 'unit',
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
            $config['upload_path'] = './assets/img/unit/';
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
            $config['max_size'] = '2048';
            $config['max_width']  = '2047';
            $config['max_height']  = '1366';
            $config['file_name'] = $nmfile;
            $this->upload->initialize($config);
            if (!empty($_FILES['img']['name'])) {
                $this->upload->do_upload('img');
                $data = array(
                    'nama_unit' => $this->input->post('nama_unit', TRUE),
                    'nomor' => $this->input->post('nomor', TRUE),
                    'id_gedung' => $this->input->post('id_gedung', TRUE),
                    'spek' => $this->input->post('spek', TRUE),
                    'foto' => 'http://nama_domain_anda.com/apartemen/assets/img/unit/' . $rand . '.' . $ext,
                    'ket' => $this->input->post('ket', TRUE),
                    'lantai' => $this->input->post('lantai', TRUE),
                    'biaya_sewa' => $this->input->post('biaya_sewa', TRUE),
                    'kode_unit' => $this->input->post('kode_unit', TRUE),
                );
                $simpan = $this->Unit_model->insert($data);
            } else {
                $data = array(
                    'nama_unit' => $this->input->post('nama_unit', TRUE),
                    'nomor' => $this->input->post('nomor', TRUE),
                    'id_gedung' => $this->input->post('id_gedung', TRUE),
                    'spek' => $this->input->post('spek', TRUE),
                    'ket' => $this->input->post('ket', TRUE),
                    'lantai' => $this->input->post('lantai', TRUE),
                    'biaya_sewa' => $this->input->post('biaya_sewa', TRUE),
                    'kode_unit' => $this->input->post('kode_unit', TRUE),
                );
                $simpan = $this->Unit_model->insert($data);
            }
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Unit'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id)
    {
        $row = $this->Unit_model->get_by_id($id);
        $get_user = $this->db->query("select * from gedung where id_gedung = '$row->id_gedung'")->row();
        $get_all_gedung = $this->db->query("select * from gedung")->result();
        $data = array(
            'get_all_gedung' => $get_all_gedung,
            'id_gedung' => set_value('id_gedung', $get_user->id_gedung),
            'nama_unit' => set_value('nama_unit', $row->nama_unit),
            'nomor' => set_value('nomor', $row->nomor),
            'spek' => set_value('spek', $row->spek),
            'foto' => set_value('foto', $row->foto),
            'id_unit' => set_value('id_unit', $row->id_unit),
            'ket' => set_value('ket', $row->ket),
            'lantai' => set_value('lantai', $row->lantai),
            'biaya_sewa' => set_value('biaya_sewa', $row->biaya_sewa),
            'kode_unit' => set_value('kode_unit', $row->kode_unit),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Unit/update_action/"' . $id . '"',
            'page' => 'Unit Update',
            'folder' => 'unit',
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
        $config['upload_path'] = './assets/img/unit/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (!empty($_FILES['img']['name'])) {
            $this->upload->do_upload('img');
            $data = array(
                'nama_unit' => $this->input->post('nama_unit', TRUE),
                'nomor' => $this->input->post('nomor', TRUE),
                'id_gedung' => $this->input->post('id_gedung', TRUE),
                'spek' => $this->input->post('spek', TRUE),
                'foto' => 'http://nama_domain_anda.com/apartemen/assets/img/unit/' . $rand . '.' . $ext,
                'ket' => $this->input->post('ket', TRUE),
                'lantai' => $this->input->post('lantai', TRUE),
                'biaya_sewa' => $this->input->post('biaya_sewa', TRUE),
                'kode_unit' => $this->input->post('kode_unit', TRUE),
            );
        } else {
            $data = array(
                'nama_unit' => $this->input->post('nama_unit', TRUE),
                'nomor' => $this->input->post('nomor', TRUE),
                'id_gedung' => $this->input->post('id_gedung', TRUE),
                'spek' => $this->input->post('spek', TRUE),
                'ket' => $this->input->post('ket', TRUE),
                'lantai' => $this->input->post('lantai', TRUE),
                'biaya_sewa' => $this->input->post('biaya_sewa', TRUE),
                'kode_unit' => $this->input->post('kode_unit', TRUE),
            );
        }

        $this->Unit_model->update($this->input->post('id_unit', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Unit'));
    }

    public function read($id)
    {
        $row = $this->Unit_model->get_by_id($id);
        $get_user = $this->db->query("select * from gedung where id_gedung = '$row->id_gedung'")->row();
        $get_all_gedung = $this->db->query("select * from gedung")->result();
        $data = array(
            'get_all_gedung' => $get_all_gedung,
            'id_gedung' => set_value('id_gedung', $get_user->id_gedung),
            'nama_unit' => set_value('nama_unit', $row->nama_unit),
            'nomor' => set_value('nomor', $row->nomor),
            'spek' => set_value('spek', $row->spek),
            'foto' => set_value('foto', $row->foto),
            'id_unit' => set_value('id_unit', $row->id_unit),
            'ket' => set_value('ket', $row->ket),
            'lantai' => set_value('lantai', $row->lantai),
            'biaya_sewa' => set_value('biaya_sewa', $row->biaya_sewa),
            'kode_unit' => set_value('kode_unit', $row->kode_unit),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Unit/update_action/"' . $id . '"',
            'page' => 'Unit Update',
            'folder' => 'unit',
            'page_name' => 'form',
        );

        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Unit_model->get_by_id($id);

        if ($row) {
            $this->Unit_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Unit'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Uni'));
        }
    }

    function get_data()
    {
        $list = $this->Unit_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $get_apt = $this->db->query("select * from gedung where id_gedung = '$field->id_gedung'")->row();
            // var_dump($field->user_id);die();
            $no++;
            $img = '<img src=' . $field->foto . ' width="45%">';
            $row = array();
            $row[] = $no;
            $row[] = $get_apt->nama_gedung;
            $row[] = $field->nama_unit;
            $row[] = $field->nomor;
            $row[] = $field->spek;
            $row[] = $img;
            $row[] = '<td> 
                        <div class="btn-group">
                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="' . base_url() . 'index.php/Unit/read/' . $field->id_unit . '">
                                        <i class="icon-eye"></i> View </a>
                                </li>
                                <li>
                                    <a href="' . base_url() . 'index.php/Unit/update/' . $field->id_unit . '">
                                        <i class="icon-pencil"></i> Edit </a>
                                </li>
                                <li>
                                    <a onclick="confirmDelete(' . $field->id_unit . '); return false;">
                                        <i class="icon-trash"></i> Hapus </a>
                                </li>
                            </ul>
                        </div>
                    </td>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Unit_model->count_all(),
            "recordsFiltered" => $this->Unit_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_unit', 'nama_unit', 'trim|required');
        $this->form_validation->set_rules('nomor', 'nomor', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
