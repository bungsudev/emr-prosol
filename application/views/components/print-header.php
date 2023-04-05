<?php
$lahir = new DateTime($detail['Patient_DOB']);
$today = new DateTime();
$umur = $today->diff($lahir);
?>
<style>

    .tblBorder {
        /* width: 100%; */
        border-collapse: collapse;
    }

    .tblBorder tr, .tblBorder td, thead tr th{
        padding: 2px;
        border: 1px solid;
        font-size: 10px;
    }

    .tblDataSm {
        width: 100%;
        border-collapse: collapse;
    }

    .tblDataSm tr td {
        padding: 2px;
        font-size: 10px;
    }

    .tblData {
        width: 100%;
        border-collapse: collapse;
    }

    .tblData td {
        padding: 3px;
        vertical-align: middle;
        font-size: 13px;
    }

    .v-top{
        vertical-align: top !important;
    }

    .b-left {
        border-left: 1px solid;
    }

    .b-right {
        border-right: 1px solid;
    }

    .b-bot {
        border-bottom: 1px solid;
    }

    .b-top {
        border-top: 1px solid;
    }

    .b-all {
        border-left: 1px solid;
        border-bottom: 1px solid;
    }

    div.mix {
        border-style: double;
    }

    .text-bigger {
        color: maroon;
        font-size: 13pt;
    }

    .img-disabled {
        opacity: 0.3;
    }
    .mt-20{
        margin-top:20px !important;
    }
    .mt-10{
        margin-top:20px !important;
    }
    .mt-10{
        margin-top:10px !important;
    }
    .mt-5{
        margin-top:5px !important;
    }
    .f-7{
        font-size: 9px;
    }
</style>

<div style="text-align:right; color:dimgray">
    <span style="font-size:11px;"><?= $cabang->kode_formulir ?></span>
</div>
<table class="tblData">
    <tr>
        <td class="b-left b-top b-bot" width="15%" align="center">
            <img src="<?= base_url() ?>assets/images/cabang/<?= $this->session->userdata('Cabang').'/'.$cabang->gambar_logo_2 ?>" alt="logo" width="100">
        </td>
        <td class="b-top b-bot" width="35%">
            <p>
                <b><?= $cabang->nama_rs ?></b> <br />
                <?= $cabang->alamat ?>
            </p>
        </td>
        <td class="b-top b-right b-bot" width="50%">
            <table class="tblDataSm">
                <tr>
                    <td>No. RM</td>
                    <td>:</td>
                    <td><?= $cabang->kode_formulir ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $detail['Patient_Name'] ?><td>
                </tr>
                <tr>
                    <td>Tgl Lahir</td>
                    <td>:</td>
                    <td><?= date("d M Y", strtotime($detail['Patient_DOB'])) ?> (<?= $umur->y . " Th" ?>)</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?= $detail['Patient_Sex'] ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>