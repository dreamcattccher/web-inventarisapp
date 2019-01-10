<?php

class Daftarpengaduan_model extends CI_Model{

    public function ambilDaftarpengaduan(){
        $query = $this->db->get("tbldaftarpengaduan");
        return $query;
    }

    public function createDaftarpengaduan($data){
        $query = $this->db
                    ->insert("tbldaftarpengaduan",$data);

        return $this->db->affected_rows();            
    }

    public function updateDaftarpengaduan($idpengaduan,$data){
        $query = $this->db
                    ->where("idpengaduan",$idpengaduan)
                    ->update("tbldaftarpengaduan",$data);

        return $this->db->affected_rows();  
    }

    public function deleteDaftarpengaduan($idpengaduan){
        $query = $this->db
                    ->where("idpengaduan",$idpengaduan)
                    ->delete("tbldaftarpengaduan");
    
        return $query;
    }

    public function getDaftarpengaduan($idpengaduan){
        $query = $this->db
                    ->where("idpengaduan",$idpengaduan)
                    ->get("tbldaftarpengaduan");

        return $query->row();
    }
}