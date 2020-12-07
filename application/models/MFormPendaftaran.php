<?php 
 
class MFormPendaftaran extends CI_Model{
	
	function getAll(){
		return $this->db->get('pendaftaran');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('NO_PENDAFTARAN', $key);
		return $this->db->get()->result();
	}

	public function getFindSiswa($key){
		$this->db->select('*');
		$this->db->from('pendaftaran');
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

	function getBetween($start, $end){
		return $this->db->query("select * from pendaftaran where TANGGAL_PENDAFTARAN BETWEEN '".$start."' and '".$end."'");
	}

	function getDistinctNoPendaftaran(){
		return $this->db->query("select NO_PENDAFTARAN from pendaftaran ");
	}

	function getDistinctNoPendaftaranBySiswa($siswa){
		return $this->db->query("select NO_PENDAFTARAN from pendaftaran where NAMA_CALON_SISWA = '".$siswa."' ");
	}

	function getMaxNo(){
		return $this->db->query("select max(NO_PENDAFTARAN) as no from pendaftaran ");
	}

	function getNamaByNo($no){
		return $this->db->query("select * from pendaftaran where NO_PENDAFTARAN = '".$no."' ");
	}

}