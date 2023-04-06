<div class="col-md-12">
	<div class="box">
		<div class="box-body mt-3">
			<input type="hidden" id="jenis" value="<?= $jenis ?>">
			<div class="table-responsive" id="getData">

			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal modal-right fade" id="mdlListFormulir" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Daftar Formulir <span id="txtMdl"></span></h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="box-body p-0">
					<div class="media-list media-list-hover media-list-divided inner-user-div" style="height: 345px; overflow: auto;" id="listForm">
						
					</div>
				</div>
				<div class="text-center bt-1 border-light p-10" id="listFormIncompleted">
					<a class="text-uppercase d-block font-size-12" href="#">Belum Lengkap Disimpan</a>
                    <hr>
                    <span class="text-xsm">Tidak ada</span>
				</div>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- /.modal -->

<script>
	$(document).ready(function () {
		//get formulir
		let jenis = $("#jenis").val();
		getPasien(jenis);

		$("tbody").on("click", ".btnFormulir", function () {
			let visit_no = $(this).data('id');
			if (jenis == 'I' || jenis == 'i')
				txtJenis = 'Rawat Inap';
			else
				txtJenis = 'Rawat Jalan';

			$("#txtMdl").text(txtJenis);
			getFormulir(jenis, visit_no);
			$("#mdlListFormulir").modal('show');
		})
	})

	function getFormulir(jenis, visit_no) {
		$.ajax({
			url: base_url + "daftar_pasien/fetch_daftar_formulir/" + jenis,
			method: "GET",
            dataType: 'json',
			success: function (data) {
				let html = '';
				for (let i = 0; i < data.length; i++) {
					let row = data[i];
					html += `
                    <div class="media media-single" style="justify-content: space-between;">
                        <a href="` + base_url + `in/form/` + row['id'] + `/` + visit_no + `" target="_blank">
                            <div class="media-body">
                                <h6>` + row['nama_formulir'] + `</h6>
                                <small class="text-fader">` + row['kode_formulir'] + `</small>
                            </div>

                            <div class="media-right">
                                    <i class="ti-alert"></i></a>
                            </div>
                            </a>
                    </div>
                    `;
					$("#listForm").html(html);

				}
			},
			error: function (err) {
				console.log(err)
				swal('Error ' + err.status, err.statusText);
			}
		})
	}

	function getPasien(jenis) {
		$.ajax({
			url: base_url + "daftar_pasien/fetch_daftar_pasien/" + jenis,
			method: "GET",
			async: false,
			success: function (data) {
				$('#getData').html(data);
				$("#tblData").DataTable();
			},
			error: function (err) {
				console.log(err)
				swal('Error ' + err.status, err.statusText);
			}
		})
	}

</script>
