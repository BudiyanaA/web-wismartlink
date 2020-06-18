<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function get_customer($phone_number)
	{
		$query = $this->db->query("SELECT * FROM customer WHERE phone_number='$phone_number' AND is_active = '1'");
		return $query;		
	}

	public function get_customer_by_id($id)
	{
		$query = $this->db->query("SELECT fullname, email FROM customer WHERE customer_id='$id' AND is_active = '1'")->row();
		return $query;		
	}

}
