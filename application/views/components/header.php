<!-- Untuk assets pakai NAMA RS ada space-->
<?php $nama_rs_strip = str_replace(' ', '-', $this->session->userdata('nama_rs')) ?>

<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-between">
		<a href="#" class="waves-effect waves-light nav-link rounded d-none d-md-inline-block mx-10 push-btn"
			data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span
					class="path3"></span></span>
		</a>
		<!-- Logo -->
		<a href="<?= base_url() ?>" class="logo">
			<!-- logo-->
			<div class="logo-lg">
				<span class="light-logo"><img src="<?= base_url() ?>assets/images/cabang/<?= $nama_rs_strip.'/'.$this->session->userdata('gambar_logo') ?>" alt="logo"></span>
				<span class="dark-logo"><img src="<?= base_url() ?>assets/images/cabang/<?= $nama_rs_strip.'/'.$this->session->userdata('gambar_logo') ?>" alt="logo"></span>
			</div>
		</a>
	</div>
	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top pl-10">
		<!-- Sidebar toggle button-->
		<div class="app-menu">
			<ul class="header-megamenu nav">
				<li class="btn-group nav-item d-md-none">
					<a href="#" class="waves-effect waves-light nav-link rounded push-btn" data-toggle="push-menu"
						role="button">
						<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span
								class="path3"></span></span>
					</a>
				</li>
				<li class="btn-group nav-item d-lg-inline-flex d-none">
					<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded full-screen"
						title="Full Screen">
						<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
					</a>
				</li>
			</ul>
		</div>

		<div class="navbar-custom-menu r-side">
			<ul class="nav navbar-nav">
				<!-- Notifications -->
				<!--  -->

				<!-- User Account-->
				<li class="dropdown user user-menu">
					<a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
						<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
					</a>
					<ul class="dropdown-menu animated flipInX">
						<li class="user-body">
							<a href="#" onClick="a_error('Maaf','Untuk melakukan perubahan password silahkan di aplikasi HIS')" class="dropdown-item"><i class="ti-lock text-muted mr-2"></i> Ganti Password</a>
							<!-- <a class="dropdown-item" href="<?= base_url() ?>settings"><i class="ti-settings text-muted mr-2"></i>
								Settings</a> -->
							<a class="dropdown-item" href="<?= base_url() ?>auth/sign"><i class="ti-marker-alt text-muted mr-2"></i>
								Tanda Tangan</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= base_url();?>auth/logout"><i class="ti-power-off text-muted mr-2"></i> Logout</a>
						</li>
					</ul>
				</li>

				<!-- Control Sidebar Toggle Button -->

			</ul>
		</div>
	</nav>
</header>