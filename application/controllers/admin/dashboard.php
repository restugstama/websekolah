<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_jumlah');

		if($this->session->userdata('username') != TRUE){
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
				Silahkan Login Terlebih Dahulu !</div>');
			redirect('admin');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['title'] = 'Dashboard Admin';

		// Sauce data base kotak jumlah
		$data['jumlah_siswa'] = $this->m_jumlah->jumlah_siswa();
		$data['jumlah_guru'] = $this->m_jumlah->jumlah_guru();
		$data['jumlah_user'] = $this->m_jumlah->jumlah_user();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer', $data);
	}
}
