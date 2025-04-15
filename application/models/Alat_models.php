<?php

class Alat_models extends CI_Model{
    public function __construct(){
        parent::__construct();
		$this->load->database();
    }

    public function getAllAlat(){
        $query = $this->db->get('alat');
        return $query->result();
    }

    public function getAlatById($id){
        $query = $this->db->get_where('alat', array('id_alat' => $id));
		return $query->row();
    }

    public function insertAlat($data){
        return $this->db->insert('alat', $data);
    }

    public function updateAlat($id, $data){
        $this->db->where('id_alat', $id);
		return $this->db->update('alat', $data);
    }

    public function updateAlatStock($id, $data){
        $this->db->where('id_alat', $id);
		return $this->db->update('alat', ['stok' => $data]);
    }

    public function deleteAlat($id){
        return $this->db->delete('alat', array('id_alat' => $id));
    }

    public function getMahasiswaByUserId($id_user)
    {
        return $this->db->get_where('mahasiswa', ['id_user' => $id_user])->row();
    }    

    public function insert_peminjaman($data)
    {
        $this->db->trans_start();

        $peminjamanData = [
            'tanggal_peminjaman' => $data['tanggal_peminjaman'],
            'tanggal_pengembalian' => $data['tanggal_pengembalian'],
            'kuantitas' => $data['kuantitas'],
            'status' => $data['status'],
            'nim' => $data['nim'],
            'id_alat' => $data['id_alat']
        ];

        $this->db->insert('peminjaman', $peminjamanData);
        $id_peminjaman = $this->db->insert_id();
        
        $verifikasiData = [
            'status' => 'pending',
            'nim' => $data['nim'],
            'id_peminjaman' => $id_peminjaman
        ];
        
        $this->db->insert('verifikasi', $verifikasiData);
        
        $this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			return false;
		}
        
        return $id_peminjaman;
    }

    public function getTotalKuantitasTerpinjam($id_alat, $start_date, $end_date)
    {
        $this->db->select_sum('kuantitas');
        $this->db->from('peminjaman');
        $this->db->where('id_alat', $id_alat);
        $this->db->where('status !=', 'ditolak');

        // logika overlap yang benar
        $this->db->where('(
            tanggal_peminjaman <= "'.$end_date.'" AND
            tanggal_pengembalian >= "'.$start_date.'"
        )', null, false);

        $result = $this->db->get()->row();
        return $result ? (int) $result->kuantitas : 0;
    }
}