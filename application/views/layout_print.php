<?php
function imgTtd($ttd)
{
	return (empty($ttd))? "": '<img style="padding:0px !important; margin:0px !important;" src="' . $ttd . '" width="35px">';
}

function date_dmy($date_str)
{
	$date = date('d m Y', $date_str);
	$mo = substr($date, 3, 2);
	$bulan = array(
		'Jan',
		'Feb',
		'Mar',
		'Apr',
		'Mei',
		'Jun',
		'Jul',
		'Agt',
		'Sep',
		'Okt',
		'Nov',
		'Des'
	);
	return date('d', $date_str) . ' ' . $bulan[(int)$mo - 1] . ' ' . date('Y', $date_str);
}

function date_dfy($date_str)
{
	$date = date('d m Y', $date_str);
	$mo = substr($date, 3, 2);
	$bulan = array(
		'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	return date('d', $date_str) . ' ' . $bulan[(int)$mo - 1] . ' ' . date('Y', $date_str);
}

function ellipsis($str, $max_len)
{
	if (strlen($str) > $max_len)
		$ell = '...';

	return substr($str, 0, $max_len) . $ell;
}

function checkbox()
{
	return '<span style="font-family:helvetica; font-size:14px;">&#9745;</span>';
}

function box()
{
	return '<span style="font-family:helvetica; font-size:14px;">&#9744;</span>';
}
?>
<?php $this->load->view($content) ?>