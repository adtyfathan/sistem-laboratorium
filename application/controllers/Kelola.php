<?php

class Kelola extends My_Controller
{
    public function __construct(){
        parent::__construct();
		$this->load->model('Kelola_models');
        $this->load->model('Alat_models');
		$this->load->helper('url');
		$this->check_login_only();
    }

    public function index(){
        $data['title'] = 'Data Alat';
		$data['content'] = 'kelola/index';
		$data['alat'] = $this->Alat_models->getAllAlat();

		$this->load->view('layouts/main', $data);
    }

    public function create(){
        $data['title'] = 'Tambah Data Alat';
		$data['content'] = 'kelola/create';

		$this->load->view('layouts/main', $data);
    }

    public function store(){
        $this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_alat' => $this->input->post('nama_alat'),
                'stok' => $this->input->post('stok'),
			);
			$this->Kelola_models->insertAlat($data);
			redirect('kelola');
		}
    }

    public function edit($id)
	{
		$data['title'] = 'Edit Data Alat';
		$data['content'] = 'kelola/edit';
		$data['alat'] = $this->Alat_models->getAlatById($id);

		$this->load->view('layouts/main', $data);
	}

    public function update($id){
        $this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nama_alat' => $this->input->post('nama_alat'),
                'stok' => $this->input->post('stok'),
			);
			$this->Kelola_models->updateAlat($id, $data);
			redirect('kelola');
		}
    }

    public function delete($id)
	{
		$this->Kelola_models->deleteAlat($id);
		redirect('kelola');
	}
}