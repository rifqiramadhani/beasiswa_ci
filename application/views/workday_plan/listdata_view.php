<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Kelola Data Perencanaan Hari Kerja</h1>
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
					<th>Bulan</th>
					<th>Jumlah Hari</th>
					<th width="13%">Langkah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = $number;
			foreach ($workday_plan as $row) {
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$this->tanggal->get_bulan($row['bulan']).' '.$row['tahun'].'</td>';
				echo '<td>'.$row['hari'].' hari</td>';
				echo '<td><a href="'.base_url().'workday_plan/month_view/'.$row['bulan'].'/'.$row['tahun'].'">Lihat</a>&nbsp;&nbsp;';
				echo '<a href="'.base_url().'workday_plan/edit/'.$row['bulan'].'/'.$row['tahun'].'" class="delete-link">Hapus</a>&nbsp;&nbsp;</td>';
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
		<a href="<?php echo base_url().'workday_plan/add'; ?>" class="btn btn-primary btn-lg">Buat Perencanaan Hari Kerja</a>
	</div>
</div>

<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>