<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->loginstatus->check_login();
		$this->load->model('participant_model');
		$this->load->library('form_validation');
		$this->load->library('template');
	}

	public function index(){
		$this->template->display('unggah/unggah_excel_view');
	}

	public function do_upload_akademik(){
    	$actual_path = FCPATH.'upload/';
    	//print_r($actual_path);die();
        $config['upload_path']          = './upload/temp/';
        $config['allowed_types']        = 'gif|jpg|png|xlsx|csv|xls';
        $config['overwrite'] 			= TRUE;
        /*$config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;*/

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            print_r("expression");
        }
        else{
    		$uploaded_file = $this->upload->data();
    		$filename = $uploaded_file['file_name'];
    		$file_check = $actual_path.''.$filename;

			// print_r("Data belum tersedia");
			//$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data belum tersedia/div>');
			//unlink('upload/temp/'.$filename);
			rename('upload/temp/'.$filename, 'upload/'.$filename);
			//if(rename('upload/temp/'.$filename, 'upload/'.$filename)){
			// print_r("Data berhasil dimasukkan");
			//$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data berhasil berhasil dimasukkan</div>');
			//redirect('Import');
			@chmod($data['full_path'],0777);

			$data = array();
			$this->load->library('Excel');
			
			$file = 'upload/'.$filename;
			
			//	read file from path
			$objPHPExcel = PHPExcel_IOFactory::createReader('Excel2007');
			$objPHPExcel->setReadDataOnly(true);

			$objPHPExcel = $objPHPExcel->load($file);
			$objWorksheet = $objPHPExcel->getActiveSheet();

			$highestRow = $objWorksheet->getHighestRow();
			$highestColumn = $objWorksheet->getHighestColumn();
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); //dari 0

			$key = array(	'nama_lengkap',
							'jenis_kelamin',
							'status_perkawinan',
							'tempat_lahir',
							'keluar_3',
							'nama_lengkap',
							'jenis_kelamin',
							'status_perkawinan',
							'tempat_lahir',
							'tanggal_lahir',
							'provinsi_lahir',
							'kewarganegaraan',
							'agama',
							'golongan_darah',
							'sumber_biaya',
							'alamat_lengkap',
							'kabupaten',
							'provinsi_tinggal',
							'status_tempat_tinggal',
							'no_hp',
							'email',
							'perguruan_tinggi_s1',
							'kota_pt_s1',
							'provinsi_pt_s1',
							'jurusan_s1',
							'tahun_lulus_s1',
							'lama_studi_s1',
							'no_ijazah_universitas_s1',
							'ipk_s1',
							'no_ijazah_fakultas_s1',
							'perguruan_tinggi_s2',
							'kota_pt_s2',
							'provinsi_pt_s2',
							'prodi_s2',
							'tahun_lulus_s2',
							'lama_studi_s2',
							'no_ijazah_universitas_s2',
							'ipk_s2',
							'no_ijazah_fakultas_s2',
							'perguruan_tinggi_s3',
							'kota_pt_s3',
							'provinsi_pt_s3',
							'prodi_s3',
							'tahun_lulus_s3',
							'lama_studi_s3',
							'no_ijazah_universitas_s3',
							'ipk_s3',
							'no_ijazah_fakultas_s3',
							'jenis_pekerjaan',
							'jabatan',
							'nama_instansi',
							'alamat_instansi',
							'no_telepon_instansi',
							'gaji',
							'mulai_bekerja',
							'masa_tunggu',
							'judul_nasional',
							'penyelenggara_nasional',
							'prosiding_nasional',
							'tahun_nasional',
							'web_nasional',
							'judul_internasional',
							'penyelenggara_internasional',
							'prosiding_internasional',
							'tahun_internasional',
							'web_nasional',
							'judul_jurnal_nasional',
							'pengarang_jurnal_nasional',
							'nama_jurnal_nasional',
							'volume_jurnal_nasional',
							'tahun_jurnal_nasional',
							'web_jurnal_nasional',
							'judul_jurnal_terindeks',
							'pengarang_jurnal_terindeks',
							'nama_jurnal_terindeks',
							'volume_jurnal_terindeks',
							'tahun_jurnal_terindeks',
							'web_jurnal_terindeks',
							'judul_jurnal_internasional',
							'pengarang_jurnal_internasional',
							'nama_jurnal_internasional',
							'volume_jurnal_internasional',
							'tahun_jurnal_internasional',
							'web_jurnal_internasional',
							'judul_jurnal_bereputasi',
							'pengarang_jurnal_bereputasi',
							'nama_jurnal_bereputasi',
							'volume_jurnal_bereputasi',
							'tahun_jurnal_bereputasi',
							'web_jurnal_bereputasi',
							// 'updated_date',
							// 'updated_user'
						);
			for($row=2; $row <= $highestRow; ++$row){
				for($col=0; $col < $highestColumnIndex; ++$col){
					$ExcelData[$col] = $objWorksheet->getCellByColumnAndRow($col,$row)->getValue();
				}
				$combined = array_combine($key, $ExcelData);

				$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data berhasil dimasukkan</div>');
				$this->participant_model->save_akademik($combined);
			}
    		$this->template->display('unggah/unggah_excel_view');
        }
    }

    public function do_upload_keuangan(){
    	$actual_path = FCPATH.'upload/';
    	//print_r($actual_path);die();
        $config['upload_path']          = './upload/temp/';
        $config['allowed_types']        = 'gif|jpg|png|xlsx|csv|xls';
        $config['overwrite'] 			= TRUE;
        /*$config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;*/

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            print_r("expression");
        }
        else{
    		$uploaded_file = $this->upload->data();
    		$filename = $uploaded_file['file_name'];
    		$file_check = $actual_path.''.$filename;

			rename('upload/temp/'.$filename, 'upload/'.$filename);
			@chmod($data['full_path'],0777);

			$data = array();
			$this->load->library('Excel');
			
			$file = 'upload/'.$filename;
			
			//	read file from path
			$objPHPExcel = PHPExcel_IOFactory::createReader('Excel2007');
			$objPHPExcel->setReadDataOnly(true);

			$objPHPExcel = $objPHPExcel->load($file);
			$objWorksheet = $objPHPExcel->getActiveSheet();

			$highestRow = $objWorksheet->getHighestRow();
			$highestColumn = $objWorksheet->getHighestColumn();
			$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); //dari 0

			$key = array('no_ijazah_universitas_s1','jumlah','keluar_1','keluar_2','keluar_3');
			for($row=2; $row <= $highestRow; ++$row){
				for($col=0; $col < $highestColumnIndex; ++$col){
					$ExcelData[$col] = $objWorksheet->getCellByColumnAndRow($col,$row)->getValue();
				}
				$combined = array_combine($key, $ExcelData);

				$this->session->set_flashdata('message_alert','<div class="alert alert-success">Data berhasil dimasukkan</div>');
				$this->participant_model->save_keuangan($combined);
			}
    		$this->template->display('unggah/unggah_excel_view');
        }
    }
}