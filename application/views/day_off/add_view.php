<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Tambah Hari Libur</h1>
		<hr/>
		<?php echo validation_errors(); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" role="form" method="POST" action="">
			<div class="form-group">
				<label for="hari_libur" class="col-sm-4 control-label">Hari Libur</label>
				<table>
					<tr>
						<td style="width:20%;text-align:center;padding:10px;">
							<input type="text" name="tanggal_libur" id="tanggal_libur" class="form-control date" placeholder="Pilih Tanggal" maxlength="10">
						</td>
						<td style="width:40%;text-align:center;padding:10px;">
							<input type="text" name="keterangan" class="form-control" id="keterangan" required="required" placeholder="Keterangan">
						</td>
					</tr>
				</table>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Simpan">&nbsp;
					<a href="<?php echo base_url().'day_off/listdata'; ?>" class="btn btn-default">Batal</a>
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