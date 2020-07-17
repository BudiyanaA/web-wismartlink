<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_makanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('List_makanan_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'list_makanan';
        $data['page'] = 'List_makanan';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        $row = $this->db->query("select e.id, e.img, u.nama_resto, e.nama_makanan, e.harga, e.is_deleted
        from makanan_restaurant e  
        left join restaurant u on e.id_resto = u.id
        where e.id = '$id'
        ")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'img' => set_value('img', base_url() . $row->img),
            'nama_resto' => set_value('nama_resto', $row->nama_resto),
            'nama_makanan' => set_value('nama_makanan', $row->nama_makanan),
            'harga' => set_value('harga', $row->harga),
            'is_deleted' => set_value('is_deleted', $row->is_deleted),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Toko/update_action/"' . $id . '"',
            'page' => 'List Makanan View',
            'folder' => 'list_makanan',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    function get_data()
    {
        $list = $this->List_makanan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $pic = '<img src=' . base_url() . $field->img . ' width="45%">';
            if ($field->is_deleted == '1') {
                $status = 'Tersedia';
            } else {
                $status = 'Tidak Tersedia';
            }

            $row = array();
            $row[] = $no;
            $row[] = $field->nama_resto;
            $row[] = $field->nama_makanan;
            $row[] = 'Rp. ' . number_format($field->harga, 2);
            $row[] = $pic;
            $row[] = $status;

            $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/List_makanan/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->List_makanan_model->count_all(),
            "recordsFiltered" => $this->List_makanan_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
