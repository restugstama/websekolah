<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('username') != TRUE){
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
				Silahkan Login Terlebih Dahulu !</div>');
			redirect('admin');
		}
		
		$this->load->model('Model_user');
	}

	public function index()
	{
		$data['title'] 	  = 'Management User';
		$data['datauser'] = $this->Model_user->getalldata();
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(); 

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/user/user', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahuser()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('passwordconf', 'Confirm Password', 'required|trim|matches[password]');

		if($this->form_validation->run() == false)
		{
			$data['title'] 	  = 'Tambah User Data';

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/user/adduser', $data);
			$this->load->view('admin/layout/footer');
		} else
		{
			$nama 	  = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array (
				'nama'       => $nama,
				'username'   => $username,
				'password'   => password_hash($password, PASSWORD_DEFAULT),
				'date_added' => date('Y-m-d')
			);

			$this->Model_user->savedata($data, 'tb_user');
			$this->session->set_flashdata('flash', 'di tambah!');
			redirect('admin/user');
		}
	}

	public function hapususer($id)
	{
		$where = array('id_user' => $id);
		$this->Model_user->deletedata($where, 'tb_user');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect('admin/user');
	}

	public function edituser($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Confirm Password', 'trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Edit Data User';
			$where = array('id_user' => $id);
			$data['datauser'] = $this->Model_user->getby_id($where, 'tb_user');

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/user/edituser', $data);
			$this->load->view('admin/layout/footer');
		} else
		{
			$nama 	  = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if(empty($password))
			{
				$data = array(
					'nama' => $nama,
					'username' => $username
				);

				$where = array(
					'id_user' => $id
				);
			} else {
				$data = array(
					'nama' => $nama,
					'username' => $username,
					'password' => password_hash($password, PASSWORD_DEFAULT)
				);

				$where = array(
					'id_user' => $id
				);

			}

			$this->Model_user->updatedata($where, $data, 'tb_user');
			$this->session->set_flashdata('flash', 'di update!');
			redirect('admin/user');
		}
	}
}