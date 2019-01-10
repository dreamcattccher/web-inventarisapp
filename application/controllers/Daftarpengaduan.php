<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarpengaduan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("daftarpengaduan_model");

		if(!$this->session->userdata("islogin")){
			redirect("login");
		}
	}
	
	public function index()
	{
		$this->load->view('daftarpengaduan_view');
	}

	public function data(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		echo json_encode($this->daftarpengaduan_model->ambilDaftarpengaduan()->result());
	}

	public function baca($id=null){
		echo json_encode($this->daftarpengaduan_model
				->getDaftarpengaduan($id));
	}

	public function hapus($id){
		echo json_encode(array("status" => $this->daftarpengaduan_model->deleteDaftarpengaduan($id)));
	}

	public function simpan($mode){
		//menjalankan apabila sudah tervalidasi
		if($this->_validate($mode)){
			$data = array(
				"idpengaduan" => $this->input->post("idpengaduan"),
				"idperbaikan" => $this->input->post("idperbaikan"),
				"namaasset" => $this->input->post("namaasset"),
				"tanggalpengaduan" => $this->input->post("tanggalpengaduan"),
				"keterangan" => $this->input->post("keterangan"),
				"status" => $this->input->post("status"),
				"noruang" => $this->input->post("noruang")
			);
			if($mode=="add"){
				$status = $this->daftarpengaduan_model->createDaftarpengaduan($data);
			} elseif ($mode=="edit"){
				$status = $this->daftarpengaduan_model
				->updateDaftarpengaduan($this->input->post("idpengaduan"),$data);
			}
			echo json_encode(array("status" => $status > 0));
			}else{
				echo json_encode(array(
					"status"	=> FALSE,
					"message"	=> array(
						"idpengaduan"	=>form_error("idpengaduan"),
						"idperbaikan"	=>form_error("idperbaikan"),
						"namaasset"	=>form_error("namaasset")
				)
			));
		}
	}
		

	private function _validate($mode){
			$rules	= array(
				array(
				"field"	=> "idpengaduan",
				"label"	=> "idpengaduan",
			//required=harus diisi, exact_length=harus pas 11, is_unique=nim tidak boleh sama dengan id yang sudah ada.
				"rules"	=> "required|exact_length[11]".($mode=="add"?"|is_unique[tbldaftarpengaduan.idpengaduan]":"")
				),
				
				array(
				"field"	=> "idperbaikan",
				"label"	=> "idperbaikan",
			//required=harus diisi, exact_length=harus pas 11, is_unique=nim tidak boleh sama dengan id yang sudah ada.
				"rules"	=> "required|exact_length[11]".($mode=="add"?"|is_unique[tbldaftarpengaduan.idperbaikan]":"")
			)
			);

		$this->form_validation->set_rules($rules);
		//untuk menyatakan eror/menempatkan error
		$this->form_validation->set_error_delimiters("<span class='help-block'>","</span>");

		//mengembalikan nilai validation apabila nilai sudah cocok
		return $this->form_validation->run();
	}
}