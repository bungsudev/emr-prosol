<?php
$this->load->view('components/print-header');

$empty = '................';
$checked = "<span style='font-family:helvetica; font-size:14px;'>&#10004;</span>";
$checkbox = '<input type="checkbox"/>';
?>
<table class="tblDataSm">
    <tr>
        <td class="b-all b-right" align="center"><h2><?= $cabang->nama_formulir ?></h2></td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <br>
           <p>Yang bertanda tangan dibawah ini, saya :</p>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <table class="tblDataSm">
                <tr>
                    <td width="110">Nama</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['nama_penanda'])) ? $dtl['nama_penanda'] : $empty ?></td>
                </tr>
                <tr>
                    <td width="110">Alamat</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['alamat_penanda'])) ? $dtl['alamat_penanda'] : $empty ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <br>
            <p>Dalam hal ini bertindak sebagai Dokter Jaga IGD, dengan ini menyatakan bahwa pasien tersebut di bawah ini :</p>
            <br>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <table class="tblDataSm">
                <tr>
                    <td width="110">Nama</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['nama'])) ? $dtl['nama'] : $empty ?></td>
                </tr>
                <tr>
                    <td width="110">No. RM</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['norm'])) ? $dtl['norm'] : $empty ?></td>
                </tr>
                <tr>
                    <td width="110">Alamat</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['alamat'])) ? $dtl['alamat'] : $empty ?></td>
                </tr>
                <tr>
                    <td width="110">Diagnosa</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['diagnosa'])) ? $dtl['diagnosa'] : $empty ?></td>
                </tr>
                <tr>
                    <td width="110">Indikasi Rawat Inap</td>
                    <td width="1">:</td>
                    <td><?= (!empty($dtl['indikasi'])) ? $dtl['indikasi'] : $empty ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <table class="tblDataSm">
                <tr>
                    <td class="v-top" width="270">
                        <?php
                            $data = [
                                "Tidak ada",
                                "Ada"
                            ];
                        ?>
                        <br>
                        Fasilitas Kesehatan Perujuk :
                        <?= ($dtl['faskes_perujuk_pil'] == $data[0]) ? checkbox() : box() ?> <?= $data[0] ?>
                        <?= ($dtl['faskes_perujuk_pil'] == $data[1]) ? checkbox() : box() ?> <?= $data[1] . ' :' ?>
                    </td>
                    <td>
                        <br>
                        <table class="tblDataSm">
                            <tr>
                                <td>
                                    <?= (!empty($dtl['faskes_perujuk1'])) ? '1. ' . $dtl['faskes_perujuk1'] : ' 1. RS. ' . $empty ?>
                                </td>           
                            </tr>
                            <tr>
                                <td>
                                    <?= (!empty($dtl['faskes_perujuk2'])) ? '2. ' . $dtl['faskes_perujuk2'] : ' 2. Puskesmas/Klinik. ' . $empty ?>
                                </td>          
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right">
            <br>
            <p>Dalam mengobati penyakitnya memerlukan rawat inap di RSU Eshmun. Demikian Surat Perintah Rawat Inap ini Saya buat, agar dapat dilaksanakan.</p>
            <br>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right" align="center">
            <br><br>
            Medan, <?= (!empty($dtl['created_time'])) ? date_dfy(strtotime($dtl['created_time'])) : $empty ?> Pukul <?= (!empty($dtl['created_time'])) ? date('H:i', strtotime($dtl['created_time'])) : $empty ?> WIB
        </td>
    </tr>
    <tr>
        <td class="b-left b-right" align="center">
            Yang Membuat													
        </td>
    </tr>
    <tr>
        <td class="b-left b-right" align="center">
            <?= '<img src="' . $dtl['ttd'] . '" width="100px">'; ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right" align="center">
            <b><i><?= $dtl['nama_ttd'] ?></i></b>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right b-bot">
           
        </td>
    </tr>
</table>

<table class="tblDataSm b-left b-bot b-right">
    <tr>
        
    </tr>
</table>
<div style="text-align:right; color:dimgray">
    <span style="font-size:11px;"><?= $page ?></span>
</div>