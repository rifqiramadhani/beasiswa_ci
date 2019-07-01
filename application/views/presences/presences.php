<div class="row">
	<div class="col-md-12">
		<h1>Kehadiran Pegawai</h1>
		<?php echo validation_errors(); ?>
		<hr/>
	</div>
</div>
Pencarian Absensi Pegawai
<div class="row">
	<div class="col-md-6">	
		<?php
			/*Kehadiran dalam area Admin*/
			if($this->session->userdata('user_type_id')=='1'){
		?>
		<form class="form-horizontal" method="POST" role="form" action="">
			<div class="form-group">
				<label for="presences_date_start" class="col-sm-4 control-label">Tanggal Awal</label>
				<div class="col-md-4">
					<input type="text" name="presences_date_start" id="presences_date_start" class="form-control date" data-date-format="DD/MM/YYYY" required="required" placeholder="dd/mm/yyyy" maxlength="10" value="<?php echo $date_start; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="presences_date_end" class="col-sm-4 control-label">Tanggal Akhir</label>
				<div class="col-md-4">
					<input type="text" name="presences_date_end" id="presences_date_end" class="form-control date" data-date-format="DD/MM/YYYY" required="required" placeholder="dd/mm/yyyy" maxlength="10" value="<?php echo $date_end; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="presences_nama_pegawai" class="col-sm-4 control-label">Nama Pegawai</label>
				<div class="col-md-4">
					<select class="form-control" name="nomor_induk">
							<option value="">Nama Pegawai</option>
					<?php
						foreach ($listPegawai as $key => $eachPegawai) {
							echo "<option value=".$eachPegawai['nomor_induk'].">".$eachPegawai['nama']."</option>";
						}
					 ?>
					</select>
				</div>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Tampilkan" class="btn btn-primary">
				</div>
				<!-- <div class="col-md-4">
					<input type="submit" name="submit_name" value="Search" class="btn btn-primary">
				</div> -->
			</div>
		</form>
		<?php }
		else{?>
		<form class="form-horizontal" method="POST" role="form" action="">
			<div class="form-group">
				<label for="presences_date_start" class="col-sm-4 control-label">Tanggal Awal</label>
				<div class="col-md-4">
					<input type="text" name="presences_date_start" id="presences_date_start" class="form-control date" data-date-format="DD/MM/YYYY" required="required" placeholder="dd/mm/yyyy" maxlength="10" value="<?php echo $date_start; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="presences_date_end" class="col-sm-4 control-label">Tanggal Akhir</label>
				<div class="col-md-4">
					<input type="text" name="presences_date_end" id="presences_date_end" class="form-control date" data-date-format="DD/MM/YYYY" required="required" placeholder="dd/mm/yyyy" maxlength="10" value="<?php echo $date_end; ?>">
				</div>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Tampilkan" class="btn btn-primary">
				</div>
			</div>
		</form>
		<?php }?>
	</div>
	<div class="col-md-6">
		<div class="row">
			<!--NIK<div class="col-md-4">
				
			</div>
			<div class="col-md-8">
				<?php echo $user['nomor_induk']; ?>
			</div>
		</div>
		<div class="row">-->
			<div class="col-md-2">
				Nama
			</div>
			<div class="col-md-8" style="font-weight:bold;">
				<?php echo $user['nama']; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				Periode
			</div>
			<div class="col-md-8">

				<?php echo $date_start_periode.' - '.$date_end_periode;?>
			</div>
		</div>
		<!--<div class="row">
			<div class="col-md-2">
				Jam Kerja
			</div>
			<div class="col-md-8">
				<?php echo $jam_kerja['keterangan']; ?>
			</div>
		</div>-->
	</div>
</div>
<hr>
<?php
	if($this->session->userdata('user_type_id')=='1'){
?>
<div class="row">
	<div class="col-md-4">
	Unduh Data Absensi
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<button class="btn btn-primary"><a target="_blank" href="<?php echo base_url().'report_to_pdf/print_laporan_eachPegawai'; ?>?date_start=<?php echo $date_start?>&date_end=<?php echo $date_end?>&nomor_induk=<?php echo $nomor_induk ?>"" style="color: #ffffff">Unduh Data Absensi</a></button>
	</div>
	<div class="row">
		<br>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-4">
	Unduh Rekap Data Absensi pada Bulan Tertentu
	</div>
</div>
<!-- <div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" method="POST" role="form" action=""> -->
			<!-- Form 2 -->
<!-- 			<div class="form-group">
				<label for="bulan_tahun" class="col-sm-4 control-label">Bulan dan Tahun</label>
				<div class="col-md-4">
					<input type="text" name="bulan_tahun" id="bulan_tahun" class="form-control date" data-date-format="M/YYYY" placeholder="M/yyyy" maxlength="10" value="<?php echo $bulan_tahun; ?>">
				</div>
			</div>
			<div> -->
				<!--Form 1-->
				<!-- <button class="btn btn-primary"><a target="_blank" href="<?php echo base_url().'report_to_pdf/print_rekap'; ?>?date_start=<?php echo $date_start?>&date_end=<?php echo $date_end?>&nomor_induk=199402142017092002"" style="color: #ffffff">Download Rekap Absensi</a></button> -->
				<!--Form 2-->
<!-- 				<button class="btn btn-primary"><a target="_blank" href="<?php echo base_url().'report_to_pdf/print_rekap'; ?>?bulan_bulan=<?php echo $bulan_tahun?>" style="color: #ffffff">Download Rekap Absensi</a></button>
			</div>
		</form>
	</div>
</div>
<br> -->
<!-- Form 3 -->
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" method="POST" role="form" action="">
			<div class="form-group">
				<!-- Form 3 -->
				<div class="col-md-4">
					<select id='bulan' class="form-control" name="bulan">
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
					</select>
				</div>
				<div class="col-md-4">
					<select id='tahun' class="form-control" name="tahun">
							<!-- <option value="1990">1990</option>
							<option value="1991">1991</option>
							<option value="1992">1992</option>
							<option value="1993">1993</option>
							<option value="1994">1994</option>
							<option value="1995">1995</option>
							<option value="1996">1996</option>
							<option value="1997">1997</option>
							<option value="1998">1998</option>
							<option value="1999">1999</option>
							<option value="2000">2000</option>
							<option value="2001">2001</option>
							<option value="2002">2002</option>
							<option value="2003">2003</option>
							<option value="2004">2004</option>
							<option value="2005">2005</option> -->
							<option value="2006">2006</option>
							<option value="2007">2007</option>
							<option value="2008">2008</option>
							<option value="2009">2009</option>
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
							<option value="2031">2031</option>
							<option value="2032">2032</option>
							<option value="2033">2033</option>
							<option value="2034">2034</option>
							<option value="2035">2035</option>
							<option value="2036">2036</option>
							<option value="2037">2037</option>
							<option value="2038">2038</option>
							<option value="2039">2039</option>
							<option value="2040">2040</option>
					</select>
				</div>
			</div>
			<div>
				<!--Form 3-->
				<button class="btn btn-primary"><a id="link_rekap_bulanan" target="_blank" href="<?php echo base_url().'report_to_pdf/print_rekap'; ?>?bulan=<?php echo $bulan?>&tahun=<?php echo $tahun?>" style="color: #ffffff">Unduh Rekap Absensi</a></button>
			</div>
		</form>
	</div>
</div>
<hr>
<?php }?>
<div class="row">
	<div class="col-md-12">
		<?php
			if(!$_POST){
		?>
		<h3 align="center">Absensi Kehadiran Dalam 30 Hari Terakhir</h3>
		<?php }
			else{
		?>
		<h3 align="center">Absensi Kehadiran Pada Periode <?php echo $date_start_periode.' - '.$date_end_periode; ?></h3>
		<br>
		<?php }?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th style="text-align:center;">Tanggal</th>
					<th style="text-align:center;">Hari</th>
					<th style="text-align:center;">Jam Masuk</th>
					<th style="text-align:center;">Jam Pulang</th>
					<th style="text-align:center;">Alasan</th>
				</tr>
			</thead>
			<tbody>
			<?php

			if(isset($kehadiran)){
				foreach ($libur as $off) {
					// echo "<prev>";
					// print_r($off['tanggal']);
				}
				foreach($kehadiran as $row){
					// echo "<pre>";
					// print_r($libur);
					// print_r($kehadiran);
					// if ($this->tanggal->get_hari($row['hari']) != 'Minggu' AND $this->tanggal->get_hari($row['hari']) != 'Sabtu') //ambil hari
					// if ($row['hari'] != 'Minggu' AND $row['hari'] != 'Sabtu' AND $row['tanggal'] != $libura)
					if ($row['hari'] != 'Minggu' AND $row['hari'] != 'Sabtu' AND $row['tanggalan'] != $off['tanggal'])
					
					// {echo $this->tanggal->get_hari($row['tanggal'];
					{	
						// print_r($row);
						// print_r($row['tanggalan']);
						echo '<tr>';
						echo '<td>'.$row['tanggal'].'</td>';
						echo '<td>'.$row['hari'].'</td>';
						echo '<td>'.$row['datang'].'</td>';
						echo '<td>'.$row['pulang'].'</td>';
						echo '<td>'.$row['alasan'].'</td>';
						echo '</tr>';
						//echo $row['tanggal'].$row['libur'];
					}
				}
			}
			?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$('#link_rekap_bulanan').click(function(){
		bulan = $('#bulan').val();
		tahun = $('#tahun').val();
		tujuan = '<?php echo base_url().'report_to_pdf/print_rekap?'; ?>' + 'bulan=' + bulan + '&tahun=' + tahun;
		$('#link_rekap_bulanan').attr('href',tujuan)
	});
</script>