<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kasus extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kasus');
		$this->load->model('m_jenis');
		$this->user_login->cek_login();
	}

	public function index()
	{

		$data = array(
			'title' 	=> 'Data Permintaan Darah Di UTD',
			'kasus'	=> $this->m_kasus->tampil(),
			'isi'		=> 'kasus/v_index'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('id_jenis', 'Jenis Kasus', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('tahun', 'Tahun', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('bulan', 'Bulan', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		$this->form_validation->set_rules('jml', 'Jumlah Kasus', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Input Data Permintaan',
				'jenis'	=> $this->m_jenis->tampil(),
				'isi'	=> 'kasus/v_add'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_jenis' 	=> $this->input->post('id_jenis'),
				'tahun' 	=> $this->input->post('tahun'),
				'bulan' 	=> $this->input->post('bulan'),
				'jml'		=> $this->input->post('jml'),
			);
			$this->m_kasus->add($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Tambahkan !!!');
			redirect('kasus');
		}
	}

	public function edit($id_kasus)
	{
		$this->form_validation->set_rules('id_jenis', 'Jenis Kasus', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('tahun', 'Tahun', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('bulan', 'Bulan', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		$this->form_validation->set_rules('jml', 'Jumlah Kasus', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Edit Data Kasus',
				'jenis'	=> $this->m_jenis->tampil(),
				'kasus'	=> $this->m_kasus->detail($id_kasus),
				'isi'	=> 'kasus/v_edit'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_kasus' 	=> $id_kasus,
				'id_jenis' 	=> $this->input->post('id_jenis'),
				'tahun' 	=> $this->input->post('tahun'),
				'bulan' 	=> $this->input->post('bulan'),
				'jml'		=> $this->input->post('jml'),
			);
			$this->m_kasus->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('kasus');
		}
	}

	public function delete($id_kasus)
	{
		$data = array('id_kasus' => $id_kasus);
		$this->m_kasus->hapus($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('kasus');
	}

	//==============hitung prediksi
	public function prediksi()
	{
		$data = array(
			'title' 	=> 'Hitung Prediksi',
			'jenis' => $this->m_jenis->tampil(),
			'controller' => $this,
			'isi'		=> 'prediksi/v_index'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function cekjenis($id_jenis)
	{
		$ok = false;

		// cek data jenis didatabase
		$rows = $this->m_jenis->countRows($id_jenis);
		$ok = $rows > 0;

		return $ok;
	}

	public function prediksi_all()
	{
		$data = array(
			'title' 	=> 'Hasil Perhitungan Triple Exponentian',
			'kasus'	=> $this->m_kasus->tampil_prediksi(),
			'jml_kasus' => $this->m_kasus->jml_kasus(),
			'isi'		=> 'prediksi/v_prediksi'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function print_prediksi_all()
	{
		$data = array(
			'title' 	=> 'Hasil Perhitungan Triple Exponentian',
			'kasus'	=> $this->m_kasus->tampil_prediksi(),
			'jml_kasus' => $this->m_kasus->jml_kasus(),
		);
		$this->load->view('prediksi/v_print_prediksi', $data, FALSE);
	}

	public function prediksi_kasus($id_jenis)
	{
		$data = array(
			'title' 	=> 'Hasil Perhitungan Triple Exponentian',
			'kasus'		=> $this->m_kasus->tampil_prediksi_data($id_jenis),
			'jml_kasus' => $this->m_kasus->jumlah($id_jenis),
			'jenis'		=> $this->m_jenis->detail($id_jenis),
			'isi'		=> 'prediksi/v_prediksi_kasus'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function print_prediksi_kasus($id_jenis)
	{
		$data = array(
			'title' 	=> 'Hasil Perhitungan Triple Exponentian',
			'kasus'		=> $this->m_kasus->tampil_prediksi_data($id_jenis),
			'jml_kasus' => $this->m_kasus->jumlah($id_jenis),
			'jenis'		=> $this->m_jenis->detail($id_jenis),

		);
		$this->load->view('prediksi/v_print_prediksi_kasus', $data, FALSE);
	}
}

/* End of file Controllername.php */
