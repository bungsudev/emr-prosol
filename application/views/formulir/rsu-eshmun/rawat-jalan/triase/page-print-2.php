<?php
$empty = '................';
?>
<table class="tblData">
    <tr>
        <td class="b-left b-top b-right" align="center" colspan="2" style="background-color: green;">
            <h3>ASESMEN MEDIS GAWAT DARURAT</h3>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top b-right" colspan="2">Pemeriksaan Dokter : Pukul <?= (!empty($dtl['diperiksa_pada'])) ? date('H:i T', strtotime($dtl['diperiksa_pada'])) : $empty ?></td>
    </tr>
    <tr>
        <td class="b-left b-top b-right" width="60%"><b>SUBJEKTIF</b></td>
        <td class="b-top b-right" align="center"><b>OBJEKTIF</b></td>
    </tr>
    <tr>
        <td class="b-left b-top" rowspan="5">
            <b>Keluhan dan gejala klinis pasien saat ini : </b>
        </td>
        <td class="b-left b-top b-right" style="background-color: grey;"><b>PRIMARY SURVEY</b></td>
    </tr>
    <tr>
        <td class="b-left b-top b-right"><b>AIRWAY dengan C-spine Control</b></td>
    </tr>
    <tr>
        <td class="b-left b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['obj_airway'])) ? $dtl['obj_airway'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Bebas",
                "Garling",
                "Stridor",
                "Wheezing",
                "Ronchi",
                "Terintubasi",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php }            ?>
            <br>
            <?= (!empty($dtl['obj_airway_lainnya'])) ? checkbox() . ' Lain-lain ' . $dtl['obj_airway_lainnya'] : box() . ' Lain-lain ' . $empty ?>
            <br><br><br>
            Tindakan Resusitasi (*bila ada) :
            <?= (!empty($dtl['obj_airway_tindakan'])) ? nl2br($dtl['obj_airway_tindakan']) : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top b-right"><b>BREATHING</b></td>
    </tr>
    <tr>
        <td class="b-left b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['obj_breathing'])) ? $dtl['obj_breathing'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Spontan",
                "Tachipneu",
                "Dispneu",
                "Apneu",
                "Ventilasi Mekanin",
                "Lain-lain",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
            <br>
            <?= (!empty($dtl['obj_breathing_lainnya'])) ? checkbox() . ' Lain-lain ' . $dtl['obj_breathing_lainnya'] : box() . ' Lain-lain ' . $empty ?>
            <br><br><br>
            Tindakan Resusitasi (*bila ada) :
            <?= (!empty($dtl['obj_breathing_tindakan'])) ? nl2br($dtl['obj_breathing_tindakan']) : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top" rowspan="2" height="70px"><b>Riwayat Penyakit Terdahulu / Riwayat Kehamilan / Riwayat Operasi / Riwayat Transfusi : </b></td>
        <td class="b-left b-top b-right"><b>CIRCULATION</b></td>
    </tr>
    <tr>
        <td class="b-left b-right b-top">
            <table style="width: 100%;">
                <tr>
                    <td><b>Nadi :</b>
                        <?php
                        $value = [];
                        $data = (!empty($dtl['obj_nadi'])) ? $dtl['obj_nadi'] : '';
                        if ($data)
                            $value = explode("|", $data);

                        $dataVal = [
                            "Kuat",
                            "Lemah",
                        ];
                        ?>
                        <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                            <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>
                        <?php } ?>
                    </td>
                    <td><b>CRT :</b>
                        <?php
                        $value = [];
                        $data = (!empty($dtl['obj_crt'])) ? $dtl['obj_crt'] : '';
                        if ($data)
                            $value = explode("|", $data);

                        $dataVal = [
                            "< 2",
                            "> 2",
                        ];
                        ?>
                        <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                            <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top" height="50px"><b>Riwayat Penggunaan Obat dan Diet Terakhir : </b></td>
        <td class=" b-left b-right">
            <table style="width: 100%;">
                <tr>
                    <td width="24%">Warna Kulit</td>
                    <td width="3%">:</td>
                    <td>
                        <?php
                        $value = [];
                        $data = (!empty($dtl['obj_warna_kulit'])) ? $dtl['obj_warna_kulit'] : '';
                        if ($data)
                            $value = explode("|", $data);

                        $dataVal = [
                            "Normal",
                            "Pucat",
                            "Kuning",
                        ];
                        ?>
                        <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                            <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>Perdarahan</td>
                    <td>:</td>
                    <td>
                        <?php
                        $value = [];
                        $data = (!empty($dtl['obj_perdarahan'])) ? $dtl['obj_perdarahan'] : '';
                        if ($data)
                            $value = explode("|", $data);

                        $dataVal = [
                            "Tdk Ada",
                            "Terkontrol",
                            "Tdk Terkontrol",
                        ];
                        ?>
                        <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                            <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>Turgor kulit</td>
                    <td>:</td>
                    <td>
                        <?php
                        $value = [];
                        $data = (!empty($dtl['obj_turgor'])) ? $dtl['obj_turgor'] : '';
                        if ($data)
                            $value = explode("|", $data);

                        $dataVal = [
                            "Baik",
                            "Buruk",
                            "Lain-lain",
                        ];
                        ?>
                        <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                            <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>
                        <?php } ?>
                    </td>
                </tr>
            </table>
            <br>
            Tindakan Resusitasi (*bila ada) :
            <?= (!empty($dtl['obj_circulation'])) ? nl2br($dtl['obj_circulation']) : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top" style="background-color: grey;"><b>Pengkajian Psiko-sosio-spiritual-kultural</b></td>
        <td class="b-left b-top b-right">DISABILITY</td>
    </tr>
    <tr>
        <td class="b-left b-top">
            <b>Hubungan pasien dengan keluarga : </b>
            <?php
            $value = [];
            $data = (!empty($dtl['hubungan_pasien'])) ? $dtl['hubungan_pasien'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Baik",
                "Tidak Baik",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
            <br>

            <b>Status psikologis : </b>
            <?php
            $value = [];
            $data = (!empty($dtl['status_psikologi'])) ? $dtl['status_psikologi'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Tenang",
                "Cemas",
                "Takut",
                "Marah",
                "Sedih",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
            <br>

            Kecenderungan bunuh diri (bila ada) dilaporkan ke
            <?= (!empty($dtl['kecenderungan_bundir'])) ? nl2br($dtl['kecenderungan_bundir']) : $empty ?>
        </td>
        <td class="b-left b-top b-right">
            <b>Respon : </b>
            <?php
            $value = [];
            $data = (!empty($dtl['respon'])) ? $dtl['respon'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Alert",
                "Pain",
                "Verbal",
                "Unrespon",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>

            <br><b>Pupil : </b>
            <?= (!empty($dtl['obj_pupil'])) ? nl2br($dtl['obj_pupil']) : $empty ?> mm
            &emsp;
            <?php
            $value = [];
            $data = (!empty($dtl['obj_pupil_lainnya'])) ? $dtl['obj_pupil_lainnya'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Isokor",
                "Anisokor",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
            <br>
            <?php
            $value = [];
            $data = (!empty($dtl['obj_disability'])) ? $dtl['obj_disability'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Pin Poin",
                "Midriasis",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
            <?= (!empty($dtl['obj_reflek_cahaya'])) ? checkbox() . ' Reflek Cahaya : ' . $dtl['obj_reflek_cahaya'] : box() . ' Reflek Cahaya : ' . $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top">
            Pekerjaan, Sebutkan <?= (!empty($dtl['pekerjaan'])) ? nl2br($dtl['pekerjaan']) : $empty ?>
            <br> <b>Kultural : </b>, Suku bangsa, Sebutkan <?= (!empty($dtl['suku_bangsa'])) ? nl2br($dtl['suku_bangsa']) : $empty ?>
            <br> <b>Spiritual : </b> Agama, Sebutkan <?= (!empty($dtl['agama'])) ? nl2br($dtl['agama']) : $empty ?>
        </td>
        <td class="b-left b-top b-right">
            <table style="width:100%; border-collapse: collapse;" border="1">
                <tr>
                    <td width="40%" style="vertical-align: middle;" align="center">EXPOSURE</td>
                    <td>
                        Luka di : <?= (!empty($dtl['luka_di'])) ? nl2br($dtl['luka_di']) : $empty ?>
                        <br>Lain-lain : <?= (!empty($dtl['luka_lainnya'])) ? nl2br($dtl['luka_lainnya']) : $empty ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <td class="b-left b-top b-right" width="60%" rowspan="13">
            <b>STATUS LOKALISATA </b>
            (*berikan petunjuk dan tanda serta jelaskan sifat, jenis, ukuran, lokasi, dan tindakan yang dilakukan)
            <br>
            <?php
            if ($dtl['images'])
                echo '<img src="' . $dtl['images'] . '" width="59%">';
            else
                echo '<img src="' . base_url() . 'assets/images/anatomi/triase.png" width="59%">';
            ?>
            <br>
            <table class="tblData">
                <tr>
                    <td width="25%" align="center">DEPAN</td>
                    <td width="30%">KANAN</td>
                    <td width="25%">KIRI</td>
                    <td>BELAKANG</td>
                </tr>
                <tr>
                    <td><b>Kode Gambar</b></td>
                    <td>A: Abrasi</td>
                    <td>U: Ulkus</td>
                    <td>N: Nyeri</td>
                </tr>
                <tr>
                    <td></td>
                    <td>C: Cumbutio</td>
                    <td>D: Deformitas</td>
                    <td>L: Lain-lain</td>
                </tr>
                <tr>
                    <td></td>
                    <td>VA: Vulnus Appertum</td>
                    <td colspan="2">H: Hematoma</td>
                </tr>
            </table>
        </td>
        <td class="b-top b-right" colspan="3" align="center" style="background-color: grey;"><b>SECONDARY SURVEY</b></td>
    </tr>
    <tr>
        <td class="b-top b-right" colspan="3" align="center"><b>PEMERIKSAAN FISIK</b></td>
    </tr>
    <tr>
        <td class="b-top b-right" width="10%" align="center"><b>Anggota Tubuh</b></td>
        <td class="b-top b-right" width="10%" align="center"><b>Normal</b></td>
        <td class="b-top b-right" align="center"><b>Abnormal <br>Jelaskan</b></td>
    </tr>
    <?php
    $title = [
        'kepala', 'mata', 'leher', 'tht', 'mulut', 'thorax', 'abdomen', 'genitalia', 'extremitas'
    ];
    // for($i=1; $i< sizeof($title); $i++):
    foreach ($title as $tubuh) {
    ?>
        <tr>
            <td class="b-top b-right"><b><?= ucwords($tubuh) ?></b></td>
            <td class="b-top b-right"><?= (!empty($dtl['fisiknr_' . $tubuh])) ? $dtl['fisiknr_' . $tubuh] : '' ?></td>
            <td class="b-top b-right"><?= (!empty($dtl['fisikab_' . $tubuh])) ? $dtl['fisikab_' . $tubuh] : '' ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="b-left b-top b-right" colspan="3" height="50px">
            (* Beri tanda v)
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <td width="60%" class="b-left b-top b-right"><b>PEMERIKSAAN PENUNJANG DI IGD</b></td>
        <td class="b-left b-top b-right"><b>PEMERIKSAAN PENUNJANG DARI RS LAIN</b></td>
    </tr>
    <tr>
        <td class="b-left b-top">
            <table class="tblData">
                <?php
                $title = [
                    'EKG' => 'ekg',
                    'Radiologi' => 'rad',
                    'Laboratorium' => 'lab',
                    'Lain-lain' => 'lainnya'
                ];
                // for($i=1; $i< sizeof($title); $i++):
                foreach ($title as $key => $name) {
                ?>
                    <tr>
                        <td width="25%">
                            <?= (!empty($dtl['peme_' . $name])) ? checkbox() . '<b> ' . $key . ' </b>' : box() . '<b> ' . $key . ' </b>' ?>
                        </td>
                        <td width="3%"><b>:</b></td>
                        <td><?= (!empty($dtl['peme_' . $name])) ? $dtl['peme_' . $name] : '' ?></td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td class="b-left b-right b-top">
            <table class="tblData">
                <?php
                $title = [
                    'EKG' => 'ekg_ext',
                    'Radiologi' => 'rad_ext',
                    'Laboratorium' => 'lab_ext',
                    'Lain-lain' => 'lainnya_ext'
                ];
                // for($i=1; $i< sizeof($title); $i++):
                foreach ($title as $key => $name) {
                ?>
                    <tr>
                        <td width="35%">
                            <?= (!empty($dtl['peme_' . $name])) ? checkbox() . '<b> ' . $key . ' </b>' : box() . '<b> ' . $key . ' </b>' ?>
                        </td>
                        <td width="3%"><b>:</b></td>
                        <td><?= (!empty($dtl['peme_' . $name])) ? $dtl['peme_' . $name] : '' ?></td>
                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-top b-right"><b>ASESMEN</b></td>
    </tr>
    <tr>
        <td class="b-left b-top">
            <?= (!empty($dtl['diagnosa_utama'])) ? checkbox() . '<b> Diagnosa Utama : </b>' . $dtl['diagnosa_utama'] : box() . '<b> Diagnosa Utama : </b>' ?>
        </td>
        <td class="b-top b-right">
            <?= (!empty($dtl['diagnosa_banding'])) ? checkbox() . '<b> Diagnosa Banding : </b>' . $dtl['diagnosa_banding'] : box() . '<b> Diagnosa Banding : </b>' ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-right">
            <?= (!empty($dtl['diagnosa_tambahan'])) ? checkbox() . '<b> Diagnosa Tambahan :  </b>' . $dtl['diagnosa_tambahan'] : box() . '<b> Diagnosa Tambahan : </b>' ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-top b-bot b-right">
            <?= (!empty($dtl['prognosa'])) ? '<b> PROGNOSA :  </b>' . $dtl['prognosa'] : '<b> PROGNOSA : </b>' ?>
        </td>
    </tr>
</table>