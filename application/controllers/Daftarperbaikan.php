<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarperbaikan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("daftarperbaikan_model");

        if(!$this->session->userdata("islogin")){
		redirect("login");
		}
	}
	
	public function index()
	{
		$this->load->view('daftarperbaikan_view');
	}

	public function data(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		echo json_encode($this->daftarperbaikan_model->ambilDaftarperbaikan()->result());
	}

	public function baca($id=null){
		echo json_encode($this->daftarperbaikan_model
				->getDaftarperbaikan($id));
	}

	public function hapus($id){
		echo json_encode(array("status" => $this->daftarperbaikan_model->deleteDaftarperbaikan($id)));
	}

	public function simpan($mode){
		//menjalankan apabila sudah tervalidasi
		if($this->_validate($mode)){
			$data = array(
				"idperbaikan" => $this->input->post("idperbaikan"),
				"namaasset" => $this->input->post("namaasset"),
				"tanggalperbaikan" => $this->input->post("tanggalperbaikan"),
				"status" => $this->input->post("status"),
				"noruang" => $this->input->post("noruang")		
			);
			if($mode=="add"){
				$status = $this->daftarperbaikan_model->createDaftarperbaikan($data);
			} elseif ($mode=="edit"){
				$status = $this->daftarperbaikan_model
				->updateDaftarperbaikan($this->input->post("idperbaikan"),$data);
			}
			echo json_encode(array("status" => $status > 0));
			}else{
				echo json_encode(array(
					"status"	=> FALSE,
					"message"	=> array(
						"idperbaikan"	=>form_error("idperbaikan"),
						"namaasset"	=>form_error("namaasset")
				)
			));
		}
	}
		

	private function _validate($mode){
			$rules	= array(
				array(
				"field"	=> "idperbaikan",
				"label"	=> "idperbaikan",
			//required=harus diisi, exact_length=harus pas 11, is_unique=nim tidak boleh sama dengan id yang sudah ada.
				"rules"	=> "required|exact_length[11]".($mode=="add"?"|is_unique[tbldaftarperbaikan.idperbaikan]":"")
			)
		);

		$this->form_validation->set_rules($rules);
		//untuk menyatakan eror/menempatkan error
		$this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

		//mengembalikan nilai validation apabila nilai sudah cocok
		return $this->form_validation->run();
	}
}