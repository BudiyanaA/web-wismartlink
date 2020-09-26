<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Contact extends REST_Controller
{
    public function index_get() {
        $type = $_GET['type']; // maintenance, roomservice
        
        if ($type == "maintenance") {
            $data = array(
                "type" => "Maintenance",
                "number" => "+628118378221"
            );
        } else if ($type == "room_service") {
            $data = array(
                "type" => "Room Service",
                "number" => "+6282113344556"
            );
        } else if ($type == "security") {
            $data = array(
                "type" => "Room Service",
                "number" => "+6281234567891"
            );
        } else {
            $data = array(
                "type" => "error",
                "number" => ""
            );
        }

        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }
}