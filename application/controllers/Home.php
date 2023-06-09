<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'title' 	=> '',
			'isi'		=> 'v_home'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
}

/* End of file Controllername.php */
