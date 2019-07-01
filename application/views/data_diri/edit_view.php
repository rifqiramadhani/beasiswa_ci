<?php
	if($this->session->userdata('user_type_id')=='99'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Ubah Data Diri</h1>
		<hr/>
		<?php echo validation_errors(); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
        <?php
            if($this->session->flashdata('message_alert')){
                echo $this->session->flashdata('message_alert');
            }
        ?>
		<form class="form-horizontal" role="form" method="POST" action="">
			<div class="col-md-12 edit_header">
				<H4>A. KETERANGAN TENTANG DIRI MAHASISWA</H4>
			</div>
			<div class="form-group">
				<label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required="required" placeholder="Nama Lengkap" value="<?php echo $data_diri['nama_lengkap']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
				<div class="col-sm-6">
					<label class="radio-inline">
						<input type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="1" <?php echo $jenis_kelamin[1]; ?>> Laki-laki
					</label>
					<label class="radio-inline">
						<input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="2" <?php echo $jenis_kelamin[2]; ?>> Perempuan
					</label>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="status_perkawinan" class="col-sm-3 control-label">Status Marital</label>
				<div class="col-sm-3">
					<?php echo $status_perkawinan; ?>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir (Kota)</label>
				<div class="col-sm-6">
					<input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required="required" placeholder="Tempat Lahir" value="<?php echo $data_diri['tempat_lahir']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
				<div class="col-sm-3">
					<input type="text" name="tanggal_lahir" class="form-control date tanggal_lahir" id="tanggal_lahir" data-date-format="DD/MM/YYYY" required="required" placeholder="dd/mm/yyyy" value="<?php echo $this->tanggal->tanggal_indo($data_diri['tanggal_lahir']); ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="provinsi_lahir" class="col-sm-3 control-label">Provinsi Lahir</label>
				<div class="col-sm-6">
					<input type="text" name="provinsi_lahir" class="form-control" id="provinsi_lahir" required="required" placeholder="Provinsi Lahir" value="<?php echo $data_diri['provinsi_lahir']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="kewarganegaraan" class="col-sm-3 control-label">Kewarganegaraan</label>
				<div class="col-sm-6">
					<input type="text" name="kewarganegaraan" class="form-control" id="kewarganegaraan" required="required" placeholder="Kewarganegaraan" value="<?php echo $data_diri['kewarganegaraan']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="agama" class="col-sm-3 control-label">Agama</label>
				<div class="col-sm-6">
					<input type="text" name="agama" class="form-control" id="agama" placeholder="Agama" value="<?php echo $data_diri['agama']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="golongan_darah" class="col-sm-3 control-label">Golongan Darah</label>
				<div class="col-sm-3">
					<?php echo $golongan_darah; ?>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="sumber_biaya" class="col-sm-3 control-label">Sumber Biaya</label>
				<div class="col-sm-6">
					<input type="text" name="sumber_biaya" class="form-control" id="sumber_biaya" required="required" placeholder="Sumber Biaya" value="<?php echo $data_diri['sumber_biaya']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12 edit_header">
				<H4>B. KETERANGAN TEMPAT TINGGAL ASAL SEKARANG</H4>
			</div>
			<div class="form-group">
				<label for="alamat_lengkap" class="col-sm-3 control-label">Alamat Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="alamat_lengkap" class="form-control" id="alamat_lengkap" required="required" placeholder="Alamat Lengkap" value="<?php echo $data_diri['alamat_lengkap']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="kabupaten" class="col-sm-3 control-label">Kabupaten</label>
				<div class="col-sm-6">
					<input type="text" name="kabupaten" class="form-control" id="kabupaten" required="required" placeholder="Kabupaten" value="<?php echo $data_diri['kabupaten']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="provinsi_tinggal" class="col-sm-3 control-label">Provinsi Tinggal</label>
				<div class="col-sm-6">
					<input type="text" name="provinsi_tinggal" class="form-control" id="provinsi_tinggal" required="required" placeholder="Provinsi Tinggal" value="<?php echo $data_diri['provinsi_tinggal']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="status_tempat_tinggal" class="col-sm-3 control-label">Status Tempat Tinggal</label>
				<div class="col-sm-6">
					<input type="text" name="status_tempat_tinggal" class="form-control" id="status_tempat_tinggal" required="required" placeholder="Status Tempat Tinggal" value="<?php echo $data_diri['status_tempat_tinggal']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_hp" class="col-sm-3 control-label">Nomor Hp/ Mobile</label>
				<div class="col-sm-6">
					<input type="text" name="no_hp" class="form-control" id="no_hp" required="required" placeholder="Nomor Hp" value="<?php echo $data_diri['no_hp']; ?>" pattern="[0-9]{12,13}">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-6">
					<input type="text" name="email" class="form-control" id="email" required="required" placeholder="Email" value="<?php echo $data_diri['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12 edit_header">
				<H4>C. KETERANGAN PENDIDIKAN</H4>
			</div>
			<div class="col-md-12">
				<H4 class="H4_custom">1. Pendidikan S1</H4>
			</div>
			<div class="form-group">
				<label for="perguruan_tinggi_s1" class="col-sm-3 control-label">Perguruan Tinggi</label>
				<div class="col-sm-6">
					<input type="text" name="perguruan_tinggi_s1" class="form-control" id="perguruan_tinggi_s1" required="required" placeholder="Perguruan Tinggi" value="<?php echo $data_diri['perguruan_tinggi_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="kota_pt_s1" class="col-sm-3 control-label">Kota</label>
				<div class="col-sm-6">
					<input type="text" name="kota_pt_s1" class="form-control" id="kota_pt_s1" required="required" placeholder="Kota" value="<?php echo $data_diri['kota_pt_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="provinsi_pt_s1" class="col-sm-3 control-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" name="provinsi_pt_s1" class="form-control" id="provinsi_pt_s1" required="required" placeholder="Provinsi" value="<?php echo $data_diri['provinsi_pt_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="jurusan_s1" class="col-sm-3 control-label">Jurusan</label>
				<div class="col-sm-6">
					<input type="text" name="jurusan_s1" class="form-control" id="jurusan_s1" required="required" placeholder="Jurusan" value="<?php echo $data_diri['jurusan_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_lulus_s1" class="col-sm-3 control-label">Tahun Lulus</label>
				<div class="col-sm-6">
					<input type="text" name="tahun_lulus_s1" class="form-control" id="tahun_lulus_s1" required="required" placeholder="Tahun Lulus" value="<?php echo $data_diri['tahun_lulus_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="lama_studi_s1" class="col-sm-3 control-label">Lama Studi</label>
				<div class="col-sm-6">
					<input type="text" name="lama_studi_s1" class="form-control" id="lama_studi_s1" required="required" placeholder="00 Tahun 00 Bulan" value="<?php echo $data_diri['lama_studi_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_ijazah_universitas_s1" class="col-sm-3 control-label">No. Ijazah Universitas</label>
				<div class="col-sm-6">
					<input type="text" name="no_ijazah_universitas_s1" class="form-control" id="no_ijazah_universitas_s1" required="required" placeholder="Nomor Ijazah Universitas" value="<?php echo $data_diri['no_ijazah_universitas_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="ipk_s1" class="col-sm-3 control-label">IPK</label>
				<div class="col-sm-1">
					<input type="text" name="ipk_s1" class="form-control" id="ipk_s1" required="required" placeholder="IPK" value="<?php echo $data_diri['ipk_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_ijazah_fakultas_s1" class="col-sm-3 control-label">No. Ijazah Fakultas</label>
				<div class="col-sm-6">
					<input type="text" name="no_ijazah_fakultas_s1" class="form-control" id="no_ijazah_fakultas_s1" required="required" placeholder="Nomor Ijazah Fakultas" value="<?php echo $data_diri['no_ijazah_fakultas_s1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">2. Pendidikan S2</H4>
			</div>
			<div class="form-group">
				<label for="perguruan_tinggi_s2" class="col-sm-3 control-label">Perguruan Tinggi</label>
				<div class="col-sm-6">
					<input type="text" name="perguruan_tinggi_s2" class="form-control" id="perguruan_tinggi_s2" placeholder="Perguruan Tinggi" value="<?php echo $data_diri['perguruan_tinggi_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="kota_pt_s2" class="col-sm-3 control-label">Kota</label>
				<div class="col-sm-6">
					<input type="text" name="kota_pt_s2" class="form-control" id="kota_pt_s2" placeholder="Kota" value="<?php echo $data_diri['kota_pt_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="provinsi_pt_s2" class="col-sm-3 control-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" name="provinsi_pt_s2" class="form-control" id="provinsi_pt_s2" placeholder="Provinsi" value="<?php echo $data_diri['provinsi_pt_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="prodi_s2" class="col-sm-3 control-label">Program Studi</label>
				<div class="col-sm-6">
					<input type="text" name="prodi_s2" class="form-control" id="prodi_s2" placeholder="Program Studi" value="<?php echo $data_diri['prodi_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_lulus_s2" class="col-sm-3 control-label">Tahun Lulus</label>
				<div class="col-sm-6">
					<input type="text" name="tahun_lulus_s2" class="form-control" id="tahun_lulus_s2" placeholder="Tahun Lulus" value="<?php echo $data_diri['tahun_lulus_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="lama_studi_s2" class="col-sm-3 control-label">Lama Studi</label>
				<div class="col-sm-6">
					<input type="text" name="lama_studi_s2" class="form-control" id="lama_studi_s2" placeholder="00 Tahun 00 Bulan" value="<?php echo $data_diri['lama_studi_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_ijazah_universitas_s2" class="col-sm-3 control-label">No. Ijazah Universitas</label>
				<div class="col-sm-6">
					<input type="text" name="no_ijazah_universitas_s2" class="form-control" id="no_ijazah_universitas_s2" placeholder="Nomor Ijazah Universitas" value="<?php echo $data_diri['no_ijazah_universitas_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="ipk_s2" class="col-sm-3 control-label">IPK</label>
				<div class="col-sm-1">
					<input type="text" name="ipk_s2" class="form-control" id="ipk_s2" placeholder="IPK" value="<?php echo $data_diri['ipk_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_ijazah_fakultas_s2" class="col-sm-3 control-label">No. Ijazah Fakultas</label>
				<div class="col-sm-6">
					<input type="text" name="no_ijazah_fakultas_s2" class="form-control" id="no_ijazah_fakultas_s2" placeholder="Nomor Ijazah Fakultas" value="<?php echo $data_diri['no_ijazah_fakultas_s2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">3. Pendidikan S3</H4>
			</div>
			<div class="form-group">
				<label for="perguruan_tinggi_s3" class="col-sm-3 control-label">Perguruan Tinggi</label>
				<div class="col-sm-6">
					<input type="text" name="perguruan_tinggi_s3" class="form-control" id="perguruan_tinggi_s3" placeholder="Perguruan Tinggi" value="<?php echo $data_diri['perguruan_tinggi_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="kota_pt_s3" class="col-sm-3 control-label">Kota</label>
				<div class="col-sm-6">
					<input type="text" name="kota_pt_s3" class="form-control" id="kota_pt_s3" placeholder="Kota" value="<?php echo $data_diri['kota_pt_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="provinsi_pt_s3" class="col-sm-3 control-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" name="provinsi_pt_s3" class="form-control" id="provinsi_pt_s3" placeholder="Provinsi" value="<?php echo $data_diri['provinsi_pt_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="prodi_s3" class="col-sm-3 control-label">Program Studi</label>
				<div class="col-sm-6">
					<input type="text" name="prodi_s3" class="form-control" id="prodi_s3" placeholder="Program Studi" value="<?php echo $data_diri['prodi_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_lulus_s3" class="col-sm-3 control-label">Tahun Lulus</label>
				<div class="col-sm-6">
					<input type="text" name="tahun_lulus_s3" class="form-control" id="tahun_lulus_s3" placeholder="Tahun Lulus" value="<?php echo $data_diri['tahun_lulus_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="lama_studi_s3" class="col-sm-3 control-label">Lama Studi</label>
				<div class="col-sm-6">
					<input type="text" name="lama_studi_s3" class="form-control" id="lama_studi_s3" placeholder="00 Tahun 00 Bulan" value="<?php echo $data_diri['lama_studi_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_ijazah_universitas_s3" class="col-sm-3 control-label">No. Ijazah Universitas</label>
				<div class="col-sm-6">
					<input type="text" name="no_ijazah_universitas_s3" class="form-control" id="no_ijazah_universitas_s3" placeholder="Nomor Ijazah Universitas" value="<?php echo $data_diri['no_ijazah_universitas_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="ipk_s3" class="col-sm-3 control-label">IPK</label>
				<div class="col-sm-1">
					<input type="text" name="ipk_s3" class="form-control" id="ipk_s3" placeholder="IPK" value="<?php echo $data_diri['ipk_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_ijazah_fakultas_s3" class="col-sm-3 control-label">No. Ijazah Fakultas</label>
				<div class="col-sm-6">
					<input type="text" name="no_ijazah_fakultas_s3" class="form-control" id="no_ijazah_fakultas_s3" placeholder="Nomor Ijazah Fakultas" value="<?php echo $data_diri['no_ijazah_fakultas_s3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12 edit_header">
				<H4>D. KETERANGAN TEMPAT BEKERJA</H4>
			</div>
			<div class="form-group">
				<label for="jenis_pekerjaan" class="col-sm-3 control-label">Jenis Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" name="jenis_pekerjaan" class="form-control" id="jenis_pekerjaan" placeholder="Jenis Pekerjaan" value="<?php echo $data_diri['jenis_pekerjaan']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
				<div class="col-sm-6">
					<input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" value="<?php echo $data_diri['jabatan']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="nama_instansi" class="col-sm-3 control-label">Nama Instansi</label>
				<div class="col-sm-6">
					<input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="Nama Instansi" value="<?php echo $data_diri['nama_instansi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="alamat_instansi" class="col-sm-3 control-label">Alamat Instansi</label>
				<div class="col-sm-6">
					<input type="text" name="alamat_instansi" class="form-control" id="alamat_instansi" placeholder="Alamat Instansi" value="<?php echo $data_diri['alamat_instansi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="no_telepon_instansi" class="col-sm-3 control-label">Nomor Telepon/ Fax</label>
				<div class="col-sm-6">
					<input type="text" name="no_telepon_instansi" class="form-control" id="no_telepon_instansi" placeholder="Nomor Telepon/ Fax" value="<?php echo $data_diri['no_telepon_instansi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="gaji" class="col-sm-3 control-label">Gaji</label>
				<div class="col-sm-6">
					<input type="text" name="gaji" class="form-control" id="gaji" placeholder="Gaji" value="<?php echo $data_diri['gaji']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="mulai_bekerja" class="col-sm-3 control-label">Mulai Bekerja</label>
				<div class="col-sm-6">
					<input type="text" name="mulai_bekerja" class="form-control" id="mulai_bekerja" placeholder="Bulan Tahun" value="<?php echo $data_diri['mulai_bekerja']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="masa_tunggu" class="col-sm-3 control-label">Masa Tunggu</label>
				<div class="col-sm-6">
					<input type="text" name="masa_tunggu" class="form-control" id="masa_tunggu" placeholder="Masa Tunggu" value="<?php echo $data_diri['masa_tunggu']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12 edit_header">
				<H4>E. PUBLIKASI ILMIAH</H4>
			</div>
			<div class="col-md-12">
				<H4 class="H4_custom">1. ARTIKEL SEMINAR NASIONAL</H4>
			</div>
			<div class="form-group">
				<label for="judul_nasional" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" name="judul_nasional" class="form-control" id="judul_nasional" placeholder="Judul Artikel Ilmiah Nasional" value="<?php echo $data_diri['judul_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="penyelenggara_nasional" class="col-sm-3 control-label">Penyelenggara</label>
				<div class="col-sm-6">
					<input type="text" name="penyelenggara_nasional" class="form-control" id="penyelenggara_nasional" placeholder="Penyelenggara" value="<?php echo $data_diri['penyelenggara_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="prosiding_nasional" class="col-sm-3 control-label">Nama Prosiding Nasional</label>
				<div class="col-sm-6">
					<input type="text" name="prosiding_nasional" class="form-control" id="prosiding_nasional" placeholder="Nama Prosiding Nasional" value="<?php echo $data_diri['prosiding_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_nasional" class="col-sm-3 control-label">Tahun</label>
				<div class="col-sm-1">
					<input type="text" name="tahun_nasional" class="form-control" id="tahun_nasional" placeholder="Tahun" value="<?php echo $data_diri['tahun_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="web_nasional" class="col-sm-3 control-label" style="font-style: italic;">Website Link</label>
				<div class="col-sm-6">
					<input type="text" name="web_nasional" class="form-control" id="web_nasional" placeholder="Tautan" value="<?php echo $data_diri['web_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">2. ARTIKEL SEMINAR INTERNASIONAL</H4>
			</div>
			<div class="form-group">
				<label for="judul_internasional" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" name="judul_internasional" class="form-control" id="judul_internasional" placeholder="Judul Artikel Ilmiah Internasional" value="<?php echo $data_diri['judul_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="penyelenggara_internasional" class="col-sm-3 control-label">Penyelenggara</label>
				<div class="col-sm-6">
					<input type="text" name="penyelenggara_internasional" class="form-control" id="penyelenggara_internasional" placeholder="Penyelenggara" value="<?php echo $data_diri['penyelenggara_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="prosiding_internasional" class="col-sm-3 control-label">Nama Prosiding Internasional</label>
				<div class="col-sm-6">
					<input type="text" name="prosiding_internasional" class="form-control" id="prosiding_internasional" placeholder="Nama Prosiding Internasional" value="<?php echo $data_diri['prosiding_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_internasional" class="col-sm-3 control-label">Tahun</label>
				<div class="col-sm-1">
					<input type="text" name="tahun_internasional" class="form-control" id="tahun_internasional" placeholder="Tahun" value="<?php echo $data_diri['tahun_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="web_internasional" class="col-sm-3 control-label" style="font-style: italic;">Website Link</label>
				<div class="col-sm-6">
					<input type="text" name="web_internasional" class="form-control" id="web_internasional" placeholder="Tautan" value="<?php echo $data_diri['web_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">3. ARTIKEL JURNAL NASIONAL</H4>
			</div>
			<div class="form-group">
				<label for="judul_jurnal_nasional" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" name="judul_jurnal_nasional" class="form-control" id="judul_jurnal_nasional" placeholder="Judul Jurnal Nasional" value="<?php echo $data_diri['judul_jurnal_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="pengarang_jurnal_nasional" class="col-sm-3 control-label">Pengarang</label>
				<div class="col-sm-6">
					<input type="text" name="pengarang_jurnal_nasional" class="form-control" id="pengarang_jurnal_nasional" placeholder="Nama Pengarang Jurnal" value="<?php echo $data_diri['pengarang_jurnal_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="nama_jurnal_nasional" class="col-sm-3 control-label">Nama Jurnal</label>
				<div class="col-sm-6">
					<input type="text" name="nama_jurnal_nasional" class="form-control" id="nama_jurnal_nasional" placeholder="Nama Jurnal" value="<?php echo $data_diri['nama_jurnal_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="volume_jurnal_nasional" class="col-sm-3 control-label">Volume/ No</label>
				<div class="col-sm-6">
					<input type="text" name="volume_jurnal_nasional" class="form-control" id="volume_jurnal_nasional" placeholder="Volume/ No Jurnal" value="<?php echo $data_diri['volume_jurnal_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_jurnal_nasional" class="col-sm-3 control-label">Tahun</label>
				<div class="col-sm-1">
					<input type="text" name="tahun_jurnal_nasional" class="form-control" id="tahun_jurnal_nasional" placeholder="Tahun" value="<?php echo $data_diri['tahun_jurnal_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="web_jurnal_nasional" class="col-sm-3 control-label" style="font-style: italic;">Website Link</label>
				<div class="col-sm-6">
					<input type="text" name="web_jurnal_nasional" class="form-control" id="web_jurnal_nasional" placeholder="Tautan" value="<?php echo $data_diri['web_jurnal_nasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">4. ARTIKEL JURNAL NASIONAL TERINDEKS</H4>
			</div>
			<div class="form-group">
				<label for="judul_jurnal_terindeks" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" name="judul_jurnal_terindeks" class="form-control" id="judul_jurnal_terindeks" placeholder="Judul Jurnal Nasional Terindeks" value="<?php echo $data_diri['judul_jurnal_terindeks']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="pengarang_jurnal_terindeks" class="col-sm-3 control-label">Pengarang</label>
				<div class="col-sm-6">
					<input type="text" name="pengarang_jurnal_terindeks" class="form-control" id="pengarang_jurnal_terindeks" placeholder="Nama Pengarang Jurnal" value="<?php echo $data_diri['pengarang_jurnal_terindeks']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="nama_jurnal_terindeks" class="col-sm-3 control-label">Nama Jurnal</label>
				<div class="col-sm-6">
					<input type="text" name="nama_jurnal_terindeks" class="form-control" id="nama_jurnal_terindeks" placeholder="Nama Jurnal" value="<?php echo $data_diri['nama_jurnal_terindeks']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="volume_jurnal_terindeks" class="col-sm-3 control-label">Volume/ No</label>
				<div class="col-sm-6">
					<input type="text" name="volume_jurnal_terindeks" class="form-control" id="volume_jurnal_terindeks" placeholder="Volume/ No Jurnal" value="<?php echo $data_diri['volume_jurnal_terindeks']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_jurnal_terindeks" class="col-sm-3 control-label">Tahun</label>
				<div class="col-sm-1">
					<input type="text" name="tahun_jurnal_terindeks" class="form-control" id="tahun_jurnal_terindeks" placeholder="Tahun" value="<?php echo $data_diri['tahun_jurnal_terindeks']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="web_jurnal_terindeks" class="col-sm-3 control-label" style="font-style: italic;">Website Link</label>
				<div class="col-sm-6">
					<input type="text" name="web_jurnal_terindeks" class="form-control" id="web_jurnal_terindeks" placeholder="Tautan" value="<?php echo $data_diri['web_jurnal_terindeks']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">5. ARTIKEL JURNAL INTERNASIONAL</H4>
			</div>
			<div class="form-group">
				<label for="judul_jurnal_internasional" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" name="judul_jurnal_internasional" class="form-control" id="judul_jurnal_internasional" placeholder="Judul Jurnal Internasional" value="<?php echo $data_diri['judul_jurnal_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="pengarang_jurnal_internasional" class="col-sm-3 control-label">Pengarang</label>
				<div class="col-sm-6">
					<input type="text" name="pengarang_jurnal_internasional" class="form-control" id="pengarang_jurnal_internasional" placeholder="Nama Pengarang Jurnal" value="<?php echo $data_diri['pengarang_jurnal_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="nama_jurnal_internasional" class="col-sm-3 control-label">Nama Jurnal</label>
				<div class="col-sm-6">
					<input type="text" name="nama_jurnal_internasional" class="form-control" id="nama_jurnal_internasional" placeholder="Nama Jurnal" value="<?php echo $data_diri['nama_jurnal_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="volume_jurnal_internasional" class="col-sm-3 control-label">Volume/ No</label>
				<div class="col-sm-6">
					<input type="text" name="volume_jurnal_internasional" class="form-control" id="volume_jurnal_internasional" placeholder="Volume/ No Jurnal" value="<?php echo $data_diri['volume_jurnal_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_jurnal_internasional" class="col-sm-3 control-label">Tahun</label>
				<div class="col-sm-1">
					<input type="text" name="tahun_jurnal_internasional" class="form-control" id="tahun_jurnal_internasional" placeholder="Tahun" value="<?php echo $data_diri['tahun_jurnal_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="web_jurnal_internasional" class="col-sm-3 control-label" style="font-style: italic;">Website Link</label>
				<div class="col-sm-6">
					<input type="text" name="web_jurnal_internasional" class="form-control" id="web_jurnal_internasional" placeholder="Tautan" value="<?php echo $data_diri['web_jurnal_internasional']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<hr>
			<div class="col-md-12">
				<H4 class="H4_custom">6. ARTIKEL JURNAL INTERNASIONAL BEREPUTASI</H4>
			</div>
			<div class="form-group">
				<label for="judul_jurnal_bereputasi" class="col-sm-3 control-label">Judul</label>
				<div class="col-sm-6">
					<input type="text" name="judul_jurnal_bereputasi" class="form-control" id="judul_jurnal_bereputasi" placeholder="Judul Jurnal Internasional Bereputasi" value="<?php echo $data_diri['judul_jurnal_bereputasi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="pengarang_jurnal_bereputasi" class="col-sm-3 control-label">Pengarang</label>
				<div class="col-sm-6">
					<input type="text" name="pengarang_jurnal_bereputasi" class="form-control" id="pengarang_jurnal_bereputasi" placeholder="Nama Pengarang Jurnal" value="<?php echo $data_diri['pengarang_jurnal_bereputasi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="nama_jurnal_bereputasi" class="col-sm-3 control-label">Nama Jurnal</label>
				<div class="col-sm-6">
					<input type="text" name="nama_jurnal_bereputasi" class="form-control" id="nama_jurnal_bereputasi" placeholder="Nama Jurnal" value="<?php echo $data_diri['nama_jurnal_bereputasi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="volume_jurnal_bereputasi" class="col-sm-3 control-label">Volume/ No</label>
				<div class="col-sm-6">
					<input type="text" name="volume_jurnal_bereputasi" class="form-control" id="volume_jurnal_bereputasi" placeholder="Volume/ No Jurnal" value="<?php echo $data_diri['volume_jurnal_bereputasi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="tahun_jurnal_bereputasi" class="col-sm-3 control-label">Tahun</label>
				<div class="col-sm-1">
					<input type="text" name="tahun_jurnal_bereputasi" class="form-control" id="tahun_jurnal_bereputasi" placeholder="Tahun" value="<?php echo $data_diri['tahun_jurnal_bereputasi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="web_jurnal_bereputasi" class="col-sm-3 control-label" style="font-style: italic;">Website Link</label>
				<div class="col-sm-6">
					<input type="text" name="web_jurnal_bereputasi" class="form-control" id="web_jurnal_bereputasi" placeholder="Tautan" value="<?php echo $data_diri['web_jurnal_bereputasi']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<span class="pull-right"><input style="background-color: gold; border-color: gold; color: black" type="submit" name="submit_edit_peserta" id="submit_edit_peserta" class="btn btn-primary" value="Simpan">&nbsp;
				<a href="<?php echo base_url().'data_diri'; ?>" class="btn btn-default">Batal</a></span>
			</div>
		</form>
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
	.edit_header{
		background-color: #CC9B14;
		font-weight: bold;
		color: white;
		margin-bottom: 10px;
	}
	.H4_custom{
		font-weight: bold;
		color: #CC9B14;
	}
	input[type=text]{
		border: none;
		border-bottom: 2px solid orange;
		color: black;
		font-weight: bold;
	}
</style>