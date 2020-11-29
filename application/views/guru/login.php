 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta name="description" content="">
  	<meta name="author" content="">
		<title>Login Guru</title> 
	<!-- Sauce css -->
	<link rel="stylesheet" href="<?= base_url('');?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(''); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url('');?>assets/css/responsive.css">
	<!-- Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald&family=Signika&display=swap" rel="stylesheet">
<!-- Font -->
	<!-- End Sauce CSS -->
	<!-- Sauce JS -->
	<source src="../bootstrap.min.js" type="">
</head>
<body>
<div class="container" id="container">

	<!-- Background Form -->
			<div class="background"></div>
	<!-- End Background Form -->
	
	<div class="row content">
		<!-- Form Login Guru -->
		<div class="col-md-4 form" id="form">
			<div class="cover">
				<h3 class="signin-text mb-3">Sign In</h3>


				<?= $this->session->flashdata('login'); ?>
				<form method="post" action="<?= base_url('guru/Login');?>">
				<!-- Email -->
				<div class="form-group">
					<label for="exampleInputEmail1"></label>
						<input type="text" class="form-control" id="nip" name="nip" aria-describedby="emailHelp" placeholder="NIP" value="<?= set_value('nip'); ?>">
						 <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
				</div> 
				<!-- End Email -->

				<!-- Password -->
				<div class="form-group">
					<label for="exampleInputPassword1"></label>
						<input type="password" class="form-control" id="password" name="password"placeholder="Password">
						 <?= form_error('password', '<small class="text-danger">', '</small>') ?>
				</div>
				<!-- End Password -->
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>


			</div>
		</div> 
		<!-- End Form Login Guru -->

		<!-- Sampul  -->
		<div class="col-md-6 mb-3 pl-4" id="sampul">
			<img src="<?= base_url('');?>assets/img/guru.svg" class="img-fluid" alt="image">
		</div>
		<!-- End Sampul -->
	</div>
</div>

</body>
</html>