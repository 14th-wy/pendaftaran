<?php


class FormPembayaran extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		
		$this->load->library('pdftc');
		$this->load->library('session');
		$this->load->model('MFormPembayaran');	
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MKelas');
		$this->load->model('MSiswa');
		$this->load->helper('url');
	}

	function tes(){
		$this->load->view('test_tcpdf');
	}

	function getSearch(){
		echo json_encode($this->MFormPembayaran->getSearch( $this->input->get('noPembayaran') ));
	}

	function faktur(){

		$noPembayaran = $this->input->get('no');
		$data['data'] = $this->MFormPembayaran->getSearch($noPembayaran);
		$data['jurusan'] = $this->MJurusan->getSearch($data['data'][0]->JURUSAN);

		// echo json_encode($data); exit;

		$this->load->view('form_pembayaran_faktur', $data);

	}

	function fakturall(){

		$data['data'] = $this->MFormPembayaran->getAllFaktur();
		$this->load->view('form_pembayaran_faktur_all', $data);
	}
 
	function index(){

		$data['data'] = $this->MFormPembayaran->getAll()->result();
		$data['noPendaftaran'] = $this->MFormPendaftaran->getDistinctNoPendaftaran()->result();
		$data['jurusans'] = $this->MJurusan->getDistinct2()->result();
		
		// var_dump($data['choosejurusan']); exit;

		$this->load->view('header');
		$this->load->view('form_pembayaran_home', $data);
		$this->load->view('footer');
	}

	function save(){
		$data = array(
			'NO_PEMBAYARAN' => $this->input->post('NO_PEMBAYARAN'),
			'JURUSAN' => $this->input->post('JURUSAN'),
			'NO_PENDAFTARAN' => $this->input->post('NO_PENDAFTARAN'),
			'NAMA_CALON_SISWA' => $this->input->post('NAMA_CALON_SISWA'),
			'UNTUK_PEMBAYARAN' => $this->input->post('UNTUK_PEMBAYARAN'),
			'JUMLAH' => $this->input->post('JUMLAH'),
			'TANGGAL_PEMBAYARAN' => $this->input->post('TANGGAL_PEMBAYARAN'),
			'KETERANGAN' => $this->input->post('KETERANGAN'),
			'BENDAHARA' => $this->input->post('BENDAHARA')
		);

		if($this->input->post('modeEdit') != ""){
			// var_dump($data); exit;

			$data = array(
				"id" => $this->input->post('id'),
				'NO_PEMBAYARAN' => $this->input->post('NO_PEMBAYARAN'),
				'JURUSAN' => $this->input->post('JURUSAN'),
				'NO_PENDAFTARAN' => $this->input->post('NO_PENDAFTARAN'),
				'NAMA_CALON_SISWA' => $this->input->post('NAMA_CALON_SISWA'),
				'UNTUK_PEMBAYARAN' => $this->input->post('UNTUK_PEMBAYARAN'),
				'JUMLAH' => $this->input->post('JUMLAH'),
				'TANGGAL_PEMBAYARAN' => $this->input->post('TANGGAL_PEMBAYARAN'),
				'KETERANGAN' => $this->input->post('KETERANGAN'),
				'BENDAHARA' => $this->input->post('BENDAHARA')
			);

			$this->MFormPembayaran->replace("pembayaran", $data);
		}else{
			$this->MFormPembayaran->save("pembayaran", $data);
		}

		redirect('formpembayaran');
	}

	function delete(){
		// var_dump($this->input->get('noPembayaran')); exit;
		$this->MFormPembayaran->delete("pembayaran", "NO_PEMBAYARAN", $this->input->get('noPembayaran') );
		redirect('formpembayaran');
	}

	function getDistinctNoPendaftaran(){
		echo json_encode($this->MFormPembayaran->getDistinctNoPendaftaran()->result());
	}

	function getNamaByNo(){
		echo json_encode($this->MFormPendaftaran->getNamaByNo($this->input->get('noPendaftaran'))->result());
	}


}