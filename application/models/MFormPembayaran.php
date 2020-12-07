<?php 
 
class MFormPembayaran extends CI_Model{
	
	function getAll(){
		return $this->db->get('pembayaran');
	}

	function getAllFaktur(){

		$this->db->select('*');
		$this->db->from('pembayaran');
		// $this->db->join('jurusan', 'jurusan.id = pembayaran.JURUSAN');
		return $this->db->get()->result();
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('NO_PEMBAYARAN', $key);
		return $this->db->get()->result();
	}

	public function getFindSiswa($key){
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('KODE_CALON_SISWA', $key);
		return $this->db->get()->result();
	}

	public function getFindNama($key){
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('NAMA_CALON_SISWA', $key);
		return $this->db->get()->result();
	}

	function save($table, $data){
		$this->db->insert($table,$data);
	}

	function replace($table, $data){
		$this->db->replace($table,$data);
	}

	function delete($table, $field, $id){
		$this->db->where($field, $id);
		$this->db->delete($table);
	}

	function getDistinctNoPembayaran(){
		return $this->db->query("select NO_PEMBAYARAN from pembayaran ");
	}

	function getMaxNo(){
		return $this->db->query("select max(NO_PEMBAYARAN) as no from pembayaran ");
	}

}