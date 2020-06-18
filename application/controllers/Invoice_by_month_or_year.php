<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_by_month_or_year extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Invoice_by_month_or_year_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        // $data = array(
        //     'year' => $this->input->post('year'),
        // );
        // if ($this->Ganti_password_model->update($data, $email)) {
        //     $this->session->set_flashdata('success', 'Create Record Success');
        //     redirect(base_url('index.php/Ganti_password'));
        // } else {
        //     $this->session->set_flashdata('error', 'Failed to Saved Data');
        //     $this->index();
        // }
        $data['form_action'] = 'index.php/Invoice_by_month_or_year';
        $data['years'] = $this->input->post('year');
        // var_dump($this->input->post('year'));die();
        $data['month'] = $this->input->post('month');
        $data['list'] = $this->Invoice_by_month_or_year_model->get_all()->result();
        $data['folder'] = 'invoice_by_month_or_year';
        $data['page'] = 'Invoice_by_month_or_year';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function read($id)
    {
        $row = $this->db->query("select e.id, e.is_paid, u.nama, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt, e.invoice_date
        from invoice e 
        left join user u on e.id_user = u.user_id
        left join unit un on u.idunit = un.id_unit
        left join gedung g on un.id_gedung = g.id_gedung
        left join apartemen a on g.id_apt = a.id_apt
        where e.id = '$id'
        ")->row();

        $data = array(
            'id' => set_value('id', $row->id),
            'email' => set_value('email', $row->email),
            'nama' => set_value('nama', $row->nama),
            'nomor' => set_value('nomor', $row->nomor),
            'lantai' => set_value('lantai', $row->lantai),
            'nama_gedung' => set_value('nama_gedung', $row->nama_gedung),
            'is_paid' => set_value('is_paid', $row->is_paid),
            'nama_apt' => set_value('nama_apt', $row->nama_apt),
            'invoice_date' => set_value('invoice_date', $row->invoice_date),
            'disabled' => 'disabled',
            'button' => 'Read',
            'form_action' => 'index.php/Invoice/update_action/"' . $id . '"',
            'page' => 'Invoice View',
            'folder' => 'invoice_by_month_or_year',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Invoice_by_month_or_year_model->get_by_id($id);

        if ($row) {
            $this->Invoice_by_month_or_year_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Invoice_by_month_or_year_bulan'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Invoice_by_month_or_year_bulan'));
        }
    }

    function get_data($year, $month)
    {
        // var_dump($month);
        // var_dump($year);die();

        $list = $this->Invoice_by_month_or_year_model->get_datatables($year, $month);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->is_paid == '1') {
                $lunas = 'Lunas';
            } else {
                $lunas = 'Belum Lunas';
            }
            $tanggal_sewa = $field->invoice_date;
            $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->no_invoice;
            $row[] = $field->nama;
            $row[] = $alamat;
            $row[] = $tanggal_sewa;
            $row[] = $field->total;
            $row[] = $lunas;


            $row[] = '<td>
                <div class="btn-group">
                    <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="' . base_url() . 'index.php/Invoice_by_month_or_year_bulan/read/' . $field->id . '">
                                <i class="icon-eye"></i> Lihat Detail </a>
                        </li>
                        <li>
                            <a href="' . base_url() . 'index.php/Invoice_by_month_or_year_bulan/read/' . $field->id . '">
                                <i class="icon-eye"></i> Cetak </a>
                        </li>
                    </ul>
                </div>
            </td>';

            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Invoice_by_month_or_year_model->count_all(),
            "recordsFiltered" => $this->Invoice_by_month_or_year_model->count_filtered($year, $month),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('page_id', 'Pge', 'trim|required');
        $this->form_validation->set_rules('title_english', 'title english', 'trim|required');
        $this->form_validation->set_rules('title_bahasa', 'title bahasa', 'trim|required');
        $this->form_validation->set_rules('desc_english', 'Description English', 'trim|required');
        $this->form_validation->set_rules('desc_bahasa', 'Description Bahasa', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
