<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo');
    }

    public function login_post()
    {
        $param = $this->post();

        $email = $param['email'];
        $password = encryptFH($param['password']);
        if (!$email || !$password) {
            $this->response(NULL, 400);
        }

        $is_valid = $this->db->query("select * from user where email = '$email' AND password = '$password'")->row();
        if ($is_valid != NULL) {
            $get_resto = $this->db->query("select * from restaurant where id_user = '$is_valid->user_id'")->row();
            if ($get_resto != "" || $get_resto != NULL) {
                $id_resto = $get_resto->id;
            } else {
                $id_resto = '';
            }

            $get_toko = $this->db->query("select * from toko where id_user = '$is_valid->user_id'")->row();
            if ($get_toko != "" || $get_toko != NULL) {
                $id_toko = $get_toko->id;
            } else {
                $id_toko = '';
            }
            $info[] = array(
                'nama' => $is_valid->nama,
                'username' => $is_valid->username,
                'email' => $is_valid->email,
                'user_id' => $is_valid->user_id,
                'id_resto' => $id_resto,
                'id_toko' => $id_toko,
                'role' => $is_valid->level,
                'phone_number' => $is_valid->phone_number
            );

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $info
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function emergency_post()
    {
        $param = $this->post();

        $this->load->model('Apartemen_model', 'apartemen_model');

        $data = array(
            'user_id'               => $param['user_id'],
            'insert_date'          => date('Y-m-d H:i:s')
        );

        if ($this->apartemen_model->save_to_db('emergency', $data)) {
            $data = array(
                'success' => true,
                'message' => 'Tim kami sedang menuju ke lokasi Anda',
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function informasi_generic_post()
    {

        $info = $this->db->query("select * from informasi_generic")->result();
        if ($info != NULL) {
            foreach ($info as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'title' => $row->title,
                    'description' => $row->description,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function fasilitas_post()
    {

        $info = $this->db->query("select * from fasilitas_gedung")->result();
        if ($info != NULL) {
            foreach ($info as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'fasilitas' => $row->fasilitas,
                    'img' => base_url() . $row->img,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function request_fasilitas_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');

        $dataDB = array(
            'fasilitas_id'          => $param['fasilitas_id'],
            'request_start'         => $param['request_start'],
            'request_end'           => $param['request_end'],
            'id_user'               => $param['id_user'],
            'created_date'          => date('Y-m-d H:i:s')
        );

        //foto nama biaya nomor unik grand_total

        // perhitungan jam untuk biaya
        $start = new DateTime($dataDB['request_start']);
        $end = new DateTime($dataDB['request_end']);
        $interval = $end->diff($start)->h;

        $dataDB['biaya'] = $interval * 5000;

        if ($this->apartemen_model->save_to_db('request_fasilitas', $dataDB)) {
            $data = array(
                'success' => true,
                'message' => 'save data success',
                'data' => $dataDB
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );
            $this->response($data, 200);
        }
    }

    /** Get History Request Maintenance
      *  + parameter:
      *  - 1) id_user
      *  - 2) request
      *  - 3) request_date
      */
    public function request_maintenance_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');

        $data = array(
            'id_user'               => $param['id_user'],
            'request'               => $param['request'],
            'request_date'          => $param['request_date'],
            'charge'                => 50000, //cms settings
            'created_date'          => date('Y-m-d H:i:s')
        );

        if ($this->apartemen_model->save_to_db('request_maintenance', $data)) {
            $data = array(
                'success' => true,
                'message' => 'Terima kasih, Tim kami sedang menuju ke lokasi Anda',
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function request_room_service_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');

        $dataDB = array(
            'id_user'               => $param['id_user'],
            'request'               => $param['request'],
            'request_date'          => $param['request_date'],
            'charge'                => 5000,
            'created_date'          => date('Y-m-d H:i:s')
        );

        if ($this->apartemen_model->save_to_db('request_room_service', $dataDB)) {
            $data = array(
                'success' => true,
                'message' => 'Terima Kasih, Tim kami sedang menuju ke lokasi Anda',
                'data'    => $dataDB
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function open_ticket_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $date = date('Ymd');
        $jml_ticket = $this->db->query("select * from ticket")->num_rows();
        $query = $this->db->query("SELECT LEFT(kode_tiket, 5) as code FROM ticket where MONTH(created_date) = MONTH(CURRENT_DATE()) order by id desc limit 1")->result();
        if ($query != NULL) {
            foreach ($query as $k) {
                $tmp = ((int) $k->code) + 1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $code = sprintf('%05s', $tmp); //kode ambil 4 karakter terakhir
            }
        } else {
            $code = '00001';
        }
        // substr($string, 0, 2);
        // $kodeBarang = $data['kodeTerbesar'];
        // $nomor_urut = $jml_ticket + 1;
        $kode_tiket = $code . '/ticket/' . date('m') . '/' . date('Y');

        $data = array(
            'id_user'               => $param['id_user'],
            'kode_tiket'            => $kode_tiket,
            'keterangan'            => $param['keterangan'],
            'level'                 => $param['level'],
            'created_date'          => date('Y-m-d H:i:s')
        );

        if ($this->apartemen_model->save_to_db('ticket', $data)) {
            $data = array(
                'success' => true,
                'message' => 'Terima Kasih, akan segera kami proses',
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function status_ticket_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        $ticket = $this->db->query("select * from ticket where id_user = '$id_user' order by id desc")->result();
        if ($ticket != NULL) {
            foreach ($ticket as $row) {
                $pic = $this->db->query("select * from pic where id = '$row->pic_id'")->row();
                if ($pic != NULL) {
                    $nama_pic = $pic->nama_pic;
                } else {
                    $nama_pic = '';
                }
                $d[] = array(
                    'kode_tiket' => $row->kode_tiket,
                    'keterangan' => $row->keterangan,
                    'level' => $row->level,
                    'status' => $row->status,
                    'pic' => $nama_pic,
                    'date' => $row->created_date,
                );
            }
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function kirim_pesan_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        if ($param != NULL) {
            $datas = array(
                'sent_by' => 'user',
                'ticket_id' => $param['ticket_id'],
                'message' => $param['message'],
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('ticket_message', $datas);

            $data = array(
                'success' => true,
                'message' => 'success',
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function upload_foto_komplain_post()
    {
        $param = $this->post();
        $ticket_id = $param['ticket_id'];

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $this->upload->do_upload('img');
            $data = array(
                'ticket_id' => $ticket_id,
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/' . $rand . '.' . $ext,
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('ticket_file', $data);

            $data = array(
                'success' => true,
                'message' => 'success',
            );
            $this->response($data, 200);
        }
    }

    public function cek_invoice_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        $invoice = $this->db->query("select * from invoice where id_user = '$id_user' AND MONTH(invoice_date) = MONTH(CURRENT_DATE())
        AND YEAR(invoice_date) = YEAR(CURRENT_DATE())")->row();
        if ($invoice != NULL) {
            $tagihan = number_format($invoice->total, 2);
            if ($invoice->is_paid == '0') {
                $is_paid = "No";
            } else {
                $is_paid = "Yes";
            }
            $d = array(
                'no_invoice' => $invoice->no_invoice,
                'invoice_date' => $invoice->invoice_date,
                'total_tagihan' => 'Rp. ' . $tagihan,
                'is_paid' => $is_paid,
            );
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'belum ada tagihan',
                // 'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function history_pembayaran_bulanan_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        $bulan = $param['bulan'];
        $tahun = $param['tahun'];
        $invoice = $this->db->query("select * from invoice where id_user = '$id_user' AND MONTH(invoice_date) = $bulan
        AND YEAR(invoice_date) = $tahun AND is_paid = 1")->row();

        $request_fasilitas = $this->db->query("select * from request_fasilitas where id_user = '$id_user' AND MONTH(tanggal_bayar) = $bulan
        AND YEAR(tanggal_bayar) = $tahun AND is_paid = 1")->result();

        $request_maintenance = $this->db->query("select * from request_maintenance where id_user = '$id_user' AND MONTH(tanggal_bayar) = $bulan
        AND YEAR(tanggal_bayar) = $tahun AND is_paid = 1")->result();

        $request_room_service = $this->db->query("select * from request_room_service where id_user = '$id_user' AND MONTH(tanggal_bayar) = $bulan
        AND YEAR(tanggal_bayar) = $tahun AND is_paid = 1")->result();
        if ($invoice != NULL) {
            $inv = number_format($invoice->total, 2);
            if ($invoice->is_paid == '0') {
                $is_paid = "No";
            } else {
                $is_paid = "Yes";
            }
            $tagihan[] = array(
                'no_invoice' => $invoice->no_invoice,
                'invoice_date' => $invoice->invoice_date,
                'total_tagihan' => 'Rp. ' . $inv,
                'is_paid' => $is_paid,
            );
        } else {
            $tagihan[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        if ($request_fasilitas != NULL) {
            foreach ($request_fasilitas as $row) {
                if ($row->biaya != NULL || $row->biaya != "") {
                    $inv = number_format($row->biaya, 2);
                } else {
                    $inv = number_format(0, 2);
                }
                if ($row->is_paid == '0') {
                    $is_paid = "No";
                } else {
                    $is_paid = "Yes";
                }
                $fasilitas[] = array(
                    'no_invoice' => $row->invoice_no,
                    'tanggal_bayar' => $row->tanggal_bayar,
                    'total_tagihan' => 'Rp. ' . $inv,
                    'is_paid' => $is_paid,
                );
            }
        } else {
            $fasilitas[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        if ($request_maintenance != NULL) {
            foreach ($request_maintenance as $r) {
                if ($r->charge != NULL || $r->charge != "") {
                    $inv = number_format($r->charge, 2);
                } else {
                    $inv = number_format(0, 2);
                }
                if ($r->is_paid == '0') {
                    $is_paid = "No";
                } else {
                    $is_paid = "Yes";
                }
                $maintenance[] = array(
                    'no_invoice' => $r->invoice_no,
                    'tanggal_bayar' => $r->tanggal_bayar,
                    'total_tagihan' => 'Rp. ' . $inv,
                    'is_paid' => $is_paid,
                );
            }
        } else {
            $maintenance[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        if ($request_room_service != NULL) {
            foreach ($request_room_service as $ro) {
                if ($ro->charge != NULL || $ro->charge != "") {
                    $inv = number_format($ro->charge, 2);
                } else {
                    $inv = number_format(0, 2);
                }
                if ($ro->is_paid == '0') {
                    $is_paid = "No";
                } else {
                    $is_paid = "Yes";
                }
                $room_service[] = array(
                    'no_invoice' => $ro->invoice_no,
                    'tanggal_bayar' => $ro->tanggal_bayar,
                    'total_tagihan' => 'Rp. ' . $inv,
                    'is_paid' => $is_paid,
                );
            }
        } else {
            $room_service[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        $history[] = array(
            'invoice' => $tagihan,
            'maintenance' => $maintenance,
            'room_service' => $room_service,
            'sewa_fasilitas' => $fasilitas,
        );
        $data = array(
            'success' => true,
            'message' => 'success',
            'data' => $history
        );
        $this->response($data, 200); // 200 being the HTTP response code

    }

    public function history_pembayaran_tahunan_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        $tahun = $param['tahun'];
        $invoice = $this->db->query("select * from invoice where id_user = '$id_user' AND YEAR(invoice_date) = $tahun AND is_paid = 1")->row();

        $request_fasilitas = $this->db->query("select * from request_fasilitas where id_user = '$id_user' AND YEAR(tanggal_bayar) = $tahun AND is_paid = 1")->result();

        $request_maintenance = $this->db->query("select * from request_maintenance where id_user = '$id_user' AND YEAR(tanggal_bayar) = $tahun AND is_paid = 1")->result();

        $request_room_service = $this->db->query("select * from request_room_service where id_user = '$id_user' AND YEAR(tanggal_bayar) = $tahun AND is_paid = 1")->result();
        if ($invoice != NULL) {
            $inv = number_format($invoice->total, 2);
            if ($invoice->is_paid == '0') {
                $is_paid = "No";
            } else {
                $is_paid = "Yes";
            }
            $tagihan[] = array(
                'no_invoice' => $invoice->no_invoice,
                'invoice_date' => $invoice->invoice_date,
                'total_tagihan' => 'Rp. ' . $inv,
                'is_paid' => $is_paid,
            );
        } else {
            $tagihan[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        if ($request_fasilitas != NULL) {
            foreach ($request_fasilitas as $row) {
                if ($row->biaya != NULL || $row->biaya != "") {
                    $inv = number_format($row->biaya, 2);
                } else {
                    $inv = number_format(0, 2);
                }
                if ($row->is_paid == '0') {
                    $is_paid = "No";
                } else {
                    $is_paid = "Yes";
                }
                $fasilitas[] = array(
                    'no_invoice' => $row->invoice_no,
                    'tanggal_bayar' => $row->tanggal_bayar,
                    'total_tagihan' => 'Rp. ' . $inv,
                    'is_paid' => $is_paid,
                );
            }
        } else {
            $fasilitas[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        if ($request_maintenance != NULL) {
            foreach ($request_maintenance as $r) {
                if ($r->charge != NULL || $r->charge != "") {
                    $inv = number_format($r->charge, 2);
                } else {
                    $inv = number_format(0, 2);
                }
                if ($r->is_paid == '0') {
                    $is_paid = "No";
                } else {
                    $is_paid = "Yes";
                }
                $maintenance[] = array(
                    'no_invoice' => $r->invoice_no,
                    'tanggal_bayar' => $r->tanggal_bayar,
                    'total_tagihan' => 'Rp. ' . $inv,
                    'is_paid' => $is_paid,
                );
            }
        } else {
            $maintenance[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        if ($request_room_service != NULL) {
            foreach ($request_room_service as $ro) {
                if ($ro->charge != NULL || $ro->charge != "") {
                    $inv = number_format($ro->charge, 2);
                } else {
                    $inv = number_format(0, 2);
                }
                if ($ro->is_paid == '0') {
                    $is_paid = "No";
                } else {
                    $is_paid = "Yes";
                }
                $room_service[] = array(
                    'no_invoice' => $ro->invoice_no,
                    'tanggal_bayar' => $ro->tanggal_bayar,
                    'total_tagihan' => 'Rp. ' . $inv,
                    'is_paid' => $is_paid,
                );
            }
        } else {
            $room_service[] = array(
                'no_invoice' => '',
                'invoice_date' => '',
                'total_tagihan' => '',
                'is_paid' => '',
            );
        }

        $history[] = array(
            'invoice' => $tagihan,
            'maintenance' => $maintenance,
            'room_service' => $room_service,
            'sewa_fasilitas' => $fasilitas,
        );
        $data = array(
            'success' => true,
            'message' => 'success',
            'data' => $history
        );
        $this->response($data, 200); // 200 being the HTTP response code

    }

    public function history_request_fasilitas_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $this->load->library('cekmutasi/cekmutasi');
        
        $id_user = $param['id_user'];
        $fasilitas = $this->db->query("select * from request_fasilitas where id_user = '$id_user' order by id desc")->result();
        
        $user = $this->db->query("SELECT * FROM user u WHERE u.user_id = '$id_user'")->result();
        foreach ($user as $row) {
            $u = array(
                'service_code' => strtolower($row->nama_bank),
                'account_number' => $row->nomor_rekening,
            );
        }
        
        if ($fasilitas != NULL) {
            foreach ($fasilitas as $row) {
                $fasilitas_gedung = $this->db->query("select * from fasilitas_gedung where id = '$row->fasilitas_id'")->row();
                if ($fasilitas_gedung != NULL) {
                    $nama_fasilitas_gedung = $fasilitas_gedung->fasilitas;
                } else {
                    $nama_fasilitas_gedung = '';
                }
                if ($row->tanggal_bayar != NULL) {
                    $tanggal_bayar = $row->tanggal_bayar;
                } else {
                    $tanggal_bayar = '';
                }
                if ($row->biaya != NULL) {
                    $biaya = $row->biaya;
                } else {
                    $biaya = '';
                }

                $mutasi = array_merge($u, array(
                    'amount' => $biaya,
                    'date' => array(
                        // batas waktu 24 jam
                        'from' => $row->request_start,
                        'to' => date('Y-m-d H:i:s', strtotime($row->request_start.' +1 day')),
                    )
                ));
                $cek = $this->cekmutasi->bank()->mutation($mutasi);
                if (!empty($cek->response)) {
                    // sudah dibayar
                    $row->is_paid = 1;
                    $data_update = array(
                        'is_paid'           => 1,
                    );
                    $this->db->where(array(
                        'fasilitas_id' => $row->fasilitas_id,
                        'request_start' => $row->request_start,
                        'request_end' => $row->request_end,
                        'id_user' => $id_user,
                        'is_paid' => 0,
                    ));
                    $this->db->update('request_fasilitas', $data_update);
                }

                $d[] = array(
                    'request_start' => $row->request_start,
                    'request_end' => $row->request_end,
                    'status' => $row->status,
                    'biaya' => $biaya,
                    'mutasi' => $mutasi,
                    'fasilitas' => $nama_fasilitas_gedung,
                    'is_paid' => $row->is_paid,
                    'tanggal_bayar' => $tanggal_bayar,
                );
            }
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    /** Get History Request Maintenance
      *  + parameter:
      *  - 1) id_user
      */
    public function history_request_maintenance_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];

        // $fasilitas = $this->db->query("select * from request_maintenance where id_user = '$id_user' order by id desc")->result();
        $this->db->select('t.nama_teknisi, rm.id, rm.request, rm.request_date, rm.status, rm.charge, un.nomor, rm.is_paid, rm.invoice_no, rm.tanggal_bayar, rm.created_date, u.nama, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt');
		$this->db->from('request_maintenance rm');
		$this->db->join('user u', 'rm.id_user = u.user_id', 'left');
		$this->db->join('unit un', 'u.idunit = un.id_unit', 'left');
		$this->db->join('gedung g', 'un.id_gedung = g.id_gedung', 'left');
		$this->db->join('apartemen a', 'g.id_apt = a.id_apt', 'left');
        $this->db->join('teknisi t', 'rm.id_teknisi = t.id', 'left');
        $this->db->where('id_user', $id_user);
        $this->db->order_by('id', 'DESC');
        $fasilitas = $this->db->get()->result();

        if ($fasilitas != NULL) {
            foreach ($fasilitas as $row) {
                if ($row->tanggal_bayar != NULL) {
                    $tanggal_bayar = $row->tanggal_bayar;
                } else {
                    $tanggal_bayar = '';
                }

                if ($row->status != NULL) {
                    $status = $row->status;
                } else {
                    $status = '';
                }
                if ($row->charge != NULL) {
                    $charge = $row->charge;
                } else {
                    $charge = '';
                }
                $d[] = array(
                    'request' => $row->request,
                    'status' => $status,
                    'charge' => $charge, 
                    'is_paid' => $row->is_paid?"Lunas":"Belum Lunas",
                    'tanggal_bayar' => $tanggal_bayar,
                    'request_date' => longdate_indo(substr($row->request_date, 0, 10))." pukul ".substr($row->request_date, 11, 8),
                    'nama_teknisi' => $row->nama_teknisi
                );
            }
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function history_request_room_service_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $this->load->library('cekmutasi/cekmutasi');
        
        $id_user = $param['id_user'];
        $fasilitas = $this->db->query("select * from request_room_service where id_user = '$id_user' order by id desc")->result();
        
        $user = $this->db->query("SELECT * FROM user u WHERE u.user_id = '$id_user'")->result();
        foreach ($user as $row) {
            $u = array(
                'service_code' => strtolower($row->nama_bank),
                'account_number' => $row->nomor_rekening,
            );
        }
        
        if ($fasilitas != NULL) {
            foreach ($fasilitas as $row) {
                if ($row->tanggal_bayar != NULL) {
                    $tanggal_bayar = $row->tanggal_bayar;
                } else {
                    $tanggal_bayar = '';
                }

                if ($row->status != NULL) {
                    $status = $row->status;
                } else {
                    $status = '';
                }
                if ($row->charge != NULL) {
                    $charge = $row->charge;
                } else {
                    $charge = '';
                }

                $mutasi = array_merge($u, array(
                    'amount' => $charge,
                    'date' => array(
                        // batas waktu 24 jam
                        'from' => $row->request_date,
                        'to' => date('Y-m-d H:i:s', strtotime($row->request_date.' +1 day')),
                    )
                ));
                $cek = $this->cekmutasi->bank()->mutation($mutasi);
                if (!empty($cek->response)) {
                    // sudah dibayar
                    $row->is_paid = 1;
                    $data_update = array(
                        'is_paid'           => 1,
                    );
                    $this->db->where(array(
                        'request_date' => $row->request_date,
                        'id_user' => $id_user,
                        'is_paid' => 0,
                    ));
                    $this->db->update('request_room_service', $data_update);
                }

                $d[] = array(
                    'request' => $row->request,
                    'status' => $status,
                    'charge' => $charge,
                    'mutasi' => $mutasi,
                    'is_paid' => $row->is_paid,
                    'tanggal_bayar' => $tanggal_bayar,
                    'request_date' => $row->request_date
                );
            }
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    /** Get History Invoice
     *  + parameter:
     *  - 1) id_user
     *  - 2) is_paid
     */
    public function history_invoice_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        isset($param['is_paid'])?$is_paid = $param['is_paid']:$is_paid  = '';
        
        // $invoice = $this->db->query("select * from invoice where id_user = '$id_user' order by id desc")->result();
        $this->db->select('rm.id, rm.invoice_date, rm.total, un.nomor, u.user_id, rm.is_paid, rm.no_invoice, rm.created_date, u.nama, u.email, un.nama_unit, un.id_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt');
        $this->db->from('invoice rm');
		$this->db->join('user u', 'rm.id_user = u.user_id', 'left');
		$this->db->join('unit un', 'u.idunit = un.id_unit', 'left');
		$this->db->join('gedung g', 'un.id_gedung = g.id_gedung', 'left');
        $this->db->join('apartemen a', 'g.id_apt = a.id_apt', 'left');
        $this->db->where('id_user', $id_user);
        if($is_paid!=''){
            $this->db->where('is_paid', $is_paid);
        }
        $this->db->order_by('invoice_date', 'DESC');
        $invoice = $this->db->get()->result();

        if ($invoice != NULL) {
            foreach ($invoice as $row) {
                $tanggal_sewa = $row->invoice_date;
                $datetime = new DateTime($tanggal_sewa);
                $month = $datetime->format('n');

                $get_tagihan_sewa_fasilitas = $this->db->query("select * from request_fasilitas where id_user = '$id_user' AND MONTH(request_start) = '$month'");
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
    
                $get_tagihan_apartemen = $this->db->query("select * from unit where id_unit = '$row->id_unit'")->row();
                if ($get_tagihan_apartemen != NULL) {
                    $biaya_apartemen = $get_tagihan_apartemen->biaya_sewa;
                } else {
                    $biaya_apartemen = 0;
                }
    
                $get_tagihan_maintenance = $this->db->query("select * from request_maintenance where id_user = '$id_user' AND MONTH(request_date) = '$month'");
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
    
                $get_tagihan_room_service = $this->db->query("select * from request_room_service where id_user = '$id_user' AND MONTH(request_date) = '$month'");
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

                $d[] = array(
                    // 'no_invoice' => $row->no_invoice,
                    'no_invoice' => $row->user_id . $row->id_unit . $datetime->format('n') . $datetime->format('Y'),
                    'invoice_date' => date_indo(substr($row->invoice_date, 0, 10)),
                    'total' => 'Rp. ' . number_format($total, 2),
                    'is_paid' => $row->is_paid?"Lunas":"Belum Lunas"
                );
            }
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function data_penghuni_post()
    {
        $param = $this->post();
        $keyword = $param['keyword'];

        // $user = $this->db->query("select * from user where nama like '%$keyword%'")->result();
        $user = $this->db->query("select * from user where nama like '%$keyword%' AND level IN (8, 9, 10, 11)")->result();
        if ($user != NULL) {
            foreach ($user as $row) {
                $d[] = array(
                    'user_id' => $row->user_id,
                    'nama' => $row->nama,
                    'email' => $row->email,
                    'phone_number' => $row->phone_number,
                    'no_ktp' => $row->no_ktp,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function list_barang_post()
    {
        $param = $this->post();
        $keyword = $param['keyword'];

        $brg = $this->db->query("select a.id, a.nama_toko, a.nama_barang, a.id_toko, a.harga, a.img, a.is_deleted, a.keterangan from v_barang_toko a WHERE a.nama_toko like '%$keyword%' AND a.nama_barang LIKE '%$keyword%' order by a.id desc")->result();
        if ($brg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'nama_toko' => $row->nama_toko,
                    'nama_barang' => $row->nama_barang,
                    'id_toko' => $row->id_toko,
                    'harga' => $row->harga,
                    'keterangan' => $row->keterangan,
                    'img' => base_url() . $row->img,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function list_makanan_post()
    {
        $param = $this->post();
        $keyword = $param['keyword'];

        $brg = $this->db->query("select a.id, a.nama_resto, a.nama_makanan, a.id_resto, a.harga, a.img, a.keterangan from v_makanan a  where a.nama_resto like '%$keyword%' AND a.nama_makanan like '%$keyword%' order by a.id desc")->result();
        if ($brg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'nama_resto' => $row->nama_resto,
                    'nama_makanan' => $row->nama_makanan,
                    'keterangan' => $row->keterangan,
                    'id_resto' => $row->id_resto,
                    'harga' => $row->harga,
                    'img' => base_url() . $row->img,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function beli_barang_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_barang = $param['id_barang'];
        $id_user = $param['id_user'];
        $get_harga_barang = $this->db->query("select * from barang_toko where id = '$id_barang'")->row();
        $total_harga = $param['jumlah_barang'] * $get_harga_barang->harga;
        $cek_daftar_belanja_belum_lunas = $this->db->query("select * from belanja_toko where id_user = '$id_user' AND status = 0")->row();
        if ($cek_daftar_belanja_belum_lunas != NULL) {
            $hitung_subtotal = $this->db->query("SELECT    SUM(a.total_harga) as subtotal
            FROM      belanja_toko a
            WHERE a.id_user = '$id_user' AND a.`status` = 0")->row();
            $subtotal = $hitung_subtotal->subtotal + $total_harga;
            $data = array(
                'id_user'               => $id_user,
                'id_barang'               => $param['id_barang'],
                'jumlah_barang'               => $param['jumlah_barang'],
                'total_harga'           => $total_harga,
                'subtotal'           => $subtotal,
                'created_date'          => date('Y-m-d H:i:s')
            );
            // $simpan =$this->apartemen_model->save_to_db('belanja_toko', $data);
            if ($this->apartemen_model->save_to_db('belanja_toko', $data)) {
                $data_update = array(
                    'subtotal'           => $subtotal,
                );
                $this->db->where('status', 0);
                $this->db->where('id_user', $id_user);
                $this->db->update('belanja_toko', $data_update);
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $subtotal = $total_harga;
            $data = array(
                'id_user'               => $id_user,
                'id_barang'               => $param['id_barang'],
                'jumlah_barang'               => $param['jumlah_barang'],
                'total_harga'           => $total_harga,
                'subtotal'           => $subtotal,
                'created_date'          => date('Y-m-d H:i:s')
            );
            // $simpan =$this->apartemen_model->save_to_db('belanja_toko', $data);
            if ($this->apartemen_model->save_to_db('belanja_toko', $data)) {

                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function checkout_barang_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        $grand_total = $param['grand_total'];
        $tgl = date("YmdHis");
        $kode_transaksi = $id_user . '-' . $tgl . 'TK';

        $dataDB = array(
            'kode_transaksi'               => $kode_transaksi,
            'grand_total'               => $param['grand_total'],
            'created_date'          => date('Y-m-d H:i:s')
        );
        if ($this->apartemen_model->save_to_db('transaksi_belanja_toko', $dataDB)) {
            $data_update = array(
                'kode_transaksi'           => $kode_transaksi,
                'status'           => '1',
            );
            $this->db->where('status', 0);
            $this->db->where('id_user', $id_user);
            $this->db->update('belanja_toko', $data_update);
            $data = array(
                'success' => true,
                'message' => 'save data success',
                'data'  => $dataDB
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function checkout_makan_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_user = $param['id_user'];
        $grand_total = $param['grand_total'];
        $tgl = date("YmdHis");
        $kode_transaksi = $id_user . '-' . $tgl . 'TK';

        $dataDB = array(
            'kode_transaksi'               => $kode_transaksi,
            'grand_total'               => $param['grand_total'],
            'created_date'          => date('Y-m-d H:i:s')
        );
        if ($this->apartemen_model->save_to_db('transaksi_order_makan', $dataDB)) {
            $data_update = array(
                'kode_transaksi'           => $kode_transaksi,
                'status'           => '1',
            );
            $this->db->where('status', 0);
            $this->db->where('id_user', $id_user);
            $this->db->update('order_makanan', $data_update);
            $data = array(
                'success' => true,
                'message' => 'save data success',
                'data'  => $dataDB
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }


    public function beli_makan_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_makanan = $param['id_makanan'];
        $id_user = $param['id_user'];
        $get_harga_makan = $this->db->query("select * from makanan_restaurant where id = '$id_makanan'")->row();
        $total_harga = $param['jumlah'] * $get_harga_makan->harga;
        $cek_daftar_belanja_belum_lunas = $this->db->query("select * from order_makanan where id_user = '$id_user' AND status = 0")->row();

        if ($cek_daftar_belanja_belum_lunas != NULL) {
            $hitung_subtotal = $this->db->query("SELECT    SUM(a.total_harga) as subtotal
            FROM      order_makanan a
            WHERE a.id_user = '$id_user' AND a.`status` = 0")->row();
            $subtotal = $hitung_subtotal->subtotal + $total_harga;
            $data = array(
                'id_user'               => $id_user,
                'id_makanan'               => $param['id_makanan'],
                'jumlah'               => $param['jumlah'],
                'total_harga'           => $total_harga,
                'subtotal'           => $subtotal,
                'created_date'          => date('Y-m-d H:i:s')
            );
            // $simpan =$this->apartemen_model->save_to_db('belanja_toko', $data);
            if ($this->apartemen_model->save_to_db('order_makanan', $data)) {
                $data_update = array(
                    'subtotal'           => $subtotal,
                );
                $this->db->where('status', 0);
                $this->db->where('id_user', $id_user);
                $this->db->update('order_makanan', $data_update);
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $subtotal = $total_harga;
            $data = array(
                'id_user'               => $id_user,
                'id_makanan'               => $param['id_makanan'],
                'jumlah'               => $param['jumlah'],
                'total_harga'           => $total_harga,
                'subtotal'           => $subtotal,
                'created_date'          => date('Y-m-d H:i:s')
            );
            // $simpan =$this->apartemen_model->save_to_db('belanja_toko', $data);
            if ($this->apartemen_model->save_to_db('order_makanan', $data)) {

                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function hapus_order_makan_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_order = $param['id_order'];
        $id_user = $param['id_user'];
        $get_order = $this->db->query("select * from order_makanan where id = '$id_order'")->row();
        if ($get_order != NULL) {
            $subtotal = $get_order->subtotal - $get_order->total_harga;
            $data_update = array(
                'subtotal'           => $subtotal,
            );
            $this->db->where('status', 0);
            $this->db->where('id_user', $id_user);
            $this->db->update('order_makanan', $data_update);

            if ($this->apartemen_model->delete_row('id', $id_order, 'order_makanan')) {
                $data = array(
                    'success' => true,
                    'message' => 'Pesanan anda dihapus',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function hapus_order_barang_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_order = $param['id_order'];
        $id_user = $param['id_user'];
        $get_order = $this->db->query("select * from belanja_toko where id = '$id_order'")->row();
        if ($get_order != NULL) {
            $subtotal = $get_order->subtotal - $get_order->total_harga;
            $data_update = array(
                'subtotal'           => $subtotal,
            );
            $this->db->where('status', 0);
            $this->db->where('id_user', $id_user);
            $this->db->update('belanja_toko', $data_update);
            if ($this->apartemen_model->delete_row('id', $id_order, 'belanja_toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'Pesanan anda dihapus',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function transaksi_toko_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $json = file_get_contents('php://input');
        $dt = json_decode($json);
        // var_dump($dt);die();
        $tgl = date("YmdHis");
        foreach ($dt->id_belanja as $p) {
            $id_user = $dt->id_user;
            $kode_transaksi = $id_user . '-' . $tgl . 'TK';
            $data = array(
                'kode_transaksi' => $kode_transaksi,
                'id_belanja' => $p,
                'grand_total' => $dt->grand_total,
            );
            $this->apartemen_model->save_to_db('transaksi_belanja_toko', $data);
        }

        $data = array(
            'success' => true,
            'message' => 'save data success',
        );
        $this->response($data, 200);
    }

    public function list_transaksi_toko_belum_lunas_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $cek_transaksi = $this->db->query("select * from belanja_toko where id_user = '$id_user' AND status = 0")->result();
        if ($cek_transaksi != NULL) {
            foreach ($cek_transaksi as $p) {
                $get_barang = $this->db->query("select * from barang_toko where id = '$p->id_barang'")->row();

                $nama_barang = $get_barang->nama_barang;
                $r[] = array(
                    'id' => $p->id,
                    'nama_barang' => $nama_barang,
                    'harga_satuan' => $get_barang->harga,
                    'qty' => $p->jumlah_barang,
                    'total_harga' => $p->total_harga,
                    'subtotal' => $p->subtotal,
                    'img' => base_url() . $get_barang->img,
                );
            }
        } else {
            $r[] = array(
                'id' => "",
                'nama_barang' => "",
                'harga_satuan' => "",
                'qty' => "",
                'total_harga' => "",
                'subtotal' => "",
                'img' => "",
            );
        }

        $data = array(
            'success' => true,
            'message' => 'save data success',
            'data' => $r
        );
        $this->response($data, 200);
    }

    public function list_transaksi_toko_checkout_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $cek_transaksi = $this->db->query("select * from belanja_toko where id_user = '$id_user' AND status <> 0")->result();

        foreach ($cek_transaksi as $p) {
            $get_barang = $this->db->query("select * from barang_toko where id = '$p->id_barang'")->row();

            $nama_barang = $get_barang->nama_barang;
            $r[] = array(
                'id' => $p->id,
                'nama_barang' => $nama_barang,
                'harga_satuan' => $get_barang->harga,
                'qty' => $p->jumlah_barang,
                'total_harga' => $p->total_harga,
                'subtotal' => $p->subtotal,
                'img' => $get_barang->img,
            );
        }

        $data = array(
            'success' => true,
            'message' => 'save data success',
            'data' => $r
        );
        $this->response($data, 200);
    }

    public function list_nomor_transaksi_toko_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $this->load->library('cekmutasi/cekmutasi');

        $param = $this->post();
        $id_user = $param['id_user'];
        $list_transaksi = $this->db->query("SELECT b.id, b.kode_transaksi, a.status as status_order, b.`status`, b.grand_total, b.created_date FROM belanja_toko a 
        LEFT JOIN transaksi_belanja_toko b ON a.kode_transaksi = b.kode_transaksi
        WHERE a.id_user = '$id_user' 
        -- AND b.`status` = 'UNPAID'
        GROUP BY b.id")->result();

        $user = $this->db->query("SELECT * FROM user u WHERE u.user_id = '$id_user'")->result();
        foreach ($user as $row) {
            $u = array(
                'service_code' => strtolower($row->nama_bank),
                'account_number' => $row->nomor_rekening,
            );
        }
        
        if ($list_transaksi != NULL) {
            $r = array();
            foreach ($list_transaksi as $key => $p) {
                $get_order = $this->db->query("SELECT a.id_barang, a.jumlah_barang, b.nama_barang, b.img FROM belanja_toko a 
                LEFT JOIN barang_toko b ON a.id_barang = b.id
                WHERE a.kode_transaksi = '$p->kode_transaksi'")->result();
                $brg = array();
                foreach ($get_order as $i => $a) {
                    $brg[] = array(
                        'id_barang' => $a->id_barang,
                        'jumlah_barang' => $a->jumlah_barang,
                        'nama_barang' => $a->nama_barang,
                        'img' => $a->img,

                    );
                }

                $mutasi = array_merge($u, array(
                    'amount' => $p->grand_total,
                    'date' => array(
                        // batas waktu 24 jam
                        'from' => $p->created_date,
                        'to' => date('Y-m-d H:i:s', strtotime($p->created_date.' +1 day')),
                    )
                ));
                $cek = $this->cekmutasi->bank()->mutation($mutasi);
                if (!empty($cek->response)) {
                    // sudah dibayar
                    $p->status = 'PAID';
                    $data_update = array(
                        'kode_transaksi'   => $p->kode_transaksi,
                        'status'           => 'PAID',
                    );
                    $this->db->where('status', 'UNPAID');
                    $this->db->where('kode_transaksi', $p->kode_transaksi);
                    $this->db->update('transaksi_belanja_toko', $data_update);
                }

                $r[] = array(
                    'id' => $p->id,
                    'mutasi' => $mutasi,
                    'kode_transaksi' => $p->kode_transaksi,
                    'status' => $p->status,
                    'status_order' => $p->status_order,
                    'grand_total' => $p->grand_total,
                    'list_order' => $brg
                );
            }
            $data = array(
                'success' => true,
                'message' => 'save data success',
                'data' => $r
            );
        } else {
            $r[] = array(
                'id' => "",
                'kode_transaksi' => "",
            );
            $data = array(
                'success' => false,
                'message' => 'error',
                'data' => $r
            );
        }

        $this->response($data, 200);
        // print_r(empty($cek->response));
    }

    public function jumlah_transaksi_toko_belum_lunas_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $cek_transaksi = $this->db->query("select * from belanja_toko where id_user = '$id_user' AND status = 0");
        $list_transaksi = $this->db->query("SELECT b.id FROM belanja_toko a 
        LEFT JOIN transaksi_belanja_toko b ON a.kode_transaksi = b.kode_transaksi
        WHERE a.id_user = '$id_user' AND b.`status` = 'UNPAID'
        GROUP BY b.id");
        if ($cek_transaksi->num_rows() != '0') {
            $r = array(
                'jumlah' => $cek_transaksi->num_rows(),
                'subtotal' => $cek_transaksi->row()->subtotal,
                'list' => $list_transaksi->num_rows(),
            );
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $r
            );
            $this->response($data, 200);
        } else {
            $r = array(
                'jumlah' => "",
                'subtotal' => "",
            );

            $data = array(
                'success' => false,
                'message' => 'error',
                'data' => $r
            );
            $this->response($data, 200);
        }
    }

    public function jumlah_list_transaksi_toko_checkout_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $list_transaksi = $this->db->query("SELECT b.id FROM belanja_toko a 
        LEFT JOIN transaksi_belanja_toko b ON a.kode_transaksi = b.kode_transaksi
        WHERE a.id_user = '$id_user' AND b.`status` = 'UNPAID'
        GROUP BY b.id");
        if ($list_transaksi->num_rows() != '0') {
            $r = array(
                'list' => $list_transaksi->num_rows(),
            );
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $r
            );
            $this->response($data, 200);
        } else {
            $r = array(
                'list' => "",
            );

            $data = array(
                'success' => false,
                'message' => 'error',
                'data' => $r
            );
            $this->response($data, 200);
        }
    }

    public function jumlah_list_transaksi_resto_checkout_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $list_transaksi = $this->db->query("SELECT b.id FROM order_makanan a 
        LEFT JOIN transaksi_order_makan b ON a.kode_transaksi = b.kode_transaksi
        WHERE a.id_user = '$id_user' AND b.`status` = 'UNPAID'
        GROUP BY b.id");
        if ($list_transaksi->num_rows() != '0') {
            $r = array(
                'list' => $list_transaksi->num_rows(),
            );
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $r
            );
            $this->response($data, 200);
        } else {
            $r = array(
                'list' => "",
            );

            $data = array(
                'success' => false,
                'message' => 'error',
                'data' => $r
            );
            $this->response($data, 200);
        }
    }

    public function list_nomor_transaksi_resto_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $this->load->library('cekmutasi/cekmutasi');

        $param = $this->post();
        $id_user = $param['id_user'];
        $list_transaksi = $this->db->query("SELECT b.id, b.kode_transaksi,a.status as status_order, b.`status`, b.grand_total, b.created_date FROM order_makanan a 
        LEFT JOIN transaksi_order_makan b ON a.kode_transaksi = b.kode_transaksi
        WHERE a.id_user = '$id_user' 
        -- AND b.`status` = 'UNPAID'
        GROUP BY b.id")->result();

        $user = $this->db->query("SELECT * FROM user u WHERE u.user_id = '$id_user'")->result();
        foreach ($user as $row) {
            $u = array(
                'service_code' => strtolower($row->nama_bank),
                'account_number' => $row->nomor_rekening,
            );
        }

        if ($list_transaksi != NULL) {
            $r = array();
            foreach ($list_transaksi as $key => $p) {
                $get_order = $this->db->query("SELECT a.id_makanan, a.jumlah, b.nama_makanan, b.img FROM order_makanan a 
                LEFT JOIN makanan_restaurant b ON a.id_makanan = b.id
                WHERE a.kode_transaksi = '$p->kode_transaksi'")->result();
                $brg = array();
                foreach ($get_order as $i => $a) {
                    $brg[] = array(
                        'id_barang' => $a->id_makanan,
                        'jumlah_barang' => $a->jumlah,
                        'nama_barang' => $a->nama_makanan,
                        'img' => $a->img,

                    );
                }

                $mutasi = array_merge($u, array(
                    'amount' => $p->grand_total,
                    'date' => array(
                        // batas waktu 24 jam
                        'from' => $p->created_date,
                        'to' => date('Y-m-d H:i:s', strtotime($p->created_date.' +1 day')),
                    )
                ));
                $cek = $this->cekmutasi->bank()->mutation($mutasi);
                if (!empty($cek->response)) {
                    // sudah dibayar
                    $p->status = 'PAID';
                    $data_update = array(
                        'kode_transaksi'   => $p->kode_transaksi,
                        'status'           => 'PAID',
                    );
                    $this->db->where('status', 'UNPAID');
                    $this->db->where('kode_transaksi', $p->kode_transaksi);
                    $this->db->update('transaksi_order_makan', $data_update);
                }

                $r[] = array(
                    'id' => $p->id,
                    'mutasi' => $mutasi,
                    'kode_transaksi' => $p->kode_transaksi,
                    'status' => $p->status,
                    'status_order' => $p->status_order,
                    'grand_total' => $p->grand_total,
                    'list_order' => $brg
                );
            }
            $data = array(
                'success' => true,
                'message' => 'save data success',
                'data' => $r
            );
        } else {
            $r[] = array(
                'id' => "",
                'kode_transaksi' => "",
            );
            $data = array(
                'success' => false,
                'message' => 'error',
                'data' => $r
            );
        }

        $this->response($data, 200);
    }


    public function list_transaksi_resto_belum_lunas_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $cek_transaksi = $this->db->query("select * from order_makanan where id_user = '$id_user' AND status = 0")->result();

        foreach ($cek_transaksi as $p) {
            $get_barang = $this->db->query("select * from makanan_restaurant where id = '$p->id_makanan'")->row();

            $nama_barang = $get_barang->nama_makanan;
            $r[] = array(
                'id' => $p->id,
                'nama_barang' => $nama_barang,
                'harga_satuan' => $get_barang->harga,
                'qty' => $p->jumlah,
                'total_harga' => $p->total_harga,
                'subtotal' => $p->subtotal,
                'img' => base_url() . $get_barang->img,
            );
        }

        $data = array(
            'success' => true,
            'message' => 'save data success',
            'data' => $r
        );
        $this->response($data, 200);
    }

    public function list_transaksi_resto_checkout_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $cek_transaksi = $this->db->query("select * from order_makanan where id_user = '$id_user' AND status <> 0")->result();

        foreach ($cek_transaksi as $p) {
            $get_barang = $this->db->query("select * from makanan_restaurant where id = '$p->id_makanan'")->row();

            $nama_barang = $get_barang->nama_makanan;
            $r[] = array(
                'id' => $p->id,
                'nama_barang' => $nama_barang,
                'harga_satuan' => $get_barang->harga,
                'qty' => $p->jumlah,
                'total_harga' => $p->total_harga,
                'subtotal' => $p->subtotal,
                'img' => $get_barang->img,
            );
        }

        $data = array(
            'success' => true,
            'message' => 'save data success',
            'data' => $r
        );
        $this->response($data, 200);
    }

    public function jumlah_transaksi_resto_belum_lunas_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $cek_transaksi = $this->db->query("select * from order_makanan where id_user = '$id_user' AND status = 0");
        $cek_transaksi_resto = $this->db->query("select * from order_makanan where id_user = '$id_user' AND status = 0");
        $ttl = $cek_transaksi->num_rows() + $cek_transaksi_resto->num_rows();

        if ($cek_transaksi->row() != NULL) {
            $r = array(
                'jumlah' => $cek_transaksi->num_rows(),
                'subtotal' => $cek_transaksi_resto->row()->subtotal
            );
            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $r
            );
            $this->response($data, 200);
        } else {
            $r = array(
                'jumlah' => "",
                'subtotal' => "",
            );
            $data = array(
                'success' => false,
                'message' => 'error',
                'data' => $r
            );
            $this->response($data, 200);
        }
    }

    public function transaksi_makan_post()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Apartemen_model', 'apartemen_model');
        $json = file_get_contents('php://input');
        $dt = json_decode($json);
        // var_dump($dt);die();
        $tgl = date("YmdHis");
        foreach ($dt->id_order_makan as $p) {
            $id_user = $dt->id_user;
            $kode_transaksi = $id_user . '-' . $tgl . 'MK';
            $data = array(
                'kode_transaksi' => $kode_transaksi,
                'id_order_makan' => $p,
                'grand_total' => $dt->grand_total,
            );
            $this->apartemen_model->save_to_db('transaksi_order_makan', $data);
        }

        $data = array(
            'success' => true,
            'message' => 'save data success',
        );
        $this->response($data, 200);
    }

    public function register_resto_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/resto/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        } else {

            $nama_resto = $param['nama_resto'];
            $cek_nama_resto = $this->db->query("select * from restaurant where nama_resto = '$nama_resto'")->row();
            if ($cek_nama_resto != NULL) {
                $data = array(
                    'success' => false,
                    'message' => 'nama restaurant sudah ada',
                );

                $this->response($data, 200);
            } else {
                $this->upload->do_upload('img');

                $data = array(
                    'id_user'               => $param['id_user'],
                    'nama_resto'               => $param['nama_resto'],
                    'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/resto/icon/' . $rand . '.' . $ext,
                    'created_date'          => date('Y-m-d H:i:s')
                );
                $simpan = $this->apartemen_model->insert_id('restaurant', $data);
                if ($simpan != NULL || $simpan != "") {
                    $d[] = array(
                        "id" => $simpan,
                    );

                    $data = array(
                        'success' => true,
                        'message' => 'save data success',
                        'data' => $d
                    );
                    $this->response($data, 200);
                } else {
                    $data = array(
                        'success' => false,
                        'message' => 'save data failed',
                    );

                    $this->response($data, 200);
                }
            }
        }
    }

    public function update_resto_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/resto/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'nama_resto' => $param['nama_resto'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        } else {
            $this->upload->do_upload('img');
            $data = array(
                'nama_resto' => $param['nama_resto'],
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/resto/icon/' . $rand . '.' . $ext,
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        }
    }

    public function register_toko_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/resto/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        } else {
            $nama_toko = $param['nama_toko'];
            $cek_nama_toko = $this->db->query("select * from toko where nama_toko = '$nama_toko'")->row();
            if ($cek_nama_toko != NULL) {
                $data = array(
                    'success' => false,
                    'message' => 'nama restaurant sudah ada',
                );

                $this->response($data, 200);
            } else {
                $this->upload->do_upload('img');

                $data = array(
                    'id_user'               => $param['id_user'],
                    'nama_toko'               => $param['nama_toko'],
                    'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/toko/icon/' . $rand . '.' . $ext,
                    'created_date'          => date('Y-m-d H:i:s')
                );

                $simpan = $this->apartemen_model->insert_id('toko', $data);
                if ($simpan != NULL || $simpan != "") {
                    $d[] = array(
                        "id" => $simpan,
                    );

                    $data = array(
                        'success' => true,
                        'message' => 'save data success',
                        'data' => $d
                    );
                    $this->response($data, 200);
                } else {
                    $data = array(
                        'success' => false,
                        'message' => 'save data failed',
                    );

                    $this->response($data, 200);
                }
            }
        }
    }

    public function update_toko_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/toko/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'nama_toko' => $param['nama_toko'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        } else {
            $this->upload->do_upload('img');
            $data = array(
                'nama_toko' => $param['nama_toko'],
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/toko/icon/' . $rand . '.' . $ext,
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        }
    }

    public function disable_resto_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_resto = $param['id_resto'];
        $cek_nama_resto = $this->db->query("select * from restaurant where id = '$id_resto'")->row();
        if ($cek_nama_resto == NULL) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );

            $this->response($data, 200);
        } else {
            $data = array(
                'updated_date'          => date('Y-m-d H:i:s'),
                'is_deleted'               => '1',
            );

            if ($this->apartemen_model->update('id', $param['id_resto'], $data, 'restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function disable_toko_post()
    {
        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id_toko = $param['id_toko'];
        $cek_id_toko = $this->db->query("select * from toko where id = '$id_toko'")->row();
        if ($cek_id_toko == NULL) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );

            $this->response($data, 200);
        } else {
            $data = array(
                'updated_date'          => date('Y-m-d H:i:s'),
                'is_deleted'               => '1',
            );

            if ($this->apartemen_model->update('id', $param['id_toko'], $data, 'toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function upload_makanan_resto_post()
    {
        $param = $this->post();
        $id_resto = $param['id_resto'];

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/resto/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $this->upload->do_upload('img');
            $data = array(
                'id_resto' => $id_resto,
                'nama_makanan' => $param['nama_makanan'],
                'keterangan' => $param['keterangan'],
                'harga' => $param['harga'],
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/resto/' . $rand . '.' . $ext,
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('makanan_restaurant', $data);

            $data = array(
                'success' => true,
                'message' => 'success',
            );
            $this->response($data, 200);
        }
    }

    public function update_makanan_resto_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/resto/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'nama_makanan' => $param['nama_makanan'],
                'keterangan' => $param['keterangan'],
                'harga' => $param['harga'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'makanan_restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        } else {
            $this->upload->do_upload('img');
            $data = array(
                'nama_makanan' => $param['nama_makanan'],
                'harga' => $param['harga'],
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/resto/' . $rand . '.' . $ext,
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'makanan_restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        }
    }

    public function upload_barang_toko_post()
    {

        $param = $this->post();
        $id_toko = $param['id_toko'];

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/toko/';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $this->upload->do_upload('img');
            $data = array(
                'id_toko' => $id_toko,
                'nama_barang' => $param['nama_barang'],
                'keterangan' => $param['keterangan'],
                'harga' => $param['harga'],
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/toko/' . $rand . '.' . $ext,
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('barang_toko', $data);

            $data = array(
                'success' => true,
                'message' => 'success',
            );
            $this->response($data, 200);
        }
    }

    public function update_barang_toko_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();

        $this->load->library('upload');
        $rand = substr(hash('sha512', rand()), 0, 20);
        $nmfile = $rand;
        $files = $_FILES['img']['name'];
        $ada = explode(".", $files);
        $ext = end($ada);
        $config['upload_path'] = './assets/img/toko';
        $config['allowed_types'] = 'jpg|png|jpeg|bmp|PNG|JPG|JPEG';
        $config['max_size'] = '2048';
        $config['max_width']  = '2047';
        $config['max_height']  = '1366';
        $config['file_name'] = $nmfile;
        $this->upload->initialize($config);
        if (empty($_FILES['img']['name'])) {
            $data = array(
                'nama_barang' => $param['nama_barang'],
                'keterangan' => $param['keterangan'],
                'harga' => $param['harga'],
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'barang_toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        } else {
            $this->upload->do_upload('img');
            $data = array(
                'nama_barang' => $param['nama_barang'],
                'keterangan' => $param['keterangan'],
                'harga' => $param['harga'],
                'img' => 'http://wismartlink.asepbudiyanam.com/assets/img/toko/' . $rand . '.' . $ext,
                'updated_date' => date('Y-m-d H:i:s')
            );
            if ($this->apartemen_model->update('id', $param['id'], $data, 'barang_toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                );
                $this->response($data, 200); // 200 being the HTTP response code

            }
        }
    }

    public function disable_barang_toko_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id = $param['id'];
        $cek_id_barang = $this->db->query("select * from barang_toko where id = '$id'")->row();
        if ($cek_id_barang == NULL) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );

            $this->response($data, 200);
        } else {
            $data = array(
                'updated_date'          => date('Y-m-d H:i:s'),
                'is_deleted'               => '1',
            );

            if ($this->apartemen_model->update('id', $param['id'], $data, 'barang_toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function disable_makanan_resto_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id = $param['id'];
        $cek_id_barang = $this->db->query("select * from makanan_restaurant where id = '$id'")->row();
        if ($cek_id_barang == NULL) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );

            $this->response($data, 200);
        } else {
            $data = array(
                'updated_date'          => date('Y-m-d H:i:s'),
                'is_deleted'               => '1',
            );

            if ($this->apartemen_model->update('id', $param['id'], $data, 'makanan_restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function enable_barang_toko_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id = $param['id'];
        $cek_id_barang = $this->db->query("select * from toko where id = '$id'")->row();
        if ($cek_id_barang == NULL) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );

            $this->response($data, 200);
        } else {
            $data = array(
                'updated_date'          => date('Y-m-d H:i:s'),
                'is_deleted'               => '0',
            );

            if ($this->apartemen_model->update('id', $param['id'], $data, 'barang_toko')) {
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function enable_makanan_resto_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');

        $param = $this->post();
        $this->load->model('Apartemen_model', 'apartemen_model');
        $id = $param['id'];
        $cek_id_barang = $this->db->query("select * from makanan_restaurant where id = '$id'")->row();
        if ($cek_id_barang == NULL) {
            $data = array(
                'success' => false,
                'message' => 'error',
            );

            $this->response($data, 200);
        } else {
            $data = array(
                'updated_date'          => date('Y-m-d H:i:s'),
                'is_deleted'               => '0',
            );

            if ($this->apartemen_model->update('id', $param['id'], $data, 'makanan_restaurant')) {
                $data = array(
                    'success' => true,
                    'message' => 'save data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'save data failed',
                );

                $this->response($data, 200);
            }
        }
    }

    public function notifikasi_post()
    {
        $param = $this->post();

        $user = $param['id_user'];
        $brg = $this->db->query("select * from notifikasi where id_user ='" . $user . "'AND is_deleted = '0' AND sent = '1' order by created_date desc")->result();

        $prg = $this->db->query("select * from pengumuman order by created_date desc")->result();

        if ($brg != NULL || $prg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    // 'id_user' => $row->id_user,
                    'title' => $row->title,
                    'desc' => $row->desc,
                );
            }

            foreach ($prg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    // 'id_user' => $row->id_user,
                    'title' => $row->title,
                    'desc' => $row->desc,
                );
            }


            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function list_barang_by_toko_id_post()
    {
        $param = $this->post();
        $id_user = $param['id_toko'];
        $keyword = $param['keyword'];

        $brg = $this->db->query("select a.id, a.id_toko, a.nama_barang, a.harga, a.img, a.keterangan from barang_toko a left join toko b on a.id_toko = b.id where a.is_deleted = '0' AND a.id_toko = '$id_user' AND b.nama_toko like '%$keyword%' AND a.nama_barang like '%$keyword%' order by a.id desc")->result();
        if ($brg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'nama_barang' => $row->nama_barang,
                    'id_toko' => $row->id_toko,
                    'harga' => $row->harga,
                    'keterangan' => $row->keterangan,
                    'img' => base_url() . $row->img,
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function list_makanan_by_resto_id_post()
    {
        $param = $this->post();
        $id_resto = $param['id_resto'];
        $keyword = $param['keyword'];

        $brg = $this->db->query("select a.id, a.id_resto, a.nama_makanan, a.harga, a.img, a.keterangan from makanan_restaurant a left join restaurant b on a.id_resto = b.id where a.id_resto = '$id_resto' AND a.is_deleted = '0' AND b.nama_resto like '%$keyword%' AND a.nama_makanan like '%$keyword%' order by a.id desc")->result();
        if ($brg != NULL) {
            foreach ($brg as $row) {
                $d[] = array(
                    'id' => $row->id,
                    'nama_makanan' => $row->nama_makanan,
                    'id_resto' => $row->id_resto,
                    'harga' => $row->harga,
                    'img' => base_url() . $row->img,
                    'keterangan' => $row->keterangan
                );
            }

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function messages_post()
    {
        $param = $this->post();
        $user_id = $param['user_id'];

        $this->load->model('Apartemen_model', 'apartemen_model');
        $check_msg = $this->db->query("select * from messages a where a.sentby = '$user_id' OR a.sentto = '$user_id'")->row();
        if ($check_msg != NULL) {
            $get_parent = $this->db->query("select * from messages a where a.sentby = '$user_id' OR a.sentto = '$user_id' order by a.id DESC LIMIT 1")->row();
            $data = array(
                'sentby'            => $param['user_id'],
                'sentto'            => 'admin',
                'message'           => $param['message'],
                'parent_id'         => $get_parent->id,
                'datetime'          => date('Y-m-d H:i:s')
            );
        } else {
            $data = array(
                'sentby'            => $param['user_id'],
                'sentto'            => 'admin',
                'message'           => $param['message'],
                'datetime'          => date('Y-m-d H:i:s')
            );
        }

        if ($this->apartemen_model->save_to_db('messages', $data)) {
            $data = array(
                'success' => true,
                'message' => 'save data success',
            );
            $this->response($data, 200);
        } else {
            $data = array(
                'success' => false,
                'message' => 'save data failed',
            );

            $this->response($data, 200);
        }
    }

    public function messages_list_post()
    {
        $param = $this->post();
        $user_id = $param['user_id'];
        $msg = $this->db->query("select * from messages a where a.sentby = '$user_id' OR a.sentto = '$user_id' order by a.datetime desc")->result();

        $this->load->model('Apartemen_model', 'apartemen_model');
        if ($user_id != NULL) {
            if ($msg != NULL) {
                foreach ($msg as $row) {
                    $d[] = array(
                        'sentby' => $row->sentby,
                        'sentto' => $row->sentto,
                        'message' => $row->message,
                        'datetime' => $row->datetime,
                        'is_read' => $row->is_read,
                    );
                }

                $data = array(
                    'success' => true,
                    'message' => 'success',
                    'data' => $d
                );
                $this->response($data, 200); // 200 being the HTTP response code
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'error',
                    // 'data' => $sites
                );
                $this->response($data, 200); // 200 being the HTTP response code
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code
        }
    }

    public function status_toko_post()
    {
        $param = $this->post();
        $id_user = $param['id_toko'];

        $brg = $this->db->query("select * from toko a  where a.id = '$id_user'")->row();
        if ($brg != NULL) {
            if ($brg->is_approve == '1') {
                $status = 'Approved';
            } else {
                $status = 'Pending';
            }
            $d[] = array(
                'id' => $brg->id,
                'nama_toko' => $brg->nama_toko,
                'status' => $status,
            );

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function status_resto_post()
    {
        $param = $this->post();
        $id_user = $param['id_resto'];

        $brg = $this->db->query("select * from restaurant a  where a.id = '$id_user'")->row();
        if ($brg != NULL) {
            if ($brg->is_approve == '1') {
                $status = 'Approved';
            } else {
                $status = 'Pending';
            }
            $d[] = array(
                'id' => $brg->id,
                'nama_toko' => $brg->nama_resto,
                'status' => $status,
            );

            $data = array(
                'success' => true,
                'message' => 'success',
                'data' => $d
            );
            $this->response($data, 200); // 200 being the HTTP response code

        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function add_item_shop_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_order = $param['id_order'];
        $id_user = $param['id_user'];

        $brg = $this->db->query("select * from belanja_toko a  where a.id = '$id_order'")->row();
        if ($brg != NULL) {
            $jumlah_barang = $brg->jumlah_barang + 1;
            $get_harga = $this->db->query("select * from barang_toko a  where a.id = '$brg->id_barang'")->row();
            $total_harga = $get_harga->harga + intval($brg->total_harga);
            $data = array(
                'jumlah_barang'               => $jumlah_barang,
                'total_harga'               => $total_harga,
            );

            if ($this->apartemen_model->update('id', $id_order, $data, 'belanja_toko')) {
                $subtotal = $brg->subtotal + $get_harga->harga;
                $data_update = array(
                    'subtotal'           => $subtotal,
                );
                $this->db->where('status', 0);
                $this->db->where('id_user', $id_user);
                $this->db->update('belanja_toko', $data_update);

                $data = array(
                    'success' => true,
                    'message' => 'update data success',
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'update data failed',
                    'data' => $subtotal
                );

                $this->response($data, 200);
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function remove_item_shop_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_order = $param['id_order'];
        $id_user = $param['id_user'];

        $brg = $this->db->query("select * from belanja_toko a  where a.id = '$id_order'")->row();
        if ($brg != NULL) {
            $jumlah_barang = $brg->jumlah_barang - 1;
            $get_harga = $this->db->query("select * from barang_toko a  where a.id = '$brg->id_barang'")->row();
            $total_harga = intval($brg->total_harga) - $get_harga->harga;

            $data = array(
                'jumlah_barang'               => $jumlah_barang,
                'total_harga'               => $total_harga,
            );

            if ($this->apartemen_model->update('id', $id_order, $data, 'belanja_toko')) {
                $subtotal = $brg->subtotal - $get_harga->harga;
                $data_update = array(
                    'subtotal'           => $subtotal,
                );
                $this->db->where('status', 0);
                $this->db->where('id_user', $id_user);
                $this->db->update('belanja_toko', $data_update);
                $data = array(
                    'success' => true,
                    'message' => 'update data success',
                    'data' => $subtotal
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'update data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function add_item_food_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_order = $param['id_order'];
        $id_user = $param['id_user'];

        $brg = $this->db->query("select * from order_makanan a  where a.id = '$id_order'")->row();
        if ($brg != NULL) {
            $jumlah_barang = $brg->jumlah + 1;
            $get_harga = $this->db->query("select * from makanan_restaurant a  where a.id = '$brg->id_makanan'")->row();
            $total_harga = $get_harga->harga + intval($brg->total_harga);
            $data = array(
                'jumlah'               => $jumlah_barang,
                'total_harga'               => $total_harga,
            );

            if ($this->apartemen_model->update('id', $id_order, $data, 'order_makanan')) {
                $subtotal = $brg->subtotal + $get_harga->harga;
                $data_update = array(
                    'subtotal'           => $subtotal,
                );
                $this->db->where('status', 0);
                $this->db->where('id_user', $id_user);
                $this->db->update('order_makanan', $data_update);

                $data = array(
                    'success' => true,
                    'message' => 'update data success',
                    'data' => $subtotal
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'update data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function remove_item_food_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_order = $param['id_order'];
        $id_user = $param['id_user'];

        $brg = $this->db->query("select * from order_makanan a  where a.id = '$id_order'")->row();
        if ($brg != NULL) {
            $jumlah_barang = $brg->jumlah - 1;
            $get_harga = $this->db->query("select * from makanan_restaurant a  where a.id = '$brg->id_makanan'")->row();
            $total_harga = intval($brg->total_harga) - $get_harga->harga;
            $data = array(
                'jumlah'               => $jumlah_barang,
                'total_harga'               => $total_harga,
            );

            if ($this->apartemen_model->update('id', $id_order, $data, 'order_makanan')) {
                $subtotal = $brg->subtotal - $get_harga->harga;
                $data_update = array(
                    'subtotal'           => $subtotal,
                );
                $this->db->where('status', 0);
                $this->db->where('id_user', $id_user);
                $this->db->update('order_makanan', $data_update);
                $data = array(
                    'success' => true,
                    'message' => 'update data success',
                    'data' => $subtotal
                );
                $this->response($data, 200);
            } else {
                $data = array(
                    'success' => false,
                    'message' => 'update data failed',
                );

                $this->response($data, 200);
            }
        } else {
            $data = array(
                'success' => false,
                'message' => 'error',
                // 'data' => $sites
            );
            $this->response($data, 200); // 200 being the HTTP response code

        }
    }

    public function user_address_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $get_user = $this->db->query("SELECT 
        a.nama, a.user_id, a.email, a.phone_number, a.tgl_lahir, a.jk, a.no_ktp, a.nomor_rekening, a.nama_bank,
        b.nama_unit, b.nomor, b.lantai, c.nama_gedung, c.alamat, c.kota, d.id_apt, d.nama_apt, c.id_gedung, b.id_unit
        from user a 
        LEFT JOIN unit b ON a.idunit = b.id_unit
        LEFT JOIN gedung c ON b.id_gedung = c.id_gedung
        LEFT JOIN apartemen d ON c.id_apt = d.id_apt
        WHERE a.user_id = '$id_user'")->row();
        $nomor_unik = substr($get_user->phone_number, -3);

        $r[] = array(
            'id_user' => $get_user->user_id,
            'nama' => $get_user->nama,
            'phone_number' => $get_user->phone_number,
            'email' => $get_user->email,
            'tgl_lahir' => $get_user->tgl_lahir,
            'nomor_rekening' => $get_user->nomor_rekening,
            'nama_bank' => $get_user->nama_bank,
            'nama_unit' => $get_user->nama_unit,
            'nomor' => $get_user->nomor,
            'lantai' => $get_user->lantai,
            'nama_gedung' => $get_user->nama_gedung,
            'alamat' => $get_user->alamat,
            'kota' => $get_user->kota,
            'nama_apt' => $get_user->nama_apt,
            'nomor_unik' => $nomor_unik,
        );

        $data = array(
            'success' => true,
            'message' => 'save data success',
            'data' => $r
        );
        $this->response($data, 200);
    }

    public function nomor_unik_post()
    {
        $this->load->model('Apartemen_model', 'apartemen_model');
        $param = $this->post();
        $id_user = $param['id_user'];
        $get_user = $this->db->query("SELECT 
        a.nama, a.user_id, a.email, a.phone_number, a.tgl_lahir, a.jk, a.no_ktp, a.nomor_rekening, a.nama_bank,
        b.nama_unit, b.nomor, b.lantai, c.nama_gedung, c.alamat, c.kota, d.id_apt, d.nama_apt, c.id_gedung, b.id_unit
        from user a 
        LEFT JOIN unit b ON a.idunit = b.id_unit
        LEFT JOIN gedung c ON b.id_gedung = c.id_gedung
        LEFT JOIN apartemen d ON c.id_apt = d.id_apt
        WHERE a.user_id = '$id_user'")->row();
        $nomor_unik = substr($get_user->phone_number, -3);


        $data = array(
            'success' => true,
            'message' => 'save data success',
            'nomor_unik' => $nomor_unik
        );
        $this->response($data, 200);
    }

    public function list_bank_post()
    {
        $this->load->library('cekmutasi/cekmutasi');

        $banklist = $this->cekmutasi->bank()->list();
        foreach ($banklist->data as $r) {
            $nama_bank[] = array(
                'bank_name' => $r->service_name,
                'account_number' => $r->account_number,
            );
        }
        $data = array(
            'success' => true,
            'message' => 'save data success',
            'data' => $nama_bank
        );
        $this->response($data, 200);

        // print_r($banklist->data);
    }

    public function callback_post()
    {
        // $amount = 10100.00;
        // $grand_total = (int) $amount;
        // $data_update = array(
        //     'status'           => $grand_total,
        // );
        // $check_transaksi =  $this->db->query("SELECT * FROM transaksi_belanja_toko WHERE grand_total = '" . $grand_total . "' AND status = 'UNPAID' ORDER BY id ASC LIMIT 1")->row();

        // var_dump($check_transaksi); 
        // die();

        $cekmutasi = array(
            "api_signature" => "EwPrfhVRexGBOTYCzUlczkS440E1e97g"
        );

        $incomingApiSignature = isset($_SERVER['HTTP_API_SIGNATURE']) ? $_SERVER['HTTP_API_SIGNATURE'] : '';

        // validasi API Signature
        if (!hash_equals($cekmutasi['api_signature'], $incomingApiSignature)) {
            $msg_cek_mutasi = 'Invalid Signature';
            $time = '';
            $type = '';
            $amount = '';
            $grand_total = '';
            $description = '';
            $balance = '';
            $json = '';
            $post = '';
            $jenis_transaksi = '';
            $res_transaction_check = '';
            $created_date = date('Y-m-d H:i:s');
            $this->insert_log($time, $type, $amount, $grand_total, $description, $balance, $jenis_transaksi, $res_transaction_check, $msg_cek_mutasi, $json, $incomingApiSignature, $post, $created_date);
            exit("Invalid Signature");
        }

        $post = file_get_contents("php://input");
        $json = json_decode($post);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $msg_cek_mutasi = 'Invalid JSON';
            $time = '';
            $type = '';
            $amount = '';
            $grand_total = '';
            $description = '';
            $balance = '';
            $json = '';
            $post = '';
            $jenis_transaksi = '';
            $res_transaction_check = '';
            $created_date = date('Y-m-d H:i:s');
            $this->insert_log($time, $type, $amount, $grand_total, $description, $balance, $jenis_transaksi, $res_transaction_check, $msg_cek_mutasi, $json, $incomingApiSignature, $post, $created_date);
            exit("Invalid JSON");
        }

        if ($json->action == "payment_report") {
            foreach ($json->content->data as $data) {
                # Waktu transaksi dalam format unix timestamp
                $time = $data->unix_timestamp;

                # Tipe transaksi : credit / debit
                $type = $data->type;

                # Jumlah (2 desimal) : 50000.00
                $amount = $data->amount;

                # Berita transfer
                $description = $data->description;

                # Saldo rekening (2 desimal) : 1500000.00
                $balance = $data->balance;

                if ($type == "credit") // dana masuk
                {
                    $grand_total = (int) $amount;
                    // $sql = "SELECT * FROM tabel_invoice WHERE jumlah_tagihan = '" . $conn->real_escape_string($amount) . "' AND status = 'UNPAID' ORDER BY id ASC LIMIT 1";
                    $check_transaksi =  $this->db->query("SELECT * FROM transaksi_belanja_toko WHERE grand_total = '" . $grand_total . "' AND status = 'UNPAID' ORDER BY id ASC LIMIT 1")->row();

                    if ($check_transaksi != NULL) {
                        $jenis_transaksi = 'toko';
                        $data_update = array(
                            'status'           => 'PAID',
                        );
                        $this->db->where('id', $check_transaksi->id);
                        $this->db->update('transaksi_belanja_toko', $data_update);
                    } else {
                        $check_transaksi_resto =  $this->db->query("SELECT * FROM transaksi_order_makan WHERE grand_total = '" . $grand_total . "' AND status = 'UNPAID' ORDER BY id ASC LIMIT 1")->row();
                        if ($check_transaksi_resto != NULL) {
                            $jenis_transaksi = 'resto';
                            $data_updates = array(
                                'status'           => 'PAID',
                            );
                            $this->db->where('id', $check_transaksi_resto->id);
                            $this->db->update('transaksi_order_makan', $data_updates);
                        }
                    }
                    $res_transaction_check = 'data transaksi tidak ditemukan';
                    $msg_cek_mutasi = 'dana masuk';
                }
            }
            $created_date = date('Y-m-d H:i:s');
            $this->insert_log($time, $type, $amount, $grand_total, $description, $balance, $jenis_transaksi, $res_transaction_check, $msg_cek_mutasi, $json, $incomingApiSignature, $post, $created_date);
        } else {
            $msg_cek_mutasi = 'not found';
            $time = '';
            $type = '';
            $amount = '';
            $grand_total = '';
            $description = '';
            $json = '';
            $post = '';
            $balance = '';
            $jenis_transaksi = '';
            $res_transaction_check = '';
            $created_date = date('Y-m-d H:i:s');
            $this->insert_log($time, $type, $amount, $grand_total, $description, $balance, $jenis_transaksi, $res_transaction_check, $msg_cek_mutasi, $json, $incomingApiSignature, $post, $created_date);
        }
    }

    function insert_log($time, $type, $amount, $grand_total, $description, $balance, $jenis_transaksi, $res_transaction_check, $msg_cek_mutasi, $json, $incomingApiSignature, $post, $created_date)
    {
        $datas = array(
            'time' => $time,
            'type' => $type,
            'amount' => $amount,
            'amount_int' => $grand_total,
            'description' => $description,
            'balance' => $balance,
            'jenis_transaksi' => $jenis_transaksi,
            'res_transaction_check' => $res_transaction_check,
            'msg_cek_mutasi' => $msg_cek_mutasi,
            'json' => $json,
            'incomingApiSignature' => $incomingApiSignature,
            'post' => $post,
            'created_date' => $created_date
        );
        $this->db->insert('log_transaksi', $datas);
    }
}
