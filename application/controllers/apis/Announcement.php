<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Announcement extends REST_Controller
{
    public function index_get() {
        $data = $this->db->query('select * from announcement')->result_array();
        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }

    public function index_post() {    
        $data = array(
            'id_user' => $this->post('id_user'),
            'title' => $this->post('title'),
            'desc' => $this->post('desc'),
        );

        $save = $this->db->insert('announcement', $data);;
        if (!$save) {
            $wrapper = array(
                'status' => 401,
                'message' => 'something_wrong',
                'data' => null
            );
        } else {
            $wrapper = array(
                'status' => 201,
                'message' => 'upload_success',
                'data' => $data
            );
        }
        $this->response($wrapper, $wrapper['status']);
    }
}