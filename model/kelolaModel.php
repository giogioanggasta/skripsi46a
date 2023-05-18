<?php

require_once '../libraries/Database.php';

class kelolaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function saveTipeKamar($idAdmin, $tipeKamar, $namaGambar)
    {
        $insert = "INSERT INTO m_tipekamar (namaTipeKamar,thumbnailKamar,idAdmin) VALUES ('{$tipeKamar}','{$namaGambar}','{$idAdmin}')";
        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil menambah tipe kamar', 'green');
            // $_POST
        } else {
            flash('insert_alert', 'Gagal menambah tipe kamar', 'red');
        }
        // header('Location: ../view/Kelola.php');
        // exit;
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

$kelolaM = new kelolaModel();

if (isset($_POST['btnInsertTipeKamar'])  && !isset($_SESSION['insert_alert'])) {

    if (!(file_exists('../images/thumbnail'))) {
        mkdir('../images/thumbnail', 0777, true);
    }

    $tipeKamar = $_POST['tipeKamar'];
    $idAdmin = $_POST['idAdmin'];
    $namaGambar = time() . "_" . $_FILES['fileTipeKamar']['name'];
    // var_dump($_FILES['fileTipeKamar']['tmp_name']);
    $simpanGambar =  move_uploaded_file($_FILES['fileTipeKamar']['tmp_name'], '../images/thumbnail/' . $namaGambar);
    // var_dump($simpanGambar);
    // exit;
    $kelolaM->saveTipeKamar($idAdmin, $tipeKamar, $namaGambar);
}


// TRIGGER LOGUT
if (isset($_GET['logOut']) && isset($_SESSION['session_login'])) {

    unset($_SESSION['session_login']);

    header('Location: ../view/Home.php');
}
