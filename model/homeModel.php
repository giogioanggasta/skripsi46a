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
        $cekEmail = "SELECT x.*,( SELECT z.hargaTipeKamar FROM m_tipekamar_pengelolaan z WHERE x.idTipeKamar = z.idTipeKamar ORDER BY z.created_at DESC LIMIT 1) harga
        FROM
            m_tipekamar x";
        $this->db->query($cekEmail);
        return $this->db->resultAll();
    }
}

$homeM = new HomeModel();

// TRIGGER LOGUT
if (isset($_GET['logOut']) && isset($_SESSION['session_login'])) {

    unset($_SESSION['session_login']);

    header('Location: ../view/Home.php');
}
