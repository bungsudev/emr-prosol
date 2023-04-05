
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Prosolution">
	<!-- End Meta -->

	<title><?= $this->session->userdata('nama_rs') ?> - <?= $title ?></title>
	
	<!-- favicon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/cabang/<?= $this->session->userdata('Cabang').'/'.$this->session->userdata('favicon') ?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">
	<!-- End favicon -->

	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendors_css.css">
	<link href="<?= base_url() ?>assets/css/sweetalert2.css" rel="stylesheet">

	<!-- Style-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/skin_color.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-select.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/MaterialDesign/css/materialdesignicons.min.css">

	<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontawesome.all.min.css"> -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.ui.css">
	<script type="text/javascript" src="<?= base_url() ?>assets/js/ui.js"></script>
		
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/iziToast.min.css">
	<script>
		const base_url = '<?= base_url() ?>';
	</script>
	<!-- custom style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom_style.css">

</head>