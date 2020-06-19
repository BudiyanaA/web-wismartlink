<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Helpdesk extends REST_Controller
{
    private function last_id() {
        $id = $this->db->query('select max(id) from ticket')->row('max(id)');
        return $id + 1;
    }

    // Post Ticket Baru
    public function ticket_post() {
        $id = sprintf("%05d", $this->last_id());
        $data = array(
            'id_user' => $this->post('id_user'),
            'kode_tiket' => $id.'/ticket/'.date('m').'/'.date('Y'),
            'keterangan' => $this->post('keterangan'),
            'level' => 'urgent',
            'status' => 'Processed',
            'pic_id' => '1',
            'created_date' => date('Y-m-d H:i:s'),
            'updated_date' => date('Y-m-d H:i:s'),
        );

        $save = $this->db->insert('ticket', $data);

        if (!$save) {
            $wrapper = array(
                'status' => 401,
                'message' => 'failed',
                'data' => null
            );
        } else {
            $wrapper = array(
                'status' => 201,
                'message' => 'success',
                'data' => $data
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }

    // Get Ticket
    public function ticket_get() {
        $kode_tiket = $_GET['kode_tiket'];
        if(!isset($kode_tiket)) {
            $wrapper = array(
                'status' => 404,
                'message' => 'failed',
                'data' => null
            );
        } else {
            $data = $this->db->query('select * from ticket where kode_tiket ='.$kode_tiket)->result_array();
            foreach ($data as $key => $field){
                $message = $this->db->query('select * from ticket_message where ticket_id ='.$data[$key]['id'])->result_array();
                $data[$key]['message'] = $message;
            }
    
            $wrapper = array(
                'status' => 200,
                'message' => 'success',
                'data' => $data
            );
        }
        $this->response($wrapper, $wrapper['status']);
    }

    // Post Balasan Baru
    //* Belum termasuk tiket file
    public function comment_post() {
        $kode_tiket = $this->post('kode_tiket');
        $ticket_id = $this->db->query('select id from ticket where kode_tiket="'.$kode_tiket.'"')->row('id');
        $data = array(
            'sent_by' => 'user',
            'ticket_id' => $ticket_id,
            'message' => $this->post('message'),
            'created_date' => date('Y-m-d H:i:s'),
            'updated_date' => date('Y-m-d H:i:s'),
        );

        $save = $this->db->insert('ticket_message', $data);

        if (!$save) {
            $wrapper = array(
                'status' => 404,
                'message' => 'failed',
                'data' => null
            );
        } else {
            $wrapper = array(
                'status' => 201,
                'message' => 'success',
                'data' => $data
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }

    // Put Close Ticket
    public function close_put() {
        $kode_tiket = $this->put('kode_tiket');
        $ticket_id = $this->db->query('select id from ticket where kode_tiket="'.$kode_tiket.'"')->row('id');
        $data = array(
            'id' => $ticket_id,
            'status' => 'Selesai',
            'updated_date' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $ticket_id);
        $save = $this->db->update('ticket', $data);

        if (!$save) {
            $wrapper = array(
                'status' => 404,
                'message' => 'failed',
                'data' => null
            );
        } else {
            $wrapper = array(
                'status' => 200,
                'message' => 'success',
                'data' => $data
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }
}