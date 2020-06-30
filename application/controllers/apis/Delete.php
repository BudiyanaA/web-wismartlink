<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Delete extends REST_Controller
{
    public function fasilitas_post() {

        $param = $this->post();
        $dataDB = array(
            'fasilitas_id'          => $param['fasilitas_id'],
            'request_start'         => $param['request_start'],
            'request_end'           => $param['request_end'],
            'id_user'               => $param['id_user']
        );
        $this->db->where($dataDB);
        $delete = $this->db->delete('request_fasilitas');
        if ($delete) {
            $data = array(
                'success' => true,
                'message' => 'delete data success',
                'data' => $dataDB
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'delete data failed',
            );
            $this->response($data, 200);
        }
    }

    public function service_post() {
        $param = $this->post();
        $dataDB = array(
            'id_user'               => $param['id_user'],
            'request'               => $param['request'],
            'request_date'          => $param['request_date'],
        );
        $this->db->where($dataDB);
        $delete = $this->db->delete('request_room_service');
        if ($delete) {
            $data = array(
                'success' => true,
                'message' => 'delete data success',
                'data' => $dataDB
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'delete data failed',
            );
            $this->response($data, 200);
        }
    }

}