<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ganti_password_model extends CI_Model
{
	var $table = 'v_blog'; //nama tabel dari database
	var $table2 = 'blog'; //nama tabel dari database

	function __construct()
	{
		parent::__construct();
	}


	// public $table = 'measurement_method';
	// public $order = 'DESC';
	public function checkOldPass($email, $password)
	{
		$qr = $this->db->get_where('admin', array('email' => $email, 'password' => $password));
		if ($qr->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// insert data
	function insert($data)
	{
		$this->db->insert($this->table2, $data);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// update data
	public function update($data, $id)
	{
		$this->db->where('email', $id);
		return $this->db->update('admin', $data);
	}


	// delete data
	function delete($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table2, $data);
	}
}
