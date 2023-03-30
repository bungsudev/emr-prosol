<div class="col-xl-3 col-12">
	<div class="info-box bg-primary">
		<span class="info-box-icon push-bottom rounded-circle">
			<i class="fa fa-users"></i>
		</span>
		<div class="info-box-content">
			<span class="info-box-text">Pasien</span>
			<span class="info-box-number"><?= $pasien ?></span>
		</div>
	</div>
</div>
<div class="col-xl-3 col-12">
	<div class="info-box bg-success">
		<span class="info-box-icon push-bottom rounded-circle">
			<i class="fa fa-list"></i>
		</span>
		<div class="info-box-content">
			<span class="info-box-text">Antrian</span>
			<span class="info-box-number"><?= $antrian ?></span>
		</div>
	</div>
</div>
<div class="col-xl-3 col-12">
	<div class="info-box box-inverse bg-danger">
		<span class="info-box-icon push-bottom rounded-circle">
			<i class="fa fa-comments-o"></i>
		</span>
		<div class="info-box-content">
			<span class="info-box-text">Sedang Konsul</span>
			<span class="info-box-number"><?= $konsul ?></span>
		</div>
	</div>
</div>

<div class="col-xl-3 col-12">
	<div class="info-box box-inverse bg-warning">
		<span class="info-box-icon push-bottom rounded-circle">
			<i class="fa fa-credit-card-alt"></i>
		</span>
		<div class="info-box-content">
			<span class="info-box-text">Selesai</span>
			<span class="info-box-number"><?= $selesai ?></span>
		</div>
	</div>
</div>


<div class="col-xl-12 col-12">
	<div class="box">
		<div class="box-body">
			<h4 class="box-title">Kunjungan Harian Bulan <?= date('F Y') ?></h4>
			<div id="line-chart" style="height:250px;"></div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="<?= base_url() ?>assets/vendor_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/vendor_components/morris.js/morris.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		//ajax
		$.ajax({
			url: "<?= base_url() ?>dashboard/chart_kunjungan",
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				//maping array to new data
				let new_data = [];
				for (let i = 0; i < data.length; i++) {
					new_data.push({
						y: data[i].date,
						tgl_text: format_tanggal_month_day(data[i].date),
						kunjungan: data[i].total,
					})	
				}

				// LINE CHART
				var line = new Morris.Line({
					element: 'line-chart',
					data: new_data,
					xkey: 'tgl_text',
					ykeys: ['kunjungan'],
					labels: ['Jumlah'],
					xLabels: 'day',
					goals: [],
					yLabelFormat: function(y){return y = Math.round(y);},
					gridLineColor: '#eef0f2',
					lineColors: ['#0bb2d4'],
					lineWidth: 1,
      				// ymin: 0,
					parseTime: false,
					hideHover: 'auto'
				});
			}
		});
		
	});
</script>