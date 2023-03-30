<style>
	.ttd {
		border: 1px solid #0D6EFD;
	}
</style>

<div class="col-md-5 mx-auto">
	<?php if ($this->session->flashdata('message_sign')) { ?>
		<?= $this->session->flashdata('message_sign'); ?>
	<?php } ?>
	<div class="card p-5">
		<div class="card-body ">
			<div class="text-center pb-3">
				<h5><?= $title ?></h5>
				<div class="avatar avatar-image avatar-lg my-2">
					<?php if ($this->session->userdata('Medical_Code') == 'GP') { ?>
						<img src="<?= base_url(); ?>assets/images/avatar/avatar-13.png" width="100px" alt="">
					<?php } else { ?>
						<img src="<?= base_url(); ?>assets/images/avatar/nurse.png" width="100px" alt="">
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center mx-auto ttd">
					<p>Medan, <?= date("d M Y"); ?></p>
					<div id="signature-pad-1" class="m-signature-pad  mx-auto" style="width: 335px; height: 230px;">
						<div class="m-signature-pad--body">
							<canvas></canvas>
						</div>
						<div class="m-signature-pad--footer">
							<div class="description">Sign above</div>
							<button type="button" class="button clear" data-action="clear" id="clear1">Clear</button>
							<button type="button" class="button save" data-action="save" id='click'>Save</button>
						</div>
					</div>
					<img width='150' src='' id='sign_prev' style='display: none;' />
					<textarea id='output' style='display: none;'></textarea><br />
					<button type="button" id='ulang' style='display: none;' class="bedge bedge-info hide-print"><i class="anticon anticon-save"></i> Ulang</button>
					<br>
					<p class="mt-3"><?= $this->session->userdata('User_Name') ?></p>
				</div>
			</div>
			<form action="" method="post">
				<input type="hidden" id="c_td_petugas" value="<?= $this->session->userdata('sign') ?>">
				<input type="hidden" name="user_code" value="<?= $this->session->userdata('User_Code') ?>">
				<input type="hidden" name="ttd_petugas">
				<input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="petugas">
				<input type="hidden" value="<?= $this->session->userdata('User_Name') ?>" name="edited_by">
				<input type="hidden" value="<?= date("Y-m-d H:i") ?>" name="edited_time">
			</form>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/signature_pad.umd.js"></script>

<script>
	$(document).ready(function() {
		var wrapper1 = document.getElementById("signature-pad-1"),
			canvas1 = wrapper1.querySelector("canvas"),
			signaturePad1;

		function resizeCanvas(canvas) {
			var ratio = window.devicePixelRatio || 1;
			canvas.width = canvas.offsetWidth * ratio;
			canvas.height = canvas.offsetHeight * ratio;
			canvas.getContext("2d").scale(ratio, ratio);
		}

		resizeCanvas(canvas1);
		signaturePad1 = new SignaturePad(canvas1);

		function clear1() {
			signaturePad1.clear();
		}

		$("#clear1").click(function() {
			clear1();
		})

		$('#click').click(function() {
			var data = signaturePad1.toDataURL('image/png');
			$('#output').val(data);

			$("#sign_prev").show();
			$("#signature-pad-1").hide();
			$("#output").hide();
			$("#signature").hide();
			$("#ulang").show();
			$("#sign_prev").attr("src", data);
			$("input[name=ttd_petugas]").val(data);
			$(".msg").remove();
			up_ttd();
		});

		$('#ulang').click(function() {
			clear1();
			$("#sign_prev").hide();
			$("#click").show();
			$("#signature-pad-1").show();
			$("#output").hide();
			$("#output").val('');
			$("#signature").show();
			$("#ulang").hide();
		});

		if ($("#c_td_petugas").val() != '') {
			var im = $("#c_td_petugas").val();
			$("#sign_prev").attr("src", im);
			$("#sign_prev").show();
			$("#signature-pad-1").hide();
			$("#ulang").show();
			$("input[name=ttd_petugas]").val(im);
		}
	})

	function hd(id, cls) {
		$('#ulang' + id).click(function() {
			cls;
			$("#sign_prev" + id).hide();
			$("#click" + id).show();
			$("#signature-pad-" + id).show();
			$("#output" + id).hide();
			$("#output" + id).val('');
			$("#signature" + id).show();
			$("#ulang" + id).hide();
		});
	}

	function up_ttd() {
		$.ajax({
			url: base_url + 'auth/api_update_sign',
			method: "POST",
			data: $("form").serialize(),
			dataType: 'json',
			async: false,
			beforeSend: function(){
				$(".loading").fadeIn();
			},
			success: function(data) {
				console.log(data)
				if (data.metadata.code === 200) {
					a_ok('Berhasil','Tanda tangan anda telah di update!')
				}
				// window.location.reload()
				$(".loading").fadeOut();
			}
		});
	}
</script>