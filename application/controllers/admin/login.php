<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function index()
	{
		if($this->session->userdata('username') == TRUE){
			redirect('admin/dashboard');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required'  => 'Username Harus Di Isi'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required'  => 'Password Harus Di Isi'
		]);

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login Admin';

			$this->load->view('admin/layout/header_login', $data);
			$this->load->view('admin/login', $data);
			$this->load->view('admin/layout/footer_login');
		} else {
			// Validasi sukse
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

		if($user)
		{
			if(password_verify($password, $user['password']))
			{
				$data = [
					'username' => $user['username'],
					'id_role'  => $user['id_role']
				];

				$this->session->set_userdata($data);
				redirect('admin/dashboard');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
					Password Salah</div>');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
				Username Tidak Ada</div>');
			redirect('admin');
		}

		
	}

	public function logout_admin()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
			Logout Berhasil</div>');
		redirect('admin');
	}
}