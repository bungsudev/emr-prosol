<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-profile px-10 py-15">
			<div class="d-flex align-items-center">
				<div class="image">
					<img src="<?= base_url() ?>assets/images/avatar/<?= $this->session->userdata('foto_dokter') ?>"
						class="avatar avatar-lg bg-primary-light" alt="User Image">
				</div>
				<div class="info ml-10">
					<p class="mb-0">Welcome</p>
					<h5 class="mb-0 text-capitalize"><?= $this->session->userdata('User_Name') ?></h5>
				</div>
			</div>
		</div>
		
		<ul class="sidebar-menu" data-widget="tree">
			<?= $this->session->userdata('Sidebar') ?>
		</ul>
	</section>
</aside>