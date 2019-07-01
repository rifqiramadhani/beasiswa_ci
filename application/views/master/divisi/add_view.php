<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Tambah Divisi</h1>
		<hr/>
		<?php echo validation_errors(); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" role="form" method="POST" action="">
			<div class="form-group">
				<label for="divisi_name" class="col-sm-4 control-label">Nama Divisi</label>
				<div class="col-sm-8">
					<input type="text" name="divisi_name" class="form-control" id="divisi_name" required="required" placeholder="Nama Divisi">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan">&nbsp;
					<a href="<?php echo base_url().'master/divisi/listdata'; ?>" class="btn btn-default">Batal</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-6">&nbsp;</div>
</div>
<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>