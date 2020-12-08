<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_guru');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['dataguru'] = $this->Model_guru->getalldata();
		$data['title'] = 'Data Guru';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/guru/guru', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahguru()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Data Guru';

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/guru/tambah_guru', $data);
			$this->load->view('admin/layout/footer', $data);
		} else {

			$nip 			= $this->input->post('nip');
			$nama 			= $this->input->post('nama');
			$no_telp 	    = $this->input->post('no_telp');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tanggal_lahir	= $this->input->post('tanggal_lahir');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$agama			= $this->input->post('agama');
			$alamat			= $this->input->post('alamat');

			$data = array(
				'nip' 		    => $nip,
				'nama' 		    => $nama,
				'no_telp' 		=> $no_telp,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' 		=> $agama,
				'tempat_lahir'  => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'alamat' 		=> $alamat,
				'status' 		=> 'Aktif',
				'password' 	    => password_hash($tanggal_lahir, PASSWORD_DEFAULT),
				'image' 		=> 'default.jpg',
				'id_role'		=> '2',
				'date_added'    => date('Y-m-d H:i:s')
			);

			$this->Model_guru->savedata($data, 'tb_guru');
			$this->session->set_flashdata('flash', 'di tambah!');
			redirect('admin/guru');
		}
	}

	public function hapusguru($id)
	{
		$where = array('id_guru' => $id);
		$this->Model_guru->deletedata($where, 'tb_guru');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect('admin/guru');
	}

	public function editguru($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Edit Guru';
			$where = array('id_guru' => $id);
			$data['dataguru'] = $this->Model_guru->getby_id($where, 'tb_guru');

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/guru/edit_guru', $data);
			$this->load->view('admin/layout/footer', $data);
		} else
		{
			$id 			= $this->input->post('id');
			$nip 			= $this->input->post('nip');
			$nama 			= $this->input->post('nama');
			$no_telp 	    = $this->input->post('no_telp');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tanggal_lahir	= $this->input->post('tanggal_lahir');
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$agama			= $this->input->post('agama');
			$alamat			= $this->input->post('alamat');

			$data = array(
				'nip' 		    => $nip,
				'nama' 		    => $nama,
				'no_telp' 		=> $no_telp,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' 		=> $agama,
				'tempat_lahir'  => $tempat_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'alamat' 		=> $alamat
			);

			$where = array (
				'id_guru' => $id
			);

			$this->Model_guru->updatedata($where, $data, 'tb_guru');
			$this->session->set_flashdata('flash', 'di update!');
			redirect('admin/guru');
		}
	}
}