<div class="col-lg-12 col-12">
    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <?php $this->load->view($label) ?>
        </div>
        <!-- /.box-header -->
        <form>
            <div class="box-body">
                <!-- <h4 class="mt-0 mb-20"><b>SURAT PERINTAH RAWAT INAP</b></h4> -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" id="default-01">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" id="default-01">
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <p>Dalam hal ini bertindak sebagai Dokter Jaga IGD, dengan ini menyatakan bahwa pasien tersebut dibawah ini :</p>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="norm">No Rekam Medis</label>
                            <input type="text" name="norm" id="norm" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" id="default-01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="diagnosa">Diagnosa</label>
                            <input type="text" name="diagnosa" id="diagnosa" class="form-control" id="default-01">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="indikasiri">Indikasi Rawat Inap</label>
                            <input type="text" name="indikasiri" id="indikasiri" class="form-control" id="default-01">
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <p>Fasilitas Kesehatan Perujuk</p>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="radio">
                                <input name="tim_dokter" type="radio" id="tim_dokter1" value="Tidak">
                                <label for="tim_dokter1">Tidak ada</label>
                            </div>
                            <div class="radio">
                                <input name="tim_dokter" type="radio" id="tim_dokter2" value="ada">
                                <label for="tim_dokter2">Ada</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="panel_tim_dokter">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tim_dokter1">1. Rumah sakit</label>
                                <input type="text" name="tim_dokter1" id="tim_dokter1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tim_dokter1">2. Puskesmas / Klinik</label>
                                <input type="text" name="tim_dokter2" id="tim_dokter2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div>
                    <p>Dalam mengobati penyakitnya memerlukan rawat inap di RSU Eshmun. Demikian Surat Perintah Rawat Inap ini Saya buat,agar dapat dilaksanakan.</p>
                </div>
                <br>
                <br>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="reset" class="btn btn-rounded btn-danger">Batal</button>
                    <button type="submit" class="btn btn-rounded btn-success pull-right">Simpan</button>
                </div>
        </form>
    </div>
    <!-- /.box -->
</div>