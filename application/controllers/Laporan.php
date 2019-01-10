<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
    public function  __construct(){
        parent::__construct();
        $this->load->model("laporan_model");
    }
	public function index()
	{
		$this->load->view('welcome_message');
    }
    
    public function daftarasset(){
        $this->load->view("laporan/daftarasset_laporan",array(
            "daftarasset" => $this->laporan_model->getDaftarasset()->result(),
            "title" => "Laporan Daftar Asset"
        ));
    }

    public function jenisdaftarasset(){
        if($this->input->get()){
            $this->load->view("laporan/jenisdaftarasset_laporan",array(
                "jenisdaftarasset" => $this->laporan_model
                    ->getjenisdaftarasset($this->input->get("jenis"))
                    ->result(),
                "title" => "Laporan Jenis Daftar Asset"
            ));
        }else{
            $this->load->view("dialog/jenisdaftarasset_dialog",
                array(
                    "action" => "laporan/jenisdaftarasset",
                    "jenisdaftarasset" => $this->laporan_model->getjnisdaftarasset()->result()
                ));
        }
    }

    public function perbaikan(){
        $this->load->view("laporan/perbaikan_laporan",array(
            "perbaikan" => $this->laporan_model->getPerbaikan()->result(),
            "title" => "Laporan Perbaikan"
        ));
    }

    public function perawatan(){
        if($this->input->get()){
            $this->load->view("laporan/perawatan_laporan",array(
                "perawatan" => $this->laporan_model
                    ->getperawatan($this->input->get("noruang"))
                    ->result(),
                "title" => "Laporan Perawatan"
            ));
        }else{
            $this->load->view("dialog/perawatan_dialog",
                array(
                    "action" => "laporan/perawatan",
                    "perawatan" => $this->laporan_model->getprawatan()->result()
                ));
        }
    }
    
    public function pengaduan(){
        $this->load->view("laporan/pengaduan_laporan",array(
            "pengaduan" => $this->laporan_model->getPengaduan()->result(),
            "title" => "Laporan Pengaduan"
        ));
    }

    public function user(){
        $this->load->view("laporan/user_laporan",array(
            "user" => $this->laporan_model->getUser()->result(),
            "title" => "Laporan Daftar User"
        ));
    }
}