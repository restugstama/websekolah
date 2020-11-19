<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Management User';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/user/user', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahuser()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
	}
}