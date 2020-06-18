<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant_model extends CI_Model
{
	var $infra = null;

	var $table = 'restaurant'; //nama tabel dari database
	var $column_order = array(null, 'e.id', 'e.nama_resto', 'e.img', 'u.nama', 'u.email', 'un.nama_unit', 'un.nomor', 'un.lantai', 'g.nama_gedung', 'a.nama_apt', 'e.is_approve'); //field yang ada di table user
	var $column_search = array('e.id', 'e.nama_resto', 'e.img', 'u.nama', 'u.email', 'un.nama_unit', 'un.nomor', 'un.lantai', 'g.nama_gedung', 'a.nama_apt', 'e.is_approve'); //field yang diizin untuk pencarian 
	var $order = array('e.id' => 'asc'); // default order 

	function __construct()
	{
		parent::__construct();
	}


	// public $table = 'site';
	public $id = 'id';
	// public $order = 'DESC';
	private function _get_datatables_query()
	{
		$this->db->select('e.id, e.img, u.nama, e.nama_resto, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt, e.is_approve');
		$this->db->from('restaurant e');
		$this->db->join('user u', 'e.id_user = u.user_id', 'left');
		$this->db->join('unit un', 'u.idunit = un.id_unit', 'left');
		$this->db->join('gedung g', 'un.id_gedung = g.id_gedung', 'left');
		$this->db->join('apartemen a', 'g.id_apt = a.id_apt', 'left');

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

	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}
}
