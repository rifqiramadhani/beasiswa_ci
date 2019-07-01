<?php
	if($this->session->userdata('user_type_id')!=='99'){
?>
<?php
	if ($this->session->userdata('user_type_id')=='1' OR $this->session->userdata('user_type_id')=='3') {
		
?>
<div class="row">
	<div class="col-md-12">
		<h1>Ubah Informasi Keuangan</h1>
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
			<div class="col-md-12 edit_header_keuangan">
				<H4>A. RINCIAN PENGGUNAAN BEASISWA</H4>
			</div>
			<?php if($keuangan==''){ ?>
				<div class="col-md-12">Informasi Keuangan Belum Tersedia</div>
			<?php } else{?>
			<div class="form-group">
				<label for="no_ijazah_universitas" class="col-sm-3 control-label">Jumlah</label>
				<div class="col-sm-6">
					<input type="hidden" class="form-control" name="no_ijazah_universitas" id="no_ijazah_universitas" required="required" placeholder="Nama Lengkap" value="">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="jumlah" class="col-sm-3 control-label">Jumlah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="jumlah" id="jumlah" required="required" placeholder="jumlah" value="<?php echo $keuangan['jumlah']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="keluar_1" class="col-sm-3 control-label">Keluar 1</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="keluar_1" id="keluar_1" required="required" placeholder="Nama Lengkap" value="<?php echo $keuangan['keluar_1']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="keluar_2" class="col-sm-3 control-label">Keluar 2</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="keluar_2" id="keluar_2" required="required" placeholder="Nama Lengkap" value="<?php echo $keuangan['keluar_2']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label for="keluar_3" class="col-sm-3 control-label">Keluar 3</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="keluar_3" id="keluar_3" required="required" placeholder="Nama Lengkap" value="<?php echo $keuangan['keluar_3']; ?>">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<span class="pull-right"><input style="background-color: gold; border-color: gold; color: black" type="submit" name="submit_edit_peserta" id="submit_edit_peserta" class="btn btn-primary" value="Simpan">&nbsp;
				<a href="<?php echo base_url().'peserta'; ?>" class="btn btn-default">Batal</a></span>
			</div>
			<?php } ?>
		<!-- </form> -->
		</form>
	</div>
</div>

<?php 
	} //end if
}
else{?>
	<h3>Peserta Beasiswa dimohon login terlebih dahulu</h3>
<?php }?>
<style type="text/css">
	.edit_header_biodata{
		background-color: #CC9B14;
		font-weight: bold;
		color: white;
		margin-bottom: 10px;
	}
	.edit_header_keuangan{
		background-color: black;
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