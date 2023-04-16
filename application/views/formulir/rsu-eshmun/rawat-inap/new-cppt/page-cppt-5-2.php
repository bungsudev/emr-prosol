<div class="col-lg-12 col-12">
	<!-- Basic Forms -->
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		<form id="myForm">
			<div class="row">
				<input type="hidden" name="visit_no" value="<?php echo $detail['Visit_No'] ?>" id="visit_no">
				<input type="hidden" name="mr_code" value="<?php echo $detail['MR_Code'] ?>" id="mr_code">
				<input type="hidden" name="pukul" value="<?php echo date('h:i') ?>">
				<input type="hidden" name="ttd" id="ttd" value="<?= $this->session->userdata('sign') ?>">
				<input type="hidden" name="dpjp" id="dpjp" value="<?= $detail['AttDoctorName'] ?>">
				<input type="hidden" name="dpjpCode" id="dpjpCode" value="<?= $detail['AttDoctorCode'] ?>">
				<input type="hidden" name="is_doctor" id="is_doctor" value="<?= $this->session->userdata('is_doctor') ?>">
				<div class="form-group col-md-4">
					<label>Tanggal</label>
					<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
				</div>
				<div class="form-group col-md-4">
					<label>Jam</label>
					<input type="text" id="example" class="form-control bs-timepicker" name="pukul" autocomplete="off" value="<?php echo date('H:i') ?>" />
				</div>
				<div class="form-group col-md-4">
					<label>PPA</label>
					<select class="form-control" name="ppa">
						<?php if ($this->session->userdata('is_doctor') == 'DOKTER') : ?>
							<option value="Dokter" selected>Dokter</option>
						<?php else : ?>
							<option value="Perawat">Perawat</option>
							<option value="Bidan">Bidan</option>
							<option value="Fisioterapis">Fisioterapis</option>
							<option value="Apoteker">Apoteker</option>
							<option value="Gizi">Gizi</option>
							<option value="Lainnya">Lainnya</option>
						<?php endif ?>
					</select>
				</div>

				<div class="form-group col-md-4">
					<label>Metode</label>
					<select class="form-control" name="metode_asesmen" id="metode_asesmen">
						<?php if ($this->session->userdata('is_doctor') == 'DOKTER') : ?>
							<option value="SOAP">SOAP</option>
							<option value="SOAP+PK">SOAP + PERMINTAAN KONSULTASI</option>
							<option value="SOAP+JK">SOAP + JAWABAN KONSULTASI</option>
							<option value="PSP">PSP</option>
							<option value="SC">SC</option>
							<option value="PICU">PICU</option>
						<?php else : ?>
							<option value="SOAP">SOAP</option>
							<option value="SBAR">SBAR</option>
							<option value="SBAR+PDU">SBAR + PERALIHAN DPJP UTAMA</option>
							<option value="RB">RAWAT BERSAMA</option>
							<option value="ADIME">ADIME</option>
						<?php endif ?>
					</select>
				</div>

				<!-- ===== SOAP ===== -->
				<div id="soap" style="width:100%">
					<!-- ===== S ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
						</div>
						<textarea class="form-control" id="soap_s" name="soap_s" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="soap_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== O ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd2" style="width:3vw;">O</span>
						</div>
						<textarea class="form-control" id="soap_o" name="soap_o" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="soap_o" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== A ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
						</div>
						<textarea class="form-control" id="soap_a" name="soap_a" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="soap_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== P ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">P</span>
						</div>
						<textarea class="form-control" id="soap_p" name="soap_p" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="soap_p" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
				</div>

				<!-- ===== SBAR ===== -->
				<div id="sbar" style="width:100%">
					<!-- ===== S ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
						</div>
						<textarea class="form-control" id="sbar_s" name="soap_s" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sbar_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== B ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd2" style="width:3vw;">B</span>
						</div>
						<textarea class="form-control" id="sbar_b" name="soap_o" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sbar_b" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== A ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
						</div>
						<textarea class="form-control" id="sbar_a" name="soap_a" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sbar_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== R ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">R</span>
						</div>
						<textarea class="form-control" id="sbar_r" name="soap_p" placeholder="..... " rows="5"></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sbar_r" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
				</div>

				<!-- ===== AIDME ===== -->
				<div id="adime" style="width:100%">
					<!-- ===== A ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd1" style="width:3vw;">A</span>
						</div>
						<textarea class="form-control" id="adime_a" name="soap_s" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="adime_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== D ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd2" style="width:3vw;">D</span>
						</div>
						<textarea class="form-control" id="adime_d" name="soap_o" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="adime_d" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== I ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd3" style="width:3vw;">I</span>
						</div>
						<textarea class="form-control" id="adime_i" name="soap_a" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="adime_i" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== M ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">M</span>
						</div>
						<textarea class="form-control" id="adime_m" name="soap_p[]" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="adime_m" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== E ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">E</span>
						</div>
						<textarea class="form-control" id="adime_e" name="soap_p[]" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="adime_e" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
				</div>

				<!-- ===== PSP ===== -->
				<div id="psp" style="width:100%">
					<!-- ===== S ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
						</div>
						<textarea class="form-control" id="psp_s" name="soap_s" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="psp_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== O ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd2" style="width:3vw;">O</span>
						</div>
						<textarea class="form-control" id="psp_o" name="soap_o" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="psp_o" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== A ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
						</div>
						<textarea class="form-control" id="psp_a" name="soap_a" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="psp_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== P ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">P</span>
						</div>
						<textarea class="form-control" id="psp_p" name="soap_p" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="psp_p" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
				</div>

				<!-- ===== SC ===== -->
				<div id="sc" style="width:100%">
					<!-- ===== S ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
						</div>
						<textarea class="form-control" id="sc_s" name="soap_s" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sc_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== O ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd2" style="width:3vw;">O</span>
						</div>
						<textarea class="form-control" id="sc_o" name="soap_o" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sc_o" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== A ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
						</div>
						<textarea class="form-control" id="sc_a" name="soap_a" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sc_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== P ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">P</span>
						</div>
						<textarea class="form-control" id="sc_p" name="soap_p" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="sc_p" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
				</div>

				<!-- ===== PICU ===== -->
				<div id="picu" style="width:100%">
					<!-- ===== S + O ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd1" style="width:3vw;">S<br>+<br>O</span>
						</div>
						<textarea class="form-control" id="picu_s" name="soap_s" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="picu_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== A ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
						</div>
						<textarea class="form-control" id="picu_a" name="soap_a" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="picu_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
					<!-- ===== P ===== -->
					<div class="input-group col-md-12 mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="labelMtd4" style="width:3vw;">P</span>
						</div>
						<textarea class="form-control" id="picu_p" name="soap_p" placeholder="..... " rows="5" required></textarea>
						<div class="input-group-append" id="tambah-div">
							<button class="btn btn-primary text-white addTemp" data-field="picu_p" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
						</div>
					</div>
				</div>

				<div class="col-md-12" id="intruksi_ppa_group">
					<div class="row">
						<div class="col-md-12">
							<label id="intruksi_ppa_label">Instruksi PPA Termasuk Pasca Bedah</label>
							<textarea name="intruksi_ppa" id="intruksi_ppa" cols="30" rows="6" class="form-control"></textarea>
						</div>
					</div>
					<br>
				</div>

				<!-- ===== PERMINTAAN KONSULTASI START ===== -->
				<div id="pk_group" class="col-md-6">
					<table width="100%" class="stempel">
						<tr style="border: solid black !important; border-width: 1px 1px 0px 1px !important;">
							<td style="border: 0px !important">
								<center><b>PERMINTAAN KONSULTASI</b></center>
							</td>
						</tr>
						<tr style="border: 0px !important">
							<td style="border: solid black !important; border-width: 0px 1px 0px 1px !important; padding: 10px !important">
								<label id="smf_label">SMF</label>
								<input type="text" name="smf" id="smf" class="form-control" />
							</td>
						</tr>
						<tr style="border: 0px !important">
							<td style="border: solid black !important; border-width: 0px 1px 1px 1px !important; padding: 10px !important">
								<label id="diagnosa_label">Diagnosa</label>
								<textarea name="diagnosa" id="diagnosa" cols="30" rows="2" class="form-control"></textarea>
							</td>
						</tr>
					</table>
				</div>
				<!-- ===== PERMINTAAN KONSULTASI END ===== -->

				<!-- ===== PERALIHAN DPJP UTAMA START ===== -->
				<div id="pdu_group" class="col-md-6">
					<table width="100%" class="stempel">
						<tr style="border: solid black !important; border-width: 1px 1px 0px 1px !important;">
							<td style="border: 0px !important">
								<center><b>PERALIHAN DPJP UTAMA</b></center>
							</td>
						</tr>
						<tr style="border: 0px !important">
							<td style="border: solid black !important; border-width: 0px 1px 0px 1px !important; padding: 10px !important">
								<label id="tgl_pdu_label">Tgl/ bln/ thn</label>
								<input type="date" name="tgl_pdu" id="tgl_pdu" class="form-control col-md-6" value="<?= date('Y-m-d') ?>" />
							</td>
						</tr>
						<tr style="border: 0px !important">
							<td style="border: solid black !important; border-width: 0px 1px 0px 1px !important; padding: 10px !important">
								<label id="alasan_pdu_label">ALASAN</label>
								<textarea name="alasan_pdu" id="alasan_pdu" cols="30" rows="2" class="form-control"></textarea>
							</td>
						</tr>
						<tr style="border: 0px !important">
							<td style="border: solid black !important; border-width: 0px 1px 0px 1px !important; padding: 10px !important">
								<label id="dpjp_lama_label">DPJP LAMA</label>
								<select class="form-control" name="dpjp_lama_pdu" id="dpjp_lama_pdu">
									<option value='' selected type="hidden">--- Pilih Dokter ---</option>
									<?php foreach ($dokter as $row) : ?>
										<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
						<tr style="border: 0px !important">
							<td style="border: solid black !important; border-width: 0px 1px 1px 1px !important; padding: 10px !important">
								<label id="dpjp_baru_label">DPJP BARU</label>
								<select class="form-control" name="dpjp_baru_pdu" id="dpjp_baru_pdu">
									<option value='' selected type="hidden">--- Pilih Dokter ---</option>
									<?php foreach ($dokter as $row) : ?>
										<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
									<?php endforeach ?>
								</select>
							</td>
						</tr>
					</table>
				</div>
				<!-- ===== PERALIHAN DPJP UTAMA END ===== -->

				<div class="row col-md-12">
					<div id="serah_terima_group" class="form-group col-md-4">
						<label id="serah_terima_label">Serah Terima</label>
						<select class="form-control" name="serah_terima" id="serah_terima">
							<option value="Ya" selected>Ya</option>
							<option value="Tidak">Tidak</option>
						</select>
					</div>

					<div id="dokter_rujukan_group" class="form-group col-md-4">
						<label for="keterangan">Dokter Rujukan</label>
						<select class="form-control" name="dokter_rujukan" id="dokter_rujukan">
							<option value='' selected type="hidden">--- Pilih Dokter ---</option>
							<?php foreach ($dokter as $row) : ?>
								<option value='<?= $row['User_Code'] ?>'><?= $row['User_Name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<!-- ===== RAWAT BERSAMA START ===== -->
					<div id="rb_group" class="col-md-12 p-2">
						<div class="col-md-10">
							<table width="100%" class="stempel">
								<tr style="border: 1px solid black !important;">
									<td colspan="2" style="border: 0px !important">
										<center><b>RAWAT BERSAMA</b></center>
									</td>
								</tr>
								<tr style="border: 0px !important">
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="dpjp_utama_rb_label">DPJP UTAMA</label>
										<select class="form-control" name="dpjp_utama_rb" id="dpjp_utama_rb">
											<option value='' selected type="hidden">--- Pilih Dokter ---</option>
											<?php foreach ($dokter as $row) : ?>
												<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
											<?php endforeach ?>
										</select>
									</td>
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="tgl_utama_rb_label">Tgl/ bln/ thn</label>
										<input type="date" name="tgl_utama_rb" id="tgl_utama_rb" class="form-control" value="<?= date('Y-m-d') ?>" />
									</td>
								</tr>
								<tr style="border: 0px !important">
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="dpjp1_rb_label">DPJP</label>
										<select class="form-control" name="dpjp1_rb" id="dpjp1_rb">
											<option value='' selected type="hidden">--- Pilih Dokter ---</option>
											<?php foreach ($dokter as $row) : ?>
												<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
											<?php endforeach ?>
										</select>
									</td>
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="tgl1_rb_label">Tgl/ bln/ thn</label>
										<input type="date" name="tgl1_rb" id="tgl1_rb" class="form-control" value="<?= date('Y-m-d') ?>" />
									</td>
								</tr>
								<tr style="border: 0px !important">
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="dpjp2_rb_label">DPJP</label>
										<select class="form-control" name="dpjp2_rb" id="dpjp2_rb">
											<option value='' selected type="hidden">--- Pilih Dokter ---</option>
											<?php foreach ($dokter as $row) : ?>
												<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
											<?php endforeach ?>
										</select>
									</td>
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="tgl2_rb_label">Tgl/ bln/ thn</label>
										<input type="date" name="tgl2_rb" id="tgl2_rb" class="form-control" value="<?= date('Y-m-d') ?>" />
									</td>
								</tr>
								<tr style="border: 0px !important">
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="dpjp3_rb_label">DPJP</label>
										<select class="form-control" name="dpjp3_rb" id="dpjp3_rb">
											<option value='' selected type="hidden">--- Pilih Dokter ---</option>
											<?php foreach ($dokter as $row) : ?>
												<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
											<?php endforeach ?>
										</select>
									</td>
									<td style="border: 1px solid black !important; padding: 10px !important">
										<label id="tgl3_rb_label">Tgl/ bln/ thn</label>
										<input type="date" name="tgl3_rb" id="tgl3_rb" class="form-control" value="<?= date('Y-m-d') ?>" />
									</td>
								</tr>
							</table>
						</div>
					</div>
					<!-- ===== RAWAT BERSAMA END ===== -->

					<div class="form-group col-md-4">
						<label>User</label>
						<div class="input-group">
							<input type="text" class="form-control" value="<?= $this->session->userdata('User_Name') ?>" readonly id="created_by" name="created_by">
							<input type="hidden" value="<?= $this->session->userdata('User_Code') ?>" id="created_code" name="created_code">
							<div class="input-group-append" id="tambah-div">
								<button type="submit" class="btn btn-success text-white" style="cursor: pointer;" id="tambah-cppt"><i class="fa fa-plus"></i></button>
							</div>
						</div>
					</div>
				</div>

				<div class="table-responsive mt-3">
					<table class="table table-bordered table-sm">
						<thead class="text-center">
							<tr>
								<td colspan="6" style="background-color:#F5F5F5">
									<div class="row col-md-12">
										<div class="col-md-1 p-1" style="margin: auto 0">
											<b>Filter:</b>
										</div>
										<select class="form-control col-md-4" id="filter">
											<?php $data_filter = ['Semua', 'Tanggal', 'Diverifikasi', 'Belum Diverifikasi', 'Dokter']; ?>
											<?php foreach ($data_filter as $df) : ?>
												<option value="<?= $df ?>"><?= $df ?></option>
											<?php endforeach ?>
										</select>
										<input type="date" class="form-control col-md-4 ml-3" id="filter_by_date" value="<?= date('Y-m-d') ?>">
										<select id="filter_by_doctor" class="form-control col-md-4 ml-3">
											<?php foreach ($dokter_filter as $d) : ?>
												<?php if ($detail['AttDoctorCode'] == $d['created_by']) : ?>
													<option value="<?= $d['created_by'] ?>" selected><?= $d['User_Name'] ?></option>
												<?php else : ?>
													<option value="<?= $d['created_by'] ?>"><?= $d['User_Name'] ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<th>Tanggal, Waktu</th>
								<th>PPA</th>
								<th>Hasil Asesmen Pasien dan Pemberian Pelayanan</th>
								<th>Intruksi PPA Termasuk Pasca Bedah</th>
								<th>Review dan Verifikasi DPJP</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="list_cppt"></tbody>
					</table>
				</div>
				<div class="col-md-12 mt-4">
					<input type="hidden" value="1" name="status">
					<!-- <input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="petugas" id='petugas'> -->
					<input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="edited_by">
					<input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="created_time">
					<input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="edited_time">
				</div>
			</div>
		</form>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="reset" class="btn btn-rounded btn-danger">Batal</button>
			<button id="simpan" class="btn btn-rounded btn-success pull-right">Simpan</button>
		</div>
	</div>
	<!-- /.box -->
</div>

<!-- ===== MODAL EDIT START ===== -->
<div class="modal fade" id="mdl-edit">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Edit Data</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form id="form_edit" method="POST">
					<div class="row">
						<input type="hidden" name="visit_no1" value="<?php echo $detail['Visit_No'] ?>" id="visit_no1">
						<input type="hidden" name="mr_code1" value="<?php echo $detail['MR_Code'] ?>" id="mr_code1">
						<input type="hidden" name="pukul1" value="<?php echo date('h:i:sa') ?>">
						<input type="hidden" name="ttd1" id="ttd1" value="<?= $this->session->userdata('sign') ?>">
						<div class="form-group col-md-4">
							<label>Tanggal</label>
							<input type="date" name="tanggal1" class="form-control" value="<?php echo date('Y-m-d') ?>">
						</div>
						<div class="form-group col-md-4">
							<label>Jam</label>
							<input type="text" id="example" class="form-control bs-timepicker" name="pukul1" autocomplete="off" value="<?php echo date('H:i') ?>" />
						</div>
						<div class="form-group col-md-4">
							<label>Metode</label>
							<select class="form-control" name="metode_asesmen_edit" id="metode_asesmen_edit" readonly>
								<option value="SOAP">SOAP</option>
								<option value="SBAR">SBAR</option>
								<option value="ADIME">ADIME</option>
								<option value="PSP">PSP</option>
								<option value="SC">SC</option>
							</select>
						</div>

						<!-- ===== SOAP ===== -->
						<div id="soap_edit" style="width:100%">
							<!-- ===== S ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
								</div>
								<textarea class="form-control" id="soap_s1" name="soap_s1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="soap_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== O ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd2" style="width:3vw;">O</span>
								</div>
								<textarea class="form-control" id="soap_o1" name="soap_o1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="soap_o" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== A ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
								</div>
								<textarea class="form-control" id="soap_a1" name="soap_a1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="soap_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== P ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">P</span>
								</div>
								<textarea class="form-control" id="soap_p1" name="soap_p1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="soap_p" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
						</div>

						<!-- ===== SBAR ===== -->
						<div id="sbar_edit" style="width:100%">
							<!-- ===== S ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
								</div>
								<textarea class="form-control" id="sbar_s1" name="soap_s1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sbar_s" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== B ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd2" style="width:3vw;">B</span>
								</div>
								<textarea class="form-control" id="sbar_o1" name="soap_o1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sbar_b" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== A ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
								</div>
								<textarea class="form-control" id="sbar_a1" name="soap_a1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sbar_a" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== R ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">R</span>
								</div>
								<textarea class="form-control" id="sbar_p1" name="soap_p1" placeholder="..... " rows="5" required></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sbar_r" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
						</div>

						<!-- ===== adime ===== -->
						<div id="adime_edit" style="width:100%">
							<!-- ===== A ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">A</span>
								</div>
								<textarea class="form-control" id="adime_a1" name="soap_s1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="adime_a1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== D ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">D</span>
								</div>
								<textarea class="form-control" id="adime_d1" name="soap_o1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="adime_d1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== M ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">I</span>
								</div>
								<textarea class="form-control" id="adime_i1" name="soap_a1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="adime_i1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== M ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">M</span>
								</div>
								<textarea class="form-control" id="adime_m1" name="soap_p1[]" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="adime_m1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== E ===== -->
							<div class="input-group col-md-12 mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="labelMtd4" style="width:3vw;">E</span>
								</div>
								<textarea class="form-control" id="adime_e1" name="soap_p1[]" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="adime_e1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
						</div>

						<!-- ===== PSP ===== -->
						<div id="psp_edit" style="width:100%">
							<!-- ===== S ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="psp_s1" name="soap_s1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="psp_s1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== O ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="psp_o1" name="soap_o1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="psp_o1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== A ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="psp_a1" name="soap_a1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="psp_s1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== P ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="psp_p1" name="soap_p1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="psp_o1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
						</div>

						<!-- ===== SC ===== -->
						<div id="sc_edit" style="width:100%">
							<!-- ===== S ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="sc_s1" name="soap_s1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sc_s1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== O ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="sc_o1" name="soap_o1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sc_o1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== A ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="sc_a1" name="soap_a1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sc_s1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
							<!-- ===== P ===== -->
							<div class="input-group col-md-12 mb-3">
								<textarea class="form-control" id="sc_p1" name="soap_p1" placeholder="..... " rows="5"></textarea>
								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-primary text-white addTemp" data-field="sc_o1" style="cursor: pointer;"><i class="ti ti-bookmark-alt"></i></button>
								</div>
							</div>
						</div>

						<div class="form-group col-md-12">
							<label>Intruksi PPA Termasuk Pasca Bedah</label>
							<textarea name="intruksi_ppa1" id="intruksi_ppa1" cols="30" rows="3" class="form-control"></textarea>
						</div>

						<!-- <div class="form-group col-md-4">
							<label>Serah Terima</label>
							<select class="form-control" name="serah_terima1" id="serah_terima1">
								<option value="Ya" selected>Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div> -->

						<div class="form-group col-md-6">
							<label for="keterangan">Dokter Rujukan</label>
							<select class="form-control" name="dokter_rujukan1" id="dokter_rujukan1">
								<option value='' hidden>--- Pilih Dokter ---</option>
								<?php foreach ($dokter as $row) : ?>
									<option value='<?= $row['User_Code'] ?>'><?= $row['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="col-md-12 mt-4">
							<input type="hidden" value="1" name="status1">
							<input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="petugas1">
							<input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="edited_by1">
							<input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="created_time1">
							<input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="edited_time1">
						</div>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-warning btn-sm" id="save-edit">Update</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			</div>

		</div>
	</div>
</div>
<!-- ===== MODAL EDIT END ===== -->

<!-- ===== MODAL ALERGI START ===== -->
<div class="modal fade" id="modalAlergi">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Riwayat Alergi</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<?= $detail['Patient_Special'] ?>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			</div>

		</div>
	</div>
</div>
<!-- ===== MODAL ALERGI END ===== -->

<!-- ===== MODAL TEMPLATE START ===== -->
<div class="modal fade" id="mdlTemplate">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tambah Template</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form id="formTemp" method="POST">
					<div class="row">
						<div class="form-group col-md-12">
							<label for="nama">Nama Template</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Template">
						</div>
						<div class="form-group col-md-12">
							<label for="isi">Template</label>

							<div class="input-group mb-3">
								<textarea class="form-control" name="isi" id="isi" rows="10"></textarea>

								<div class="input-group-append" id="tambah-div">
									<button class="btn btn-success text-white" style="cursor: pointer;" id="btnSimpanTemp"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<table class="table table-bordered table-sm" id="tblTemp">
								<thead class="text-center">
									<th>Nama Template</th>
									<th>Isi</th>
									<th width="100">Action</th>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 mt-4">
							<input type="hidden" value="1" name="status">
							<input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="petugas_g">
							<input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="created_time_g">
						</div>
					</div>
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			</div>

		</div>
	</div>
</div>
<!-- ===== MODAL TEMPLATE END ===== -->

<!-- ===== MODAL DATE TIME START ===== -->
<div class="modal fade" id="mdlDateTime" data-backdrop="static">
	<div class="modal-dialog modal-xs modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Tanggal dan Waktu</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form id="dataCabak">
					<div class="form-group col-md-12">
						<label for="tanggal">Tanggal</label>
						<input type="date" id="tanggalCabak" name="tanggal_penerima" class="form-control" value="<?= date('Y-m-d') ?>">
					</div>
					<div class="form-group col-md-12">
						<label for="jam">Jam</label>
						<input type="text" id="jamCabak" name="jam_penerima" class="form-control bs-timepicker" value="<?= date("H:i") ?>">
					</div>
					<input type="hidden" name="penerima_ttd" value="<?= $this->session->userdata('sign') ?>">
				</form>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-sm" id="submitDateTime">Submit</button>
			</div>

		</div>
	</div>
</div>
<!-- ===== MODAL DATE TIME END ===== -->

<!-- ===== FLOATING ICON TRASH ===== -->
<style>
	.float {
		position: fixed;
		width: 40px;
		height: 40px;
		bottom: 40px;
		right: 40px;
		color: #FFF;
		border-radius: 50px;
		text-align: center;
		box-shadow: 2px 2px 3px #999;
		cursor: pointer;
		z-index: 100;
	}

	.my-float {
		margin-top: 12px;
	}
</style>

<!-- BELUM SEMPURNA BAGIAN JSON-->
<!-- <span class="float badge badge-danger" id="trash">
	<i class="fa fa-trash my-float"></i>
</span> -->
<!-- ===== END FLOATING ICON TRASH ===== -->

<!-- ===== MODAL LIST DELETED ===== -->
<div class="modal fade" id="mdlTrash">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Daftar Data Yang Telah Dihapus</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<div class="table-responsive">
					<table width="100%" class="table table-bordered table-sm">
						<thead>
							<th class="text-center">Data</th>
							<th class="text-center" width="30">#</th>
						</thead>
						<tbody id="trash_list">
						</tbody>
					</table>
				</div>
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
			</div>

		</div>
	</div>
</div>
<!-- ===== END MODAL LIST DELETED ===== -->
<script type="text/javascript">
	let user_code = '<?= $this->session->userdata('User_Code') ?>'
	let user_name = '<?= $this->session->userdata('User_Name') ?>'
	let is_doctor = '<?= $this->session->userdata('is_doctor') ?>'
	let id = $("#visit_no").val()
	let visit_no = $("#visit_no").val()
	let filter = 'Semua'

	$(document).ready(function() {
		$(".divLabel").remove();
		$("#link_print").removeClass('disabled');

		let id_cppt = ''
		tampil(visit_no, filter)
		

		// initial all input hidden
		// $('#soap').css("display", "none")
		// $('#sbar').css("display", "none")
		// $('#adime').css("display", "none")
		// $('#psp').css("display", "none")
		// $('#sc').css("display", "none")
		// $('#rb_group').css("display", "none")

		// FILTER
		$('#filter_by_date').css('display', 'none')
		$('#filter_by_doctor').css('display', 'none')
		$('#filter').change(function(e) {
			e.preventDefault()
			filter = $('#filter').val()
			if (filter == 'Tanggal') {
				$('#filter_by_date').css('display', 'block')
				$('#filter_by_doctor').css('display', 'none')
				filter = $('#filter_by_date').val()
			} else if (filter == 'Dokter') {
				$('#filter_by_date').css('display', 'none')
				$('#filter_by_doctor').css('display', 'block')
				filter = $('#filter_by_doctor').val()
			} else {
				$('#filter_by_date').css('display', 'none')
				$('#filter_by_doctor').css('display', 'none')
			}

			console.log(filter)
			tampil(visit_no, filter)
		})

		$('#filter_by_date').change(function(e) {
			e.preventDefault()
			filter = $('#filter_by_date').val()

			tampil(visit_no, filter)
		})

		$('#filter_by_doctor').change(function(e) {
			e.preventDefault()
			filter = $('#filter_by_doctor').val()

			tampil(visit_no, filter)
		})
		// END FILTER

		metode_asesmen_selected = $('#metode_asesmen').val()
		showInput(metode_asesmen_selected)

		$("#metode_asesmen").change(function() {
			showInput(this.value)
		})

		$("#metode_asesmen_edit").change(function() {
			showInputEdit(this.value)
		})

		// ADIME FOR UNIT GIZI ONLY
		// READY METODE SELECTED
		function show_select_metode(ppa) {
			if (ppa == "Gizi") {
				$("#metode_asesmen > option[value='SOAP']").css("display", "none")
				$("#metode_asesmen > option[value='SBAR']").css("display", "none")
				$("#metode_asesmen > option[value='SBAR+PDU']").css("display", "none")
				$("#metode_asesmen > option[value='RB']").css("display", "none")
				$("#metode_asesmen > option[value='ADMIE']").css("display", "block")
			} else {
				$("#metode_asesmen > option[value='SOAP']").css("display", "block")
				$("#metode_asesmen > option[value='SBAR']").css("display", "block")
				$("#metode_asesmen > option[value='SBAR+PDU']").css("display", "block")
				$("#metode_asesmen > option[value='RB']").css("display", "block")
				$("#metode_asesmen > option[value='ADMIE']").css("display", "none")
			}
		}
		let ppa = $("[name='ppa']").val()
		if (ppa == "Gizi") {
			$("#metode_asesmen").val("ADIME")
			show_select_metode(ppa)
		} else {
			$("#metode_asesmen").val("SOAP")
			show_select_metode(ppa)
		}
		// END READY METODE SELECTED

		// ONCHANGE
		$("[name='ppa']").change(function() {
			let ppa = $("[name='ppa']").val()
			if (ppa == "Gizi") {
				show_select_metode(ppa)
				$("#metode_asesmen").val("ADIME")
				showInput("ADIME")
			} else {
				show_select_metode(ppa)
				$("#metode_asesmen").val("SOAP")
				showInput("SOAP")
			}
		})
		// END ADIME

		$('#dokter_rujukan').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dpjp_lama_pdu').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dpjp_baru_pdu').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dpjp_utama_rb').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dpjp1_rb').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dpjp2_rb').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dpjp3_rb').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		$('#dokter_rujukan1').select2({
			width: '100%',
			theme: 'classic',
			sortResults: data => data.sort((a, b) => a.text.localCompare(b.text))
		})

		// TRASH
		$("#trash").click(function(e) {
			e.preventDefault()
			$('#mdlTrash').modal('show')
			show_trash(visit_no)
		})

		$("tbody").on("click", "#recover-cppt", function(e) {
			e.preventDefault()
			id_cppt = $(this).data("id")
			if (confirm('Pulih data?'))
				recover_data(id_cppt)
		})
		// END TRASH

		$("#tambah-cppt").click(function(e) {
			e.preventDefault()
			save()
		})

		$("#save-edit").click(function(e) {
			e.preventDefault()
			console.log(visit_no + "," + id_cppt)
			save_edit(visit_no, id_cppt)
		})

		$("tbody").on("click", "#hapus-cppt", function(e) {
			e.preventDefault()
			id_cppt = $(this).data("id")
			hapus(id_cppt)
		})

		$("tbody").on("click", "#edit-cppt", function(e) {
			e.preventDefault()
			id_cppt = $(this).data("id")
			$('#mdl-edit').modal('show')
			$("#form_edit")[0].reset()
			showInputEdit(metode_asesmen_selected)
			data_edit(id_cppt)
		})

		$("tbody").on("click", ".btnVerif", function(e) {
			e.preventDefault()
			tanggal = $(this).data("tanggal")
			jam = $(this).data("jam")
			visit_no = $(this).data("visit_no")
			$.ajax({
				url: base_url + 'cppt/session',
				type: 'POST',
				dataType: 'JSON',
				success: function(res) {
					console.log(res.is_doctor)
					if (res.is_doctor == "DOKTER") {
						// ttdDPJP(id_cppt)
						// checkTtdDpjp1Day(visit_no, tanggal)
						checkTtdDpjpBeforeDate(visit_no, tanggal + " " + jam)
					} else {
						a_warning("Peringatan", "Akun Anda sekarang <b>" + res.User_Code + "</b><br>Mohon log out terlebih dahulu")
					}
				}
			})
		})

		$("tbody").on("click", ".btnTerima", function(e) {
			e.preventDefault()
			id_cppt = $(this).data("id")
			ttdPenerima(id_cppt)
		})

		// request date n time for cabak
		let temp_id
		$("tbody").on("click", ".btnEditDateTime", function(e) {
			e.preventDefault()
			id_cppt = $(this).data("id")
			temp_id = id_cppt
			$('#mdlDateTime').modal('show')
		})

		$("#mdlDateTime").on("click", "#submitDateTime", function(e) {
			e.preventDefault()
			ttdPenerimaCabak(id_cppt)
			$('#mdlDateTime').modal('hide')
		})
	})

	function show_trash(visit_no) {
		$.ajax({
			url: base_url + 'cppt/show_trash/' + visit_no,
			dataType: 'JSON',
			success: function(res) {
				console.log(res)
				let html = ''
				for (r of res) {
					html += '<tr>'
					let is_deleted = JSON.parse(r.is_deleted)
					if (r.metode_asesmen == 'SOAP') {
						html += `
							<td>
								` + date_dmy(r.tanggal) + ` - ` + r.jam + `<br>
								<table width="100%" class="soap">
									<tr>
										<td width="1%"><b>S</b></td>
										<td width="1%">:</td>
										<td>` + r.soap_s + `</td>
									</tr>
									<tr>
										<td><b>O</b></td>
										<td>:</td>
										<td>` + r.soap_o + `</td>
									</tr>
									<tr>
										<td><b>A</b></td>
										<td>:</td>
										<td>` + r.soap_a + `</td>
									</tr>
									<tr>
										<td><b>P</b></td>
										<td>:</td>
										<td>` + r.soap_p + `</td>
									</tr>
								</table><br>
								<i class="float-right">` + r.Deleted_Name + ` - ` + date_dmy(is_deleted.deleted_time) + ` ` + date_his(is_deleted.deleted_time) + `</i>
							</td>
							`
					} else if (r.metode_asesmen == 'SBAR') {
						let dpjpName = '<?= $detail['AttDoctorName'] ?>'
						if (!r.Rujukan_Name)
							r.Rujukan_Name = dpjpName
						html += `
							<td>
								<table width="100%" class="soap">
									<tr>
										<td width="1%"><b>S</b></td>
										<td width="1%">:</td>
										<td>` + r.soap_s + `</td>
									</tr>
									<tr>
										<td><b>B</b></td>
										<td>:</td>
										<td>` + r.soap_o + `</td>
									</tr>
									<tr>
										<td><b>A</b></td>
										<td>:</td>
										<td>` + r.soap_a + `</td>
									</tr>
									<tr>
										<td><b>R</b></td>
										<td>:</td>
										<td>` + r.soap_p + `</td>
									</tr>
									<tr>
										<td colspan="3"><b>Dokter Rujukan</b>: ` + r.Rujukan_Name + `</td>
									</tr>
								</table><br>
								<i class="float-right">` + is_deleted.deleted_by + ` - ` + date_dmy(is_deleted.deleted_time) + ` ` + date_his(is_deleted.deleted_time) + `</i>
							</td>
							`
					} else if (r.metode_asesmen == 'ADIME') {
						let me = JSON.parse(r.soap_p)
						html += `
							<td>
								<table width="100%" class="soap">
									<tr>
										<td width="1%"><b>A</b></td>
										<td width="1%">:</td>
										<td>` + r.soap_s + `</td>
									</tr>
									<tr>
										<td><b>D</b></td>
										<td>:</td>
										<td>` + r.soap_o + `</td>
									</tr>
									<tr>
										<td><b>I</b></td>
										<td>:</td>
										<td>` + r.soap_a + `</td>
									</tr>
									<tr>
										<td><b>M</b></td>
										<td>:</td>
										<td>` + me[0] + `</td>
									</tr>
									<tr>
										<td><b>E</b></td>
										<td>:</td>
										<td>` + me[1] + `</td>
									</tr>
								</table><br>
								<i class="float-right">` + is_deleted.deleted_by + ` - ` + date_dmy(is_deleted.deleted_time) + ` ` + date_his(is_deleted.deleted_time) + `</i>
							</td>
							`
					}
					if (r.created_by == user_code)
						html += `<td style="vertical-align: middle !important;"><span class="badge badge-success" style="cursor:pointer" id="recover-cppt" data-id="` + r.id_cppt + `"><i class="fa fa-plus"></i></span></td>`
					else
						html += `<td>&nbsp;</td>`
					html += `</tr>`
				}
				$('#trash_list').html(html)
			}
		})
	}

	function recover_data(id) {
		$.ajax({
			url: base_url + 'cppt/recover_data/' + id,
			dataType: 'JSON',
			success: function(res) {
				if (res.status == 200)
					a_ok("Berhasil", "Data Berhasil Dipulih")
				else if (res.status == 500)
					a_warning("Gagal", "Data Gagal Dipulih")
				else if (res.status == 405)
					a_error("Not Allowed", "Hubungi IT")
				show_trash(visit_no)
				tampil(visit_no, filter)
			}
		})
	}

	// PK OR PDU
	function disableInput(sub_metode) {
		if (sub_metode == "PK") {
			// PK - SOAP
			$('#pk_group').css("display", "block")
			$('#smf').removeAttr("disabled", "true")
			$('#diagnosa').removeAttr("disabled", "true")

			// PDU - SBAR
			$('#pdu_group').css("display", "none")
			$('#tgl_pdu').attr("disabled", "true")
			$('#alasan_pdu').attr("disabled", "true")
			$('#dpjp_lama_pdu').attr("disabled", "true")
			$('#dpjp_baru_pdu').attr("disabled", "true")
		} else if (sub_metode == "PDU") {
			// PK - SOAP
			$('#pk_group').css("display", "none")
			$('#smf').attr("disabled", "true")
			$('#diagnosa').attr("disabled", "true")

			// PDU - SBAR
			$('#pdu_group').css("display", "block")
			$('#tgl_pdu').removeAttr("disabled", "true")
			$('#alasan_pdu').removeAttr("disabled", "true")
			$('#dpjp_lama_pdu').removeAttr("disabled", "true")
			$('#dpjp_baru_pdu').removeAttr("disabled", "true")
		} else {
			// PK - SOAP
			$('#pk_group').css("display", "none")
			$('#smf').attr("disabled", "true")
			$('#diagnosa').attr("disabled", "true")

			// PDU - SBAR
			$('#pdu_group').css("display", "none")
			$('#tgl_pdu').attr("disabled", "true")
			$('#alasan_pdu').attr("disabled", "true")
			$('#dpjp_lama_pdu').attr("disabled", "true")
			$('#dpjp_baru_pdu').attr("disabled", "true")
		}
	}

	// soap, sbar, adime, psp, sc, picu
	function showInputElement(metodeSelected) {
		let metodeArray = ['soap', 'sbar', 'adime', 'psp', 'sc', 'picu']
		if (metodeArray.includes(metodeSelected)) {
			for (metode of metodeArray) {
				if (metode == metodeSelected) {
					$('#' + metode).css("display", "block")
					$('#' + metode + ' textarea').removeAttr("disabled")
				} else {
					$('#' + metode).css("display", "none")
					$('#' + metode + ' textarea').attr("disabled", "true")
				}
			}
		} else {
			for (metode of metodeArray) {
				$('#' + metode).css("display", "none")
				$('#' + metode + ' textarea').attr("disabled", "true")
			}
		}
	}

	function showInput(metode_asesmen) {
		$('#soap textarea').val('')
		$('#sbar textarea').val('')
		$('#adime textarea').val('')
		$('#psp textarea').val('')
		$('#sc textarea').val('')

		// instruksi ppa
		if (metode_asesmen == 'SOAP+PK')
			disableInput("PK")
		else if (metode_asesmen == 'SBAR+PDU')
			disableInput("PDU")
		else
			disableInput("")

		if (metode_asesmen == 'SOAP' || metode_asesmen == 'SOAP+PK' || metode_asesmen == 'SOAP+JK') {
			showInputElement("soap")

			$('#intruksi_ppa_group').css("display", "block")
			$('#serah_terima_group').css("display", "block")
			$('#dokter_rujukan_group').css("display", "block")
			$('#rb_group').css("display", "none")

			if (is_doctor == "DOKTER")
				$('#serah_terima').val('Tidak')
			else
				$('#serah_terima').val('Ya')

			showAutoTemplate()
		} else if (metode_asesmen == 'SBAR' || metode_asesmen == 'SBAR+PDU') {
			showInputElement("sbar")

			$('#intruksi_ppa_group').css("display", "block")
			$('#serah_terima_group').css("display", "block")
			$('#dokter_rujukan_group').css("display", "block")
			$('#rb_group').css("display", "none")

			$('#serah_terima').val('Tidak')
			$('#serah_terima').attr('disabled', 'true')

			showAutoTemplate()
		} else if (metode_asesmen == 'RB') {
			showInputElement("rb")

			$('#intruksi_ppa_group').css("display", "none")
			$('#serah_terima_group').css("display", "none")
			$('#dokter_rujukan_group').css("display", "none")
			$('#rb_group').css("display", "block")
		} else if (metode_asesmen == 'ADIME') {
			showInputElement("adime")

			if (is_doctor == "DOKTER")
				$('#serah_terima').val('Tidak')
			else
				$('#serah_terima').val('Ya')

			showAutoTemplate()
		} else if (metode_asesmen == 'PSP') {
			showInputElement("psp")

			$('#intruksi_ppa_group').css("display", "block")
			$('#serah_terima_group').css("display", "block")
			$('#dokter_rujukan_group').css("display", "block")
			$('#rb_group').css("display", "none")

			if (is_doctor == "DOKTER")
				$('#serah_terima').val('Tidak')
			else
				$('#serah_terima').val('Ya')

			showAutoTemplate()
		} else if (metode_asesmen == 'SC') {
			showInputElement("sc")

			$('#intruksi_ppa_group').css("display", "block")
			$('#serah_terima_group').css("display", "block")
			$('#dokter_rujukan_group').css("display", "block")
			$('#rb_group').css("display", "none")

			if (is_doctor == "DOKTER")
				$('#serah_terima').val('Tidak')
			else
				$('#serah_terima').val('Ya')

			showAutoTemplate()
		} else if (metode_asesmen == 'PICU') {
			showInputElement("picu")

			$('#intruksi_ppa_group').css("display", "block")
			$('#serah_terima_group').css("display", "block")
			$('#dokter_rujukan_group').css("display", "block")
			$('#rb_group').css("display", "none")

			if (is_doctor == "DOKTER")
				$('#serah_terima').val('Tidak')
			else
				$('#serah_terima').val('Ya')

			showAutoTemplate()
		}
	}

	// soap, sbar, adime, psp, sc, picu
	function showInputEditElement(metodeSelected) {
		let metodeArray = ['soap', 'sbar', 'adime', 'psp', 'sc', 'picu']
		if (metodeArray.includes(metodeSelected)) {
			for (metode of metodeArray) {
				if (metode == metodeSelected) {
					$('#' + metode + '_edit').css("display", "block")
					$('#' + metode + '_edit textarea').removeAttr("disabled")
				} else {
					$('#' + metode + '_edit').css("display", "none")
					$('#' + metode + '_edit textarea').attr("disabled", "true")
				}
			}
		} else {
			for (metode of metodeArray) {
				$('#' + metode + '_edit').css("display", "none")
				$('#' + metode + '_edit textarea').attr("disabled", "true")
			}
		}
	}

	function showInputEdit(metode_asesmen) {
		// $('#soap_edit textarea').val('')
		// $('#sbar_edit textarea').val('')
		// $('#psp_edit textarea').val('')
		// $('#sc_edit textarea').val('')
		if (metode_asesmen == 'SOAP')
			showInputEditElement('soap')
		else if (metode_asesmen == 'SBAR')
			showInputEditElement('sbar')
		else if (metode_asesmen == 'ADIME')
			showInputEditElement('adime')
	}

	function ttdPenerima(id_cppt) {
		$.ajax({
			url: base_url + 'cppt/ttdPenerima/' + id_cppt,
			method: "POST",
			data: $("form").serialize(),
			success: function(data) {
				tampil(visit_no, filter)
			}
		})
	}

	function ttdPenerimaCabak(id_cppt) {
		$.ajax({
			url: base_url + 'cppt/ttdPenerimaCabak/' + id_cppt,
			method: "POST",
			data: $("form").serialize(),
			dataType: 'JSON',
			success: function(data) {
				if (data.status == 200)
					a_ok("Berhasil", "Data berhasil diverifikasi")
				else if (data.status == 500)
					a_warning("Gagal", "Data gagal diverifikasi")
				tampil(visit_no, filter)
			}
		})
	}

	function ttdDPJP(id_cppt) {
		$.ajax({
			url: base_url + 'cppt/ttdDPJP/' + id_cppt,
			method: "POST",
			data: $("form").serialize(),
			success: function(data) {
				tampil(visit_no, filter)
			}
		})
	}

	function checkTtdDpjp1Day(visit_no, date) {
		$.ajax({
			url: base_url + 'cppt/checkTtdDpjp1Day/' + visit_no + '/' + date,
			method: "POST",
			data: $("form").serialize(),
			success: function(res) {
				let dateDate = new Date(date)
				let dateFormat = dateDate.toLocaleDateString("id-ID", {
					day: 'numeric',
					month: 'short',
					year: 'numeric'
				})

				Swal.fire({
					title: res + " data CPPT akan diverifikasi?",
					html: "Pada tanggal " + dateFormat,
					icon: "info",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					confirmButtonText: "Konfirmasi",
					cancelButtonColor: "#d33",
					cancelButtonText: "Batal",
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: 'TtdDpjp1Day/' + visit_no + '/' + date + '/' + res,
							type: 'POST',
							data: $("form").serialize(),
							success: function(response) {
								tampil(visit_no, filter)
							},
							error: function(err) {
								console.log(err)
								swalError('Error ' + err.status, err.statusText);
							}
						})
					}
				})
			}
		})
	}

	function checkTtdDpjpBeforeDate(visit_no, datetime) {
		$.ajax({
			url: base_url + 'cppt/checkTtdDpjpBeforeDate/' + visit_no + '/' + datetime,
			method: "POST",
			dataType: "JSON",
			data: $("form").serialize(),
			success: function(res) {
				let dateDate = new Date(datetime)
				let dateFormat = dateDate.toLocaleDateString("id-ID", {
					day: 'numeric',
					month: 'short',
					year: 'numeric',
					hour: 'numeric',
					minute: 'numeric',
				})

				Swal.fire({
					title: res + " data CPPT akan diverifikasi?",
					html: "Sebelum tanggal " + dateFormat,
					icon: "info",
					showCancelButton: true,
					confirmButtonColor: "#3085d6",
					confirmButtonText: "Konfirmasi",
					cancelButtonColor: "#d33",
					cancelButtonText: "Batal",
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: base_url + 'cppt/ttdDpjpBeforeDate/' + visit_no + '/' + datetime + '/' + res,
							type: 'POST',
							data: $("form").serialize(),
							dataType: 'JSON',
							success: function(response) {
								if (response.status == 200)
									a_ok("Berhasil", "Data Berhasil Diverifikasi")
								else if (response.status == 500)
									a_warning("Gagal", "Data Gagal Diverifikasi")
								else if (response.status == 405)
									a_error("Peringatan", "Mohon Hubungi IT")

								tampil(visit_no, filter)
							},
							error: function(err) {
								console.log(err)
								swalError('Error ' + err.status, err.statusText);
							}
						})
					}
				})
			}
		})
	}

	function data_edit(id_cppt) {
		$.ajax({
			url: base_url + 'cppt/data_edit/' + id_cppt,
			method: 'POST',
			dataType: 'JSON',
			success: function(data) {
				var regex = /<br\s*[\/]?>/gi;
				$("input[name='tanggal1']").val(data.tanggal)
				$("input[name='pukul1']").val(data.jam)
				$("input[name='ppa1']").val(data.ppa)
				$("select[name='metode_asesmen_edit']").val(data.metode_asesmen)
				showInputEdit(data.metode_asesmen)

				if (data.metode_asesmen == "SOAP") {
					$("#soap_s1").val((data.soap_s) ? data.soap_s.replace(regex, "") : '')
					$("#soap_o1").val((data.soap_o) ? data.soap_o.replace(regex, "") : '')
					$("#soap_a1").val((data.soap_a) ? data.soap_a.replace(regex, "") : '')
					$("#soap_p1").val((data.soap_p) ? data.soap_p.replace(regex, "") : '')
				} else if (data.metode_asesmen == "SBAR") {
					$("#sbar_s1").val((data.soap_s) ? data.soap_s.replace(regex, "") : '')
					$("#sbar_o1").val((data.soap_o) ? data.soap_o.replace(regex, "") : '')
					$("#sbar_a1").val((data.soap_a) ? data.soap_a.replace(regex, "") : '')
					$("#sbar_p1").val((data.soap_p) ? data.soap_p.replace(regex, "") : '')
				} else if (data.metode_asesmen == "ADIME") {
					let soap_p,
						adime_m = '',
						adime_e = ''
					if (data.soap_p) {
						soap_p = JSON.parse(data.soap_p)
						adime_m = soap_p[0]
						adime_e = soap_p[1]
					}
					$("#adime_a1").val((data.soap_s) ? data.soap_s.replace(regex, "") : '')
					$("#adime_d1").val((data.soap_o) ? data.soap_o.replace(regex, "") : '')
					$("#adime_i1").val((data.soap_a) ? data.soap_a.replace(regex, "") : '')
					$("#adime_m1").val((data.soap_p) ? adime_m.replace(regex, "") : '')
					$("#adime_e1").val((data.soap_p) ? adime_e.replace(regex, "") : '')
				}

				$("#intruksi_ppa1").val(data.intruksi_ppa)
				$('#serah_terima1').val(data.serah_terima)

				$('#dokter_rujukan1').val(data.id_dokter_rujukan).trigger('change')
			},
			err(e) {
				console.log(e)
			}
		})
	}

	function save_edit(visit_no, id_cppt) {
		$.ajax({
			url: base_url + 'cppt/edit_cppt/' + visit_no + '/' + id_cppt,
			type: "POST",
			data: $("#form_edit").serialize(),
			dataType: 'JSON',
			success: function(res) {
				console.log(res)
				if (res.status == 200)
					a_ok("Berhasil", "Data berhasil diperbarui")
				else if (res.status == 500)
					a_error("Gagal", "Data gagal diperbarui")
				else if (res.status == 405)
					a_error("Not Allowed", "Mohon Hubungi IT")

				$('#mdl-edit').modal('hide');
				tampil(visit_no, filter)
			},
			error: function(res) {
				console.log(res)
				a_error("Error", "Mohon Hubungi IT")
			}
		});
	}

	function empty_textarea() {
		$('#soap textarea').val('')
		$('#sbar textarea').val('')
		$('#adime textarea').val('')
		$('#psp textarea').val('')
		$('#sc textarea').val('')
		$('#intruksi_ppa').val('')
	}

	function validation() {
		// $('#myForm').validate({
		// 	ignore: ':hidden:not(:checkbox)',
		// 	errorElement: 'label',
		// 	errorClass: 'is-invalid',
		// 	validClass: 'is-valid',
		// 	rules: {
		// 		soap_s: {
		// 			required: true
		// 		}
		// 	}
		// })
	}

	function save() {
		currUrl = '<?= $link_insert ?>'
		console.log($("form").serializeArray())
		if ($('#metode_asesmen').val() == "SOAP" || $('#metode_asesmen').val() == "SOAP+JK") {
			if ($('#soap_s').val().length > 0 &&
				$('#soap_o').val().length > 0 &&
				$('#soap_a').val().length > 0 &&
				$('#soap_p').val().length > 0) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "SOAP+PK") {
			if ($('#soap_s').val().length > 0 &&
				$('#soap_o').val().length > 0 &&
				$('#soap_a').val().length > 0 &&
				$('#soap_p').val().length > 0 &&
				$('#smf').val().length > 0 &&
				$('#diagnosa').val().length > 0 &&
				$('#dokter_rujukan').val().length > 0) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "SBAR") {
			if ($('#sbar_s').val().length > 0 &&
				$('#sbar_b').val().length > 0 &&
				$('#sbar_a').val().length > 0 &&
				$('#sbar_r').val().length > 0 &&
				$('#dokter_rujukan').val().length > 0) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "SBAR+PDU") {
			if ($('#sbar_s').val().length > 0 &&
				$('#sbar_b').val().length > 0 &&
				$('#sbar_a').val().length > 0 &&
				$('#sbar_r').val().length > 0 &&
				$('#dokter_rujukan').val().length > 0 &&
				$('#tgl_pdu').val().length > 0 &&
				$('#alasan_pdu').val().length > 0 &&
				$('#dpjp_lama_pdu').val().length > 0 &&
				$('#dpjp_baru_pdu').val().length > 0) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						console.log($("form").serializeArray())
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "RB") {
			if ($('#dpjp_utama_rb').val().length > 0 &&
				$('#tgl_utama_rb').val().length > 0 &&
				$('#dpjp1_rb').val().length > 0 &&
				$('#tgl1_rb').val().length > 0
				// &&
				// $('#dpjp2_rb').val().length > 0 &&
				// $('#tgl2_rb').val().length > 0 &&
				// $('#dpjp3_rb').val().length > 0 &&
				// $('#tgl3_rb').val().length > 0
			) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						console.log($("form").serializeArray())
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "ADIME") {
			if (($('#adime_a').val().length > 0 &&
					$('#adime_d').val().length > 0 &&
					$('#adime_i').val().length > 0 &&
					$('#adime_m').val().length > 0 &&
					$('#adime_e').val().length > 0)) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "PSP") {
			if (($('#psp_s').val().length > 0 &&
					$('#psp_o').val().length > 0 &&
					$('#psp_a').val().length > 0 &&
					$('#psp_p').val().length > 0)) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "SC") {
			if (($('#sc_s').val().length > 0 &&
					$('#sc_o').val().length > 0 &&
					$('#sc_a').val().length > 0 &&
					$('#sc_p').val().length > 0)) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else if ($('#metode_asesmen').val() == "PICU") {
			if (($('#picu_s').val().length > 0 &&
					$('#picu_a').val().length > 0 &&
					$('#picu_p').val().length > 0)) {
				$.ajax({
					url: base_url + currUrl,
					method: "POST",
					data: $("form").serialize(),
					success: function() {
						a_ok("Berhasil", "Data berhasil ditambahkan")
						empty_textarea()
						tampil(visit_no, filter)
					}
				})
			} else
				a_warning("Peringatan", "Mohon diisi dengan penuh")
		} else
			a_warning("Peringatan", "Metode Asesmen Invalid")
	}

	function hapus(id_cppt) {
		if (confirm('Hapus data?')) {
			$.ajax({
				url: base_url + 'cppt/soft_delete/' + id_cppt,
				dataType: 'JSON',
				success: function(res) {
					res = JSON.parse(res)
					if (res.status == 200)
						a_warning("Berhasil", "Data berhasil dihapus")
					else if (res.status == 500)
						a_error("Gagal", "Data gagal dihapus")
					else if (res.status == 405)
						a_error("Not Allowed", "Mohon Hubungi IT")

					tampil(visit_no, filter)
				}
			});
		}
	}

	function tampil(visit_no, filter) {
		$.ajax({
			url: base_url + 'cppt/data_tampil_v3/' + visit_no + '/' + filter,
			dataType: 'JSON',
			beforeSend: function(res) {
				$('.loading').css('display', 'block')
			},
			success: function(data) {
				let dpjp = $("#dpjp").val().toUpperCase()
				let dpjpCode = $("#dpjpCode").val().toUpperCase()
				let dokter = $("#created_by").val().toUpperCase()
				let dokterCode = $("#created_code").val().toUpperCase()
				petugas = '<?= $this->session->userdata('User_Code') ?>'
				var html = "";
				for (i = 0; i < data.length; i++) {
					let soap = '';
					let is_doctor = '<?= $this->session->userdata("is_doctor") ?>'

					if (data[i].metode_asesmen == "SOAP" || data[i].metode_asesmen == "PSP" || data[i].metode_asesmen == "SC") {
						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="5%">S</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">O</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_o + `</td>
								</tr>
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">P</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_p + `</td>
								</tr>
							</table>
							`
					} else if (data[i].metode_asesmen == "SOAP+PK") {
						dataHapp = data[i].happ.split('|')
						happ = `
							<center><b><u>PERMINTAAN KONSULTASI</u></b></center><br>
							Yth TS.Prof/Dr: <span class="tulisan"><b>` + data[i].Rujukan_Name + `</b></span><br>
							SMF: <b><span class="tulisan">` + dataHapp[1] + `</span></b><br>
							Mohon konsul untuk advis / rawat bersama / ambil alih Pasien yang dirawat dengan diagnosa:<br>
							<b><span class="tulisan">` + dataHapp[2] + `</span></b><br><br>
							Atas bantuannya, diucapkan terima kasih<br>
							Salam sejawat<br><br>
							<b><span class="tulisan">` + dataHapp[3] + `</span></b>
							`
						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="5%">S</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">O</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_o + `</td>
								</tr>
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">P</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_p + `</td>
								</tr>
								<tr class="stempel">
									<td colspan="3">` + happ + `</td>
								</tr>
							</table>
							`;
					} else if (data[i].metode_asesmen == "SOAP+JK") {
						happ = `<center><b>JAWABAN KONSUL</b></center>`
						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="5%">S</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">O</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_o + `</td>
								</tr>
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">P</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_p + `</td>
								</tr>
								<tr class="stempel">
									<td colspan="3">` + happ + `</td>
								</tr>
							</table>
							`
					} else if (data[i].metode_asesmen == "SBAR") {
						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="5%">S</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">B</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_o + `</td>
								</tr>
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">R</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_p + `</td>
								</tr>
							</table>
							`
					} else if (data[i].metode_asesmen == "SBAR+PDU") {
						if (data[i].happ) {
							dataHapp = JSON.parse(data[i].happ)
							let tgl = dataHapp['tgl_pdu'].split('-')

							happ = `
								<table class="stempel">
									<tr>
										<td colspan="3" style="border:0 !important"><center><b><u>PERALIHAN DPJP UTAMA</u></b></center></td>
									</tr>
									<tr>
										<td style="border:0 !important"><b>Tgl/ Bln / Thn</b></td>
										<td style="border:0 !important">:</td>
										<td style="border:0 !important">` + tgl[2] + `/` + tgl[1] + `/` + tgl[0] + `</td>
									</tr>
									<tr>
										<td style="border:0 !important"><b>ALASAN</b></td>
										<td style="border:0 !important">:</td>
										<td style="border:0 !important">` + dataHapp['alasan_pdu'] + `</td>
									</tr>
									<tr>
										<td style="border:0 !important"><b>DPJP LAMA</b></td>
										<td style="border:0 !important">:</td>
										<td style="border:0 !important">` + dataHapp['dpjp_lama_pdu'] + `</td>
									</tr>
									<tr>
										<td style="border:0 !important"><b>DPJP BARU</b></td>
										<td style="border:0 !important">:</td>
										<td style="border:0 !important">` + dataHapp['dpjp_baru_pdu'] + `</td>
									</tr>
								</table>
							`
						} else
							happ = ``

						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="5%">S</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">B</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_o + `</td>
								</tr>
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">R</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_p + `</td>
								</tr>
								<tr>
									<td colspan="3">` + happ + `</td>
								</tr>
							</table>
							`
					} else if (data[i].metode_asesmen == "RB") {
						if (data[i].happ) {
							dataHapp = JSON.parse(data[i].happ)
							let tgl_utama = dataHapp['tgl_utama_rb'].split('-')
							let tgl1 = dataHapp['tgl1_rb'].split('-')
							let tgl2 = dataHapp['tgl2_rb'].split('-')
							let tgl3 = dataHapp['tgl3_rb'].split('-')

							let tgl_2 = tgl2[2] + `/` + tgl2[1] + `/` + tgl2[0]
							if (dataHapp['dpjp2_rb'] == '') {
								tgl_2 = '-';
							}
							let tgl_3 = tgl3[2] + `/` + tgl3[1] + `/` + tgl3[0]
							if (dataHapp['dpjp3_rb'] == '') {
								tgl_3 = '-';
							}

							happ = `
								<table class="stempel">
									<tr>
										<td><center><b><u>RAWAT BERSAMA</u></b></center></td>
										<td><center><b><u>Tgl/ Bln/ Thn</u></b></center></td>
									</tr>
									<tr>
										<td><b>DPJP UTAMA:</b> ` + dataHapp['dpjp_utama_rb'] + `</td>
										<td>` + tgl_utama[2] + `/` + tgl_utama[1] + `/` + tgl_utama[0] + `</td>
									</tr>
									<tr>
										<td><b>DPJP:</b> ` + dataHapp['dpjp1_rb'] + `</td>
										<td>` + tgl1[2] + `/` + tgl1[1] + `/` + tgl1[0] + `</td>
									</tr>
									<tr>
										<td><b>DPJP:</b> ` + dataHapp['dpjp2_rb'] + `</td>
										<td>` + tgl_2 + `</td>
									</tr>
									<tr>
										<td><b>DPJP:</b> ` + dataHapp['dpjp3_rb'] + `</td>
										<td>` + tgl_3 + `</td>
									</tr>
								</table>
							`
						} else
							happ = ``

						soap = happ
					} else if (data[i].metode_asesmen == "ADIME") {
						let soap_p,
							adime_m = '',
							adime_e = ''
						if (data[i].soap_p) {
							soap_p = JSON.parse(data[i].soap_p)
							adime_m = soap_p[0]
							adime_e = soap_p[1]
						}

						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">D</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_o + `</td>
								</tr>
								<tr>
									<th width="5%">I</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">M</th>
									<th width="3%">:</th>
									<td>` + adime_m + `</td>
								</tr>
								<tr>
									<th width="5%">E</th>
									<th width="3%">:</th>
									<td>` + adime_e + `</td>
								</tr>
							</table>
							`
					} else if (data[i].metode_asesmen == "PICU") {
						soap = `
							<table class="table table-borderless soap" border="0" width="100%">
								<tr>
									<th width="15%">S + O</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_s + `</td>
								</tr>
								<tr>
									<th width="5%">A</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_a + `</td>
								</tr>
								<tr>
									<th width="5%">P</th>
									<th width="3%">:</th>
									<td>` + data[i].soap_p + `</td>
								</tr>
							</table>
							`
					}

					// ===== SERAH TERIMA =====
					let txtSerahTerima = '';
					let createdby_Name = data[i].created_by

					if (data[i].CreatedBy_Name)
						createdby_Name = data[i].CreatedBy_Name

					if (data[i].serah_terima == 'Ya' && data[i].metode_asesmen != 'RB') {
						if (data[i].penerima) {
							txtPenerima = `
								<td align="center">
									Diterima  <br />
									<img src="` + jika_null(data[i].penerima_ttd) + `" width="75px"> <br />
									(` + data[i].penerima + `)
								</td>
								`
						} else if (!data[i].penerima && data[i].created_by != petugas) {
							let ppa = data[i].ppa.toUpperCase()
							if (ppa != "DOKTER")
								ppa = "USER"
							if (ppa == is_doctor)
								txtPenerima = `
									<td align="center" style="vertical-align: middle !important;">
										<button type="button" data-id="` + data[i].id_cppt + `"  class="btn btn-success btn-sm btnTerima">Terima</button>
									</td>
									`
							else
								txtPenerima = `
									<td align="center" style="vertical-align: middle !important;">
										Belum diterima
									</td>
									`
						} else {
							txtPenerima = `
								<td align="center" style="vertical-align: middle !important;">
									Belum diterima
								</td>
								`
						}

						txtSerahTerima = `
							<table class="stempel" width="100%">
								<tr>
									<td colspan="2" align="center"><b>SERAH TERIMA</b></td>
								</tr>
								<tr>
									<td align="center" width="50%">
										Diserahkan  <br />
										<img src="` + jika_null(data[i].petugas_ttd) + `" width="75px"> <br />
										(` + createdby_Name + `)
									</td>
									` + txtPenerima + `
								</tr>
							</table>
							`
					} else if (data[i].metode_asesmen != 'RB') {
						txtSerahTerima = `
							<span>Penginput : ` + createdby_Name + ` </span> <br>
							<img src="` + jika_null(data[i].petugas_ttd) + `" width="75px"> <br />
							`
					} else {
						txtSerahTerima = ``
					}

					// ===== PPA =====
					let intruksiPPA = ''
					if (data[i].metode_asesmen == "SBAR" || data[i].metode_asesmen == "SBAR+PDU") {
						// ===== INSTRUKSI PPA ======
						if (data[i].penerima_ttd) {
							intruksiPPA = `
								<table class="stempel" width="100%">
									<tr>
										<td align="center"><b>CABAK</b></td>
									</tr>
									<tr>
										<td class='text-center'>
											Pemberi Intruksi  <br />
											<img src="` + jika_null(data[i].penerima_ttd) + `" width="75px"> <br />
											(` + jika_null(data[i].penerima) + `) <br />
											` + date_dmy(data[i].penerima_time) + `, ` + date_hi(data[i].penerima_time) + ` WIB
										</td>
									</tr>
								</table>
								`
						} else if (!data[i].penerima_ttd) {
							let is_doctor = '<?= $this->session->userdata("is_doctor") ?>'
							let currentDoctorCode = '<?= $this->session->userdata("User_Code") ?>'
							let dpjpCode = '<?= $detail['AttDoctorCode'] ?>'
							let dpjpName = '<?= $detail['AttDoctorName'] ?>'
							let sign
							if (is_doctor == "DOKTER" && currentDoctorCode == data[i].id_dokter_rujukan) {
								// dokter rujukan has been input-ed or exists
								sign = `<button type="button" data-id="` + data[i].id_cppt + `"  class="btn btn-success btn-sm btnEditDateTime">Terima</button>`
							} else if (is_doctor == "DOKTER" && !data[i].id_dokter_rujukan && currentDoctorCode == dpjpCode) {
								// dokter rujukan hasnt been input-ed or not exists
								sign = `<button type="button" data-id="` + data[i].id_cppt + `"  class="btn btn-success btn-sm btnEditDateTime">Terima</button>`
							} else if (data[i].id_dokter_rujukan)
								sign = '(' + data[i].Rujukan_Name + ')'
							else
								sign = '(' + dpjpName + ')'
							intruksiPPA = `
								<table class="stempel" width="100%">
									<tr>
										<td align="center"><b>CABAK</b></td>
									</tr>
									<tr>
										<td align="center">
											Pemberi Intruksi <br><br>
											` + sign + `
										</td>
									</tr>
								</table>
								`
						}
					} else
						intruksiPPA = ``

					// ===== VERIFIKASI ======
					let btnVerif = ''
					let doctorCode = '<?= $this->session->userdata("User_Code") ?>'
					let doctorCodePatient = '<?= $detail['AttDoctorCode'] ?>'
					// if (!data[i].penerima_ttd && data[i].serah_terima == 'Ya')
					// 	btnVerif = `Menunggu TTD Penerima`;
					if (doctorCode == doctorCodePatient && !data[i].ttd_dpjp) {
						btnVerif = `<button type="button" data-tanggal="` + data[i].tanggal + `" data-jam="` + data[i].jam + `" data-visit_no="` + data[i].visit_no + `" class="btn btn-success btn-sm btnVerif">Verifikasi</button>`;
					} else {
						//ttd dpjp
						if (data[i].ttd_dpjp) {
							btnVerif = `
								<p>` + jika_null(data[i].review_dpjp) + `</p>
								<img width="75px" src="` + data[i].ttd_dpjp + `">
								`
						} else
							btnVerif = `Belum Diverifikasi`;
					}

					let intruski_ppa = ''
					if (data[i].intruksi_ppa)
						intruski_ppa = data[i].intruksi_ppa

					html +=
						`<tr>
							<td width="90" class="text-center">` + date_dmy(data[i].tanggal) + `<br>` + data[i].jam + `</td>
							<td>` + data[i].ppa + `</td>
							<td>` + soap + txtSerahTerima + `</td>
							<td>
								` + intruski_ppa + ` <br />
								` + intruksiPPA + `
							</td>
							<td style="vertical-align: middle !important; text-align:center;">` + btnVerif + `</td>
						`

					if (user_code == 'IT') {
						if (data[i].metode_asesmen == 'SOAP' || data[i].metode_asesmen == 'SBAR' || data[i].metode_asesmen == 'ADIME')
							html +=
							`<td width="115px" style="vertical-align: middle !important; text-align: center;">
									<button data-id="` + data[i].id_cppt + `" class="btn btn-warning btn-sm text-white mt-1" style="cursor: pointer;" id="edit-cppt"><i class="ti ti-pencil-alt"></i></button><br>
									<button data-id="` + data[i].id_cppt + `" class="btn btn-danger btn-sm text-white mt-1" style="cursor: pointer;" id="hapus-cppt"><i class="fa fa-trash"></i></button>
								</td>
							</tr>`
					} else if (is_doctor == 'DOKTER' && data[i].metode_asesmen == "SOAP") {
						html +=
							`<td width="115px" style="vertical-align: middle !important; text-align: center;">
									<button data-id="` + data[i].id_cppt + `" class="btn btn-warning btn-sm text-white mt-1" style="cursor: pointer;" id="edit-cppt"><i class="ti ti-pencil-alt"></i></button><br>
									<button data-id="` + data[i].id_cppt + `" class="btn btn-danger btn-sm text-white mt-1" style="cursor: pointer;" id="hapus-cppt"><i class="fa fa-trash"></i></button>
								</td>
							</tr>`
					} else if (data[i].created_by == user_code) {
						if (!data[i].ttd_dpjp) {
							if (data[i].metode_asesmen == 'SOAP' || data[i].metode_asesmen == 'SBAR' || data[i].metode_asesmen == 'ADIME')
								html +=
								`<td width="115px" style="vertical-align: middle !important; text-align: center;">
										<button data-id="` + data[i].id_cppt + `" class="btn btn-warning btn-sm text-white mt-1" style="cursor: pointer;" id="edit-cppt"><i class="ti ti-pencil-alt"></i></button><br>
										<button data-id="` + data[i].id_cppt + `" class="btn btn-danger btn-sm text-white mt-1" style="cursor: pointer;" id="hapus-cppt"><i class="fa fa-trash"></i></button>
									</td>
								</tr>`
						}
					} else {
						html +=
							`<td width="115px" style="vertical-align: middle !important; text-align: center;">
								&nbsp;
							</td>
               			</tr>`
					}
				}
				let empty_data = `
					<tr>
						<td colspan="6" class="text-center"><b>Tidak Ada Data</b></td>
					</tr>
				`
				if (html)
					$("#list_cppt").html(html)
				else
					$("#list_cppt").html(empty_data)
			},
			complete: function(res) {
				$('.loading').css('display', 'none')
			}
		})
	}

	function showAutoTemplate() {
		// ===== AUTO ADD LASTEST TEMPLATE ======
		// ===== PSP START =====
		$.ajax({
			url: base_url + 'template/dataTemplate/' + id_form + '/psp_s',
			type: 'POST',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				if (data && data.length > 0)
					$('#psp_s').val(data[0].isi)
			}
		})
		$.ajax({
			url: base_url + 'template/dataTemplate/' + id_form + '/psp_o',
			type: 'POST',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				if (data && data.length > 0)
					$('#psp_o').val(data[0].isi)
			}
		})
		$.ajax({
			url: base_url + 'template/dataTemplate/' + id_form + '/psp_a',
			type: 'POST',
			dataType: 'JSON',
			async: false,
			success: function(data) {
				if (data && data.length > 0)
					$('#psp_a').val(data[0].isi)
			}
		})
	}
	// ===== TEMPLATE START =====
	const id_form = '7';
	let field = '';
	$(document).ready(function() {
		// display laporan 
		$('#metode_asesmen').on('change', function() {
			var demovalue = $(this).val()
			$("div.myDiv").hide()
			$("#show" + demovalue).show()
		})

		// template
		$(".addTemp").click(function(e) {
			e.preventDefault()
			field = $(this).data('field')
			tampilTemplate(field)
			$("#mdlTemplate").modal('show')
		})

		$("#btnSimpanTemp").click(function(e) {
			e.preventDefault()
			if ($("#isi").val() == '' || $("#nama").val() == '') {
				Swal.fire(
					'Maaf!',
					'Harap Isi Nama dan Isi Template terlebih dahulu!',
					'warning'
				)
			} else {
				saveTemp(field)
			}
		})

		$('#tblTemp tbody').on('click', '.btnUse', function(e) {
			e.preventDefault();
			let isi = $(this).data('isi')
			if (confirm('Pilih Template?')) {
				let metode_asesmen = $('#metode_asesmen').val().toLowerCase()
				if (metode_asesmen == "soap+pk") {
					metode_asesmen = "soap"
				}
				console.log(metode_asesmen)
				$('#' + metode_asesmen + ' #' + field).val(isi)
				$("#mdlTemplate").modal('hide')
			}
		})

		$("#tblTemp tbody").on('click', '.btnHpsTemp', function(e) {
			e.preventDefault();
			let id = $(this).data('id')
			hapusTemp(id, field)
		})
	})

	function hapusTemp(id, field) {
		if (confirm('Hapus data?')) {
			$.ajax({
				url: base_url + 'template/hapusTemp/' + id,
				success: function() {
					tampilTemplate(field)
				}
			})
		}
	}

	function saveTemp(field) {
		$.ajax({
			url: base_url + 'template/saveTemp/' + id_form + '/' + field,
			method: "POST",
			data: $("#formTemp").serialize(),
			success: function(data) {
				$('#formTemp')[0].reset()
				$('#mdlTemp').modal('hide')
				tampilTemplate(field)
			}
		});
	}

	function tampilTemplate(field) {
		$.ajax({
			url: base_url + 'template/dataTemplate/' + id_form + '/' + field,
			type: 'post',
			dataType: 'json',
			async: false,
			success: function(data) {
				var html = '';
				for (let i = 0; i < data.length; i++) {
					n = i + 1;
					html += `
						<tr>
							<td>` + data[i].nama + `</td>
							<td>` + data[i].isi + `</td>
							<td class="text-center">
								<button class="btn btn-danger btn-sm btnHpsTemp" data-id="` + data[i].id_template + `"><i class="fa fa-trash"></i></button>
								<button class="btn btn-info btn-sm btnUse" data-id="` + data[i].id_template + `" data-isi="` + data[i].isi + `"><i class="fa fa-arrow-right"></i></button>
							</td>
						</tr>
					`;
				}
				$('#tblTemp').DataTable().clear().destroy();
				$("#tblTemp tbody").html(html);
				$('#tblTemp').DataTable({
					"autoWidth": false,
					"columnDefs": [{
							"width": "25%",
							"targets": 0
						},
						{
							"width": "23%",
							"targets": 2
						}
					]
				});
			}
		})
	}
	// ===== TEMPLATE END =====
</script>