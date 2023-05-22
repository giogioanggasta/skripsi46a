<?php

require_once '../libraries/Database.php';
require_once '../helper/flash_session.php';

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
        } else {
            flash('insert_alert', 'Gagal menambah tipe kamar', 'red');
        }
        header('Location: ../view/Kelola.php');
    }

    public function saveKamar($idAdmin, $kamar)
    {

        $insert = "INSERT INTO m_kamar (nomorKamar, status, idAdmin) VALUES ('{$nomorKamar}','{$status}','{$idAdmin}')";

        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil menambah kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah kamar', 'red');
        }
        header('Location: ../view/KelolaKamar.php');
    }

    public function updateTipeKamar($idAdmin, $tipeKamar, $namaGambar, $idTipeKamar)
    {
        // JIKA NAMA GAMBAR KOSONG
        if ($namaGambar == '') {
            $update = "UPDATE m_tipekamar SET namaTipeKamar = '{$tipeKamar}',idAdmin = '{$idAdmin}' WHERE idTipeKamar='{$idTipeKamar}'";
        } else {
            $update = "UPDATE m_tipekamar SET thumbnailKamar = '{$namaGambar}',namaTipeKamar = '{$tipeKamar}',idAdmin = '{$idAdmin}' WHERE idTipeKamar='{$idTipeKamar}'";
        }

        $this->db->query($update);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil mengubah tipe kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal mengubah tipe kamar', 'red');
        }
        header('Location: ../view/Kelola.php');
    }

    public function updateKamar($idAdmin, $nomorKamar, $status, $idKamar)
    {
        // JIKA NAMA GAMBAR KOSONG
        if ($namaGambar == '') {
            $update = "UPDATE m_kamar SET nomorKamar = '{$nomorKamar}',idAdmin = '{$idAdmin}' WHERE idTipeKamar='{$idTipeKamar}'";
        } else {
            $update = "UPDATE m_kamar SET thumbnailKamar = '{$namaGambar}',namaTipeKamar = '{$tipeKamar}',idAdmin = '{$idAdmin}' WHERE idTipeKamar='{$idTipeKamar}'";
        }

        $this->db->query($update);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil mengubah tipe kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal mengubah tipe kamar', 'red');
        }
        header('Location: ../view/Kelola.php');
    }

    public function showKamar()
    {

        // CEK EMAIL
        $getAllKamar = "SELECT
        mtk.idTipeKamar,mtk.namaTipeKamar,mtk.thumbnailKamar,a.namaAdmin
    FROM
        m_tipekamar mtk
        LEFT JOIN admin a ON mtk.idAdmin = a.idAdmin ORDER BY mtk.idTipeKamar DESC";
        $this->db->query($getAllKamar);

        return $this->db->resultAll();
    }

    public function showNomorKamar()
    {

        // CEK EMAIL
        $getAllNomorKamar = "SELECT
        k.idKamar,k.nomorKamar,k.status,a.namaAdmin
    FROM
        m_kamar k
        LEFT JOIN admin a ON k.idAdmin = a.idAdmin ORDER BY k.idKamar DESC";
        $this->db->query($getAllNomorKamar);

        return $this->db->resultAll();
    }

    public function searchKamar($idTipeKamar)
    {

        $cariKamar = "SELECT * FROM m_tipekamar WHERE idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cariKamar);

        return $this->db->single();
    }

    public function hapusTipeKamar($idTipeKamar)
    {
        $cariGambar = "SELECT * FROM m_tipekamar WHERE idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cariGambar);

        $cekGambar = $this->db->single();

        if ($cekGambar) {
            unlink('../images/thumbnail/' . $cekGambar->thumbnailKamar);

            $delete = "DELETE FROM m_tipekamar WHERE idTipeKamar='{$idTipeKamar}'";
            $this->db->query($delete);
            if ($this->db->returnExecute()) {
                flash('insert_alert', 'Berhasil menghapus tipe kamar', 'green');
            } else {
                flash('insert_alert', 'Gagal menghapus tipe kamar', 'red');
            }
        } else {
            flash('insert_alert', 'Gagal menghapus tipe kamar', 'red');
        }



        header('Location: ../view/Kelola.php');
    }

    public function hapusKamar($idKamar)
    {
        $cariGambar = "SELECT * FROM kamar WHERE idKamar = '{$idKamar}'";
        $this->db->query($cariGambar);

            $delete = "DELETE FROM kamar WHERE idKamar='{$idKamar}'";
            $this->db->query($delete);
            if ($this->db->returnExecute()) {
                flash('insert_alert', 'Berhasil menghapus kamar', 'green');
            } else {
                flash('insert_alert', 'Gagal menghapus kamar', 'red');
            }
        header('Location: ../view/KelolaKamar.php');
    }
}

$kelolaM = new kelolaModel();


// TRIGGER SAVE
if (isset($_POST['btnInsertTipeKamar'])) {

    if (!(file_exists('../images/thumbnail'))) {
        mkdir('../images/thumbnail', 0777, true);
    }

    $tipeKamar = $_POST['tipeKamar'];
    $idAdmin = $_POST['idAdmin'];
    $namaGambar = time() . "_" . $_FILES['fileTipeKamar']['name'];
    $simpanGambar =  move_uploaded_file($_FILES['fileTipeKamar']['tmp_name'], '../images/thumbnail/' . $namaGambar);

    $kelolaM->saveTipeKamar($idAdmin, $tipeKamar, $namaGambar);
}

if (isset($_POST['btnInsertKamar'])) {

    $kamar = $_POST['kamar'];
    $admin = $_POST['admin'];

    $kelolaM->saveTipeKamar($idAdmin, $kamar);
}

// ACTION UPDATE
if (isset($_POST['btnUpdateTipeKamar'])) {

    if (!(file_exists('../images/thumbnail'))) {
        mkdir('../images/thumbnail', 0777, true);
    }

    $tipeKamar = $_POST['tipeKamar'];
    $idAdmin = $_POST['idAdmin'];
    $idTipeKamar = $_POST['idTipeKamar'];

    // JIKA TIDAK ADA FILE GAMBAR KAMAR
    if ($_FILES['fileTipeKamar']['name'] == '') {

        $namaGambar = '';
        $kelolaM->updateTipeKamar($idAdmin, $tipeKamar, $namaGambar, $idTipeKamar);
    } else {

        $cekGambarNow = $kelolaM->searchKamar($idTipeKamar);

        if ($cekGambarNow) {

            unlink('../images/thumbnail/' .  $cekGambarNow->thumbnailKamar);

            $namaGambarBaru = time() . "_" . $_FILES['fileTipeKamar']['name'];
            $simpanGambar =  move_uploaded_file($_FILES['fileTipeKamar']['tmp_name'], '../images/thumbnail/' . $namaGambarBaru);
            $kelolaM->updateTipeKamar($idAdmin, $tipeKamar, $namaGambarBaru, $idTipeKamar);
        } else {
            flash('insert_alert', 'Gagal mengubah tipe kamar', 'red');
        }
    }
}

// ACTION HAPUS
if (isset($_GET['actTipeKamar'])) {
    if ($_GET['actTipeKamar'] == 'hapusTipeKamar') {
        $kelolaM->hapusTipeKamar($_GET['idTipeKamar']);
    }
}
