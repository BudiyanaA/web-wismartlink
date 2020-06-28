<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Voucher extends REST_Controller
{
    public function index_get() {
        $data = $this->db->query('select * from voucher')->result_array();
        foreach ($data as $key => $field){
            $data[$key]['image'] = base_url().'assets/upload/voucher/'.$data[$key]['image'];
        }
        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }
}