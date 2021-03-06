<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penghuni_model extends CI_Model
{
	var $infra = null;
	var $table = 'user'; //nama tabel dari database
	var $table2 = 'user'; //nama tabel dari database
	var $column_order = array(null, 'nama', 'email', 'status', 'img'); //field yang ada di table user
	var $column_search = array('nama', 'email', 'status', 'img'); //field yang diizin untuk pencarian 
	var $order = array('user_id' => 'desc'); // default order 

	function __construct()
	{
		parent::__construct();
	}


	// public $table = 'measurement_method';
	public $id = 'user_id';
	// public $order = 'DESC';

	private function _get_datatables_query()
	{

		$this->db->from($this->table);
		$this->db->where('level', 8);

		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{

				if ($i === 0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if (isset($_POST['order'])) {
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	function get_all()
	{

		return $this->db->get($this->table2);
		// var_dump($query);

		/*echo $username;
		echo $password;*/
	}

	// get all

	// get data by id
	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table2)->row();
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
	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table2, $data);
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table2);
	}
}
