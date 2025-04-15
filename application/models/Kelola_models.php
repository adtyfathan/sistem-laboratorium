<?php

class Kelola_models extends CI_Model{
    public function __construct(){
        parent::__construct();
		$this->load->database();
    }

    public function insertAlat($data) {
        return $this->db->insert('alat', $data);
    }

    public function updateAlat($id, $data){
        $this->db->where('id_alat', $id);
		return $this->db->update('alat', $data);
    }

    public function deleteAlat($id){
        return $this->db->delete('alat', array('id_alat' => $id));
    }
}