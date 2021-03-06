<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class List_transaksi_toko_model extends CI_Model
{
	var $infra = null;

	var $table = 'barang_toko'; //nama tabel dari database
	var $column_order = array(null, 'e.id', 'us.nama', 'e.id_user', 'e.id_barang', 'us.img as foto', 'u.nama_barang', 'u.harga', 'r.nama_toko', 'u.img', 'e.jumlah', 'e.total_harga', 'e.status', 'e.created_date'); //field yang ada di table user
	var $column_search = array('e.id', 'us.nama', 'e.id_user', 'e.id_barang', 'us.img as foto', 'u.nama_barang', 'u.harga', 'r.nama_toko', 'u.img', 'e.jumlah', 'e.total_harga', 'e.status', 'e.created_date'); //field yang ada di table user
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
		$this->db->select('e.id, e.id_user, us.nama, e.id_barang, r.nama_toko, us.img as foto,  u.nama_barang, u.harga, u.img, e.jumlah_barang, e.total_harga, e.status, e.created_date');
		$this->db->from('belanja_toko e');
		$this->db->join('barang_toko u', 'e.id_barang = u.id', 'left');
		$this->db->join('toko r', 'u.id_toko = r.id', 'left');
		$this->db->join('user us', 'e.id_user = us.user_id', 'left');


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
