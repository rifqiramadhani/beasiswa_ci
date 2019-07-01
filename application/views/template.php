<?php
	//Admin
	if($this->session->userdata('user_type_id')==1 OR $this->session->userdata('user_type_id')==2 OR $this->session->userdata('user_type_id')==3){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Beasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminlte/css/AdminLTE.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adminlte/css/skins/_all-skins.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/selectize.bootstrap3.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.css">

	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"> -->

   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'> -->
</head>
<?php if($this->session->userdata('user_type_id')==1){// Super Admin?>
<body class="body_background_super">
<?php } ?>
<?php if($this->session->userdata('user_type_id')==2){// Admin Akademik?>
<body class="body_background_akademik">
<?php } ?>
<?php if($this->session->userdata('user_type_id')==3){// Admin Keuangan?>
<body class="body_background_keuangan">
<?php } ?>
	<header class="navbar navbar-inverse navbar-static-top bs-docs-nav" id="top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">ADMIN</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li class="<?php echo ($this->uri->segment(1)=='main') ? 'active' : ''; ?>">
						<a href="<?php echo base_url().'main'; ?>">Informasi</a>
					</li>
					<li class="dropdown <?php echo ($this->uri->segment(1)=='master'||$this->uri->segment(1)=='user_category') ? 'active' : ''; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url().'peserta'; ?>">Peserta</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url().'prodi'; ?>">Program Studi</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url().'beasiswa'; ?>">Beasiswa</a></li>
						</ul>
					</li>
					<!-- <li class="<?php echo ($this->uri->segment(1)=='user') ? 'active' : ''; ?>">
						<?php if($this->session->userdata('user_type_id')==1){// Super Admin?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Upload<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
							<?php if($this->session->userdata('user_type_id')!=3){// Admin Akademik?>
								<li><a href="<?php echo base_url().'import/do_upload_akademik'; ?>">Data Akademik</a></li>
							<?php } ?>
							<?php if($this->session->userdata('user_type_id')!=2){// Admin Akademik?>
								<li><a href="<?php echo base_url().'import/do_upload_keuangan'; ?>">Data Keuangan</a></li>
							<?php } ?>
							</ul>
						<?php } ?>
					</li> -->

					<li class="<?php echo ($this->uri->segment(1)=='user') ? 'active' : ''; ?>">
						<?php if($this->session->userdata('user_type_id')==1){// Super Admin?>
							<a href="<?php echo base_url().'import'; ?>">Data Upload</a>
						<?php } ?>
						<?php if($this->session->userdata('user_type_id')==2){// Super Admin?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Upload<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo base_url().'import'; ?>">Data Akademik</a></li>
							</ul>
						<?php } ?>
						<?php if($this->session->userdata('user_type_id')==3){// Super Admin?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Upload<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo base_url().'import'; ?>">Data Keuangan</a></li>
							</ul>
						<?php } ?>
					</li>
					<li class="dropdown <?php echo ($this->uri->segment(1)=='presences'||$this->uri->segment(1)=='attendance') ? 'active' : ''; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kehadiran <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url().'presences'; ?>">Daftar Kehadiran</a></li>
							<li><a href="<?php echo base_url().'Excel_import'; ?>">Upload Data Absensi</a></li>
							<li><a href="<?php echo base_url().'attendance/request'; ?>">Absen Susulan</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url().'attendance/list_approval'; ?>">Approval Absen Susulan</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url().'user/logout'; ?>" onclick="return confirm('Are you sure want to exit?')">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header><!-- 
<div class="container">
	<div class="row">
		<table class="table" id="mytable">
			<thead>
				<th>a</th>
				<th>b</th>
				<th>c</th>
			</thead>
			<tfoot>
				<th>a</th>
				<th>b</th>
				<th>c</th>
			</tfoot>
			<tbody>
				<tr>
					<td>a</td>
					<td>s</td>
					<td>d</td>
				</tr>
				<tr>
					<td>z</td>
					<td>x</td>
					<td>c</td>
				</tr>
				<tr>
					<td>q</td>
					<td>w</td>
					<td>e</td>
				</tr>
			</tbody>
		</table>
	</div>
</div> -->
	<div class="container no-padding">
		<?php echo $_content; ?>
	</div>
	<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script> -->

	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/jquery.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
 	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/moment-develop/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
	<script type="text/javascript">$('#select_id_atasan').selectize();</script> -->

<!-- datatable	 -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/moment-develop/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminlte/js/app.min.js"></script>
	<script type="text/javascript">$('#select_id_atasan').selectize();</script>
	<script>$(document).ready(function(){$('#mytable').DataTable();});</script>
</body>
</html>

<?php
}
elseif($this->session->userdata('logged_in')==true){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Beasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/selectize.bootstrap3.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'> -->
</head>
<body class="body_background">
	<header class="header_background"></header>
	<header class="header_background_relative"></header>
	<header class="navbar navbar-inverse navbar-static-top bs-docs-nav" id="top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">BEASISWA</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li class="<?php echo ($this->uri->segment(1)=='main') ? 'active' : ''; ?>">
						<a href="<?php echo base_url().'main'; ?>">Informasi</a>
					</li>
					<li class="dropdown <?php echo ($this->uri->segment(1)=='presences'||$this->uri->segment(1)=='attendance') ? 'active' : ''; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url().'data_diri'; ?>">Data Diri</a></li>
							<li><a href="<?php echo base_url().'attendance/request'; ?>">Absen Susulan</a></li>
							<?php
								if($this->session->userdata('user_type_id')!='99'){
							?>
							<li class="divider"></li>
							<li><a href="<?php echo base_url().'attendance/list_approval'; ?>">Approval Absen Susulan</a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li class="dropdown <?php echo ($this->uri->segment(1)=='user') ? 'active' : ''; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Akun<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url().'user/profil'; ?>">Profil</a></li>
						</ul>
					</li>
					<li><a href="<?php echo base_url().'user/logout'; ?>" onclick="return confirm('Are you sure want to exit?')">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container no-padding">
		<?php echo $_content; ?>
	</div>
	<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/moment-develop/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.js"></script>
	<script type="text/javascript">$('#select_id_atasan').selectize();</script>
	<script>$(document).ready(function(){$('#mytable').DataTable();});</script>
</body>
</html>
<?php
}
else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Beasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/selectize.bootstrap3.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'> -->
</head>
<body class="body_background">
	<header class="header_background"></header>
	<header class="header_background_relative"></header>
	<header class="navbar navbar-inverse navbar-static-top bs-docs-nav" id="top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">BEASISWA</a>
			</div>
			<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li class="<?php echo ($this->uri->segment(1)=='main') ? 'active' : ''; ?>">
						<a href="<?php echo base_url().'main'; ?>">Informasi</a>
					</li>
					<li class="dropdown <?php echo ($this->uri->segment(1)=='presences'||$this->uri->segment(1)=='attendance') ? 'active' : ''; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url().'data_diri'; ?>">Data Diri</a></li>
							<li><a href="<?php echo base_url().'attendance/request'; ?>">Absen Susulan</a></li>
							<?php
								if($this->session->userdata('user_type_id')!='99'){
							?>
							<li class="divider"></li>
							<li><a href="<?php echo base_url().'attendance/list_approval'; ?>">Approval Absen Susulan</a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li class="dropdown <?php echo ($this->uri->segment(1)=='user') ? 'active' : ''; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Akun<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url().'user/profil'; ?>">Profil</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div class="container no-padding">
		<?php echo $_content; ?>
	</div>
	<script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/selectize.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/moment-develop/moment.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/fullcalendar/fullcalendar.js"></script>
	<script type="text/javascript">$('#select_id_atasan').selectize();</script>
	<script>$(document).ready(function(){$('#mytable').DataTable();});</script>
</body>
</html>
<?php
}
?>