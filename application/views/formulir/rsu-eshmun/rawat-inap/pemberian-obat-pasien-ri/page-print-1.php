<html lang="en">
<?php 
	$data_json = [];
	$arr_json = [];
	foreach ($dtl as $key => $val) {
		$data_json[$key] = $val['data_json'];	
	}

	if ($data_json) {
		$arr_json = json_encode($data_json[0]);
		$arr_json = json_decode($arr_json, true);
		$arr_json = json_decode($arr_json, true);
	}
?>
<style rel="stylesheet" type="text/css">
	.header .center {
		text-align: center;
	}

	.header {
		border-collapse: collapse;
	}

	.header td {
		border: 1px solid black;
		border-bottom: 0;
		padding: 5px;
	}

	.body {
		border-collapse: collapse;
	}

	.body td,
	.body tr>th {
		border: 1px solid black;
		padding: 3px;
		font-size: 8.2px;
	}

	.stempel {
		border-collapse: collapse;
		margin: 10px;
	}

	.stempel td {
		border: 2px solid #2438A6;
		padding: 10px;
		margin: 0;
		font-style: #0d3377c7;
		color: #2438A6;
	}

	.border-outside {
		border-collapse: collapse;
	}

	.border-outside td,
	.border-outside th {
		border: 0;
		padding: 0.5px;
		vertical-align: top;
	}

	.bg-second{
		background-color: grey !important;
	}

	.va-m {
		vertical-align: middle !important;
	}

	.f-10 {
		font-size: 5px !important;
	}
</style>

<body>
	<?php
		$this->load->view('components/print-header');

		$empty = '................';
		$s_empty = '................';
		$checked = "<span style='font-family:helvetica; font-size:14px;'>&#10004;</span>";
		$checkbox = '<input type="checkbox"/>';
		?>
	<table class="tblData">
		<tr>
			<td class="b-all b-right" align="center">
				<h2><?= $cabang->nama_formulir ?></h2>
			</td>
		</tr>
	</table>
	<table class="tblData">
		<tr>
			<td>
				<table class="tblData">
					<tr>
						<td colspan="2">Ruang Rawat : <?= $detail["Room_Type"] ?></td>
					</tr>
					<tr>
						<td>TB : <?= $s_empty ?> CM</td>
						<td>BB : <?= $s_empty ?> Kg</td>
					</tr>
					<tr>
						<td colspan="2">Riwayat Alergi Obat : <br /> <?= $detail["Patient_Special"] ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<!-- <tr>
			<td style="vertical-align: top !important" width="25%" class="b-left">Ruang Rawat : <?= $detail["Room_Type"] ?></td>
			<td style="vertical-align: top !important" width="15%">Kamar : <?= $detail["Room_No"] ?></td>
			<td style="vertical-align: top !important" width="40%">Diagnosa : <?= (!empty($default_diagnosa_pasien->diagnosa)) ? $default_diagnosa_pasien->diagnosa : '' ?></td>
			<td style="vertical-align: top !important" width="20%" class="b-right">R.Alergi : <?= $detail["Patient_Special"] ?></td>
		</tr> -->
	</table>
	<table class="tblData">
		<thead>
			<tr>
				<th style="vertical-align: middle;" width="5" rowspan="2">No</th>
				<th style="vertical-align: middle;" width="200" rowspan="2">Nama Obat <br> Injeksi</th>
				<th style="vertical-align: middle;" width="50" rowspan="2">Dosis</th>
				<th style="vertical-align: middle;" width="50" rowspan="2">Frek</th>
				<th style="vertical-align: middle;" width="50" rowspan="2">Cara <br> Pemb <br> erian</th>
				<th style="vertical-align: middle;" width="" colspan="2">Awal Pemberian</th>
				<th style="vertical-align: middle;" width="" colspan="2">Dihentikan</th>
				<th style="vertical-align: middle;" width="50" rowspan="2">Tanggal</th>
				<?php for ($i=0; $i < count($arr_json); $i++): ?>
					<th style="vertical-align: middle;" width="" rowspan="2" colspan="4"><?= date('d-M-y') ?></th>
				<?php endfor; ?>
				
				<?php for ($i=count($arr_json); $i < 5; $i++) { 
					echo '<th style="vertical-align: middle;" width="" rowspan="2" colspan="4">&nbsp;</th>';
				} ?>
				<th style="vertical-align: middle;" width="" rowspan="2">Keterangan</th>
			</tr>
			<tr>
				<th style="vertical-align: middle;" width="50">Tgl/ <br> Jam</th>
				<th style="vertical-align: middle;" width="80">Nama/TTD <br> Dokter</th>
				<th style="vertical-align: middle;" width="50">Tgl/ <br> Jam</th>
				<th style="vertical-align: middle;" width="80">Nama/TTD <br> Dokter</th>
			</tr>
		</thead>
		<tbody>
			<!-- antibiotik -->
			<tr>
				<td class="b-all" colspan="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Antibiotik</b></td>
				<td style="background-color: #888a8c" class="b-all" colspan="15"></td>
				<td style="background-color: #888a8c" class="b-all b-right" colspan="14"></td>
			</tr>
			<?php 
				$total = 0;
				$jml_antibiotik = 0;
				for ($i=0; $i < count($dtl); $i++):
					$jml_antibiotik = $jml_antibiotik + 1;
					$total = $jml_antibiotik;
					if ($dtl[$i]['jenis'] == 'Antibiotik'):
			?>
				<tr>
					<td rowspan="4" class="b-all" align="center"><?= $total ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
					<?php
						$data = [
							"Profilaksis", "Empiris", "Defenitif"
						];
						?>
						<?php for ($e = 0; $e < sizeof($data); $e++) { ?>
							<?= ($dtl[$i]['nama'] == $data[$e]) ? checkbox() : box() ?> <?= $data[$e] . '&nbsp;&nbsp;&nbsp;' ?>
						<?php } ?>
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['dosis'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['frekuensi'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['cara_pemberian'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
						<?= date('d-M-y', strtotime($dtl[$i]['awal_tanggal'])).'<br/>'.$dtl[$i]['awal_jam'] ?> WIB
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama_awal_dokter'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
						<?= date('d-M-y', strtotime($dtl[$i]['dihentikan_tanggal'])).'<br/>'.$dtl[$i]['dihentikan_jam'] ?> WIB
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama_dihentikan_dokter'] ?></td>
					<td class="b-all" style="font-size: 10px;">Jam</td>


					<?php 
						$dt_json1 = $this->db->query("SELECT data_json FROM form_pemberian_obat_ri WHERE id = '".$dtl[$i]['id']."'")->row_array();
						$data_json1 = json_encode($dt_json1);
						$data_json1 = json_decode($data_json1, true);
						$data_json1 = json_decode($data_json1['data_json'], true);
						// print_r($data_json1); die();
					?>
					<!-- detail pemberian obay data_json -->
					<?php for ($a=0; $a < count($data_json1); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json1[$a]['dtl_jam'].'</td>';
					} ?>

					<?php for ($a=count($data_json1); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Petugas</td>
					<?php for ($a=0; $a < count($data_json1); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json1[$a]['dtl_petugas'].'</td>';
					} ?>

					<?php for ($a=count($data_json1); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">ket</td>
					<?php for ($a=0; $a < count($data_json1); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json1[$a]['dtl_keterangan'].'</td>';
					} ?>

					<?php for ($a=count($data_json1); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Pas/Kel</td>
					<?php for ($a=0; $a < count($data_json1); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json1[$a]['dtl_pk'].'</td>';
					} ?>

					<?php for ($a=count($data_json1); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
			<?php 
				endif; 
				endfor; 
			?>

			<!-- dummy -->
			<?php for ($i=$jml_antibiotik; $i <= 5; $i++): $total = $i;?>
				<tr>
					<td rowspan="4" class="b-all" align="center"><?= $total ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
					<?php
						$data = [
							"Profilaksis", "Empiris", "Defenitif"
						];
						?>
						<?php for ($e = 0; $e < sizeof($data); $e++) { ?>
							<?= box() ?> <?= $data[$e] . '&nbsp;&nbsp;&nbsp;' ?>
						<?php } ?>
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td class="b-all" style="font-size: 10px;">Jam</td>
					<!-- detail pemberian obay data_json -->
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Petugas</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">ket</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Pas/Kel</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
			<?php endfor; ?>
			<!-- end antibiotik -->

			<!-- non-antibiotik -->
			<tr>
				<td class="b-all" colspan="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non-Antibiotik</b></td>
				<td style="background-color: #888a8c" class="b-all" colspan="15"></td>
				<td style="background-color: #888a8c" class="b-all b-right" colspan="14"></td>
			</tr>
			<?php 
				$jml_nonantibiotik = 0;
				for ($i=0; $i < count($dtl); $i++):
					if ($dtl[$i]['jenis'] == 'Non-Antibiotik'):
						$jml_nonantibiotik = $jml_nonantibiotik + 1;
						$total = $total + $jml_nonantibiotik;
			?>
				<tr>
					<td rowspan="4" class="b-all" align="center"><?= $total ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['dosis'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['frekuensi'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['cara_pemberian'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
						<?= date('d-M-y', strtotime($dtl[$i]['awal_tanggal'])).'<br/>'.$dtl[$i]['awal_jam'] ?> WIB
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama_awal_dokter'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
						<?= date('d-M-y', strtotime($dtl[$i]['dihentikan_tanggal'])).'<br/>'.$dtl[$i]['dihentikan_jam'] ?> WIB
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama_dihentikan_dokter'] ?></td>
					<td class="b-all" style="font-size: 10px;">Jam</td>


					<?php 
						$dt_json2 = $this->db->query("SELECT data_json FROM form_pemberian_obat_ri WHERE id = '".$dtl[$i]['id']."'")->row_array();
						$data_json2 = json_encode($dt_json2);
						$data_json2 = json_decode($data_json2, true);
						$data_json2 = json_decode($data_json2['data_json'], true);
						// print_r($data_json2); die();
					?>
					<!-- detail pemberian obay data_json -->
					<?php for ($a=0; $a < count($data_json2); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json2[$a]['dtl_jam'].'</td>';
					} ?>

					<?php for ($a=count($data_json2); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Petugas</td>
					<?php for ($a=0; $a < count($data_json2); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json2[$a]['dtl_petugas'].'</td>';
					} ?>

					<?php for ($a=count($data_json2); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">ket</td>
					<?php for ($a=0; $a < count($data_json2); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json2[$a]['dtl_keterangan'].'</td>';
					} ?>

					<?php for ($a=count($data_json2); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Pas/Kel</td>
					<?php for ($a=0; $a < count($data_json2); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json2[$a]['dtl_pk'].'</td>';
					} ?>

					<?php for ($a=count($data_json2); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
			<?php 
				endif; 
				endfor; 
			?>

			<!-- dummy -->
			<?php for ($i=$jml_nonantibiotik; $i < 5; $i++): $total = $total + $jml_nonantibiotik?>
				<tr>
					<td rowspan="4" class="b-all" align="center"><?= $total ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td class="b-all" style="font-size: 10px;">Jam</td>
					<!-- detail pemberian obay data_json -->
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Petugas</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">ket</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Pas/Kel</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
			<?php endfor; ?>
			<!-- end non-antibiotik -->


			
			<!-- Cairan / Nutrisi Parental -->
			<tr>
				<td class="b-all" colspan="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cairan / Nutrisi Parental</b></td>
				<td style="background-color: #888a8c" class="b-all" colspan="15"></td>
				<td style="background-color: #888a8c" class="b-all b-right" colspan="14"></td>
			</tr>
			<?php 
				$jml_cairan = 0;
				for ($i=0; $i < count($dtl); $i++):
					if ($dtl[$i]['jenis'] == 'Cairan / Nutrisi Parental'):
						$jml_cairan = $jml_cairan + 1;
						$total = $total + $jml_cairan;
			?>
				<tr>
					<td rowspan="4" class="b-all" align="center"><?= $total ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['dosis'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['frekuensi'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['cara_pemberian'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
						<?= date('d-M-y', strtotime($dtl[$i]['awal_tanggal'])).'<br/>'.$dtl[$i]['awal_jam'] ?> WIB
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama_awal_dokter'] ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">
						<?= date('d-M-y', strtotime($dtl[$i]['dihentikan_tanggal'])).'<br/>'.$dtl[$i]['dihentikan_jam'] ?> WIB
					</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;"><?= $dtl[$i]['nama_dihentikan_dokter'] ?></td>
					<td class="b-all" style="font-size: 10px;">Jam</td>


					<?php 
						$dt_json3 = $this->db->query("SELECT data_json FROM form_pemberian_obat_ri WHERE id = '".$dtl[$i]['id']."'")->row_array();
						$data_json3 = json_encode($dt_json3);
						$data_json3 = json_decode($data_json3, true);
						$data_json3 = json_decode($data_json3['data_json'], true);
						// print_r($data_json2); die();
					?>
					<!-- detail pemberian obay data_json -->
					<?php for ($a=0; $a < count($data_json3); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json3[$a]['dtl_jam'].'</td>';
					} ?>

					<?php for ($a=count($data_json3); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Petugas</td>
					<?php for ($a=0; $a < count($data_json3); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json3[$a]['dtl_petugas'].'</td>';
					} ?>

					<?php for ($a=count($data_json3); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">ket</td>
					<?php for ($a=0; $a < count($data_json3); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json3[$a]['dtl_keterangan'].'</td>';
					} ?>

					<?php for ($a=count($data_json3); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Pas/Kel</td>
					<?php for ($a=0; $a < count($data_json3); $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">'.$data_json3[$a]['dtl_pk'].'</td>';
					} ?>

					<?php for ($a=count($data_json3); $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
			<?php 
				endif; 
				endfor; 
			?>

			<!-- dummy -->
			<?php for ($i=$jml_cairan; $i < 5; $i++): $total = $total + $jml_cairan?>
				<tr>
					<td rowspan="4" class="b-all" align="center"><?= $total ?></td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td rowspan="4" class="b-all" style="font-size: 10px;">&nbsp;</td>
					<td class="b-all" style="font-size: 10px;">Jam</td>
					<!-- detail pemberian obay data_json -->
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Petugas</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">ket</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
					<td rowspan="2" class="b-all b-right" style="font-size: 10px;">
					<!-- ini keterangan -->
					</td>
				</tr>
				<tr>
					<td class="b-all" style="font-size: 10px;">Pas/Kel</td>
					<?php for ($a=0; $a < 20; $a++) { 
						echo '<td width="20" class="b-all" style="font-size: 10px; vertical-align:top;">&nbsp;</td>';
					} ?>
				</tr>
			<?php endfor; ?>
			<!-- end Cairan / Nutrisi Parental -->
		</tbody>
	</table>
</body>

</html>
