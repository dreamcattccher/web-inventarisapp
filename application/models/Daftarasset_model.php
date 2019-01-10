<?php

class Daftarasset_model extends CI_Model{

    public function ambilDaftarasset(){
        $query = $this->db->get("tbldaftarasset");
        return $query;
    }

    public function createDaftarasset($data){
        $query = $this->db
                    ->insert("tbldaftarasset",$data);

        return $this->db->affected_rows();            
    }

    public function updateDaftarasset($idasset,$data){
        $query = $this->db
                    ->where("idasset",$idasset)
                    ->update("tbldaftarasset",$data);

        return $this->db->affected_rows();  
    }

    public function deleteDaftarasset($idasset){
        $query = $this->db
                    ->where("idasset",$idasset)
                    ->delete("tbldaftarasset");
    
        return $query;
    }

    public function getDaftarasset($idasset){
        $query = $this->db
                    ->where("idasset",$idasset)
                    ->get("tbldaftarasset");

        return $query->row();
    }
}