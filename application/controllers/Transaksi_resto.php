<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_resto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('tgl_indo');
        $this->load->model('Transaksi_resto_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['folder'] = 'transaksi_resto';
        $data['page'] = 'Transaksi Restoran';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function confirm($id)
    {
        $row = $this->Transaksi_resto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'status' => 'PAID',
            );
            $this->Transaksi_resto_model->update($row->id, $data);
            $this->session->set_flashdata('success', 'Konfirmasi Bayar Success');
            redirect(base_url('index.php/Transaksi_resto'));
        } else {
            $this->session->set_flashdata('error', 'Konfirmasi Bayar Failed');
            redirect(base_url('index.php/Transaksi_resto'));
        }
    }

    public function read($id)
    {
        $row = $this->db->query("select *
        from transaksi_order_makan 
        where id = '$id'
        ")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'kode_transaksi' => set_value('title', $row->kode_transaksi),
            'grand_total' => set_value('image', $row->grand_total),
            'status' => set_value('description', $row->status),
            'created_date' => set_value('description', $row->created_date),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Restaurant/update_action/"' . $id . '"',
            'page' => 'Transaksi Restoran View',
            'folder' => 'transaksi_resto',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    function get_data()
    {
        $list = $this->Transaksi_resto_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->kode_transaksi;
            $row[] = $field->grand_total;
            $row[] = $field->status;
            $row[] = longdate_indo(substr($field->created_date, 0, 10))." pada ".substr($field->created_date, 11, 8);

            if ($field->status == 'UNPAID') {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Transaksi_resto/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a onclick="confirmBayar(' . $field->id . '); return false;">
                                <i class="icon-check"></i> Konfirmasi </a>
                        </li>
                    </ul>
                </div>
            </td>';
            } else {
                $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Transaksi_resto/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                    </ul>
                </div>
            </td>';
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Transaksi_resto_model->count_all(),
            "recordsFiltered" => $this->Transaksi_resto_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
