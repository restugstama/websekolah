<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function index()
{
	$this->form_validation->set_rules('nisn','NISN','required|trim',
	['required' => 'NISN tidak boleh kosong']);

	$this->form_validation->set_rules('password','Password','required|trim',
	['required' => 'Password tidak boleh kosong']);

	if($this->form_validation->run() == false)
	{
		$data['title'] = 'Login Siswa';
		
		$this->load->view('siswa/login',$data);
	}else{
		$this->_login();
	}
}

private function _login() 
{
	$username = $this->input->post('nisn');
	$password = $this->input->post('password');

	$user = $this->db->get_where('tb_siswa',['nisn' => $username])->row_array();

	if($user)
	{
		if(password_verify($password, $user['password']))
		{
			$data = [
				'nisn' => $user['nisn'],
				'id_role' => $user['id_role']
			];
			$this->session->set_userdata($data);
			redirect('siswa/dashboard');
		}else{
			$this->session->set_flashdata('login', 
				'<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<spanaria-hidden="true">&times;</span>
					</button>
					Password Salah</div>');
			redirect('login');
		}
	}else{
		$this->session->set_flashdata('login', 
			'<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span>
				</button>
				Username Tidak Ada</div>');
		redirect('login');
	}
}

public function logout()
{
	$this->session->unset_userdata('nisn');
	$this->session->unset_userdata('id_role');

	$this->session->set_flashdata('login', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
			Logout Berhasil</div>');
	redirect('');
}
} 