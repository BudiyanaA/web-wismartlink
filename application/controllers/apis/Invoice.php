<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Invoice extends REST_Controller
{
    public function detail_post() {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id = $param['id_user'];
        $nomor_invoice = $param['nomor_invoice'];
        $total = $param['total'];

        $get_invoice = $this->db->query("select * from invoice where id = '$id'")->row();
        $get_user = $this->db->query("select * from user where user_id = '$get_invoice->id_user'")->row();
        $tanggal_sewa = $get_invoice->invoice_date;
        $datetime = new DateTime($tanggal_sewa);
        $month = $datetime->format('n');
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $tagihan_bulan = $bulan[$month];
        $get_tagihan_sewa_fasilitas = $this->db->query("select * from request_fasilitas join fasilitas_gedung on fasilitas_gedung.id = request_fasilitas.fasilitas_id where id_user = '$get_invoice->id_user' AND MONTH(request_start) = '$month'")->result();
        $get_tagihan_apartemen = $this->db->query("select * from unit where id_unit = '$get_user->idunit'")->row();
        $get_tagihan_maintenance = $this->db->query("select * from request_maintenance where id_user = '$get_invoice->id_user' AND MONTH(request_date) = '$month'")->result();
        $get_tagihan_room_service = $this->db->query("select * from request_room_service where id_user = '$get_invoice->id_user' AND MONTH(request_date) = '$month'")->result();

        $get_unit = $this->db->query("select * from unit where id_unit = '$get_user->idunit'")->row();
        $get_gedung = $this->db->query("select * from gedung where id_gedung = '$get_unit->id_gedung'")->row();
        $get_apartemen = $this->db->query("select * from apartemen where id_apt = '$get_gedung->id_apt'")->row();

        $tag_maintenance = [];
        foreach ($get_tagihan_maintenance as $key => $value) {
            $tag_maintenance[] = array(
                'item'  => "Maintenance",
                'description' => $value->request,
                'total' => 'Rp. ' . number_format($value->charge , 2),
            );
        }
        
        $tag_room_service = [];
        foreach ($get_tagihan_room_service as $key => $value) {
            $tag_room_service[] = array(
                'item'  => "Room Service",
                'description' => $value->request,
                'total' => 'Rp. ' . number_format($value->charge , 2),
            );
        }

        $tag_sewa_fasilitas = [];
        foreach ($get_tagihan_sewa_fasilitas as $key => $value) {
            $tag_sewa_fasilitas[] = array(
                'item'  => "Sewa Fasilitas",
                'description' => $value->fasilitas,
                'total' => 'Rp. ' . number_format($value->biaya , 2),
            );
        }

        $data = array(
            'sewa_apartemen' => array(
                'item'  => "Biaya sewa apartemen",
                'description' => "Biaya sewa apartemen per bulan",
                'total' => 'Rp. ' . number_format($get_tagihan_apartemen->biaya_sewa , 2),
            ),
            'maintenance_charge' => $tag_maintenance,
            'room_service' => $tag_room_service,
            'sewa_fasilitas' => $tag_sewa_fasilitas,

            'tagihan_pdam' => 'Rp. ' . number_format($get_invoice->pdam , 2),
            'tagihan_listrik' => 'Rp. ' . number_format($get_invoice->listrik , 2),

            'grand_total' => $total,
            'nomor_invoice' => $nomor_invoice,
            'nama_user' => $get_user->nama,
            'nama_unit' => $get_unit->nama_unit,
            'nomor' => $get_unit->nomor,
            'lantain' => $get_unit->lantai,
            'nama_gedung' => $get_gedung->nama_gedung,
            'alamat' => $get_gedung->alamat,
            'kota' => $get_gedung->kota,
            'nama_apartemen' => $get_apartemen->nama_apt
        );

        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }
}