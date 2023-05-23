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
            // CARI ID DATA KAMAR
            $cariTipeKamarTerbaru = "SELECT * FROM m_tipekamar ORDER BY idTipeKamar DESC";
            $this->db->query($cariTipeKamarTerbaru);
            $first = $this->db->single();
            $idTipeKamar = $first->idTipeKamar;

            for ($i = 0; $i < count($_FILES['namaFoto']['name']); $i++) {
                $namaGambar = time() . "_" . $_FILES['namaFoto']['name'][$i];
                $simpanGambar =  move_uploaded_file($_FILES['namaFoto']['tmp_name'][$i], '../images/img-kamar/' . $namaGambar);
                if ($simpanGambar) {
                    $insertFoto = "INSERT INTO m_tipekamar_foto (idTipeKamar,namaFoto,idAdmin) VALUES ('{$idTipeKamar}','{$namaGambar}','{$idAdmin}')";
                    $this->db->query($insertFoto);
                    $this->db->returnExecute();
                }
            }



            flash('insert_alert', 'Berhasil menambah tipe kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah tipe kamar', 'red');
        }
        header('Location: ../view/Kelola.php');
    }

    public function saveKamar($nomorKamar, $idAdmin, $tipeKamar, $status)
    {

        // MEMASUKKAN DATA KAMAR
        $insert = "INSERT INTO kamar (idAdmin,idTipeKamar,nomorKamar, status) VALUES ('{$idAdmin}','{$tipeKamar}','{$nomorKamar}','{$status}')";
        $this->db->query($insert);
        // BERHASIL MEMASUKKAN DATA KAMAR
        if ($this->db->returnExecute()) {






            flash('insert_alert', 'Berhasil menambah kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah kamar', 'red');
        }
        header('Location: ../view/KelolaKamar.php');
    }

    public function saveFasilitas($idAdmin, $namaFasilitas)
    {

        $insert = "INSERT INTO m_fasilitas (namaFasilitas,thumbnailFasilitas,idAdmin) VALUES ('{$namaFasilitas}','{$namaGambar}','{$idAdmin}')";

        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil menambah fasilitas', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah fasilitas', 'red');
        }
        header('Location: ../view/KelolaFasilitas.php');
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

    public function updateFasilitas($idAdmin, $namaFasilitas, $namaGambar, $idFasilitas)
    {
        // JIKA NAMA GAMBAR KOSONG
        if ($namaGambar == '') {
            $update = "UPDATE m_fasilitas SET namaFasilitas = '{$namaFasilitas}',idAdmin = '{$idAdmin}' WHERE idFasilitas ='{$idFasilitas}'";
        } else {
            $update = "UPDATE m_fasilitas SET thumbnailFasilitas = '{$namaGambar}',namaFasilitas = '{$namaFasilitas}',idAdmin = '{$idAdmin}' WHERE idFasilitas ='{$idFasilitas}'";
        }

        $this->db->query($update);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil mengubah fasilitas', 'green');
        } else {
            flash('insert_alert', 'Gagal mengubah fasilitas', 'red');
        }
        header('Location: ../view/KelolaFasilitas.php');
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
        k.idKamar,
        k.nomorKamar,
        k.status,
        a.namaAdmin,
        mtp.namaTipeKamar
    FROM
        kamar k
        LEFT JOIN admin a ON k.idAdmin = a.idAdmin 
        LEFT JOIN m_tipekamar mtp ON k.idTipeKamar = mtp.idTipeKamar
    ORDER BY
        k.idKamar DESC";
        $this->db->query($getAllNomorKamar);

        return $this->db->resultAll();
    }

    public function showFasilitas()
    {

        // CEK EMAIL
        $getAllFasilitas = "SELECT
        mf.idFasilitas,mf.namaFasilitas,mf.thumbnailFasilitas,a.namaAdmin
    FROM
        m_fasilitas mf
        LEFT JOIN admin a ON mf.idAdmin = a.idAdmin ORDER BY mf.idFasilitas DESC";
        $this->db->query($getAllFasilitas);

        return $this->db->resultAll();
    }

    public function searchKamar($idTipeKamar)
    {

        $cariKamar = "SELECT * FROM m_tipekamar WHERE idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cariKamar);

        return $this->db->single();
    }

    public function searchNomorKamar($idKamar)
    {

        $cariNomorKamar = "SELECT * FROM m_kamar WHERE idKamar = '{$idKamar}'";
        $this->db->query($cariNomorKamar);

        return $this->db->single();
    }

    public function searchFasilitas($idFasilitas)
    {

        $cariFasilitas = "SELECT * FROM m_fasilitas WHERE idFasilitas = '{$idFasilitas}'";
        $this->db->query($cariFasilitas);

        return $this->db->single();
    }

    public function hapusTipeKamar($idTipeKamar)
    {
        $cariGambar = "SELECT * FROM m_tipekamar WHERE idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cariGambar);
        $cekGambar = $this->db->single();

        $cariKamar = "SELECT * FROM kamar WHERE idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cariKamar);
        $cekKamar = $this->db->single();



        if ($cekGambar && !$cekKamar) {
            unlink('../images/thumbnail/' . $cekGambar->thumbnailKamar);


            $cariGambar = "SELECT * FROM m_tipekamar_foto WHERE idTipeKamar = '{$cekGambar->idTipeKamar}'";
            $this->db->query($cariGambar);
            foreach ($this->db->resultAll() as $k => $d) {

                unlink('../images/img-kamar/' . $d->namaFoto);

                $delete = "DELETE FROM m_tipekamar_foto WHERE idFotoKamar='{$d->idFotoKamar}'";
                $this->db->query($delete);
                $this->db->returnExecute();
            }

            $delete = "DELETE FROM m_tipekamar WHERE idTipeKamar='{$idTipeKamar}'";
            $this->db->query($delete);
            if ($this->db->returnExecute()) {


                flash('insert_alert', 'Berhasil menghapus tipe kamar', 'green');
            } else {
                flash('insert_alert', 'Gagal menghapus tipe kamar', 'red');
            }
        } else {
            flash('insert_alert', 'Gagal menghapus tipe kamar, karena masih ada Kamar yang memakai tipe tersebut', 'red');
        }



        header('Location: ../view/Kelola.php');
    }

    public function hapusKamar($idKamar)
    {


        $delete = "DELETE FROM kamar WHERE idKamar='{$idKamar}'";
        $this->db->query($delete);
        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil menghapus kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal menghapus kamar', 'red');
        }
        header('Location: ../view/KelolaKamar.php');
    }

    public function hapusFasilitas($idFasilitas)
    {
        $cariGambar = "SELECT * FROM m_fasilitas WHERE idFasilitas = '{$idFasilitas}'";
        $this->db->query($cariGambar);

        $cekGambar = $this->db->single();

        if ($cekGambar) {
            unlink('../images/thumbnail/' . $cekGambar->thumbnailFasilitas);

            $delete = "DELETE FROM m_fasilitas WHERE idFasilitas ='{$idFasilitas}'";
            $this->db->query($delete);
            if ($this->db->returnExecute()) {
                flash('insert_alert', 'Berhasil menghapus fasilitas', 'green');
            } else {
                flash('insert_alert', 'Gagal menghapus fasilitas', 'red');
            }
        } else {
            flash('insert_alert', 'Gagal menghapus fasilitas', 'red');
        }



        header('Location: ../view/KelolaFasilitas.php');
    }
}

$kelolaM = new kelolaModel();


// TRIGGER SAVE
if (isset($_POST['btnInsertTipeKamar'])) {

    if (!(file_exists('../images/thumbnail'))) {
        mkdir('../images/thumbnail', 0777, true);
    }
    if (!(file_exists('../images/img-kamar'))) {
        mkdir('../images/img-kamar', 0777, true);
    }
    $tipeKamar = $_POST['tipeKamar'];
    $idAdmin = $_POST['idAdmin'];
    $namaGambar = time() . "_" . $_FILES['fileTipeKamar']['name'];
    $simpanGambar =  move_uploaded_file($_FILES['fileTipeKamar']['tmp_name'], '../images/thumbnail/' . $namaGambar);

    $kelolaM->saveTipeKamar($idAdmin, $tipeKamar, $namaGambar);
}

if (isset($_POST['btnInsertKamar'])) {


    $nomorKamar = $_POST['nomorKamar'];
    $idAdmin = $_POST['idAdmin'];
    $tipeKamar = $_POST['tipeKamar'];
    $status = $_POST['status'];

    $kelolaM->saveKamar($nomorKamar, $idAdmin, $tipeKamar, $status);
}

if (isset($_POST['btnInsertFasilitas'])) {

    if (!(file_exists('../images/thumbnail'))) {
        mkdir('../images/thumbnail', 0777, true);
    }

    $namaFasilitas = $_POST['namaFasilitas'];
    $idAdmin = $_POST['idAdmin'];
    $namaGambar = time() . "_" . $_FILES['fileFasilitas']['name'];
    $simpanGambar =  move_uploaded_file($_FILES['fileFasilitas']['tmp_name'], '../images/thumbnail/' . $namaGambar);

    $kelolaM->saveFasilitas($idAdmin, $namaFasilitas, $namaGambar);
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

if (isset($_POST['btnUpdateFasilitas'])) {

    if (!(file_exists('../images/thumbnail'))) {
        mkdir('../images/thumbnail', 0777, true);
    }

    $namaFasilitas = $_POST['namaFasilitas'];
    $idAdmin = $_POST['idAdmin'];
    $idFasilitas = $_POST['idFasilitas'];

    // JIKA TIDAK ADA FILE GAMBAR KAMAR
    if ($_FILES['fileFasilitas']['name'] == '') {

        $namaGambar = '';
        $kelolaM->updateFasilitas($idAdmin, $namaFasilitas, $namaGambar, $idFasilitas);
    } else {

        $cekGambarNow = $kelolaM->searchFasilitas($idFasilitas);

        if ($cekGambarNow) {

            unlink('../images/thumbnail/' .  $cekGambarNow->thumbnailFasilitas);

            $namaGambarBaru = time() . "_" . $_FILES['fileFasilitas']['name'];
            $simpanGambar =  move_uploaded_file($_FILES['fileFasilitas']['tmp_name'], '../images/thumbnail/' . $namaGambarBaru);
            $kelolaM->updateTipeKamar($idAdmin, $namaFasilitas, $namaGambarBaru, $idFasilitas);
        } else {
            flash('insert_alert', 'Gagal mengubah fasilitas', 'red');
        }
    }
}

// ACTION HAPUS
if (isset($_GET['actTipeKamar'])) {
    if ($_GET['actTipeKamar'] == 'hapusTipeKamar') {
        $kelolaM->hapusTipeKamar($_GET['idTipeKamar']);
    }
}

if (isset($_GET['actKamar'])) {
    if ($_GET['actKamar'] == 'hapusKamar') {
        $kelolaM->hapusKamar($_GET['idKamar']);
    }
}

if (isset($_GET['actFasilitas'])) {
    if ($_GET['actFasilitas'] == 'hapusFasilitas') {
        $kelolaM->hapusFasilitas($_GET['idFasilitas']);
    }
}
