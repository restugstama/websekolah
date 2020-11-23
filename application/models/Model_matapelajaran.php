<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_matapelajaran extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('tb_matapelajaran')->result_array();
	}

	public function getby_id($where)
	{
		return $this->db->get_where('tb_matapelajaran', $where)->result_array();
	}

	public function savedata($data)
	{
		$this->db->insert('tb_matapelajaran', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_matapelajaran');
	}

	public function updatedata($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_matapelajaran', $data);
	}
}