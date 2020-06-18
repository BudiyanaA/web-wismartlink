<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Apartemen_model extends CI_Model
{
	var $infra = null;
	var $table = 'apartemen'; //nama tabel dari database
	var $table2 = 'apartemen'; //nama tabel dari database
	var $column_order = array(null, 'id_apt', 'nama_apt', 'kode_apt'); //field yang ada di table user
	var $column_search = array('id_apt', 'nama_apt', 'kode_apt'); //field yang diizin untuk pencarian 
	var $order = array('id_apt' => 'asc'); // default order 

	function __construct()
	{
		parent::__construct();
	}
	public $id = 'id_apt';
	private function _get_datatables_query()
	{

		$this->db->from($this->table);

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
	function save_to_db($table_name, $data)
	{
		/**
		 * ===================================================
		 * Transactions with databases
		 * ===================================================
		 */
		$this->db->trans_begin();

		$this->db->insert($table_name, $data);

		/**
		 * ===================================================
		 * Transactions with databases
		 * ===================================================
		 */
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}

		return true;
	}

	function insert_id($table_name, $data)
	{
		/**
		 * ===================================================
		 * Transactions with databases
		 * ===================================================
		 */
		$this->db->trans_begin();

		$this->db->insert($table_name, $data);
		$insert_id = $this->db->insert_id();

		/**
		 * ===================================================
		 * Transactions with databases
		 * ===================================================
		 */
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
		} else {
			$this->db->trans_commit();
		}

		return $insert_id;
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

	// get level by id
	function get_by_level_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get('leveluser')->row();
	}

	// get data level
	function get_all_level()
	{
		return $this->db->get('leveluser');
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
	function update($id_table, $id, $data, $table)
	{
		$this->db->where($id_table, $id);
		$this->db->update($table, $data);
		return TRUE;
	}

	// delete data
	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table2);
	}

	function delete_row($id_table, $id, $table)
	{
		$this->db->where($id_table, $id);
		$this->db->delete($table);
		return TRUE;

	}
}
