<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jadwal extends CI_Model
{
	public function getalldata()
	{
		return $this->db->get('tb_jadwal')->result_array();
	}

	public function getjadwalby_id($where)
	{
		$this->db->select('*')
				 ->from('tb_jadwal')
				 ->join('tb_hari', 'tb_hari.id_hari = tb_jadwal.id_hari')
				 ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_jadwal.id_matapelajaran')
				 ->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru')
				 ->where($where);
		return $this->db->get()->result_array();
	}

	public function getjadwalsiswaby_id($where_id)
	{
		$this->db->select('*')
				 ->from('tb_jadwal')
				 ->join('tb_hari', 'tb_hari.id_hari = tb_jadwal.id_hari')
				 ->join('tb_matapelajaran', 'tb_matapelajaran.id_matapelajaran = tb_jadwal.id_matapelajaran')
				 ->join('tb_guru', 'tb_guru.id_guru = tb_jadwal.id_guru')
				 ->where($where_id);
		return $this->db->get()->result_array();
	}

	public function getby_id($where)
	{
		return $this->db->get_where('tb_jadwal', $where)->result_array();
	}

	public function savedata($data)
	{
		$this->db->insert('tb_jadwal', $data);
	}

	public function deletedata($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_jadwal');
	}

	public function updatedata($where,$data)
	{
		$this->db->where($where);
		$this->db->update('tb_jadwal', $data);
	}
}