<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalperawatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("jadwalperawatan_model");

		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
	}
	
public function index()
	{
		// $data["idasset"] = $this->jadwalperawatan_model
		// 		->ambiljadwalperawatan()->result();
		// $data["noruang"] = $this->jadwalperawatan_model
		// 		->ambiljadwalperawatan()->result();
		$this->load->view('jadwalperawatan_view');
	}
	public function ambiljadwalperawatan($noruang){
		echo json_encode(
				$this->jadwalperawatan_model
					->ambilJadwalperawatan($noruang)->result());
	}

	public function data(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		echo json_encode($this->jadwalperawatan_model->ambilJadwalperawatan()->result());
	}

	public function baca($id=null){
		echo json_encode($this->jadwalperawatan_model
				->getJadwalperawatan($id));
	}

	public function hapus($id){
		echo json_encode(array("status" => $this->jadwalperawatan_model->deleteJadwalperawatan($id)));
	}

	public function simpan($mode){
		//menjalankan apabila sudah tervalidasi
		if($this->_validate($mode)){
			$data = array(
				"idasset" => $this->input->post("idasset"),
				"namaasset" => $this->input->post("namaasset"),
				"tanggalperawatan" => $this->input->post("tanggalperawatan"),
				"noruang" => $this->input->post("noruang")
			);
			if($mode=="add"){
				$status = $this->jadwalperawatan_model->createJadwalperawatan($data);
			} elseif ($mode=="edit"){
				$status = $this->jadwalperawatan_model
				->updateJadwalperawatan($this->input->post("idasset"),$data);
			}
			echo json_encode(array("status" => $status > 0));
			}else{
				echo json_encode(array(
					"status"	=> FALSE,
					"message"	=> array(
						"idasset"	=>form_error("idasset"),
						"namaasset"	=>form_error("namaasset")
				)
			));
		}
	}
		

	private function _validate($mode){
			$rules	= array(
				array(
				"field"	=> "idasset",
				"label"	=> "idasset",
			//required=harus diisi, exact_length=harus pas 11, is_unique=nim tidak boleh sama dengan id yang sudah ada.
				"rules"	=> "required|exact_length[11]".($mode=="add"?"|is_unique[tbljadwalperawatan.idasset]":"")
			),
			array(
				"field"	=> "namaasset",
				"label"	=> "namaasset",
				"rules"	=> "required|max_length[25]"
			)
		);

		$this->form_validation->set_rules($rules);
		//untuk menyatakan eror/menempatkan error
		$this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

		//mengembalikan nilai validation apabila nilai sudah cocok
		return $this->form_validation->run();
	}
}