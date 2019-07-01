<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_diri extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->loginstatus->check_login();
		$this->load->library('template');
		$this->load->model('user_model'); /*array*/
		$this->load->model('participant_model');
	}

	public function index(){
		$this->loginstatus->check_login();
		$data = array();

		$username = $this->session->userdata('username');

		$data['pengguna'] = $this->user_model->get_login($username)->row_array();
		$data['peserta'] = $this->participant_model->get_peserta($username)->row_array();


		$this->template->display('data_diri/biodata',$data);
	}

	public function edit(){
		$this->loginstatus->check_login();

		$usertype = $this->session->userdata('user_type_id');
		$username = $this->session->userdata('username');
		if ($usertype != '99') {
			$this->template->display('data_diri/biodata');
		}
		else{

			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');//
			$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
			$this->form_validation->set_rules('status_perkawinan','Status Marital','required');
			$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
			$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
			$this->form_validation->set_rules('provinsi_lahir','Provinsi Lahir','required');
			$this->form_validation->set_rules('kewarganegaraan','Kewarganegaraan','required');
			$this->form_validation->set_rules('agama','Agama','required');
			$this->form_validation->set_rules('golongan_darah','Golongan Darah','required');
			$this->form_validation->set_rules('sumber_biaya','Sumber Biaya','required');
			$this->form_validation->set_rules('alamat_lengkap','Alamat Lengkap','required');//
			$this->form_validation->set_rules('kabupaten','Kabupaten','required');
			$this->form_validation->set_rules('provinsi_tinggal','Provinsi Tinggal','required');
			$this->form_validation->set_rules('status_tempat_tinggal','Status Tempat Tinggal','required');
			$this->form_validation->set_rules('no_hp','Nomor Hp','required');
			$this->form_validation->set_rules('email','email','required');
			$this->form_validation->set_rules('perguruan_tinggi_s1','Perguruan Tinggi','required');//
			$this->form_validation->set_rules('kota_pt_s1','Kota','required');
			$this->form_validation->set_rules('jurusan_s1','Juruasan','required');
			$this->form_validation->set_rules('tahun_lulus_s1','Tahun Lulus','required');
			$this->form_validation->set_rules('lama_studi_s1','Lama Studi','required');
			$this->form_validation->set_rules('no_ijazah_universitas_s1','Nomor Ijazah Universias','required');
			$this->form_validation->set_rules('ipk_s1','IPK','required');
			$this->form_validation->set_rules('no_ijazah_fakultas_s1','Nomor Ijazah Fakultas','required');
			$this->form_validation->set_rules('perguruan_tinggi_s2','Perguruan Tinggi');//
			$this->form_validation->set_rules('kota_pt_s2','Kota');
			$this->form_validation->set_rules('prodi_s2','Program Studi');
			$this->form_validation->set_rules('tahun_lulus_s2','Tahun Lulus');
			$this->form_validation->set_rules('lama_studi_s2','Lama Studi');
			$this->form_validation->set_rules('no_ijazah_universitas_s2','Nomor Ijazah Universias');
			$this->form_validation->set_rules('ipk_s2','IPK');
			$this->form_validation->set_rules('no_ijazah_fakultas_s2','Nomor Ijazah Fakultas');
			$this->form_validation->set_rules('perguruan_tinggi_s3','Perguruan Tinggi');//
			$this->form_validation->set_rules('kota_pt_s3','Kota');
			$this->form_validation->set_rules('prodi_s3','Program Studi');
			$this->form_validation->set_rules('tahun_lulus_s3','Tahun Lulus');
			$this->form_validation->set_rules('lama_studi_s3','Lama Studi');
			$this->form_validation->set_rules('no_ijazah_universitas_s3','Nomor Ijazah Universias');
			$this->form_validation->set_rules('ipk_s3','IPK');
			$this->form_validation->set_rules('no_ijazah_fakultas_s3','Nomor Ijazah Fakultas');
			$this->form_validation->set_rules('jenis_pekerjaan','Jenis Pekerjaan','required');//
			$this->form_validation->set_rules('jabatan','Jabatan','required');
			$this->form_validation->set_rules('nama_instansi','Nama Instansi');
			$this->form_validation->set_rules('alamat_instansi','Alamat Instansi');
			$this->form_validation->set_rules('no_telepon_instansi','Nomor Telepon/ Fax');
			$this->form_validation->set_rules('gaji','Gaji');
			$this->form_validation->set_rules('mulai_bekerja','Mulai Bekerja');
			$this->form_validation->set_rules('masa_tunggu','Masa Tunggu');
			$this->form_validation->set_rules('judul_nasional','Judul Artikel Ilmiah Nasional');//
			$this->form_validation->set_rules('penyelenggara_nasional','Penyelenggara');
			$this->form_validation->set_rules('prosiding_nasional','Nama Prosiding Nasional');
			$this->form_validation->set_rules('tahun_nasional','Tahun');
			$this->form_validation->set_rules('web_nasional','Tautan');
			$this->form_validation->set_rules('judul_internasional','Judul Artikel Ilmiah Internasional');//
			$this->form_validation->set_rules('penyelenggara_internasional','Penyelenggara');
			$this->form_validation->set_rules('prosiding_internasional','Nama Prosiding Internasional');
			$this->form_validation->set_rules('tahun_internasional','Tahun');
			$this->form_validation->set_rules('web_internasional','Tautan');
			$this->form_validation->set_rules('judul_jurnal_nasional','Judul Jurnal Nasional');//
			$this->form_validation->set_rules('pengarang_jurnal_nasional','Nama Pengarang Jurnal');
			$this->form_validation->set_rules('nama_jurnal_nasional','Nama Jurnal');
			$this->form_validation->set_rules('volume_jurnal_nasional','Volume/ No Jurnal');
			$this->form_validation->set_rules('tahun_jurnal_nasional','Tahun');
			$this->form_validation->set_rules('web_jurnal_nasional','Tautan');
			$this->form_validation->set_rules('judul_jurnal_terindeks','Judul Jurnal Nasional Terindeks');//
			$this->form_validation->set_rules('pengarang_jurnal_terindeks','Nama Pengarang Jurnal');
			$this->form_validation->set_rules('nama_jurnal_terindeks','Nama Jurnal');
			$this->form_validation->set_rules('volume_jurnal_terindeks','Volume/ No Jurnal');
			$this->form_validation->set_rules('tahun_jurnal_terindeks','Tahun');
			$this->form_validation->set_rules('web_jurnal_terindeks','Tautan');
			$this->form_validation->set_rules('judul_jurnal_internasional','Judul Jurnal Internasional');//
			$this->form_validation->set_rules('pengarang_jurnal_internasional','Nama Pengarang Jurnal');
			$this->form_validation->set_rules('nama_jurnal_internasional','Nama Jurnal');
			$this->form_validation->set_rules('volume_jurnal_internasional','Volume/ No Jurnal');
			$this->form_validation->set_rules('tahun_jurnal_internasional','Tahun');
			$this->form_validation->set_rules('web_jurnal_internasional','Tautan');
			$this->form_validation->set_rules('judul_jurnal_bereputasi','Judul Jurnal Nasional');//
			$this->form_validation->set_rules('pengarang_jurnal_bereputasi','Nama Pengarang Jurnal');
			$this->form_validation->set_rules('nama_jurnal_bereputasi','Nama Jurnal');
			$this->form_validation->set_rules('volume_jurnal_bereputasi','Volume/ No Jurnal');
			$this->form_validation->set_rules('tahun_jurnal_bereputasi','Tahun');
			$this->form_validation->set_rules('web_jurnal_bereputasi','Tautan');

			if($this->form_validation->run()==FALSE){
				$data = array();
				$data['data_diri'] = $this->participant_model->get_peserta($username)->row_array();

				//setting up for jenis kelamin
				$jenis_kelamin_checked_1 = '';
				$jenis_kelamin_checked_2 = '';
				// print_r($data['data_diri']['jenis_kelamin']);
				// die();
				if($data['data_diri']['jenis_kelamin']=='1'){
					$jenis_kelamin_checked_1 = 'checked';
				}
				if($data['data_diri']['jenis_kelamin']=='2'){
					$jenis_kelamin_checked_2 = 'checked';
				}
				$data['jenis_kelamin'][1] = $jenis_kelamin_checked_1;
				$data['jenis_kelamin'][2] = $jenis_kelamin_checked_2;

				//generate selectbox mmarital
				$status_perkawinan_option_0 = '';
				$status_perkawinan_option_1 = '';
				$status_perkawinan_option_2 = '';
				$status_perkawinan_option_3 = '';
				if($data['data_diri']['status_perkawinan']=='0'){
					$status_perkawinan_option_0 = 'selected';
				}
				if($data['data_diri']['status_perkawinan']=='1'){
					$status_perkawinan_option_1 = 'selected';
				}
				if($data['data_diri']['status_perkawinan']=='2'){
					$status_perkawinan_option_2 = 'selected';
				}
				if($data['data_diri']['status_perkawinan']=='3'){
					$status_perkawinan_option_3 = 'selected';
				}
				$data['status_perkawinan'] = '<select name="status_perkawinan" id="status_perkawinan" required="required" class="form-control">
												<option value="" '.$status_perkawinan_option_0.'>Pilih Status Marital</option>
												<option value="1" '.$status_perkawinan_option_1.'>Lajang</option>
												<option value="2" '.$status_perkawinan_option_2.'>Menikah</option>
												<option value="3" '.$status_perkawinan_option_3.'>Cerai</option>
											</select>';

				//generate selectbox golongan darah
				$golongan_darah_option_0 = '';
				$golongan_darah_option_1 = '';
				$golongan_darah_option_2 = '';
				$golongan_darah_option_3 = '';
				$golongan_darah_option_4 = '';
				if($data['data_diri']['golongan_darah']=='0'){
					$golongan_darah_option_0 = 'selected';
				}
				if($data['data_diri']['golongan_darah']=='1'){
					$golongan_darah_option_1 = 'selected';
				}
				if($data['data_diri']['golongan_darah']=='2'){
					$golongan_darah_option_2 = 'selected';
				}
				if($data['data_diri']['golongan_darah']=='3'){
					$golongan_darah_option_3 = 'selected';
				}
				if($data['data_diri']['golongan_darah']=='4'){
					$golongan_darah_option_4 = 'selected';
				}
				$data['golongan_darah'] = '<select name="golongan_darah" id="golongan_darah" required="required" class="form-control">
												<option value="" '.$golongan_darah_option_0.'>Pilih Golongan Darah</option>
												<option value="1" '.$golongan_darah_option_1.'>A</option>
												<option value="2" '.$golongan_darah_option_2.'>B</option>
												<option value="3" '.$golongan_darah_option_3.'>AB</option>
												<option value="4" '.$golongan_darah_option_4.'>O</option>
											</select>';

				$this->template->display('data_diri/edit_view',$data);
			}
			else{
				$data_alasan = array(	'nama_lengkap' => $this->input->post('nama_lengkap'),
										'jenis_kelamin' => $this->input->post('jenis_kelamin'),
										'status_perkawinan' => $this->input->post('status_perkawinan'),
										'tempat_lahir' => $this->input->post('tempat_lahir'),
										'tanggal_lahir' => $this->tanggal->tanggal_simpan_db($this->input->post('tanggal_lahir')),
										'provinsi_lahir' => $this->input->post('provinsi_lahir'),
										'kewarganegaraan' => $this->input->post('kewarganegaraan'),
										'agama' => $this->input->post('agama'),
										'golongan_darah' => $this->input->post('golongan_darah'),
										'sumber_biaya' => $this->input->post('sumber_biaya'),
										'alamat_lengkap' => $this->input->post('alamat_lengkap'),
										'kabupaten' => $this->input->post('kabupaten'),
										'provinsi_tinggal' => $this->input->post('provinsi_tinggal'),
										'status_tempat_tinggal' => $this->input->post('status_tempat_tinggal'),
										'no_hp' => $this->input->post('no_hp'),
										'email' => $this->input->post('email'),
										'perguruan_tinggi_s1' => $this->input->post('perguruan_tinggi_s1'),
										'kota_pt_s1' => $this->input->post('kota_pt_s1'),
										'provinsi_pt_s1' => $this->input->post('provinsi_pt_s1'),
										'jurusan_s1' => $this->input->post('jurusan_s1'),
										'tahun_lulus_s1' => $this->input->post('tahun_lulus_s1'),
										'lama_studi_s1' => $this->input->post('lama_studi_s1'),
										'no_ijazah_universitas_s1' => $this->input->post('no_ijazah_universitas_s1'),
										'ipk_s1' => $this->input->post('ipk_s1'),
										'no_ijazah_fakultas_s1' => $this->input->post('no_ijazah_fakultas_s1'),
										'perguruan_tinggi_s2' => $this->input->post('perguruan_tinggi_s2'),
										'kota_pt_s2' => $this->input->post('kota_pt_s2'),
										'provinsi_pt_s2' => $this->input->post('provinsi_pt_s2'),
										'prodi_s2' => $this->input->post('prodi_s2'),
										'tahun_lulus_s2' => $this->input->post('tahun_lulus_s2'),
										'lama_studi_s2' => $this->input->post('lama_studi_s2'),
										'no_ijazah_universitas_s2' => $this->input->post('no_ijazah_universitas_s2'),
										'ipk_s2' => $this->input->post('ipk_s2'),
										'no_ijazah_fakultas_s2' => $this->input->post('no_ijazah_fakultas_s2'),
										'perguruan_tinggi_s3' => $this->input->post('perguruan_tinggi_s3'),
										'kota_pt_s3' => $this->input->post('kota_pt_s3'),
										'provinsi_pt_s3' => $this->input->post('provinsi_pt_s3'),
										'prodi_s3' => $this->input->post('prodi_s3'),
										'tahun_lulus_s3' => $this->input->post('tahun_lulus_s3'),
										'lama_studi_s3' => $this->input->post('lama_studi_s3'),
										'no_ijazah_universitas_s3' => $this->input->post('no_ijazah_universitas_s3'),
										'ipk_s3' => $this->input->post('ipk_s3'),
										'no_ijazah_fakultas_s3' => $this->input->post('no_ijazah_fakultas_s3'),
										'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
										'jabatan' => $this->input->post('jabatan'),
										'nama_instansi' => $this->input->post('nama_instansi'),
										'alamat_instansi' => $this->input->post('alamat_instansi'),
										'no_telepon_instansi' => $this->input->post('no_telepon_instansi'),
										'gaji' => $this->input->post('gaji'),
										'mulai_bekerja' => $this->input->post('mulai_bekerja'),
										'masa_tunggu' => $this->input->post('masa_tunggu'),
										'judul_nasional' => $this->input->post('judul_nasional'),
										'penyelenggara_nasional' => $this->input->post('penyelenggara_nasional'),
										'prosiding_nasional' => $this->input->post('prosiding_nasional'),
										'tahun_nasional' => $this->input->post('tahun_nasional'),
										'web_nasional' => $this->input->post('web_nasional'),
										'judul_internasional' => $this->input->post('judul_internasional'),
										'penyelenggara_internasional' => $this->input->post('penyelenggara_internasional'),
										'prosiding_internasional' => $this->input->post('prosiding_internasional'),
										'tahun_internasional' => $this->input->post('tahun_internasional'),
										'web_nasional' => $this->input->post('web_nasional'),
										'judul_jurnal_nasional' => $this->input->post('judul_jurnal_nasional'),
										'pengarang_jurnal_nasional' => $this->input->post('pengarang_jurnal_nasional'),
										'nama_jurnal_nasional' => $this->input->post('nama_jurnal_nasional'),
										'volume_jurnal_nasional' => $this->input->post('volume_jurnal_nasional'),
										'tahun_jurnal_nasional' => $this->input->post('tahun_jurnal_nasional'),
										'web_jurnal_nasional' => $this->input->post('web_jurnal_nasional'),
										'judul_jurnal_terindeks' => $this->input->post('judul_jurnal_terindeks'),
										'pengarang_jurnal_terindeks' => $this->input->post('pengarang_jurnal_terindeks'),
										'nama_jurnal_terindeks' => $this->input->post('nama_jurnal_terindeks'),
										'volume_jurnal_terindeks' => $this->input->post('volume_jurnal_terindeks'),
										'tahun_jurnal_terindeks' => $this->input->post('tahun_jurnal_terindeks'),
										'web_jurnal_terindeks' => $this->input->post('web_jurnal_terindeks'),
										'judul_jurnal_internasional' => $this->input->post('judul_jurnal_internasional'),
										'pengarang_jurnal_internasional' => $this->input->post('pengarang_jurnal_internasional'),
										'nama_jurnal_internasional' => $this->input->post('nama_jurnal_internasional'),
										'volume_jurnal_internasional' => $this->input->post('volume_jurnal_internasional'),
										'tahun_jurnal_internasional' => $this->input->post('tahun_jurnal_internasional'),
										'web_jurnal_internasional' => $this->input->post('web_jurnal_internasional'),
										'judul_jurnal_bereputasi' => $this->input->post('judul_jurnal_bereputasi'),
										'pengarang_jurnal_bereputasi' => $this->input->post('pengarang_jurnal_bereputasi'),
										'nama_jurnal_bereputasi' => $this->input->post('nama_jurnal_bereputasi'),
										'volume_jurnal_bereputasi' => $this->input->post('volume_jurnal_bereputasi'),
										'tahun_jurnal_bereputasi' => $this->input->post('tahun_jurnal_bereputasi'),
										'web_jurnal_bereputasi' => $this->input->post('web_jurnal_bereputasi'),
										'updated_date' => date('Y-m-d'),
										'updated_user' => $this->session->userdata('username')
				);
				$this->participant_model->update($username,$data_alasan);

				$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data telah diubah.</div>');

				redirect('data_diri');
			}
		}
	}
}