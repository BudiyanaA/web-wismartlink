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

            'periode_tagihan' => "Maret 2019",
            'jatuh_tempo' => "10/02/2019",
            'tanggal_bast' => "12/08/2007",

            'biaya_keamanan' => 'Rp. ' . number_format(50000 , 2),
            'biaya_kebersihan' => 'Rp. ' . number_format(50000 , 2),
            'biaya_admin' => 'Rp. ' . number_format(30000 , 2),
            'sinking_fund' => 'Rp. ' . number_format(42000 , 2),
            'biaya_operasional' => 'Rp. ' . number_format(50000 , 2),
            'biaya_service' => 'Rp. ' . number_format(300000 , 2),

            'pdam' => array(
                'tagihan_pdam' => 'Rp. ' . number_format($get_invoice->pdam , 2),
                'meteran_awal' => 0,
                'meteran_akhir' => 10,
            ),
            'listrik' => array(
                'tagihan_listrik' => 'Rp. ' . number_format($get_invoice->listrik , 2),
                'meteran_awal' => 1618,
                'meteran_akhir' => 3528,
            ),
            
            'grand_total' => $total,
            'is_paid' => $get_invoice->is_paid?"Lunas":"Belum Lunas",
            
            'nomor_invoice' => $nomor_invoice,
            'nama_user' => $get_user->nama,
            'nama_unit' => $get_unit->nama_unit,
            'nomor' => $get_unit->nomor,
            'lantai' => $get_unit->lantai,
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

    public function cetak_invoice_get()
    {
        $nomor = $this->get('nomor');

        // $id_user = substr($nomor_invoice,0,1);
        // $id_unit = substr($nomor_invoice,1,1);
        // $month = substr($nomor_invoice,1,1);
        // $year = substr($nomor_invoice,1,1);

        $data['invoice'] = $this->db->get('invoice')->result()[0];
        $get_invoice = $this->db->query("select * from invoice where no_invoice = '$nomor'")->row();
        $get_user = $this->db->query("select * from user where user_id = '$get_invoice->id_user'")->row();
        $get_unit = $this->db->query("select * from unit where id_unit = '$get_user->idunit'")->row();
        $get_gedung = $this->db->query("select * from gedung where id_gedung = '$get_unit->id_gedung'")->row();
        $get_apartemen = $this->db->query("select * from apartemen where id_apt = '$get_gedung->id_apt'")->row();

        $data['nomor_invoice'] = $nomor;
        $data['nama_user'] = $get_user->nama;
        $data['nama_unit'] = $get_unit->nama_unit;
        $data['lantai'] = $get_unit->lantai;
        $data['nomor'] = $get_unit->nomor;
        $data['nama_apartemen'] = $get_apartemen->nama_apt;
        $data['nama_gedung'] = $get_gedung->nama_gedung;
        $data['alamat'] = $get_gedung->alamat;
        $data['kota'] = $get_gedung->kota;

        $get_tagihan_apartemen = $this->db->query("select * from unit where id_unit = '$get_user->idunit'")->row();
        $data['tagihan_apartemen'] = $get_tagihan_apartemen->biaya_sewa;

        // $this->db->join('barang', 'barang.ID_BARANG = detil_pengiriman.ID_BARANG');
		// $this->db->where('ID_PENGIRIMAN', $data['tracking'][0]->ID_PENGIRIMAN);
		// $this->db->order_by('barang.ID_BARANG','DESC');
		// $data['barang'] = $this->db->get('detil_pengiriman')->result();

        // $this->db->where('ID_PENGIRIMAN', $data['tracking'][0]->ID_PENGIRIMAN);
		// $data['pengiriman'] = $this->db->get('pengiriman')->result();

        // print_r($data['tracking']);
        $this->load->view('invoice/cetak', $data);
    }

    public function ketentuan_get() {
        $data = "
        <p>Ketentun-ketentuan:</p>
        <ol>
            <li>Service Charge : Luas (M2) * Rp. 8500</li>
            <li>Sinking Fund : Luas (M2) * Rp. 1000</li>
            <li>Biaya Beban Listrik / KVA : Rp. 40,360</li>
            <li>Biaya Pemakaian Listrik / Kwh : Rp. 1350</li>
            <li>Biaya Listrik termasuk 3 % PJU :</li>
            <li>Biaya Air Bersih / M3 : Rp. 12,550</li>
            <li>Biaya Pemeliharaan Air 3/4* : Rp. 9000</li>
            <li>Biaya Pemeliharaan Air 1* : Rp. 11,000</li>
            <li>Biaya Abonemen Air 3/4* : Rp. 23,755</li>
            <li>Biaya Abonemen Air 1* : Rp. 47,510</li>
            <li>Biaya Asuransi : Luas (M2) * Rp. 4900</li>
        </ol>
        ";

        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }
}