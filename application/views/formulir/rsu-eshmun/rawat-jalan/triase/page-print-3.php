<?php
$empty = '................';
?>
<table class="tblData">
    <tr>
        <td colspan="2" class="b-left b-bot b-top b-right" height="100px">
            <b>PLANNING :</b> Penatalaksanaan / Pengobatan / Rencana Tindakan / Konsultasi <br>
            <?= (!empty($dtl['planning'])) ? $dtl['planning'] : '' ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-top b-right" height="100px">
            <b>INSTRUKSI TINDAK LANJUT : </b> (Tatalaksana Pasien / Pengobatan / Tindakan / Konsul) <br>
            <?= (!empty($dtl['instruksi_tindak_lanjut'])) ? $dtl['instruksi_tindak_lanjut'] : '' ?>
        </td>
    </tr>
    <tr>
        <td width="50%" class="b-left b-top b-bot"><b>EDUKASI PASIEN</b></td>
        <td class="b-left b-right b-top" height="30px"><b>CATATAN RINGKAS</b> (*hanya diisi apabila pasien membutuhkan operasi segera / emergency)</td>
    </tr>
    <tr>
        <td class="b-left">
            <b>Edukasi awal, disampaikan diagnosis, rencana dan tujuan terapi kepada : </b><br>
            <?php
            $value = [];
            $data = (!empty($dtl['edukasi_awal'])) ? $dtl['edukasi_awal'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Pasien",
                "Keluarga Pasien",
                "Tidak dapat memberikan edukasi kepada pasien atau keluarga"
            ];
            ?>
            <?= (in_array($dataVal[0], $value)) ? checkbox() : box(); ?> <?= $dataVal[0] ?><br>
            <?= (in_array($dataVal[1], $value)) ? checkbox() : box(); ?> <?= $dataVal[1] ?>,
            Nama : <?= (!empty($dtl['edukasi_awal_detail'])) ? $dtl['edukasi_awal_detail'] : '' ?><br>
            <?= (in_array($dataVal[2], $value)) ? checkbox() : box(); ?> <?= $dataVal[2] ?><br>
            Karena : <?= (!empty($dtl['edukasi_awal_detail'])) ? $dtl['edukasi_awal_detail'] : '' ?>
        </td>
        <td class="b-left b-right">
            <b>Indikasi Operasi : </b><br>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="b-left b-bot b-top b-right">
            <b>KONDISI PASIEN SAAT PINDAH / KELUAR DARI IGD </b>
            <?php
            $value = [];
            $data = (!empty($dtl['kondisi_saat_pindah'])) ? $dtl['kondisi_saat_pindah'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Baik",
                "Sedang",
                "Perdarahan",
                "Koma",
                "Meninggal",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td class="b-left">
            Pukul : <?= (!empty($dtl['pindah_pukul'])) ? date('H:i T', strtotime($dtl['pindah_pukul'])) : $empty . ' WIB' ?><br>
            <?php
            $value = [];
            $data = (!empty($dtl['metode_pindah'])) ? $dtl['metode_pindah'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Kursi Roda",
                "Tempat Tidur",
            ];
            ?>
            Metode Pemindahan Pasien :
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
            <br> Peralatan yang menyertai saat pindah : <br>
            <?php
            $value = [];
            $data = (!empty($dtl['peralatan_pindah'])) ? $dtl['peralatan_pindah'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "O2 Portable",
                "NGT",
                "Infus",
                "Ventilator",
                "Kateter Urine",
                "Suction",
                "Dll",
            ];
            ?>

            <table style="width: 100%;">
                <tr>
                    <td colspan="2">
                        <?= (in_array($dataVal[0], $value)) ? checkbox() : box(); ?> <?= $dataVal[0] ?>,
                        Kebutuhan : <?= (!empty($dtl['kebutuhan_o2'])) ? $dtl['kebutuhan_o2'] : $empty ?> L/mnt
                    </td>
                </tr>
                <tr>
                    <td> <?= (in_array($dataVal[1], $value)) ? checkbox() : box(); ?> <?= $dataVal[1] ?></td>
                    <td> <?= (in_array($dataVal[2], $value)) ? checkbox() : box(); ?> <?= $dataVal[2] ?></td>
                </tr>
                <tr>
                    <td> <?= (in_array($dataVal[3], $value)) ? checkbox() : box(); ?> <?= $dataVal[3] ?></td>
                    <td> <?= (in_array($dataVal[4], $value)) ? checkbox() : box(); ?> <?= $dataVal[4] ?></td>
                </tr>
                <tr>
                    <td> <?= (in_array($dataVal[5], $value)) ? checkbox() : box(); ?> <?= $dataVal[5] ?></td>
                    <td>
                        <?= (in_array($dataVal[6], $value)) ? checkbox() : box(); ?> <?= $dataVal[6] ?>
                        <?= (!empty($dtl['peralatan_pindah_lainnya'])) ? $dtl['peralatan_pindah_lainnya'] : $empty ?>
                    </td>
                </tr>
            </table>
        </td>

        <td class="b-left b-right v-top">
            <?= (!empty($dtl['pasien_transfer_ruangan'])) ? checkbox() . '  <b>Pasien ditransfer ke : </b>' . $dtl['pasien_transfer_ruangan'] : box() . '  <b>Pasien ditransfer ke : </b>' ?>
            <br> Tindak lanjut di :<br>
            <?php
            $value = [];
            $data = (!empty($dtl['tindak_lanjut_di'])) ? $dtl['tindak_lanjut_di'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Kamar Operasi",
                "Kamar Bersalin",
                "Lain-lain",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                &emsp;&emsp; <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?><br>
            <?php } ?>
            <?= (!empty($dtl['rujuk_ke_rs'])) ? checkbox() . ' Dirujuk ke Rumah Sakit : ' . $dtl['rujuk_ke_rs'] : box() . ' Dirujuk ke Rumah Sakit :' ?>
            <br>
            <?php
            $value = [];
            $data = (!empty($dtl['pasien_transfer'])) ? $dtl['pasien_transfer'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Dipulangkan",
                "Meninggal Dunia",
                "DOA",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right b-top"><b>Transportasi saat keluar IGD</b></td>
        <td class="b-right b-right b-top"><b>DISCHARGE PLANNING</b></td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['transportasi_keluar_igd'])) ? $dtl['transportasi_keluar_igd'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Kendaraan Pribadi",
                "Ambulance",
                "Kendaraan Jenazah",
            ];
            ?>
            <?php for ($i = 0; $i < sizeof($dataVal); $i++) { ?>
                <?= (in_array($dataVal[$i], $value)) ? checkbox() : box(); ?> <?= $dataVal[$i] ?>&emsp;
            <?php } ?>
        </td>
        <td class="b-right b-right b-top">
            Rencana lama rawat :
            <?= (!empty($dtl['rencana_lama_rawat'])) ? $dtl['rencana_lama_rawat'] : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <b>FOLLOW UP</b>
        </td>
        <td class="b-right b-right">
            Rencana tinggal pulang :
            <?= (!empty($dtl['rencana_tgl_pulang'])) ? $dtl['rencana_tgl_pulang'] : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <?php
            $value = [];
            $data = (!empty($dtl['follow_up'])) ? $dtl['follow_up'] : '';
            if ($data)
                $value = explode("|", $data);

            $dataVal = [
                "Ya",
                "Tidak",
            ];
            ?>
            <?= (in_array($dataVal[0], $value)) ? checkbox() : box(); ?> <?= $dataVal[0] ?>,
            <?= (!empty($dtl['follow_up_tgl'])) ? date_dfy(strtotime($dtl['follow_up_tgl'])) : $empty ?>

            <?= (in_array($dataVal[1], $value)) ? checkbox() : box(); ?> <?= $dataVal[1] ?>&emsp;
        </td>
        <td class="b-right b-right"></td>
    </tr>
    <tr>
        <td style="padding-bottom: 10px;" class="b-left b-right b-top b-bot" colspan="2" align="center">
            <br><br>
            Medan, Tanggal <?= (!empty($dtl['created_time'])) ? date_dfy(strtotime($dtl['created_time'])) : $empty ?>
            Pukul <?= (!empty($dtl['created_time'])) ? date('H:i T', strtotime($dtl['created_time'])) : $empty ?>
            <br>Dokter yang melakukan pengkajian,
            <br>
            <img src="<?= $dtl['ttd'] ?>" width="100px"><br>
            <?= (!empty($dtl['nama_ttd'])) ? $dtl['nama_ttd'] : '...................................' ?>
        </td>
    </tr>
</table>