<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Invoice_model');
        if (!$this->session->userdata('adminid')) {
            redirect(base_url('index.php/Login'));
        }
    }

    public function index()
    {
        $data['list'] = $this->Invoice_model->get_all()->result();
        $data['form_action'] = 'index.php/Invoice_by_month_or_year';

        $data['folder'] = 'invoice';
        $data['page'] = 'Invoice';
        $data['page_name'] = 'index';
        $this->load->view('template/index', $data);
    }

    public function cetak($id, $nomor_invoice, $total)
    {
        $get_invoice = $this->db->query("select * from invoice where id = '$id'")->row();
        $get_user = $this->db->query("select * from user where user_id = '$get_invoice->id_user'")->row();
        $tanggal_sewa = $get_invoice->invoice_date;
        $datetime = new DateTime($tanggal_sewa);
        $month = $datetime->format('n');
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $tagihan_bulan = $bulan[$month];
        $get_tagihan_sewa_fasilitas = $this->db->query("select * from request_fasilitas where id_user = '$get_invoice->id_user' AND MONTH(request_start) = '$month'")->result();
        $get_tagihan_apartemen = $this->db->query("select * from unit where id_unit = '$get_user->idunit'")->row();
        $get_tagihan_maintenance = $this->db->query("select * from request_maintenance where id_user = '$get_invoice->id_user' AND MONTH(request_date) = '$month'")->result();
        $get_tagihan_room_service = $this->db->query("select * from request_room_service where id_user = '$get_invoice->id_user' AND MONTH(request_date) = '$month'")->result();

        $get_unit = $this->db->query("select * from unit where id_unit = '$get_user->idunit'")->row();
        $get_gedung = $this->db->query("select * from gedung where id_gedung = '$get_unit->id_gedung'")->row();
        $get_apartemen = $this->db->query("select * from apartemen where id_apt = '$get_gedung->id_apt'")->row();

        $data['tagihan_sewa_fasilitas'] = $get_tagihan_sewa_fasilitas;
        $data['tagihan_apartemen'] = $get_tagihan_apartemen->biaya_sewa;
        $data['tagihan_maintenance'] = $get_tagihan_maintenance;
        $data['tagihan_room_service'] = $get_tagihan_room_service;
        $data['grand_total'] = $total;
        $data['nomor_invoice'] = $nomor_invoice;
        $data['nama_user'] = $get_user->nama;
        $data['nama_unit'] = $get_unit->nama_unit;
        $data['nomor'] = $get_unit->nomor;
        $data['lantai'] = $get_unit->lantai;
        $data['nama_gedung'] = $get_gedung->nama_gedung;
        $data['alamat'] = $get_gedung->alamat;
        $data['kota'] = $get_gedung->kota;
        $data['nama_apartemen'] = $get_apartemen->nama_apt;

        $data['list'] = $this->Invoice_model->get_all()->result();
        $data['form_action'] = 'index.php/Invoice_by_month_or_year';

        $data['folder'] = 'invoice';
        $data['page'] = 'Invoice';
        $data['page_name'] = 'print';
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
            'folder' => 'invoice',
            'page_name' => 'form',
        );
        $this->load->view('template/index', $data);
    }

    public function delete($id)
    {
        $row = $this->Invoice_model->get_by_id($id);

        if ($row) {
            $this->Invoice_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Success');
            redirect(base_url('index.php/Invoice'));
        } else {
            $this->session->set_flashdata('error', 'Delete Failed');
            redirect(base_url('index.php/Invoice'));
        }
    }

    function get_data()
    {
        $list = $this->Invoice_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->is_paid == '1') {
                $lunas = 'Lunas';
            } else {
                $lunas = 'Belum Lunas';
            }
            $tanggal_sewa = $field->invoice_date;
            $datetime = new DateTime($tanggal_sewa);
            $month = $datetime->format('n');
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $tagihan_bulan = $bulan[$month];
            $nomor_invoice = $field->user_id . $field->id_unit . $datetime->format('n') . $datetime->format('Y');
            $get_tagihan_sewa_fasilitas = $this->db->query("select * from request_fasilitas where id_user = '$field->user_id' AND MONTH(request_start) = '$month'");
            if ($get_tagihan_sewa_fasilitas->row() != NULL) {
                if ($get_tagihan_sewa_fasilitas->num_rows() > 1) {
                    $sum = 0;
                    foreach ($get_tagihan_sewa_fasilitas->result() as $key => $value) {
                        $sum += $value->biaya;
                    }
                    $biaya_sewa_fasilitas = $sum;
                } else {
                    $biaya_sewa_fasilitas = $get_tagihan_sewa_fasilitas->row()->biaya;
                }
            } else {
                $biaya_sewa_fasilitas = 0;
            }

            $get_tagihan_apartemen = $this->db->query("select * from unit where id_unit = '$field->id_unit'")->row();
            if ($get_tagihan_apartemen != NULL) {
                $biaya_apartemen = $get_tagihan_apartemen->biaya_sewa;
            } else {
                $biaya_apartemen = 0;
            }

            $get_tagihan_maintenance = $this->db->query("select * from request_maintenance where id_user = '$field->user_id' AND MONTH(request_date) = '$month'");
            if ($get_tagihan_maintenance->row() != NULL) {
                if ($get_tagihan_maintenance->num_rows() > 1) {
                    $sum = 0;
                    foreach ($get_tagihan_maintenance->result() as $key => $value) {
                        $sum += $value->charge;
                    }
                    $biaya_maintenance = $sum;
                } else {
                    $biaya_maintenance = $get_tagihan_maintenance->row()->charge;
                }
            } else {
                $biaya_maintenance = 0;
            }

            $get_tagihan_room_service = $this->db->query("select * from request_room_service where id_user = '$field->user_id' AND MONTH(request_date) = '$month'");
            if ($get_tagihan_room_service->row() != NULL) {
                if ($get_tagihan_room_service->num_rows() > 1) {
                    $sum = 0;
                    foreach ($get_tagihan_room_service->result() as $key => $value) {
                        $sum += $value->charge;
                    }
                    $biaya_room_service = $sum;
                } else {
                    $biaya_room_service = $get_tagihan_room_service->row()->charge;
                }
            } else {
                $biaya_room_service = 0;
            }

            $total = $biaya_apartemen + $biaya_sewa_fasilitas + $biaya_maintenance + $biaya_room_service;
            // var_dump($total);die();

            $alamat = 'Apartemen ' . $field->nama_apt . ', Gedung ' . $field->nama_gedung . ', ' . $field->nama_unit . ', Lantai ' . $field->lantai . ', Nomor ' . $field->nomor;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $nomor_invoice;
            $row[] = $field->nama;
            $row[] = $alamat;
            $row[] = $tagihan_bulan;
            $row[] = 'Rp. ' . number_format($total, 2);
            $row[] = $lunas;


            $row[] = '<td>
            <a href="' . base_url() . 'index.php/Invoice/cetak/' . $field->id . '/' . $nomor_invoice . '/' . $total . '" class="btn btn-outline btn-circle btn-sm yellow">
            <i class="fa fa-pdf"></i> Cetak </a>
            </td>';

            $data[] = $row;
        }
        //     <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
        //     <i class="fa fa-angle-down"></i>
        // </button>
        // <ul class="dropdown-menu" role="menu">
        //     <li>
        //         <a href="' . base_url() . 'index.php/Invoice/read/' . $field->id . '">
        //             <i class="icon-eye"></i> Lihat Detail </a>
        //     </li>
        //     <li>
        //         <a href="' . base_url() . 'index.php/Invoice/read/' . $field->id . '">
        //             <i class="icon-eye"></i> Cetak </a>
        //     </li>
        // </ul>


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Invoice_model->count_all(),
            "recordsFiltered" => $this->Invoice_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function generate_invoice()
    {
        echo "coming soon";
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
