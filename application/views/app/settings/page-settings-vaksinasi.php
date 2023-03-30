<div class="col-12">
	<div class="box box-default">
		<div class="box-body">
			<form class="form" id="formSetting" method="post" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row">
						<div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="form-group">
                                <label for="menu">Status Appointment</label>
                                <select name="status"  id="status" class="form-control">
                                    <option >Aktif</option>
                                    <option >Tidak Aktif</option>
                                </select>
                            </div>
						</div>
						
				</div>
				<!-- /.box-body -->
				<div class="box-footer text-center">
					<button type="button" id="cancel-settings" class="btn btn-rounded btn-warning btn-outline mr-1">
						<i class="ti-trash"></i> Cancel
					</button>
					<button type="button" id="save-settings" class="btn btn-rounded btn-primary btn-outline update-btn" >
						<i class="ti-save-alt"></i> Save
					</button>
				</div>
			</form>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
<script>
    $(document).ready(function() {
        // Add Tips
        $(document).on('click', ".update-btn", function() {
            $('.loading').show()
          
            var form_data = new FormData($('#formSetting')[0])
            $.ajax({
                url: '<?= base_url() ?>admin/settings/vaksinasi_act',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response) {
                    $('.loading').hide()
                    message = response.split("|")
                    if (message[0] == 'Error') {
                        swalError(message[0], message[1])
                    } else {
                        swalSuccess(message[0], message[1])
                        load_data();
                    }
                },
                error: function(err) {
                    $('.loading').hide()
                    console.log(err)
                    swalError('Error ' + err.status, err.statusText);
                }
            });
        })

        load_data();
        function load_data(){
            $.ajax({
                url: '<?= base_url() ?>admin/settings/vaksinasi_selected',
                
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log(data)
                    $('#link').val(data['link'])
                    $('#status').val(data['status'])
                },
                err(e) {
                    console.log(e)
                }
            })
        }
    })
</script>
