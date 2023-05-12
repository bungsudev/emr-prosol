<div class="col-lg-12 col-12">
	<!-- Basic Forms -->
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<style>
			body {
				overflow: auto !important;
			}

			table th,
			table tr,
			table td {
				vertical-align: top !important;
				/* border: 1px solid #000000 !important; */
				color: #000000 !important;
			}

			table th {
				font-weight: bold !important;
			}

			.soap tr,
			.soap td,
			.soap th {
				padding: 0 !important;
				vertical-align: top !important;
				border: 0px solid #000000 !important;
			}

			table .stempel tr,
			table .stempel td,
			table .stempel th {
				/* border: 2px solid #0d3377c7; */
				/* border: 2px solid #ededed; */
				/* border: 2px solid #2438A6 !important; */
				border: 2px solid black !important;
				padding: 10px !important;
				margin: 0;
				font-style: #0d3377c7;
				/* color: #2438A6 !important; */
			}

			.tulisan {
				color: black !important;
			}

		</style>
		<!-- END UMUR -->
		<!-- ===== FORM START ====== -->
		<div class="box-body">
			<form id="form-data">
				<input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>" />
				<input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>" />
				<div class="row">
					<div class="form-group col-md-2">
						<label>Tanggal</label>
						<input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
					</div>
					<div class="form-group col-md-2">
						<label>Jam</label>
						<input type="text" class="form-control bs-timepicker" name="pukul" autocomplete="off"
							value="<?php echo date('H:i') ?>" />
					</div>
					<div class="form-group col-md-4">
						<label>PPA</label>
						<select class="form-control" name="ppa">
							<option value="Perawat">Perawat</option>
							<option value="Bidan">Bidan</option>
							<option value="Fisioterapis">Fisioterapis</option>
							<option value="Apoteker">Apoteker</option>
							<option value="Gizi">Gizi</option>
							<option value="Lainnya">Lainnya</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label>Metode</label>
						<select class="form-control" name="metode_cppt" id="metode_cppt">
							<?php if ($this->session->userdata('Role') == 'DOKTER') : ?>
								<option value="SOAP">SOAP</option>
								<option value="ADIME">ADIME</option>
							<?php else : ?>
								<option value="SOAP">SOAP</option>
								<option value="ADIME">ADIME</option>
							<?php endif ?>
						</select>
					</div>
					<!-- ===== SOAP ===== -->
					<div id="soap" style="width:100%"></div>

					<!-- ===== AIDME ===== -->
					<div id="adime" style="width:100%"></div>

					<div class="col-md-12">
						<label id="intruksi_ppa_label">Instruksi PPA Termasuk Pasca Bedah</label>
						<textarea name="intruksi_ppa" id="intruksi_ppa" cols="30" rows="3"
							class="form-control"></textarea>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label id="serah_terima_label">Serah Terima</label>
							<select class="form-control" name="serah_terima" id="serah_terima">
								<option value="Ya" selected>Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
					</div>

					<div class="col-md-4">
						<div id="dokter_rujukan_group" class="form-group">
							<label for="keterangan">Dokter Rujukan</label>
							<select class="form-control" name="dokter_rujukan" id="dokter_rujukan">
								<option value='' selected type="hidden">--- Pilih Dokter ---</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>User</label>
							<div class="input-group">
								<input type="text" class="form-control"
									value="<?= $this->session->userdata('User_Name') ?>" readonly id="created_by"
									name="created_by">
								<div class="input-group-append" id="tambah-div">
									<button type="submit" class="btn btn-success text-white" style="cursor: pointer;"
										id="simpan"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="table-responsive mt-3">
                        <table class="table table-bordered table-sm">
                            <thead class="text-center">
                                <tr>
                                    <th>Tanggal, Waktu</th>
                                    <th>PPA</th>
                                    <th>Hasil Asesmen Pasien dan Pemberian Pelayanan</th>
                                    <th>Intruksi PPA Termasuk Pasca Bedah</th>
                                    <th>Review dan Verifikasi DPJP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="list"></tbody>
                        </table>
                    </div> -->
				</div>
			</form>
		</div>
		<!-- ===== FORM END ====== -->
	</div>
</div>

<script>
	// declare
	let visit_no = $('#visit_no').val();
	let controller = '<?= $controller ?>';
	let field = '<?= $field ?>';
	let table = '<?= $table ?>';
	let is_mandatory = 1;

	// declare parts soap dan adime
	const txtSoap = <?php $this->load->view("".$view."/part-soap.js") ?>;
	const txtAdime = <?php $this->load->view("".$view."/part-adime.js") ?>;

	$('#soap').css('display', 'block');
	$('#adime').css('display', 'none');

	$(document).ready(function () {
		console.clear();

		// default is SOAP 
		gantiMetode(txtSoap, "soap");

		$('#metode_cppt').on('change', function (e) {
			let valMetode = $(this).val();
			e.preventDefault();
			if (valMetode == 'SOAP') {
				gantiMetode(txtSoap, "soap");
				$('#soap').css('display', 'block');
				$('#adime').css('display', 'none');
			} else if ($(this).val() == 'ADIME') {
				gantiMetode(txtAdime, "adime");
				$('#soap').css('display', 'none');
				$('#adime').css('display', 'block');
			}
		});

		// main
		$('#simpan').click(function (e) {
			e.preventDefault()
			$("#wajib").val(is_mandatory);
			if (validate(is_mandatory)) {
				save()
			} else {
				a_error('Peringatan',
					'Lengkapi dahulu data formulir! atau dapat nonaktifkan wajib pengisian lengkap.');
			}
		})

	});

	// main form
	const save = () => {
		$.ajax({
			url: base_url + controller + '/insert/' + table,
			type: 'POST',
			dataType: 'json',
			data: $('#form-data').serializeArray(),
			beforeSend: function (e) {
				loading(1)
			},
			success: function (res) {
				if (JSON.parse(res)['status_insert'] === 200 ) {
					loading(0);
					a_ok("Berhasil", "Data Berhasil Ditambahkan");
				}else{
					a_error("Gagal", "Data Gagal Ditambahkan");
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				cl(xhr, thrownError);
				$(".loading").css('display', 'none');
				a_error("Error", "Data Gagal Ditambahkan")
			}
		})
	}

	const gantiMetode = (part, idDiv) => {
		$("#" + idDiv).empty();
		$("#" + idDiv).html(part);
	}
</script>
