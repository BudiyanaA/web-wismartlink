<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sewa_fasilitas_model extends CI_Model
{
	var $infra = null;
	var $table = 'request_fasilitas'; //nama tabel dari database
	var $table2 = 'request_fasilitas'; //nama tabel dari database
	var $column_order = array(null, 'rf.id', 'f.fasilitas', 'rf.request_start', 'rf.request_end', 'rf.status', 'rf.biaya', 'un.nomor', 'rf.is_paid', 'rf.invoice_no', 'rf.tanggal_bayar', 'rf.created_date', 'u.nama', 'u.email', 'un.nama_unit', 'un.nomor', 'un.lantai', 'g.nama_gedung', 'a.nama_apt'); //field yang ada di table user
	var $column_search = array('rf.id', 'f.fasilitas', 'rf.request_start', 'rf.request_end', 'rf.status', 'rf.biaya', 'un.nomor', 'rf.is_paid', 'rf.invoice_no', 'rf.tanggal_bayar', 'rf.created_date', 'u.nama', 'u.email', 'un.nama_unit', 'un.nomor', 'un.lantai', 'g.nama_gedung', 'a.nama_apt'); //field yang diizin untuk pencarian 
	var $order = array('rf.id' => 'desc'); // default order 

	function __construct()
	{
		parent::__construct();
	}


	// public $table = 'measurement_method';
	public $id = 'rf.id';
	// public $order = 'DESC';

	private function _get_datatables_query()
	{
		$this->db->select('rf.id, rf.request_start, f.fasilitas, rf.request_end, rf.status, rf.biaya, un.nomor, rf.is_paid, rf.invoice_no, rf.tanggal_bayar, rf.created_date, u.nama, u.email, un.nama_unit, un.nomor, un.lantai, g.nama_gedung, a.nama_apt');
		$this->db->from('request_fasilitas rf');
		$this->db->join('fasilitas_gedung f', 'rf.fasilitas_id = f.id', 'left');
		$this->db->join('user u', 'rf.id_user = u.user_id', 'left');
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

	function get_all()
	{
		$this->db->where('is_active', '1');

		return $this->db->get($this->table2);
		// var_dump($query);

		/*echo $username;
		echo $password;*/
	}

	// get all

	// get data by id
	function get_by_id($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table)->row();
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
	function delete($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->delete('request_fasilitas');
	}
}
