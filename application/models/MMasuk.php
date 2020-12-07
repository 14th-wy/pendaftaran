<?php 
 
class MMasuk extends CI_Model{

	function save($table, $data){
		$this->db->insert($table,$data);
	}

	function replace($table, $data){
		$this->db->replace($table,$data);
	}

	public function isValid($username, $password){
		$this->db->select('*');
		$this->db->from('masuk');
		$this->db->where('KODE_USER', $username);
		$this->db->where('PASSWORD', $password);
		return $this->db->get()->result();
	}

}