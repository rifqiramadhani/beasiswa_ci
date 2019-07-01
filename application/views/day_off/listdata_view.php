<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Kelola Data Hari Libur</h1>
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
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th width="13%">Langkah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = $number;
			foreach ($hari_libur as $row) {
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$this->tanggal->tanggal_indo_monthtext($row['tanggal']).'</td>';
				echo '<td>'.$row['keterangan'].'</td>';
				echo '<td><a href="'.base_url().'day_off/edit/'.$row['id_hari_libur'].'">Ubah</a>&nbsp;&nbsp;';
				echo '<a href="'.base_url().'day_off/delete/'.$row['id_hari_libur'].'" class="delete-link">Hapus</a>&nbsp;&nbsp;</td>';
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
		<a href="<?php echo base_url().'day_off/add'; ?>" class="btn btn-primary btn-lg">Tambah Haril Libur</a>
	</div>
</div>
<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>