<div class="col-lg-12 col-12">
    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <?php $this->load->view($label) ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form id="form-data">
                <input type="hidden" name="visit_no" id="visit_no" value="<?= $detail['Visit_No'] ?>">
                <input type="hidden" name="mr_code" id="mr_code" value="<?= $detail['MR_Code'] ?>">
                <!-- <input type="hidden" name="wajib" id="wajib" value="<?= ($row['wajib'] != '') ? $row['wajib'] : true ?>"> -->
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal</label>
                            <input type="date" value="<?= (!empty(($row['tanggal_masuk']))) ? $row['tanggal_masuk'] : date('Y-m-d') ?>" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tgl_kontrol_ulang">Pukul</label>
                            <input type="time" value="<?= (!empty($row['tgl_kontrol_ulang'])) ? $row['tgl_kontrol_ulang'] : date('H:i') ?>" name="tgl_kontrol_ulang" id="tgl_kontrol_ulang" class="form-control" value="<?= (!empty($row['tgl_kontrol_ulang'])) ? $row['tgl_kontrol_ulang'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ruang_rawat_akhir">Bed IGD No</label>
                            <input type="text" value="<?= (!empty($row['ruang_rawat_akhir'])) ? $row['ruang_rawat_akhir'] : '' ?>" name="ruang_rawat_akhir" id="ruang_rawat_akhir" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keluhan_utama">Keluhan Utama</label>
                            <textarea rows="2" name="keluhan_utama" id="keluhan_utama" class="form-control" placeholder="keluhan Utama"><?= (!empty($row['keluhan_utama'])) ? $row['keluhan_utama'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ruang_rawat_akhir">Dibawa ke RS oleh : </label>
                        </div>
                    </div>
                    <?php
                    $temp_Val = [];
                    $data = (!empty($row['dibawa_ke_rs'])) ? $row['dibawa_ke_rs'] : '';
                    if ($data)
                        $temp_Val = explode("|", $data);

                    $data_Val = [
                        "Keluarga",
                        "Datang Sendiri",
                        "Polisi",
                        "Lain-lain",
                    ];
                    ?>

                    <?php foreach ($data_Val as $d) : ?>
                        <div class="checkbox">
                            <input class="form-check-input" id="dibawa_ke_rs<?= $d ?>" name="dibawa_ke_rs[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                            <label for="dibawa_ke_rs<?= $d ?>"><?= $d ?></label>
                        </div>
                    <?php endforeach ?>
                    <div class="col-md-12"></div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cara_anamnesa">Cara Anamnesa : </label>
                        </div>
                    </div>
                    <?php
                    $temp_Val = [];
                    $data = (!empty($row['cara_anamnesa'])) ? $row['cara_anamnesa'] : '';
                    if ($data)
                        $temp_Val = explode("|", $data);

                    $data_Val = [
                        "Auto Anamnesa",
                        "Allo Anamnesa",
                    ];
                    ?>

                    <?php foreach ($data_Val as $d) : ?>
                        <div class="checkbox">
                            <input class="form-check-input" id="cara_anamnesa<?= $d ?>" name="cara_anamnesa[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                            <label for="cara_anamnesa<?= $d ?>"><?= $d ?></label>
                        </div>
                    <?php endforeach ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="e">E</label>
                            <input type="text" name="e" id="e" value="<?= (!empty($row['e'])) ? $row['e'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="v">V</label>
                            <input type="text" name="v" id="v" value="<?= (!empty($row['v'])) ? $row['v'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label for="m">M</label>
                            <input type="text" name="m" id="m" value="<?= (!empty($row['m'])) ? $row['m'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="pupil">Pupil</label>
                            <input type="text" name="pupil" value="<?= (!empty($row['pupil'])) ? $row['pupil'] : '' ?>" id="pupil" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="reflex_cahaya">Reflex Cahaya</label>
                            <input type="text" name="reflex_cahaya" value="<?= (!empty($row['reflex_cahaya'])) ? $row['reflex_cahaya'] : '' ?>" id="reflex_cahaya" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="spo2">Sp02</label>
                            <input type="text" name="spo2" id="spo2" value="<?= (!empty($row['spo2'])) ? $row['spo2'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="skor_ews">Skor EWS</label>
                            <input type="text" name="skor_ews" id="skor_ews" value="<?= (!empty($row['skor_ews'])) ? $row['skor_ews'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tanda_vital">Tanda Vital : </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="td">TD (mmHg)</label>
                            <input type="text" name="td" id="td" value="<?= (!empty($row['td'])) ? $row['td'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="rr">RR (x/mnt)</label>
                            <input type="text" name="rr" id="rr" value="<?= (!empty($row['rr'])) ? $row['rr'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="nadi">Nadi (x/mnt)</label>
                            <input type="text" name="nadi" id="nadi" value="<?= (!empty($row['nadi'])) ? $row['nadi'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="suhu">Suhu (&deg;C)</label>
                            <input type="text" name="suhu" id="suhu" value="<?= (!empty($row['suhu'])) ? $row['suhu'] : '' ?>" class="form-control">
                        </div>
                    </div>
                    <hr>
                </div>
                <style>
                    .table td,
                    .table th {
                        border: 1px solid grey;
                    }

                    .table th {
                        text-align: center;
                    }
                </style>
                <table class="table" style="collapse: collapse;" width="100%">
                    <tr>
                        <th><b>SKALA TRIASE <br>Keterangan <br>Response Time</b></th>
                        <th style="background-color: #f06262;"><b>1 <br> Resusitasi <br> 10 menit</b></th>
                        <th style="background-color: #ffa500;"><b>2 <br> Gawat Darurat <br> 10 menit</b></th>
                        <th style="background-color: #f7e752;"><b>3 <br> Darurat <br> 30 menit</b></th>
                        <th style="background-color: #00a300;"><b>4 <br> Semi Darurat <br> 60 menit</b></th>
                        <th style="background-color: #32cd32;"><b>5 <br> Tidak Darurat <br> 120 menit</b></th>
                    </tr>
                    <tr>
                        <td><b>AIRWAY <br> (Jalan Napas)</b></td>
                        <?php
                        $temp_Val = [];
                        $data = (!empty($row['airway'])) ? $row['airway'] : '';
                        if ($data)
                            $temp_Val = explode("|", $data);

                        $data_Val =  [
                            "Sumbatan",
                            "airway_gawat_darurat",
                            "airway_darurat",
                            "airway_semi_darurat",
                            "airway_tidak_darurat",
                        ];
                        $dataTitle = [
                            "Sumbatan",
                            "Bebas",
                            "Bebas",
                            "Bebas",
                            "Bebas",
                        ];

                        $ke = 0;
                        for ($i = 0; $i < sizeof($data_Val); $i++) {
                            $ke++;
                            if ($ke == '1')
                                $bg = 'style="background-color: #f06262;"';
                            elseif ($ke == '2')
                                $bg = 'style="background-color: #ffa500;"';
                            elseif ($ke == '3')
                                $bg = 'style="background-color: #f7e752;"';
                            elseif ($ke == '4')
                                $bg = 'style="background-color: #00a300;"';
                            elseif ($ke == '5')
                                $bg = 'style="background-color: #32cd32;"';
                        ?>
                            <td <?= $bg ?>>
                                <div class="checkbox">
                                    <input class="form-check-input" id="airway<?= $data_Val[$i]  ?>" name="airway[]" value="<?= $data_Val[$i] ?>" type="checkbox" <?= (in_array($data_Val[$i], $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="airway<?= $data_Val[$i] ?>"><?= $dataTitle[$i] ?></label>
                                </div>
                            </td>
                        <?php
                        } ?>
                    </tr>
                    <tr>
                        <td><b>BREATHING <br> (Pernafasan)</b></td>
                        <td style="background-color: #f06262;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['br_resusitasi'])) ? $row['br_resusitasi'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Henti Nafas",
                                "< 10 x/mnt",
                                "Sianosis",
                                "Distress pernafasan berat",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="br_resusitasi<?= $d ?>" name="br_resusitasi[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="br_resusitasi<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #ffa500;">
                            Frekuensi Nafas
                            <br>
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['br_gawat_darurat'])) ? $row['br_gawat_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "> 32 x/mnt",
                                "Mengi",
                                "Distress pernafasan sedang",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="br_gawat_darurat<?= $d ?>" name="br_gawat_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="br_gawat_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #f7e752;">
                            Frekuensi Nafas
                            <br>
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['br_darurat'])) ? $row['br_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "> 24-32 x/mnt",
                                "Mengi",
                                "Distress pernafasan ringan",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="br_darurat<?= $d ?>" name="br_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="br_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #00a300;">
                            Frekuensi Nafas
                            <br>

                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['br_semi_darurat'])) ? $row['br_semi_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "> 20-24 x/mnt",
                                "Tidak ada gangguan",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="br_semi_darurat<?= $d ?>" name="br_semi_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="br_semi_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #32cd32;">
                            Frekuensi Nafas
                            <br>
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['br_tidak_darurat'])) ? $row['br_tidak_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "> 16-20 x/mnt",
                                "Tidak ada gangguan",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="br_tidak_darurat<?= $d ?>" name="br_tidak_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="br_tidak_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>CIRCULATION <br> (Sirkulasi)</b></td>
                        <td style="background-color: #f06262;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['cr_resusitasi'])) ? $row['cr_resusitasi'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Henti Jantung",
                                "Nadi tidak teraba",
                                "Pucat",
                                "Akral dingin",
                                "Perdarahan tidak terkontrol",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="cr_resusitasi<?= $d ?>" name="cr_resusitasi[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="cr_resusitasi<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #ffa500;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['cr_gawat_darurat'])) ? $row['cr_gawat_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Nadi teraba lemah",
                                "Nado < 50 x/mnt atau > 150 x/mnt",
                                "Dehidrasi berat",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="cr_gawat_darurat<?= $d ?>" name="cr_gawat_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="cr_gawat_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #f7e752;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['cr_darurat'])) ? $row['cr_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Nadi 120-150 x/mnt",
                                "Sistol >160 mmHg",
                                "Diastol > 100 mmHg",
                                "Dehidrasi sedang",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="cr_darurat<?= $d ?>" name="cr_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="cr_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #00a300;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['cr_semi_darurat'])) ? $row['cr_semi_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Nadi 100-120 x/mnt",
                                "Sistol >120-180 mmHg",
                                "Diastol > 80-100",
                                "Dehidrasi ringan",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="cr_semi_darurat<?= $d ?>" name="cr_semi_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="cr_semi_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #32cd32;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['cr_tidak_darurat'])) ? $row['cr_tidak_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Nadi 80-110 x/mnt",
                                "Sistol 120 mmHg",
                                "Diastol 80 mmHg",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="cr_tidak_darurat<?= $d ?>" name="cr_tidak_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="cr_tidak_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>DISABILITY <br> (Kesadaran)</b></td>
                        <td style="background-color: #f06262;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['ds_resusitasi'])) ? $row['ds_resusitasi'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "GCS < 9",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="ds_resusitasi<?= $d ?>" name="ds_resusitasi[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="ds_resusitasi<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #ffa500;">

                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['ds_gawat_darurat'])) ? $row['ds_gawat_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "GCS 9-12",
                                "Penurunan aktivitas berat",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="ds_gawat_darurat<?= $d ?>" name="ds_gawat_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="ds_gawat_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #f7e752;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['ds_darurat'])) ? $row['ds_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "Henti Nafas",
                                "< 10 x/mnt",
                                "Sianosis",
                                "Distress pernafasan berat",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="ds_darurat<?= $d ?>" name="ds_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="ds_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #00a300;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['ds_semi_darurat'])) ? $row['ds_semi_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "GCS 15",
                                "Penurunan aktivitas ringan",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="ds_semi_darurat<?= $d ?>" name="ds_semi_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="ds_semi_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                        <td style="background-color: #32cd32;">
                            <?php
                            $temp_Val = [];
                            $data = (!empty($row['ds_tidak_darurat'])) ? $row['ds_tidak_darurat'] : '';
                            if ($data)
                                $temp_Val = explode("|", $data);

                            $data_Val = [
                                "GCS 15",
                            ];
                            ?>

                            <?php foreach ($data_Val as $d) : ?>
                                <div class="checkbox">
                                    <input class="form-check-input" id="ds_tidak_darurat<?= $d ?>" name="ds_tidak_darurat[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                    <label for="ds_tidak_darurat<?= $d ?>"><?= $d ?></label>
                                </div>
                            <?php endforeach ?>
                        </td>
                    </tr>
                </table>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="skala_nyeri">Skala Nyeri</label>
                            <input type="text" value="<?= (!empty($row['skala_nyeri'])) ? $row['skala_nyeri'] : '' ?>" name="skala_nyeri" id="skala_nyeri" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <table class="table table-responsive-sm">
                            <tr>
                                <th class="text-center" colspan="2">Skala FLACC untuk anak < 6th</th>
                                <th class="text-center" colspan="2">
                                    Skala : 0 = Nyaman , 1 - 3 = Kurang Nyaman , 4 - 6 = Nyeri Sedang , 7 - 10 = Nyeri Berat
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Pengkajian</th>
                                <th class="text-center">0</th>
                                <th class="text-center">1</th>
                                <th class="text-center">2</th>
                            </tr>
                            <?php
                            $value = [
                                'Wajah' => [
                                    'Tersenyum/ tidak ada ekspresi khusus', 'Terkadang meringis/ menarik diri', 'Sering menggetarkan dagu dan mengatupkan rahang'
                                ],
                                'Kaki' => [
                                    'Gerakan normal/ relaksasi', 'Tidak Tenang/ tegang', 'Kaki dibuat menendang/ menarik diri'
                                ],
                                'Aktifitas' => [
                                    'Tidur, posisi normal, mudah bergerak', 'Gerakan menggeliat, berguling, kaku', 'Melengkungkan punggung/ kaki/ menghentak'
                                ],
                                'Menangis' => [
                                    'Tidak menangis (bangun/ tidur)', 'Mengerang, merengek-rengek', 'Menangis terus-menerus, terhisak, menjerit'
                                ],
                                'Bersuara' => [
                                    'Bersuara normal, tenang', 'Tenang bila dipeluk, digendong atau diajak bicara', 'Sulit untuk menenangkan'
                                ]
                            ];

                            $no = 0;
                            foreach ($value as $val => $v) : ?>
                                <tr>
                                    <th class="text-center"><?= $val ?></th>
                                    <td>
                                        <input type="radio" name="flacc_<?= strtolower($val) ?>" value="<?= $v[0] ?>" id="<?= $v[0] ?>" <?= (!empty($row['flacc_' . strtolower($val)])) ? ($row['flacc_' . strtolower($val)] == $v[0]) ? 'checked' : '' : '' ?>>
                                        <label for="<?= $v[0] ?>"><?= $v[0] ?></label>
                                    </td>
                                    <td>
                                        <input type="radio" name="flacc_<?= strtolower($val) ?>" value="<?= $v[1] ?>" id="<?= $v[1] ?>" <?= (!empty($row['flacc_' . strtolower($val)])) ? ($row['flacc_' . strtolower($val)] == $v[1]) ? 'checked' : '' : '' ?>>
                                        <label for="<?= $v[1] ?>"><?= $v[1] ?></label>
                                    </td>
                                    <td>
                                        <input type="radio" name="flacc_<?= strtolower($val) ?>" value="<?= $v[2] ?>" id="<?= $v[2] ?>" <?= (!empty($row['flacc_' . strtolower($val)])) ? ($row['flacc_' . strtolower($val)] == $v[2]) ? 'checked' : '' : '' ?>>
                                        <label for="<?= $v[2] ?>"><?= $v[2] ?></label>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4"> <b>Total Skor :</b> &emsp; 1</td>
                            </tr>
                        </table>
                    </div>

                    <?php
                    $temp_Val = [];
                    $data = (!empty($row['status_alergi'])) ? $row['status_alergi'] : '';
                    if ($data)
                        $temp_Val = explode("|", $data);

                    $data_Val = [
                        "Tidak",
                        "Ya",
                    ];
                    ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="status_alergi">Status Alergi</label>
                        </div>
                    </div>
                    <?php foreach ($data_Val as $d) : ?>
                        <div class="radio">
                            <input class="form-check-input" id="status_alergi<?= $d ?>" name="status_alergi" value="<?= $d ?>" type="radio" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                            <label for="status_alergi<?= $d ?>"><?= $d ?></label>
                        </div>
                    <?php endforeach ?>

                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" value="<?= (!empty($row['status_alergi_detail'])) ? $row['status_alergi_detail'] : '' ?>" name="status_alergi_detail" id="status_alergi_detail" class="form-control" placeholder="Lainnya">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2"></div>
                    <?php
                    $temp_Val = [];
                    $data = (!empty($row['gangguan_prilaku'])) ? $row['gangguan_prilaku'] : '';
                    if ($data)
                        $temp_Val = explode("|", $data);

                    $data_Val = [
                        "Tidak Ternganggu",
                        "Ada Gangguan",
                    ];
                    ?>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="gangguan_prilaku">Gangguan Prilaku</label>
                        </div>
                    </div>
                    <?php foreach ($data_Val as $d) : ?>
                        <div class="radio">
                            <input class="form-check-input" id="gangguan_prilaku<?= $d ?>" name="gangguan_prilaku" value="<?= $d ?>" type="radio" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                            <label for="gangguan_prilaku<?= $d ?>"><?= $d ?></label>
                        </div>
                    <?php endforeach ?>

                    <div class="col-md-6"></div>
                    <div class="col-md-4"></div>

                    <?php
                    $temp_Val = [];
                    $data = (!empty($row['gangguan_prilaku_detail'])) ? $row['gangguan_prilaku_detail'] : '';
                    if ($data)
                        $temp_Val = explode("|", $data);

                    $data_Val = [
                        "Tidak Membahayakan",
                        "Membahayakan diri sendiri/orang lain",
                    ];
                    ?>

                    <?php foreach ($data_Val as $d) : ?>
                        <div class="radio">
                            <input class="form-check-input" id="gangguan_prilaku_detail<?= $d ?>" name="gangguan_prilaku_detail" value="<?= $d ?>" type="radio" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                            <label for="gangguan_prilaku_detail<?= $d ?>"><?= $d ?></label>
                        </div>
                    <?php endforeach ?>

                    <div class="col-md-12 mb-2"></div>
                    <?php
                    $temp_Val = [];
                    $data = (!empty($row['risiko_penularan'])) ? $row['risiko_penularan'] : '';
                    if ($data)
                        $temp_Val = explode("|", $data);

                    $data_Val = [
                        "Batuk lebih dari 2 minggu dengan demam dan sesak",
                        "Rujukan dengan Suspek / Probable / Konfirmasi airbone disease",
                        "Tidak berisiko penularan airbone disease"
                    ];
                    ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="risiko_penularan">Risiko Penularan Infeksi : </label>
                        </div>
                    </div>
                    <?php foreach ($data_Val as $d) : ?>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <input class="form-check-input" id="risiko_penularan<?= $d ?>" name="risiko_penularan[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                <label for="risiko_penularan<?= $d ?>"><?= $d ?></label>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm">
                            <tr>
                                <td style="background-color: #32cd32;" colspan="2"><b>ASESMEN MEDIS GAWAT DARURAT</b></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="col-md-3">
                                        <label for="diperiksa_pada">Pemeriksaan Dokter</label>
                                        <input type="time" value="<?= (!empty($row['diperiksa_pada'])) ? $row['diperiksa_pada'] : date('H:i') ?>" name="diperiksa_pada" id="diperiksa_pada" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="58%" class="text-center"><b>SUBJEKTIF</b></td>
                                <td class="text-center"><b>OBJEKTIF</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <b> Keluhan dan gejala klinis pasien saat ini :</b> <br>
                                </td>
                                <td class="text-center" style="background-color: grey">
                                    <b>PRIMARY SURVEY
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea rows="19" name="keluhan_igd" id="keluhan_igd" class="form-control"><?= (!empty($row['keluhan_igd'])) ? $row['keluhan_igd'] : '' ?></textarea>
                                </td>
                                <td>
                                    AIRWAY dengan C-spine Control <br>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['obj_airway'])) ? $row['obj_airway'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Bebas",
                                        "Garling",
                                        "Stridor",
                                        "Wheezing",
                                        "Ronchi",
                                        "Terintubasi",
                                        "Lain-lain",
                                    ];
                                    ?>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="obj_airway<?= $d ?>" name="obj_airway[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="obj_airway<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                    <div class="form-group">
                                        <label for="obj_airway_lainnya">Lain-lain</label>
                                        <input type="text" value="<?= (!empty($row['obj_airway_lainnya'])) ? $row['obj_airway_lainnya'] : '' ?>" name="obj_airway_lainnya" id="obj_airway_lainnya" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="obj_airway_tindakan">Tindakan Resusitasi (*bila ada)</label>
                                        <input type="text" value="<?= (!empty($row['obj_airway_tindakan'])) ? $row['obj_airway_tindakan'] : '' ?>" name="obj_airway_tindakan" id="obj_airway_tindakan" class="form-control">
                                    </div>
                                    <hr>
                                    BREATHING <br>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['obj_breathing'])) ? $row['obj_breathing'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Spontan",
                                        "Tachipneu",
                                        "Dispneu",
                                        "Apneu",
                                        "Ventilasi Mekanin",
                                        "Lain-lain",
                                    ];
                                    ?>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="obj_breathing<?= $d ?>" name="obj_breathing[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="obj_breathing<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                    <div class="form-group">
                                        <label for="obj_breathing_tindakan">Tindakan Resusitasi (*bila ada)</label>
                                        <input type="text" value="<?= (!empty($row['obj_breathing_tindakan'])) ? $row['obj_breathing_tindakan'] : '' ?>" name="obj_breathing_tindakan" id="obj_breathing_tindakan" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Riwayat Penyakit Terdahulu / Riwayat Kehamilan / Riwayat Operasi / Riwayat Transfusi</b>
                                </td>
                                <td><b>CIRCULATION</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <textarea rows="4" name="riwayat_penyakit_terdahulu" id="riwayat_penyakit_terdahulu" class="form-control"><?= (!empty($row['riwayat_penyakit_terdahulu'])) ? $row['riwayat_penyakit_terdahulu'] : '' ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Riwayat Penggunaan Obat dan Diet Terakhir :
                                        </label>
                                        <textarea rows="4" name="riwayat_penggunaan_obat" id="riwayat_penggunaan_obat" class="form-control"><?= (!empty($row['riwayat_penggunaan_obat'])) ? $row['riwayat_penggunaan_obat'] : '' ?></textarea>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_nadi'])) ? $row['obj_nadi'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Kuat",
                                                "Lemah",
                                            ];
                                            ?> Nadi :
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_nadi<?= $d ?>" name="obj_nadi[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_nadi<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_crt'])) ? $row['obj_crt'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "< 2",
                                                "> 2",
                                            ];
                                            ?> CRT :
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_crt<?= $d ?>" name="obj_crt[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_crt<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_warna_kulit'])) ? $row['obj_warna_kulit'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Normal",
                                                "Pucat",
                                                "Kuning",
                                            ];
                                            ?> Warna Kulit :
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_warna_kulit<?= $d ?>" name="obj_warna_kulit[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_warna_kulit<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_perdarahan'])) ? $row['obj_perdarahan'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Tdk Ada",
                                                "Terkontrol",
                                                "Tdk Terkontrol",
                                            ];
                                            ?> Perdarahan :
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_perdarahan<?= $d ?>" name="obj_perdarahan[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_perdarahan<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_turgor'])) ? $row['obj_turgor'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Baik",
                                                "Buruk",
                                                "Lain-lain",
                                            ];
                                            ?> Turgor kulit :
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_turgor<?= $d ?>" name="obj_turgor[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_turgor<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="obj_circulation">Tindakan Resusitasi (*bila ada)</label>
                                            <input type="text" value="<?= (!empty($row['obj_circulation'])) ? $row['obj_circulation'] : '' ?>" name="obj_circulation" id="obj_circulation" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: grey">
                                    <b>Pengkajian Psiko-sosio-spiritual-kultural</b>
                                </td>
                                <td><b>DISABILITY</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['hubungan_pasien'])) ? $row['hubungan_pasien'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Baik",
                                        "Tidak Baik",
                                    ];
                                    ?>
                                    <b>Hubungan pasien dengan keluarga : &emsp;</b>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="hubungan_pasien<?= $d ?>" name="hubungan_pasien[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="hubungan_pasien<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                    <br>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['status_psikologi'])) ? $row['status_psikologi'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Tenang",
                                        "Cemas",
                                        "Takut",
                                        "Marah",
                                        "Sedih",
                                    ];
                                    ?>
                                    <b>Status Psikologis : &emsp;</b>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="status_psikologi<?= $d ?>" name="status_psikologi[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="status_psikologi<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                    <br>
                                    Kecenderungan bunuh diri (bila ada) dilaporkan ke
                                    <input type="text" name="kecenderungan_bundir" id="kecenderungan_bundir" value="<?= (!empty($row['kecenderungan_bundir'])) ? $row['kecenderungan_bundir'] : '' ?>" class="form-control">
                                </td>
                                <td>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['respon'])) ? $row['respon'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Alert",
                                        "Pain",
                                        "Verbal",
                                        "Unrespon",
                                    ];
                                    ?>
                                    <b>Respon : &emsp;</b>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="respon<?= $d ?>" name="respon[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="respon<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <b>Pupil : </b>
                                            <input type="text" name="obj_pupil" id="obj_pupil" value="<?= (!empty($row['obj_pupil'])) ? $row['obj_pupil'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_pupil_lainnya'])) ? $row['obj_pupil_lainnya'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Isokor",
                                                "Anisokor",
                                            ];
                                            ?>
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_pupil_lainnya<?= $d ?>" name="obj_pupil_lainnya[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_pupil_lainnya<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['obj_disability'])) ? $row['obj_disability'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Pin Poin",
                                                "Midriasis",
                                            ];
                                            ?>
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="obj_disability<?= $d ?>" name="obj_disability[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="obj_disability<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <b>Reflek Cahaya : </b>
                                            <input type="text" name="obj_reflek_cahaya" id="obj_reflek_cahaya" value="<?= (!empty($row['obj_reflek_cahaya'])) ? $row['obj_reflek_cahaya'] : '' ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <b>Pekerjaan,</b> Sebutkan :
                                        </div>
                                        <div class="col-md-7 mb-3">
                                            <input type="text" name="pekerjaan" id="pekerjaan" value="<?= (!empty($row['pekerjaan'])) ? $row['pekerjaan'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-5">
                                            <b>Kultural : Suku Bangsa, </b> Sebutkan :
                                        </div>
                                        <div class="col-md-7 mb-3">
                                            <input type="text" name="suku_bangsa" id="suku_bangsa" value="<?= (!empty($row['suku_bangsa'])) ? $row['suku_bangsa'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-5">
                                            <b>Spiritual : Agama,</b> Sebutkan :
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" name="agama" id="agama" value="<?= (!empty($row['agama'])) ? $row['agama'] : '' ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <b>Luka di </b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="luka_di" id="luka_di" value="<?= (!empty($row['luka_di'])) ? $row['luka_di'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Lain-lain</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="luka_lainnya" id="luka_lainnya" value="<?= (!empty($row['luka_lainnya'])) ? $row['luka_lainnya'] : '' ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2" style="vertical-align: middle;"><b>STATUS LOKALISATA</b> (*berikan petunjuk dan tanda serta jelaskan sifat,
                                    jenis, ukuran, lokasi, dan tindakan yang dilakukan)
                                </td>
                                <td align="center" style="background-color: grey;"><b>SECONDARY SURVEY</b></td>
                            </tr>
                            <tr>
                                <td align="center"><b>PEMERIKSAAN FISIK</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <table class="table table-sm">
                                        <tr>
                                            <th style="vertical-align: middle;">Anggota Tubuh</th>
                                            <th style="vertical-align: middle;">Normal </th>
                                            <th style="vertical-align: middle;">Abnormal (Jelaskan)</th>
                                        </tr>
                                        <?php
                                        $title = [
                                            'kepala', 'mata', 'leher', 'tht', 'mulut', 'thorax', 'abdomen', 'genitalia', 'extremitas'
                                        ];
                                        // for($i=1; $i< sizeof($title); $i++):
                                        foreach ($title as $tubuh) {

                                        ?>
                                            <tr>
                                                <td><b><?= ucwords($tubuh) ?></b></td>
                                                <td><input type="text" name="fisiknr_<?= $tubuh ?>" id="fisiknr_<?= $tubuh ?>" value="<?= (!empty($row['fisiknr_' . $tubuh])) ? $row['fisiknr_' . $tubuh] : '' ?>" class="form-control"></td>
                                                <td><input type="text" name="fisikab_<?= $tubuh ?>" id="fisikab_<?= $tubuh ?>" value="<?= (!empty($row['fisikab_' . $tubuh])) ? $row['fisikab_' . $tubuh] : '' ?>" class="form-control"></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>PEMERIKSAAN PENUNJANG DI IGD </b>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <b>EKG</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_ekg" id="peme_ekg" value="<?= (!empty($row['peme_ekg'])) ? $row['peme_ekg'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Radiologi</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_rad" id="peme_rad" value="<?= (!empty($row['peme_rad'])) ? $row['peme_rad'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Laboratorium</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_lab" id="peme_lab" value="<?= (!empty($row['peme_lab'])) ? $row['peme_lab'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Lain-lain</b>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="peme_lainnya" id="peme_lainnya" value="<?= (!empty($row['peme_lainnya'])) ? $row['peme_lainnya'] : '' ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <b>PEMERIKSAAN PENUNJANG DARI RS LAIN</b>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <b>EKG</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_ekg_ext" id="peme_ekg_ext" value="<?= (!empty($row['peme_ekg_ext'])) ? $row['peme_ekg_ext'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Radiologi</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_rad_ext" id="peme_rad_ext" value="<?= (!empty($row['peme_rad_ext'])) ? $row['peme_rad_ext'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Laboratorium</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_lab_ext" id="peme_lab_ext" value="<?= (!empty($row['peme_lab_ext'])) ? $row['peme_lab_ext'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <b>Lain-lain</b>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                            <input type="text" name="peme_lainnya_ext" id="peme_lainnya_ext" value="<?= (!empty($row['peme_lainnya_ext'])) ? $row['peme_lainnya_ext'] : '' ?>" class="form-control">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <b>ASESMEN </b>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <b>Diagnosa Utama</b>
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <input type="text" name="diagnosa_utama" id="diagnosa_utama" value="<?= (!empty($row['diagnosa_utama'])) ? $row['diagnosa_utama'] : '' ?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <b>Diagnosa Tambahan</b>
                                                </div>
                                                <div class="col-md-8 mb-3">
                                                    <input type="text" name="diagnosa_tambahan" id="diagnosa_tambahan" value="<?= (!empty($row['diagnosa_tambahan'])) ? $row['diagnosa_tambahan'] : '' ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <b>Diagnosa Banding</b>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" name="diagnosa_banding" id="diagnosa_banding" value="<?= (!empty($row['diagnosa_banding'])) ? $row['diagnosa_banding'] : '' ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for=""><b>PROGNOSA</b></label>
                                    <textarea name="prognosa" id="prognosa" cols="30" rows="3" class="form-control"><?= (!empty($row['prognosa'])) ? $row['prognosa'] : '' ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for=""><b>PLANNING :</b> Penatalaksanaan / Pengobatan / Rencana Tindakan / Konsultasi</label>
                                    <textarea name="planning" id="planning" cols="30" rows="3" class="form-control"><?= (!empty($row['planning'])) ? $row['planning'] : '' ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label for=""><b>INSTRUKSI TINDAK LANJUT : </b> (Tatalaksana Pasien / Pengobatan / Tindakan / Konsul)</label>
                                    <textarea name="instruksi_tindak_lanjut" id="instruksi_tindak_lanjut" cols="30" rows="3" class="form-control"><?= (!empty($row['instruksi_tindak_lanjut'])) ? $row['instruksi_tindak_lanjut'] : '' ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>EDUKASI PASIEN</b><br>
                                    Edukasi awal, disampaikan diagnosis, rencana dan tujuan terapi kepada : <br>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['edukasi_awal'])) ? $row['edukasi_awal'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Pasien",
                                        "Keluarga Pasien",
                                        "Tidak dapat memberikan edukasi kepada pasien atau keluarga"
                                    ];
                                    $no = 0;
                                    ?>
                                    <?php foreach ($data_Val as $key => $value) : ?>
                                        <input class="form-check-input" id="edukasi_awal<?= $key ?>" name="edukasi_awal" value="<?= $value ?>" type="radio" <?= (in_array($value, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="edukasi_awal<?= $key ?>"><?= $value ?></label><br>
                                    <?php endforeach ?>
                                    <input type="text" name="edukasi_awal_detail" id="edukasi_awal_detail" value="<?= (!empty($row['edukasi_awal_detail'])) ? $row['edukasi_awal_detail'] : '' ?>" class="form-control">
                                </td>
                                <td>
                                    <b>CATATAN RINGKAS</b> (*hanya diisi apabila pasien membutuhkan operasi segera / emergency)
                                    <textarea name="catatan_ringkas" id="catatan_ringkas" cols="30" rows="2" class="form-control"><?= (!empty($row['catatan_ringkas'])) ? $row['catatan_ringkas'] : '' ?></textarea>
                                    <br>
                                    <b>Indikasi Operasi :</b>
                                    <textarea name="indikasi_operasi" id="indikasi_operasi" cols="30" rows="2" class="form-control"><?= (!empty($row['indikasi_operasi'])) ? $row['indikasi_operasi'] : '' ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['kondisi_saat_pindah'])) ? $row['kondisi_saat_pindah'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Baik",
                                        "Sedang",
                                        "Perdarahan",
                                        "Koma",
                                        "Meninggal",
                                    ];
                                    ?>
                                    <b>KONDISI PASIEN SAAT PINDAH / KELUAR DARI IGD &emsp;</b>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="kondisi_saat_pindah<?= $d ?>" name="kondisi_saat_pindah" value="<?= $d ?>" type="radio" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="kondisi_saat_pindah<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2"><b>Pukul :</b></div>
                                        <div class="col-md-3">
                                            <input type="time" name="pindah_pukul" id="pindah_pukul" value="<?= (!empty($row['pindah_pukul'])) ? $row['pindah_pukul'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-5"><b>Metode Pemindahan Pasien : </b></div>
                                        <div class="col-md-7">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['metode_pindah'])) ? $row['metode_pindah'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Kursi Roda",
                                                "Tempat Tidur",
                                            ];
                                            ?>
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="metode_pindah<?= $d ?>" name="metode_pindah" value="<?= $d ?>" type="radio" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="metode_pindah<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-12"><b>Peralatan yang menyertai saat pindah </b><br>
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['peralatan_pindah'])) ? $row['peralatan_pindah'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "O2 Portable",
                                                "NGT",
                                                "Infus",
                                                "Ventilator",
                                                "Kateter Urine",
                                                "Suction",
                                                "Dll",
                                            ];
                                            ?>
                                            <?php foreach ($data_Val as $key => $value) : ?>
                                                <input class="form-check-input" id="peralatan_pindah<?= $key ?>" name="peralatan_pindah[]" value="<?= $value ?>" type="checkbox" <?= (in_array($value, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="peralatan_pindah<?= $key ?>"><?= $value ?></label>
                                            <?php endforeach ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Kebutuhan O2 (L/mnt)</label>
                                                    <input type="text" name="kebutuhan_o2" id="kebutuhan_o2" value="<?= (!empty($row['kebutuhan_o2'])) ? $row['kebutuhan_o2'] : '' ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Peralatan Lainnya</label>
                                                    <input type="text" name="peralatan_pindah_lainnya" id="peralatan_pindah_lainnya" value="<?= (!empty($row['peralatan_pindah_lainnya'])) ? $row['peralatan_pindah_lainnya'] : '' ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <b>Pasien ditransfer ke : </b>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="pasien_transfer_ruangan"><b>Instalasi Rawat Inap diruangan</b></label>
                                            <input type="text" name="pasien_transfer_ruangan" id="pasien_transfer_ruangan" value="<?= (!empty($row['pasien_transfer_ruangan'])) ? $row['pasien_transfer_ruangan'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <b>Tindak lanjut di</b><br>
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['tindak_lanjut_di'])) ? $row['tindak_lanjut_di'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Kamar Operasi",
                                                "Kamar Bersalin",
                                                "Lain-lain",
                                            ];
                                            ?>
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="tindak_lanjut_di<?= $d ?>" name="tindak_lanjut_di[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="tindak_lanjut_di<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="rujuk_ke_rs"><b>Dirujuk ke Rumah Sakit</b></label>
                                            <input type="text" name="rujuk_ke_rs" id="rujuk_ke_rs" value="<?= (!empty($row['rujuk_ke_rs'])) ? $row['rujuk_ke_rs'] : '' ?>" class="form-control">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <?php
                                            $temp_Val = [];
                                            $data = (!empty($row['pasien_transfer'])) ? $row['pasien_transfer'] : '';
                                            if ($data)
                                                $temp_Val = explode("|", $data);

                                            $data_Val = [
                                                "Dipulangkan",
                                                "Meninggal Dunia",
                                                "DOA",
                                            ];
                                            ?>
                                            <?php foreach ($data_Val as $d) : ?>
                                                <input class="form-check-input" id="pasien_transfer<?= $d ?>" name="pasien_transfer[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                                <label for="pasien_transfer<?= $d ?>"><?= $d ?></label>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Transportasi saat keluar IGD</b><br>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['transportasi_keluar_igd'])) ? $row['transportasi_keluar_igd'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Kendaraan Pribadi",
                                        "Ambulance",
                                        "Kendaraan Jenazah",
                                    ];
                                    ?>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="transportasi_keluar_igd<?= $d ?>" name="transportasi_keluar_igd[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="transportasi_keluar_igd<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                </td>
                                <td rowspan="2">
                                    <b>DISCHARGE PLANNING</b><br>
                                    <label for="rencana_lama_rawat"><b>Rencana lama rawat</b></label>
                                    <input type="text" name="rencana_lama_rawat" id="rencana_lama_rawat" value="<?= (!empty($row['rencana_lama_rawat'])) ? $row['rencana_lama_rawat'] : '' ?>" class="form-control">
                                    <br>
                                    <label for="rencana_tgl_pulang"><b>Rencana Tanggal Pulang</b></label>
                                    <input type="date" name="rencana_tgl_pulang" id="rencana_tgl_pulang" value="<?= (!empty($row['rencana_tgl_pulang'])) ? $row['rencana_tgl_pulang'] : '' ?>" class="form-control">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>FOLLOW UP</b><br>
                                    <?php
                                    $temp_Val = [];
                                    $data = (!empty($row['follow_up'])) ? $row['follow_up'] : '';
                                    if ($data)
                                        $temp_Val = explode("|", $data);

                                    $data_Val = [
                                        "Ya",
                                        "Tidak",
                                    ];
                                    ?>
                                    <?php foreach ($data_Val as $d) : ?>
                                        <input class="form-check-input" id="follow_up<?= $d ?>" name="follow_up[]" value="<?= $d ?>" type="checkbox" <?= (in_array($d, $temp_Val)) ? 'checked' : '' ?>>
                                        <label for="follow_up<?= $d ?>"><?= $d ?></label>
                                    <?php endforeach ?>
                                    <br>
                                    <label for="follow_up_tgl"><b>Tanggal</b></label>
                                    <input type="date" name="follow_up_tgl" id="follow_up_tgl" value="<?= (!empty($row['follow_up_tgl'])) ? $row['follow_up_tgl'] : '' ?>" class="form-control">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
        <!-- /.box-body -->
        <div class=" box-footer">
            <button type="reset" class="btn btn-rounded btn-danger">Batal</button>
            <button id="simpan" class="btn btn-rounded btn-success pull-right">Simpan</button>
        </div>
    </div>
    <!-- /.box -->
</div>

</form>
<script>
    // declare
    let visit_no = $('#visit_no').val();
    let controller = '<?= $controller ?>';
    let field = '<?= $field ?>';
    let table = '<?= $table ?>';
    // let cek = '<?= (!empty($row['status'])) ? $row['status'] : '' ?>';
    let tidak_lengkap;
    $(document).ready(function() {
        // list terapi obat
        // $("#btnMandatory").attr('aria-pressed', handleTrueFalse(is_mandatory));


        $('#simpan').click(function(e) {
            e.preventDefault()
            // tidak_lengkap = cek_field_kosong($('#form-data').serializeArray())
            save(tidak_lengkap)
        })

        // edukasi
        $('#edukasi_awal0').click(function() {
            $('#edukasi_awal_detail').attr('readonly', true)
            $('#edukasi_awal_detail').val('')
        })
        $('#edukasi_awal1').click(function() {
            $('#edukasi_awal_detail').removeAttr('readonly', true)
        })
        $('#edukasi_awal2').click(function() {
            $('#edukasi_awal_detail').removeAttr('readonly', true)
        })

        // peralatan pindah
        $('#peralatan_pindah0').click(function() {
            $('#kebutuhan_o2').removeAttr('readonly', true)
        })
        $('#peralatan_pindah6').click(function() {
            $('#peralatan_pindah_lainnya').removeAttr('readonly', true)
        })
    })

    // main form
    function save(tidak_lengkap) {
        $.ajax({
            url: base_url + controller + '/detail/' + visit_no + '/' + table,
            dataType: 'json',
            success: function(res) {
                if (res == null)
                    url = base_url + controller + '/insert/' + table
                else
                    url = base_url + controller + '/update/' + visit_no + '/' + table

                let data = $('#form-data').serializeArray()

                // tambah data tidak_lengkap
                let data_merge = [{
                        'name': 'tidak_lengkap',
                        'value': tidak_lengkap
                    },
                    {
                        'name': 'dokter',
                        'value': '<?= $this->session->userdata('User_Code') ?>'
                    }
                ];
                data = data.concat(data_merge);
                cl(data);

                let promise = $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    dataType: 'JSON'
                }).then(function(res) {
                    if (res.status == 500)
                        throw Error(res.msg)
                })

                if (res == null) {
                    if (promise) {
                        $('#link_print').removeClass('disable', true)
                        a_ok("Berhasil", "Data Berhasil Ditambahkan")
                    } else {
                        a_error("Error", "Data Gagal Ditambahkan")
                    }
                } else {
                    if (promise) {
                        a_ok("Berhasil", "Data Berhasil Diubah")
                    } else {
                        a_error("Error", "Data Gagal Diubah")
                    }
                }
            }
        })
    }
</script>