<div class="row">
	<div class="col-md-12">
		<h1>Ubah Kata Sandi</h1>
		<hr/>
		<?php echo validation_errors(); ?>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<form class="form-horizontal" role="form" method="POST" action="">
			<div class="form-group">
				<label for="password_lama" class="col-sm-3 control-label">Kata Sandi Terpakai</label>
				<div class="col-sm-6">
					<input type="text" name="password_lama" class="form-control" id="password_lama"  placeholder="Kata Sandi Terpakai">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="password_baru" class="col-sm-3 control-label">Kata Sandi Baru</label>
				<div class="col-sm-6">
					<input type="text" name="password_baru" class="form-control" id="password_baru" placeholder="Kata Sandi Baru">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<input type="submit" name="submit_user_add" id="submit_user_add" class="btn btn-primary" value="Ubah">&nbsp;
					<a href="<?php echo base_url().'user/akun'; ?>" class="btn btn-default">Batal</a>
				</div>
			</div>
			<!-- <?php
				if($this->session->userdata('user_type_id')=='1'){
			?>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="submit" name="submit_user_add" id="submit_user_add" class="btn btn-primary" value="Ubah">&nbsp;
						<a href="<?php echo base_url().'user/listdata'; ?>" class="btn btn-default">Batal</a>
					</div>
				</div>
			<?php }
			else{?>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9">
						<input type="submit" name="submit_user_add" id="submit_user_add" class="btn btn-primary" value="Ubah">&nbsp;
						<a href="<?php echo base_url().'user/profil'; ?>" class="btn btn-default">Batal</a>
					</div>
				</div>
			<?php }?> -->
		</form>
	</div>
</div>