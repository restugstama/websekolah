<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jumlah extends CI_Model
{ 
	public function jumlah_siswa()
	{
		$query = $this->db->get('tb_siswa');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
	public function jumlah_guru()
	{
		$query = $this->db->get('tb_guru');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
	public function jumlah_user()
	{
		$query = $this->db->get('tb_user');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
}