<?php
class Jadwalperawatan_model extends CI_Model{
    
    // public function ambilJadwalperawatan($idasset,$noruang){
    //     $query = $this->db
    //             ->select("a.idasset,a.namaasset,a.satuan,a.jenis,a.kondisi,a.noruang")
    //             ->from("tbldaftarasset a")
    //             ->join("tbljadwalperawatan b","a.idasset=b.idasset")
    //             ->where("a.idasset",$idasset)
    //             ->where("a.noruang",$noruang)
    //             ->group_by("a.idasset,a.noruang")
    //             ->get();
    //     return $query;
    // }

    public function ambilJadwalperawatan($noruang){
      
        $query = $this->db->where("noruang",$noruang)->get("tbljadwalperawatan");    
        return $query;
    }

    

    public function createJadwalperawatan($data){
        $query = $this->db
                    ->insert("tbljadwalperawatan",$data);

        return $this->db->affected_rows();            
    }

    public function updateJadwalperawatan($idasset,$data){
        $query = $this->db
                    ->where("idasset",$idasset)
                    ->update("tbljadwalperawatan",$data);

        return $this->db->affected_rows();  
    }

    public function deleteJadwalperawatan($idasset){
        $query = $this->db
                    ->where("idasset",$idasset)
                    ->delete("tbljadwalperawatan");
    
        return $query;
    }

    public function getJadwalperawatan($idasset){
        $query = $this->db
                    ->where("idasset",$idasset)
                    ->get("tbljadwalperawatan");

        return $query->row();
    }
}