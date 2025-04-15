<?php

class Auth_models extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function register($data)
	{
		$this->db->trans_start();

		$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
		
		$userData = [
			'email'    => $data['email'],
			'username' => $data['username'],
			'password' => $data['password'],
			'role' => 'mahasiswa'
		];

		$this->db->insert('users', $userData);
    	$id_user = $this->db->insert_id();

		$mahasiswaData = [
			'nim'     => $data['nim'],
			'nama'    => $data['nama'],
			'id_user ' => $id_user
		];

		$this->db->insert('mahasiswa', $mahasiswaData);
		
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return false;
		}

		return $id_user;
	}

	public function login($email, $password)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			$user = $query->row();
			if (password_verify($password, $user->password)) {
				return $user;
			}
		}

		return false;
	}

	public function isAdmin($id){
		
	}
}