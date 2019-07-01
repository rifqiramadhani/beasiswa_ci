<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Day_off extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->loginstatus->check_login();
		$this->load->library('template');
		$this->load->model('day_off_model');
	}

	public function index(){
		redirect('day_off/listdata');
	}

	public function listdata($start=0,$perpage=10){
		$data = array();

		$count = $this->day_off_model->get_all(false)->num_rows();
		$data['hari_libur'] = $this->day_off_model->get_all(true,$start,$perpage)->result_array();

		$this->load->library('pagination');
		$config['base_url'] = base_url().'day_off/listdata/';
		$config['total_rows'] = $count;
		$config['per_page'] = $perpage;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);

		$data['paging'] = $this->pagination->create_links();
		$data['number'] = $start + 1;

		$this->template->display('day_off/listdata_view',$data);
	}

	public function add(){
		$this->form_validation->set_rules('hari_libur','Hari Libur');
		// // $today = date('Y-m-d');
		// print_r($today);
		// die();
		if($this->form_validation->run()==FALSE){
			$this->template->display('day_off/add_view');
		}else{
			$data_hari_libur = array(	'tanggal' => date_format(date_create_from_format('m/d/Y',$this->input->post('tanggal_libur')), 'Y-m-d'),
										//'tanggal' => $this->input->post('tanggal_libur'),
										'keterangan' => $this->input->post('keterangan'),
										'created_date' => date('Y-m-d'),
										'created_user' => $this->session->userdata('user_id'),
										'active' => '1'
				);
			// print_r($data_hari_libur);
			// die();
			$this->day_off_model->save($data_hari_libur);

			$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data telah tersimpan.</div>');

			redirect('day_off/listdata');
		}
	}

	public function edit($id){
		if($id){
			$this->form_validation->set_rules('hari_libur','Hari Libur');

			if($this->form_validation->run()==FALSE){
				$data = array();

				$count = $this->day_off_model->get_by_id($id)->num_rows();
				if($count > 0){
					$data['hari_libur'] = $this->day_off_model->get_by_id($id)->row_array();
					// print_r($data['hari_libur']);
					// die();
					// $data['tanggal'] = $this->day_off_model->get_by_id($id)->row_array();
					// $data['keterangan'] = $this->day_off_model->get_by_id($id)->row_array();

					$this->template->display('day_off/edit_view',$data);
				}else{
					redirect('day_off/listdata');
				}
			}else{
				$data_hari_libur = array(//'tanggal' => $this->input->post('tanggal_libur'),
										'keterangan' => $this->input->post('keterangan'),
										'updated_date' => date('Y-m-d'),
										'updated_user' => $this->session->userdata('user_id')
					);
				$this->day_off_model->update($id,$data_hari_libur);

				$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data telah diubah.</div>');

				redirect('day_off/listdata');
			}
		}else{
			redirect('day_off/listdata');
		}
	}

	public function delete($id){
		if($id){
			$count = $this->day_off_model->get_by_id($id)->num_rows();
			if($count > 0){
				$data_hari_libur = array(
									'updated_date' => date('Y-m-d'),
									'updated_user' => $this->session->userdata('user_id'),
									'active' => '0'
				);
				$this->day_off_model->update($id,$data_hari_libur);
				$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data telah dihapus.</div>');

				redirect('day_off/listdata');
			}else{
				$this->session->set_flashdata('message_alert','<div class="alert alert-danger">ID yang Anda gunakan tidak terdaftar.</div>');
				redirect('day_off/listdata');
			}
		}else{
			redirect('day_off/listdata');
		}
	}
}