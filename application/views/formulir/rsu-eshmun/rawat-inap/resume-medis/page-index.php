<div class="col-lg-12 col-12">
	<!-- Basic Forms -->
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form id="form-data">
				<input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>">
				<input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>">
				<input type="hidden" name="wajib" id="wajib"
					value="<?= (!empty($row['wajib'])) ? $row['wajib'] : true ?>">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="tanggal_masuk">Tanggal Masuk</label>
							<input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
								value='<?= (!empty($row['tanggal_masuk'])) ? $row['tanggal_masuk'] : date('Y-m-d', strtotime($detail['Visit_Date'])) ?>'>
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
								value='<?= (!empty($row['tanggal_keluar'])) ? $row['tanggal_keluar'] : date('Y-m-d') ?>'>
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
							<input type="text" name="ruang_rawat_akhir" id="ruang_rawat_akhir" class="form-control"
								value="<?= (!empty($row['ruang_rawat_akhir'])) ? $row['ruang_rawat_akhir'] : '' ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="penanggung_pembayaran">Penanggung Pembayaran</label>
							<input type="text" name="penanggung_pembayaran" id="penanggung_pembayaran"
								class="form-control"
								value="<?= (!empty($row['penanggung_pembayaran'])) ? $row['penanggung_pembayaran'] : '' ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="dpjp">Dokter Penanggungjawab (DPJP) Utama</label>
							<input type="text" name="dpjp" id="dpjp" class="form-control"
								value="<?= (!empty($row['dpjp'])) ? $row['dpjp'] : $detail['AttDoctorName'] ?>">
						</div>
					</div>
					<hr />
				</div>
				<div class="row not-req">
					<div class="col-md-2">
						<div class="form-group">
							<?php
								$temp_Val = isset($row['tim_dokter']) ? $row['tim_dokter'] : '';;
								if (!empty($temp_Val))
									$Val = explode("|", $temp_Val);
			
								$dataVal = [
									"Tidak",
									"Ya",
								];
							?>
							<label for="tim_dokter">Rawat Tim Dokter</label>
							<?php for ($i = 0; $i < sizeof($dataVal); $i++): ?>
							<div class="radio">
								<input class="form-control" name="tim_dokter" type="radio" id="tim_dokter<?= $i ?>"
									value="<?= $dataVal[$i] ?>"
									<?= (!empty($Val)) ? ((in_array($dataVal[$i], $Val)) ? 'checked' : '') : '' ?>>
								<label for="tim_dokter<?= $i ?>"><?= $dataVal[$i] ?></label>
							</div>
							<?php endfor; ?>
						</div>
					</div>
					<div class="row" id="panel_tim_dokter">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter1" id="tim_dokter1" class="form-control"
									placeholder="Nama Dokter"
									value="<?= (!empty($row['tim_dokter1'])) ? $row['tim_dokter1'] : '' ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter2" id="tim_dokter2" class="form-control"
									placeholder="Nama Dokter"
									value="<?= (!empty($row['tim_dokter2'])) ? $row['tim_dokter2'] : '' ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter3" id="tim_dokter3" class="form-control"
									placeholder="Nama Dokter"
									value="<?= (!empty($row['tim_dokter3'])) ? $row['tim_dokter3'] : '' ?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="tim_dokter4" id="tim_dokter4" class="form-control"
									placeholder="Nama Dokter"
									value="<?= (!empty($row['tim_dokter4'])) ? $row['tim_dokter4'] : '' ?>">
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
								placeholder="Indikasi Dirawat"> <?= (!empty($row['indikasi_dirawat'])) ? $row['indikasi_dirawat'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa_masuk">Diagnosa Masuk</label>
							<textarea rows="3" name="diagnosa_masuk" id="diagnosa_masuk" class="form-control"
								placeholder="Diagnosa Masuk"><?= (!empty($row['diagnosa_masuk'])) ? $row['diagnosa_masuk'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa_keluar">Diagnosa Keluar (Diagnosa Utama)</label>
							<textarea rows="3" name="diagnosa_keluar" id="diagnosa_keluar" class="form-control"
								placeholder="Diagnosa Keluar (Diagnosa Utama)"><?= (!empty($row['diagnosa_keluar'])) ? $row['diagnosa_keluar'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa_sekunder">Diagnosa Sekunder</label>
							<textarea rows="3" name="diagnosa_sekunder" id="diagnosa_sekunder" class="form-control"
								placeholder="Diagnosa Sekunder"><?= (!empty($row['diagnosa_sekunder'])) ? $row['diagnosa_sekunder'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="penyebab_kematian">Penyebab Kematian (secara klinis)</label>
							<textarea rows="3" name="penyebab_kematian" id="penyebab_kematian" class="form-control"
								placeholder="Penyebab Kematian (secara klinis)"><?= (!empty($row['penyebab_kematian'])) ? $row['penyebab_kematian'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="pemeriksaan_fisik">Pemeriksaan Fisik yang Penting</label>
							<textarea rows="3" name="pemeriksaan_fisik" id="pemeriksaan_fisik" class="form-control"
								placeholder="Pemeriksaan Fisik yang Penting"><?= (!empty($row['pemeriksaan_fisik'])) ? $row['pemeriksaan_fisik'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="laboratorium">Laboratorium yang Penting</label>
							<textarea rows="3" name="laboratorium" id="laboratorium" class="form-control"
								placeholder="Laboratorium yang Penting"><?= (!empty($row['laboratorium'])) ? $row['laboratorium'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="radiologi">Radiologi</label>
							<textarea rows="3" name="radiologi" id="radiologi" class="form-control"
								placeholder="Radiologi"><?= (!empty($row['radiologi'])) ? $row['radiologi'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="penunjang_lain">Penunjang Lain</label>
							<textarea rows="3" name="penunjang_lain" id="penunjang_lain" class="form-control"
								placeholder="Penunjang Lain"><?= (!empty($row['penunjang_lain'])) ? $row['penunjang_lain'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="tindakan">Tindakan / Prosedur Medis</label>
							<textarea rows="3" name="tindakan" id="tindakan" class="form-control"
								placeholder="Tindakan / Prosedur Medis"><?= (!empty($row['tindakan'])) ? $row['tindakan'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="pengobatan">Pengobatan Selama Dirawat</label>
							<textarea rows="3" name="pengobatan" id="pengobatan" class="form-control"
								placeholder="Pengobatan Selama Dirawat"><?= (!empty($row['pengobatan'])) ? $row['pengobatan'] : '' ?></textarea>
						</div>
					</div>

					<!-- kondisi saat pulang -->
					<?php
						$temp_Val = isset($row['kondisi_pulang']) ? $row['kondisi_pulang'] : '';;
						if (!empty($temp_Val))
							$Val = explode("|", $temp_Val);

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
								<input class="form-control" name="kondisi_pulang" type="radio"
									id="kondisi_pulang<?= $i ?>" value="<?= $dataVal[$i] ?>"
									<?= (!empty($Val)) ? ((in_array($dataVal[$i], $Val)) ? 'checked' : '') : '' ?>>
								<label for="kondisi_pulang<?= $i ?>"><?= $dataVal[$i] ?></label>
							</div>
							<?php endfor; ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="keterangan_pulang">Keterangan Pulang</label>
							<textarea rows="3" name="keterangan_pulang" id="keterangan_pulang" class="form-control"
								placeholder="Keterangan Pulang"><?= (!empty($row['keterangan_pulang'])) ? $row['keterangan_pulang'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="intruksi_lanjutan">Instruksi dan Edukasi Lanjutan</label>
							<textarea rows="3" name="intruksi_lanjutan" id="intruksi_lanjutan" class="form-control"
								placeholder="Instruksi dan Edukasi Lanjutan"><?= (!empty($row['intruksi_lanjutan'])) ? $row['intruksi_lanjutan'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="diet">Diet</label>
							<textarea rows="3" name="diet" id="diet" class="form-control"
								placeholder="Diet"><?= (!empty($row['diet'])) ? $row['diet'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tgl_kontrol_ulang">Hari / Tanggal / Jam Kontrol Ulang</label>
							<input type="datetime-local" name="tgl_kontrol_ulang" id="tgl_kontrol_ulang"
								class="form-control"
								value="<?= (!empty($row['tgl_kontrol_ulang'])) ? $row['tgl_kontrol_ulang'] : '' ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="latihan">Latihan</label>
							<textarea rows="3" name="latihan" id="latihan" class="form-control"
								placeholder="Latihan"><?= (!empty($row['latihan'])) ? $row['latihan'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="diklinik_spesialis">Di klinik Spesialis</label>
							<textarea rows="3" name="diklinik_spesialis" id="diklinik_spesialis" class="form-control"
								placeholder="Di klinik Spesialis"><?= (!empty($row['diklinik_spesialis'])) ? $row['diklinik_spesialis'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kembali_ke_igd">Segera kembali ke IGD bila terjadi</label>
							<textarea rows="3" name="kembali_ke_igd" id="kembali_ke_igd" class="form-control"
								placeholder="Segera kembali ke IGD bila terjadi"><?= (!empty($row['kembali_ke_igd'])) ? $row['kembali_ke_igd'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="rumah_sakit">Rumah Sakit</label>
							<textarea rows="3" name="rumah_sakit" id="rumah_sakit" class="form-control"
								placeholder="Rumah Sakit"><?= (!empty($row['rumah_sakit'])) ? $row['rumah_sakit'] : '' ?></textarea>
						</div>
					</div>
				</div>
			</form>
			<!-- Bagian Terapi Pulang -->
			<form id="form-data-2">
				<div class="row">
					<div class="col-md-12">
						<label for="nama_obat" style="font-weight:500">Terapi Pulang</label>
						<table class="table table-sm not-req">
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
										<button class="btn btn-primary" id="save_list">
											<i class="ti-angle-double-down"></i></button>
									</th>
								</tr>
							</thead>
							<tbody id="list_row">
							</tbody>
						</table>
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

<!-- script formulir -->
<script type="text/javascript">
	// declare
	let visit_no = $('#visit_no').val();
	let controller = '<?= $controller ?>';
	let field = '<?= $field ?>';
	let table = '<?= $table ?>';
	let cek = '<?= (!empty($row['status'])) ? $row['status'] : '' ?>';
	let tidak_lengkap;
	let panel = $('#panel_tim_dokter');
	let panel_input = $('#panel_tim_dokter input:first');

	// Rawat Tim Dokter
	$("input, textarea, select, .radio.form-control").addClass('required');
	$(".not-req input").removeClass('required');

	$(document).ready(function () {
		// list terapi obat
		get_list()

		// tim dokter
		$('input[name="tim_dokter"]').on('change', function () {
			let value = $(this).val();
			if (value == 'Tidak') {
				panel_input.addClass('not-required');
				panel_input.removeClass('required');
				panel.hide()
			} else {
				panel_input.removeClass('not-required');
				if ($("#wajib").val() == 1) {
					panel_input.addClass('required');
				}
				panel.show()
			}
		});

		// kondisi untuk panel_tim_dokter dan tidak mandatory
		if ($('input[name="tim_dokter"]:checked').val() == 'Tidak') {
			panel_input.addClass('not-required');
			panel.hide()
		} else if ($('input[name="tim_dokter"]:checked').val() == 'Ya') {
			panel_input.removeClass('not-required');
			panel.show()
		} else {
			panel_input.addClass('not-required');
			panel.hide()
		}


		$('#simpan').click(function (e) {
			e.preventDefault()
			if (validate()) {
				$('#link_print').removeClass('disabled', true);
				console.log($('#form-data').serializeArray());
				tidak_lengkap = cek_field_kosong($('#form-data').serializeArray())
				save(tidak_lengkap)
			} else {
				a_error('Peringatan',
					'Lengkapi dahulu data formulir! atau dapat nonaktifkan wajib pengisian lengkap.');
			}

		})

		$('#btnMandatory').on('click', function () {
			let check = $(this).attr("aria-pressed");
			// jika false maka artinya pengisian form mandatory
			if (check == 'true') {
				$("#wajib").val(0);
				$("input, textarea, select, .radio.form-control").removeClass('required');
				$("input, textarea, select, .radio.form-control").removeClass('is-invalid');
			} else {
				$("#wajib").val(1);
				$("input, textarea, select, .radio.form-control").addClass('required');
				$(".not-req input").removeClass('required');
			}
		});

		// save terapi pulang
		$('#save_list').click(function (e) {
			e.preventDefault()
			save_list()
		})

		$('#list_row').on('click', '.delete', function (e) {
			e.preventDefault()
			let id = $(this).data("id")
			delete_list(id)
		})


		// print
		if (cek)
			$('#link_print').removeClass('disabled', true)
		else
			$('#link_print').addClass('disabled', true)
	})

	// simpan di table
	function save_list() {
		let data = $('#form-data-2').serializeArray()
		console.log(data)
		$.ajax({
			url: base_url + '<?= $controller ?>/insert_list/' + visit_no + '/' + field + '/' + table,
			type: 'POST',
			data: data,
			dataType: 'json',
			success: function (res) {
				console.log(res)
				get_list()
				a_ok('Berhasil', 'Data Berhasil Ditambahkan');
				$('#form-data-2')[0].reset()
			},
			error: function (xhr, status, error) {
				console.log(JSON.parse(xhr.responseText))
			}
		})
	}

	function get_list() {
		$.ajax({
			url: base_url + '<?= $controller ?>/detail/' + visit_no + '/' + table,
			dataType: 'json',
			success: function (res) {
				console.log(res)
				let html
				let no = 1
				let btnHapus = ''

				if (res) {
					if (res.terapi_pulang) {
						for (list of JSON.parse(res.terapi_pulang).reverse()) {

							btnHapus = '<button data-id="' + list.id +
								'" class="btn btn-danger btn-sm delete" ><i class="ti-trash"></i></button>'
							html += `<tr>
                                    <td>` + list.nama_obat + `</td>
                                    <td>` + list.satuan + `</td>
                                    <td>` + list.jumlah + `</td>
                                    <td>` + list.dosis + `</td>
                                    <td>` + list.frekuensi + `</td>
                                    <td align="center">` + btnHapus + `</td>
                                </tr>`
						}

						$('tbody#list_row').html(html)
					}
				}
			}
		})
	}

	function delete_list(id) {
		Swal.fire({
			title: "Apakah anda yakin?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Konfirmasi",
			cancelButtonText: "Batal"
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: base_url + '<?= $controller ?>/delete_list/' + table + '/' + field + '/' + id,
					type: 'POST',
					dataType: 'JSON',
					data: {
						visit_no: visit_no
					},
					success: function (res) {
						// console.log(res)
						if (res.status == 200)
							a_ok('Berhasil', 'Data Berhasil Dihapus')
						else if (res.status == 500)
							a_error('Gagal', 'Data Gagal Dihapus')
						else if (res.status == 403)
							a_error('Forbidden', 'Mohon Hubungi IT')

						get_list()

					}
				})
			}
		})
	}
	// end simpan di table


	// main form
	function save(tidak_lengkap) {
		$.ajax({
			url: base_url + controller + '/detail/' + visit_no + '/' + table,
			dataType: 'json',
			success: function (res) {
				if (res == null)
					url = base_url + controller + '/insert/' + table
				else
					url = base_url + controller + '/update/' + visit_no + '/' + table

				let data = $('#form-data').serializeArray()

				// tambah data tidak_lengkap
				let data_merge = $.extend(data, [{
					'name': 'tidak_lengkap',
					'value': tidak_lengkap
				}]);

				let promise = $.ajax({
					url: url,
					type: 'POST',
					data: data,
					dataType: 'JSON'
				}).then(function (res) {
					if (res.status == 500)
						throw Error(res.msg)
				})

				if (res == null) {
					if (promise) {
						$('#link_print').removeClass('disabled', true)
						a_ok("Berhasil", "Data Berhasil Ditambahkan")
					} else {
						a_error("Error", "Data Gagal Ditambahkan")
					}
				} else {
					if (promise) {
						a_ok("Berhasil", "Data Berhasil Dirubah")
					} else {
						a_error("Error", "Data Gagal Dirubah")
					}
				}
			}
		})
	}

	// check in json has no value
	function cek_field_kosong(json) {
		let result = [];
		let is_required;

		for (let i = 0; i < json.length; i++) {
			// jika ada field yang tidak harus di isi (bisa pakai class not-required)
			is_required = !$("input#" + json[i].name).hasClass('not-required');
			if ((json[i].value == null || json[i].value == "") && is_required == true) {
				result.push(json[i].name);
			}
		}
		return result;
	}


	// required
	function validate() {
		let valid = true;
		if ($("#wajib").val() == 1) {
			$('.required').each(function () {
				let value = $(this).val();
				let value_radio = $(this).find('input[type="radio"]:checked').val() == '';
				if (value == '' || value_radio) {
					// focus on first is-invalid
					$('.is-invalid:first').focus();
					$(this).addClass('is-invalid');
					valid = false;
				} else {
					$(this).removeClass('is-invalid');
				}
			});
		}
		return valid;
	}
	// main form

</script>
