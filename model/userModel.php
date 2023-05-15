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


    /*

    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM m_user WHERE email = '{$email}'");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
    public function login($email, $password)
    {
        $row = $this->findUserByEmail($email);

        if ($row == false) return false;

        if ($password == $row->password)
            return $row;
        else
            return false;
    }

    public function editProfile($idUser, $namaUser, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password){
        $this->db->query('UPDATE m_user SET namaUser = :namaUser, jenisKelamin = :jenisKelamin, tanggalLahir = :tanggalLahir, noTelepon = :noTelepon, email = :email, password = :password WHERE idUser = :idUser');
        $this->db->bind(':namaUser', $namaUser);
        $this->db->bind(':jenisKelamin', $jenisKelamin);
        $this->db->bind(':tanggalLahir', $tanggalLahir);
        $this->db->bind(':noTelepon', $noTelepon);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':idUser', $idUser);

        if($this->db->returnExecute()) return true;
        else return false;
    }

    public function requestMembership($idUser, $tipeMembership, $statusMembership)
    {
        $this->db->query('UPDATE m_user SET tipeMembership = :tipeMembership, statusMembership = :statusMembership WHERE idUser = :idUser');
        $this->db->bind(':tipeMembership', $tipeMembership);
        $this->db->bind(':statusMembership', $statusMembership);
        $this->db->bind(':idUser', $idUser);

        if($this->db->returnExecute()) return true;
        else return false;
    }

*/
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

