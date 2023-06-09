<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->user_login->login($username, $password);
		}
		$data = array(
			'title' 	=> '',
			'isi'		=> 'v_login'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function logout()
	{
		$this->user_login->logout();
	}
}

/* End of file Controllername.php */
