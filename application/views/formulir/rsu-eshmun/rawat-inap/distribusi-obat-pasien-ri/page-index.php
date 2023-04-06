<div class="box">
    <div class="box-header with-border">
        <?php $this->load->view($label) ?>
    </div>
    <!-- Form transfer -->
    <form>
        <div class="form-group col-md-4">
            <label>Metode</label>
            <select class="form-control" name="metode_cppt" id="metode_cppt">
                <?php if ($this->session->userdata('is_doctor') == 'DOKTER') : ?>
                    <option value="Obat-Oral">Obat Oral</option>
                    <option value="Obat-Injeksi">Obat Injeksi</option>
                    <option value="Cairan-Infus">Cairan Infus</option>
                    <option value="suppositoria">Suppositoria/Inhalasi/Vagina</option>
                    <option value="Alkes">Alkes</option>
                <?php else : ?>
                    <option value="Obat-Oral">Obat Oral</option>
                    <option value="Obat-Injeksi">Obat Injeksi</option>
                    <option value="Cairan-Infus">Cairan Infus</option>
                    <option value="suppositoria">Suppositoria/Inhalasi/Vagina</option>
                    <option value="Alkes">Alkes</option>
                <?php endif ?>
            </select>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="form_obat">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="form-group col-md-9">
                            <label>Nama Cairan / Obat</label>
                            <input type="text" name="nama_obat" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Dosis</label>
                            <input type="text" name="dosis" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Aturan</label>
                            <input type="text" name="cara" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Jumlah</label>
                            <input type="text" name="jumlah" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Jam</label>
                            <input type="text" name="pukul" class="form-control bs-timepicker" value="<?php echo date('H:i') ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label>Dokter</label>
                            <select class="form-control" id="list-dokter">
                                <option value='' selected hidden>--- Pilih Dokter ---</option>
                            </select>
                            <input type="hidden" id="dokter_id" name="dokter">
                            <input type="hidden" id="ttd_dokter" name="ttd_dokter">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Perawat</label>
                            <select class="form-control" id="list-perawat">
                                <option value='' selected hidden>--- Pilih Perawat ---</option>
                            </select>
                            <input type="hidden" id="perawat_id" name="perawat">
                            <input type="hidden" id="ttd_perawat" name="ttd_perawat">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label><br>
                            <button class="btn btn-success btn-sm" id="add_obat"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-hover table-sm">
                                <thead class="text-center">
                                    <th width="100">Tanggal/ Jam</th>
                                    <th width="300">Nama Cairan / Obat</th>
                                    <th>Dosis</th>
                                    <th>Aturan</th>
                                    <th width="75">Jumlah</th>
                                    <th>Dokter</th>
                                    <th>Perawat</th>
                                    <th width="5">#</th>
                                </thead>
                                <tbody id="list_obat"></tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="modalAlergi">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Riwayat Alergi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal footer -->
                    <div class="box-footer">
                        <button type="reset" class="btn btn-rounded btn-danger">Batal</button>
                        <button type="submit" class="btn btn-rounded btn-success pull-right">Simpan</button>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="reset" class="btn btn-rounded btn-danger">Batal</button>
                <button type="submit" class="btn btn-rounded btn-success pull-right">Simpan</button>
            </div>
    </form>
</div>