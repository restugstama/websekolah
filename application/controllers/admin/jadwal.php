<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_kelas');
		$this->load->model('Model_hari');
		$this->load->model('Model_matapelajaran');
		$this->load->model('Model_guru');
		$this->load->model('Model_jadwal');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['datakelas'] = $this->Model_kelas->getalldata();

		$data['title'] = 'Jadwal';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/jadwal/jadwal', $data);
		$this->load->view('admin/layout/footer');
	}

	public function kelas($id)
	{
		$data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
		$where = array('tb_jadwal.id_kelas' => $id);
		$id_kelas = array('tb_kelas.id_kelas' => $id);
		$data['datakelas'] = $this->Model_kelas->getby_id($id_kelas, 'tb_kelas');
		$data['dataguru'] = $this->Model_guru->getalldata();
		$data['datahari'] = $this->Model_hari->getalldata();
		$data['datamatapelajaran'] = $this->Model_matapelajaran->getalldata();
		$data['datajadwal']  = $this->Model_jadwal->getjadwalby_id($where);
		$data['id_kelas']    = $this->uri->segment('4');

		$data['title'] = 'Jadwal Mata Pelajaran';

		$this->load->view('admin/layout/header', $data);
		$this->load->view('admin/layout/topbar', $data);
		$this->load->view('admin/layout/sidebar', $data);
		$this->load->view('admin/jadwal/mata_pelajaran', $data);
		$this->load->view('admin/layout/footer', $data);
	}

	public function tambahjadwal()
	{
		$hari 		    = $this->input->post('hari');
		$mata_pelajaran = $this->input->post('mata_pelajaran');
		$jam_mulai 	    = $this->input->post('jam_mulai');
		$jam_berakhir   = $this->input->post('jam_berakhir');
		$guru 		    = $this->input->post('guru');
		$kelas          = $this->input->post('kelas');

		$data = array(
			'id_hari' 		   => $hari,
			'id_matapelajaran' => $mata_pelajaran,
			'jam_mulai' 	   => $jam_mulai,
			'jam_berakhir' 	   => $jam_berakhir,
			'id_guru' 		   => $guru,
			'id_kelas' 		   => $kelas
		);

		$this->Model_jadwal->savedata($data, 'tb_jadwal');
		$this->session->set_flashdata('flash', 'di tambah!');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hapusjadwal($id)
	{
		$where = array('id_jadwal' => $id);
		$this->Model_jadwal->deletedata($where, 'tb_jadal');
		$this->session->set_flashdata('flash', 'di hapus!');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}