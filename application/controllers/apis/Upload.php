<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Upload extends REST_Controller
{
    public function index_post() {
        $image_name = md5(uniqid(rand(), true));
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $file_name = $image_name . '.' . $ext;
        $uploaddir = APPPATH. '../assets/upload/report/';
        $uploadfile = $uploaddir . $file_name;
    
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            $data = array(
                'title' => $this->post('title'),
                'image' => $file_name,
                'description' => $this->post('description')
            );

            $save = $this->db->insert('upload', $data);;

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
        } else {
            $wrapper = array(
                'status' => 401,
                'message' => 'upload_failed_try_again',
                'data' => null
            );       
        }
        $this->response($wrapper, $wrapper['status']);
    }
    
}