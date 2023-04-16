	<!-- Vendor JS -->
	<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>
	<script src="<?= base_url() ?>assets/js/pages/chat-popup.js"></script>
	<script src="<?= base_url() ?>assets/icons/feather-icons/feather.min.js"></script>

	<script src="<?= base_url() ?>assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="<?= base_url() ?>assets/vendor_components/datatable/datatables.min.js"></script>
	<!-- <script src="<?= base_url() ?>assets/js/fontawesome.all.min.js"></script> -->
	<script src="<?= base_url() ?>assets/js/sweetalert2.js"></script>
	<script src="<?= base_url() ?>assets/js/function.js"></script>

	<!-- WebkitX Admin App -->
	<script src="<?= base_url() ?>assets/js/bootstrap-select.js"></script>
	<script src="<?= base_url() ?>assets/vendor_components/select2/dist/js/select2.full.js"></script>
	<script src="<?= base_url() ?>assets/js/template.js"></script>
	<!-- <script src="<?= base_url() ?>assets/js/pages/data-table.js"></script> -->
	<script src="<?= base_url() ?>assets/js/sweatalert.js"></script>
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
	<script src="<?= base_url() ?>assets/js/iziToast.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			//buka sidebar  menu jika mouse hover
			let is_collapsed_sidebar = "<?= (isset($is_collapsed) == true)? "sidebar-collapse" : "" ?>";
			if (is_collapsed_sidebar == "sidebar-collapse") {
				$(".main-sidebar").on({
					mouseover: function () {
						$("body").removeClass("sidebar-collapse");
					},
					mouseleave: function () {
						$("body").addClass("sidebar-collapse");
					}
				});
			}

			//kondisi aktif sidebar

			// ambil full url
			let full_url = window.location.href;
			// pecah segment url menjadi array
			let segment_url = full_url.split('/');

			let segment_active = '';

			// jika di localhost dengan asumsi link http://localhost/prosolution/emr_eshmun/formulir maka 'formulir' ada di posisi 5 (dihitung dari 0)
			//sehingga jika naik ke hosting harus di sesuaikan lagi dengan URL nya
			if (segment_url[2] == 'localhost') {
				segment_active = segment_url[5];
				segment_active = segment_active.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
				$("." + segment_active).addClass("active");
			}else{
				segment_active = segment_url[4];
				segment_active = segment_active.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
				$("." + segment_active).addClass("active");
			}
		});
	</script>

	<script type="text/javascript">
		const loading = (n) => {
			if (n === 1)
				$(".loading").css('display', 'block');
			else
				$(".loading").css('display', 'none');
		};

		// required function
		const validate = (is_mandatory) => {
			let valid = true;
			if (is_mandatory == 1) {
				$('.required').each(function () {
					let value = $(this).val();
					let value_radio = $(this).find('input[type="radio"]:checked').val() == '';
					if (value == '' || value_radio) {
						// focus on first is-invalid
						$('.is-invalid:first').focus();
						$(this).addClass('is-invalid');
						valid = false;
					} else {
						$(this).removeClass('is-invalid');
					}
				});
			}
			return valid;
		}

		function alertOkCancel(title, html, confirmButtonText) {
			let result = false;
			Swal.fire({
				title: title,
				html: html,
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: confirmButtonText
			}).then((result) => {
				result = true
			})
			return result;
		}

		function handleTrueFalse(input) {
			return (input == 1)? "true" : "false";
		}


		function showComponent(id_name, field_name) {
            $("#" + id_name+"0").on("click", function() {
                $("input[name='" + field_name + "']").css('display', 'none');
                $("input[name='" + field_name + "']").val('');
            });
            $("#" + id_name+"1").on("click", function() {
                $("input[name='" + field_name + "']").css('display', 'block');
            });
	    }
		function formatBackNumber(number) {
			return number.toString().replace(/[ ,.]/g, "");
		}

		function ct(data) {
			return console.table(data)
		}

		function cl(data) {
			return console.log(data)
		}

		function numberFormat(number) {
			return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}

		function a_ok(title, text) {
			iziToast.success({
				title: title,
				message: text,
			});
		}

		function a_error(title, text) {
			iziToast.error({
				title: title,
				message: text,
			});
		}

		function a_warning(title, text) {
			iziToast.warning({
				title: title,
				message: text,
			});
		}

		function jika_null(data) {
			return (data === null || data == '') ? '-' : data;
		}

		function date_dmy(inputDate) {
			if (inputDate) {
				let options = {
					year: 'numeric',
					month: 'short',
					day: 'numeric',
				}
				let date = new Date(inputDate)
				return date.toLocaleDateString("id-ID", options)
			} else
				return '-'
		}

		//check empty return some value
		function checkEmpty(obj, value) {
			if (obj == '' || obj == null || obj == undefined) {
				return '-';
			} else {
				return obj[value];
			}
		}

		//date ke full age
		function getAge(dateString) {
			let umur = dateString;
			umur = umur.split("-").reverse().join("-");
			umur = umur.split('-');
			var formattedDate = umur[1] + '-' + umur[0] + '-' + umur[2];


			var now = new Date();
			var today = new Date(now.getYear(), now.getMonth(), now.getDate());

			var yearNow = now.getYear();
			var monthNow = now.getMonth();
			var dateNow = now.getDate();

			var dob = new Date(formattedDate.substring(6, 10),
				formattedDate.substring(0, 2) - 1,
				formattedDate.substring(3, 5)
			);


			var yearDob = dob.getYear();
			var monthDob = dob.getMonth();
			var dateDob = dob.getDate();
			var age = {};
			var ageString = "";
			var yearString = "";
			var monthString = "";
			var dayString = "";


			yearAge = yearNow - yearDob;
			

			if (monthNow >= monthDob)
				var monthAge = monthNow - monthDob;
			else {
				yearAge--;
				var monthAge = 12 + monthNow - monthDob;
			}

			if (dateNow >= dateDob)
				var dateAge = dateNow - dateDob;
			else {
				monthAge--;
				var dateAge = 31 + dateNow - dateDob;

				if (monthAge < 0) {
					monthAge = 11;
					yearAge--;
				}
			}

			age = {
				years: yearAge,
				months: monthAge,
				days: dateAge
			};

			if (age.years > 1) yearString = " Thn";
			else yearString = " Thn";
			if (age.months > 1) monthString = " Bln";
			else monthString = " Bln";
			if (age.days > 1) dayString = " Hari";
			else dayString = " Hari";

			console.log(age);

			
			if (age.years > 0) {
				ageString = age.years + yearString;
				if (age.months > 0) ageString += " " + age.months + monthString;
				if (age.days > 0) ageString += " " + age.days + dayString;
			} else if (age.months > 0) {
				ageString = age.months + monthString;
				if (age.days > 0) ageString += " " + age.days + dayString;
			} else if (age.days > 0) ageString = age.days + dayString;

			return ageString;
		}

		function preview_img(input, id) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$("#" + id + "").attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}

		function format_tanggal_month_day(dateObject) {
			//if dateObject is null or undefined, return empty string
			if (dateObject == null || dateObject == undefined) {
				return "-";
			}
			var d = new Date(dateObject);
			var day = d.getDate();
			var month = d.getMonth() + 1;
			var year = d.getFullYear();
			// if (day < 10) {
			// 	day = "0" + day;
			// }
			if (month < 10) {
				month = "0" + month;
			}

			const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep",
				"Okt", "Nov", "Des"
			];

			var date = day ;

			return date;
		};

		function format_tanggal(dateObject) {
			//if dateObject is null or undefined, return empty string
			if (dateObject == null || dateObject == undefined) {
				return "-";
			}
			var d = new Date(dateObject);
			var day = d.getDate();
			var month = d.getMonth() + 1;
			var year = d.getFullYear();
			if (day < 10) {
				day = "0" + day;
			}
			if (month < 10) {
				month = "0" + month;
			}

			const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
				"Oktober", "November", "Desember"
			];

			var date = day + " " + monthNames[d.getMonth()] + " " + year;

			return date;
		};

		//format jam H:i:s 24 hours
		

		function format_jam(dateObject) {
			//if dateObject is null or undefined, return empty string
			if (dateObject == null || dateObject == undefined) {
				return "-";
			}
			var d = new Date(dateObject);
			var hours = d.getHours();
			var minutes = d.getMinutes();
			var seconds = d.getSeconds();
			minutes = minutes > 9 ? minutes : "0"+minutes;
			hours = hours < 10 ? '0' + hours : hours;
			minutes = minutes < 10 ? '0' + minutes : minutes;
			seconds = seconds < 10 ? '0' + seconds : seconds;

			var strTime = hours + ':' + minutes + ':' + seconds + ' WIB';
			return strTime;
		};

		function n_to_br(string) {
			//return false if null or empty string
			if (string == null || string == '') {
				return '-';
			}
			return string.replace(/\n/g, "<br />")
		};

		function days_between(date1, date2) {
			// The number of milliseconds in one day
			const ONE_DAY = 1000 * 60 * 60 * 24;
			// Calculate the difference in milliseconds
			const differenceMs = Math.abs(date1 - date2);
			// Convert back to days and return
			return Math.round(differenceMs / ONE_DAY);
		}
	</script>
	