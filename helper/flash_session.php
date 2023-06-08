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


function formatDot($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return  $rupiah;
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


function sendWhatsApp($sendTo, $msg)
{

    $api_key   = 'ScHUzvVCAylxCqye00Pg2JX7nyKxMw'; // API KEY Anda 
    $url   = "https://wa.srv1.wapanels.com/send-message"; // URL API
    $sender = "6287742036248"; // No.HP yang dikirim (No.HP Penerima)
    $no_hp = $sendTo; // No.HP yang dikirim (No.HP Penerima)
    $pesan = ($msg); // Pesan yang dikirim

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 0); // batas waktu response
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_POST, 1);

    $data_post = [
        'api_key' => $api_key,
        'sender' => $sender,
        'number' => $no_hp,
        'message' => $pesan
    ];
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}


function tambah1Hari($tgl)
{
    return date('Y-m-d', strtotime($tgl . ' +1 day'));
}
