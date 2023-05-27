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
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control" >
							</select>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label>Alergi (Obat, Makanan, dll)</label>
							<div class="input-group">
								<input type="text" class="form-control" id="alergi"
									name="alergi">
								<div class="input-group-append">
									<button class="btn btn-rounded btn-info btn-sm"
										id="btnSaveAlergi">Tambah</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<table id="tblAlergi" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
							<thead>
								<tr>
									<th width="100">Tanggal</th>
									<th>Alergi</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.box-body -->
<!-- /.box -->
<script type="text/javascript">
	// declare
	let visit_no = $('#visit_no').val();
	let controller = 'Resume_rj';
	let field = '<?= $field ?>';
	let cek = '<?= (!empty($row['status'])) ? $row['status'] : '' ?>';
	let tidak_lengkap;
	let panel = $('#panel_faskes_perujuk');
	let panel_input = $('#panel_faskes_perujuk input');
	let panel_checked = $('input[name="faskes_perujuk_pil"]:checked').val();
    // value radio untuk menampilkan input
    let valueShowInput = "Ada";

	$(".divLabel").remove();

	// membuat semua menjadi required
	$("input, textarea, select, .radio.form-control").addClass('required');
	$(".not-req input").removeClass('required');

	$(document).ready(function () {
        console.clear();

		$('#btnSaveAlergi').click(function (e) {
			e.preventDefault()
			saveAlergi('form_rj_alergi');
		})

        
	});

    // main form
	const saveAlergi = (table) => {
		$.ajax({
			url: base_url + controller + '/save_alergi/' + table,
			method:'POST',
			dataType: 'json',
			success: function (res) {
				console.log(res);
			}
		})
	}

	// check in json has no value
	const cek_field_kosong = (json) => {
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
	// main form


	const radioHasInput = (value, valueShowInput, panel, panel_input, is_mandatory) => {
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
