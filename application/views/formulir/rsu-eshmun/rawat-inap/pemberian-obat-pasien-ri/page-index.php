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
				<!-- <div class="form-group col-md-3">
					<label>Jam Pemberian Obat Injeksi</label>
					<select class="form-control" name="jam_pemberian_obat" id="jam_pemberian_obat">
						<option value="" disabled>Pilih</option>
						<option value="24">Per 24 Jam</option>
						<option value="12">Per 12 Jam</option>
						<option value="8">Per 8 Jam</option>
						<option value="6">Per 6 Jam</option>
						<option value="4">Per 4 Jam</option>
					</select>
				</div> -->
				<div class="col-md-12">
					<hr>
					<div class="row">
						<div class="form-group col-md-3">
							<label>Antibiotik</label>
							<select class="form-control" name="jenis" id="jenis">
								<option value="Profilaksis" selected="selected">Profilaksis</option>
								<option value="Empiris">Empiris</option>
								<option value="Defenitif">Defenitif</option>
							</select>
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
								<option value='' selected type="hidden">--- Pilih Dokter ---</option>
								<?php foreach ($dokter as $row) : ?>
									<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
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
								<option value='' selected type="hidden">--- Pilih Dokter ---</option>
								<?php foreach ($dokter as $row) : ?>
									<option value='<?= $row['User_Name'] ?>'><?= $row['User_Name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-12">
							<button class="btn btn-primary float-right save">Tambah
								<i class="ti-angle-double-down"></i></button>
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
	
	$(document).ready(function () {
		$(".select2").select2();
		get_list(filter);

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
	})

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
