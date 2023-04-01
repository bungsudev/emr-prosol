<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('labelPasien'))
{
    function labelPasien($var = '')
    {
        $lahir = new DateTime($var);
        $today = new DateTime();
        $umur = $today->diff($lahir);

        $output = $umur->y . " Tahun, " . $umur->m . " Bulan, dan " . $umur->d . " Hari";
        return $output;
    }   
}

if ( ! function_exists('specialType'))
{
    function specialType($specialType = '', $nama_pasien = '', $visit_no = '')
    {
        // penyakit berbahaya
        if ($specialType == 'HIV')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else if ($specialType == 'HEPATITIES B')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else if ($specialType == 'HEPATITIES C')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else if ($specialType == 'SIFILIS')
                $output = '<span class="btnName" data-id="'.$visit_no.'" style="color:red">'.$nama_pasien.'</span>';
            else
                $output = '<span class="btnName" data-id="'.$visit_no.'">'.$nama_pasien.'</span>';

        return $output;
    }   
}

if ( ! function_exists('iconGender'))
{
    function iconGender($var = '')
    {
         // icon gender
        if ($var == 'PRIA')
            $output = '<i class="fa fa-mars" style="color: blue;" title="PRIA"></i>';
        else if ($var == 'WANITA')
            $output = '<i class="fa fa-venus" style="color: magenta;" title="WANITA"></i>';
        else
            $output = '';
            
        return $output;
    }   
}