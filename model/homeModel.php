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
    public function showKamarLimit()
    {
        $cekEmail = "SELECT x.*,( SELECT z.hargaTipeKamar FROM m_tipekamar_pengelolaan z WHERE x.idTipeKamar = z.idTipeKamar ORDER BY z.created_at DESC LIMIT 1) harga
        FROM
            m_tipekamar x LIMIT 3";
        $this->db->query($cekEmail);
        return $this->db->resultAll();
    }


    public function searchTipeKamar($idTipeKamar)
    {
        $cekDtl = "SELECT
    mtk.idTipeKamar,
        mtk.namaTipeKamar 'namaTipeKamar',
        ( SELECT z.hargaTipeKamar FROM m_tipekamar_pengelolaan z WHERE mtk.idTipeKamar = z.idTipeKamar ORDER BY z.created_at DESC LIMIT 1) 'hargaTipeKamar',
        mtk.descTipeKamar 'descTipeKamar',
        (SELECT GROUP_CONCAT(namaFoto) foto FROM m_tipekamar_foto WHERE idTipeKamar = mtk.idTipeKamar) 'foto',
        (SELECT GROUP_CONCAT(nomorKamar) nomorKamar FROM kamar WHERE idTipeKamar = mtk.idTipeKamar AND status != 'Tidak Tersedia') 'nomorKamar'
    FROM
    m_tipekamar mtk 
    WHERE mtk.idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cekDtl);
        $result = $this->db->single();

        return $result;
    }

    public function showFasilitas()
    {

        // CEK EMAIL
        $getAllFasilitas = "SELECT
        mf.idFasilitas,mf.namaFasilitas,mf.fotoFasilitas,a.namaAdmin,
        ( SELECT z.hargaFasilitas FROM fasilitas_pengelolaan z WHERE mf.idFasilitas = z.idFasilitas ORDER BY z.created_at DESC LIMIT 1) hargaFasilitas
    FROM
        fasilitas mf
        LEFT JOIN admin a ON mf.idAdmin = a.idAdmin ORDER BY mf.idFasilitas DESC";
        $this->db->query($getAllFasilitas);

        return $this->db->resultAll();
    }


    public function savePesanan()
    {

        $create_akhirSewa = date("Y-m-d", strtotime($_POST['awalSewa'] . " +{$_POST['lamaSewa']} month"));
        $detailTipeKamar = $this->searchTipeKamar(base64_decode($_GET['dGlwZUthbWFy']));
        $insert = "INSERT INTO transaksi (idUser,idTipeKamar,nomorKamar,namaTipeKamar,lamaSewa,pilihanDetailFasilitas,totalPembayaran,awalSewa,akhirSewa) VALUES ('{$_SESSION['session_login']->idUser}','{$detailTipeKamar->idTipeKamar}','{$_POST['kamar']}','{$detailTipeKamar->namaTipeKamar}','{$_POST['lamaSewa']}','{$_POST['pilihanDetailFasilitas']}','{$_POST['totalHargaTransaksi']}','{$_POST['awalSewa']}','{$create_akhirSewa}')";

        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            header('Location: ../view/Pesanan.php');
        }
    }

    public function cekKetersediaanKamar($awalSewa, $lamaSewa, $tipeKamar)
    {
        $cekKamar = "SELECT
        k.nomorKamar,
        k.status,
        IF((SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status = 'Diterima') IS NULL,'kosong',(SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status = 'Diterima'))
        ketersediaan,
        IF((SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status = 'Diterima') IS NULL,'','disabled')
        html 
    FROM
        kamar k WHERE k.idTipeKamar = '{$tipeKamar}'";

        $this->db->query($cekKamar);
        return $this->db->resultAll();
    }
}

$homeM = new HomeModel();

// TRIGGER LOGUT
if (isset($_GET['logOut']) && isset($_SESSION['session_login'])) {

    unset($_SESSION['session_login']);

    header('Location: ../view/Home.php');
}


if (isset($_POST['saveDetailPesanan'])) {
    // echo "<pre>";
    // var_dump($_SESSION);
    // var_dump($_POST);
    // var_dump($_GET);
    // // exit;

    $homeM->savePesanan();
}
