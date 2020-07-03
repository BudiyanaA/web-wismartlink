<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Test extends REST_Controller
{
    public function index_get($key = 1) {

        $verif = $this->db->query('select * from test')->result_array();
        
        $batas = new DateTime($verif[0]['batas']);
        $sekarang = new DateTime(date('Y-m-d H:i:s'));

        $interval = $sekarang->diff($batas);
        
        $sisa = ($interval->d*86400) + ($interval->h*3600) + ($interval->i*60) + $interval->s;

        if ($key == 1) {
            if ($batas > $sekarang) {
                $wrapper = array(
                    'status' => 200,
                    'message' => 'access_granted',
                    'sisa' => $sisa
                );   
            } else {
                $wrapper = array(
                    'status' => 200,
                    'message' => 'access_denied',
                    'data' => $verif,
                );
            }
        } else {
            $wrapper = array(
                'status' => 404,
                'message' => 'access_denied',
                'data' => $verif,
            );
        }


        $this->response($wrapper, $wrapper['status']);
    }
}