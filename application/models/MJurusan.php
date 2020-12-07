<?php 
 
class MJurusan extends CI_Model{
	
	function getAll(){
		return $this->db->get('jurusan');
	}

	public function getSearch($key){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->where('KODE_PROGRAM_KEAHLIAN', $key);
		return $this->db->get()->result();
	}

	public function getFindSiswa($key){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->where('KODE_PROGRAM_KEAHLIAN', $key);
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

	function getDistinct(){
		return $this->db->query("select KODE_PROGRAM_KEAHLIAN from jurusan ");
	}

	function getDistinct2(){
		return $this->db->query("select KODE_PROGRAM_KEAHLIAN, PROGRAM_KEAHLIAN from jurusan ");
	}

	function getNamaByNo($no){
		return $this->db->query("select PROGRAM_KEAHLIAN from jurusan where KODE_PROGRAM_KEAHLIAN = '".$no."' ");
	}

}