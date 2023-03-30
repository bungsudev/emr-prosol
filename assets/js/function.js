function swalSuccess(judul, pesan) {
	Swal.fire({
		type: "success",
		title: judul,
		text: pesan
	}).then(result => {});
}
function swalError(judul, pesan) {
	setTimeout(function() {
		Swal.fire({
			type: "warning",
			title: judul,
			text: pesan
		}).then(result => {});
	});
}
$('input.number').focus(function(event) {
	$(this).select();
})
$('input.number').keyup(function(event) {
	// skip for arrow keys
	if(event.which >= 37 && event.which <= 40) return;

	// format number
	$(this).val(function(index, value) {
	return value
	.replace(/\D/g, "")
	.replace(/\B(?=(\d{3})+(?!\d))/g, ".")
	;
	});
});
$('input.number').focusout(function(event) {
	
	if($(this).val() == ""){
		$(this).val(0)
	}
	// format number
	$(this).val(function(index, value) {
	return value
	.replace(/\D/g, "")
	.replace(/\B(?=(\d{3})+(?!\d))/g, ".")
	;
	});
});

function formatNumber(number){
	return number.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
	;
}
function formatBackNumber(number){
	return number.toString().replace(/[ ,.]/g,"");
}
