<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_detailkelas extends CI_Model
{
	public function getby_id($where)
	{
		$this->db->select('*')
				 ->from('tb_detail_kelas')
				 ->join('tb_kelas', 'tb_kelas.id_kelas = tb_detail_kelas.id_kelas')
				 ->join('tb_siswa', 'tb_siswa.id_siswa = tb_detail_kelas.id_siswa')
				 ->where($where);
		return $this->db->get()->result_array();
	}

	public function getkelasby_id($where)
	{
		return $this->db->get_where('tb_detail_kelas', $where)->result_array();
	}

	public function savedata()
	{
		$this->db->insert('tb_detail_kelas', $data);
	}
}