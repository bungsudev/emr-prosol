<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('components/head') ?>

<body class="hold-transition light-skin sidebar-mini theme-primary 
<?= (isset($is_collapsed) == true)? "sidebar-collapse" : "" ?>">

	<div class="loading"></div>
	<script>
		$(document).ready(function() {
			$('.loading').fadeOut();
		});
	</script>
	<div class="wrapper">

		<!-- top menu -->
		<?php $this->load->view('components/header') ?>

		<!-- sidebar menu -->
		<?php $this->load->view('components/sidebar') ?>
		
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="container-full">
				<!-- Main content -->
				<div class="content-header">
					<div class="d-flex align-items-center">
						<div class="mr-auto">
							<h3 class="page-title"><?= $title; ?></h3>
							<div class="d-inline-block align-items-center">
								<nav>
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?= base_url(); ?>"><i class="fa fa-home"></i></a></li>
										<li class="breadcrumb-item" aria-current="page"><?= $title; ?></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				
				<section class="content">
					<div class="row">
						<?php $this->load->view($content) ?>
					</div>
				</section>
				<!-- /.content -->
			</div>
		</div>
		<!-- /.content-wrapper -->
		
		<!-- Footer -->
		<?php $this->load->view('components/footer') ?>

	</div>
	<!-- ./wrapper -->

	<!-- Page Content overlay -->
	<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="display:none; cursor:pointer" id="myOverlay">
	</div>
	<!-- ./side demo panel -->

	<!-- modal pemakaian-->
	<?php $this->load->view('components/modals') ?>

	<!-- Script -->
	<?php $this->load->view('components/script') ?>

</body>
</html>