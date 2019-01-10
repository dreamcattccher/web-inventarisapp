<?php

class Daftarperbaikan_model extends CI_Model{

    public function ambilDaftarperbaikan(){
        $query = $this->db->get("tbldaftarperbaikan");
        return $query;
    }

    public function createDaftarperbaikan($data){
        $query = $this->db
                    ->insert("tbldaftarperbaikan",$data);

        return $this->db->affected_rows();            
    }

    public function updateDaftarperbaikan($idperbaikan,$data){
        $query = $this->db
                    ->where("idperbaikan",$idperbaikan)
                    ->update("tbldaftarperbaikan",$data);

        return $this->db->affected_rows();  
    }

    public function deleteDaftarperbaikan($idperbaikan){
        $query = $this->db
                    ->where("idperbaikan",$idperbaikan)
                    ->delete("tbldaftarperbaikan");
    
        return $query;
    }

    public function getDaftarperbaikan($idperbaikan){
        $query = $this->db
                    ->where("idperbaikan",$idperbaikan)
                    ->get("tbldaftarperbaikan");

        return $query->row();
    }
}