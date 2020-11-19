<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('siswa')->result_array();
	}

	public function getby_id($where)
	{
		return $this->db->get_where('siswa', $where)->result_array();
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

	public function updatedata($where,$data)
	{
		$this->db->where($where);
		$this->db->update('siswa', $data);
	}
}