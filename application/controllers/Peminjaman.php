<?php

class Peminjaman extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Peminjaman_models');
		$this->load->helper('url');
		$this->check_login_only();
    }

    public function index(){
        $data['title'] = 'Data Peminjaman';
        $data['content'] = 'peminjaman/index';
        $data['peminjaman'] = $this->Peminjaman_models->getAllPeminjaman();

		$this->load->view('layouts/main', $data);
    }

    
}