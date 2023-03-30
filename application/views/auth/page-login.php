<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RSU ESHMUN - <?= $title; ?> </title>
  
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/favicon/rsu-eshmun/favicon.ico">
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/skin_color.css">	
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom_style.css">

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url('<?= base_url(); ?>assets/images/bg.png')">
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<!-- <h2 class="text-primary">RSU ESHMUN <sub>E-MR</sub>  </h2> -->
								
								<!-- logo -->
								<div class="logo-container">
									<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>assets/images/cabang/rsu-eshmun/eshmun-banner.jpeg" alt="logo" class="img-responsive"></a>
								</div>

								<!-- <p class="mb-0">Enter your Account to get access.</p>							 -->
							</div>
							<div class="p-40">
								<?php if($this->session->flashdata('message') == true){ ?>
	                                <div class="alert alert-danger">
	                                    <div class="d-flex align-items-center justify-content-start">
	                                        <span class="alert-icon">
	                                            <i class="anticon anticon-close-o"></i>
	                                        </span>
	                                        <span><?= $this->session->flashdata('message'); ?></span>
	                                    </div>
	                                </div>
	                            <?php } ?>
								<form method="post" action="<?= base_url(); ?>auth/login">
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											</div>
											<input type="text" class="form-control pl-15 bg-transparent" placeholder="ID User" name="user_code" id="user_code">
										</div>
										<small id="helpId" class="form-text text-c-danger hide">ID User tidak di temukan!</small>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<input type="password" class="form-control pl-15 bg-transparent" placeholder="Password" name="password" id="password" readonly>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											</div>
											<select name="dep" id="dep" class="form-control pl-15 bg-transparent mouse-hover-pointer" disabled>
												<option value="" readonly required="">Pilih Department</option>
											</select>
										</div>
									</div>
									  <div class="row">
										<!-- /.col -->
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-primary btn-block mt-10">SIGN IN</button>
										  <p class="mt-4 text-center copy-right">Copyright © <?= date("Y") ?> <a target="_blank" href="https://prosol.id">Prosolution</a>. All rights reserved</p>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
							</div>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>
	<script src="<?= base_url() ?>assets/js/pages/chat-popup.js"></script>
    <script src="<?= base_url() ?>assets/icons/feather-icons/feather.min.js"></script>	
	
	<!-- scirpt get Department -->
	<script>
		$(document).ready(function() {
			$("#user_code").focus();
			$('form').attr('autocomplete', 'off');
			$("#user_code").keyup(function() {
				let usercode = $("#user_code").val();
				(usercode) ? getdep(usercode) : false;				
			});
		});

		//AJAX get department
		function getdep(usercode) {
			$.ajax({
				url: "<?= base_url(); ?>auth/api_department/" + usercode,
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					let html = "";
					if (data) {
						let status = data.metadata.code;
						if (status == 200) {
							let res = data.response.data;
							for (i = 0; i < res.length; i++) {
								html +=
									`<option value=` + res[i].Dep_Code + `>` + res[i].Dep_Code + `</option>`
							}
						}
						$("#password").removeAttr('readonly');
						$("#dep").removeAttr('disabled');
						$("#helpId").addClass('hide');
					}else{
						html = `<option value="" readonly required="">Pilih Department</option>`;
						$("#password").attr('readonly',true);
						$("#dep").attr('disabled',true);
						$("#helpId").removeClass('hide');
					}
					$('#dep').html(html);
				},
				error(e) {
					console.log(e)
				}
			})
		}
	</script>

</body>

</html>
