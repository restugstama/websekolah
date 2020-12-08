<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kelas extends CI_Model
{
	public function getalldata()
	{
		$this->db->select('*')
				 ->from('tb_kelas')
				 ->join('tb_guru', 'tb_guru.id_guru = tb_kelas.id_guru');
		return $this->db->get()->result_array();

	}

	public function getby_id($where)
	{
		return $this->db->get_where('tb_kelas', $where)->result_array();
	}

	public function savedata($data)
	{
		$this->db->insert('tb_kelas', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_kelas');
	}

	public function updatedata($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_kelas', $data);
	}

	public function delete_siswa($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_detail_kelas');
	}
}