<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_to_pdf extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->loginstatus->check_login();
		$this->load->library('template');
		$this->load->model('presences_m');
		$this->load->model('user_model');
	}

	public function index(){
		$this->template->display('presences/rekap_periode');
	}

	public function print_laporan_eachPegawai(){
		if ($this->input->get('nomor_induk') != null){
			$nomorInduk = $this->input->get('nomor_induk');
		}else{
			$nomorInduk = $this->session->userdata('user_id');
		}
		// $tanggal = mktime(0,0,0,date('m'),date('d'),date('Y'));
		// $dateStart = $this->input->get('date_start');
		// $dateEnd = $this->input->get('date_end');

		// $dateStart = date('Y-m-d',$tanggal);
		// $dateEnd = date('Y-m-d',$tanggal);

		// // $nomorInduk = $this->input->get('nomor_induk');

		// $dateStart = $this->tanggal->tanggal_indo_monthtext($dateStart);
		// $dateEnd = $this->tanggal->tanggal_indo_monthtext($dateEnd);

		$dateStart = $this->input->get('date_start');
		$dateEnd = $this->input->get('date_end');
		// $nomorInduk = $this->input->get('nomor_induk');

		$dateStart  = $this->formatDate($dateStart);
		$dateEnd = $this->formatDate($dateEnd);
		
		$detailPegawai = $this->user_model->get_by_nik($nomorInduk)->row();

		$listKehadiran = $this->presences_m->get_by_range($dateStart, $dateEnd, $nomorInduk)->result();

		// $date_start_view = date_format(date_create_from_format('d/m/Y', $dateStart), 'Y-m-d');
		// $date_end_view = date_format(date_create_from_format('d/m/Y', $dateEnd), 'Y-m-d');
		/*echo "<pre>";
		print_r($detailPegawai);
		echo "</pre>";
		die();*/

		$date_start_view  = $this->tanggal->tanggal_indo_monthtext($dateStart);
		$date_end_view  = $this->tanggal->tanggal_indo_monthtext($dateEnd);

		$this->template->display('presences/laporan_pegawai');
		
		// require("fpdf.php");
		$this->load->library('fpdf_gen');
		$this->fpdf->AddPage('L' , 'A4');

		// $this->$pdf->AddPage("L");
		// $this->fpdf->Image('undip_hp.jpg');
		// https://dummyimage.com/300.png

		$this->fpdf->SetFont('Times','',14);
		$this->fpdf->Cell(0,7,'KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI',0,0,'C');  /*lebar,tinggi*/
		$this->fpdf->Ln();
		$this->fpdf->Cell(0,7,'UNIVERSITAS DIPONEGORO',0,0,'C');  /*lebar,tinggi*/
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','B',14);
		$this->fpdf->Cell(0,7,'PASCASARJANA',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,6,'Jalan Imam Barjo S.H. No. 5, Pleburan, Semarang, Jawa Tengah 50241',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,6,'Telepon/Fax : (024) 8318856, Email: pasca@undip.ac.id',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','B',16);
		$this->fpdf->Cell(0,7,'__________________________________________________________________________________________________',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,7,'LAPORAN ABSENSI KEPEGAWAIAN PASCASAJANA UNIVERSITAS DIPONEGORO',0,0,'C'); 
		//	$this->fpdf->Ln();
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,7,'Nama	       : '. $detailPegawai->nama); 
		$this->fpdf->Ln();
		$this->fpdf->Cell(0,7,'NIP	          : '. $detailPegawai->nomor_induk);
		$this->fpdf->Ln();
		$this->fpdf->Cell(0,7,'Periode	    : '. $date_start_view.' -- '. $date_end_view); 
		$this->fpdf->Ln();
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','B',12,'C');
		$this->fpdf->Cell(28 , 7, '', 0, 0, 'C'); //buat table center 35 dari kiri
		$this->fpdf->Cell(15 , 7, 'No', 1, 'LR', 'C');
		$this->fpdf->Cell(60 , 7, 'Tanggal', 1, 'LR', 'C');
		$this->fpdf->Cell(30 , 7, 'Kehadiran', 1, 'LR', 'C');
		$this->fpdf->Cell(30 , 7, 'Jam Masuk', 1, 'LR', 'C');
		$this->fpdf->Cell(30 , 7, 'Jam Pulang', 1, 'LR', 'C');
		$this->fpdf->Cell(50 , 7, 'Alasan Tidak Hadir', 1, 'LR', 'C');

		$this->fpdf->SetFont('Times','',12,'C');
		if(sizeof($listKehadiran)>0){
			$no = 1;
			$y = 8;

			$this->fpdf->SetFont('Times','',12,'C');
			foreach ($listKehadiran as $key => $eachKehadiran) {
				$this->fpdf->Ln();
				
				if($eachKehadiran->id_alasan!=7){
					$kehadiran = 'Tidak hadir';
					$alasan = $eachKehadiran->nama_alasan;
				}else{
					$kehadiran = 'Hadir';
					$alasan = '-';
				}
				$nama_hari=$this->tanggal->get_hari($kehadiran);
				$tanggal=$this->tanggal->tanggal_indo_monthtext($eachKehadiran->tanggal);
				if ($nama_hari != 'Minggu' AND $nama_hari != 'Sabtu'){
				$this->fpdf->Cell(28 , 7, '', 0, 0, 'C');
				$this->fpdf->Cell(15 , $y, $no, 1, 'LR', 'C');
				$this->fpdf->Cell(60 , $y, $nama_hari.", ".$tanggal, 1, 'LR', 'l');
				$this->fpdf->Cell(30 , $y, $kehadiran, 1, 'LR', 'C');
				$this->fpdf->Cell(30 , $y, $eachKehadiran->jam_masuk, 1, 'LR', 'C');
				$this->fpdf->Cell(30 , $y, $eachKehadiran->jam_keluar, 1, 'LR', 'C');
				$this->fpdf->Cell(50 , $y, $alasan, 1, 'LR', 'C');
			}
				$no++;

			}
		}else{
			$this->fpdf->Ln();
			$this->fpdf->Cell(180 , 10, 'Tidak ada data presensi', 1, 'LR', 'C');
		}
		
		$this->fpdf->Output('laporan_pergawai.pdf','I');
	}

	public function print_rekap(){
		$this->template->display('presences/rekap_periode');
		ini_set('display_errors', 'off');
		error_reporting(0);

		 // $data['bulan'] = $this->input->post('bulan');
		 // $data['tahun'] = $this->input->post('tahun');
		// $_POST = $_GET;
		$bulan = (int)$this->input->get('bulan');
		$tahun = (int)$this->input->get('tahun');
		// $bulan_tahun = $this->input->post('bulan_tahun');
		
		// echo "<pre>";
		// print_r($this->input->post());
		// print_r(gettype($tahun));
		// echo "</pre>";
		// die();
		$namaEachPerson = array();
		
		// Bulan Sebelumnya
		$pastmonth = mktime(0,0,0,date('n')-2,date('j'),date('Y'));//bulan-hari-tahun (format dibuat integer dari 1 digit sampai n digit)
		// $bulan = date('n',$pastmonth);
		// $tahun = date('Y',$pastmonth);
		// $bulan = (string)$bulan;
		// $tahun = (string)$tahun;
		// print_r($bulan,$tahun);
		// die();
		//$tahun = intval($tahun); //intval() should not be used on objects, as doing so will emit an E_NOTICE level error and return 1.
		//  $bulan = 8;
		//  $tahun = 2017;


		// Ambil Data Kehadiran dari setiap Pegawai
		$listAlasan = $this->presences_m->get_all_alasan()->result();
		$initAlasan = array();

		foreach ($listAlasan as $key => $eachAlasan) {
			$initAlasan[$eachAlasan->nama_alasan] = 0;
		}

		$listAllRekap = $this->presences_m->get_rekap($bulan, $tahun)->result();
		/*echo "<pre>";
		print_r($tahun);
		echo "</pre>";
		die();*/
		foreach ($listAllRekap as $key => $eachRekap) {
			$rekapEachPerson[$eachRekap->nomor_induk] = $initAlasan;
			$namaEachPerson[$eachRekap->nomor_induk] = $eachRekap->nama;
		}

		foreach ($listAllRekap as $key => $eachRekap) {
			$rekapEachPerson[$eachRekap->nomor_induk][$eachRekap->nama_alasan]++;
		}

		/*$listNama = $this->user_model->get_all()->result();

		foreach ($listNama as $key => $eachNama) {

			$rekapNama[$eachNama->nama]++;

		}*/
/*		echo "<pre>";
		print_r($rekapNama);
		echo "</pre>";
		die();
	*/

		if ($bulan==1) {
			$bulan='Januari';
		}
		if ($bulan==2) {
			$bulan='Februari';
		}
		if ($bulan==3){
			$bulan='Maret';
		}
		if ($bulan==4){
			$bulan='April';	
		}
		if ($bulan==5){
			$bulan='Mei';
		}
		if ($bulan==6){
			$bulan='Juni';
		}
		if ($bulan==7){
			$bulan='Juli';
		}
		if ($bulan==8){
			$bulan='Agustus';
		}
		if ($bulan==9){
			$bulan='September';
		}
		if ($bulan==10){
			$bulan='Oktober';
		}
		if ($bulan==11){
			$bulan='November';
		}
		if ($bulan==12){
			$bulan='Desember';
		}

		$this->load->library('fpdf_gen');
		$this->fpdf->AddPage('L' , 'A4');
		
		// $this->fpdf->SetFont('Times','B',16);
		// $this->fpdf->Cell(0,10,'Rekap Absensi Kepegawaian',0,0,'C');  lebar,tinggi
		// $this->fpdf->Ln();
		// $this->fpdf->Cell(0,10,'Pascasarjana Universitas Diponegoro',0,0,'C');
		$this->fpdf->SetFont('Times','',14);
		$this->fpdf->Cell(0,7,'KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI',0,0,'C');  /*lebar,tinggi*/
		$this->fpdf->Ln();
		$this->fpdf->Cell(0,7,'UNIVERSITAS DIPONEGORO',0,0,'C');  /*lebar,tinggi*/
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','B',14);
		$this->fpdf->Cell(0,7,'PASCASARJANA',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,6,'Jalan Imam Barjo S.H. No. 5, Pleburan, Semarang, Jawa Tengah 50241',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,6,'Telepon/Fax : (024) 8318856, Email: pasca@undip.ac.id',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','B',16);
		$this->fpdf->Cell(0,7,'__________________________________________________________________________________________________',0,0,'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(0,7,'LAPORAN ABSENSI KEPEGAWAIAN PASCASAJANA UNIVERSITAS DIPONEGORO',0,0,'C'); 
		$this->fpdf->Ln();
		$this->fpdf->Cell(0,7,'Bulan	: '. $bulan); 
		$this->fpdf->Ln();
		$this->fpdf->Cell(0,7,'Tahun	: '. $tahun); 
		$this->fpdf->Ln();
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','B',10,'C');
		$this->fpdf->Cell(7 , 7, '', 0, 0, 'C');
		$this->fpdf->Cell(40 , 7, 'NIP', 1, 'LR', 'C');
		$this->fpdf->Cell(80 , 7, 'Nama', 1, 'LR', 'C');

		// print_r($rekapEachPerson);
		// print_r($listAlasan);die();
		
		foreach ($listAlasan as $key => $eachAlasan) {
			$this->fpdf->Cell(20 , 7, $eachAlasan->nama_alasan, 1, 'LR', 'C');
		}

		foreach ($rekapEachPerson as $key => $eachPerson) {
			/*foreach (array_combine($rekapEachPerson, $rekapNama) as $key => $eachPerson){*/
			$this->fpdf->SetFont('Times','',10,'C');
			$this->fpdf->Ln();
			$this->fpdf->Cell(7 , 7, '', 0, 0, 'C');
			$this->fpdf->Cell(40 , 7, $key, 1, 'LR', 'C');
		
			//ambil nama berdasarkan nomor induk

			$this->fpdf->Cell(80 , 7, $namaEachPerson[$key], 1, 'LR', 'L');

			foreach ($eachPerson as $key2 => $value) {
				$this->fpdf->Cell(20 , 7, $value, 1, 'LR', 'C');
			}
		}
		
		// ob_end_clean();
		$this->fpdf->Output('rekap_periode.pdf','I');

		/*echo "<pre>";
		print_r($rekapEachPerson);
		echo "</pre>";
		die();*/
	}

	private function formatDate($date){
		$parts =  explode('/',$date);

		$date	= $parts[2].'-'.$parts[1].'-'.$parts[0];
		
		return $date;
	}
}