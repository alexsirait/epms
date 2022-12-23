<!doctype html>
<html lang="en">


<!-- Required meta tags -->
<meta charset="utf-8">
<title>Performance Management System</title>
<style type="text/css"></style>
<link rel='stylesheet' href='<?php echo base_url() . 'assets/autocomplete/jquery-ui.min.css' ?>'>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>



<body>

	<br>
	<div class="container">
		<?php if ($this->session->flashdata('flash')) : ?>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						Gate Pass Data <strong>added successfully!</strong> <?= $this->session->flashdata('flash'); ?>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row mt-xl">
			<div class="col-md-xl">
				<div class="card">
					<div class="card-header">
						<?= $title; ?>

						<div class="position-relative m-4">
							<!-- <div class="progress" style="height: 1px;">
								<div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
							<button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
							<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
-->
						</div>
					</div>

					<div class="card-body">
					<span style="line-height:3.6; font-weight: bold;">
					
					TO BE FILLED BY EMPLOYEE
					</span>

						<form action="" method="post">
							<input type="hidden" name="id" value="<?= $form['id']; ?>">
							<div class="form-group">
								<label for="date">Date</label>
								<input type="date" class="form-control" name="date" value="<?= $form['date']; ?>">
								<small class="form-text text-danger"><?= form_error('date'); ?></small>
							</div>

							<div class="form-group">
								<label for="eid">Employee ID</label>
								<input type="text" class="form-control" name="eid" id='empID' value="<?= $form['employee_id']; ?>" readonly>
								<small class="form-text text-danger"><?= form_error('eid'); ?></small>
							</div>

							<div class="form-group">
								<label for="name">Employee Name</label>
								<input type="text" class="form-control" name="name" id='employee_name' value="<?= $form['employee_name']; ?>" readonly>
								<small class="form-text text-danger"><?= form_error('name'); ?></small>
							</div>

							<div class="form-group">
								<label for="department">Department</label>
								<input type="text" class="form-control" name="department" id="departement" value="<?= $form['department']; ?>" readonly>
								<small class="form-text text-danger"><?= form_error('department'); ?></small>
							</div>

							<div class="form-group">
								<label for="reason">Reason Of Leaving</label>
								<input type="text" class="form-control" name="reason" value="<?= $form['reason']; ?>">
								<small class="form-text text-danger"><?= form_error('reason'); ?></small>
							</div>

							<div class="form-group">
								<label for="location">Location Destination</label>
								<div class="form-group">
								<div class="row">
							<div class="col-auto">
								<label for="location1" class="col-form-label">1</label>
							</div>
							<div class="col">
								<input type="text" id="location" class="form-control" name="location" value="<?= $form['location']; ?>">
							</div>
							<div class="col-auto">
								<label for="location2" class="col-form-label">2</label>
							</div>
							<div class="col">
								<input type="text" id="location2" class="form-control" name="location2" value="<?= $form['location2']; ?>">
							</div>
							<div class="col-auto">
								<label for="location3" class="col-form-label">3</label>
							</div>
							<div class="col">
								<input type="text" id="location3" class="form-control" name="location3" value="<?= $form['location3']; ?>">
							</div>
							</div>
							</div>
							</div>

							<div class="form-group">
								<label for="purpose">Purpose</label>
								<select class="form-control" id="purpose" name="purpose">
									<?php foreach ($purpose as $p) : ?>
										<?php if ($p == $form['purpose']) : ?>
											<option value="<?= $p; ?>" selected><?= $p; ?></option>
										<?php else : ?>
											<option value="<?= $p; ?>"><?= $p; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<table class="acc" style="width: 100%;">
									<style>
										table,
										th,
										td {
											border: 1px solid black;
										}
									</style>
									<br>
									<td align="center" width="25%">Requested by <br> <b>Employee</b></td>
									<td align="center" width="25%">Approved by <br> <b>Direct Leader</b></td>
									<td align="center" width="25%">Approved by <br> <b>Dept.Manager / HOD</b></td>
									<td align="center" width="25%">Recorded by <br><b>Human Resources</b></td>
							</div>
							<tr>


								<?php
								function checkleader($d, $id)
								{
									$tmp = '';
									if ($_SESSION['level_id'] != '2') {
										$tmp = "disabled = 'true'";
									}
									if ($d != 'Approved') {
										if ($d == 'Rejected') {
											return  $d;
										}
										return  '<button type="button" id="' . $id  . '"class="btn btn-success btn-lg-split btndl" style="width"' . $tmp . '>
											Approve</button>
											<button type="button" id="' . $id  . '" class="btn btn-danger btn-lg-split btnrdl"  style="width"' . $tmp . '>
											Reject</button>';
									} else {
										return  $d;
									}
								}
								function checkmanager($d, $id)
								{
									$tmp = '';
									if ($_SESSION['level_id'] != '3') {
										$tmp = "disabled = 'true'";
									}
									if ($d != 'Approved') {
										if ($d == 'Rejected') {
											return  $d;
										}
										return  '<button type="button" id="' . $id  . '"class="btn btn-success btn-lg-split btndm" style="width"' . $tmp . '>
										Approve</button>
											<button type="button" id="' . $id  . '" class="btn btn-danger btn-lg-split btnrdm"  style="width"' . $tmp . '>
											Reject</button>';
									} else {
										return  $d;
									}
								}
								function checkhrd($d, $id)
								{
									$tmp = '';
									if ($_SESSION['level_id'] != '4') {
										$tmp = "disabled = 'true'";
									}
									if ($d != 'Approved') {
										if ($d == 'Rejected') {
											return  $d;
										}
										return  '<button type="button" id="' . $id  . '"class="btn btn-success btn-lg-split btnh" style="width"' . $tmp . '>
										Approve</button>
											<button type="button" id="' . $id  . '" class="btn btn-danger btn-lg-split btnrh"  style="width"' . $tmp . '>
											Reject</button>';
									} else {
										return  $d;
									}
								}

								if (!empty($form)) {
									// foreach ($form as $row) {
									echo "
								
						<td>" . $form['employee'] . "</td>
						<td>" . checkleader($form['direct_leader'], $form['employee_id']) . "</td>
						<td>" . checkmanager($form['manager'], $form['employee_id']) . "</td>
						<td>" . checkhrd($form['hrd'], $form['employee_id']) . "</td>
					</tr> ";
									// }
								} else {
									echo "<td align='center' colspan='2'>EMPTY!</td>";
								} ?>
					</div>
					</td>
					</tr>
					</table>
				</div>
				<br>
				<table>
					<div class="form-group">
						<tr>
							<td colspan="2">Time Out</td>
						</tr>
						<tr>
							<td>Time</td>
							<td>Security Name</td>
						</tr>
						<tr>
							<td><input type="time" class="form-control" name="exit_time" value="<?= $form['exit_time']; ?>"></td>
							<td><input type="text" class="form-control" name="exit_name" value="<?= $form['exit_name']; ?>"></td>
						</tr>
					</div>
				</table>
				<br>
				<hr class="line-title">
		<span style="line-height:3.6; font-weight: bold;">
      
       TO BE FILLED BY SECURITY
									</span>
				<table>
					<div class="form-group">
						<tr>
							<td colspan="2">Time In</td>
						</tr>
						<tr>
							<td>Time</td>
							<td>Security Name</td>
						</tr>
						</tr>
						<tr>
							<td><input type="time" class="form-control" name="entry_time" value="<?= $form['entry_time']; ?>"></td>
							<td><input type="text" class="form-control" name="entry_name" value="<?= $form['entry_name']; ?>"></td>
						</tr>
					</div>
				</table>

				<br>
				<div class="form-group">
					<label for="use_car">Use Car</label>
					<select class="form-control" id="use_car" name="use_car">
						<?php foreach ($use_car as $uc) : ?>
							<?php if ($uc == $form['use_car']) : ?>
								<option value="<?= $uc; ?>" selected><?= $uc; ?></option>
							<?php else : ?>
								<option value="<?= $uc; ?>"><?= $uc; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="car_type">Car Type</label>
					<select class="form-control" id="car_type" name="car_type">
						<?php foreach ($car_type as $ct) : ?>
							<?php if ($ct == $form['car_type']) : ?>
								<option value="<?= $ct; ?>" selected><?= $ct; ?></option>
							<?php else : ?>
								<option value="<?= $ct; ?>"><?= $ct; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="plat_number">Plat Number</label>
					<input type="text" class="form-control" name="plat_number" value="<?= $form['plat_number']; ?>">
					<small class="form-text text-danger"><?= form_error('plat_number'); ?></small>
				</div>

				<div class="form-group">
					<label for="car_condition">Spesific Car Condition</label>
					<input type="text" class="form-control" name="car_condition" value="<?= $form['car_condition']; ?>">
					<small class="form-text text-danger"><?= form_error('car_condition'); ?></small>
				</div>
				<br>

				<a href="<?= base_url(); ?>home/index" class="btn btn-primary">Back</a>
				<!-- <button type="update" name="ubah" class="btn btn-primary">Update</button> -->
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>

	<script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-3.6.0.min.js' ?>'></script>
	<script type='text/javascript' src='<?php echo base_url() . 'assets/js/jquery-ui.min.js' ?>'></script>
	<script type='text/javascript'>
		$(document).ready(function() {
			$('#empID').autocomplete({
				source: "<?php echo site_url('gatepass/get_autofill/?') ?>",
				select: function(event, ui) {
					$('[name="eid"]').val(ui.item.label);
					$('[name="name"]').val(ui.item.employee_name);
					$('[name="department"]').val(ui.item.department);
				}
			});
		});
	</script>
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	<script src="./assets/js/script.js"></script>
	<script>
		$('.btndl').click(function() {
			var id = $('#empID').val();
			var level_id = '2';
			var type = 'Approved';
			console.log($('#departement').val());
			console.log('<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type);
			var url = '<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type;
			$.getJSON({
				url: url,
				success: (data, status, saome) => {
					console.log(data);
					// if (data["result"]) {
					// 	window.location.href = '<?= base_url() ?>';
					// }
				}
			});
			// $.ajax({
			// 	url: ,
			// 	method: "GET",
			// 	// data: {
			// 	// 	id: id,
			// 	// 	level_id: level_id,
			// 	// 	type: type,
			// 	// 	departement:$('[name="department"]').val(),
			// 	// },
			// 	async: true,
			// 	dataType: 'json',
			// 	success: function(data) {
			// 		console.log(data);

			// 	}
			// });
			// return false;
		});
		$('.btndm').click(function() {
			var id = $('#empID').val();
			var level_id = '3';
			var type = 'Approved';
			console.log($('#departement').val());
			console.log('<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type);
			var url = '<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type;
			$.getJSON({
				url: url,
				success: (data, status, saome) => {
					console.log(data);
					// if (data["result"]) {
					// 	window.location.href = '<?= base_url() ?>';
					// }
				}
			});
			// $.ajax({
			// 	url: ,
			// 	method: "GET",
			// 	// data: {
			// 	// 	id: id,
			// 	// 	level_id: level_id,
			// 	// 	type: type,
			// 	// 	departement:$('[name="department"]').val(),
			// 	// },
			// 	async: true,
			// 	dataType: 'json',
			// 	success: function(data) {
			// 		console.log(data);

			// 	}
			// });
			// return false;
		});

		$('.btnh').click(function() {
			var id = $('#empID').val();
			var level_id = '4';
			var type = 'Approved';
			console.log($('#departement').val());
			console.log('<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type);
			var url = '<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type;
			$.getJSON({
				url: url,
				success: (data, status, saome) => {
					console.log(data);
					// if (data["result"]) {
					// 	window.location.href = '<?= base_url() ?>';
					// }
				}
			});
			// $.ajax({
			// 	url: ,
			// 	method: "GET",
			// 	// data: {
			// 	// 	id: id,
			// 	// 	level_id: level_id,
			// 	// 	type: type,
			// 	// 	departement:$('[name="department"]').val(),
			// 	// },
			// 	async: true,
			// 	dataType: 'json',
			// 	success: function(data) {
			// 		console.log(data);

			// 	}
			// });
			// return false;
		});
		$('.btnrdl').click(function() {
			var id = $('#empID').val();
			var level_id = '2';
			var type = 'Rejected';
			console.log($('#departement').val());
			console.log('<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type);
			var url = '<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type;
			$.getJSON({
				url: url,
				success: (data, status, saome) => {
					console.log(data);
					// if (data["result"]) {
					// 	window.location.href = '<?= base_url() ?>';
					// }
				}
			});
			// $.ajax({
			// 	url: ,
			// 	method: "GET",
			// 	// data: {
			// 	// 	id: id,
			// 	// 	level_id: level_id,
			// 	// 	type: type,
			// 	// 	departement:$('[name="department"]').val(),
			// 	// },
			// 	async: true,
			// 	dataType: 'json',
			// 	success: function(data) {
			// 		console.log(data);

			// 	}
			// });
			// return false;
		});
		$('.btnrdm').click(function() {
			var id = $('#empID').val();
			var level_id = '3';
			var type = 'Rejected';
			console.log($('#departement').val());
			console.log('<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type);
			var url = '<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type;
			$.getJSON({
				url: url,
				success: (data, status, saome) => {
					console.log(data);
					// if (data["result"]) {
					// 	window.location.href = '<?= base_url() ?>';
					// }
				}
			});
			// $.ajax({
			// 	url: ,
			// 	method: "GET",
			// 	// data: {
			// 	// 	id: id,
			// 	// 	level_id: level_id,
			// 	// 	type: type,
			// 	// 	departement:$('[name="department"]').val(),
			// 	// },
			// 	async: true,
			// 	dataType: 'json',
			// 	success: function(data) {
			// 		console.log(data);

			// 	}
			// });
			// return false;
		});

		$('.btnrh').click(function() {
			var id = $('#empID').val();
			var level_id = '4';
			var type = 'Rejected';
			console.log($('#departement').val());
			console.log('<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type);
			var url = '<?php echo base_url('gatepass/approval'); ?>/' + $('#departement').val() + '/' + id + '/' + level_id + '/' + type;
			$.getJSON({
				url: url,
				success: (data, status, saome) => {
					console.log(data);
					// if (data["result"]) {
					// 	window.location.href = '<?= base_url() ?>';
					// }
				}
			});
			// $.ajax({
			// 	url: ,
			// 	method: "GET",
			// 	// data: {
			// 	// 	id: id,
			// 	// 	level_id: level_id,
			// 	// 	type: type,
			// 	// 	departement:$('[name="department"]').val(),
			// 	// },
			// 	async: true,
			// 	dataType: 'json',
			// 	success: function(data) {
			// 		console.log(data);

			// 	}
			// });
			// return false;
		});
	</script>
	<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
	<script>
		function myFunction() {
			var checkBox = document.getElementById("myCheck");
			var text = document.getElementById("text");
			if (checkBox.checked == true) {
				text.style.display = "block";
			} else {
				text.style.display = "none";
			}
		}
	</script>
	<script>
		function myFunction2() {
			var checkBox = document.getElementById("myCheck2");
			var text = document.getElementById("text2");
			if (checkBox.checked == true) {
				text.style.display = "block";
			} else {
				text.style.display = "none";
			}
		}
	</script>
	<script>
		function myFunction3() {
			var checkBox = document.getElementById("myCheck3");
			var text = document.getElementById("text3");
			if (checkBox.checked == true) {
				text.style.display = "block";
			} else {
				text.style.display = "none";
			}
		}
	</script>
	<script>
		function myFunction4() {
			var checkBox = document.getElementById("myCheck4");
			var text = document.getElementById("text4");
			if (checkBox.checked == true) {
				text.style.display = "block";
			} else {
				text.style.display = "none";
			}
		}
	</script>
</body>

</html>