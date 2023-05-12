<?php

require_once '../libraries/Database.php';

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function saveSignUp($nama, $jenisKelamin, $tanggalLahir, $noTelepon, $email, $password)
    {
        $password = base64_encode($password);
        // CEK EMAIL
        $cekEmail = "SELECT * FROM user WHERE email='{$email}'";
        $this->db->query($cekEmail);
        if ($this->db->single()) {
            flash('signup_alert', 'Email sudah digunakan', 'red');
            header('Location: ../view/Signup.php');
            exit;
        }
        // CEK EMAIL

        // SIMPAN DATA
        $insert = "INSERT INTO user (namaUser,jenisKelamin,tanggalLahir,nomorTelepon,email,password) VALUES ('{$nama}','{$jenisKelamin}','{$tanggalLahir}','{$noTelepon}','{$email}','{$password}')";
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
        $this->db->query("SELECT * FROM user WHERE email = '{$email}'");
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
        $this->db->query('UPDATE user SET namaUser = :namaUser, jenisKelamin = :jenisKelamin, tanggalLahir = :tanggalLahir, noTelepon = :noTelepon, email = :email, password = :password WHERE idUser = :idUser');
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
        $this->db->query('UPDATE user SET tipeMembership = :tipeMembership, statusMembership = :statusMembership WHERE idUser = :idUser');
        $this->db->bind(':tipeMembership', $tipeMembership);
        $this->db->bind(':statusMembership', $statusMembership);
        $this->db->bind(':idUser', $idUser);

        if($this->db->returnExecute()) return true;
        else return false;
    }

*/
}
