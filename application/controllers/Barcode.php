<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barcode extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
        $this->load->model('Barcode_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'barcode';
        $data['page'] = 'Barcode';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create()
    {
        $data = array(
            'id' => set_value('id'),
            'info' => set_value('info'),
            'keterangan' => set_value('keterangan'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Barcode/create_action',
            'page' => 'Barcode Add',
            'folder' => 'barcode',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function create_action()
    {
        $this->load->helper('string');
        $this->load->library('ciqrcode');

        $info = $this->input->post('info', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $name = str_replace(' ', '_',strtolower(substr($info, 0, 45)));
        $code = random_string('alnum', 27);
 
        $config['cacheable']    = true;                      
        $config['cachedir']     = './assets/upload/qrcode/'; 
        $config['errorlog']     = './assets/upload/qrcode/'; 
        $config['imagedir']     = './assets/upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true;                      
        $config['size']         = '1024';                    
        $config['black']        = array(224,255,255);        
        $config['white']        = array(70,130,180);         
        $this->ciqrcode->initialize($config);
 
        $image_name = $name.'.png'; //buat name dari qr code
 
        $params['data'] = $code; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $data = array(
            'info' => $info,
            'qrcode' => $code,
            'qrimage' => '/assets/upload/qrcode/'.$name.'.png',
            'keterangan' => $keterangan
        );
        
        $simpan = $this->Barcode_model->insert($data);
        if ($simpan) {
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(base_url('index.php/Barcode'));
        } else {
            $this->session->set_flashdata('error', 'Failed to Saved Data');
            $this->create();
        }
    }

    public function read($id)
    {
        $get_users = $this->db->query("select * from user")->result();
        $get_fasilitas = $this->db->query("select * from fasilitas_gedung")->result();
        $row = $this->db->query("select *
        from absensi
        ")->row();

        $data = array(
            'get_users' => $get_users,
            'get_fasilitas' => $get_fasilitas,
            'id' => set_value('id', $row->id),
            'user_id' => set_value('user_id', $row->user_id),
            'fasilitas_id' => set_value('fasilitas_id', $row->fasilitas_id),
            'time' => set_value('time', $row->time),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Restaurant/update_action/"' . $id . '"',
            'page' => 'Scan View',
            'folder' => 'scan',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function approve($id)
    {
        $row = $this->Scan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_approve' => '1',
            );
            // var_dump($id);
            // die();
            $this->Scan_model->update($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Restaurant'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Restaurant'));
        }
    }

    function get_data()
    {
        $list = $this->Barcode_model->get_datatables();
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
            $pic = '<img src=' . base_url() . $field->qrimage . ' width="100%">';
            $row = array();
            $row[] = $no;
            $row[] = $field->info;
            $row[] = $field->qrcode;
            $row[] = $pic;
            $row[] = empty($field->keterangan)?'-':$field->keterangan;

            $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Scan/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Barcode_model->count_all(),
            "recordsFiltered" => $this->Barcode_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
