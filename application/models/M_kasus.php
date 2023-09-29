<?php

class M_kasus extends CI_Model
{

	public function add($data)
	{
		$this->db->insert('tbl_kasus', $data);
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('tbl_kasus');
		$this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kasus.id_jenis', 'left');
		$this->db->order_by('tbl_kasus.id_jenis', 'asc');
		$this->db->order_by('tbl_kasus.tahun', 'asc');
		return $this->db->get()->result();
	}

	public function detail($id_kasus)
	{
		$this->db->select('*');
		$this->db->from('tbl_kasus');
		$this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kasus.id_jenis', 'left');
		$this->db->where('id_kasus', $id_kasus);
		return $this->db->get()->row();
	}

	public function tampil_prediksi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kasus');
		$this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kasus.id_jenis', 'left');
		$this->db->order_by('tbl_kasus.id_jenis', 'asc');
		$this->db->order_by('tbl_kasus.tahun', 'asc');
		$this->db->order_by('tbl_kasus.bulan', 'asc');
		return $this->db->get()->result();
	}

	public function tampil_prediksi_data($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('tbl_kasus');
		$this->db->join('tbl_jenis', 'tbl_jenis.id_jenis = tbl_kasus.id_jenis', 'left');
		$this->db->where('tbl_kasus.id_jenis', $id_jenis);
		$this->db->order_by('tbl_kasus.id_kasus', 'asc');
		// $this->db->order_by('tbl_kasus.bulan', 'asc');

		return $this->db->get()->result();
	}

	public function jml_kasus()
	{
		return $this->db->get('tbl_kasus')->num_rows();
	}

	public function jumlah($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('tbl_kasus');
		$this->db->where('id_jenis', $id_jenis);
		return $this->db->get()->num_rows();
	}



	public function edit($data)
	{
		$this->db->where('id_kasus', $data['id_kasus']);
		$this->db->update('tbl_kasus', $data);
	}

	public function hapus($data)
	{
		$this->db->where('id_kasus', $data['id_kasus']);
		$this->db->delete('tbl_kasus', $data);
	}
}

/* End of file ModelName.php */
