<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kelas');
		$this->load->model('Model_detailkelas');
		$this->load->model('Model_jadwal');
		$this->load->model('Model_hari');
		$this->load->model('Model_matapelajaran');
		$this->load->model('Model_guru');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_siswa', ['nisn' => $this->session->userdata('nisn')])->row_array();
		$data['detailkelas'] = $this->db->get_where('tb_detail_kelas', ['id_siswa' => $data['user']['id_siswa']])->row_array();
		$id = $data['detailkelas']['id_kelas'];
		$where = array('tb_jadwal.id_kelas' => $id);
		$data['datajadwal']  = $this->Model_jadwal->getjadwalby_id($where);
		

		$data['title'] = 'Jadwal Siswa';

		$this->load->view('siswa/layout/header', $data);
		$this->load->view('siswa/layout/topbar', $data);
		$this->load->view('siswa/layout/sidebar', $data);
		$this->load->view('siswa/jadwal', $data);
		$this->load->view('siswa/layout/footer', $data);
	}
}