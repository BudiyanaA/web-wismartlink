<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

require_once APPPATH . '/libraries/REST_Controller.php';

class Payment extends REST_Controller
{
    public function bank_get() {
        $data = $this->db->query('select * from bank')->result_array();
        $wrapper = array(
            'status' => 200,
            'message' => 'success',
            'data' => $data
        );
        $this->response($wrapper, $wrapper['status']);
    }

    public function pay_post() {
        $bank = $this->post('nama_bank');
        $kode = $this->post('kode_transaksi');
        $jenis = $this->post('jenis'); // belanja toko, order makanan
        
        $data = array(
            'nama_bank' => $bank,
            'kode_transaksi' => $kode,
            'jenis' => $jenis,
            'status' => 'pending',
            'waktu' => date('Y-m-d H:i:s'),
        );
        
        $total = $this->db->query('select * from '.$jenis.' where kode_transaksi ="'.$kode.'"')->row('subtotal'); // belanja toko
        
        // save to database
        $save = $this->db->insert('payment', $data);

        if (!$save) {
            $wrapper = array(
                'status' => 404,
                'message' => 'failed',
            );
        } else {
            switch ($bank) {
                case "BCA":
                    $vars = array(
                        "payment_type" => "bank_transfer",
                        "transaction_details" => array(
                            "order_id" => $kode."-".time(),
                            "gross_amount" => $total
                        ),
                        "bank_transfer" => array(
                            "bank" => "bca"
                        )
                    );
                    $result = $this->doPayment($vars);
                    break;
                case "BNI":
                    $vars = array(
                        "payment_type" => "bank_transfer",
                        "transaction_details" => array(
                            "order_id" => $kode."-".time(),
                            "gross_amount" => $total
                        ),
                        "bank_transfer" => array(
                            "bank" => "bni"
                        )
                    );
                    $result = $this->doPayment($vars);
                    break;
                case "Mandiri":
                    $vars = array(
                        "payment_type" => "echannel",
                        "transaction_details" => array(
                            "order_id" => $kode."-".time(),
                            "gross_amount" => $total
                        ),
                        "echannel" => array(
                            "bill_info1" => "Payment For:",
                            "bill_info2" => "debt"
                        )
                    );
                    $result = $this->doPayment($vars);
                    break;
                case "Permata":
                    $vars = array(
                        "payment_type" => "permata",
                        "transaction_details" => array(
                            "order_id" => $kode."-".time(),
                            "gross_amount" => $total
                        )
                    );
                    $result = $this->doPayment($vars);
                default:
                    $result = "Ups Something Wrong";
                    break;
            }
    
            if (!$total) {
                $wrapper = array(
                    'status' => 404,
                    'message' => 'kode_transaksi_not_found',
                );
            } else {
                $wrapper = array(
                    'status' => 200,
                    'message' => 'payment_success',
                    'data' => json_decode($result, true)
                );
            }
        }

        $this->response($wrapper, $wrapper['status']);
    }

    private function doPayment($vars = array()) {
        // persiapkan curl
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.midtrans.com/v2/charge");

        // post
        // $vars = array(
        //     "payment_type" => "bank_transfer",
        //     "transaction_details" => array(
        //         "order_id" => "order-104",
        //         "gross_amount" => 44000
        //     ),
        //     "bank_transfer" => array(
        //         "bank" => "bca"
        //     )
        // );
 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($vars)); 

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $server_key = "SB-Mid-server-cUlRJu5X0A8TmiCfEcRPFH4s";

        // headers
        $headers = [
            'Accept: application/json',
            'Authorization: Basic '.base64_encode($server_key),
            'Content-Type: application/json',
        ];
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $output contains the output string 
        $output = curl_exec($ch); 

        // tutup curl 
        curl_close($ch);      

        // menampilkan hasil curl
        header('Content-Type: application/json');
        return $output;
    }
}