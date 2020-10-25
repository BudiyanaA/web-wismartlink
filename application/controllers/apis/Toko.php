<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Toko extends REST_Controller
{
    public function barang_promo_post()
    {
        $param = $this->post();
        $keyword = $param['keyword'];

        $brg = $this->db->query("select a.id, a.nama_toko, a.nama_barang, a.id_toko, a.harga, a.img, a.is_deleted, a.keterangan from v_barang_toko a WHERE a.nama_toko like '%$keyword%' AND a.nama_barang LIKE '%$keyword%' order by a.id desc")->result();
        if ($brg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'nama_toko' => $row->nama_toko,
                    'nama_barang' => $row->nama_barang,
                    'id_toko' => $row->id_toko,
                    'harga' => $row->harga,
                    'harga_promo' => (string) ($row->harga - 0.2*$row->harga), // hardcode
                    'keterangan' => $row->keterangan,
                    'img' => base_url() . $row->img,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

}