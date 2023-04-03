<div class="col-lg-12 col-12">
	<!-- Basic Forms -->
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- /.box-header -->
		<form>
			<div class="box-body">
				<!-- <h4 class="mt-0 mb-20">1. Customer Info:</h4> -->
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="tanggal_masuk">Tanggal Masuk</label>
							<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
								value='<?= date('Y-m-d', strtotime($detail['Visit_Date'])) ?>'>
						</div>
					</div>
					<!-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="jam_masuk">Jam</label>
                            <input type="time" name="jam_masuk" id="jam_masuk" class="form-control" value='<?= date('H:i', strtotime($detail['InTime'])) ?>'>
                        </div>
                    </div> -->
					<!-- <div class="col-md-2">
                    </div> -->
					<div class="col-md-3">
						<div class="form-group">
							<label for="tanggal_keluar">Tanggal Keluar / Tanggal Meninggal</label>
							<input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control"
								value='<?= date('Y-m-d', strtotime($detail['Visit_Date'])) ?>'>
						</div>
					</div>
					<!-- <div class="col-md-2">
                        <div class="form-group">
                            <label for="jam_keluar">Jam</label>
                            <input type="time" name="jam_keluar" id="jam_keluar" class="form-control" value='<?= date('H:i', strtotime($detail['InTime'])) ?>'>
                        </div>
                    </div> -->
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="ruang_rawat_akhir">Ruang Rawat Terakhir</label>
							<input type="text" name="ruang_rawat_akhir" id="ruang_rawat_akhir" class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="penanggung_pembayaran">Penanggung Pembayaran</label>
							<input type="text" name="penanggung_pembayaran" id="penanggung_pembayaran"
								class="form-control">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="dpjp">Dokter Penanggungjawab (DPJP) Utama</label>
							<input type="text" name="dpjp" id="dpjp" class="form-control"
								value="<?= (!empty($detail['AttDoctorName'])) ? $detail['AttDoctorName'] : '' ?>">
						</div>
					</div>
					<hr />
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tim_dokter">Rawat Tim Dokter</label>
							<div class="radio">
								<input name="tim_dokter" type="radio" id="tim_dokter1" value="Tidak">
								<label for="tim_dokter1">Tidak</label>
							</div>
							<div class="radio">
								<input name="tim_dokter" type="radio" id="tim_dokter2" value="Ya">
								<label for="tim_dokter2">Ya</label>
							</div>
						</div>
					</div>
					<div class="row" id="panel_tim_dokter">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter1" id="tim_dokter1" class="form-control"
									placeholder="Nama Dokter">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter2" id="tim_dokter2" class="form-control"
									placeholder="Nama Dokter">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter3" id="tim_dokter3" class="form-control"
									placeholder="Nama Dokter">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter4" id="tim_dokter4" class="form-control"
									placeholder="Nama Dokter">
							</div>
						</div>
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="indikasi_dirawat">Indikasi Dirawat</label>
							<textarea rows="3" name="indikasi_dirawat" id="indikasi_dirawat" class="form-control"
								placeholder="Indikasi Dirawat"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa_masuk">Diagnosa Masuk</label>
							<textarea rows="3" name="diagnosa_masuk" id="diagnosa_masuk" class="form-control"
								placeholder="Diagnosa Masuk"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa_keluar">Diagnosa Keluar (Diagnosa Utama)</label>
							<textarea rows="3" name="diagnosa_keluar" id="diagnosa_keluar" class="form-control"
								placeholder="Diagnosa Keluar (Diagnosa Utama)"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa_sekunder">Diagnosa Sekunder</label>
							<textarea rows="3" name="diagnosa_sekunder" id="diagnosa_sekunder" class="form-control"
								placeholder="Diagnosa Sekunder"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="penyebab_kematian">Penyebab Kematian (secara klinis)</label>
							<textarea rows="3" name="penyebab_kematian" id="penyebab_kematian" class="form-control"
								placeholder="Penyebab Kematian (secara klinis)"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="pemeriksaan_fisik">Pemeriksaan Fisik yang Penting</label>
							<textarea rows="3" name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control"
								placeholder="Pemeriksaan Fisik yang Penting"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="laboratorium">Laboratorium yang Penting</label>
							<textarea rows="3" name="laboratorium" id="laboratorium" class="form-control"
								placeholder="Laboratorium yang Penting"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="radiologi">Radiologi</label>
							<textarea rows="3" name="radiologi" id="radiologi" class="form-control"
								placeholder="Radiologi"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="penunjang_lain">Penunjang Lain</label>
							<textarea rows="3" name="penunjang_lain" id="penunjang_lain" class="form-control"
								placeholder="Penunjang Lain"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="tindakan">Tindakan / Prosedur Medis</label>
							<textarea rows="3" name="tindakan" id="tindakan" class="form-control"
								placeholder="Tindakan / Prosedur Medis"></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="pengobatan">Pengobatan Selama Dirawat</label>
							<textarea rows="3" name="pengobatan" id="pengobatan" class="form-control"
								placeholder="Pengobatan Selama Dirawat"></textarea>
						</div>
					</div>

					<!-- kondisi saat pulang -->
					<?php
                        // $temp_Val = isset($row['kondisi_pulang']) ? $row['kondisi_pulang'] : '';;
                        // if (!empty($temp_Val))
                        //     $Val = explode("|", $temp_Val);

                        $dataVal = [
                            "Sembuh",
                            "PBJ",
                            "Pindah RS",
                            "Pulang atas permintaan sendiri",
                            "Meninggal",
                            "Lain-lain"
                        ];
                    ?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="kondisi_pulang">Kondisi Saat Pulang</label>
							<?php for ($i = 0; $i < sizeof($dataVal); $i++): ?>
							<div class="radio">
								<input name="kondisi_pulang" type="radio" id="kondisi_pulang<?= $i ?>"
									value="<?= $dataVal[$i] ?>"
									<?= (!empty($Val)) ? ((in_array($dataVal[$i], $Val)) ? 'checked' : '') : '' ?>>
								<label for="kondisi_pulang<?= $i ?>"><?= $dataVal[$i] ?></label>
							</div>
							<?php endfor; ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="intruksi_lanjutan">Instruksi dan Edukasi Lanjutan</label>
							<textarea rows="3" name="intruksi_lanjutan" id="intruksi_lanjutan" class="form-control"
								placeholder="Instruksi dan Edukasi Lanjutan"></textarea>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="diet">Diet</label>
							<textarea rows="3" name="diet" id="diet" class="form-control" placeholder="Diet"></textarea>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tgl_kontrol_ulang">Hari / Tanggal / Jam Kontrol Ulang</label>
							<input type="datetime-local" name="tgl_kontrol_ulang" id="tgl_kontrol_ulang"
								class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="latihan">Latihan</label>
							<textarea rows="3" name="latihan" id="latihan" class="form-control"
								placeholder="Latihan"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="diklinik_spesialis">Di klinik Spesialis</label>
							<textarea rows="3" name="diklinik_spesialis" id="diklinik_spesialis" class="form-control"
								placeholder="Di klinik Spesialis"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kembali_ke_igd">Segera kembali ke IGD bila terjadi</label>
							<textarea rows="3" name="kembali_ke_igd" id="kembali_ke_igd" class="form-control"
								placeholder="Segera kembali ke IGD bila terjadi"></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="rumah_sakit">Rumah Sakit</label>
							<textarea rows="3" name="rumah_sakit" id="rumah_sakit" class="form-control"
								placeholder="Rumah Sakit"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
                        <label for="nama_obat" style="font-weight:500">Terapi Pulang</label>
						<table class="table table-sm">
							<thead class="text-primary" style="font-size: 0.75rem;">
								<tr>
									<th width="500">Nama Obat</th>
									<th>Satuan</th>
									<th>Jumlah</th>
									<th>Dosis</th>
									<th>Frekuensi</th>
									<th></th>
								</tr>
								<tr>
									<th>
										<input name="nama_obat" type="text" class="form-control">
									</th>
									<th>
										<input name="satuan" type="text" class="form-control">
									</th>
									<th>
										<input name="jumlah" type="text" class="form-control">
									</th>
									<th>
										<input name="dosis" type="text" class="form-control">
									</th>
									<th>
										<input name="frekuensi" type="text" class="form-control">
									</th>
									<th>
										<button class="btn btn-primary" id="add_rp"><i
												class="ti-plus"></i></button>
									</th>
								</tr>
							</thead>
							<tbody id="list_rp">
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="reset" class="btn btn-rounded btn-danger">Batal</button>
				<button type="submit" class="btn btn-rounded btn-success pull-right">Simpan</button>
			</div>
		</form>
	</div>
	<!-- /.box -->
</div>

<script type="text/javascript">
	$('#panel_tim_dokter').hide()

	$(document).ready(function () {
		// Rawat Tim Dokter
		$('input[name="tim_dokter"]').on('change', function () {
			let value = $(this).val();
			if (value == 'Tidak')
				$('#panel_tim_dokter').hide()
			else
				$('#panel_tim_dokter').show()
		});
	})

</script>
