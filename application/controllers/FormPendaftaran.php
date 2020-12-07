<?php


class FormPendaftaran extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('MFormPendaftaran');
		$this->load->helper('url');
	}

 
	function index(){

		$data['data'] = $this->MFormPendaftaran->getAll()->result();

		$this->load->view('header');
		$this->load->view('matpel_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'kode_matpel' => $this->input->post('kode_matpel'),
			'nama_matpel' => $this->input->post('nama_matpel'),
			'kb' => $this->input->post('kb'),
		);

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
			$this->MFormPendaftaran->replace("mata_pelajaran", $data);
		}else{
			$this->MFormPendaftaran->save("mata_pelajaran", $data);
		}

		redirect('formpendaftaran');
	}

	function delete(){
		$this->MFormPendaftaran->delete("mata_pelajaran", "kode_matpel", $this->input->get('kode_matpel') );
		redirect('formpendaftaran');
	}

	function getDistinctNoPendaftaran(){
		echo json_encode($this->MFormPendaftaran->getDistinctNoPendaftaran()->result());
	}

	function getNamaByNo(){
		echo json_encode($this->MFormPendaftaran->getNamaByNo($this->input->get('kode_matpel'))->result());
	}

}