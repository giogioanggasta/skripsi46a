<?php

require_once '../libraries/Database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkLogin($email, $password)
    {
        $cekAkun = "SELECT idUser,namaUser,jenisKelamin,tanggalLahir,nomorTelepon,email FROM `m_user` WHERE email = '{$email}' AND password = TO_BASE64('{$password}')";
        $this->db->query($cekAkun);
        $row = $this->db->single();
        if ($row) {

            $_SESSION['session_login'] = $row;
            header('Location: ../view/Home.php');

            // echo $_SESSION['session_login']->namaUser;
            // var_dump($_SESSION['session']);
            // exit;
            // flash('login_alert', 'Email sudah digunakan', 'red');
            // header('Location: ../view/Login.php');
            // exit;
        } else {
            flash('login_alert', 'Akun tidak valid', 'red');
            header('Location: ../view/Login.php');
        }
    }

    public function saveSignUp($nama, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password)
    {
        $password = base64_encode($password);
        // CEK EMAIL
        $cekEmail = "SELECT * FROM m_user WHERE email='{$email}'";
        $this->db->query($cekEmail);
        if ($this->db->single()) {
            flash('signup_alert', 'Email sudah digunakan', 'red');
            header('Location: ../view/Signup.php');
            exit;
        }
        // CEK EMAIL

        // SIMPAN DATA
        $insert = "INSERT INTO m_user (namaUser,jenisKelamin,tanggalLahir,nomorTelepon,email,password) VALUES ('{$nama}','{$jenisKelamin}','{$tanggalLahir}','{$noTelepon}','{$email}','{$password}')";
        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            flash('signup_alert', 'Berhasil menyimpan data', 'green');
            // $_POST
        } else {
            flash('signup_alert', 'Gagal menyimpan data', 'red');
        }
        header('Location: ../view/Signup.php');
        // $_POST['enterBtn'] = 0;
        // return redirect('../view/Signup.php');
    }


    public function showPesanan()
    {
        if (!isset($_SESSION['session_login'])) {
            header('Location:Login.php');
            exit;
        }
        $select = "SELECT
        t.idTipeKamar,
        t.idTransaksi,
        t.namaTipeKamar,
        t.nomorKamar,
        t.pilihanDetailFasilitas,
        t.status,
        t.lamaSewa,
       t.tanggalWaktuTransaksi,
        t.totalPembayaran,
        mtk.thumbnailKamar,
        t.reason,
        t.buktiPembayaran,
        t.awalSewa,
        t.akhirSewa
        FROM 
        transaksi t
        LEFT JOIN m_user u ON t.idUser = u.idUser
        LEFT JOIN m_tipekamar mtk ON t.idTipeKamar = mtk.idTipeKamar
        
         WHERE t.idUser = '{$_SESSION['session_login']->idUser}' ORDER BY t.tanggalWaktuTransaksi DESC
        ";
        // echo $select;exit;
        $this->db->query($select);

        return $this->db->resultAll();
    }
    public function saveBuktiBayar($idTransaksi, $namaGambar)
    {
        $upd = "UPDATE transaksi SET buktiPembayaran='$namaGambar',status = 'Proses' WHERE idTransaksi = '{$idTransaksi}'";
        $this->db->query($upd);

        if ($this->db->returnExecute()) {
            flash('pesanan_alert', 'Berhasil upload bukti pembayaran', 'green');
            // $_POST
        } else {
            flash('pesanan_alert', 'Gagal upload bukti pembayaran', 'red');
        }
        header('Location: ../view/Pesanan.php');
    }
}

$userM = new UserModel();
// TRIGGER UNTUK SING UP
if (isset($_POST['enterBtnSignUp']) && !isset($_SESSION['signup_alert'])) {

    // $nama, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password
    $userM->saveSignUp($_POST['nama'], $_POST['jenisKelamin'], $_POST['tanggalLahir'], $_POST['nomorTelepon'], $_POST['email'], $_POST['password']);
}

// TRIGGER UNTUK LOGIN
if (isset($_POST['enterBtnLogin']) && (!isset($_SESSION['login_alert']))) {

    // $nama, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password
    $userM->checkLogin($_POST['email'], $_POST['password']);
}


if (isset($_POST['btnSavePembayaran'])) {
    if (!(file_exists('../images/bukti-bayar'))) {
        mkdir('../images/bukti-bayar', 0777, true);
    }
    $idTransaksi = $_POST['idTransaksi'];
    $namaGambar = time() . "_" . $_FILES['buktiPembayaran']['name'];
    $simpanGambar =  move_uploaded_file($_FILES['buktiPembayaran']['tmp_name'], '../images/bukti-bayar/' . $namaGambar);
    $userM->saveBuktiBayar($idTransaksi, $namaGambar);
}
