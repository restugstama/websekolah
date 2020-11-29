<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function index()
{
	$this->form_validation->set_rules('nip','NIP','required|trim',
	['required' => 'Nip Tidak boleh kosong']);
	$this->form_validation->set_rules('password','Password', 'required|trim',
	['required' => 'Password tidak boleh kosong']);

	if($this->form_validation->run() == false)
	{
	$data['title'] = 'login Guru';
	$this->load->view('guru/login',$data);
	}else{
		$this->_login();
	}
}

private function _login()
{
	$username = $this->input->post('nip');
	$password = $this->input->post('password');

	$user = $this->db->get_where('tb_guru',['nip' => $username])->row_array();

	if($user)
	{
		if(password_verify($password, $user['password']))
		{
			$data = [
				'nip'		=> $user['nip'],
				'id_role'	=> $user['id_role']
			];

			$this->session->set_userdata($data);
			redirect('guru/dashboard');
		}else{
			$this->session->set_flashdata('login', 
				'<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span>
					</button>
					Password Salah</div>');
			redirect('guru');
		}
	}else{
		$this->session->set_flashdata('login', 
				'<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span>
					</button>
					NIP tidak ditemukan</div>');
		redirect('guru');
	}
}

public function logout()
{
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('id_role');

	$this->session->set_flashdata('login', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
			Logout Berhasil</div>');
	redirect('guru');
}


}  