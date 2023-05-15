<?php

require_once '../libraries/Database.php';

class HomeModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function showKamar()
    {
     
        // CEK EMAIL
        $cekEmail = "SELECT * FROM m_tipekamar";
        $this->db->query($cekEmail);
        if ($this->db->single()) {
            flash('signup_alert', 'Email sudah digunakan', 'red');
            header('Location: ../view/Signup.php');
            exit;
        }
        // CEK EMAIL

       
        // $_POST['enterBtn'] = 0;
        // return redirect('../view/Signup.php');
    }
}

$userM = new HomeModel();

// TRIGGER LOGUT
if (isset($_GET['logOut']) && isset($_SESSION['session_login'])) {

    unset($_SESSION['session_login']);

    header('Location: ../view/Home.php');
}
