<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('Main_Controller.php');

class Profile extends Main_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('m_user');
    }

    public function index()
    {
        $rec = $this->m_user->getUser($this->session->userdata('employee_uid'));
        if ($rec == null)
            redirect('notfound');

        $data['rec'] = $rec;
        $data['folder'] = 'profile';
        $data['page'] = 'Routine Maintenance';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);

        // $this->load->view('layout/template', $data);
    }

    function logout()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        $this->m_user->deleteLogRoot($ipaddress);

        $this->session->sess_destroy();

        $this->session->set_userdata('pesan', '<p> Signout Success </p>');
        $this->session->set_userdata('status', 'success');

        redirect('http://application.moratelindo.co.id/index.php/logout/clear/' . $_COOKIE['SSOID']);
    }
}
