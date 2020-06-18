<?php
defined('BASEPATH') or exit('No direct script access allowed');

class List_transaksi_resto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('List_transaksi_resto_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'list_transaksi_resto';
        $data['page'] = 'List_transaksi_resto';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        $row = $this->db->query("select e.id, us.nama, e.id_user, e.id_makanan, r.nama_resto,  u.nama_makanan, u.harga, u.img, e.jumlah, e.total_harga, e.status, e.created_date 
        from order_makanan e 
        LEFT JOIN makanan_restaurant u ON e.id_makanan = u.id
        LEFT JOIN restaurant r ON u.id_resto = r.id
        LEFT JOIN user us ON e.id_user = us.user_id
        where e.id = '$id'")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'img' => set_value('img', $row->img),
            'nama_resto' => set_value('nama_resto', $row->nama_resto),
            'nama_makanan' => set_value('nama_makanan', $row->nama_makanan),
            'harga' => set_value('harga', $row->harga),
            'total_harga' => set_value('total_harga', $row->total_harga),
            'jumlah' => set_value('jumlah', $row->jumlah),
            'id_user' => set_value('id_user', $row->id_user),
            'nama' => set_value('nama', $row->nama),
            'status' => set_value('status', $row->status),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Toko/update_action/"' . $id . '"',
            'page' => 'List Transaksi View',
            'folder' => 'list_transaksi_resto',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    function get_data()
    {
        $list = $this->List_transaksi_resto_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $pic = '<img src=' . $field->img . ' width="45%">';
            if ($field->status == '1') {
                $status = 'Lunas';
            } else {
                $status = 'Belum Lunas';
            }
            $get_data_user = $this->db->query("select e.id, e.img, u.nama, e.nama_toko, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt
            from toko e 
            left join user u on e.id_user = u.user_id
            left join unit un on u.idunit = un.id_unit
            left join gedung g on un.id_gedung = g.id_gedung
            left join apartemen a on g.id_apt = a.id_apt  where user_id = '$field->id_user'")->row();
            $alamat = 'Apartemen ' . $get_data_user->nama_apt . ', Gedung ' . $get_data_user->nama_gedung . ', ' . $get_data_user->nama_unit . ', Lantai ' . $get_data_user->lantai . ', Nomor ' . $get_data_user->nomor;

            $nama = '<a data-toggle="modal" href="#basic"> ' . $field->nama . ' </a>
                <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Data Pembeli</h4>
                            </div>
                            <div class="modal-body"> 
                            <div class="mt-comment">
                            <div class="mt-comment-img">
                                <img src="' . $field->foto . '" width="20%"> </div>
                            <div class="mt-comment-body">
                                <div class="mt-comment-info">
                                    <span class="mt-comment-author">Nama : ' . $field->nama . '</span>
                                </div>
                                <div class="mt-comment-text"> Alamat : ' . $alamat . ' </div>
                            </div>
                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>';
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_makanan;
            $row[] = 'Rp. ' . number_format($field->harga, 2);
            $row[] = $pic;
            $row[] = $field->nama_resto;
            $row[] = $field->jumlah;
            $row[] = 'Rp. ' . number_format($field->total_harga, 2);
            $row[] = $status;
            $row[] = $nama;

            $row[] = '<td>
            <a href="' . base_url() . 'index.php/List_transaksi_resto/read/' . $field->id . '" class="btn btn-outline btn-circle btn-sm blue">
            <i class="fa fa-pdf"></i> Lihat Detail </a>
            </td>';
            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->List_transaksi_resto_model->count_all(),
            "recordsFiltered" => $this->List_transaksi_resto_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
