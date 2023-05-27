<?php
$this->load->view('components/print-header');

$empty = '................';
$checked = "<span style='font-family:helvetica; font-size:14px;'>&#10004;</span>";
$checkbox = '<input type="checkbox"/>';
?>
<style>
    .tblData td {
        padding: 3px;
        vertical-align: top;
    }
</style>
<table class="tblData">
    <tr>
        <td class="b-all b-right" align="center">
            <h2><?= $cabang->nama_formulir ?></h2>
            (dilengkapi dokter sebelum pasien keluar dari Instalasi Gawat Darurat)
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <td class="b-left">
            <b>Tanggal :</b> <?= date_dfy(strtotime($dtl['tanggal_masuk'])) ?? $empty ?>
        </td>
        <td>
            <b>Pukul :</b> <?= date('H:i T', strtotime($dtl['tgl_kontrol_ulang'])) ?? $empty ?>
        </td>
        <td class="b-right">
            <b>Bed IGD No :</b> <?= $dtl['ruang_rawat_akhir'] ?? $empty ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="b-left b-top b-right">
            <b>Dibawa Ke RS Oleh :</b>&emsp;
            <?php
            $value = [];
            $data = (!empty($dtl['dibawa_ke_rs'])) ? $dtl['dibawa_ke_rs'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Keluarga",
                "Datang Sendiri",
                "Polisi",
                "Lain-lain",
            ];
            ?>

            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;&emsp;
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td align="center" colspan="3" style="background-color: orange;" class="b-left b-top b-right">
            <b> TRIASE (KATEGORI ATS SYSTEM)</b>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="b-left b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['cara_anamnesa'])) ? $dtl['cara_anamnesa'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Auto Anamnesa",
                "Allo Anamnesa"
            ];
            ?>
            <b>Cara Anamnesa :</b> &emsp;
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;&emsp;
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="b-left b-top b-right">
            <b>Keluhan Utama :</b> &emsp;
            <?= $dtl['keluhan_utama'] ?? $empty ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-top">
            <b>GCS : </b> <?= $dtl['e'] ?? $empty ?>
            &emsp;<b>E : </b> <?= $dtl['e'] ?? $empty ?>
            &emsp;<b>V : </b><?= $dtl['v'] ?? $empty ?>
            &emsp;<b>M : </b> <?= $dtl['m'] ?? $empty ?>
            &emsp;&emsp;
            <b> Pupil : </b><?= $dtl['pupil'] ?? $empty ?> mm
            &emsp;&emsp;
            <b>Reflex Cahaya : </b> <?= $dtl['reflex_cahaya'] ?? $empty ?>
            &emsp;&emsp;
            <b> SpO2 : </b><?= $dtl['spo2'] ?? $empty ?> %
        </td>
        <td class="b-right b-top  b-left">
            <b>Skor EWS : </b><?= $dtl['skor_ews'] ?? $empty ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" class="b-left b-top b-right">
            <b> Tanda Vital :&emsp;
                TD : </b><?= $dtl['td'] ?? $empty ?> mmHg
            &emsp;&emsp; <b> RR </b><?= $dtl['rr'] ?? $empty ?> x/menit
            &emsp;&emsp; <b>Nadi </b><?= $dtl['nadi'] ?? $empty ?> X/menit
            &emsp;&emsp; <b>Suhu </b><?= $dtl['suhu'] ?? $empty ?> ◦C
        </td>
    </tr>
</table>

<?php
$bg_red = 'style="background-color: #f06262;"';
$bg_orange = 'style="background-color: #ffa500;"';
$bg_yellow = 'style="background-color: #f7e752;"';
$bg_green = 'style="background-color: #00a300;"';
$bg_lgreen = 'style="background-color: #32cd32;"';
?>
<table class="tblData">
    <tr>
        <th align="center" class="b-left b-top" width="16%">SKALA TRIASE</th>
        <th align="center" <?= $bg_red ?> class="b-left b-top" width="16%">1</th>
        <th align="center" <?= $bg_orange ?> class="b-left b-top" width="16%">2</th>
        <th align="center" <?= $bg_yellow ?> class="b-left b-top" width="16%">3</th>
        <th align="center" <?= $bg_green ?> class="b-left b-top" width="16%">4</th>
        <th align="center" <?= $bg_lgreen ?> class="b-left b-right b-top" width="16%">5</th>
    </tr>
    <tr>
        <th align="center" class="b-left">Keterangan</th>
        <th align="center" <?= $bg_red ?> class="b-left">Resusitasi</th>
        <th align="center" <?= $bg_orange ?> class="b-left">Gawat Darurat</th>
        <th align="center" <?= $bg_yellow ?> class="b-left">Darurat</th>
        <th align="center" <?= $bg_green ?> class="b-left">Semi Darurat</th>
        <th align="center" <?= $bg_lgreen ?> class="b-left b-right">Tidak Darurat</th>
    </tr>
    <tr>
        <th align="center" class="b-left">Response Time</th>
        <th align="center" <?= $bg_red ?> class="b-left">Segera</th>
        <th align="center" <?= $bg_orange ?> class="b-left">10 menit</th>
        <th align="center" <?= $bg_yellow ?> class="b-left">30 menit</th>
        <th align="center" <?= $bg_green ?> class="b-left">60 menit</th>
        <th align="center" <?= $bg_lgreen ?> class="b-left b-right">120 menit</th>
    </tr>
    <tr>
        <td class="b-left b-top">
            <b>AIRWAY</b><br>
            (Jalan Nafas)
        </td>
        <?php
        $temp_Val = [];
        $data = (!empty($dtl['airway'])) ? $dtl['airway'] : '';
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
                $bg = 'class="b-top b-left" style="background-color: #f06262;"';
            elseif ($ke == '2')
                $bg = 'class="b-top b-left" style="background-color: #ffa500;"';
            elseif ($ke == '3')
                $bg = 'class="b-top b-left" style="background-color: #f7e752;"';
            elseif ($ke == '4')
                $bg = 'class="b-top b-left" style="background-color: #00a300;"';
            elseif ($ke == '5')
                $bg = 'class="b-top b-left b-right" style="background-color: #32cd32;"';
        ?>
            <td <?= $bg ?>>
                <?= (in_array($data_Val[$i], $temp_Val)) ? checkbox() : box(); ?> <?= $dataTitle[$i] ?>&emsp;&emsp;
            </td>
        <?php
        } ?>
    </tr>
    <tr>
        <td class="b-left b-top">
            <b>BREATHING </b><br> (Pernafasan)
        </td>
        <td <?= $bg_red ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['br_resusitasi'])) ? $dtl['br_resusitasi'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Henti Nafas",
                "< 10 x/mnt",
                "Sianosis",
                "Distress pernafasan berat",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_orange ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['br_gawat_darurat'])) ? $dtl['br_gawat_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "> 32 x/mnt",
                "Mengi",
                "Distress pernafasan sedang",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_yellow ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['br_darurat'])) ? $dtl['br_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "> 24-32 x/mnt",
                "Mengi",
                "Distress pernafasan ringan",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_green ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['br_semi_darurat'])) ? $dtl['br_semi_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "> 20-24 x/mnt",
                "Tidak ada gangguan",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_lgreen ?> class="b-left b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['br_tidak_darurat'])) ? $dtl['br_tidak_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "> 16-20 x/mnt",
                "Tidak ada gangguan",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top">
            <b>CIRCULATION </b><br> (Sirkulasi)
        </td>
        <td <?= $bg_red ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['cr_resusitasi'])) ? $dtl['cr_resusitasi'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Henti Jantung",
                "Nadi tidak teraba",
                "Pucat",
                "Akral dingin",
                "Perdarahan tidak terkontrol",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_orange ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['cr_gawat_darurat'])) ? $dtl['cr_gawat_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Nadi teraba lemah",
                "Nado < 50 x/mnt atau > 150 x/mnt",
                "Dehidrasi berat",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_yellow ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['cr_darurat'])) ? $dtl['cr_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Nadi 120-150 x/mnt",
                "Sistol >160 mmHg",
                "Diastol > 100 mmHg",
                "Dehidrasi sedang",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_green ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['cr_semi_darurat'])) ? $dtl['cr_semi_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Nadi 100-120 x/mnt",
                "Sistol >120-180 mmHg",
                "Diastol > 80-100",
                "Dehidrasi ringan",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_lgreen ?> class="b-left b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['cr_tidak_darurat'])) ? $dtl['cr_tidak_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Nadi 80-110 x/mnt",
                "Sistol 120 mmHg",
                "Diastol 80 mmHg",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-top">
            <b>DISABILITY </b><br> (Kesadaran)
        </td>
        <td <?= $bg_red ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['ds_resusitasi'])) ? $dtl['ds_resusitasi'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "GCS < 9",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_orange ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['ds_gawat_darurat'])) ? $dtl['ds_gawat_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "GCS 9-12",
                "Penurunan aktivitas berat",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_yellow ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['ds_darurat'])) ? $dtl['ds_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "Henti Nafas",
                "< 10 x/mnt",
                "Sianosis",
                "Distress pernafasan berat",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_green ?> class="b-left b-top">
            <?php
            $value = [];
            $data = (!empty($dtl['ds_semi_darurat'])) ? $dtl['ds_semi_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "GCS 15",
                "Penurunan aktivitas ringan",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
        <td <?= $bg_lgreen ?> class="b-left b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['ds_tidak_darurat'])) ? $dtl['ds_tidak_darurat'] : '';
            if ($data)
                $value = explode("|", $data);

            $data_Val = [
                "GCS 15",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($data_Val); $i++) { ?>
                <?= (in_array($data_Val[$i], $value)) ? checkbox() : box(); ?> <?= $data_Val[$i] ?><br>
            <?php } ?>
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <td colspan="2" class="b-left b-top b-right">
            <b>SKALA NYERI : </b>&emsp;
            <?= $dtl['skala_nyeri'] ?? $empty ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center" class="b-left b-right">
            <b>INTENSITAS NYERI "WONG BAKER FACES PAIN RATING SCALE"
                DAN "NUMERIC RATING SCALE" (NRS) UNTUK ANAK ≥ 6 TAHUN
                DAN DEWASA
            </b>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-right">
            cc
        </td>
    </tr>
    <tr>
        <td style="font-size: 11px;" width="33%" class="b-left b-top b-bot">
            <b>Skala FLACC untuk Anak < 6 Tahun </b>
        </td>
        <td style="font-size: 11px;" class=" b-top b-left b-right b-bot">
            <b>Skala :
                0 = Nyaman,
                1-3 = Kurang Nyaman,
                4-6 = Nyeri Sedang,
                7-10 = Nyeri Berat </b>
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <th width="15%" class="b-all b-right" align="center">Pengkajian</th>
        <th width="28%" class="b-all b-right" align="center">0</th>
        <th width="28%" class="b-all b-right" align="center">1</th>
        <th width="28%" class="b-all b-right" align="center">2</th>
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
            <th align="center" class="b-all b-right"><?= $val ?></th>
            <td align="center" class="b-all b-right">
                <label for="<?= $v[0] ?>"><?= $v[0] ?></label>
            </td>
            <td align="center" class="b-all b-right">
                <label for="<?= $v[1] ?>"><?= $v[1] ?></label>
            </td>
            <td align="center" class="b-all b-right">
                <label for="<?= $v[2] ?>"><?= $v[2] ?></label>
            </td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="4" class="b-all b-right">
            <b>Total Skor :</b>
            &emsp; 1
        </td>
    </tr>
    <tr>
        <td colspan="4" class="b-all b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['status_alergi'])) ? $dtl['status_alergi'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Tidak",
                "Ya",
            ];
            ?>
            <b>Status Alergi : </b>&emsp;
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;&emsp;
            <?php } ?>
            , <?= $dtl['status_alergi_detail'] ?? $empty ?>
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <td class="b-left" width="45%">
            <?php
            $value = [];
            $data = (!empty($dtl['gangguan_prilaku'])) ? $dtl['gangguan_prilaku'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Tidak Ternganggu",
                "Ada Gangguan",
            ];
            ?>
            <b>Status Alergi : </b>&emsp;
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>
            <?php } ?>
        </td>
        <td width="33%">
            <?php
            $value = [];
            $data = (!empty($dtl['gangguan_prilaku_detail'])) ? $dtl['gangguan_prilaku_detail'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Tidak Membahayakan",
                "Membahayakan diri sendiri/orang lain",
            ];
            ?>
            <?= (in_array($dataVal[0], $value)) ? checkbox() : box(); ?> <?= $dataVal[0] ?>&emsp;
        </td>
        <td class="b-right" align="right">
            <i style="font-size: 10px;">*Bila ada, lakukan Asesmen</i>
        </td>
    </tr>
    <tr>
        <td class="b-left"> </td>
        <td>
            <?= (in_array($dataVal[1], $value)) ? checkbox() : box(); ?> <?= $dataVal[1] ?>&emsp;
        </td>
        <td class="b-right" align="right">
            <i style="font-size: 10px;">dan Tindakan Restrain</i>
        </td>
    </tr>
</table>
<table class="tblData">
    <tr>
        <td width="30%" class="b-bot b-left b-top"><b>Risiko Penularan Infeksi : </b></td>
        <td class="b-bot b-top b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['risiko_penularan'])) ? $dtl['risiko_penularan'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Batuk lebih dari 2 minggu dengan demam dan sesak",
                "Rujukan dengan Suspek / Probable / Konfirmasi airbone disease",
                "Tidak berisiko penularan airbone disease"
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?><br>
            <?php } ?>
        </td>
    </tr>
</table>