<?php

class Verifikasi_models extends CI_Model{
    public function __construct(){
        parent::__construct();
		$this->load->database();
    }

    public function getAllVerifikasi(){
        $query = $this->db->get('verifikasi');
        return $query->result();
    }

    public function getVerifikasiById($id){
        $query = $this->db->get_where('verifikasi', array('id_verifikasi' => $id));
		return $query->row();
    }

    public function insertVerifikasi($data){
        return $this->db->insert('verifikasi', $data);
    }

    public function updateVerifikasi($id, $data){
        $this->db->where('id_verifikasi', $id);
		return $this->db->update('verifikasi', $data);
    }

    public function deleteVerifikasi($id){
        return $this->db->delete('verifikasi', array('id_verifikasi' => $id));
    }

    
}