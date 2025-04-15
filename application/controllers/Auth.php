<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_models');
		$this->load->helper('url_helper');
		// $this->check_guest_only();
	}

	public function register()
	{
		$this->check_guest_only();
		
		$data['title'] = 'Register';
		$data['content'] = 'auth/register';

		$this->load->view('layouts/main', $data);
	}

	public function register_user()
	{
		$this->check_guest_only();
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nim', 'Nim', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$data = array(
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('name'),
				'password' => $this->input->post('password')
			);

			if ($this->Auth_models->register($data)) {
				redirect('auth/login');
			} else {
				redirect('auth/register');
			}
		}
	}

	public function login()
	{
		$this->check_guest_only();
		$data['title'] = 'Login';
		$data['content'] = 'auth/login';

		$this->load->view('layouts/main', $data);
	}

	public function login_user()
	{
		$this->check_guest_only();
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->Auth_models->login($email, $password);

			if ($user) {
				$this->session->set_userdata([
					'id_user' => $user->id_user,
					'role' => $user->role
				]);
				
				if($user->role === 'mahasiswa'){
					redirect('dashboard');
				} else {
					redirect('admin');
				}
				
			} else {
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$this->check_login_only();
		$this->session->unset_userdata('id_user');
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}