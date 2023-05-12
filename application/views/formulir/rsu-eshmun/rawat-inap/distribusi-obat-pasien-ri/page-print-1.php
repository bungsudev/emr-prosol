<html lang="en">
<style>
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

</style>

<body>
	<?php
		$this->load->view('components/print-header');

		$empty = '................';
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
			<td style="vertical-align: top !important" width="25%" class="b-left">Ruangan : <?= $detail["Room_Type"] ?></td>
			<td style="vertical-align: top !important" width="15%">Kamar : <?= $detail["Room_No"] ?></td>
			<td style="vertical-align: top !important" width="40%">Diagnosa : <?= (!empty($default_diagnosa_pasien->diagnosa)) ? $default_diagnosa_pasien->diagnosa : '' ?></td>
			<td style="vertical-align: top !important" width="20%" class="b-right">R.Alergi : <?= $detail["Patient_Special"] ?></td>
		</tr>
	</table>
	<div style="text-align:justify;">
		<table width="100%" class="body">
			<thead>
				<tr>
					<th colspan="3" align="left">Tanggal/Hari Ke</th>
					<?php 
						$tanggal = unique_array($dtl,'tanggal');
						foreach(unique_array($dtl,'tanggal') as $key => $value){
							$tanggal[$key] = $value['tanggal'];
						}
						$tanggal = array_values($tanggal);
					?>
					<?php if($dtl_tanggal){ ?>
					<?php $no = 1; for ($i=0; $i < 2; $i++): ?>
						<th colspan="6"><?= $dtl_tanggal[$i]['tanggal'] ?></th>
					<?php endfor ?>
					<?php }else{ ?>
						<th colspan="6">&nbsp;</th>
					<?php } ?>
				</tr>
				<tr>
					<th width="30%">Jenis Obat</th>
					<th>Dosis</th>
					<th>Aturan <br /> Pakai</th>
					<th class="bg-second">Jml</th>
					<th class="bg-second">Pukul</th>
					<th class="bg-second">Pukul</th>
					<th class="bg-second">Pukul</th>
					<th class="bg-second">Pukul</th>
					<th class="bg-second">Retur</th>
					<th>Jml</th>
					<th>Pukul</th>
					<th>Pukul</th>
					<th>Pukul</th>
					<th>Pukul</th>
					<th>Retur</th>
				</tr>
			</thead>
			<tbody>
				<!-- obat oral -->
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Obat Oral</b></td>
				</tr>
				<?php 
					// filter by jenis
					$obat_oral = [];
					foreach($dtl as $val){
						if(in_array('Obat Oral', $val)){
							$obat_oral[] = $val;
						}
					}
				?>
				<?php $no = 1; for ($i=0; $i < count($obat_oral); $i++): ?>
				<tr>
					<td><?= $no++ ?>. </td>
					<td><?= $obat_oral[$i]['dosis'] ?></td>
					<td><?= $obat_oral[$i]['aturan'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['jumlah'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_1'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_2'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_3'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_4'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['retur'] ?></td>
					<td><?= $obat_oral[$i]['jumlah_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_1'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_3'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_4'] ?></td>
					<td><?= $obat_oral[$i]['retur_2'] ?></td>
				</tr>
				<?php endfor; ?>
				
				<!-- jika kosong -->
				<?php for ($i=$no; $i < 10; $i++): ?>
				<tr>
					<td><?= $i+1 ?>. </td>
					<td></td>
					<td></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php endfor; ?>
				<!-- end obat oral -->


				<!-- Obat Injeksi -->
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Obat Injeksi</b></td>
				</tr>
				<?php 
					// filter by jenis
					$obat_oral = [];
					foreach($dtl as $val){
						if(in_array('Obat Injeksi', $val)){
							$obat_oral[] = $val;
						}
					}
				?>
				<?php $no = 1; for ($i=0; $i < count($obat_oral); $i++): ?>
				<tr>
					<td><?= $no++ ?>. </td>
					<td><?= $obat_oral[$i]['dosis'] ?></td>
					<td><?= $obat_oral[$i]['aturan'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['jumlah'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_1'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_2'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_3'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_4'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['retur'] ?></td>
					<td><?= $obat_oral[$i]['jumlah_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_1'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_3'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_4'] ?></td>
					<td><?= $obat_oral[$i]['retur_2'] ?></td>
				</tr>
				<?php endfor; ?>
				
				<!-- jika kosong -->
				<?php for ($i=$no; $i < 8; $i++): ?>
				<tr>
					<td><?= $i+1 ?>. </td>
					<td></td>
					<td></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php endfor; ?>
				<!-- end Obat Injeksi -->
				

				<!-- Cairan Infus -->
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Cairan Infus</b></td>
				</tr>
				<?php 
					// filter by jenis
					$obat_oral = [];
					foreach($dtl as $val){
						if(in_array('Cairan Infus', $val)){
							$obat_oral[] = $val;
						}
					}
				?>
				<?php $no = 1; for ($i=0; $i < count($obat_oral); $i++): ?>
				<tr>
					<td><?= $no++ ?>. </td>
					<td><?= $obat_oral[$i]['dosis'] ?></td>
					<td><?= $obat_oral[$i]['aturan'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['jumlah'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_1'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_2'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_3'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_4'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['retur'] ?></td>
					<td><?= $obat_oral[$i]['jumlah_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_1'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_3'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_4'] ?></td>
					<td><?= $obat_oral[$i]['retur_2'] ?></td>
				</tr>
				<?php endfor; ?>
				
				<!-- jika kosong -->
				<?php for ($i=$no; $i < 4; $i++): ?>
				<tr>
					<td><?= $i+1 ?>. </td>
					<td></td>
					<td></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php endfor; ?>
				<!-- end Cairan Infus -->


				<!-- SIV -->
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>SIV</b></td>
				</tr>
				<?php 
					// filter by jenis
					$obat_oral = [];
					foreach($dtl as $val){
						if(in_array('SIV', $val)){
							$obat_oral[] = $val;
						}
					}
				?>
				<?php $no = 1; for ($i=0; $i < count($obat_oral); $i++): ?>
				<tr>
					<td><?= $no++ ?>. </td>
					<td><?= $obat_oral[$i]['dosis'] ?></td>
					<td><?= $obat_oral[$i]['aturan'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['jumlah'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_1'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_2'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_3'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_4'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['retur'] ?></td>
					<td><?= $obat_oral[$i]['jumlah_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_1'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_3'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_4'] ?></td>
					<td><?= $obat_oral[$i]['retur_2'] ?></td>
				</tr>
				<?php endfor; ?>
				
				<!-- jika kosong -->
				<?php for ($i=$no; $i < 2; $i++): ?>
				<tr>
					<td><?= $i+1 ?>. </td>
					<td></td>
					<td></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php endfor; ?>
				<!-- end SIV -->


				<!-- Alkes -->
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Alkes</b></td>
				</tr>
				<?php 
					// filter by jenis
					$obat_oral = [];
					foreach($dtl as $val){
						if(in_array('Alkes', $val)){
							$obat_oral[] = $val;
						}
					}
				?>
				<?php $no = 1; for ($i=0; $i < count($obat_oral); $i++): ?>
				<tr>
					<td><?= $no++ ?>. </td>
					<td><?= $obat_oral[$i]['dosis'] ?></td>
					<td><?= $obat_oral[$i]['aturan'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['jumlah'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_1'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_2'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_3'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['pukul_4'] ?></td>
					<td class="bg-second"><?= $obat_oral[$i]['retur'] ?></td>
					<td><?= $obat_oral[$i]['jumlah_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_1'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_2'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_3'] ?></td>
					<td><?= $obat_oral[$i]['pukul_2_4'] ?></td>
					<td><?= $obat_oral[$i]['retur_2'] ?></td>
				</tr>
				<?php endfor; ?>
				
				<!-- jika kosong -->
				<?php for ($i=$no; $i < 15; $i++): ?>
				<tr>
					<td><?= $i+1 ?>. </td>
					<td></td>
					<td></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td class="bg-second"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php endfor; ?>
				<!-- end Alkes -->

				<!-- ttd -->
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Staf Instalasi Farmasi</b></td>
				</tr>
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Staf Farmasi Depo</b></td>
				</tr>
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Staf Farmasi Depo</b></td>
				</tr>
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Perawat Penerima Obat</b></td>
				</tr>
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Perawat Retur</b></td>
				</tr>
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Staf Depo Retur</b></td>
				</tr>
				<tr>
					<td class="b-bot b-right b-left" colspan='15'><b>Tanda Tangan Staf Inst. Farmasi Retur</b></td>
				</tr>
			</tbody>
		</table>
	</div>
	<table class="tblData">
		
	</table>
	</div>
</body>

</html>
