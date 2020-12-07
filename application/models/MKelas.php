<?php 
 
class MKelas extends CI_Model{
	
	function getAll(){
		return $this->db->get('kelas');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('kelas');
		$this->db->where('KODE_KELAS', $key);
		return $this->db->get()->result();
	}

	function getMaxNo(){
		return $this->db->query("select max(KODE_KELAS) as no from kelas ");
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
		return $this->db->query("select * from jurusan where TANGGAL_PENDAFTARAN BETWEEN '".$start."' and '".$end."'");
	}

	function getDistinctKodeKelas(){
		return $this->db->query("select KODE_KELAS from kelas ");
	}

}