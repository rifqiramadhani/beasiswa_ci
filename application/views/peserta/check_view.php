<?php
	// 	HALAMAN SUPER ADMIN
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Peserta Beasiswa Pascasarjana</h1>
		<?php echo validation_errors(); ?>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2 align="center">DATA DIRI PESERTA</h2><br/>
	</div>
	<div class="col-md-12">
		<div style="padding-bottom: 12px;">
			<n style="font-size: 20px;">
		<?php
			if($peserta['terima'] == 0){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b> belum diperiksa
				<?php
			}
			elseif($peserta['terima'] == 1){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b> telah <n style="color: green; font-weight: bold">diterima</n>
				<?php
			}
			elseif($peserta['terima'] == 2){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b><n style="color: red; font-weight: bold"> tidak diterima</n>
				<?php
			}
		?>
			</n>
			<span class="pull-right">
				<?php
				echo '<a class="btn btn-success" href="'.base_url().'peserta/terima/'.$peserta['username'].'" onclick="return confirm(\'Pengajuan Beasiswa Diterima?\')">
					<i class="fa fa-bookmark fa-lg">&nbsp Terima</i></a>&nbsp
					<a class="btn btn-danger" href="'.base_url().'peserta/tolak/'.$peserta['username'].'" onclick="return confirm(\'Apakah pengajuan beasiswa ditolak?\')">
					<i class="fa fa-bookmark-o fa-lg">&nbspTolak</i></a>
					<a class="btn" href="'.base_url().'peserta'.'">
					<i class="fa fa-backward fa-lg">&nbspBatal</i></a>
				';?>
				<!-- <a href="<?php echo base_url().'peserta'; ?>" class="btn btn-default">Batal</a> -->
			</span>
		</div>
		
	</div>
	<div class="col-md-12">
		<?php
	        if($this->session->flashdata('message_alert')){
	            echo $this->session->flashdata('message_alert');
	        }
	    ?>
	</div>
	<div class="col-md-12">
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">A. KETERANGAN TENTANG DIRI MAHASISWA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Nama Lengkap (dengan gelar)</td>
					<td>: <?php echo $peserta['nama_lengkap']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Jenis Kelamin</td>
					<td>: <?php if($peserta['jenis_kelamin'] == '1'){
								$peserta['jenis_kelamin'] = 'Laki-Laki';
							}
							else{
								$peserta['jenis_kelamin'] = 'Perempuan';
							}
							echo $peserta['jenis_kelamin']?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Status Marital</td>
					<td>: <?php if($peserta['status_perkawinan'] == '0'){
								$peserta['status_perkawinan'] = '';
							}
							elseif($peserta['status_perkawinan'] == '1'){
								$peserta['status_perkawinan'] = 'Belum Menikah';
							}
							elseif($peserta['status_perkawinan'] == '2'){
								$peserta['status_perkawinan'] = 'Menikah';
							}
							elseif($peserta['status_perkawinan'] == '3'){
								$peserta['status_perkawinan'] = 'Cerai';
							}
							echo $peserta['status_perkawinan'];
							?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Tempat Lahir (Kota)</td>
					<td>: <?php echo $peserta['tempat_lahir']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Tanggal Lahir</td>
					<td>: <?php if($peserta['tanggal_lahir']=='0000-00-00'){
							$peserta['tanggal_lahir'] = '';
						}
						else{
							echo $this->tanggal->tanggal_indo_monthtext($peserta['tanggal_lahir']);
						}
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Provinsi Lahir</td>
					<td>: <?php echo $peserta['provinsi_lahir']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">7. Kewarganegaraan</td>
					<td>: <?php echo $peserta['kewarganegaraan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">8. Agama</td>
					<td>: <?php echo $peserta['agama']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">9. Golongan Darah</td>
					<td>: <?php if($peserta['golongan_darah']=='0'){
						$peserta['golongan_darah'] = '';
						}
						elseif($peserta['golongan_darah'] == '1'){
							$peserta['golongan_darah'] = 'A';
						}
						elseif($peserta['golongan_darah'] == '2'){
							$peserta['golongan_darah'] = 'B';
						}
						elseif($peserta['golongan_darah'] == '3'){
							$peserta['golongan_darah'] = 'AB';
						}
						elseif($peserta['golongan_darah'] == '4'){
							$peserta['golongan_darah'] = '0';
						}
						echo $peserta['golongan_darah'];
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">10. Sumber Biaya</td>
					<td>: <?php echo $peserta['sumber_biaya']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">B. KETERANGAN TEMPAT TINGGAL ASAL SEKARANG</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Alamat Lengkap</td>
					<td>: <?php echo $peserta['alamat_lengkap']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Kota/ Kabupaten</td>
					<td>: <?php echo $peserta['kabupaten']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_tinggal']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Status Tempat Tinggal</td>
					<td>: <?php echo $peserta['status_tempat_tinggal']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Nomor HP/ Mobile</td>
					<td>: <?php echo $peserta['no_hp']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Email</td>
					<td>: <?php echo $peserta['email']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">C. KETERANGAN PENDIDIKAN</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Pendidikan S1</td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Perguruan Tinggi</td>
					<td>: <?php echo $peserta['perguruan_tinggi_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Kota</td>
					<td>: <?php echo $peserta['kota_pt_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_pt_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Jurusan</td>
					<td>: <?php echo $peserta['jurusan_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun Lulus</td>
					<td>: <?php echo $peserta['tahun_lulus_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; f. Lama Studi</td>
					<td>: <?php echo $peserta['lama_studi_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; g. No. Ijazah Universitas</td>
					<td>: <?php echo $peserta['no_ijazah_universitas_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; h. IPK</td>
					<td>: <?php echo $peserta['ipk_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; i. No. Ijazah Fakultas</td>
					<td>: <?php echo $peserta['no_ijazah_fakultas_s1']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">2. Pendidikan S2</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Perguruan Tinggi</td>
					<td>: <?php echo $peserta['perguruan_tinggi_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Kota</td>
					<td>: <?php echo $peserta['kota_pt_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_pt_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Jurusan</td>
					<td>: <?php echo $peserta['prodi_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun Lulus</td>
					<td>: <?php echo $peserta['tahun_lulus_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; f. Lama Studi</td>
					<td>: <?php echo $peserta['lama_studi_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; g. No. Ijazah Universitas</td>
					<td>: <?php echo $peserta['no_ijazah_universitas_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; h. IPK</td>
					<td>: <?php echo $peserta['ipk_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; i. No. Ijazah Fakultas</td>
					<td>: <?php echo $peserta['no_ijazah_fakultas_s2']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">3. Pendidikan S3</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Perguruan Tinggi</td>
					<td>: <?php echo $peserta['perguruan_tinggi_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Kota</td>
					<td>: <?php echo $peserta['kota_pt_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_pt_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Jurusan</td>
					<td>: <?php echo $peserta['prodi_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun Lulus</td>
					<td>: <?php echo $peserta['tahun_lulus_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; f. Lama Studi</td>
					<td>: <?php echo $peserta['lama_studi_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; g. No. Ijazah Universitas</td>
					<td>: <?php echo $peserta['no_ijazah_universitas_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; h. IPK</td>
					<td>: <?php echo $peserta['ipk_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; i. No. Ijazah Fakultas</td>
					<td>: <?php echo $peserta['no_ijazah_fakultas_s3']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">D. KETERANGAN TEMPAT BEKERJA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Jenis Pekerjaan</td>
					<td>: <?php echo $peserta['jenis_pekerjaan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Posisi/ Jabatan</td>
					<td>: <?php echo $peserta['jabatan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Nama Instansi</td>
					<td>: <?php echo $peserta['nama_instansi']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Alamat</td>
					<td>: <?php echo $peserta['alamat_instansi']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Nomor Telepon/ Fax</td>
					<td>: <?php echo $peserta['no_telepon_instansi']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Gaji Sekarang</td>
					<td>: <?php if($peserta['gaji'] == '0'){
								$peserta['gaji'] = '';
							}
							else{
								echo $peserta['gaji'];
							}
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">7. Mulai Bekerja</td>
					<td>: <?php echo $peserta['mulai_bekerja']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">8. Masa Tunggu</td>
					<td>: <?php echo $peserta['masa_tunggu']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">E. PUBLIKASI ILMIAH</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. ARTIKEL SEMINAR NASIONAL</td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Penyelenggara</td>
					<td>: <?php echo $peserta['penyelenggara_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Prosiding</td>
					<td>: <?php echo $peserta['prosiding_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Tahun</td>
					<td>: <?php echo $peserta['tahun_nasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; e. Website Link</td>
					<?php
						if($peserta['web_nasional'] == '' OR $peserta['web_nasional'] == '-'){
							echo "<td>: ".$peserta['web_nasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_nasional']." target='_blank'>".$peserta['web_nasional']."</td>";	
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">2. ARTIKEL SEMINAR INTERNASIONAL</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Penyelenggara</td>
					<td>: <?php echo $peserta['penyelenggara_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Prosiding</td>
					<td>: <?php echo $peserta['prosiding_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Tahun</td>
					<td>: <?php echo $peserta['tahun_internasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; e. Website Link</td>
					<?php
						if($peserta['web_internasional'] == '' OR $peserta['web_internasional'] == '-'){
							echo "<td>: ".$peserta['web_internasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_internasional']." target='_blank'>".$peserta['web_internasional']."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">3. ARTIKEL JURNAL NASIONAL</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_nasional'] == '' OR $peserta['web_jurnal_nasional'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_nasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_nasional']." target='_blank'>".$peserta['web_jurnal_nasional']."</td>";	
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">4. ARTIKEL JURNAL NASIONAL TERINDEKS</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_terindeks'] == '' OR $peserta['web_jurnal_terindeks'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_terindeks']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_terindeks']." target='_blank'>".$peserta['web_jurnal_terindeks']."</td>";	
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">5. ARTIKEL JURNAL INTERNASIONAL</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_internasional'] == '' OR $peserta['web_jurnal_internasional'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_internasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_internasional']." target='_blank'>".$peserta['web_jurnal_internasional']."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">6. ARTIKEL JURNAL INTERNASIONAL BEREPUTASI</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_bereputasi'] == '' OR $peserta['web_jurnal_bereputasi'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_bereputasi']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_bereputasi']." target='_blank'>".$peserta['web_jurnal_bereputasi']."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr/>
		<h2 align="center">INFORMASI KEUANGAN</h2>
		<br/>
		<table class="table table">
			<thead>
				<tr>
					<th class="th" colspan="3">B. KETERANGAN TEMPAT TINGGAL ASAL SEKARANG</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">Nama Beasiswa</td>
					<td>: <?php echo 'Beasiswa UNDIP'; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Besar Beasiswa</td>
					<td>: <?php echo 'Rp.'.$keuangan['jumlah']; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Sisa</td>
					<td>: <?php echo 'Rp.'.$keuangan['sisa']; ?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead></thead>
			<tbody>
				<tr>
					<th class="th" colspan="3">B. RINCIAN PENGGUNAAN BEASISWA</th>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Biaya Kuliah Semester 1</td>
					<td>: <?php echo 'Rp.'.$keuangan['keluar_1']; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Biaya Kuliah Semester 2</td>
					<td>: <?php echo 'Rp.'.$keuangan['keluar_2']; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Biaya Kuliah Semester 3</td>
					<td>: <?php echo 'Rp.'.$keuangan['keluar_3']; ?></td>
				</tr>
			</tbody>
		</table>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
	</div>
</div>
<?php }
	//	HALAMAN ADMIN AKADEMIK
elseif($this->session->userdata('user_type_id')=='2'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Peserta Beasiswa Pascasarjana</h1>
		<?php echo validation_errors(); ?>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2 align="center">DATA DIRI PESERTA</h2><br/>
	</div>
	<div class="col-md-12">
		<div>
		<?php
			if($peserta['terima'] == 0){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b> belum diperiksa
				<?php
			}
			elseif($peserta['terima'] == 1){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b> telah <n style="color: green; font-weight: bold">diterima</n>
				<?php
			}
			elseif($peserta['terima'] == 2){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b><n style="color: red; font-weight: bold"> tidak diterima</n>
				<?php
			}
		?>
			<span class="pull-right">
				<?php
				echo '<a class="btn btn-success" href="'.base_url().'peserta/terima/'.$peserta['username'].'" onclick="return confirm(\'Pengajuan Beasiswa Diterima?\')">
					<i class="fa fa-bookmark fa-lg">&nbsp Terima</i></a>&nbsp
					<a class="btn btn-danger" href="'.base_url().'peserta/tolak/'.$peserta['username'].'" onclick="return confirm(\'Apakah pengajuan beasiswa ditolak?\')">
					<i class="fa fa-bookmark-o fa-lg">&nbspTolak</i></a>
					<a class="btn" href="'.base_url().'peserta'.'">
					<i class="fa fa-backward fa-lg">&nbspBatal</i></a>
				';?>
			</span>
		</div>
		<br/>
	</div>
	<div class="col-md-12">
		<?php
	        if($this->session->flashdata('message_alert')){
	            echo $this->session->flashdata('message_alert');
	        }
	    ?>
	</div>
	<div class="col-md-12">
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">A. KETERANGAN TENTANG DIRI MAHASISWA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Nama Lengkap (dengan gelar)</td>
					<td>: <?php echo $peserta['nama_lengkap']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Jenis Kelamin</td>
					<td>: <?php if($peserta['jenis_kelamin'] == '1'){
								$peserta['jenis_kelamin'] = 'Laki-Laki';
							}
							else{
								$peserta['jenis_kelamin'] = 'Perempuan';
							}
							echo $peserta['jenis_kelamin']?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Status Marital</td>
					<td>: <?php if($peserta['status_perkawinan'] == '0'){
								$peserta['status_perkawinan'] = '';
							}
							elseif($peserta['status_perkawinan'] == '1'){
								$peserta['status_perkawinan'] = 'Belum Menikah';
							}
							elseif($peserta['status_perkawinan'] == '2'){
								$peserta['status_perkawinan'] = 'Menikah';
							}
							elseif($peserta['status_perkawinan'] == '3'){
								$peserta['status_perkawinan'] = 'Cerai';
							}
							echo $peserta['status_perkawinan'];
							?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Tempat Lahir (Kota)</td>
					<td>: <?php echo $peserta['tempat_lahir']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Tanggal Lahir</td>
					<td>: <?php if($peserta['tanggal_lahir']=='0000-00-00'){
							$peserta['tanggal_lahir'] = '';
						}
						else{
							echo $this->tanggal->tanggal_indo_monthtext($peserta['tanggal_lahir']);
						}
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Provinsi Lahir</td>
					<td>: <?php echo $peserta['provinsi_lahir']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">7. Kewarganegaraan</td>
					<td>: <?php echo $peserta['kewarganegaraan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">8. Agama</td>
					<td>: <?php echo $peserta['agama']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">9. Golongan Darah</td>
					<td>: <?php if($peserta['golongan_darah']=='0'){
						$peserta['golongan_darah'] = '';
						}
						elseif($peserta['golongan_darah'] == '1'){
							$peserta['golongan_darah'] = 'A';
						}
						elseif($peserta['golongan_darah'] == '2'){
							$peserta['golongan_darah'] = 'B';
						}
						elseif($peserta['golongan_darah'] == '3'){
							$peserta['golongan_darah'] = 'AB';
						}
						elseif($peserta['golongan_darah'] == '4'){
							$peserta['golongan_darah'] = '0';
						}
						echo $peserta['golongan_darah'];
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">10. Sumber Biaya</td>
					<td>: <?php echo $peserta['sumber_biaya']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">B. KETERANGAN TEMPAT TINGGAL ASAL SEKARANG</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Alamat Lengkap</td>
					<td>: <?php echo $peserta['alamat_lengkap']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Kota/ Kabupaten</td>
					<td>: <?php echo $peserta['kabupaten']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_tinggal']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Status Tempat Tinggal</td>
					<td>: <?php echo $peserta['status_tempat_tinggal']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Nomor HP/ Mobile</td>
					<td>: <?php echo $peserta['no_hp']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Email</td>
					<td>: <?php echo $peserta['email']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">C. KETERANGAN PENDIDIKAN</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Pendidikan S1</td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Perguruan Tinggi</td>
					<td>: <?php echo $peserta['perguruan_tinggi_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Kota</td>
					<td>: <?php echo $peserta['kota_pt_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_pt_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Jurusan</td>
					<td>: <?php echo $peserta['jurusan_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun Lulus</td>
					<td>: <?php echo $peserta['tahun_lulus_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; f. Lama Studi</td>
					<td>: <?php echo $peserta['lama_studi_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; g. No. Ijazah Universitas</td>
					<td>: <?php echo $peserta['no_ijazah_universitas_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; h. IPK</td>
					<td>: <?php echo $peserta['ipk_s1']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; i. No. Ijazah Fakultas</td>
					<td>: <?php echo $peserta['no_ijazah_fakultas_s1']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">2. Pendidikan S2</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Perguruan Tinggi</td>
					<td>: <?php echo $peserta['perguruan_tinggi_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Kota</td>
					<td>: <?php echo $peserta['kota_pt_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_pt_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Jurusan</td>
					<td>: <?php echo $peserta['prodi_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun Lulus</td>
					<td>: <?php echo $peserta['tahun_lulus_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; f. Lama Studi</td>
					<td>: <?php echo $peserta['lama_studi_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; g. No. Ijazah Universitas</td>
					<td>: <?php echo $peserta['no_ijazah_universitas_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; h. IPK</td>
					<td>: <?php echo $peserta['ipk_s2']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; i. No. Ijazah Fakultas</td>
					<td>: <?php echo $peserta['no_ijazah_fakultas_s2']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">3. Pendidikan S3</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Perguruan Tinggi</td>
					<td>: <?php echo $peserta['perguruan_tinggi_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Kota</td>
					<td>: <?php echo $peserta['kota_pt_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_pt_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Jurusan</td>
					<td>: <?php echo $peserta['prodi_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun Lulus</td>
					<td>: <?php echo $peserta['tahun_lulus_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; f. Lama Studi</td>
					<td>: <?php echo $peserta['lama_studi_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; g. No. Ijazah Universitas</td>
					<td>: <?php echo $peserta['no_ijazah_universitas_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; h. IPK</td>
					<td>: <?php echo $peserta['ipk_s3']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; i. No. Ijazah Fakultas</td>
					<td>: <?php echo $peserta['no_ijazah_fakultas_s3']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">D. KETERANGAN TEMPAT BEKERJA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Jenis Pekerjaan</td>
					<td>: <?php echo $peserta['jenis_pekerjaan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Posisi/ Jabatan</td>
					<td>: <?php echo $peserta['jabatan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Nama Instansi</td>
					<td>: <?php echo $peserta['nama_instansi']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Alamat</td>
					<td>: <?php echo $peserta['alamat_instansi']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Nomor Telepon/ Fax</td>
					<td>: <?php echo $peserta['no_telepon_instansi']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Gaji Sekarang</td>
					<td>: <?php if($peserta['gaji'] == '0'){
								$peserta['gaji'] = '';
							}
							else{
								echo $peserta['gaji'];
							}
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">7. Mulai Bekerja</td>
					<td>: <?php echo $peserta['mulai_bekerja']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">8. Masa Tunggu</td>
					<td>: <?php echo $peserta['masa_tunggu']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">E. PUBLIKASI ILMIAH</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. ARTIKEL SEMINAR NASIONAL</td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Penyelenggara</td>
					<td>: <?php echo $peserta['penyelenggara_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Prosiding</td>
					<td>: <?php echo $peserta['prosiding_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Tahun</td>
					<td>: <?php echo $peserta['tahun_nasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; e. Website Link</td>
					<?php
						if($peserta['web_nasional'] == '' OR $peserta['web_nasional'] == '-'){
							echo "<td>: ".$peserta['web_nasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_nasional']." target='_blank'>".$peserta['web_nasional']."</td>";	
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">2. ARTIKEL SEMINAR INTERNASIONAL</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Penyelenggara</td>
					<td>: <?php echo $peserta['penyelenggara_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Prosiding</td>
					<td>: <?php echo $peserta['prosiding_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Tahun</td>
					<td>: <?php echo $peserta['tahun_internasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; e. Website Link</td>
					<?php
						if($peserta['web_internasional'] == '' OR $peserta['web_internasional'] == '-'){
							echo "<td>: ".$peserta['web_internasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_internasional']." target='_blank'>".$peserta['web_internasional']."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">3. ARTIKEL JURNAL NASIONAL</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_nasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_nasional'] == '' OR $peserta['web_jurnal_nasional'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_nasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_nasional']." target='_blank'>".$peserta['web_jurnal_nasional']."</td>";	
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">4. ARTIKEL JURNAL NASIONAL TERINDEKS</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_terindeks']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_terindeks'] == '' OR $peserta['web_jurnal_terindeks'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_terindeks']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_terindeks']." target='_blank'>".$peserta['web_jurnal_terindeks']."</td>";	
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">5. ARTIKEL JURNAL INTERNASIONAL</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_internasional']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_internasional'] == '' OR $peserta['web_jurnal_internasional'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_internasional']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_internasional']." target='_blank'>".$peserta['web_jurnal_internasional']."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">6. ARTIKEL JURNAL INTERNASIONAL BEREPUTASI</td>
					<td></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; a. Judul</td>
					<td>: <?php echo $peserta['judul_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; b. Pengarang</td>
					<td>: <?php echo $peserta['pengarang_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; c. Nama Jurnal</td>
					<td>: <?php echo $peserta['nama_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; d. Volume/ No</td>
					<td>: <?php echo $peserta['volume_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td>&nbsp; &nbsp; e. Tahun</td>
					<td>: <?php echo $peserta['tahun_jurnal_bereputasi']?></td>
				</tr>
				<tr>
					<td style="font-style: italic;"s>&nbsp; &nbsp; f. Website Link</td>
					<?php
						if($peserta['web_jurnal_bereputasi'] == '' OR $peserta['web_jurnal_bereputasi'] == '-'){
							echo "<td>: ".$peserta['web_jurnal_bereputasi']."</td>";
						}
						else{
							echo "<td>: <a href=".$peserta['web_jurnal_bereputasi']." target='_blank'>".$peserta['web_jurnal_bereputasi']."</td>";
						}
					?>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php }
	//	HALAMAN ADMIN KEUANGAN
elseif($this->session->userdata('user_type_id')=='3'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Peserta Beasiswa Pascasarjana</h1>
		<?php echo validation_errors(); ?>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h2 align="center">DATA DIRI PESERTA</h2>
		<br/>
	</div>
	<div class="col-md-12">
		<div>
		<?php
			if($peserta['terima'] == 0){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b> belum diperiksa
				<?php
			}
			elseif($peserta['terima'] == 1){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b> telah <n style="color: green; font-weight: bold">diterima</n>
				<?php
			}
			elseif($peserta['terima'] == 2){
				?>
					Peserta Beasiswa <b><?php echo $peserta['nama_lengkap']; ?></b><n style="color: red; font-weight: bold"> tidak diterima</n>
				<?php
			}
		?>
			<!-- <span class="pull-right">
				<?php echo '<a style="background-color: gold; border-color: gold; color: black" href="'.base_url().'peserta/terima/'.$peserta['username'].'" class="btn btn-default" onclick="return confirm(\'Pengajuan Beasiswa Diterima?\')">Terima</a>'?>
				<?php echo '<a style="background-color: black; border-color: black; color: white" href="'.base_url().'peserta/tolak/'.$peserta['username'].'" class="btn btn-default" onclick="return confirm(\'Apakah pengajuan beasiswa ditolak?\')">Tolak</a>'?>
				<a href="<?php echo base_url().'peserta'; ?>" class="btn btn-default">Batal</a>
			</span> -->
		</div>
		<br/>
	</div>
	<div class="col-md-12">
		<?php
	        if($this->session->flashdata('message_alert')){
	            echo $this->session->flashdata('message_alert');
	        }
	    ?>
	</div>
	<div class="col-md-12">
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">A. KETERANGAN TENTANG DIRI MAHASISWA</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Nama Lengkap (dengan gelar)</td>
					<td>: <?php echo $peserta['nama_lengkap']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Jenis Kelamin</td>
					<td>: <?php if($peserta['jenis_kelamin'] == '1'){
								$peserta['jenis_kelamin'] = 'Laki-Laki';
							}
							else{
								$peserta['jenis_kelamin'] = 'Perempuan';
							}
							echo $peserta['jenis_kelamin']?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Status Marital</td>
					<td>: <?php if($peserta['status_perkawinan'] == '0'){
								$peserta['status_perkawinan'] = '';
							}
							elseif($peserta['status_perkawinan'] == '1'){
								$peserta['status_perkawinan'] = 'Belum Menikah';
							}
							elseif($peserta['status_perkawinan'] == '2'){
								$peserta['status_perkawinan'] = 'Menikah';
							}
							elseif($peserta['status_perkawinan'] == '3'){
								$peserta['status_perkawinan'] = 'Cerai';
							}
							echo $peserta['status_perkawinan'];
							?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Tempat Lahir (Kota)</td>
					<td>: <?php echo $peserta['tempat_lahir']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Tanggal Lahir</td>
					<td>: <?php if($peserta['tanggal_lahir']=='0000-00-00'){
							$peserta['tanggal_lahir'] = '';
						}
						else{
							echo $this->tanggal->tanggal_indo_monthtext($peserta['tanggal_lahir']);
						}
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Provinsi Lahir</td>
					<td>: <?php echo $peserta['provinsi_lahir']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">7. Kewarganegaraan</td>
					<td>: <?php echo $peserta['kewarganegaraan']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">8. Agama</td>
					<td>: <?php echo $peserta['agama']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">9. Golongan Darah</td>
					<td>: <?php if($peserta['golongan_darah']=='0'){
						$peserta['golongan_darah'] = '';
						}
						elseif($peserta['golongan_darah'] == '1'){
							$peserta['golongan_darah'] = 'A';
						}
						elseif($peserta['golongan_darah'] == '2'){
							$peserta['golongan_darah'] = 'B';
						}
						elseif($peserta['golongan_darah'] == '3'){
							$peserta['golongan_darah'] = 'AB';
						}
						elseif($peserta['golongan_darah'] == '4'){
							$peserta['golongan_darah'] = '0';
						}
						echo $peserta['golongan_darah'];
						?>
					</td>
				</tr>
				<tr>
					<td style="font-weight: bold">10. Sumber Biaya</td>
					<td>: <?php echo $peserta['sumber_biaya']?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead>
				<tr>
					<th colspan="3">B. KETERANGAN TEMPAT TINGGAL ASAL SEKARANG</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">1. Alamat Lengkap</td>
					<td>: <?php echo $peserta['alamat_lengkap']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">2. Kota/ Kabupaten</td>
					<td>: <?php echo $peserta['kabupaten']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">3. Provinsi</td>
					<td>: <?php echo $peserta['provinsi_tinggal']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">4. Status Tempat Tinggal</td>
					<td>: <?php echo $peserta['status_tempat_tinggal']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">5. Nomor HP/ Mobile</td>
					<td>: <?php echo $peserta['no_hp']?></td>
				</tr>
				<tr>
					<td style="font-weight: bold">6. Email</td>
					<td>: <?php echo $peserta['email']?></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<hr/>
		<h2 align="center">INFORMASI KEUANGAN</h2>
		<br/>
		<table class="table table">
			<thead>
				<tr>
					<th class="th" colspan="3">B. KETERANGAN TEMPAT TINGGAL ASAL SEKARANG</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 380px; font-weight: bold">Nama Beasiswa</td>
					<td>: <?php echo 'Beasiswa UNDIP'; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Besar Beasiswa</td>
					<td>: <?php echo 'Rp.'.$keuangan['jumlah']; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Sisa</td>
					<td>: <?php echo 'Rp.'.$keuangan['sisa']; ?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table">
			<thead></thead>
			<tbody>
				<tr>
					<th class="th" colspan="3">B. RINCIAN PENGGUNAAN BEASISWA</th>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Biaya Kuliah Semester 1</td>
					<td>: <?php echo 'Rp.'.$keuangan['keluar_1']; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Biaya Kuliah Semester 2</td>
					<td>: <?php echo 'Rp.'.$keuangan['keluar_2']; ?></td>
				</tr>
				<tr>
					<td style="width: 380px; font-weight: bold">Biaya Kuliah Semester 3</td>
					<td>: <?php echo 'Rp.'.$keuangan['keluar_3']; ?></td>
				</tr>
			</tbody>
		</table>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
	</div>
</div>
<?php }
else{?>
	<h3>Peserta Beasiswa dimohon login terlebih dahulu</h3>
<?php }?>
<style type="text/css">
	.th{
		background-color: black;
	}
</style>


<!-- <?php echo '<a style="background-color: gold; border-color: gold; color: black" href="'.base_url().'peserta/terima/'.$peserta['username'].'" class="btn btn-default" onclick="return confirm(\'Pengajuan Beasiswa Diterima?\')">Terima</a>'?>
<?php echo '<a style="background-color: black; border-color: black; color: white" href="'.base_url().'peserta/tolak/'.$peserta['username'].'" class="btn btn-default" onclick="return confirm(\'Apakah pengajuan beasiswa ditolak?\')">Tolak</a>'?>
<a href="<?php echo base_url().'peserta'; ?>" class="btn btn-default">Batal</a> -->
<!-- <a style="background-color: gold; border-color: gold; color: black" href="'.base_url().'peserta/terima/'.$peserta['username'].'" class="btn btn-default" onclick="return confirm(\'Pengajuan Beasiswa Diterima?\')">Terima</a>
<a style="background-color: black; border-color: black; color: white" href="'.base_url().'peserta/tolak/'.$peserta['username'].'" class="btn btn-default" onclick="return confirm(\'Apakah pengajuan beasiswa ditolak?\')">Tolak</a> -->