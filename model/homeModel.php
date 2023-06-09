<?php
date_default_timezone_set("Asia/Jakarta");

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

    public function detailTransaksi($idTransaksi)
    {
        $sql = "SELECT * FROM transaksi WHERE idTransaksi = '{$idTransaksi}'";

        $this->db->query($sql);
        return $this->db->single();
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

    public function searchFasilitas($cari)
    {

        // CEK EMAIL
        $getAllFasilitas = "SELECT
        mf.idFasilitas,mf.namaFasilitas,mf.fotoFasilitas,a.namaAdmin,
        ( SELECT z.hargaFasilitas FROM fasilitas_pengelolaan z WHERE mf.idFasilitas = z.idFasilitas ORDER BY z.created_at DESC LIMIT 1) hargaFasilitas
    FROM
        fasilitas mf
        LEFT JOIN admin a ON mf.idAdmin = a.idAdmin WHERE mf.namaFasilitas = '{$cari}' ORDER BY mf.idFasilitas DESC";
        // echo $getAllFasilitas;
        // exit;
        $this->db->query($getAllFasilitas);

        return $this->db->single();
    }


    public function savePesanan()
    {

        $create_akhirSewa = date("Y-m-d", strtotime($_POST['awalSewa'] . " +{$_POST['lamaSewa']} month"));
        $detailTipeKamar = $this->searchTipeKamar(base64_decode($_GET['dGlwZUthbWFy']));
        $insert = "INSERT INTO transaksi (idUser,idTipeKamar,nomorKamar,namaTipeKamar,lamaSewa,pilihanDetailFasilitas,namaDiskon,potonganHarga,totalPembayaranNormal,totalPembayaran,awalSewa,akhirSewa) VALUES ('{$_SESSION['session_login']->idUser}','{$detailTipeKamar->idTipeKamar}','{$_POST['kamar']}','{$detailTipeKamar->namaTipeKamar}','{$_POST['lamaSewa']}','{$_POST['pilihanDetailFasilitas']}','{$_POST['namaDiskon']}','{$_POST['totalHargaTransaksiDiskon']}','{$_POST['totalHargaTransaksiNormal']}','{$_POST['totalHargaTransaksi']}','{$_POST['awalSewa']}','{$create_akhirSewa}')";

        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            $cekUser = "SELECT * FROM m_user WHERE idUser='{$_SESSION['session_login']->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();

            // notif wa

            $result = sendWhatsApp($infoUser->nomorTelepon, "===== Notification Kos46A =====
Terimakasih telah melakukan pemesanan, jangan lupa melakukan pembayaran, detail pesanan anda sebagai berikut :
- Nama Pemesan : {$infoUser->namaUser}
- Tanggal Pemesanan : " . date('d-m-Y H:i:s') . "
- Tipe Kamar : {$detailTipeKamar->namaTipeKamar}
- Nomor Kamar : {$_POST['kamar']}
- Lama Sewa : {$_POST['awalSewa']} sampai {$create_akhirSewa} ({$_POST['lamaSewa']} bulan)
Total Yang Harus Dibayar : " . formatRupiah($_POST['totalHargaTransaksi']));

            header('Location: ../view/Pesanan.php');
        }
    }
    public function savePesananPerpanjangan()
    {

        $create_akhirSewa = date("Y-m-d", strtotime($_POST['awalSewa'] . " +{$_POST['lamaSewa']} month"));
        $detailTipeKamar = $this->searchTipeKamar(base64_decode($_GET['dGlwZUthbWFy']));
        $insert = "INSERT INTO transaksi_pembaharuan (type,idTransaksiRefrensi,idUser,idTipeKamar,nomorKamar,namaTipeKamar,lamaSewa,pilihanDetailFasilitas,namaDiskon,potonganHarga,totalPembayaranNormal,totalPembayaran,awalSewa,akhirSewa,status) VALUES ('Perpanjangan','{$_POST['idTransaksiRefrensi']}','{$_SESSION['session_login']->idUser}','{$detailTipeKamar->idTipeKamar}','{$_POST['kamar']}','{$detailTipeKamar->namaTipeKamar}','{$_POST['lamaSewa']}','{$_POST['pilihanDetailFasilitas']}','{$_POST['namaDiskon']}','{$_POST['totalHargaTransaksiDiskon']}','{$_POST['totalHargaTransaksiNormal']}','{$_POST['totalHargaTransaksi']}','{$_POST['awalSewa']}','{$create_akhirSewa}','Menunggu Pembayaran Perpanjangan')";

        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            $cekUser = "SELECT * FROM m_user WHERE idUser='{$_SESSION['session_login']->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();

            // notif wa

            $result = sendWhatsApp($infoUser->nomorTelepon, "===== Notification Perpanjangan Kos46A =====
Terimakasih telah melakukan perpanjangan pemesanan, jangan lupa melakukan pembayaran, detail pesanan anda sebagai berikut :
- Nama Pemesan : {$infoUser->namaUser}
- Tanggal Pemesanan : " . date('d-m-Y H:i:s') . "
- Tipe Kamar : {$detailTipeKamar->namaTipeKamar}
- Nomor Kamar : {$_POST['kamar']}
- Lama Sewa : {$_POST['awalSewa']} sampai {$create_akhirSewa} ({$_POST['lamaSewa']} bulan)
Total Perpanjangan yang Harus Dibayar : " . formatRupiah($_POST['totalHargaTransaksi']));

            header('Location: ../view/Pesanan.php?tab=pembaharuan');
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
        AND t.nomorKamar = k.nomorKamar AND t.status  IN ('Diterima','Diterima dengan Pembaharuan')) IS NULL,'kosong',(SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status  IN ('Diterima','Diterima dengan Pembaharuan')))
        ketersediaan,
        IF((SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status  IN ('Diterima','Diterima dengan Pembaharuan')) IS NULL,'','disabled')
        html 
    FROM
        kamar k WHERE k.idTipeKamar = '{$tipeKamar}' AND k.status = 'Tersedia'
				
				UNION
				
				
				
				SELECT
        k.nomorKamar,
        k.status,
        IF((SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status IN ('Diterima Perpanjangan','Diterima Pengembalian')) IS NULL,'kosong',(SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status  IN ('Diterima Perpanjangan','Diterima Pengembalian')))
        ketersediaan,
        IF((SELECT
        GROUP_CONCAT(concat('(',t.awalSewa,' sampai ',t.akhirSewa,')')) sewa
    FROM
        `transaksi` t
    WHERE
    (t.awalSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d') OR
    t.akhirSewa BETWEEN '{$awalSewa}' AND DATE_FORMAT(DATE_ADD('{$awalSewa}', INTERVAL {$lamaSewa} MONTH), '%Y-%m-%d'))
        AND t.nomorKamar = k.nomorKamar AND t.status IN ('Diterima Perpanjangan','Diterima Pengembalian')) IS NULL,'','disabled')
        html 
    FROM
        kamar k WHERE k.idTipeKamar = '{$tipeKamar}' AND k.status = 'Tersedia'";

        $this->db->query($cekKamar);
        return $this->db->resultAll();
    }


    public function showDiskonKamar()
    {
        $select = "SELECT
        * 
    FROM
        diskon 
    WHERE
        CURRENT_DATE BETWEEN tglAwal 
        AND tglAkhir 
        AND `limit` != 0";

        $this->db->query($select);
        return $this->db->resultAll();
    }

    public function searchDiskonKamar($var)
    {
        $select = "SELECT
        * 
    FROM
        diskon 
    WHERE
        CURRENT_DATE BETWEEN tglAwal 
        AND tglAkhir 
        AND `limit` != 0 AND namaDiskon= '{$var}'";

        $this->db->query($select);
        return $this->db->single();
    }
    public function savePenguranganFasilitas($idTransaksi, $pilihanFasilitasBaru, $totalPembayaranBaru)
    {
        $dtl = $this->detailTransaksi($idTransaksi);
        $insert = "INSERT INTO transaksi_pembaharuan (
        idTransaksiRefrensi,
        idUser,
        idTipeKamar,
        nomorKamar,
        namaTipeKamar,
        lamaSewa,
        pilihanDetailFasilitas,
        namaDiskon,
        potonganHarga,
        totalPembayaranNormal,
        totalPembayaran,
        awalSewa,
        akhirSewa,
        type,
        status,
        detailLainnya) VALUES (
        '{$idTransaksi}',
        '{$_SESSION['session_login']->idUser}',
        '{$dtl->idTipeKamar}',
        '{$dtl->nomorKamar}',
        '{$dtl->namaTipeKamar}',
        '{$dtl->lamaSewa}',
        '{$pilihanFasilitasBaru}',
        '',
        0,
        '{$totalPembayaranBaru}',
        '{$totalPembayaranBaru}',
        '{$dtl->awalSewa}',
        '{$dtl->awalSewa}',
        'Pengurangan Fasilitas',
        'Proses',
        '" . json_encode($_POST) . "')";
        // echo $insert;
        // exit;
        $this->db->query($insert);
        if ($this->db->returnExecute()) {
            $cekUser = "SELECT * FROM m_user WHERE idUser='{$_SESSION['session_login']->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();

            // notif wa

            $result = sendWhatsApp($infoUser->nomorTelepon, "===== Notification Pengurangan Fasilitas Kos46A =====
Terimakasih telah melakukan pengajuan pengurangan fasilitas, detail pengembalian anda sebesar " . formatRupiah($_POST['totalPengembalianValue']));


            $result = sendWhatsApp('087742036248', "===== Notification Pengurangan Fasilitas Kos46A =====
Terdapat pengajuan pengurangan fasilitas, sebesar " . formatRupiah($_POST['totalPengembalianValue'])) . " harap cek pengajuannya ";

            header('Location: ../view/Pesanan.php?tab=pembaharuan');
        }
    }
}

$homeM = new HomeModel();

// TRIGGER LOGOUT
if (isset($_GET['logOut']) && isset($_SESSION['session_login'])) {

    unset($_SESSION['session_login']);

    header('Location: ../view/Home.php');
}


if (isset($_POST['saveDetailPesanan'])) {
    // echo "<pre>";
    // var_dump($_SESSION);
    // var_dump($_POST);
    // var_dump($_GET);
    // exit;

    $homeM->savePesanan();
}


if (isset($_POST['saveDetailPesananPerpanjangan'])) {

    $homeM->savePesananPerpanjangan();
}


if (isset($_POST['BtnPenguranganFasilitas'])) {

    $arFasilitas = array();
    $fasilitas = (explode(',', (implode(',', $_POST['fasilitas']))));
    foreach ($fasilitas as $d) {
        $data = explode('|', $d)[0];
        array_push($arFasilitas, $data);
    }
    $arFasilitasMatang = implode(',', $arFasilitas);

    $idTransaksi = $_POST['idTransaksi'];
    $totalBayarUtuh = $_POST['totalPembayaranUtuh'];
    $pilihanFasilitasBaru = $arFasilitasMatang;
    $totalPengembalianValue = $_POST['totalPengembalianValue'];
    $totalPembayaranBaru = $totalBayarUtuh - $totalPengembalianValue;


    $homeM->savePenguranganFasilitas($idTransaksi, $pilihanFasilitasBaru, $totalPembayaranBaru);
    // $totalBayarUtuh = implode(',', ));
    echo "<pre>";
    var_dump($_POST);
}
