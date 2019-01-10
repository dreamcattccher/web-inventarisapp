<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarasset extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("daftarasset_model");

		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
	}
	
	public function index()
	{
		$this->load->view('daftarasset_view');
	}

	public function data(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		echo json_encode($this->daftarasset_model->ambilDaftarasset()->result());
	}

	public function baca($id=null){
		echo json_encode($this->daftarasset_model
				->getDaftarasset($id));
	}

	public function hapus($id){
		echo json_encode(array("status" => $this->daftarasset_model->deleteDaftarasset($id)));
	}

	public function simpan($mode){
		//menjalankan apabila sudah tervalidasi
		if($this->_validate($mode)){
			$data = array(
				"idasset" => $this->input->post("idasset"),
				"namaasset" => $this->input->post("namaasset"),
				"satuan" => $this->input->post("satuan"),
				"jenis" => $this->input->post("jenis"),
				"kondisi" => $this->input->post("kondisi"),
				"noruang" => $this->input->post("noruang")
			);
			if($mode=="add"){
				$status = $this->daftarasset_model->createDaftarasset($data);
			} elseif ($mode=="edit"){
				$status = $this->daftarasset_model
				->updateDaftarasset($this->input->post("idasset"),$data);
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
				"rules"	=> "required|exact_length[11]".($mode=="add"?"|is_unique[tbldaftarasset.idasset]":"")
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