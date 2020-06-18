<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ganti_password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Ganti_password_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['folder'] = 'ganti_password';
        $data['page'] = 'Ganti Password';
        $data['page_name'] = 'form';
        $data['button'] = 'Save';
        $data['disabled'] = '';
        $data['form_action'] = 'index.php/Ganti_password/create_action';
        $this->load->view('template/index', $data);
    }



    public function create_action()
    {
        $this->form_validation->set_rules('password_baru', 'Password baru', 'required|max_length[20]');
        $this->form_validation->set_rules('ulangi_password_baru', 'Ulangi Password baru', 'required|matches[password_baru]|max_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email = $this->session->userdata('email');
            $password = encryptFH($this->input->post('password_lama'));
            $auth = $this->Ganti_password_model->checkOldPass($email, $password);
            if ($auth == TRUE) {
                $data = array(
                    'password' => encryptFH($this->input->post('ulangi_password_baru')),
                );
                if ($this->Ganti_password_model->update($data, $email)) {
                    $this->session->set_flashdata('success', 'Create Record Success');
                    redirect(base_url('index.php/Ganti_password'));
                } else {
                    $this->session->set_flashdata('error', 'Failed to Saved Data');
                    $this->index();
                }
            } else {
                $this->session->set_flashdata('error', 'Your Password is not valid');
                $this->index();
            }
        }
    }
}
