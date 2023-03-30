<div class="col-12">
	<div class="box box-default">
		<div class="box-body">
			<form class="form" id="form-settings" method="post" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-12">
							<div class="form-group">
								<label for="nama_rs">Nama Klinik</label>
								<input type="text" class="form-control" name="nama_rs" id="nama_rs"
									placeholder="Nama Klinik">
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12">
							<div class="form-group">
								<label for="spesialisasi">Spesialisasi</label>
								<input type="text" class="form-control" name="spesialisasi" id="spesialisasi"
									placeholder="Nama Klinik">
							</div>
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12">
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea placeholder="Alamat Klinik" name="alamat" id="alamat" cols="30" rows="2"
									class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-12">
							<div class="form-group">
								<label for="email">E-mail</label>
								<textarea placeholder="email_rs@rs.com" name="email" id="email" cols="30" rows="1"
									class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-3 col-lg-2 col-sm-12">
							<div class="form-group">
								<label for="telepon">Telepon</label>
								<textarea placeholder="Telepon Klinik" name="telepon" id="telepon" cols="30"
									rows="1" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-md-5 col-lg-6 col-sm-12">
							<div class="form-group">
								<label for="link_maps">Link Google Maps</label>
								<input type="text" class="form-control" name="link_maps" id="link_maps"
									placeholder="https://www.google.com/maps/embed...........">
							</div>
						</div>
						<div class="col-md-12 col-lg-12 col-sm-12 mt-2">
							<label for="telepon"><strong>Social Media</strong></label>
							<hr class="my-15">
						</div>
						<div class="col-md-3 col-lg-3 col-sm-12">
							<div class="form-group">
								<label for="facebook">Link Facebook</label>
								<input type="text" class="form-control" name="facebook" id="facebook"
									placeholder="facebook.com/rsusarah">
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-12">
							<div class="form-group">
								<label for="youtube">Youtube</label>
								<input type="text" class="form-control" name="youtube" id="youtube"
									placeholder="youtube.com/channel/rsusarah">
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-12">
							<div class="form-group">
								<label for="twitter">Tiktok</label>
								<input type="text" class="form-control" name="twitter" id="twitter"
									placeholder="@rsusarah">
							</div>
						</div>
						<div class="col-md-3 col-lg-3 col-sm-12">
							<div class="form-group">
								<label for="instagram">Instagram</label>
								<input type="text" class="form-control" name="instagram" id="instagram"
									placeholder="instagram.com/rsusarah">
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12">
							<div class="form-group">
								<label>Logo Website <span class="text-danger">Disarankan 145px x 45px</span></label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="gambar_logo" name="gambar_logo">
									<label class="custom-file-label" for="gambar_logo">Choose file</label>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12 text-center">
							<img id="gambar" src="" width="50%">
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12">
							<div class="form-group">
								<label>Foto Dokter <span class="text-danger"></span></label>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="foto_dokter" name="foto_dokter">
									<label class="custom-file-label" for="foto_dokter">Choose file</label>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6 col-sm-12 text-center">
							<img id="gambar_dokter" src="" width="50%">
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<button type="button" id="cancel-settings" class="btn btn-rounded btn-warning btn-outline mr-1">
						<i class="ti-trash"></i> Cancel
					</button>
					<button type="button" id="save-settings" class="btn btn-rounded btn-primary btn-outline">
						<i class="ti-save-alt"></i> Save
					</button>
				</div>
			</form>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>

<script type="text/javascript">
	$(document).ready(function () {
		get_settings()

		$("#save-settings").click(function () {
			update_settings()
		})
		$("#cancel-settings").click(function () {
			get_settings()
		})

		$('#gambar_logo').on('change', function () {
			var fileName = $(this).val();
			$(this).next('.custom-file-label').html(fileName);
		})
	})

	function update_settings() {
		$.ajax({
			url: base_url + 'settings/update_settings',
			type: "POST",
			data: new FormData($("#form-settings").get(0)),
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			success: function (res) {
				if (res.status) {
					get_settings();
					swalSuccess("Berhasil!", "Data settings berhasil diperbarui!", "success");
				} else {
					$("span.help-block").remove();
					$(".form-control").removeClass("is-invalid");
					$.each(res.message, function (index, value) {
						if (value) {
							$("#" + index).addClass("is-invalid");
						}
					});
				}
			}
		});
	}

	function get_settings() {
		$.ajax({
			url: base_url + 'settings/get_settings',
			method: 'GET',
			dataType: 'json',
			success: function (data) {
				$("#nama_rs").val(data['nama_rs']);
				$("#spesialisasi").val(data['spesialisasi']);
				$("#alamat").val(data['alamat']);
				$("#email").val(data['email']);
				$("#telepon").val(data['telepon']);
				$("#link_maps").val(data['link_maps']);
				$("#facebook").val(data['facebook']);
				$("#youtube").val(data['youtube']);
				$("#twitter").val(data['twitter']);
				$("#instagram").val(data['instagram']);

				$("#gambar").attr('src', base_url + 'assets/images/' + data['gambar_logo']);
				$("#gambar_dokter").attr('src', base_url + 'assets/images/' + data['foto_dokter']);
			},
			err(e) {
				console.log(e)
			}
		})
	}

</script>
