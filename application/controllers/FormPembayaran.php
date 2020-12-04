<?php


class FormPembayaran extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('MFormPembayaran');	
		$this->load->model('MJurusan');
		$this->load->model('MFormPendaftaran');
		$this->load->model('MKelas');
		$this->load->model('MSiswa');
		$this->load->helper('url');
	}

	function faktur(){

		ob_start();

		$noPembayaran = $this->input->get('no');

		$this->load->library('pdf');

		// $pdf = new Pdftc('P', 'mm', 'A4', true, 'UTF-8', false);
		// $pdf->SetCreator("admin");
		// $pdf->SetAuthor('admin');
		// $pdf->SetTitle('Invoice');
		// $pdf->SetSubject('Invoice');
		// $pdf->setPrintHeader(false);
		// $pdf->setPrintFooter(false);
		// $pdf->addPage();
		// $html = $this->load->view('form_pembayaran_faktur');
		// $pdf->writeHTML($html, true, false, true, false, '');
		// ob_end_clean();
		// $pdf->Output('invoice.pdf', 'I');


		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "faktur-".$noPembayaran.".pdf";
		$this->pdf->load_view('form_pembayaran_faktur');
		// $this->load->view('form_pembayaran_faktur');
		
		// $this->pdf->load_html_file($this->load->view('form_pembayaran_faktur'));

	}
 
	function index(){

		$data['data'] = $this->MFormPembayaran->getAll()->result();
		$data['noPendaftaran'] = $this->MFormPendaftaran->getDistinctNoPendaftaran()->result();
		$data['jurusans'] = $this->MJurusan->getDistinct2()->result();

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

		// var_dump($data); exit;

		if($this->input->post('modeEdit') != ""){
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