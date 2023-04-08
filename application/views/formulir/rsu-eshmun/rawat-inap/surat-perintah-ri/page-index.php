<div class="col-lg-12 col-12">
	<!-- Basic Forms -->
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form id="form-data">
                <input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>">
				<input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>">
				<input type="hidden" name="nama_penanda" id="nama_penanda" value="<?= (!empty($row['nama_penanda'])) ? $row['nama_penanda'] : $this->session->userdata['User_Code'] ?>">
				<input type="hidden" name="alamat_penanda" id="alamat_penanda" value="RSU Eshmun">
				<input type="hidden" name="wajib" id="wajib"
					value="<?= ($row['wajib'] != '') ? $row['wajib'] : true ?>">
				<div class="row">
					<div class="col-md-12">
						<h5>Dalam hal ini bertindak sebagai Dokter Jaga IGD, dengan ini menyatakan bahwa pasien tersebut
							dibawah ini</h5>
						<hr>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="norm">No Rekam Medis</label>
							<input type="text" name="norm" id="norm" class="form-control"
								value="<?= $detail['MR_Code'] ?>" readonly="readonly">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control"
								value="<?= $detail['Patient_Name'] ?>" readonly="readonly">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" name="alamat" id="alamat" class="form-control"
								value="<?= $detail['Patient_Address'] ?>" readonly="readonly">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="diagnosa">Diagnosa</label>
							<textarea rows="3" name="diagnosa" id="diagnosa" class="form-control"
								placeholder="Indikasi Dirawat"><?= (!empty($row['diagnosa'])) ? $row['diagnosa'] : '' ?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="indikasi">Indikasi Rawat Inap</label>
							<textarea rows="3" name="indikasi" id="indikasi" class="form-control"
								placeholder="Indikasi Rawat Inap"><?= (!empty($row['indikasi'])) ? $row['indikasi'] : '' ?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
						$temp_Val = isset($row['faskes_perujuk_pil']) ? $row['faskes_perujuk_pil'] : '';;
						if (!empty($temp_Val))
							$Val = explode("|", $temp_Val);

						$dataVal = [
							"Tidak ada",
							"Ada"
						];
					?>
					<div class="col-md-3">
						<div class="form-group">
							<label for="faskes_perujuk_pil">Fasilitas Kesehatan Perujuk</label>
							<?php for ($i = 0; $i < sizeof($dataVal); $i++): ?>
							<div class="radio">
								<input class="form-control" name="faskes_perujuk_pil" type="radio"
									id="faskes_perujuk_pil<?= $i ?>" value="<?= $dataVal[$i] ?>"
									<?= (!empty($Val)) ? ((in_array($dataVal[$i], $Val)) ? 'checked' : '') : '' ?>>
								<label for="faskes_perujuk_pil<?= $i ?>"><?= $dataVal[$i] ?></label>
							</div>
							<?php endfor; ?>
						</div>
					</div>
				</div>
				<div class="row not-req" id="panel_faskes_perujuk">
					<div class="col-md-4">
						<div class="form-group">
							<label for="faskes_perujuk1">Rumah sakit</label>
							<input type="text" name="faskes_perujuk1" id="faskes_perujuk1" class="form-control"
								value="<?= (!empty($row['faskes_perujuk1'])) ? $row['faskes_perujuk1'] : '' ?>" placeholder="beri strip jika tidak ingin mengisi">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="faskes_perujuk2">Puskesmas / Klinik</label>
							<input type="text" name="faskes_perujuk2" id="faskes_perujuk2" class="form-control"
								value="<?= (!empty($row['faskes_perujuk2'])) ? $row['faskes_perujuk2'] : '' ?>" placeholder="beri strip jika tidak ingin mengisi">
						</div>
					</div>
				</div>
			</form>
		</div>
        <div class="box-footer">
			<button type="reset" class="btn btn-rounded btn-danger">Batal</button>
			<button id="simpan" class="btn btn-rounded btn-success pull-right">Simpan</button>
		</div>
	</div>
</div>
<!-- /.box-body -->
<!-- /.box -->
<script type="text/javascript">
	// declare
	let visit_no = $('#visit_no').val();
	let controller = '<?= $controller ?>';
	let field = '<?= $field ?>';
	let table = '<?= $table ?>';
	let cek = '<?= (!empty($row['status'])) ? $row['status'] : '' ?>';
	let tidak_lengkap;
	let panel = $('#panel_faskes_perujuk');
	let panel_input = $('#panel_faskes_perujuk input');
	let panel_checked = $('input[name="faskes_perujuk_pil"]:checked').val();
	let data_val = <?= json_encode($dataVal) ?>;
	let is_mandatory = <?= ($row['wajib'] != '') ? $row['wajib'] : 1 ?>;
    // value radio untuk menampilkan input
    let valueShowInput = "Ada";

	// membuat semua menjadi required
	$("input, textarea, select, .radio.form-control").addClass('required');
	$(".not-req input").removeClass('required');

	$(document).ready(function () {
        console.clear();
        $("#btnMandatory").attr('aria-pressed', handleTrueFalse(is_mandatory));

		$('#simpan').click(function (e) {
			e.preventDefault()
            $("#wajib").val(is_mandatory);
			if (validate(is_mandatory)) {
				$('#link_print').removeClass('disabled', handleTrueFalse());
				tidak_lengkap = cek_field_kosong($('#form-data').serializeArray())
				save(tidak_lengkap)
			} else {
				a_error('Peringatan',
					'Lengkapi dahulu data formulir! atau dapat nonaktifkan wajib pengisian lengkap.');
			}

		})

        $('#btnMandatory').on('click', function () {
			let check = $("#wajib").val();
			// jika false maka artinya pengisian form mandatory
			if (check == 1) {
				is_mandatory = 0;
                $("#wajib").val(0);
				$("input, textarea, select, .radio.form-control").removeClass('required');
				$("input, textarea, select, .radio.form-control").removeClass('is-invalid');
                $(".not-req input").removeClass('required');
			} else {
				is_mandatory = 1;
                $("#wajib").val(1);
				$("input, textarea, select, .radio.form-control").addClass('required');
			}
		});

		$('input[name="faskes_perujuk_pil"]').on('change', function () {
			let value = $(this).val();
			is_mandatory = $("#wajib").val();

			radioHasInput(value, valueShowInput, panel, panel_input, is_mandatory);
		});

		// kondisi untuk radioHasInput mandatory atau tidak setelah page load
        radioHasInput(panel_checked, valueShowInput, panel, panel_input, is_mandatory);

        if (cek)
			$('#link_print').removeClass('disabled', true)
		else
			$('#link_print').addClass('disabled', true)
	});

    // main form
	save = (tidak_lengkap) => {
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
				let data_merge = [{
					'name': 'tidak_lengkap',
					'value': tidak_lengkap
				}];
				data = data.concat(data_merge);

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
	cek_field_kosong = (json) => {
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
	validate = (is_mandatory) => {
		let valid = true;
		if (is_mandatory == 1) {
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


	radioHasInput = (value, valueShowInput, panel, panel_input, is_mandatory) => {
		if (value != valueShowInput) {
			panel_input.addClass('not-required');
			panel_input.removeClass('required');
			panel.hide()
		} else {
			panel_input.removeClass('not-required');
			if (is_mandatory == 1) {
				panel_input.addClass('required');
			}
			panel.show()
		}
	}

</script>
