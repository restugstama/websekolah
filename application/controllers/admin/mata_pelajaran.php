<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_matapelajaran');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		$data['title'] 	   = 'Data Mata Pelajaran';
		$data['datapelajaran'] = $this->Model_matapelajaran->getalldata();

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/mata_pelajaran/mata_pelajaran', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahmatapelajaran()
	{
		$matapelajaran = $this->input->post('mata_pelajaran');

		$data = array(
			'mata_pelajaran' => $matapelajaran
		);

		$this->Model_matapelajaran->savedata($data, 'tb_matapelajaran');
		$this->session->set_flashdata('flash', 'di tambah!');
		redirect('admin/mata_pelajaran');
	}

	public function hapusmatapelajaran($id)
	{
		$where = array('id_matapelajaran' => $id);
		$this->Model_matapelajaran->deletedata($where, 'siswa');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect('admin/mata_pelajaran');
	}

	public function editmatapelajaran($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Edit Data Mata Pelajaran';
			$where = array('id_matapelajaran' => $id);
			$data['datapelajaran'] = $this->Model_matapelajaran->getby_id($where, 'tb_matapelajaran');

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/mata_pelajaran/edit_matapelajaran', $data);
			$this->load->view('admin/layout/footer', $data);
		} else {
			$id 			= $this->input->post('id_matapelajaran');
			$matapelajaran	= $this->input->post('mata_pelajaran');

			$data = array(
				'mata_pelajaran' 	    => $matapelajaran
			);

			$where = array (
				'id_matapelajaran' 		=> $id,
			);

			$this->Model_matapelajaran->updatedata($where, $data, 'tb_matapelajaran');
			$this->session->set_flashdata('flash', 'di update!');
			redirect('admin/mata_pelajaran');
		}
	}
}