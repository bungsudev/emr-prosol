<div class="col-lg-12 col-12">
    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <?php $this->load->view($label) ?>
        </div>
        <style>
            body {
                overflow: auto !important;
            }

            table th,
            table tr,
            table td {
                vertical-align: top !important;
                /* border: 1px solid #000000 !important; */
                color: #000000 !important;
            }

            table th {
                font-weight: bold !important;
            }

            .soap tr,
            .soap td,
            .soap th {
                padding: 0 !important;
                vertical-align: top !important;
                border: 0px solid #000000 !important;
            }

            table .stempel tr,
            table .stempel td,
            table .stempel th {
                /* border: 2px solid #0d3377c7; */
                /* border: 2px solid #ededed; */
                /* border: 2px solid #2438A6 !important; */
                border: 2px solid black !important;
                padding: 10px !important;
                margin: 0;
                font-style: #0d3377c7;
                /* color: #2438A6 !important; */
            }

            .tulisan {
                color: black !important;
            }
        </style>
        <!-- END UMUR -->
        <!-- ===== FORM START ====== -->
        <div class="card">
            <div class="card-body">
                <form id="myForm">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" value="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jam</label>
                            <input type="text" id="example" class="form-control bs-timepicker" name="pukul" autocomplete="off" value="<?php echo date('H:i') ?>" />
                        </div>
                        <div class="form-group col-md-4">
                            <label>PPA</label>
                            <select class="form-control" name="ppa">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Metode</label>
                            <select class="form-control" name="metode_cppt" id="metode_cppt">
                                <?php if ($this->session->userdata('is_doctor') == 'DOKTER') : ?>
                                    <option value="SOAP">SOAP</option>
                                    <option value="ADIME">ADIME</option>
                                <?php else : ?>
                                    <option value="SOAP">SOAP</option>
                                    <option value="ADIME">ADIME</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <!-- ===== SOAP ===== -->
                        <div id="soap" style="width:100%">
                            <!-- ===== S ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd1" style="width:3vw;">S</span>
                                </div>
                                <textarea class="form-control" id="soap_s" name="soap_s" placeholder="..... " rows="5"></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="soap_s" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== O ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd2" style="width:3vw;">O</span>
                                </div>
                                <textarea class="form-control" id="soap_o" name="soap_o" placeholder="..... " rows="5"></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="soap_o" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== A ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd3" style="width:3vw;">A</span>
                                </div>
                                <textarea class="form-control" id="soap_a" name="soap_a" placeholder="..... " rows="5"></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="soap_a" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== P ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd4" style="width:3vw;">P</span>
                                </div>
                                <textarea class="form-control" id="soap_p" name="soap_p" placeholder="..... " rows="5"></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="soap_p" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                        </div>

                        <!-- ===== AIDME ===== -->
                        <div id="adime" style="width:100%">
                            <!-- ===== A ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd1" style="width:3vw;">A</span>
                                </div>
                                <textarea class="form-control" id="adime_a" name="soap_s" placeholder="..... " rows="5" required></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="adime_a" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== D ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd2" style="width:3vw;">D</span>
                                </div>
                                <textarea class="form-control" id="adime_d" name="soap_o" placeholder="..... " rows="5" required></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="adime_d" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== I ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd3" style="width:3vw;">I</span>
                                </div>
                                <textarea class="form-control" id="adime_i" name="soap_a" placeholder="..... " rows="5" required></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="adime_i" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== M ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd4" style="width:3vw;">M</span>
                                </div>
                                <textarea class="form-control" id="adime_m" name="soap_p[]" placeholder="..... " rows="5" required></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="adime_m" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                            <!-- ===== E ===== -->
                            <div class="input-group col-md-12 mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="labelMtd4" style="width:3vw;">E</span>
                                </div>
                                <textarea class="form-control" id="adime_e" name="soap_p[]" placeholder="..... " rows="5" required></textarea>
                                <div class="input-group-append" id="tambah-div">
                                    <button class="btn btn-primary text-white addTemp" data-field="adime_e" style="cursor: pointer;"><i class="anticon anticon-hdd"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" id="intruksi_ppa_group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label id="intruksi_ppa_label">Instruksi PPA Termasuk Pasca Bedah</label>
                                    <textarea name="intruksi_ppa" id="intruksi_ppa" cols="30" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                        </div>

                        <div class="row col-md-12">
                            <div id="serah_terima_group" class="form-group col-md-4">
                                <label id="serah_terima_label">Serah Terima</label>
                                <select class="form-control" name="serah_terima" id="serah_terima">
                                    <option value="Ya" selected>Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div id="dokter_rujukan_group" class="form-group col-md-4">
                                <label for="keterangan">Dokter Rujukan</label>
                                <select class="form-control" name="dokter_rujukan" id="dokter_rujukan">
                                    <option value='' selected type="hidden">--- Pilih Dokter ---</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>User</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?= $this->session->userdata('User_Name') ?>" readonly id="created_by" name="created_by">
                                    <input type="hidden" value="<?= $this->session->userdata('User_Code') ?>" id="created_code" name="created_code">
                                    <div class="input-group-append" id="tambah-div">
                                        <button type="submit" class="btn btn-success text-white" style="cursor: pointer;" id="tambah-cppt"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-sm">
                                <thead class="text-center">
                                    <tr>
                                        <th>Tanggal, Waktu</th>
                                        <th>PPA</th>
                                        <th>Hasil Asesmen Pasien dan Pemberian Pelayanan</th>
                                        <th>Intruksi PPA Termasuk Pasca Bedah</th>
                                        <th>Review dan Verifikasi DPJP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="list_cppt"></tbody>
                            </table>
                        </div>
                        <div class="col-md-12 mt-4">
                            <input type="hidden" value="1" name="status">
                            <input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="created_time">
                            <input type="hidden" value="<?php echo date("Y-m-d h:i") ?>" name="edited_time">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ===== FORM END ====== -->
    </div>

    <script>
        $('#soap').css('display', 'block')
        $('#adime').css('display', 'none')
        $('#metode_cppt').on('change', function(e) {
            console.log($(this).val())
            e.preventDefault()
            if ($(this).val() == 'SOAP') {
                $('#soap').css('display', 'block')
                $('#adime').css('display', 'none')
            } else if ($(this).val() == 'ADIME') {
                $('#soap').css('display', 'none')
                $('#adime').css('display', 'block')
            }
        })
    </script>