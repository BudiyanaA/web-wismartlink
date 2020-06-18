<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Signin_model extends CI_Model
{
	var $infra = null;

	function __construct()
	{
		parent::__construct();
	}

	public function get_admin($username, $password)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE email ='$username' AND password='$password' ");
		if ($query->num_rows() == 0) {
			$query = $this->db->query("SELECT * FROM admin WHERE username ='$username' AND password='$password' ");
		}
		// var_dump($query->num_rows());die();
		return $query;

		/*echo $username;
		echo $password;*/
	}
}
