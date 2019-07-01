<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body class="body_background">
	<div class="login_background"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8"></div>
			<!-- <div class="col-md-4"></div> -->
			<div class="col-md-4">
				<div id="login-box">
					<h1 class="header-login">MASUK</h1>
					<?php
						echo validation_errors();
						if($this->session->flashdata('login_failed')){
							echo $this->session->flashdata('login_failed');
						}
					?>
					<br>
					<form class="form-horizontal" role="form" method="POST" action="">
						<div class="form-group">
							<div class="col-sm-12">
								<input type="text" name="username" id="username" class="form-control" placeholder="username" required="true">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="password" name="password" id="password" class="form-control" placeholder="password" required="true">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input style="background-color: gold; border-color: gold; color: black" type="submit" name="login" id="login" value="Masuk" class="btn btn-primary">&nbsp;
								<input type="reset" name="reset" id="reset" value="Hapus" class="btn">
							</div>
						</div>
					</form>
					<div style="color: white">
						<br/>
						Belum daftar?
						<br/>Kembali ke Beranda
						<!-- <a href="<?php echo base_url().'main/menu'?>">Beranda</a> -->
						dan
						<a style="color: gold" href="<?php echo base_url().'main/menu'?>">Datar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	var base_url = '<?php echo base_url(); ?>';
	</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>
</html>
