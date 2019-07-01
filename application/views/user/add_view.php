<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Registrasi Pendaftar Beasiswa</h1>
		<hr/>
		<?php echo validation_errors(); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<form class="form-horizontal" role="form" method="POST" action="">
			<div class="form-group">
				<label for="nomor_induk" class="col-sm-3 control-label">Nama Lengkap</label>
				<div class="col-sm-6">
					<input type="text" name="nomor_induk" class="form-control" id="nomor_induk" required="required" placeholder=" induk">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-6">
					<input type="email" name="email" id="email" class="form-control" required="required" placeholder="mail@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="username" class="col-sm-3 control-label">username</label>
				<div class="col-sm-6">
					<input type="text" name="username" class="form-control" id="username" required="required" placeholder="Username">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Kata Sandi</label>
				<div class="col-sm-6">
					<input type="text" name="password" class="form-control" id="password" required="required" placeholder="Kata Sandi" value="<?php echo $user['password']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<input type="submit" name="submit_user_add" id="submit_user_add" class="btn btn-primary" value="Simpan">&nbsp;
					<a href="<?php echo base_url().'user/listdata'; ?>" class="btn btn-default">Batal</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-4">&nbsp;</div>
</div>

<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>