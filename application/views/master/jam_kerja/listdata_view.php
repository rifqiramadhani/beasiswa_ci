<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Kelola Data Master Jam Kerja</h1>
		<hr/>
		<?php
		if($this->session->flashdata('message_alert')){
			echo $this->session->flashdata('message_alert');
		}
		?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="7%">No</th>
					<th>Jam Masuk</th>
					<th>Jam Keluar</th>
					<th>Keterangan</th>
					<th width="13%">Langkah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = $number;
			foreach ($jam_kerja as $row) {
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$row['jam_masuk'].'</td>';
				echo '<td>'.$row['jam_keluar'].'</td>';
				echo '<td>'.$row['keterangan'].'</td>';
				echo '<td><a href="'.base_url().'master/jam_kerja/edit/'.$row['id_jam_kerja'].'">Ubah</a>&nbsp;&nbsp;';
				echo '<a href="'.base_url().'master/jam_kerja/delete/'.$row['id_jam_kerja'].'" class="delete-link">Hapus</a>&nbsp;&nbsp;</td>';
				echo '</tr>';
				++$no;
			}
			?>
			</tbody>
		</table>
		<?php echo $paging; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<a href="<?php echo base_url().'master/jam_kerja/add'; ?>" class="btn btn-primary btn-lg">Tambah Jam Kerja</a>
	</div>
</div>

<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>