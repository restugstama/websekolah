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

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Profile Siswa';

			$this->load->view('siswa/layout/header', $data);
			$this->load->view('siswa/layout/topbar', $data);
			$this->load->view('siswa/layout/sidebar', $data);
			$this->load->view('siswa/profile', $data);
			$this->load->view('siswa/layout/footer', $data);
		} else {
			$nisn 		   = $this->input->post('nisn');
			$nama 		   = $this->input->post('nama');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$agama 		   = $this->input->post('agama');
			$tempat_lahir  = $this->input->post('tempat_lahir');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$alamat 	   = $this->input->post('alamat');

			$this->db->set('nama', $nama);
			$this->db->set('jenis_kelamin', $jenis_kelamin);
			$this->db->set('agama', $agama);
			$this->db->set('tempat_lahir', $tempat_lahir);
			$this->db->set('tanggal_lahir', $tanggal_lahir);
			$this->db->set('alamat', $alamat);
			$this->db->where('nisn', $nisn);
			$this->db->update('tb_siswa');

			$this->session->set_flashdata('flash', 'di update!');
			redirect('siswa/profile');
		}
	}
}