<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Role extends REST_Controller
{
    public function index_get() {
        $data = $this->db->query('
            select role.id, role_name, group_role_name
            from role
            left join group_role
            on role.id_group_role = group_role.id
        ')->result_array();
        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }

    public function menu_get() {
        $data = $this->db->query('
            select *
            from menu
        ')->result_array();
        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }

    public function restrict_post() {
        $id = $this->post('menu_id');
        $data = $this->db->query('
            select *
            from menu
            where id = '.$id.'
        ')->result_array();

        foreach ($data as $key => $field){
            $data[$key]['add'] = $this->db->query('
                select id, role_name
                from role
                where id in ('. $data[$key]['add'] .')
            ')->result_array();
            $data[$key]['edit'] = $this->db->query('
                select id, role_name
                from role
                where id in ('. $data[$key]['edit'] .')
            ')->result_array();
            $data[$key]['delete'] = $this->db->query('
                select id, role_name
                from role
                where id in ('. $data[$key]['delete'] .')
            ')->result_array();
            $data[$key]['view'] = $this->db->query('
                select id, role_name
                from role
                where id in ('. $data[$key]['view'] .')
            ')->result_array();
        }

        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }

    public function guard_post() {
        $menu = $this->post('menu_id');
        $method = $this->post('method');
        $role = $this->post('role_id');

        $data = $this->db->query('
            select menu.'.$method.'
            from menu
            where id = '.$menu.'
        ')->row($method);

        if (in_array($role, explode(',', $data))) {
            $wrapper = array(
                'status' => 200,
                'success' => true,
            );
        } else {
            $wrapper = array(
                'status' => 200,
                'success' => false,
            );  
        }
        $this->response($wrapper, $wrapper['status']);
    }
}