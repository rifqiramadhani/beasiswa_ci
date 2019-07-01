<?php
	if($this->session->userdata('user_type_id')=='1' OR $this->session->userdata('user_type_id')=='3' OR $this->session->userdata('user_type_id')=='3'){
		if ($this->session->userdata('user_type_id')!=3) {
?>
<div class="row">
	<span class="pull-left">
	<div class="col-md-12">
		<h1>Unggah Data Peserta Beasiswa</h1>
		<hr/>
	<?php
		if($this->session->flashdata('message_alert')){
			echo $this->session->flashdata('message_alert');
		}
	?>
	<!-- <div class="kotak float-kiri-border"> -->
		Unggah file data peserta beasiswa
		</br>
		Pastikan nama file dapat dibaca dan dengan tipe file .xlsx untuk Micosoft Excel
		</br></br>
		<center>
	<?php
		echo form_open_multipart('Import/do_upload_akademik');
		echo form_upload('userfile');
		echo '</br>';
		echo form_submit(null,'Upload');
		echo form_close();
	?>
		</center>
	<!-- </div> -->
	</div>
	</span>
<!-- </div> -->
<?php 	}
		if ($this->session->userdata('user_type_id')!=2) {
?>
<!-- <div class="row"> -->
	<span class="pull-right">
	<div class="col-md-12">
		<h1>Unggah Data Rincian Keuangan</h1>
		<hr/>
	<?php
		if($this->session->flashdata('message_alert')){
			echo $this->session->flashdata('message_alert');
		}
	?>
	<!-- <div class="kotak float-kanan-unggah"> -->
		Unggah file rincian data keuangan 
		</br>
		Pastikan nama file dapat dibaca dan dengan tipe file .xlsx untuk Micosoft Excel
		</br></br>
		<center>
	<?php
		echo form_open_multipart('Import/do_upload_keuangan');
		echo form_upload('userfile');
		echo '</br>';
		echo form_submit(null,'Upload');
		echo form_close();
	?>
	</center>
	<!-- </div> -->
	</div>
	</span>
</div>
<?php
		}
	}
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>