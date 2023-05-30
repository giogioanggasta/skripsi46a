<?php

if (!isset($_SESSION))
    session_start();

function flash($name = '', $message = '', $class = '')
{
    if ($class == 'red') {
        $class = 'alert alert-danger';
    } else if ($class == 'green') {
        $class = 'alert alert-success';
    }

    if ($name != '') {
        $_SESSION[$name] = '<center><div class="w-50 ' . $class . '" >' . $message . '</div></center> <br>';
    }
}

function redirect($location)
{
    header("Location: {$location}");
    exit();
}


function formatRupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return 'Rp. ' . $rupiah;
}

function formatTgl($date)
{

    $cek = ltrim(date_format(date_create($date), "m"), 0);

    $bulan = array(
        '1' => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    return date_format(date_create($date), "d ") . $bulan[$cek] . date_format(date_create($date), " Y");
}
function formatWaktu($time)
{

    return date("H:i:s A", strtotime($time));
}
