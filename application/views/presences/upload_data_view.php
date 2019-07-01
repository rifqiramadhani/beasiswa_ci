<?php
	if($this->session->userdata('user_type_id')=='1'){
?>
<div class="row">
	<div class="col-md-12">
		<h1>Unggah Data Absensi</h1>
		<hr/>
		<?php
		if($this->session->flashdata('message_alert')){
			echo $this->session->flashdata('message_alert');
		}
	
		echo 'Unggah file absensi';
		echo '</br>';
		echo 'Pastikan nama file dapat dibaca dan dengan tipe file .xlsx untuk Micosoft Excel';
		echo '</br></br>';
		
		echo form_open_multipart('Excel_import/do_upload');
		echo form_upload('userfile');
		echo '</br>';
		echo form_submit(null,'Upload');
		echo form_close();
	?>
	</div>
</div>
<div class="row">
	
</div>
<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>