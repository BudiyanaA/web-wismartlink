<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Home_model');
        if (!$this->session->userdata('site_lang')) {
            $this->load->library('session');
            $newdata = array(
                'site_lang'  => $this->config->item('language')
            );
            $this->session->set_userdata($newdata);
        }
        //Loading language from session variable
        $this->language = $this->session->userdata['site_lang'];
    }

    public function index()
    {

        $data['folder'] = 'front';
        $data['data_blog_limit'] = $this->db->query("select * from blog where is_active = '1' order by id desc limit 3")->result();
        $data['slider'] = $this->db->query("select * from slide_show where is_active = '1'")->result();
        $data['quote'] = $this->db->query("select * from home where id = 6")->row();
        $data['about'] = $this->db->query("select * from home where id = 5")->row();
        $data['portfolio1'] = $this->db->query("select * from home where id = 7")->row();
        $data['portfolio2'] = $this->db->query("select * from home where id = 8")->row();
        $data['portfolio3'] = $this->db->query("select * from home where id = 9")->row();
        $data['portfolio4'] = $this->db->query("select * from home where id = 10")->row();
        $data['quote2'] = $this->db->query("select * from home where id = 11")->row();
        $data['quote3'] = $this->db->query("select * from home where id = 12")->row();
        $data['counter1'] = $this->db->query("select * from home where id = 14")->row();
        $data['counter2'] = $this->db->query("select * from home where id = 15")->row();
        $data['counter3'] = $this->db->query("select * from home where id = 16")->row();
        $data['counter4'] = $this->db->query("select * from home where id = 17")->row();
        $data['page_name'] = 'home';
        $this->load->view('front_template/index', $data);
    }
}
