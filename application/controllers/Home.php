<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'home';
        $data['page_name'] = 'index';

        $data['user'] = $this->db->query("select COUNT(*) as countUser from user")->row('countUser');
        $data['unit'] = $this->db->query("select COUNT(*) as countUnit from unit")->row('countUnit');
        $data['toko'] = $this->db->query("select COUNT(*) as countToko from toko")->row('countToko');
        $data['resto'] = $this->db->query("select COUNT(*) as countRestaurant from restaurant")->row('countRestaurant');
        $this->load->view('template/index', $data);
    }

    public function home()
    {
        $data['title'] = "API OTT";
        $data['page_name'] = 'OTT';
        $this->load->view('api/home/home', $data);
    }

    public function detail($id)
    {
        $data['title'] = "API OTT";
        $data['id'] = $id;
        $data['page_name'] = 'OTT';
        $this->load->view('api/home/detail', $data);
    }
}
