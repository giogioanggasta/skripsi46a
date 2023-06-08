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
        t.totalPembayaranNormal,
        t.potonganHarga,
        t.namaDiskon,
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
            $cekUser = "SELECT * FROM m_user WHERE idUser='{$_SESSION['session_login']->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();


            sendWhatsApp('087742036248', "===== Admin Notification Order Kos46A =====
Ada pesanan kamar detail sebagai berikut :
ID Pesanan : {$idTransaksi}
Tanggal Upload Bukti Pembayaran : " . date('d-m-Y H:i:s'));


            sendWhatsApp($infoUser->nomorTelepon, "===== Notification Kos46A =====
Terimakasih {$infoUser->namaUser}, telah melakukan upload bukti pembayaran. Mohon menunggu respon admin");

            flash('pesanan_alert', 'Berhasil upload bukti pembayaran', 'green');
            // $_POST
        } else {
            flash('pesanan_alert', 'Gagal upload bukti pembayaran', 'red');
        }
        header('Location: ../view/Pesanan.php');
    }

    public function profileUser()
    {
        $select = "SELECT * FROM m_user WHERE idUser='{$_SESSION['session_login']->idUser}'";
        // echo $select;exit;
        $this->db->query($select);

        return $this->db->single();
    }


    public function saveProfile($param)
    {
        if ($param['passwordBaru'] == '' && $param['passwordLama'] == '') {
            $update = "UPDATE m_user SET namaUser = '{$param['namaUser']}', jenisKelamin = '{$param['jenisKelamin']}', tanggalLahir = '{$param['tanggalLahir']}', nomorTelepon = '{$param['nomorTelepon']}' WHERE idUser='{$param['idUser']}'";
        }
        // withupdate password
        else {
            $pwl = base64_encode($param['passwordLama']);
            $pwb = base64_encode($param['passwordBaru']);
            $select = "SELECT * FROM m_user WHERE idUser = '{$param['idUser']}' AND password = '{$pwl}'";
            $this->db->query($select);
            $cekPasswordLama = $this->db->resultAll();

            if ($cekPasswordLama) {

                $update = "UPDATE m_user SET namaUser = '{$param['namaUser']}', jenisKelamin = '{$param['jenisKelamin']}', tanggalLahir = '{$param['tanggalLahir']}', nomorTelepon = '{$param['nomorTelepon']}',password='{$pwb}' WHERE idUser='{$param['idUser']}'";
            } else {
                flash('profile_alert', 'Password lama salah', 'red');
                header('Location: ../view/Profile.php');
            }
        }
        $this->db->query($update);

        if ($this->db->returnExecute()) {
            flash('profile_alert', 'Berhasil update profile', 'green');
            // $_POST
        } else {
            flash('profile_alert', 'Gagal upload profile', 'red');
        }
        header('Location: ../view/Profile.php');
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


if (isset($_POST['saveProfile'])) {

    $userM->saveProfile($_POST);
}
