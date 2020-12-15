<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_hari');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['datahari'] = $this->Model_hari->getalldata();

		$data['title'] 	   = 'Hari';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/hari/hari', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahhari()
	{
		$hari = $this->input->post('hari');

		$data = array(
			'hari' => $hari
		);

		$this->Model_hari->savedata($data, 'tb_hari');
		$this->session->set_flashdata('flash', 'di tambah!');
		redirect('admin/hari');
	}

	public function hapushari($id)
	{
		$where = array('id_hari' => $id);
		$this->Model_hari->deletedata($where, 'tb_hari');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect('admin/hari');
	}

	public function edithari($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('hari', 'Hari', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Edit Hari';
			$where = array('id_hari' => $id);
			$data['datahari'] = $this->Model_hari->getby_id($where, 'tb_hari');

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/hari/edit_hari', $data);
			$this->load->view('admin/layout/footer', $data);
		} else
		{
			$id 	= $this->input->post('id_hari');
			$hari	= $this->input->post('hari');

			$data = array(
				'hari' 	    => $hari
			);

			$where = array (
				'id_hari' 	=> $id
			);

			$this->Model_hari->updatedata($where, $data, 'tb_hari');
			$this->session->set_flashdata('flash', 'di update!');
			redirect('admin/hari');
		}
	}
}