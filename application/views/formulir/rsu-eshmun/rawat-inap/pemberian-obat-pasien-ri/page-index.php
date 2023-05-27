<div class="col-lg-12 col-12">
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- Form transfer -->
		<div class="box-body">
			<form id="form-data">
				<input type="hidden" name="form_ke" id="form_ke"
					value="<?= (!empty($_GET['form_ke'])? $_GET['form_ke'] : 1) ?>">
				<input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>">
				<input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>">
				<input type="hidden" name="data_json" id="data_json">
				<div class="form-group col-md-3">
					<label>Nama Obat Injeksi</label>
					<select class="form-control" name="jenis" id="jenis">
						<option value="Antibiotik" selected="selected">Antibiotik</option>
						<option value="Non-Antibiotik">Non-Antibiotik</option>
						<option value="Cairan / Nutrisi Parental">Cairan / Nutrisi Parental</option>
					</select>
				</div>
				<div class="col-md-12">
					<hr>
					<div class="row">
						<div class="form-group col-md-3">
							<label class="secLblAnti">Antibiotik</label>
							<div class="secDivAnti"></div>
						</div>
						<div class="form-group col-md-3">
							<label>Dosis</label>
							<input type="text" name="dosis" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label>Frekuensi</label>
							<input type="text" name="frekuensi" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label>Cara Pemberian</label>
							<input type="text" name="cara_pemberian" class="form-control">
						</div>
						<div class="form-group col-md-3">
							<label>Awal Pemberian (Tanggal/jam)</label>
							<input type="date" name="awal_tanggal" class="form-control" value="">
						</div>
						<div class="form-group col-md-2">
							<label>&nbsp;</label>
							<input type="time" name="awal_jam" class="form-control" value="">
						</div>
						<div class="form-group col-md-7">
							<label for="awal_dokter">Dokter</label>
							<select class="form-control select2" name="awal_dokter" id="awal_dokter">
								<option value='' selected disabled>--- Pilih Dokter ---</option>
								<?php foreach ($dokter as $row) : ?>
								<option value='<?= $row['User_Code'] ?>' data-nama="<?= $row['User_Name'] ?>">
									<?= $row['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
							<input type="hidden" name="nama_awal_dokter" id="nama_awal_dokter">
						</div>
						<div class="form-group col-md-3">
							<label>Dihentikan (Tanggal/jam)</label>
							<input type="date" name="dihentikan_tanggal" class="form-control" value="">
						</div>
						<div class="form-group col-md-2">
							<label>&nbsp;</label>
							<input type="time" name="dihentikan_jam" class="form-control" value="">
						</div>
						<div class="form-group col-md-7">
							<label for="dihentikan_dokter">Dokter</label>
							<select class="form-control select2" name="dihentikan_dokter" id="dihentikan_dokter">
								<option value='' selected disabled>--- Pilih Dokter ---</option>
								<?php foreach ($dokter as $row) : ?>
								<option value='<?= $row['User_Code'] ?>' data-nama="<?= $row['User_Name'] ?>">
									<?= $row['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
							<input type="hidden" name="nama_dihentikan_dokter" id="nama_dihentikan_dokter">
						</div>


						<!-- section multi -->
						<div class="col-md-12">
							<button class="btn btn-info float-right mb-2 addDtl">Tambah Detail Pemberian <i
									class="ti-angle-double-down"></i></button>
							<table class="table table-hover table-sm" id="tblTglDtl">
								<thead>
									<th width="120">Tanggal</th>
									<th width="100">Jam</th>
									<th width="250">Petugas</th>
									<th>Keterangan</th>
									<th width="150">Pas/Kel</th>
									<th width="5"></th>
								</thead>
								<tbody id="list_dtl"></tbody>
							</table>
						</div>
						<!-- End section multi -->
						<div class="col-md-12">
							<hr>
						</div>

						<div class="col-md-12 d-flex justify-content-center">
							<button class="btn btn-primary save">Simpan
								<i class="ti-angle-double-down"></i></button>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Filter Tabel</label>
								<select class="form-control" id="filter">
									<option value="Semua" selected="selected">Semua</option>
									<option value="Antibiotik">Antibiotik</option>
									<option value="Non-Antibiotik">Non-Antibiotik</option>
									<option value="Cairan / Nutrisi Parental">Cairan / Nutrisi Parental</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<table class="table table-hover table-sm" id="tblList">
								<thead>
									<th align="center" width="150">Nama Obat Injeksi</th>
									<th align="center" width="100">Dosis</th>
									<th align="center" width="100">Frek</th>
									<th align="center" width="100">Aturan</th>
									<th>Awal Pemberian</th>
									<th>Dihentikan</th>
									<th width="5"></th>
								</thead>
								<tbody id="list_row"></tbody>
							</table>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	// declare
	let visit_no = $('#visit_no').val();
	let form_ke = $('#form_ke').val();
	let controller = '<?= $controller ?>';
	let table = '<?= $table ?>';
	let cek = <?= $rows ?>;
	let filter = 'Semua';
	let dtl = [];
	let display_data_json = [];


	const secAntibiotik = `
		<select class="form-control secAnti" name="nama">
			<option value="Profilaksis" selected="selected">Profilaksis</option>
			<option value="Empiris">Empiris</option>
			<option value="Defenitif">Defenitif</option>
		</select>
	`;

	const secNonAntibiotik = `
		<input class="form-control secNonAnti" type="text" name="nama">
	`;

	$(".divLabel").remove();
	$("#link_print").removeClass('disabled');
	$(".secDivAnti").html(secAntibiotik);
	// $(".save").hide();

	$(document).ready(function () {
		$(".select2").select2();
		get_list(filter);

		// if (cek > 0) {
		// 	$("#tanggal").prop("readonly", true)
		// };

		$("#form-data").on('click', '.save', function (e) {
			e.preventDefault();
			save();
		})

		$("#jenis").on('change', function () {
			let nama_obat = $(this).val();
			if (nama_obat == 'Antibiotik') {
				$(".secLblAnti").text(nama_obat);
				$(".secDivAnti").html(secAntibiotik);
			} else {
				$(".secLblAnti").text(nama_obat);
				$(".secDivAnti").html(secNonAntibiotik);
			}
		})

		$("#awal_dokter").on('change', function () {
			let nama_dokter_temp = $(this).select2().find(":selected").data("nama");
			$("#nama_awal_dokter").val(nama_dokter_temp);
		})

		$("#dihentikan_dokter").on('change', function () {
			let nama_dokter_temp = $(this).select2().find(":selected").data("nama");
			$("#nama_dihentikan_dokter").val(nama_dokter_temp);
		})

		$("#filter").on('change', function () {
			filter = $(this).val();
			get_list(filter);
		})

		// detail pemberian
		let count_inputan = 0;
		$(".addDtl").click(function (e) {
			e.preventDefault();
			if (!$("#list_dtl button").hasClass('saveDtl')) {
				$("#list_dtl").append(inputan_detail(count_inputan))
				count_inputan++;
			} else {
				$(".saveDtl").focus();
			}
		})


		$("#list_dtl").on("click", ".saveDtl", function (e) {
			e.preventDefault();
			$(".saveDtl").toggleClass("btn-warning btn-danger");
			$(".saveDtl i").toggleClass("ti-check ti-trash");
			$(".saveDtl").toggleClass("saveDtl deleteDtl");
			
			
			// declare inputan to json
			let id_inputan = $(this).data("btn");
			$(".tr_"+ id_inputan +" input, .tr_"+ id_inputan +" select").prop('disabled', true);

			let dtl_tanggal = $(".dtl_tanggal_" + id_inputan).val();
			let dtl_jam = $(".dtl_jam_" + id_inputan).val();
			let dtl_petugas = $(".dtl_petugas_" + id_inputan).val();
			let dtl_keterangan = $(".dtl_keterangan_" + id_inputan).val();
			let dtl_pk = $(".dtl_pk_" + id_inputan).val();
			
			// input to json
			let json_dtl = {
				"id": id_inputan,
				"dtl_tanggal": dtl_tanggal,
				"dtl_jam": dtl_jam,
				"dtl_petugas": dtl_petugas,
				"dtl_keterangan": dtl_keterangan,
				"dtl_pk": dtl_pk
			};

			// add to json
			dtl.push(json_dtl);
			console.log(JSON.stringify(dtl));
			$("#data_json").val(JSON.stringify(dtl));
			// 
		})

		$("#list_dtl").on("click", ".deleteDtl", function (e) {
			e.preventDefault();

			Swal.fire({
				title: 'Anda yakin?',
				html: 'Detail akan di hapus!',
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: 'Hapus'
			}).then((result) => {
				if(result.value){
					$(this).parent().parent().remove();

					// with key remove specific json 

					let id_inputan = $(this).data("btn");

					delete dtl[id_inputan];
					// console.log(id_inputan);
					console.log(dtl);
				}
			})
		})

		$("#list_row").on("click", ".display", function (e) {
			e.preventDefault();
			$("#mdlTitle").text('Detail Pemberian');
			let htmlDisplayHead = `
			<table class="table table-hover table-bordered table-sm" id="tblTglDtl">
				<thead>
					<th width="120">Tanggal</th>
					<th width="100">Jam</th>
					<th width="250">Petugas</th>
					<th>Keterangan</th>
					<th width="150">Pasien/Keluarga</th>
				</thead>
				<tbody>
			`;
			let htmlDisplayContent = ``;
			let htmlDisplayFoot = `
				</tbody>
			</table>
			`;
			// each
			$( display_data_json ).each(function( index, element ) {
				console.log(element.dtl_jam)

				htmlDisplayContent += `
					<tr>
						<td>`+ date_dmy(element.dtl_tanggal) + `</td>
						<td>`+ element.dtl_jam + ` WIB</td>
						<td>`+ element.dtl_petugas + `</td>
						<td>`+ element.dtl_keterangan + `</td>
						<td>`+ element.dtl_pk + `</td>
					</tr>
				`;
			});

			$("#mdlBodyDisplay").html(htmlDisplayHead + htmlDisplayContent + htmlDisplayFoot);
			$("#mdlDisplay").modal('show');
		})

		$("#list_row").on("click", ".delete", function (e) {
			e.preventDefault();
			Swal.fire({
				title: 'Anda yakin?',
				html: 'Detail akan di hapus!',
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: 'Hapus'
			}).then((result) => {
				if(result.value){
					let id = $(this).data('id');
					deleteData(id);
				}
			})
		})
	})

	const inputan_detail = (id) => {
		let inputan = `
			<tr class="tr_` + id + `">
				<td>
					<input type="date" class="form-control dtl_tanggal_` + id + `">
				</td>
				<td>
					<input type="time" class="form-control dtl_jam_` + id + `">
				</td>
				<td>
					<input type="text" class="form-control dtl_petugas_` + id + `">
				</td>
				<td>
					<input type="text" class="form-control dtl_keterangan_` + id + `">
				</td>
				<td>
					<select class="form-control dtl_pk_` + id + `">
						<option value="Pasien" selected="selected">Pasien</option>
						<option value="Keluarga">Keluarga</option>
					</select>
				</td>
				<td>
					<button style="margin-top:2px;" class="btn btn-sm btn-warning float-right mb-2 saveDtl" data-btn="` + id + `"> <i class="ti-check"></i></button>
				</td>
			</tr>
		`;

		return inputan;
	}

	// Main form
	function save() {
		$.ajax({
			url: base_url + controller + '/detail/' + visit_no + '/' + table,
			dataType: 'json',
			success: function (res) {
				let data = $('#form-data').serializeArray()

				let promise = $.ajax({
					url: base_url + controller + '/insert/' + table,
					type: 'POST',
					data: data,
					dataType: 'JSON'
				}).then(function (res) {
					if (res.status == 500)
						throw Error(res.msg)
				})

				if (promise) {
					$('#link_print').removeClass('disabled', true)
					a_ok("Berhasil", "Data Berhasil Ditambahkan")
					$('#form-data')[0].reset()
					$("#list_dtl").empty();
					dtl = [];
					get_list(filter);
				} else {
					a_error("Error", "Data Gagal Ditambahkan")
				}
			}
		})
	}

	function get_list(filter) {
		$.ajax({
			url: base_url + '<?= $controller ?>/detail_list_multiple/' + table + '/' + visit_no + '/' + form_ke +
				'/' + filter,
			dataType: 'json',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block')
			},
			success: function (res) {
				let html
				let no = 1
				let btnHapus = '';
				let btnDisplay = '';

				console.log(res);
				if (res) {
					res.forEach(list => {
						display_data_json = JSON.parse(list.data_json);

						btnHapus = '<button data-id="' + list.id +
							'" class="btn btn-danger btn-sm mt-1 delete" ><i class="ti-trash"></i></button>';
						btnDisplay = '<button data-id="' + list.id +
							'" class="btn btn-info btn-sm display"><i class="ti-eye"></i></button>';

						html += `<tr  style="font-size:0.75rem;">
								<td>` + list.jenis + "<br />" + list.nama + `</td>
								<td>` + list.dosis + `</td>
								<td>` + list.frekuensi + `</td>
								<td>` + list.cara_pemberian + `</td>
								<td>
									Dokter  : ` + list.awal_dokter + ` <br />
									Tgl/jam : ` + date_dmy(list.awal_tanggal) + `<br />` + list.awal_jam + `
								</td>
								<td>
									Dokter  :` + list.dihentikan_dokter + ` <br />
									Tgl/jam : ` + date_dmy(list.dihentikan_tanggal) + `<br />` + list.dihentikan_jam + `
								</td>
								<td align="center">` + btnDisplay + btnHapus +`</td>
							</tr>`

					});
					$('#tblList').DataTable().clear().destroy();
					$("#tblList tbody").html(html);
					$('#tblList').dataTable({
						"dom": 'frtip'
					});
				}
			},
			complete: function () {
				$('.loading').css('display', 'none');
			}
		})
	}

	function deleteData(id) {
		$.ajax({
			url: base_url + controller + '/delete/' + table + '/' + id,
			dataType: 'JSON',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block')
			},
			success: function (res) {
				console.log(res);
				console.log(res['status_update']);
				console.log(res.status_update);
				if (res.status_update == 200) {
					get_list(filter)
					a_ok('Berhasil', 'Data berhasil dihapus!');
				}
			},
			complete: function () {
				$('.loading').css('display', 'none');
			}
		})
	}

</script>
