<?php

class Verifikasi extends My_Controller
{
    public function __construct(){
        parent::__construct();
		$this->load->model('Verifikasi_models');
        $this->load->model('Peminjaman_models');
        $this->load->model('Alat_models');
		$this->load->helper('url');
		$this->check_login_only();
    }

    public function index(){
        $data['title'] = 'Data Verifikasi';
        $data['content'] = 'verifikasi/index';
        $data['verifikasi'] = $this->Verifikasi_models->getAllVerifikasi();

		$this->load->view('layouts/main', $data);
    }
    
    public function acc($id_verifikasi)
    {
        $verifikasi = $this->Verifikasi_models->getVerifikasiById($id_verifikasi);

        if (!$verifikasi) {
            show_404();
        }

        $tanggal_verifikasi = date('Y-m-d');

        // Update verifikasi table
        $this->Verifikasi_models->updateVerifikasi($id_verifikasi, [
            'status' => 'disetujui',
            'tanggal_verifikasi' => $tanggal_verifikasi,
        ]);

        // Update status peminjaman
        $this->Peminjaman_models->updatePeminjamanStatus($verifikasi->id_peminjaman, 'dipinjam');

        // Kurangi stok alat
        $peminjaman = $this->Peminjaman_models->getPeminjamanById($verifikasi->id_peminjaman);
        $alat = $this->Alat_models->getAlatById($peminjaman->id_alat);
        $stok_baru = $alat->stok - $peminjaman->kuantitas;

        $this->Alat_models->updateAlatStock($alat->id_alat, $stok_baru);

        $this->session->set_flashdata('success', 'Peminjaman telah disetujui.');
        redirect('verifikasi');
    }

    public function decline($id_verifikasi){
        $verifikasi = $this->Verifikasi_models->getVerifikasiById($id_verifikasi);

        if (!$verifikasi) {
            show_404();
        }

        $tanggal_verifikasi = date('Y-m-d');

        $this->Verifikasi_models->updateVerifikasi($id_verifikasi, [
            'status' => 'ditolak',
            'tanggal_verifikasi' => $tanggal_verifikasi,
        ]);

        $this->Peminjaman_models->updatePeminjamanStatus($verifikasi->id_peminjaman, 'ditolak');

        redirect('verifikasi');
    }
}