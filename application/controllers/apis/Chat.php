<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Chat extends REST_Controller
{
    // get list user
    public function user_get() {
        $me = $_GET['user_id'];

        // $user = $this->db->get_where('user', array('user_id' => $me), 1)->row();
        // if (in_array($user->level, [12, 13, 14])) {
        //     $friend = $this->db->query('select user_id, nama from user where user_id !="'.$me.'"')->result_array();
        // } else {
        //     $friend = $this->db->query('select user_id, nama from user where level = 1 and user_id !="'.$me.'"')->result_array();
        // }
        $friend = $this->db->query('select user_id, nama from user where user_id !="'.$me.'"')->result_array();

        // foreach ($friend as $f) {
        //     $chat = $this->db
        //     ->from('chat') 
        //     ->join('user', 'chat.sender = user.user_id')
        //     ->where('(sender = ' . $me . ' AND receiver = ' . $f["id"] . ')')
        //     ->or_where('(receiver = ' . $me . ' AND sender = ' . $f->id . ')')
        //     ->order_by('chat.time', 'desc');
        //     // ->limit(100)
        //     // ->select('nama, message, time, sender, receiver')
        //     // ->get()
        //     // ->result_array();

        //     // $chat = Chat::select('message')
        //     // ->where(function($query) use ($f){
        //     //     $query->where('chats.send_by', '=', Auth::user()->id)
        //     //           ->where('chats.send_to', '=', $f->id);
        //     // })
        //     // ->orWhere(function($query) use ($f){
        //     //     $query->where('chats.send_to', '=', Auth::user()->id)
        //     //           ->where('chats.send_by', '=', $f->id);
        //     // })
        //     // ->orderByDesc('chats.created_at');

        //     // $f->recent = $chat->first();
        //     $f->notif = $chat->where('(receiver = ' . $me . ')')
        //     ->where('is_read = 0')->get()->count();
        // }


        if (!$friend) {
            $wrapper = array(
                'status' => 404,
                'message' => 'other_user_not_found',
            );
        } else {
            $wrapper = array(
                'status' => 200,
                'message' => 'get_list_friend_success',
                'data' => gettype($friend)
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }

    // get list Security
    public function security_get() {
        $me = $_GET['user_id'];
        $friend = $this->db->query('select user_id, nama from user where level in (12, 13, 14) and user_id !="'.$me.'"')->result_array();

        if (!$friend) {
            $wrapper = array(
                'status' => 404,
                'message' => 'other_user_not_found',
            );
        } else {
            $wrapper = array(
                'status' => 200,
                'message' => 'get_list_friend_success',
                'data' => $friend
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }

    // get message
    public function message_get() {
        $me = $_GET['me'];
        $friend = $_GET['friend'];

        $with= $this->db->get_where('user', array('user_id' => $friend), 1)->row();
        $chat = $this->db
            ->from('chat') 
            ->join('user', 'chat.sender = user.user_id')
            ->where('(sender = ' . $me . ' AND receiver = ' . $friend . ')')
            ->or_where('(receiver = ' . $me . ' AND sender = ' . $friend . ')')
            ->order_by('chat.time', 'desc')
            ->limit(100)
            ->select('nama, message, time, sender, receiver')
            ->get()
            ->result_array();
        
        $data = array(
            'name' => $with->nama,
            'chats' => $chat
        );

        if (!$data) {
            $wrapper = array(
                'status' => 404,
                'message' => 'other_user_not_found',
            );
        } else {
            $wrapper = array(
                'status' => 200,
                'message' => 'get_list_friend_success',
                'data' => $data
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }

    // send message
    public function send_post() {
        $data = array(
            'sender' => $this->post('sender'),
            'receiver' => $this->post('receiver'),
            'message' => $this->post('message'),
            'time' => date('Y-m-d H:i:s')
        );

        $save = $this->db->insert('chat', $data);

        if (!$save) {
            $wrapper = array(
                'status' => 404,
                'message' => 'failed',
            );
        } else {
            $wrapper = array(
                'status' => 200,
                'message' => 'send_message_success',
                'data' => $data
            );
        }

        $this->response($wrapper, $wrapper['status']);
    }
}
