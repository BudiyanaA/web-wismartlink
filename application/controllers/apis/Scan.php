<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Scan extends REST_Controller
{
    public function index_get() {
        /**
         * "barberque": "11592636406TVhNxEFXpm3zRIKZ",
         * "kolam renang": "215926364069bHn8QXykRCB6hO2",
         * "gym": "31592636406L0QJvYm3TjoVnAd1"
         */

        //if qr code none

        $qrcode = $_GET['qrcode'];
        $img = $this->db->query('select qrimage from fasilitas_gedung where qrcode ="'.$qrcode.'"')->row('qrimage');
        $file = './assets/upload/qrcode/' . $img;
        header('Content-type: image/png');
        readfile($file); 
    }

    public function absen_post() {

        $data = array(
            'user' => $this->post('user'),
            'qrcode' => $this->post('qrcode'),
            'time' => date('Y-m-d H:i:s'),
        );

        $fasilitas = $this->db->query('select * from fasilitas_gedung where qrcode ="'.$data['qrcode'].'"')->result_array();
        $fasilitas[0]['time'] = $data['time'];
        $id_gedung = $this->db->query('select id from fasilitas_gedung where qrcode ="'.$data['qrcode'].'"')->row('id');

        $dataInput = array(
            'user_id' => $data['user'],
            'fasilitas_id' => $id_gedung,
            'time' => $data['time'],
        );

        $save = $this->db->insert('absensi', $dataInput);
        if (!$save) {
            $wrapper = array(
                'status' => 404,
                'message' => 'absen_failed',
                'data' => null
            );
        } else {
            $wrapper = array(
                'status' => 201,
                'message' => 'absen_success',
                'data' => $fasilitas
            );
        }
        $this->response($wrapper, $wrapper['status']);
    }

    public function fasilitas_post() {

        $name = underscore(strtolower($_GET['name']));
        $info = $_GET['info'];
 
        // get input
 
        $this->load->library('ciqrcode');
 
        $config['cacheable']    = true;                      
        $config['cachedir']     = './assets/upload/qrcode/'; 
        $config['errorlog']     = './assets/upload/qrcode/'; 
        $config['imagedir']     = './assets/upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true;                      
        $config['size']         = '1024';                    
        $config['black']        = array(224,255,255);        
        $config['white']        = array(70,130,180);         
        $this->ciqrcode->initialize($config);
 
        $image_name = $name.'.png'; //buat name dari qr code
 
        $params['data'] = $info; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
 
        // save to database

        $wrapper = array(
            'status' => 201,
            'message' => 'generate_qrcode_success',
            'data' => $params['savename']
        );
        $this->response($wrapper, $wrapper['status']);
    }
}