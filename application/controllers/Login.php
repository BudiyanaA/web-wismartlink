<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        $this->load->model('Signin_model'); //load model
        $this->load->library('form_validation'); // load library form validation!
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Tuang Coffe Admin";
        $data['page_name'] = 'Tuang Coffe';
        $this->load->view('login/view_login', $data);
    }


    public function forgot_password()
    {
        $data['title'] = "OTT Admin";
        $this->load->view('login/forgot_password', $data);
    }

    public function send_email_forgot_password()
    {
        // $email 		= isset($_POST['email']) ? $_POST['email'] : '';
        $email = $this->input->post('email');
        // $check = $this->Api->get_register($email);

        $cek_admin = $this->Signin_model->cek_admin_username($email);

        if ($cek_admin->num_rows() > 0) {
            // $rows = $this->Api->get_users($email);
            $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 3);
            $password = "OTT Admin_" . $s;
            $data = array("password" => sha1($password));
            $rows = $this->Signin_model->updatePassword($email, $data, 'admin');
            $message = "Password Baru anda adalah " . $password;

            $this->load->library('email');
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com'; //change this
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'febbuharyanto@gmail.com'; //change this
            $config['smtp_pass'] = 'encekewer'; //change this
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n";
            $this->email->initialize($config);


            $this->email->from('febbuharyanto@gmail.com', 'OTT Admin');
            $this->email->to($email);

            $this->email->subject('New Password OTT Admin');
            $this->email->message($message);

            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Anda sukses melakukan perubahan password!');
                redirect(base_url());
                // $response["status"] = "Berhasil";
                // echo json_encode($response);
            } else {
                $this->session->set_flashdata('message', 'Anda gagal melakukan perubahan password!');
                redirect(base_url());
                // $response["status"] = "Gagal";
                // echo json_encode($response);
            }
        } else {
            $response["status"] = "Tidak Ada";
            json_encode($response);
        }
    }

    public function login()
    {
        // get from input pos
        $username  = $this->input->post('username');
        $password  = encryptFH($this->input->post('password'));
        // check user available and type
        // type admin
        $cek_admin = $this->Signin_model->get_admin($username, $password);
        // get -set current session login / menentukan type user yang login!
        if ($cek_admin->num_rows() == 1) {
            foreach ($cek_admin->result_array() as $row) {
                $pass_auth = $row['password'];


                if ($password == $pass_auth) {
                    $row_data = array(
                        'adminid' => $row['user_id'],
                        'email' => $row['email'],
                        'name' => $row['fullname']
                    );
                    // var_dump($cek_admin->num_rows());die();
                    $this->session->set_userdata($row_data);
                    redirect('Home');
                } else {
                    //$data['error']='Wrong password!';

                    $data['title'] = "OTT Admin";
                    $this->load->view('login/view_login', $data);
                }
            }
        } else {
            // $data['error']='Wrong Username!';
            // $data['title'] = "OTT Admin";
            //  		$this->load->view('login/view_login',$data);
            $this->session->set_flashdata('message', 'Username atau Password Salah!');
            redirect(base_url('index.php/Login'));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('adminid');

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('fullname');

        redirect(base_url('index.php/Login'));
    }
}
