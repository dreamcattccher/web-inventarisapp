<?php
class Laporan_model extends CI_Model{
    
    public function getDaftarasset(){
        $query = $this->db
                    ->get("tbldaftarasset");
        return $query;
    }

    public function getjnisdaftarasset(){
        $query = $this->db
                    ->get("tbldaftarasset");
        return $query;
    }
    public function getjenisdaftarasset($jenis){
        $query = $this->db
                    ->select("idasset,namaasset,satuan,jenis,kondisi,noruang")
                    ->from("tbldaftarasset")
                    ->where("jenis",$jenis)
                    ->get();
        return $query;
    }

    public function getPerbaikan(){
        $query = $this->db->get("tbldaftarperbaikan");    
        return $query;
    }

    public function getprawatan(){
        $query = $this->db
                    ->get("tbljadwalperawatan");
        return $query;
    }
    public function getperawatan($noruang){
        $query = $this->db
                    ->select("idasset,namaasset,tanggalperawatan,noruang")
                    ->from("tbljadwalperawatan")
                    ->where("noruang",$noruang)
                    ->get();
        return $query;
    }

    public function getPengaduan(){
        $query = $this->db->get("tbldaftarpengaduan");    
        return $query;
    }

    public function getUser(){
        $query = $this->db->get("tbluser");    
        return $query;
    }
    
}