<?php

class Peminjaman_models extends CI_Model{
    public function __construct(){
        parent::__construct();
		$this->load->database();
    }

    public function getAllPeminjaman() {
        $this->db->select('peminjaman.*, alat.nama_alat');
        $this->db->from('peminjaman');
        $this->db->join('alat', 'peminjaman.id_alat = alat.id_alat');
        
        $query = $this->db->get();
        return $query->result();
    }


    public function getPeminjamanById($id){
        $query = $this->db->get_where('peminjaman', array('id_peminjaman' => $id));
		return $query->row();
    }

    public function insertPeminjaman($data){
        return $this->db->insert('peminjaman', $data);
    }

    public function updatePeminjaman($id, $data){
        $this->db->where('id_peminjaman', $id);
		return $this->db->update('peminjaman', $data);
    }

    public function updatePeminjamanStatus($id_peminjaman, $status)
    {
        $this->db->where('id_peminjaman', $id_peminjaman);
        return $this->db->update('peminjaman', ['status' => $status]); 
    }

    public function deletePeminjaman($id){
        return $this->db->delete('peminjaman', array('id_peminjaman' => $id));
    }

    
}