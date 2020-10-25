<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Resto extends REST_Controller
{
    public function makanan_promo_post()
    {
        $param = $this->post();
        $keyword = $param['keyword'];

        $brg = $this->db->query("select a.id, a.nama_resto, a.nama_makanan, a.id_resto, a.harga, a.img, a.keterangan from v_makanan a  where a.nama_resto like '%$keyword%' AND a.nama_makanan like '%$keyword%' order by a.id desc")->result();
        if ($brg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'nama_resto' => $row->nama_resto,
                    'nama_makanan' => $row->nama_makanan,
                    'keterangan' => $row->keterangan,
                    'id_resto' => $row->id_resto,
                    'harga' => $row->harga,
                    'harga_promo' => (string) ($row->harga - 0.2*$row->harga), // hardcode
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