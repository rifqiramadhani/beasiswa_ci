<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Kelola Data Tipe Pengguna</h1>
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
					<th>Name</th>
					<th width="13%">Langkah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = $number;
			foreach ($user_category as $row) {
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$row['nama_user_type'].'</td>';
				echo '<td><a href="'.base_url().'user_category/edit/'.$row['id_user_type'].'">Ubah</a>&nbsp;&nbsp;';
				echo '<a href="'.base_url().'user_category/delete/'.$row['id_user_type'].'" class="delete-link">Hapus</a>&nbsp;&nbsp;</td>';
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
		<a href="<?php echo base_url().'user_category/add'; ?>" class="btn btn-primary btn-lg">Tambah Tipe Pengguna</a>`
	</div>
</div>

<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>