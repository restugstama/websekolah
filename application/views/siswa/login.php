<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Login Siswa</title>
	<!-- Sauce css -->
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('');?>assets/css/responsive.css">
	<!-- End Sauce CSS -->
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Signika&display=swap" rel="stylesheet">
	<!-- End Font -->

	<!-- Admin LTE -->
	   <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css"> -->
	<!-- End Admin LTE -->
</head>
<body> 
	<div class="container" id="container">
		
		<!-- Background Form Login -->
		<div class="background"></div>
		<!-- End Background Form Login -->

		<div class="row content">

			<!-- Form Login Siswa -->
			<div class="col-md-4 form" id="form">
				<div class="cover">
					<h3 class="signin-text mb-3">Sign In</h3>

					<?= $this->session->flashdata('login'); ?>
					<form method="post" action="<?= base_url(''); ?>">
						<!-- Email -->
						<div class="form-group">
							<label for="exampleInputEmail1"></label>
							<input type="text" name="nisn" class="form-control" id="nisn" placeholder="NISN" value="<?= set_value('nisn'); ?>">
							<?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
						</div>
						<!-- End Email -->

						<!-- Password -->
						<div class="form-group">
							<label for="exampleInputPassword1"></label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							<?= form_error('password', '<small class="text-danger">', '</small>') ?>
						</div>
						<!-- End Password -->
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			<!-- End Form Login Siswa -->
			<!-- Sampul -->
			<div class="col-md-6 mb-3 pl-4" id="sampul">
				<img src="<?= base_url('');?>assets/img/book_lover.svg" class="img-fluid" alt="image">
			</div>
			<!-- End Sampul -->

		</div>
	</div>

	<!-- Bootstrap 3.3.7 -->
	<script src="<?= base_url(''); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>