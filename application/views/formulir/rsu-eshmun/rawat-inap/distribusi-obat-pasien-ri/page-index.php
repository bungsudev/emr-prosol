<div class="col-lg-12 col-12">
	<div class="box">
		<div class="box-header with-border">
			<?php $this->load->view($label) ?>
		</div>
		<!-- Form transfer -->
		<div class="box-body">
			<form id="form-data">
				<input type="hidden" name="form_ke" id="form_ke" value="<?= (!empty($_GET['form_ke'])? $_GET['form_ke'] : 1) ?>">
				<input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>">
				<input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>">
				<div class="form-group col-md-3">
					<label>Tanggal</label>
					<input type="date" id="tanggal" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
				</div>
				<div class="col-md-8">
					<span class="judul">Diagnosa <span class="text-xsm text-danger">(diambil dari surat perintah rawat
							inap)</span></span>
					<p class="text-justify">
						<?= (!empty($default_diagnosa_pasien->diagnosa)) ? $default_diagnosa_pasien->diagnosa : '' ?>
					</p>
				</div>
				<!-- <div class="col-md-12">
					<div class="form-group">
						<label for="diagnosa">Diagnosa</label>
						<textarea rows="3" name="diagnosa" id="diagnosa" class="form-control"
							placeholder="Diagnosa Masuk" readonly></textarea>
					</div>
				</div> -->
				<div class="col-md-12">
					<hr>
					<div class="row">
						<div class="form-group col-md-3">
							<label>Jenis Obat <span class="judul">Diagnosa <span class="text-xsm text-danger">&nbsp;</span></span></label>
							<select class="form-control" name="jenis" id="jenis">
								<option value="Obat Oral" selected="selected">Obat Oral</option>
								<option value="Obat Injeksi">Obat Injeksi</option>
								<option value="Cairan Infus">Cairan Infus</option>
								<option value="SIV">Suppositoria/Inhalasi/Vagina</option>
								<option value="Alkes">Alkes</option>
							</select>
						</div>
						<div class="form-group col-md-9">
							<label>Nama Cairan / Obat <span class="judul">Diagnosa <span class="text-xsm text-danger">(Jika tidak ditemukan tambahkan di HIS terlebih dahulu!)</span></span></label>
							<?php 
								$data_obat = api_daftar_obat(ENDPOINT, $this->session->userdata('token'), $this->session->userdata('User_Code'), '');
							?>
							
							<select class="form-select select2" name="nama_obat" id="nama_obat">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_obat as $key => $list) : ?>
									<option value='<?= $list['Item_Code'] ?>'><?= $list['Item_Name'] ?></option>
								<?php endforeach ?>
							</select>
							<!-- <input type="text" name="nama_obat" class="form-control"> -->
						</div>
						<div class="form-group col-md-3">
							<label>Dosis</label>
							<?php 
								$data_frekuensi = api_daftar_frekuensi(ENDPOINT, $this->session->userdata('token'), $this->session->userdata('User_Code'), '');
							?>
							
							<select class="form-select select2" name="dosis" id="dosis">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_frekuensi as $key => $list) : ?>
									<option value='<?= $list['Frequent_Code'] ?>'><?= $list['Frequent_Name'] ?></option>
								<?php endforeach ?>
							</select>
							<!-- <input type="text" name="dosis" class="form-control"> -->
						</div>
						<div class="form-group col-md-7">
							<label>Aturan Pakai</label>
							<?php 
								$data_instruksi = api_daftar_instruksi(ENDPOINT, $this->session->userdata('token'), $this->session->userdata('User_Code'), '');
							?>
							
							<select class="form-select select2" name="aturan" id="aturan">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_instruksi as $key => $list) : ?>
									<option value='<?= $list['Instruction_Code'] ?>'><?= $list['Instruction_Name'] ?></option>
								<?php endforeach ?>
							</select>
							<!-- <input type="text" name="aturan" class="form-control"> -->
						</div>
						<div class="form-group col-md-2">
							<label>Jumlah</label>
							<input type="text" name="jumlah" class="form-control">
						</div>
						<div class="form-group col-md-2">
							<label>Pukul</label>
							<input type="time" name="pukul_1" class="form-control" value="">
						</div>
						<div class="form-group col-md-2">
							<label>Pukul</label>
							<input type="time" name="pukul_2" class="form-control" value="">
						</div>
						<div class="form-group col-md-2">
							<label>Pukul</label>
							<input type="time" name="pukul_3" class="form-control" value="">
						</div>
						<div class="form-group col-md-2">
							<label>Pukul</label>
							<input type="time" name="pukul_4" class="form-control" value="">
						</div>
						<div class="form-group col-md-2"></div>
						<div class="form-group col-md-2">
							<label>Retur</label>
							<input type="text" name="retur" class="form-control" value="">
						</div>
						<div class="col-md-12">
							<button class="btn btn-primary float-right save">Tambah
								<i class="ti-angle-double-down"></i></button>
							<button class="btn btn-info float-right mr-2 btnSigned">Penandatangan
								<i class="ti-marker-alt"></i></button>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Filter Tabel</label>
								<select class="form-control" id="filter">
									<option value="Semua" selected="selected">Semua</option>
									<option value="Obat Oral">Obat Oral</option>
									<option value="Obat Injeksi">Obat Injeksi</option>
									<option value="Cairan Infus">Cairan Infus</option>
									<option value="SIV">Suppositoria/Inhalasi/Vagina
									</option>
									<option value="Alkes">Alkes</option>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<table class="table table-hover table-sm" id="tblList">
								<thead>
									<th align="center" width="100">Tanggal</th>
									<th width="300">Nama Cairan / Obat</th>
									<th align="center">Dosis</th>
									<th align="center">Aturan</th>
									<th align="center" width="75">Jumlah</th>
									<th align="center">Pukul</th>
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


<!-- modal -->
<div class="modal fade" id="mdlSigned" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><b id="mdlTitle">Penandatangan</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body" id="mdlBodySigned">
				<form id="form-signed">
					<div class="row">
						<?php 
							$data_user = api_daftar_user(ENDPOINT, $this->session->userdata('token'), $this->session->userdata('User_Code'), '');
						?>
						<div class="form-group col-md-6">
							<label>Staff Installasi Farmasi</label>					
							<select class="form-select select2mdl" name="staff_instalasi_farmasi" id="staff_instalasi_farmasi">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Staff Farmasi Depo 1</label>					
							<select class="form-select select2mdl" name="staff_farmasi_depo_1" id="staff_farmasi_depo_1">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Staff Farmasi Depo 2</label>					
							<select class="form-select select2mdl" name="staff_farmasi_depo_2" id="staff_farmasi_depo_2">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Perawat Penerima Obat</label>					
							<select class="form-select select2mdl" name="perawat_penerima_obat" id="perawat_penerima_obat">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Perawat Retur</label>					
							<select class="form-select select2mdl" name="perawat_retur" id="perawat_retur">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Staff Depo Retur</label>					
							<select class="form-select select2mdl" name="staff_depo_retur" id="staff_depo_retur">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="form-group col-md-6">
							<label>Staff Inst. Farmasi Retur</label>					
							<select class="form-select select2mdl" name="staff_inst_farmasi_retur" id="staff_inst_farmasi_retur">
								<option selected disabled>--PILIH--</option>
								<?php foreach ($data_user as $key => $list) : ?>
									<option value='<?= $list['User_Code'] ?>'><?= $list['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>

						<div class="col-md-12">
							<button class="btn btn-primary float-right btnVerifSign">Kirim Verifikasi
								<i class="ti-announcement"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- modal End -->

<script type="text/javascript">
	// declare
	let visit_no = $('#visit_no').val();
	let form_ke = $('#form_ke').val();
	let controller = '<?= $controller ?>';
	let table = '<?= $table ?>';
	let cek = <?= $rows ?>;
	let filter = 'Semua';

	$(".divLabel").remove();
	$("#link_print").removeClass('disabled');
	$(".btnSigned").hide();

	$(document).ready(function () {
		$(".select2").select2();
		get_list(filter);

		$(".select2mdl").select2({
			dropdownParent: $("#mdlSigned")
		});

		// if (cek > 0) {
		// 	$("#tanggal").prop("readonly", true)
		// };

		$("#form-data").on('click', '.save', function(e){
			e.preventDefault();
			save();
		})

		$("#filter").on('change', function (){
			filter = $(this).val();
			get_list(filter);
		})
		
		$("#form-data").on('click', '.btnSigned', function(e){
			e.preventDefault();
			detail_verif();
			$("#mdlSigned").modal('show');
		})

		$(".btnVerifSign").click(function (e){
			e.preventDefault();
			Swal.fire({
				title: 'Anda yakin?',
				html: 'Verifikasi tanda tangan akan dikirimkan!',
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: 'Kirim'
			}).then((result) => {
				if(result.value){
					kirimVerif();
				}
			})
		})

		if (last_parameter == "notif") {
			let htmlTTD = `
				<button type="button" class="btn btn-warning mr-2" id="btnVerifTTD">
					<span class="ti-marker-alt"></span> Tanda tangani
				</button>
			`;
			$(".divLabelBtn").prepend(htmlTTD)
		}

		$(".divLabelBtn").on('click', '#btnVerifTTD', function(e){
			e.preventDefault();
			Swal.fire({
				title: 'Anda yakin?',
				html: 'Verifikasi data ini, tanda tangan akan diberikan!',
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: 'Kirim'
			}).then((result) => {
				if(result.value){
					alert('diverif');
				}
			})
		})
	})

	function detail_verif() {
		$.ajax({
			url: base_url + controller + '/detail_verif/' + visit_no + '/' + table + '_verif/',
			dataType: 'json',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block')
			},
			success: function (res) {
				console.log(res);
				let cekVerif = 0;
				if (res) {
					$(".btnSigned").show();
					res.forEach(list => {
						$("#staff_instalasi_farmasi").val(list.staff_instalasi_farmasi).trigger('change');
						if (list.staff_instalasi_farmasi) {
							$("#staff_instalasi_farmasi").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}
						$("#staff_farmasi_depo_1").val(list.staff_farmasi_depo_1).trigger('change');
						if (list.staff_farmasi_depo_1) {
							$("#staff_farmasi_depo_1").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}
						$("#staff_farmasi_depo_2").val(list.staff_farmasi_depo_2).trigger('change');
						if (list.staff_farmasi_depo_2) {
							$("#staff_farmasi_depo_2").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}
						$("#perawat_penerima_obat").val(list.perawat_penerima_obat).trigger('change');
						if (list.perawat_penerima_obat) {
							$("#perawat_penerima_obat").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}
						$("#perawat_retur").val(list.perawat_retur).trigger('change');
						if (list.perawat_retur) {
							$("#perawat_retur").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}
						$("#staff_depo_retur").val(list.staff_depo_retur).trigger('change');
						if (list.staff_depo_retur) {
							$("#staff_depo_retur").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}
						$("#staff_inst_farmasi_retur").val(list.staff_inst_farmasi_retur).trigger('change');
						if (list.staff_inst_farmasi_retur) {
							$("#staff_inst_farmasi_retur").prop('disabled', true);
							cekVerif = 1;
						}else{
							cekVerif = 0;
						}

						if (cekVerif == 1) {
							$(".btnVerifSign").hide();
						}
					});
				}
			},
			complete: function () {
				$('.loading').css('display', 'none');
			}
		})
	}

	// kirim verifikasi
	function kirimVerif() {
		$.ajax({
			url: base_url + controller + '/kirim_verif/' + table + '_verif/' + visit_no,
			method: 'POST',
			data: $('#form-signed').serializeArray(),
			dataType: 'JSON',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block');
			},
			success: function (res) {
				console.log(res);
				res = JSON.parse(res);
				if (res.status == 200) {
					$("#mdlSigned").modal('hide');
					a_ok('Berhasil', 'Verifikasi terkirim!');
				}
			},
			complete: function () {
				$('.loading').css('display', 'none');
			}
		})
	}

	// kirim verifikasi
	function updateVerif() {
		$.ajax({
			url: base_url + controller + '/update_verif/' + table + '_verif/' + visit_no,
			method: 'POST',
			dataType: 'JSON',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block');
			},
			success: function (res) {
				console.log(res);
				res = JSON.parse(res);
				if (res.status == 200) {
					a_ok('Berhasil', 'Data telah diverifikasi!');
				}
			},
			complete: function () {
				$('.loading').css('display', 'none');
			}
		})
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
					$("#tanggal").prop("readonly", true)
					$('#form-data')[0].reset()
					get_list(filter);
				} else {
					a_error("Error", "Data Gagal Ditambahkan")
				}
			}
		})
	}

	function get_list(filter) {
		$.ajax({
			url: base_url + '<?= $controller ?>/detail_list_multiple/' + table + '/' + visit_no + '/' + form_ke + '/' + filter,
			dataType: 'json',
			async: false,
			beforeSend: function () {
				$('.loading').css('display', 'block')
			},
			success: function (res) {
				let html
				let no = 1
				let btnHapus = ''

				console.log(res);
				if (res) {
					$(".btnSigned").show();
					res.forEach(list => {
						btnHapus = '<button data-id="' + list.id +
							'" class="btn btn-danger btn-sm delete" ><i class="ti-trash"></i></button>'
						html += `<tr>
								<td>` + date_dmy(list.tanggal) + `</td>
								<td>` + list.nama_obat + `</td>
								<td>` + list.dosis + `</td>
								<td>` + list.aturan + `</td>
								<td>` + list.jumlah + `</td>
								<td>
									Pukul : `+ list.pukul_1 +` WIB<br />
									Pukul : `+ list.pukul_2 +` WIB<br />
									Pukul : `+ list.pukul_3 +` WIB<br />
									Pukul : `+ list.pukul_4 +` WIB<br />
								</td>
								<td align="center">` + btnHapus + `</td>
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
</script>
