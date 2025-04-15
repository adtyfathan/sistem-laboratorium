<?php

class Alat extends My_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Alat_models');
		$this->load->helper('url');
		$this->check_login_only();
	}

    public function index(){
        $data['title'] = 'Data Alat';
		$data['content'] = 'alat/index';
		$data['alat'] = $this->Alat_models->getAllAlat();

		$this->load->view('layouts/main', $data);
    }

	public function create($id){
        $data['title'] = 'Tambah Data Alat';
		$data['content'] = 'alat/create';
        $data['alat'] = $this->Alat_models->getAlatById($id);

		$this->load->view('layouts/main', $data);
    }

	public function store($id_alat){
        $tanggal_peminjaman = $this->input->post('tanggal_peminjaman');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $kuantitas = (int) $this->input->post('kuantitas');
        $status = 'diajukan';
        $id_user = $this->session->userdata('id_user');

        if (strtotime($tanggal_peminjaman) > strtotime($tanggal_pengembalian)) {
            $this->session->set_flashdata('error', 'Tanggal peminjaman tidak valid.');
            return redirect('alat/create/' . $id_alat);
        }

        $mahasiswa = $this->Alat_models->getMahasiswaByUserId($id_user);
        $alat = $this->Alat_models->getAlatById($id_alat);

        if (!$mahasiswa || !$alat) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            return redirect('alat/create/' . $id_alat);
        }

        if ($kuantitas <= 0) {
            $this->session->set_flashdata('error', 'Kuantitas harus lebih dari 0.');
            return redirect('alat/create/' . $id_alat);
        }

        if ($kuantitas > $alat->stok) {
            $this->session->set_flashdata('error', 'Kuantitas melebihi stok tersedia.');
            return redirect('alat/create/' . $id_alat);
        }

        $terpinjam = $this->Alat_models->getTotalKuantitasTerpinjam($id_alat, $tanggal_peminjaman, $tanggal_pengembalian);
        
        if (($terpinjam + $kuantitas) > $alat->stok) {
            $this->session->set_flashdata('error', 'Stok tidak mencukupi untuk tanggal tersebut.');
            return redirect('alat/create/' . $id_alat);
        }

        $data = [
            'tanggal_peminjaman' => $tanggal_peminjaman,
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'kuantitas' => $kuantitas,
            'status' => $status,
            'nim' => $mahasiswa->nim,
            'id_alat' => $id_alat
        ];

        $peminjaman = $this->Alat_models->insert_peminjaman($data);

        redirect($peminjaman ? 'alat' : 'alat/create');
    }
}