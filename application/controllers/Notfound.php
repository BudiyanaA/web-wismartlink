<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Notfound extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['folder'] = 'notfound';
        $data['page'] = 'notfound';
        $data['page_name'] = 'notfound';
        $this->load->view('template/index', $data);
    }
}
