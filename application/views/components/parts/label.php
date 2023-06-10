<!--  -->
<div class="row">

	<div class="col-md-6">
		<span class="text-gray"><?= $detail["Visit_No"] ?></span>
		<h5 class="mb-0"><b><?= $detail["Patient_Name"] ?></b></h5>
		<span style="font-size: 15px;"><?= $detail["Patient_Sex"] ?> -
			<?= $detail['umur']['y'] . " Tahun, " . $detail['umur']['m'] . " Bulan, dan " . $detail['umur']['d'] . " Hari" ?></span>
		<br>
		<span class="text-gray" style="font-size: 15px;"><?= $detail["AttDoctorName"] ?></span> <br>
		<span class="text-gray" style="font-size: 15px;">KAMAR : <?= $detail["Room_Type"] ?> /
			<?= $detail["Room_No"] ?></span>
	</div>
	<div class="col-md-6">
		<div class="row text-right">
			<div class="col-md-12 divLabel">
				<label for="">Data wajib lengkap</label>
				<button type="button" class="btn btn-toggle" id="btnMandatory" data-toggle="button" 
				aria-pressed="<?= (!empty($row['wajib']) && $row['wajib'] == 1) ? 'true' : 'false' ?>"
					autocomplete="off">
					<div class="handle"></div>
				</button> 
				<br />
				<span class="text-xsm text-danger">*Nonaktifkan jika tidak ingin melengkapi seluruh isian.</span>
			</div>
			<div class="col-md-12 mt-4 divLabelBtn">
				<!-- <button type="button" class="btn btn-warning mr-2" id="btnVerifTTD">
					<span class="ti-marker-alt"></span> Tanda tangani
				</button> -->
				<button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#mdlAlergi">
					<span class="ti-info-alt"></span> Riwayat Alergi
				</button>
				<a href="<?= $link_print ?>" id="link_print" class="btn btn-primary " target="_blank"> <i
						class="bi bi-printer-fill"></i> Print</a>
			</div>
		</div>
	</div>
</div>
