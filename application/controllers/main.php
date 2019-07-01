<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//$this->loginstatus->check_login();
		$this->load->library('template');
		$this->load->model('user_model');
		$this->load->model('participant_model');
	}

	public function index(){
		redirect('main/menu');
	}

	public function menu(){
		$data = array();
		// $keyword = $this->input->post('');
		$data['count'] = $this->participant_model->get_counts(false)->num_rows();
		$data['diterima'] = $this->participant_model->get_diterima(false)->num_rows();
		$data['ditolak'] = $this->participant_model->get_ditolak(false)->num_rows();
		$data['uncheck'] = $this->participant_model->get_uncheck(false)->num_rows();
        // $this->template->display('main/menu', $data);

        $this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('no_ijazah','Nomor Ijazah Universitas','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()==FALSE){
			$this->template->display('main/menu',$data);
		}
		else{
			// if ($this->session->userdata('logged_in')==true) {
				$data_pengguna = array(
										'nama' => $this->input->post('nama_lengkap'),
										'email' => $this->input->post('email'),
										'username' => $this->input->post('username'),
										'password' => sha1($this->input->post('password')),
										'created_date' => date('Y-m-d'),
										'created_user' => $this->session->userdata('user_id'),
										'active' => '1'
				);
				$data_peserta = array(
										'username' => $this->input->post('username'),
										'nama_lengkap' => $this->input->post('nama_lengkap'),
										'jenis_kelamin' => $this->input->post('jenis_kelamin'),
										'no_ijazah_universitas_s1' => $this->input->post('no_ijazah'),
										'email' => $this->input->post('email'),
										'created_date' => date('Y-m-d'),
										'created_user' => $this->session->userdata('user_id'),
										'active' => '1'
				);
			// }
			// else{
			// 	$data_pengguna = array(
			// 							// 'nama_alasan' => $this->input->post('no_ijazah'),
			// 							'nama' => $this->input->post('nama_lengkap'),
			// 							'email' => $this->input->post('email'),
			// 							'username' => $this->input->post('username'),
			// 							'password' => $this->input->post('password'),
			// 							'created_date' => date('Y-m-d'),
			// 							'created_user' => $this->input->post('username'),
			// 							'active' => '1'
			// 	);

			// 	$data_peserta = array(
			// 							'username' => $this->input->post('username'),
			// 							'nama' => $this->input->post('nama_lengkap'),
			// 							'email' => $this->input->post('email'),
			// 							'password' => $this->input->post('password')
			// 	);
			// }
			// echo "<pre>";
			// print_r($data_pengguna);
			// die();

			$this->user_model->save_pengguna($data_pengguna); //ke akun t_pengguna
			$this->participant_model->save_peserta($data_peserta); //menjadi data peserta

			$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data telah tersimpan.</div>');

			// $this->template->display('main/menu',$data);
			redirect('main/menu');
		}
	}
}