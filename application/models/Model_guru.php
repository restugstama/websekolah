<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_guru extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('tb_guru')->result_array();
	}

	public function getby_id($where)
	{
		return $this->db->get_where('tb_guru', $where)->result_array();
	}

	public function savedata($data)
	{
		$this->db->insert('tb_guru', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_guru');
	}
}