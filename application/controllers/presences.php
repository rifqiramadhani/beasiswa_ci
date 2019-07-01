<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presences extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->loginstatus->check_login();
		$this->load->model(array('user_model','master/jam_kerja_m','presences_m','workday_plan_model','day_off_model')); /*array*/
		$this->load->library('template');
	}

	public function index(){
		$data = array();
		// echo "<pre>";
		// print_r($this->input->post());die();
		// $data = array();
		if ($this->input->post('nomor_induk') != null){
			$user_id = $this->input->post('nomor_induk');
		}
		else{
			$user_id = $this->session->userdata('user_id');
		}

		// $libur = array();
		// $data['liburan'] = $this->day_off_model->get_all()->result_array();
		// $libur['liburan'] = $this->day_off_model->get_day_off()->result_array();
		// if($libur['liburan'])
		// {
		//     // redirect('presences/index');
		//     print_r($libur['liburan']);
		//     // exit();
		// }
		// print_r($libur['liburan']);

		$data['nomor_induk'] = $user_id;
		// $kode_mesin = $this->db->get_where('')
		/*if($_POST){
			$user_id=$this->input->post('user_id');
		}*/
		$data['user'] = $this->user_model->get_by_id($user_id)->row_array();
		// print_r($data['user']);die();
		$data['jam_kerja'] = $this->jam_kerja_m->get_by_id($data['user']['id_jam_kerja'])->row_array();

		$selisih_hari = 30; //jumlah hari yg akan ditampilkan

		// $today = date('Y-m-d');
		// $minus = mktime(0,0,0,date('m'),date('d')-$selisih_hari,date('Y'));
		// $pastmonth = date('Y-m-d',$minus);

		// $data['date_start'] = $this->tanggal->tanggal_indo($pastmonth);
		// $data['date_end'] = $this->tanggal->tanggal_indo($today);
		// if($_POST){
		// 	$today = $this->tanggal->tanggal_simpan_db($this->input->post('presences_date_end'));
		// 	$pastmonth = $this->tanggal->tanggal_simpan_db($this->input->post('presences_date_start'));

		// 	$selisih_hari = $this->tanggal->get_selisih($today,$pastmonth);

		// 	$data['date_start'] = $this->input->post('presences_date_start');
		// 	$data['date_end'] = $this->input->post('presences_date_end');
		// }

		//Tanggal Indonesia
		//$today = date('Y-M-d');

		//bulan dan tahun
		$tanggal = mktime(0,0,0,date('m'),date('d'),date('Y'));
		$set_bulan_tahun = date("Y-m",$tanggal);
		$data['bulan_tahun'] = $this->tanggal->tanggal_indo($set_bulan_tahun);

		//bulan dan tahun form 3
		$data['bulan'] = $this->input->post('bulan');
		$data['tahun'] = $this->input->post('tahun');

		//bulan sebelumnya
		$today = date('Y-m-d');
		$pastmonth = mktime(0,0,0,date('m'),date('d'),date('Y'));
		$pastmonth_firstday = date('Y-m-01',$pastmonth);
		$pastmonth_lastday = date('Y-m-t',$pastmonth);

		$data['date_start'] = $this->tanggal->tanggal_indo($pastmonth_firstday);
		$data['date_end'] = $this->tanggal->tanggal_indo($pastmonth_lastday);

		// $data['date_start_display'] = $this->tanggal->tanggal_indo_monthtext($pastmonth_firstday);
		// $data['date_end_display'] = $this->tanggal->tanggal_indo_monthtext($pastmonth_lastday);

		$data['date_start_periode'] = $this->tanggal->tanggal_indo_monthtext($pastmonth_firstday);
		$data['date_end_periode'] = $this->tanggal->tanggal_indo_monthtext($pastmonth_lastday);

		//$data['harisan']='aA'
		 // print_r($data['date_start']);
		 // print_r($pastmonth_firstday);
		// die();

		if($_POST){
			$today = $this->tanggal->tanggal_simpan_db($this->input->post('presences_date_end'));
			$pastmonth = $this->tanggal->tanggal_simpan_db($this->input->post('presences_date_start'));

			$selisih_hari = $this->tanggal->get_selisih($today,$pastmonth);

			$data['date_start'] = $this->input->post('presences_date_start'); //24-5-2018
			$data['date_end'] = $this->input->post('presences_date_end');

			// $data['date_start_periode'] = $this->tanggal->tanggal_indo_monthtext($this->input->post('presences_date_start'));
			// $data['date_end_periode'] = $this->tanggal->tanggal_indo_monthtext($this->input->post('presences_date_end'));

			$presences_date_start = date_format(date_create_from_format('d/m/Y', $this->input->post('presences_date_start')), 'Y-m-d');
			$presences_date_end = date_format(date_create_from_format('d/m/Y', $this->input->post('presences_date_end')), 'Y-m-d');

			$data['date_start_periode'] = $this->tanggal->tanggal_indo_monthtext($presences_date_start);
			$data['date_end_periode'] = $this->tanggal->tanggal_indo_monthtext($presences_date_end);

			// $data['date_start_display'] = $this->tanggal->tanggal_indo_monthtext($presences_date_start);
			// $data['date_end_display'] = $this->tanggal->tanggal_indo_monthtext($presences_date_end);
		}

		//load select box jabatan jalan
		$nam = $this->user_model->get_all(false)->result_array();
		$data['listPegawai'] = $nam;
		//print_r($nam);die();
		$data['nama_pegawai'] = '<select name="id_nama" id="id_nama" class="form-control" placehoolder="Pilih Nama">';
		$data['nama_pegawai'] .= '<option value="">Pilih Jabatan</option>';
		foreach($nam as $n){
			$selected = '';
			if($data['user']['nomor_induk']==$n['nomor_induk']){
				$selected = 'selected';
			}
			$data['nama_pegawai'] .= '<option value="'.$n['nomor_induk'].'" '.$selected.'>'.$n['nama'].'</option>';
		}
		$data['nama_pegawai'] .= '</select>';
		
		//hari libur
		// $libur = [];
		// $h = $this->day_off_model->get_day_off();

		// print_r($data['libur'])
		// 	if ($data['libur']->num_rows() > 0)
		// 	{
		// 	    //Use row() to get a single result
		// 	    $row = $data['libur']->row();

		// 	    //Pass $query->email directly to reset_password
		// 	    $this->->index($row['tanggal']);
		// 	    return true;
		// 	    print_r($row);
		// die();
		// 	}

		$data['libur'] = $this->day_off_model->get_day_off()->result_array();
		$liburann = count($data['libur']);
		for ($i = 0; $i < $liburann; $i++) {
		    $data['libur'][$i]['tanggal'];
		    // echo $data['libur'][$i]['filepath'];
		}
		// $data['libura'] = $this->day_off_model->get_day_off()->result_array();
		$data['kehadiran'] = array();
		for($i=$selisih_hari;$i>=0;$i--){
			$temp = mktime(0,0,0,$this->tanggal->get_only_month($today),$this->tanggal->get_only_date($today)-$i,$this->tanggal->get_only_year($today));
			$tanggal = date('Y-m-d',$temp);
			// print_r($tanggal);
			// die();
			$data['kehadiran'][$i]['tanggalan'] = $tanggal;
			$data['kehadiran'][$i]['tanggal'] = $this->tanggal->tanggal_indo_monthtext($tanggal);
			$data['kehadiran'][$i]['hari'] = $this->tanggal->get_hari($tanggal);
			// $data['kehadiran'][$i]['libur'] = array();
			// $data['kehadiran'][$i]['libur'] = $this->day_off_model->get_day_off()->result();
			// $data['kehadiran'][$i]['libur'] = json_decode(json_encode($data['kehadiran'][$i]['libur']), true); //stdClass Object hilang


			// $data['kehadiran'][$i]['b'] = $this->day_off_model->get_day_off();

			//print_r($data['kehadiran'][$i]['libur']);
			// die();

			// $a = $this->day_off_model->get_all()->num_rows();
			// print_r($a);
			// die();

			// $data['kehadiran'][$i]['list_libur'] = $this->tanggal->tanggal_indo($tanggal);
			// // $data['kehadiran'][$i]['libur'] = $this->day_off_model->get_all($data['kehadiran'][$i]['list_libur']);
			// $data['kehadiran'][$i]['libur'] = $this->day_off_model->get_list_libur(true)->result_array();
			// $data['kehadiran'][$i]['libur'] = $this->tanggal->tanggal_indo_monthtext($data['kehadiran'][$i]['libur']);
			// $tanggala=$this->day_off_model->get_libur($tanggal);
			// print_r($tanggala);
			// die();
			// $data['tanggal']=$this->tanggal->tanggal_indo_monthtext($tanggal);
			// return 
			// print_r($data['kehadiran'][$i]['libur']);
			// die();

			// if ($this->day_off_model->get_all($tanggal)->num_rows() > 0){
			// 	$data['kehadiran'][$i]['libur']=TRUE;
			// }
			// else{
			// 	$data['kehadiran'][$i]['libur']=FALSE;
			// }
			//print_r($data['kehadiran'][$i]['hari']);
			//die();
			//get data kehadiran
			// $tanggal = '2017-09-07';
			// print_r($this->presences_m->get_by_date($tanggal,$user_id)->result_array());die();
			// echo $this->tanggal->get_hari($tanggal);
				// if($this->tanggal->get_hari($tanggal) != 'Minggu' AND $this->tanggal->get_hari($tanggal) != 'Sabtu'){
				// 	print_r('s');
				// }
				// else{
				// 	print_r('r');
				// }
				
				// die();
			// buat exception hari minggu
			
					
				if($this->presences_m->get_by_date($tanggal,$user_id)->num_rows() > 0){
				//if ($this->tanggal->get_hari($tanggal) != 'Minggu'){
					//if ($data['kehadiran'][$i]['hari'] != 'Minggu'){
					$present = $this->presences_m->get_by_date($tanggal,$user_id)->row_array();
					$data['kehadiran'][$i]['datang'] = $this->tanggal->get_jam($present['jam_masuk']);
					$data['kehadiran'][$i]['pulang'] = $this->tanggal->get_jam($present['jam_keluar']);
					if($present['keterangan']==null){
						$data['kehadiran'][$i]['alasan'] = $present['nama_alasan'];}
					else{
						$data['kehadiran'][$i]['alasan'] = $present['nama_alasan'].' ('.$present['keterangan'].')';
					}

					if($present['id_alasan']=='5'){
						$data['kehadiran'][$i]['alasan'] = '-';
					}
					//}
				//}
				}else{
					$data['kehadiran'][$i]['datang'] = '-';
					$data['kehadiran'][$i]['pulang'] = '-';
					$data['kehadiran'][$i]['alasan'] = '-';
				}
				// print_r($data['kehadiran'][$i]['tanggal']);
				// 	die();
			//checking work day
			$workday_count = $this->workday_plan_model->get_by_date(intval($this->tanggal->get_only_date($tanggal)),$this->tanggal->get_only_month($tanggal),$this->tanggal->get_only_year($tanggal))->num_rows();
			if($workday_count > 0){
				$workday = $this->workday_plan_model->get_by_date(intval($this->tanggal->get_only_date($tanggal)),$this->tanggal->get_only_month($tanggal),$this->tanggal->get_only_year($tanggal))->row_array();
				if($workday['status']=='0'){
					$data['kehadiran'][$i]['datang'] = $workday['keterangan'];
					$data['kehadiran'][$i]['pulang'] = $workday['keterangan'];
					$data['kehadiran'][$i]['alasan'] = $workday['keterangan'];	
				}
			}
		}

		$this->template->display('presences/presences',$data);
	}

	public function input(){
		$this->form_validation->set_rules('nomor_induk','Nomor Induk','required');
		$this->form_validation->set_rules('pwd','Password','required');
		$this->form_validation->set_rules('type_absen','Type','required');

		if($this->form_validation->run()==FALSE){
			$this->template->display('presences/input_view');
		}else{
			if($this->user_model->check_absen($this->input->post('nomor_induk'),$this->input->post('pwd'))){
				//absen success, save to database
				$data_user = $this->user_model->get_by_id($this->input->post('nomor_induk'))->row_array();

				if($this->input->post('type_absen')=='1'){
					//jam masuk

					//pertama cek dulu absen tanggal sekarang di db
					$cek = $this->presences_m->get_by_date(date('Y-m-d'),$data_user['id_pegawai'])->num_rows();
					if($cek > 0){
						//jika sudah ada, beri pesan ke user bahwa jam masuk telah di input
						$this->session->set_flashdata('message_alert','<div class="alert alert-danger">Data absen telah terlewat</div>');
						redirect('presences/input');
					}else{
						//jika belum ada, save to database
						$data_kehadiran = array(
											'id_pegawai' => $data_user['id_pegawai'],
											'tanggal' => date('Y-m-d'),
											'jam_masuk' => date('Y-m-d H:i:s'),
											'hadir' => '1',
											'id_alasan' => '5',
											'created_date' => date('Y-m-d'),
											'created_user' => $this->session->userdata('user_id'),
											'active' => '1'
									);
						$this->presences_m->save($data_kehadiran);
						
						$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data absen telah disimpan</div>');
						redirect('presences/input');
					}
				}else{
					//jam keluar
					//pertama cek dulu absen tanggal sekarang di db
					$cek = $this->presences_m->get_by_date(date('Y-m-d'),$data_user['id_pegawai'])->num_rows();
					if($cek > 0){
						//jika sudah ada, data jam keluar bisa dimasukan
						$tmp = $this->presences_m->get_by_date(date('Y-m-d'),$data_user['id_pegawai'])->row_array();

						$data_kehadiran = array(
											'jam_keluar' => date('Y-m-d H:i:s'),
											'updated_date' => date('Y-m-d'),
											'updated_user' => $this->session->userdata('user_id')
								);
						$this->presences_m->update($tmp['id_kehadiran'],$data_kehadiran);

						$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data absen telah disimpan</div>');
						redirect('presences/input');
					}else{
						//jika belum ada, beri pesan ke user bahwa user harus menginput jam masuk terlebih dahulu
						$this->session->set_flashdata('message_alert','<div class="alert alert-danger">Data absen tidak tersedia, mohon masukkan waktu terlebih dahulu</div>');
						redirect('presences/input');
					}
				}

			}else{
				$this->session->set_flashdata('message_alert','<div class="alert alert-danger">Username dan password yang Anda gunakan tidak terdaftar.</div>');
				redirect('presences/input');
			}
		}
	}
}