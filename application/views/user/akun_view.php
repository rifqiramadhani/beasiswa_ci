<?php
	if($this->session->userdata('user_type_id')!=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Informasi Pribadi</h1>
		<hr/>
		<?php echo validation_errors(); ?>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<h3><?php echo $user['nama']; ?></h3>
	</div>
</div>
<h4>
<div class="row">
	<div class="col-md-2">
		NIP 
	</div>
	<div class="col-md-6">
		: <?php echo $user['nomor_induk']; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		Alamat
	</div>
	<div class="col-md-6">
		: <?php echo $user['alamat']; ?>
	</div>
</div>
<div class="row">
	<?php if($user['no_telp']==''||$user['no_telp']=='0'){ ?>
	<div class="col-md-2">
		Nomor Telpon
	</div>
	<div class="col-md-6">
		: -
	</div>
	<?php }
	else{?>
	<div class="col-md-2">
		Nomor Telpon
	</div>
	<div class="col-md-6">
		: <?php echo $user['no_telp']; //0?>
	</div>
	<?php }?>
</div>
<div class="row">
	<?php if($user['no_handphone']==''||$user['no_handphone']=='0'){ ?>
	<div class="col-md-2">
		Nomor Handphone
	</div>
	<div class="col-md-6">
		: -
	</div>
	<?php }
	else{?>
	<div class="col-md-2">
		Nomor Handphone
	</div>
	<div class="col-md-6">
		: <?php echo $user['no_handphone']; //0?>
	</div>
	<?php }?>
</div>
<div class="row">
	<div class="col-md-2">
		email
	</div>
	<div class="col-md-6">
		: <?php echo $user['email']; ?>
	</div>
</div>
</h4>
<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>