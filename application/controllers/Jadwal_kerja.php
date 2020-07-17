<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_kerja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Jadwal_kerja_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {

        $data['jadwal_security'] = $this->db->query("select jk.id,  jk.id_user, jk.shift, jk.start_date, jk.end_date,  u.nama,   r.role_name
		from jadwal_kerja jk
		left join user u on jk.id_user = u.user_id
        left join role r on u.level = r.id
        where r.id IN (12, 13, 14)
        ")->result();
        $data['jadwal_cleaning'] = $this->db->query("select jk.id,  jk.id_user, jk.shift, jk.start_date, jk.end_date,  u.nama,   r.role_name
		from jadwal_kerja jk
		left join user u on jk.id_user = u.user_id
        left join role r on u.level = r.id
        where r.id IN (15, 16, 17)
        ")->result();
        $data['jadwal_support'] = $this->db->query("select jk.id,  jk.id_user, jk.shift, jk.start_date, jk.end_date,  u.nama,   r.role_name
		from jadwal_kerja jk
		left join user u on jk.id_user = u.user_id
        left join role r on u.level = r.id
        where r.id IN (21, 22, 23)
        ")->result();
        $data['jadwal_maintenance'] = $this->db->query("select jk.id,  jk.id_user, jk.shift, jk.start_date, jk.end_date,  u.nama,   r.role_name
		from jadwal_kerja jk
		left join user u on jk.id_user = u.user_id
        left join role r on u.level = r.id
        where r.id IN (18, 19, 20)
        ")->result();

        $data['folder'] = 'jadwal_kerja';
        $data['page'] = 'Jadwal Kerja';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function create($level)
    {
        switch ($level):
            case 'security':
                $strict = '12, 13, 14';
                break;
            case 'hk':
                $strict = '15, 16, 17';
                break;
            case 'mtc':
                $strict = '18, 19, 20';
                break;
            case 'it':
                $strict = '21, 22, 23';
                break;
            default;
                break;
        endswitch;

        $data = array(
            'id' => set_value('id'),
            'get_user' => $this->db->query("select * from user where level IN ($strict)")->result(),
            'level_id' => $level,
            'user_id' => set_value('user_id'),
            'shift' => set_value('shift'),
            'from' => set_value('from'),
            'to' => set_value('to'),
            'button' => 'Save',
            'disabled' => '',
            'form_action' => 'index.php/Jadwal_kerja/create_action',
            'page' => 'Jadwal Kerja Add',
            'folder' => 'jadwal_kerja',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('level_id', TRUE));
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user', TRUE),
                'shift' => $this->input->post('shift', TRUE),
                'start_date' => $this->input->post('from', TRUE),
                'end_date' => $this->input->post('to', TRUE),
            );
            $simpan = $this->Jadwal_kerja_model->insert($data);
            if ($simpan) {
                $this->session->set_flashdata('success', 'Create Record Success');
                redirect(base_url('index.php/Jadwal_kerja'));
            } else {
                $this->session->set_flashdata('error', 'Failed to Saved Data');
                $this->create();
            }
        }
    }

    public function update($id, $level)
    {
        switch ($level):
            case 'security':
                $strict = '12, 13, 14';
                break;
            case 'hk':
                $strict = '15, 16, 17';
                break;
            case 'mtc':
                $strict = '18, 19, 20';
                break;
            case 'it':
                $strict = '21, 22, 23';
                break;
            default;
                break;
        endswitch;

        $row = $this->Jadwal_kerja_model->get_by_id($id);
        $getuser = $this->db->query("select * from user where user_id = '$row->id_user'")->row();
        $data = array(
            'id' => set_value('id', $row->id),
            'get_user' => $this->db->query("select * from user where level IN ($strict)")->result(),
            'level_id' => $level,
            'nama' => $getuser->nama,
            'user_id' => set_value('user_id', $row->id_user),
            'shift' => set_value('shift', $row->shift),
            'from' => set_value('from', $row->start_date),
            'to' => set_value('to', $row->end_date),
            'disabled' => '',
            'button' => 'Update',
            'form_action' => 'index.php/Jadwal_kerja/update_action/"' . $id . '"',
            'page' => 'Jadwal Kerja Update',
            'folder' => 'jadwal_kerja',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function update_action()
    {
        $data = array(
            'id_user' => $this->input->post('id_user', TRUE),
            'shift' => $this->input->post('shift', TRUE),
            'start_date' => $this->input->post('from', TRUE),
            'end_date' => $this->input->post('to', TRUE),
        );

        $this->Jadwal_kerja_model->update($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('success', 'Update Success');
        redirect(base_url('index.php/Jadwal_kerja'));
    }

    public function read($id, $level)
    {
        $row = $this->Jadwal_kerja_model->get_by_id($id);
        $getuser = $this->db->query("select * from user where user_id = '$row->id_user'")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'get_user' => $this->db->query("select * from admin where level = '$level'")->result(),
            'level_id' => $level,
            'nama' => $getuser->nama,
            'user_id' => set_value('user_id', $row->id_user),
            'shift' => set_value('shift', $row->shift),
            'from' => set_value('from', $row->start_date),
            'to' => set_value('to', $row->end_date),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Jadwal_kerja/update_action/"' . $id . '"',
            'page' => 'Jadwal Kerja View',
            'folder' => 'jadwal_kerja',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Jadwal_kerja_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_kerja_model->delete($id, $data);
            $this->session->set_flashdata('success', 'Success');
            redirect(base_url('index.php/Jadwal_kerja'));
        } else {
            $this->session->set_flashdata('error', 'Failed');
            redirect(base_url('index.php/Jadwal_kerja'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_user', 'User', 'trim|required');
        $this->form_validation->set_rules('shift', 'Shift', 'trim|required');
        $this->form_validation->set_rules('from', 'Tanggal Awal', 'trim|required');
        $this->form_validation->set_rules('to', 'Tanggal Akhir', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
