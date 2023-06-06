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
