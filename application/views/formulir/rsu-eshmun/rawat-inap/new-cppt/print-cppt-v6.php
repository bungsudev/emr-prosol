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
	.body th {
		border: 1px solid black;
		padding: 5px;
		font-size: 10px;
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
		padding: 1px;
		vertical-align: top;
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
				<td class="b-all b-right" align="center"><h2><?= $cabang->nama_formulir ?></h2></td>
			</tr>
		</table>
		<div style="text-align:justify;">
			<table width="100%" class="body">
				<?php if ($order == 0) : ?>
					<thead>
						<tr>
							<th width="12%">Tanggal/<br>Waktu</th>
							<th width="10%">PPA</th>
							<th width="40%">Hasil Asesmen Pasien dan Pemberian Pelayanan</th>
							<th width="22%">Intruksi PPA Termasuk Pasca Bedah</th>
							<th width="16%">Review dan Verifikasi DPJP</th>
						</tr>
					</thead>
				<?php endif ?>
				<tbody>
					<?php foreach ($detail_cppt as $dtl) : ?>
						<tr>
							<td width="12%" style="text-align: center;"><?= date_dmy(strtotime($dtl->tanggal)) ?> <br>
								<?= date("H:i T", strtotime($dtl->jam)) ?>
							</td>
							<td width="10%"><?= $dtl->ppa ?></td>
							<!-- ===== SERAH TERIMA START ===== -->
							<td width="40%" style="vertical-align: top;">
								<table class="border-outside" width="100%">
									<?php if ($dtl->metode_asesmen == "SOAP" || $dtl->metode_asesmen == "PSP" || $dtl->metode_asesmen == "SC") : ?>
										<tr>
											<th width="1px">S</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th width="1px">O</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_o)) ?></td>
										</tr>
										<tr>
											<th width="1px">A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<tr>
											<th width="1px">P</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_p)) ?></td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "PICU") : ?>
										<tr>
											<th width="40px">S + O</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th>A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<tr>
											<th>P</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_p)) ?></td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "SOAP+PK") : ?>
										<?php
										$dataHapp = explode('|', $dtl->happ);
										$happ = '
										<b><u>PERMINTAAN KONSULTASI</u></b><br><br>
										Yth TS.Prof/Dr: <span class="tulisan"><b>' . $dataHapp[0] . '</b></span><br>
										SMF: <b><span class="tulisan">' . $dataHapp[1] . '</span></b><br>
										Mohon konsul untuk advis/ rawat bersama/ ambil alih Pasien yang dirawat dengan diagnosa:<br>
										<b><span class="tulisan">' . $dataHapp[2] . '</span></b><br><br>
										Atas bantuannya, diucapkan terima kasih<br>
										Salam sejawat<br><br>
										<b><span class="tulisan">' . $dataHapp[3] . '</span></b>
										';
										?>
										<tr>
											<th width="1px">S</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th width="1px">O</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_o)) ?></td>
										</tr>
										<tr>
											<th width="1px">A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<tr>
											<th width="1px">P</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_p)) ?></td>
										</tr>
										<tr>
											<td colspan="3">
												<table class="stempel">
													<tr>
														<td><?= $happ; ?></td>
													</tr>
												</table>

											</td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "SOAP+JK") : ?>
										<?php
										$dataHapp = explode('|', $dtl->happ);
										$happ = '<center><b>JAWABAN KONSUL</b></center>';
										?>
										<tr>
											<th width="1px">S</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th width="1px">O</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_o)) ?></td>
										</tr>
										<tr>
											<th width="1px">A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<tr>
											<th width="1px">P</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_p)) ?></td>
										</tr>
										<tr>
											<td colspan="3">
												<table width="100%" class="stempel">
													<tr>
														<td><?= $happ; ?></td>
													</tr>
												</table>

											</td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "SBAR") : ?>
										<tr>
											<th width="1px">S</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th width="1px">B</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_o)) ?></td>
										</tr>
										<tr>
											<th width="1px">A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<tr>
											<th width="1px">R</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_p)) ?></td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "SBAR+PDU") : ?>
										<?php
										$happ = '';
										if ($dtl->happ) {
											$dataHapp = json_decode($dtl->happ);

											$happ = '
												<table>
													<tr>
														<td colspan="3" style="border:0 !important"><center><b><u>PERALIHAN DPJP UTAMA</u></b></center></td>
													</tr>
													<tr>
														<td style="border:0 !important"><b>Tgl/ Bln / Thn</b></td>
														<td style="border:0 !important">:</td>
														<td style="border:0 !important">' . date('d/m/Y', strtotime($dataHapp->tgl_pdu)) . '</td>
													</tr>
													<tr>
														<td style="border:0 !important"><b>ALASAN</b></td>
														<td style="border:0 !important">:</td>
														<td style="border:0 !important">' . $dataHapp->alasan_pdu . '</td>
													</tr>
													<tr>
														<td style="border:0 !important"><b>DPJP LAMA</b></td>
														<td style="border:0 !important">:</td>
														<td style="border:0 !important">' . $dataHapp->dpjp_lama_pdu . '</td>
													</tr>
													<tr>
														<td style="border:0 !important"><b>DPJP BARU</b></td>
														<td style="border:0 !important">:</td>
														<td style="border:0 !important">' . $dataHapp->dpjp_baru_pdu . '</td>
													</tr>
												</table>
											';
										}
										?>
										<tr>
											<th width="1px">S</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th width="1px">B</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_o)) ?></td>
										</tr>
										<tr>
											<th width="1px">A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<tr>
											<th width="1px">R</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_p)) ?></td>
										</tr>
										<tr>
											<td colspan="3">
												<table class="stempel">
													<tr>
														<td><?= $happ; ?></td>
													</tr>
												</table>

											</td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "RB") : ?>
										<?php
										$happ = '';
										if ($dtl->happ) {
											$dataHapp = json_decode($dtl->happ);
											$tgl_2 = date('d/m/Y', strtotime($dataHapp->tgl2_rb));
											if ($dataHapp->dpjp2_rb == '') {
												$tgl_2 = '-';
											}
											$tgl_3 = date('d/m/Y', strtotime($dataHapp->tgl3_rb));
											if ($dataHapp->dpjp3_rb == '') {
												$tgl_3 = '-';
											}

											$happ = '
												<tr>
													<td><center><b><u>RAWAT BERSAMA</u></b></center></td>
													<td><center><b><u>Tgl/ Bln/ Thn</u></b></center></td>
												</tr>
												<tr>
													<td><b>DPJP UTAMA:</b> ' . $dataHapp->dpjp_utama_rb . '</td>
													<td>' . date('d/m/Y', strtotime($dataHapp->tgl_utama_rb)) . '</td>
												</tr>
												<tr>
													<td><b>DPJP:</b> ' . $dataHapp->dpjp1_rb . '</td>
													<td>' . date('d/m/Y', strtotime($dataHapp->tgl1_rb)) . '</td>
												</tr>
												<tr>
													<td><b>DPJP:</b> ' . $dataHapp->dpjp2_rb . '</td>
													<td>' . $tgl_2 . '</td>
												</tr>
												<tr>
													<td><b>DPJP:</b> ' . $dataHapp->dpjp3_rb . '</td>
													<td>' . $tgl_3 . '</td>
												</tr>
											';
										}
										?>
										<tr>
											<td colspan="3">
												<table class="stempel">
													<?= $happ; ?>
												</table>

											</td>
										</tr>
									<?php elseif ($dtl->metode_asesmen == "ADIME") : ?>
										<tr>
											<th width="1px">A</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_s)) ?></td>
										</tr>
										<tr>
											<th width="1px">D</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_o)) ?></td>
										</tr>
										<tr>
											<th width="1px">I</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $dtl->soap_a)) ?></td>
										</tr>
										<?php
										$soap_p = json_decode($dtl->soap_p);
										$adime_m = $soap_p[0];
										$adime_e = $soap_p[1];
										?>
										<tr>
											<th width="1px">M</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $adime_m)) ?></td>
										</tr>
										<tr>
											<th width="1px">E</th>
											<th width="1px">:</th>
											<td><?= html_entity_decode(str_replace("<<", "&lt; &lt;", $adime_e)) ?></td>
										</tr>
									<?php endif ?>
									<tr>
										<td colspan="3">
											<?php
											$createdby = ($dtl->created_by) ? $dtl->created_by : $dtl->created_by;
											if ($dtl->serah_terima == 'Ya' && $dtl->metode_asesmen != 'RB') {
												if ($dtl->penerima) {
													$txtPenerima = "
													<td align='center'>
														Diterima  <br />
														<img src='" . $dtl->penerima_ttd . "' width='75px'> <br />
														(" . $dtl->penerima . ")
													</td>
												";
												} else
													$txtPenerima = "<td align='center' style='vertical-align: middle !important;' width='50%'></td>";

												$txtSerahTerima = "
													<table class='stempel' width='100%'>
														<tr>
															<td colspan='2' align='center'><b>SERAH TERIMA</b></td>
														</tr>
														<tr>
															<td align='center' width='50%'>
																Diserahkan  <br />
																<img src='" . $dtl->petugas_ttd . "' width='75px'> <br />
																(" . $createdby . ")
															</td>
															$txtPenerima
														</tr>
													</table>
												";
											} else if ($dtl->metode_asesmen != 'RB') {
												$txtSerahTerima = "
												<span>Penginput : " . $createdby . " </span> <br>
												<img src='" . $dtl->petugas_ttd . "' width='75px'> <br />
											";
											} else {
												$txtSerahTerima = "";
											}
											?>
											<?= $txtSerahTerima ?>
										</td>
									</tr>
								</table>
							</td>
							<!-- ===== SERAH TERIMA END ===== -->

							<!-- ===== INSTRUKSI PPA ===== -->
							<?php
							$intruksiPPA = '';
							if ($dtl->penerima && $dtl->metode_asesmen == "SBAR") {
								$intruksiPPA = "
								<table class='stempel' width='100%'>
									<tr>
										<td align='center' style='height:10px;'><b>CABAK</b></td>
									</tr>
									<tr>
										<td align='center' style='font-size:9px;'>
											Pemberi Intruksi  <br />
											<img src='" . $dtl->penerima_ttd . "' width='75px'> <br>
											(" . $dtl->penerima . ")<br>
											" . date('d/m/Y', strtotime($dtl->penerima_time)) . ", " . date('H:i', strtotime($dtl->penerima_time)) . " WIB
										</td>
									</tr>
								</table>
								";
							} else if (empty($dtl->penerima) && $dtl->metode_asesmen == "SBAR") {
								$dokter_rujukan = $dtl->Rujukan_Name;
								if ($dokter_rujukan)
									$sign = '(' . $dokter_rujukan . ')';
								else
									$sign = '(' . $detail['AttDoctorName'] . ')';
								$intruksiPPA = "
								<table class='stempel' width='100%'>
									<tr>
										<td align='center' style='height:10px;'><b>CABAK</b></td>
									</tr>
									<tr>
										<td align='center' style='font-size:10px;'>
											Pemberi Intruksi  <br />
											<div style='height:30px;'></div> <br />
											" . $sign . "
										</td>
									</tr>
								</table>
								";
							} else {
								$intruksiPPA = "";
							}
							?>
							<td width="22%">
								<?= $dtl->intruksi_ppa  ?>
								<br />
								<?= $intruksiPPA ?>
							</td>
							<!-- end intruksi ppa -->
							<td style="text-align:center; font-size:9px" width="16%">
								<?php if (!empty($dtl->ttd_dpjp)) : ?>
									<img width="10%" src="<?= (!empty($sign)) ? $sign : '' ?>"> <br>
									<?= $dtl->review_dpjp ?>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>