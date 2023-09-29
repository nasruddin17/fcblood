<?php

class M_jenis extends CI_Model
{

	public function add($data)
	{
		$this->db->insert('tbl_jenis', $data);
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis');
		$this->db->order_by('id_jenis', 'asc');
		return $this->db->get()->result();
	}

	public function detail($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('tbl_jenis');
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->get()->row();
	}

	public function countRows($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('tbl_kasus');
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->count_all_results();
	}
}

/* End of file ModelName.php */
