<?php

require_once '../libraries/Database.php';

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkLogin($email, $password)
    {
        $cekAkun = "SELECT * FROM `admin` WHERE email = '{$email}' AND password = TO_BASE64('{$password}')";
        $this->db->query($cekAkun);
        $row = $this->db->single();
        if ($row) {

            $_SESSION['admin_session_login'] = $row;
            header('Location: ../view/HomeAdmin.php');

            // echo $_SESSION['session_login']->namaUser;
            // var_dump($_SESSION['session']);
            // exit;
            // flash('login_alert', 'Email sudah digunakan', 'red');
            // header('Location: ../view/Login.php');
            // exit;
        } else {
            flash('login_alert', 'Akun tidak valid', 'red');
            header('Location: ../view/HomeAdmin.php');
        }
    }
}

$userM = new AdminModel();

// TRIGGER UNTUK LOGIN
if (isset($_POST['enterBtnLoginAdmin']) && (!isset($_SESSION['admin_login_alert']))) {

    // $nama, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password
    $userM->checkLogin($_POST['email'], $_POST['password']);
}

if (isset($_POST['logOutAdmin'])) {
    unset($_SESSION['admin_session_login']);
    header('Location: ../view/HomeAdmin.php');
}
