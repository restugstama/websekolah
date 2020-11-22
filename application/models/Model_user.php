<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('tb_user')->result_array();
	}

	public function savedata($data)
	{
		$this->db->insert('tb_user', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_user');
	}

	public function getby_id($where)
	{
		return $this->db->get_where('tb_user', $where)->result_array();
	}

	public function updatedata($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_user', $data);
	}
}