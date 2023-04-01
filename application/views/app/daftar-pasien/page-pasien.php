<div class="col-md-12">
    <div class="box">
        <div class="box-body mt-3">
            <input type="hidden" id="jenis" value = "<?= $jenis ?>">
            <div class="table-responsive" id="getData">
                
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //get formulir
        let jenis = $("#jenis").val();
        getformulir(jenis);
    })
    function getformulir(jenis) {
        $.ajax({
            url: base_url + "daftar_pasien/fetch_daftar_pasien/" + jenis,
            method: "GET",
            success: function(data) {
                $('#getData').html(data);
                $("#tblData").DataTable();
            },
            error: function(err) {
                console.log(err)
                swal('Error ' + err.status, err.statusText);
            }
        })
    }
</script>
