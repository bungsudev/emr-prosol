<?php
$this->load->view('components/print-header');

$empty = '................';
$checked = "<span style='font-family:helvetica; font-size:14px;'>&#10004;</span>";
$checkbox = '<input type="checkbox"/>';
?>
<style rel="stylesheet" type="text/css">
.tblDataCustom {
    width: 100%;
    border-collapse: collapse;
}

.tblDataCustom td {
    padding: 1px;
    height: 25px;
    vertical-align: middle;
    font-size: 12px;
}
.tblDataCustom2 {
    width: 100%;
    border-collapse: collapse;
}

.tblDataCustom2 td {
    padding: 1px;
    height: 60px;
    vertical-align: middle;
    font-size: 12px;
}
</style>

<table class="tblData">
    <tr>
        <td class="b-all b-right" align="center"><h2><?= $cabang->nama_formulir ?></h2></td>
    </tr>
</table>

<table class="tblDataSm">
    <tr>
        <td width="50%" style="padding:10px;">
            <!-- alergi -->
            <table class="tblDataCustom">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Alergi (Obat, Makanan, dll) <br> &nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($alergi); $i++): ?>
                    <tr>
                        <td align="center" width="75" class="b-all b-right"><?= date_dfy(strtotime($alergi[$i]['tanggal'])) ?></td>
                        <td class="b-all b-right"><?= $alergi[$i]['text'] ?></td>
                    </tr>
                    <?php endfor;?>

                    <!-- dump rows -->
                    <?php for ($i=count($alergi); $i < 5; $i++): ?>
                    <tr>
                        <td width="75" class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                    </tr>
                    <?php endfor;?>
                </tbody>
            </table>
        </td>
        <td width="50%" rowspan="2" style="padding:10px;">
            <!-- riwayat -->
            <table class="tblDataCustom">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>D/Rawat Inap <br> Riwayat Operasi/Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($riwayat); $i++): ?>
                    <tr>
                        <td align="center" width="75" class="b-all b-right"><?= date_dfy(strtotime($riwayat[$i]['tanggal'])) ?></td>
                        <td class="b-all b-right"><?= $riwayat[$i]['text'] ?></td>
                    </tr>
                    <?php endfor;?>

                    <!-- dump rows -->
                    <?php for ($i=count($riwayat); $i < 12; $i++): ?>
                    <tr>
                        <td width="75" class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                    </tr>
                    <?php endfor;?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td width="50%" style="padding:10px;">
            <!-- imunisasi -->
            <table class="tblDataCustom">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Imunisasi <br> &nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($imunisasi); $i++): ?>
                    <tr>
                        <td align="center" width="75" class="b-all b-right"><?= date_dfy(strtotime($imunisasi[$i]['tanggal'])) ?></td>
                        <td class="b-all b-right"><?= $imunisasi[$i]['text'] ?></td>
                    </tr>
                    <?php endfor;?>

                    <!-- dump rows -->
                    <?php for ($i=count($imunisasi); $i < 5; $i++): ?>
                    <tr>
                        <td width="75" class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                    </tr>
                    <?php endfor;?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan='2' style="padding:10px;">
            <!-- riwayat -->
            <table class="tblDataCustom2">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Klinik Nama Dr</th>
                        <th>Diagnosis</th>
                        <th>Terapi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($riwayat); $i++): ?>
                    <tr>
                        <td align="center" width="75" class="b-all b-right"><?= date_dfy(strtotime($riwayat[$i]['tanggal'])) ?></td>
                        <td class="b-all b-right"><?= $riwayat[$i]['text'] ?></td>
                        <td class="b-all b-right"><?= $riwayat[$i]['text2'] ?></td>
                        <td class="b-all b-right"><?= $riwayat[$i]['text3'] ?></td>
                        <td class="b-all b-right"><?= $riwayat[$i]['text4'] ?></td>
                    </tr>
                    <?php endfor;?>

                    <!-- dump rows -->
                    <?php for ($i=count($riwayat); $i < 12; $i++): ?>
                    <tr>
                        <td width="75" class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                        <td class="b-all b-right">&nbsp;</td>
                    </tr>
                    <?php endfor;?>
                </tbody>
            </table>
        </td>
    </tr>
</table>