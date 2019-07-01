<?php
	if($this->session->userdata('user_type_id')!='99'){
?>
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" role="form" method="POST" action="">
			<span class="pull-right">
				<!-- <?php
					echo form_open('peserta/search_data');
					$search=array(
						'nama' => 'search',
						'id' => 'search',
						'value' => ''
					);
					echo form_input($search);
				?>
					<input type="submit" name="search" value="Search" />
				<?php
					echo form_close();
					echo '<pre>';
					print_r($peserta);
					echo '</pre>';
				?> -->
				<!-- <table>
					<tr>
						<td>
							<input class="form-control" type="text" name="search">
						</td>
						<td>
							&nbsp<input type="submit" name="search" id="search" class="btn btn-primary" style="background-color: black; border-color: black;" value="Search">
						</td>
					</tr>
				</table> -->
				<form class="form-group" role="form" action="<?php echo base_url().'/peserta/search_keyword';?>" method="post">
					<table>
						<tr>
							<td>
								<input type="text" name="search" id="search" class="form-control" placeholder="Search">
							</td>
							<td>
						    	&nbsp<button type="submit" class="btn btn-primary" name="submit" id="submit_search"><i class="fa fa-search fa-lg"></i></button>
						   <!--  <a class="btn btn-warning" href="'.base_url().'peserta/edit/'.$row['username'].'">
						</a> -->
						    </td>
						</tr>
					</table>
				</form>
			</span>
		</form>
		<h1>Data Peserta Beasiswa</h1>
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
		<table class="table table-bordered" id="mytable">
			<thead>
				<tr>
					<th width="7%" onclick="sortTable(0)">No</th>
					<th onclick="sortTable(1)">Nama</th>
					<th width="15%">Tanggal Lahir</th>
					<th width="15%">Kewarganegaraan</th>
					<th width="12%">Status Beasiswa</th>
					<th width="15%">Langkah</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$no = $number;
			foreach ($peserta as $row){
				echo '<tr>';
					echo '<td>'.$no.'</td>';
					echo '<td>'.$row['nama_lengkap'].'</td>';
					if($row['tanggal_lahir'] == '0000-00-00'){
						$row['tanggal_lahir'] = '';
					}
					else{
						$row['tanggal_lahir'] = $this->tanggal->tanggal_indo_monthtext($row['tanggal_lahir']);
					}
					echo '<td>'.$row['tanggal_lahir'].'</td>';
					echo '<td>'.$row['kewarganegaraan'].'</td>';
					if($row['terima'] == '0'){
						$row['terima'] = 'Belum diperiksa';
					}
					elseif($row['terima'] == '1'){
						$row['terima'] = '<n style="color: green; font-weight: bold">Diterima</n>';
					}
					else{
						$row['terima'] = '<n style="color: red; font-weight: bold"">Tidak diterima</n>';
					}
					echo '<td>'.$row['terima'].'</td>';
					echo '';
					if ($this->session->userdata('user_type_id')=='1') {
						echo '<td>
						<a class="btn btn-success" href="'.base_url().'peserta/check/'.$row['username'].'">
						<i class="fa fa-book fa-lg"></i></a>&nbsp
						<a class="btn btn-info" href="'.base_url().'peserta/edit/'.$row['username'].'">
						<i class="fa fa-edit fa-lg"></i></a>&nbsp
						<a class="btn btn-warning" href="'.base_url().'peserta/delete/'.$row['username'].'">
						<i class="fa fa-trash-o fa-lg"></i></a>&nbsp
						</td>';
					}
					if ($this->session->userdata('user_type_id')=='2') {
						echo '<td>
						<a class="btn btn-success" href="'.base_url().'peserta/check/'.$row['username'].'">
						<i class="fa fa-search-plus fa-lg"></i></a>&nbsp
						<a class="btn btn-info" href="'.base_url().'peserta/edit3417/'.$row['username'].'">
						<i class="fa fa-edit fa-lg"></i></a>&nbsp
						<a class="btn btn-warning" href="'.base_url().'peserta/delete/'.$row['username'].'">
						<i class="fa fa-remove fa-lg"></i></a>&nbsp
						</td>';
					}
					if ($this->session->userdata('user_type_id')=='3') {
						echo '<td>
						<a class="btn btn-success" href="'.base_url().'peserta/check/'.$row['username'].'">
						<i class="fa fa-search-plus fa-lg"></i></a>&nbsp
						<a class="btn btn-info" href="'.base_url().'peserta/edit4528/'.$row['username'].'">
						<i class="fa fa-edit fa-lg"></i></a>&nbsp
						<a class="btn btn-warning" href="'.base_url().'peserta/delete/'.$row['username'].'">
						<i class="fa fa-remove fa-lg"></i></a>&nbsp
						</td>';
					}
					

				echo '</tr>';
				++$no;
			}
			?>
			</tbody>
		</table>
		<?php //echo $paging; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<h3>Informasi terkait Peserta Beasiswa</h3>
		Jumlah Pendaftar Peserta beasiswa = <?php echo $count?></br>
		Jumlah Pendaftar Peserta beasiswa diterima = <?php echo $diterima?></br>
		Jumlah Pendaftar Peserta beasiswa tidak diterima = <?php echo $ditolak?>

	</div>
</div>
<?php }
else{?>
	<h3>Silahkan login sebagai admin terlebih dahulu</h3>
<?php }?>

<!-- <a href="'.base_url().'peserta/check/'.$row['username'].'">Periksa</a>&nbsp;&nbsp;&nbsp;
echo '<a href="'.base_url().'peserta/edit/'.$row['username'].'">Ubah</a>&nbsp;&nbsp;';-->

<!-- <script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script> -->
<!-- <script>
	$(document).ready(function() {
		$('#mytable').DataTable();
	});
</script> -->