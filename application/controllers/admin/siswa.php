<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_siswa');
	}

	public function index()
	{
		$data['title'] 	   = 'Data Siswa';
		$data['datasiswa'] = $this->Model_siswa->getalldata();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/siswa/siswa', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahsiswa()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nisn', 'NISN', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Tambah Data Siswa';

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/siswa/tambahsiswa', $data);
			$this->load->view('admin/layout/footer', $data);
		} else {
			$nisn 			= $this->input->post('nisn');
			$nama 			= $this->input->post('nama');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tanggal_lahir	= $this->input->post('tanggal_lahir');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$agama			= $this->input->post('agama');
			$alamat			= $this->input->post('alamat');

			$data = array(
				'nisn' 		    => $nisn,
				'password' 	    => password_hash($tanggal_lahir, PASSWORD_DEFAULT),
				'nama' 		    => $nama,
				'tempat_lahir'  => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' 		=> $agama,
				'alamat' 		=> $alamat,
				'image' 		=> 'profile.jpg'
			);

			$this->Model_siswa->savedata($data, 'siswa');
			$this->session->set_flashdata('flash', 'di tambah!');
			redirect('admin/siswa');
		}
	}

	public function hapussiswa($kode)
	{
		$where = array('id_siswa' => $kode);
		$this->Model_siswa->deletedata($where, 'siswa');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect('admin/siswa');
	}

	public function editsiswa($kode)
	{
		$data['title'] = 'Edit Data Siswa';
		$where = array('id_siswa' => $kode);
		$data['datasiswa'] = $this->Model_siswa->getby_id($where, 'siswa');

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/siswa/editsiswa', $data);
		$this->load->view('admin/layout/footer', $data);
	}
}