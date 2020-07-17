<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_toko extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Barang_toko_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'barang_toko';
        $data['page'] = 'Barang_toko';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        $row = $this->db->query("select e.id, e.img, u.nama_toko, e.nama_barang, e.harga, e.is_deleted
        from barang_toko e  
        left join toko u on e.id_toko = u.id
        where e.id = '$id'
        ")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'img' => set_value('img', base_url() . $row->img),
            'nama_toko' => set_value('nama_toko', $row->nama_toko),
            'nama_barang' => set_value('nama_barang', $row->nama_barang),
            'harga' => set_value('harga', $row->harga),
            'is_deleted' => set_value('is_deleted', $row->is_deleted),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Toko/update_action/"' . $id . '"',
            'page' => 'Barang Toko View',
            'folder' => 'barang_toko',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function selesai($id)
    {
        $row = $this->Barang_toko_model->get_by_id($id);

        if ($row) {
            $data = array(
                'is_closed' => '1',
            );
            $this->Barang_toko_model->update($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Emergency'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Emergency'));
        }
    }

    function get_data()
    {
        $list = $this->Barang_toko_model->get_datatables();
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
            $row[] = $field->nama_toko;
            $row[] = $field->nama_barang;
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
                            <a href="' . base_url() . 'index.php/Barang_toko/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Barang_toko_model->count_all(),
            "recordsFiltered" => $this->Barang_toko_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
