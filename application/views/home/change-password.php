<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Reset Password</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Change Your Password ?</h1>
										<h5 class="panel-title text-center"><?= $this->session->userdata('reset_email'); ?></h5>
									</div>
									<?= $this->session->flashdata('flash');  ?>

									<form action="<?php echo base_url('login/changeReset'); ?>" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">

										<div class="form-group">
											<input id="password1" type="password" class="form-control" name="password1" placeholder="New Password">
											<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<input id="password2" type="password" class="form-control" name="password2" placeholder="Repeat Password">
											<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="col-sm-12 controls">
											<button type="submit" name="change" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Change Password</button>
										</div>


									</form>

									<div class="text-center">
										<a class="small" href="<?= base_url('login'); ?>">Back To Login</a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>