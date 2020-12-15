<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_siswa', ['nisn' => $this->session->userdata('nisn')])->row_array();
		$data['title'] = 'Profile Siswa';

		$this->load->view('siswa/layout/header', $data);
		$this->load->view('siswa/layout/topbar', $data);
		$this->load->view('siswa/layout/sidebar', $data);
		$this->load->view('siswa/profile', $data);
		$this->load->view('siswa/layout/footer', $data);
	}

}