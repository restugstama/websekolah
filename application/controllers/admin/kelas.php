<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_siswa');
		$this->load->model('Model_guru');
		$this->load->model('Model_kelas');
		$this->load->model('Model_detailkelas');

		if($this->session->userdata('username') != TRUE){
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><spanaria-hidden="true">&times;</span></button>
				Silahkan Login Terlebih Dahulu !</div>');
			redirect('admin');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['datakelas'] = $this->Model_kelas->getalldata();
		$data['title'] = 'Data Kelas';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/kelas/kelas', $data);
		$this->load->view('admin/layout/footer');
	}

	public function tambahkelas()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['dataguru'] = $this->Model_guru->getalldata();

		$this->form_validation->set_rules('nama', 'Nama Kelas', 'required|trim');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
		$this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required|trim');
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Tambah Data Kelas';

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/kelas/tambah_kelas', $data);
			$this->load->view('admin/layout/footer', $data);
		} else {
			$nama_kelas   = $this->input->post('nama');
			$jurusan 	  = $this->input->post('jurusan');
			$wali_kelas   = $this->input->post('wali_kelas');
			$tahun_ajaran = $this->input->post('tahun_ajaran');

			$data = array(
				'nama_kelas' 		   => $nama_kelas,
				'jurusan'	   => $jurusan,
				'id_guru' 	   => $wali_kelas,
				'tahun_ajaran' => $tahun_ajaran,
				'date_added'   => date('Y-m-d H:i:s')
			);

			$this->Model_kelas->savedata($data, 'tb_kelas');
			$this->session->set_flashdata	('flash', 'di tambah!');
			redirect('admin/kelas');
		}
	}

	public function hapuskelas($id)
	{
		$where = array('id_kelas' => $id);
		$this->Model_kelas->deletedata($where, 'tb_kelas');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect('admin/kelas');
	}

	public function detailkelas($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Kelas', 'required|trim');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
		$this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required|trim');
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim');

		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Detail Kelas';
			$where = array('tb_kelas.id_kelas' => $id);
			$data['datakelas'] = $this->Model_kelas->getby_id($where, 'tb_kelas');
			$data['datasiswa'] = $this->Model_siswa->getalldata();
			$data['dataguru']  = $this->Model_guru->getalldata();
			$data['datasiswaby_id']  = $this->Model_detailkelas->getby_id($where);

			$this->load->view('admin/layout/header', $data);
			$this->load->view('admin/layout/topbar', $data);
			$this->load->view('admin/layout/sidebar', $data);
			$this->load->view('admin/kelas/detail_kelas', $data);
			$this->load->view('admin/layout/footer', $data);
		} else {
			$id 		  = $this->input->post('id_kelas');
			$nama_kelas   = $this->input->post('nama');
			$jurusan      = $this->input->post('jurusan');
			$wali_kelas   = $this->input->post('wali_kelas');
			$tahun_ajaran = $this->input->post('tahun_ajaran');

			$data = array(
				'nama_kelas'   => $nama_kelas,
				'jurusan' 	   => $jurusan,
				'id_guru' 	   => $wali_kelas,
				'tahun_ajaran' => $tahun_ajaran
			);

			$where = array(
				'id_kelas' => $id
			);

			$this->Model_kelas->updatedata($where, $data, 'tb_kelas');
			$this->session->set_flashdata('flash', 'di update!');
			redirect('admin/kelas');
		}
	}

	public function tambahsiswa()
	{
		$siswa = $this->input->post('id_siswa');
		$kelas = $this->input->post('id_kelas');
		$date  = date('Y-m-d H:i:s');
		$url   = 'admin/kelas/detailkelas/' . $kelas;

		$this->db->set('id_siswa', $siswa);
		$this->db->set('id_kelas', $kelas);
		$this->db->set('date_added', $date);
		$this->db->insert('tb_detail_kelas');

		$this->session->set_flashdata('flash', 'di tambah!');
		redirect($url);
	}

	public function hapussiswa($id)
	{
		$where = array('id_detail_kelas' => $id);

		$this->Model_kelas->delete_siswa($where, 'tb_detail_kelas');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect($_SERVER['HTTP_REFERER']);
	}
}