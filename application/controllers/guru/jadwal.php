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
		$data['user'] = $this->db->get_where('tb_guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$id = $data['user']['id_guru'];
		$where = array('tb_jadwal.id_guru' => $id);
		$data['datajadwal']  = $this->Model_jadwal->getjadwalby_id($where);
		

		$data['title'] = 'Jadwal Siswa';

		$this->load->view('guru/layout/header', $data);
		$this->load->view('guru/layout/topbar', $data);
		$this->load->view('guru/layout/sidebar', $data);
		$this->load->view('guru/jadwal', $data);
		$this->load->view('guru/layout/footer', $data);
	}
}