<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Language extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Home_model');
    }

    function switchLang($language = "")
    {

        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);

        redirect($_SERVER['HTTP_REFERER']);
    }
}
