<?php
	if($this->session->userdata('user_type_id')=='1'){
?>

<div class="row">
	<div class="col-md-12">
		<h1>Kelola Data Pegawai</h1>
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
					<th>No</th>
					<th>Nomor Induk</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<!-- <th>Divisi</th> -->
					<th>Langkah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = $number;
			foreach ($user as $row) {
				echo '<tr>';
				echo '<td>'.$no.'</td>';
				echo '<td>'.$row['nomor_induk'].'</td>';
				echo '<td>'.$row['nama'].'</td>';
				echo '<td>'.$row['nama_jabatan'].'</td>';
				/**echo '<td>'.$row['nama_divisi'].'</td>';**/
				echo '<td><a href="'.base_url().'user/edit/'.$row['nomor_induk'].'">Ubah</a>&nbsp;&nbsp;';
				if($this->session->userdata('user_id')!=$row['nomor_induk']){
					echo '<a href="'.base_url().'user/delete/'.$row['nomor_induk'].'" class="delete-link">Hapus</a>&nbsp;&nbsp;</td>';
				}
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
		<a href="<?php echo base_url().'user/add'; ?>" class="btn btn-primary btn-lg">Tambah Data Pegawai</a>
	</div>
</div>
<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>