<div class="col-lg-12 col-12">
	<!-- Basic Forms -->
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>">
			<input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>">
			<!-- section alergi -->
			<form id="form-alergi">
				<div class="row">
					<input type="hidden" name="bagian" value="alergi">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<label>Alergi (Obat, Makanan, dll)</label>
							<div class="input-group">
								<input type="text" class="form-control" name="text">
								<div class="input-group-append">
									<button class="btn btn-rounded btn-info btn-sm" id="btnSaveAlergi">Tambah</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table id="tblAlergi" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th width="100">Tanggal</th>
									<th>Alergi (Obat, Makanan, dll)</th>
									<th width="5"></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</form>
			<!-- section alergi End -->

			<!-- section riwayat-operasi -->
			<form id="form-riwayat-operasi">
				<div class="row">
					<input type="hidden" name="bagian" value="riwayat">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<label>D/Rawat Inap atau Riwayat Operasi/Tindakan</label>
							<div class="input-group">
								<input type="text" class="form-control" name="text">
								<div class="input-group-append">
									<button class="btn btn-rounded btn-info btn-sm" id="btnSaveRiwayat">Tambah</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table id="tblRiwayat" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th width="100">Tanggal</th>
									<th>D/Rawat Inap atau Riwayat Operasi/Tindakan</th>
									<th width="5"></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</form>
			<!-- section riwayat-operasi End -->

			<!-- section imunisasi -->
			<form id="form-imunisasi">
				<div class="row">
					<input type="hidden" name="bagian" value="imunisasi">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<label>Imunisasi</label>
							<div class="input-group">
								<input type="text" class="form-control" name="text">
								<div class="input-group-append">
									<button class="btn btn-rounded btn-info btn-sm" id="btnSaveImunisasi">Tambah</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table id="tblImunisasi" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th width="100">Tanggal</th>
									<th>Imunisasi</th>
									<th width="5"></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</form>
			<!-- section imunisasi End -->

			<!-- section resume -->
			<form id="form-resume">
				<div class="row">
					<input type="hidden" name="bagian" value="resume">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>">
						</div>
					</div>
					<div class="col-md-10">
						<div class="form-group">
							<label for="text">Klinik Nama Dr</label>
							<input type="text" name="text" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="text2">Diagnosis</label>
							<input type="text" name="text2" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="text3">Terapi</label>
							<input type="text" name="text3" class="form-control">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Keterangan</label>
							<div class="input-group">
								<input type="text" class="form-control" name="text4">
								<div class="input-group-append">
									<button class="btn btn-rounded btn-info btn-sm" id="btnSaveResume">Tambah</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table id="tblResume" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th width="100">Tanggal</th>
									<th>Klinik Nama Dr</th>
									<th>Diagnosis</th>
									<th>Terapi</th>
									<th>Keterangan</th>
									<th width="5"></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</form>
			<!-- section resume End -->
		</div>
	</div>
</div>
<!-- /.box-body -->
<!-- /.box -->
<script type="text/javascript">
	// declare
	let visit_no = $('#visit_no').val();
	let mr_code = $('#mr_code').val();

	let controller = 'Resume_rj';
	let panel = $('#panel_faskes_perujuk');
	let panel_input = $('#panel_faskes_perujuk input');
	let panel_checked = $('input[name="faskes_perujuk_pil"]:checked').val();
	// value radio untuk menampilkan input
	let valueShowInput = "Ada";
	let tbl = 'form_rawat_jalan';
	let idForm = '';
	let idTable = '';

	$(".divLabel").remove();

	// membuat semua menjadi required
	$("input, textarea, select, .radio.form-control").addClass('required');
	$(".not-req input").removeClass('required');

	$(document).ready(function () {
		console.clear();

		// get data table
		refreshData();

		$('#btnSaveAlergi').click(function (e) {
			e.preventDefault()
			let bagian = 'alergi';
			idForm = 'form-alergi';
			saveCol(bagian, idForm);
		})

		$('#btnSaveRiwayat').click(function (e) {
			e.preventDefault()
			let bagian = 'riwayat';
			idForm = 'form-riwayat-operasi';
			saveCol(bagian, idForm);
		})
		
		$('#btnSaveImunisasi').click(function (e) {
			e.preventDefault()
			let bagian = 'imunisasi';
			idForm = 'form-imunisasi';
			saveCol(bagian, idForm);
		})

		$('#btnSaveResume').click(function (e) {
			e.preventDefault()
			let bagian = 'resume';
			idForm = 'form-resume';
			saveCol(bagian, idForm);
		})

		$("table tbody").on('click', '.btnDelete', function (e) {
			e.preventDefault()
			Swal.fire({
				title: 'Anda yakin?',
				html: 'Data akan di hapus!',
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: 'Hapus'
			}).then((result) => {
				if (result.value) {
					let id = $(this).data('id');
					let bagian = $(this).data('bagian');
					deleteData(bagian, id);
				}
			})
		})
	});

	// main form
	const saveCol = (bagian, idForm) => {
		let data = $('#' + idForm).serializeArray()
		$.ajax({
			url: base_url + controller + '/save/' + mr_code + '/' + visit_no + '/' + tbl,
			method: 'POST',
			dataType: 'json',
			data: data,
			success: function (res) {
				if (res.status) {
					$("input[type=text]").val('');

					// refresh data
					refreshData();

					a_ok('Berhasil', 'Alergi berhasil ditambahkan!');
				}
			}
		})
	}

	const deleteData = (bagian, id) => {
		$.ajax({
			url: base_url + controller + '/delete/' + id + '/' + tbl,
			method: 'POST',
			dataType: 'json',
			success: function (res) {
				if (res.status) {
					// refresh data
					refreshData();

					a_ok('Berhasil', 'Alergi berhasil dihapus!');
				}
			}
		})
	}

	function data_tampil(bagian, idTable) {
		$.ajax({
			url: base_url + controller + '/data_tampil/' + bagian + '/' + visit_no + '/' + tbl,
			dataType: 'json',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block')
			},
			success: function (res) {
				let html
				let btnHapus = '';
				console.log(res);
				if (res) {
					for (let i = 0; i < res.length; i++) {
						btnHapus = `<button data-id="` + res[i].id + `"  data-bagian="` + res[i].bagian + `" class="btn btn-danger btn-sm mt-1 btnDelete" ><i class="ti-trash"></i></button>`;

						if (res[i].bagian == 'resume') {
							html += `
								<tr  style="font-size:0.75rem;">
									<td>` + date_dmy(res[i].tanggal) + `</td>
									<td>` + res[i].text + `</td>
									<td>` + res[i].text2 + `</td>
									<td>` + res[i].text3 + `</td>
									<td>` + res[i].text4 + `</td>
									<td align="center">` + btnHapus + `</td>
								</tr>`
						}else{
							html += `
								<tr  style="font-size:0.75rem;">
									<td>` + date_dmy(res[i].tanggal) + `</td>
									<td>` + res[i].text + `</td>
									<td align="center">` + btnHapus + `</td>
								</tr>`
						}
					}
					$('#' + idTable).DataTable().clear().destroy();
					$("#" + idTable + ' tbody').html(html);
					$('#' + idTable).dataTable({
						"dom": 'frtip'
					});
				}
			},
			complete: function () {
				$('.loading').css('display', 'none');
			}
		})
	}

	function refreshData(){
		data_tampil('alergi', 'tblAlergi');
		data_tampil('riwayat', 'tblRiwayat');
		data_tampil('imunisasi', 'tblImunisasi');
		data_tampil('resume', 'tblResume');
	}

</script>
