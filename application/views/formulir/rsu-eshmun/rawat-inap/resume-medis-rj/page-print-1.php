<?php
$this->load->view('components/print-header');

$empty = '................';
$checked = "<span style='font-family:helvetica; font-size:14px;'>&#10004;</span>";
$checkbox = '<input type="checkbox"/>';
?>
<table class="tblData">
    <tr>
        <td class="b-all b-right" align="center"><h2><?= $cabang->nama_formulir ?></h2></td>
    </tr>
</table>

<table class="tblDataSm">
    <tr>
        <td class="b-left b-bot b-right" width="50%">
            Tanggal Masuk : <?= (!empty($dtl['tanggal_masuk'])) ? date_dfy(strtotime($dtl['tanggal_masuk'])) : $empty ?>
        </td>
        <td class="b-right b-bot" width="50%">
            Tanggal Keluar / Tanggal Meninggal : <?= (!empty($dtl['tanggal_keluar'])) ? date_dfy(strtotime($dtl['tanggal_keluar'])) : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-bot b-right" width="50%">
            Ruang Rawat Terakhir : <?= (!empty($dtl['ruang_rawat_akhir'])) ? $dtl['ruang_rawat_akhir'] : $empty ?>
        </td>
        <td class="b-right b-bot" width="50%">
            Penanggung Pembayaran : <?= (!empty($dtl['penanggung_pembayaran'])) ? $dtl['penanggung_pembayaran'] : $empty ?>
        </td>
    </tr>
    <tr>
        <td class="b-left b-bot b-right" colspan="2">
            Dokter Penanggungjawab (DPJP) Utama: <?= (!empty($dtl['dpjp'])) ? $dtl['dpjp'] : $empty ?>
        </td>
    </tr>
    <tr>
        <td colspan='2' class="b-left b-bot b-right">
            <table class="tblDataSm">
                <tr>
                    <td width="30%" class="v-top">
                        <?php
                        $data = [
                            "Ya",
                            "Tidak"
                        ];
                        ?>
                        Rawat Tim Dokter : 
                        <?= ($dtl['tim_dokter_pil'] == $data[1]) ? checkbox() : box() ?> <?= $data[1] ?>
                        <?= ($dtl['tim_dokter_pil'] == $data[0]) ? checkbox() : box() ?> <?= $data[0] . ' , Oleh :' ?>
                    </td>
                    <td>
                        <table class="tblDataSm">
                            <tr>
                                <td>
                                    <?= (!empty($dtl['tim_dokter1'])) ? '1. ' . $dtl['tim_dokter1'] : ' 1. dr. ' . $empty ?>
                                </td>
                                <td>
                                    <?= (!empty($dtl['tim_dokter2'])) ? '2. ' . $dtl['tim_dokter2'] : ' 2. dr. ' . $empty ?>
                                </td>            
                            </tr>
                            <tr>
                                <td>
                                    <?= (!empty($dtl['tim_dokter3'])) ? '3. ' . $dtl['tim_dokter3'] : ' 3. dr. ' . $empty ?>
                                </td>
                                <td>
                                    <?= (!empty($dtl['tim_dokter4'])) ? '4. ' . $dtl['tim_dokter4'] : ' 4. dr. ' . $empty ?>
                                </td>            
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="b-left b-right" colspan="2">
            <table class="tblDataSm v-top">
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Indikasi Dirawat</td>
                    <td class="b-bot"><?= (!empty($dtl['indikasi_dirawat'])) ? $dtl['indikasi_dirawat'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Diagnosa Masuk</td>
                    <td class="b-bot"><?= (!empty($dtl['diagnosa_masuk'])) ? $dtl['diagnosa_masuk'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Diagnosa Keluar <br> (Diagnosa Utama)</td>
                    <td class="b-bot"><?= (!empty($dtl['diagnosa_keluar'])) ? $dtl['diagnosa_keluar'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Diagnosa Sekunder</td>
                    <td class="b-bot"><?= (!empty($dtl['diagnosa_sekunder'])) ? $dtl['diagnosa_sekunder'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Penyebab Kematian <br> (secara klinis)</td>
                    <td class="b-bot"><?= (!empty($dtl['penyebab_kematian'])) ? $dtl['penyebab_kematian'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Pemeriksaan Fisik yang Penting</td>
                    <td class="b-bot"><?= (!empty($dtl['pemeriksaan_fisik'])) ? $dtl['pemeriksaan_fisik'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Laboratorium yang Penting</td>
                    <td class="b-bot"><?= (!empty($dtl['laboratorium'])) ? $dtl['laboratorium'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Radiologi</td>
                    <td class="b-bot"><?= (!empty($dtl['radiologi'])) ? $dtl['radiologi'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Penunjang Lain</td>
                    <td class="b-bot"><?= (!empty($dtl['penunjang_lain'])) ? $dtl['penunjang_lain'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Tindakan / Prosedur Medis</td>
                    <td class="b-bot"><?= (!empty($dtl['tindakan'])) ? $dtl['tindakan'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Pengobatan Selama Dirawat</td>
                    <td class="b-bot"><?= (!empty($dtl['pengobatan'])) ? $dtl['pengobatan'] : $empty ?></td>
                </tr>
                <?php
                    $dataVal = [
                        "Sembuh",
                        "PBJ",
                        "Pindah RS",
                        "Pulang atas permintaan sendiri",
                        "Meninggal",
                        "Lain-lain"
                    ];
                ?>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Kondisi Saat Pulang</td>
                    <td class="b-bot">
                        <table class="tblDataSm">
                            <tr>
                                <td>
                                    <?php for ($i = 0; $i < 3; $i++) { ?>
                                        <?= ($dtl['kondisi_pulang'] == $dataVal[$i]) ? checkbox() : box() ?> <?= $dataVal[$i] . '&nbsp;&nbsp;&nbsp;' ?> <br>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php for ($i = 3; $i < 6; $i++) { ?>
                                        <?= ($dtl['kondisi_pulang'] == $dataVal[$i]) ? checkbox() : box() ?> <?= $dataVal[$i] . '&nbsp;&nbsp;&nbsp;' ?> <br>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Keterangan Pulang</td>
                    <td class="b-bot"><?= (!empty($dtl['keterangan_pulang'])) ? $dtl['keterangan_pulang'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Instruksi dan Edukasi Lanjutan</td>
                    <td class="b-bot"><?= (!empty($dtl['intruksi_lanjutan'])) ? $dtl['intruksi_lanjutan'] : $empty ?></td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Kondisi Saat Pulang</td>
                    <td class="b-bot">
                        <table class="tblDataSm">
                            <tr>
                                <td class="b-right"  height="31" width="40%">
                                    <?= (!empty($dtl['diet'])) ? $dtl['diet'] : $empty ?>
                                </td>
                                <td class="b-right"  height="31" width="20%">
                                    Hari / Tanggal / Jam <br> Kontrol Ulang  	
                                </td>
                                <td>
                                    <?= (!empty($dtl['tgl_kontrol_ulang'])) ? date_dfy(strtotime($dtl['tgl_kontrol_ulang'])) : $empty ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Latihan</td>
                    <td class="b-bot">
                        <table class="tblDataSm">
                            <tr>
                                <td class="b-right"  height="31" width="40%">
                                    <?= (!empty($dtl['latihan'])) ? $dtl['latihan'] : $empty ?>
                                </td>
                                <td class="b-right"  height="31" width="20%">
                                    Di Klinik Spesialis 	
                                </td>
                                <td>
                                    <?= (!empty($dtl['diklinik_spesialis'])) ? $dtl['diklinik_spesialis'] : $empty ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="31" width="25%" class="b-right b-bot">Segera kembali ke IGD bila <br> terjadi</td>
                    <td class="b-bot">
                        <table class="tblDataSm">
                            <tr>
                                <td class="b-right"  height="31" width="40%">
                                    <?= (!empty($dtl['kembali_ke_igd'])) ? $dtl['kembali_ke_igd'] : $empty ?>
                                </td>
                                <td class="b-right"  height="31" width="20%">
                                    RS 	
                                </td>
                                <td>
                                    <?= (!empty($dtl['rumah_sakit'])) ? $dtl['rumah_sakit'] : $empty ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td height="31" colspan="2" class="b-bot">Terapi Pulang</td>
                </tr>
                <tr>
                    <td colspan="2" class="b-bot">
                        <table class="tblBorder" width="70%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="40%">Nama Obat</th>
                                    <th>Satuan</th>
                                    <th>Jumlah</th>
                                    <th>Dosis</th>
                                    <th>Frekuensi</th>
                                </tr>
                            </thead>
                            <?php
                                $json = json_decode($dtl['terapi_pulang']);
                                if (!empty($json)):
                                $val_list = array_reverse($json);
                            ?>
                            <tbody>
                                <?php 
                                    $count = count($val_list);
                                    $no = 0;
                                    for ($i=0; $i < $count; $i++): 
                                ?>
                                        <tr>
                                            <td><?= $no + 1 ?></td>
                                            <td><?= $val_list[$i]->nama_obat ?></td>
                                            <td><?= $val_list[$i]->satuan ?></td>
                                            <td><?= $val_list[$i]->jumlah ?></td>
                                            <td><?= $val_list[$i]->dosis ?></td>
                                            <td><?= $val_list[$i]->frekuensi ?></td>
                                        </tr>
                                        <?php 
                                    endfor; 
                                        if ($no < 7):
                                            for ($i=0; $i < 6 - $count; $i++):
                                        ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        <?php endfor; ?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php for ($i=0; $i < 7; $i++): ?>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                    <?php endfor; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <br><br>
                        Medan, <?= (!empty($dtl['created_time'])) ? date_dfy(strtotime($dtl['created_time'])) : $empty ?> Pukul <?= (!empty($dtl['created_time'])) ? date('H:i', strtotime($dtl['created_time'])) : $empty ?> WIB
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        Yang Membuat													
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <?= '<img src="' . $dtl['ttd'] . '" width="100px">'; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="b-bot" align="center">
                        <b><i><?= $dtl['nama_ttd'] ?></i></b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="f-7 mt-5">
    1. Lembar Asli untuk Arsip Rekam Medis <br>
    2. Lembar kedua Untuk Pasien <br>
    3. Lembar Ketiga Untuk Penjamin		
</div>
<div style="text-align:right; color:dimgray">
    <span style="font-size:11px;"><?= $page ?></span>
</div>