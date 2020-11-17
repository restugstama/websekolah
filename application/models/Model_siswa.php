<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('siswa');
	}

	public function savedata($data)
	{
		$this->db->insert('siswa', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('siswa');
	}
}