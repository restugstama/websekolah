<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_guru', ['nip' => $this->session->userdata('nip')])->row_array();
		$data['title'] = 'Dashboard Guru';

		$this->load->view('guru/layout/header', $data);
		$this->load->view('guru/layout/topbar', $data);
		$this->load->view('guru/layout/sidebar', $data);
		$this->load->view('guru/dashboard', $data);
		$this->load->view('guru/layout/footer', $data);
	}
}