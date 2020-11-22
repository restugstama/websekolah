<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('tb_siswa')->result_array();
	}

	public function getby_id($where)
	{
		return $this->db->get_where('tb_siswa', $where)->result_array();
	}

	public function savedata($data)
	{
		$this->db->insert('tb_siswa', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_siswa');
	}

	public function updatedata($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_siswa', $data);
	}
}