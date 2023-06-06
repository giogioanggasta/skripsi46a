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

        $insert = "INSERT INTO m_tipekamar (namaTipeKamar,descTipeKamar,thumbnailKamar,idAdmin) VALUES ('{$tipeKamar}','{$_POST['descTipeKamar']}','{$namaGambar}','{$idAdmin}')";

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

            // INSERT HARGA
            $insertFoto = "INSERT INTO m_tipekamar_pengelolaan (idTipeKamar,namaTipeKamar,idAdmin,hargaTipeKamar) VALUES ('{$idTipeKamar}','{$first->namaTipeKamar}','{$idAdmin}','{$_POST['hargaTipeKamar']}')";
            $this->db->query($insertFoto);
            $this->db->returnExecute();



            flash('insert_alert', 'Berhasil menambah tipe kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah tipe kamar', 'red');
        }
        header('Location: ../view/Kelola.php');
        exit;
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

    public function saveFasilitas($idAdmin, $namaFasilitas, $namaGambar)
    {

        $insert = "INSERT INTO fasilitas (namaFasilitas,fotoFasilitas,idAdmin) VALUES ('{$namaFasilitas}','{$namaGambar}','{$idAdmin}')";

        $this->db->query($insert);

        if ($this->db->returnExecute()) {
            // CARI ID DATA KAMAR
            $cariFasilitasTerbaru = "SELECT * FROM fasilitas ORDER BY idFasilitas DESC";
            $this->db->query($cariFasilitasTerbaru);
            $first = $this->db->single();
            $idFasilitas = $first->idFasilitas;


            // INSERT HARGA
            $insertHargaFasilitas = "INSERT INTO fasilitas_pengelolaan (idFasilitas,namaFasilitas,idAdmin,hargaFasilitas) VALUES ('{$idFasilitas}','{$namaFasilitas}','{$idAdmin}','{$_POST['hargaFasilitas']}')";
            $this->db->query($insertHargaFasilitas);
            $this->db->returnExecute();

            flash('insert_alert', 'Berhasil menambah fasilitas', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah fasilitas', 'red');
        }
        header('Location: ../view/KelolaFasilitas.php');
    }

    public function saveDiskon($idAdmin, $namaDiskon, $descDiskon, $potonganHarga, $limitDiskon, $tglAwal, $tglAkhir, $namaGambar)
    {

        $insert = "INSERT INTO diskon (gambarDiskon,
        namaDiskon,
        descDiskon,
        potonganHarga,
        `limit`,
        tglAwal,
        tglAkhir,
        idAdmin
        ) VALUES (
        '{$namaGambar}',
        UPPER('{$namaDiskon}'),
        '{$descDiskon}',
        '{$potonganHarga}',
        '{$limitDiskon}',
        '{$tglAwal}',
        '{$tglAkhir}',
        '{$idAdmin}')";
        $this->db->query($insert);

        if ($this->db->returnExecute()) {

            flash('insert_alert', 'Berhasil menambah Diskon', 'green');
        } else {
            flash('insert_alert', 'Gagal menambah Diskon', 'red');
        }
        header('Location: ../view/KelolaDiskon.php');
    }

    public function updateTipeKamar($idAdmin, $tipeKamar, $namaGambar, $idTipeKamar)
    {
        // JIKA NAMA GAMBAR KOSONG
        if ($namaGambar == '') {
            $update = "UPDATE m_tipekamar SET descTipeKamar='{$_POST['descTipeKamar']}', namaTipeKamar = '{$tipeKamar}',idAdmin = '{$idAdmin}' WHERE idTipeKamar='{$idTipeKamar}'";
        } else {
            $update = "UPDATE m_tipekamar SET descTipeKamar='{$_POST['descTipeKamar']}',thumbnailKamar = '{$namaGambar}',namaTipeKamar = '{$tipeKamar}',idAdmin = '{$idAdmin}' WHERE idTipeKamar='{$idTipeKamar}'";
        }

        $this->db->query($update);

        if ($this->db->returnExecute()) {

            // UPLOAD GAMBAR DETAIL KAMAR TIPE KAMAR
            for ($i = 0; $i < count($_FILES['namaFoto']['name']); $i++) {

                $namaGambar = time() . "_" . $_FILES['namaFoto']['name'][$i];
                $simpanGambar =  move_uploaded_file($_FILES['namaFoto']['tmp_name'][$i], '../images/img-kamar/' . $namaGambar);
                if ($simpanGambar) {
                    $insertFoto = "INSERT INTO m_tipekamar_foto (idTipeKamar,namaFoto,idAdmin) VALUES ('{$idTipeKamar}','{$namaGambar}','{$idAdmin}')";
                    $this->db->query($insertFoto);
                    $this->db->returnExecute();
                }
            }
            // UPLOAD GAMBAR DETAIL KAMAR TIPE KAMAR

            // INSERT HARGA
            $insertFoto = "INSERT INTO m_tipekamar_pengelolaan (idTipeKamar,namaTipeKamar,idAdmin,hargaTipeKamar) VALUES ('{$idTipeKamar}','{$tipeKamar}','{$idAdmin}','{$_POST['hargaTipeKamar']}')";
            $this->db->query($insertFoto);
            $this->db->returnExecute();


            flash('insert_alert', 'Berhasil mengubah tipe kamar', 'green');
            header('Location: ../view/Kelola.php');
            exit;
        } else {
            flash('insert_alert', 'Gagal mengubah tipe kamar', 'red');
            header('Location: ../view/Kelola.php');
            exit;
        }
    }

    public function updateKamar($idAdmin, $nomorKamar, $idTipeKamar, $idKamar, $status)
    {
        // JIKA NAMA GAMBAR KOSONG

        $update = "UPDATE kamar SET
            idAdmin = '{$idAdmin}',
            idTipeKamar = '{$idTipeKamar}',
            nomorKamar  = '{$nomorKamar}',
            status  = '{$status}'
             WHERE idKamar='{$idKamar}'";


        $this->db->query($update);

        if ($this->db->returnExecute()) {
            flash('insert_alert', 'Berhasil mengubah tipe kamar', 'green');
        } else {
            flash('insert_alert', 'Gagal mengubah tipe kamar', 'red');
        }
        header('Location: ../view/KelolaKamar.php');
    }

    public function updateFasilitas($idAdmin, $namaFasilitas, $namaGambar, $idFasilitas)
    {
        // JIKA NAMA GAMBAR KOSONG
        if ($namaGambar == '') {
            $update = "UPDATE fasilitas SET namaFasilitas = '{$namaFasilitas}',idAdmin = '{$idAdmin}' WHERE idFasilitas ='{$idFasilitas}'";
        } else {
            $update = "UPDATE fasilitas SET fotoFasilitas = '{$namaGambar}',namaFasilitas = '{$namaFasilitas}',idAdmin = '{$idAdmin}' WHERE idFasilitas ='{$idFasilitas}'";
        }

        $this->db->query($update);

        if ($this->db->returnExecute()) {


            // INSERT HARGA
            $insertHargaFasilitas = "INSERT INTO fasilitas_pengelolaan (idFasilitas,namaFasilitas,idAdmin,hargaFasilitas) VALUES ('{$idFasilitas}','{$namaFasilitas}','{$idAdmin}','{$_POST['hargaFasilitas']}')";
            $this->db->query($insertHargaFasilitas);
            $this->db->returnExecute();

            flash('insert_alert', 'Berhasil mengubah fasilitas', 'green');
        } else {
            flash('insert_alert', 'Gagal mengubah fasilitas', 'red');
        }
        header('Location: ../view/KelolaFasilitas.php');
    }
    public function updateDiskon($idDiskon, $idAdmin, $namaDiskon, $descDiskon, $potonganHarga, $limitDiskon, $tglAwal, $tglAkhir, $namaGambar)
    {
        // JIKA NAMA GAMBAR KOSONG
        if ($namaGambar == '') {
            $update = "UPDATE diskon SET 
            namaDiskon = '{$namaDiskon}',
            descDiskon = '{$descDiskon}',
            potonganHarga = '{$potonganHarga}',
            `limit` = '{$limitDiskon}',
            `tglAwal` = '{$tglAwal}',
            `tglAkhir` = '{$tglAkhir}',
            idAdmin = '{$idAdmin}' 
            WHERE idDiskon ='{$idDiskon}'";
        } else {
            $update = "UPDATE diskon SET 
            namaDiskon = '{$namaDiskon}',
            descDiskon = '{$descDiskon}',
            potonganHarga = '{$potonganHarga}',
            `limit` = '{$limitDiskon}',
            `tglAwal` = '{$tglAwal}',
            `tglAkhir` = '{$tglAkhir}',
            `gambarDiskon` = '{$namaGambar}',
            idAdmin = '{$idAdmin}' 
            WHERE idDiskon ='{$idDiskon}'";
        }

        $this->db->query($update);

        if ($this->db->returnExecute()) {




            flash('insert_alert', 'Berhasil mengubah diskon', 'green');
        } else {
            flash('insert_alert', 'Gagal mengubah diskon', 'red');
        }
        header('Location: ../view/KelolaDiskon.php');
    }

    public function showKamar()
    {

        // CEK EMAIL
        $getAllKamar = "SELECT
        mtk.descTipeKamar,
        mtk.idTipeKamar,mtk.namaTipeKamar,mtk.thumbnailKamar,a.namaAdmin,
        ( SELECT z.hargaTipeKamar FROM m_tipekamar_pengelolaan z WHERE mtk.idTipeKamar = z.idTipeKamar ORDER BY z.created_at DESC LIMIT 1) hargaTipeKamar
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
        mtp.namaTipeKamar,
        mtp.idTipeKamar
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
        mf.idFasilitas,mf.namaFasilitas,mf.fotoFasilitas,a.namaAdmin,
        ( SELECT z.hargaFasilitas FROM fasilitas_pengelolaan z WHERE mf.idFasilitas = z.idFasilitas ORDER BY z.created_at DESC LIMIT 1) hargaFasilitas
    FROM
        fasilitas mf
        LEFT JOIN admin a ON mf.idAdmin = a.idAdmin ORDER BY mf.idFasilitas DESC";
        $this->db->query($getAllFasilitas);

        return $this->db->resultAll();
    }

    public function showDiskon()
    {

        // CEK EMAIL
        $getAllFasilitas = "SELECT
        d.idDiskon,d.namaDiskon,d.descDiskon,d.limit,d.gambarDiskon,a.namaAdmin,d.potonganHarga,d.tglAwal,d.tglAkhir
    FROM
        diskon d
        LEFT JOIN admin a ON d.idAdmin = a.idAdmin ORDER BY d.idDiskon DESC";
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

        $cariNomorKamar = "SELECT * FROM kamar WHERE idKamar = '{$idKamar}'";
        $this->db->query($cariNomorKamar);

        return $this->db->single();
    }

    public function searchFasilitas($idFasilitas)
    {

        $cariFasilitas = "SELECT * FROM fasilitas WHERE idFasilitas = '{$idFasilitas}'";
        $this->db->query($cariFasilitas);

        return $this->db->single();
    }
    public function searchDiskon($idDiskon)
    {

        $cariDiskon = "SELECT * FROM diskon WHERE idDiskon = '{$idDiskon}'";
        $this->db->query($cariDiskon);

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
        $cariGambar = "SELECT * FROM fasilitas WHERE idFasilitas = '{$idFasilitas}'";
        $this->db->query($cariGambar);

        $cekGambar = $this->db->single();

        if ($cekGambar) {
            unlink('../images/thumbnail-fasilitas/' . $cekGambar->fotoFasilitas);

            $delete = "DELETE FROM fasilitas WHERE idFasilitas ='{$idFasilitas}'";
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
    public function hapusDiskon($idDiskon)
    {
        $cariGambar = "SELECT * FROM diskon WHERE idDiskon = '{$idDiskon}'";
        $this->db->query($cariGambar);

        $cekGambar = $this->db->single();

        if ($cekGambar) {
            unlink('../images/thumbnail-diskon/' . $cekGambar->gambarDiskon);

            $delete = "DELETE FROM diskon WHERE idDiskon ='{$idDiskon}'";
            $this->db->query($delete);
            if ($this->db->returnExecute()) {
                flash('insert_alert', 'Berhasil menghapus diskon', 'green');
            } else {
                flash('insert_alert', 'Gagal menghapus diskon', 'red');
            }
        } else {
            flash('insert_alert', 'Gagal menghapus diskon', 'red');
        }



        header('Location: ../view/KelolaDiskon.php');
    }

    public function showAllFotoKamar($idTipeKamar)
    {
        $cariGambar = "SELECT * FROM m_tipekamar_foto WHERE idTipeKamar = '{$idTipeKamar}'";

        $this->db->query($cariGambar);
        return $this->db->resultAll();
    }

    public function hapusFotoDetailTipeKamar($idFotoKamar, $idTipeKamar)
    {

        $cariGambar = "SELECT * FROM m_tipekamar_foto WHERE idTipeKamar = '{$idTipeKamar}'";
        $this->db->query($cariGambar);
        $total = count($this->db->resultAll());
        if ($total <= 1) {
            flash('insert_alert', 'tidak boleh menghapus gambar pada detail kamar yang tinggal 1', 'red');
            // var_dump($_SESSION);exit;
            header('Location: ../view/Kelola.php');
            exit;
        } else {
            $cariGambar2 = "SELECT * FROM m_tipekamar_foto WHERE idFotoKamar = '{$idFotoKamar}'";
            $this->db->query($cariGambar2);
            $get = $this->db->single();
            unlink('../images/img-kamar/' . $get->namaFoto);

            $delete = "DELETE FROM m_tipekamar_foto WHERE idFotoKamar='{$idFotoKamar}'";
            $this->db->query($delete);
            $this->db->returnExecute();
            flash('insert_alert', 'Berhasil menghapus detail kamar', 'green');
            header('Location: ../view/Kelola.php');
            exit;
        }
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

    if (!(file_exists('../images/thumbnail-fasilitas'))) {
        mkdir('../images/thumbnail-fasilitas', 0777, true);
    }

    $namaFasilitas = $_POST['namaFasilitas'];
    $idAdmin = $_POST['idAdmin'];
    $namaGambar = time() . "_" . $_FILES['fileFasilitas']['name'];
    $simpanGambar =  move_uploaded_file($_FILES['fileFasilitas']['tmp_name'], '../images/thumbnail-fasilitas/' . $namaGambar);

    $kelolaM->saveFasilitas($idAdmin, $namaFasilitas, $namaGambar);
}
if (isset($_POST['btnInsertDiskon'])) {

    if (!(file_exists('../images/thumbnail-diskon'))) {
        mkdir('../images/thumbnail-diskon', 0777, true);
    }

    $namaDiskon = $_POST['namaDiskon'];
    $descDiskon = $_POST['descDiskon'];
    $potonganHarga = $_POST['potonganHarga'];
    $limitDiskon = $_POST['limitDiskon'];
    $tglAwal = $_POST['tglAwal'];
    $tglAkhir = $_POST['tglAkhir'];
    $idAdmin = $_POST['idAdmin'];

    $namaGambar = time() . "_" . $_FILES['gambarDiskon']['name'];
    $simpanGambar =  move_uploaded_file($_FILES['gambarDiskon']['tmp_name'], '../images/thumbnail-diskon/' . $namaGambar);

    $kelolaM->saveDiskon($idAdmin, $namaDiskon, $descDiskon, $potonganHarga, $limitDiskon, $tglAwal, $tglAkhir, $namaGambar);
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

    if (!(file_exists('../images/thumbnail-fasilitas'))) {
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

            if (file_exists('../images/thumbnail-fasilitas/' .  $cekGambarNow->fotoFasilitas)) {

                unlink('../images/thumbnail-fasilitas/' .  $cekGambarNow->fotoFasilitas);
            }

            $namaGambarBaru = time() . "_" . $_FILES['fileFasilitas']['name'];
            $simpanGambar =  move_uploaded_file($_FILES['fileFasilitas']['tmp_name'], '../images/thumbnail-fasilitas/' . $namaGambarBaru);
            $kelolaM->updateFasilitas($idAdmin, $namaFasilitas, $namaGambarBaru, $idFasilitas);
        } else {
            flash('insert_alert', 'Gagal mengubah fasilitas', 'red');
        }
    }
}
if (isset($_POST['btnUpdateDiskon'])) {

    if (!(file_exists('../images/thumbnail-diskon'))) {
        mkdir('../images/thumbnail-diskon', 0777, true);
    }

    $idDiskon = $_POST['idDiskon'];
    $namaDiskon = $_POST['namaDiskon'];
    $descDiskon = $_POST['descDiskon'];
    $potonganHarga = $_POST['potonganHarga'];
    $limitDiskon = $_POST['limitDiskon'];
    $tglAwal = $_POST['tglAwal'];
    $tglAkhir = $_POST['tglAkhir'];
    $idAdmin = $_POST['idAdmin'];


    // JIKA TIDAK ADA FILE GAMBAR KAMAR
    if ($_FILES['gambarDiskon']['name'] == '') {

        $namaGambar = '';
        $kelolaM->updateDiskon($idDiskon, $idAdmin, $namaDiskon, $descDiskon, $potonganHarga, $limitDiskon, $tglAwal, $tglAkhir, $namaGambar);
    } else {

        $cekGambarNow = $kelolaM->searchDiskon($idDiskon);

        if ($cekGambarNow) {

            if (file_exists('../images/thumbnail-diskon/' .  $cekGambarNow->gambarDiskon)) {

                unlink('../images/thumbnail-diskon/' .  $cekGambarNow->gambarDiskon);
            }

            $namaGambarBaru = time() . "_" . $_FILES['gambarDiskon']['name'];
            $simpanGambar =  move_uploaded_file($_FILES['gambarDiskon']['tmp_name'], '../images/thumbnail-diskon/' . $namaGambarBaru);
            $kelolaM->updateDiskon($idDiskon, $idAdmin, $namaDiskon, $descDiskon, $potonganHarga, $limitDiskon, $tglAwal, $tglAkhir, $namaGambarBaru);
        } else {
            flash('insert_alert', 'Gagal mengubah diskon', 'red');
        }
    }
}

if (isset($_POST['btnUpdateKamar'])) {


    $kelolaM->updateKamar($_POST['idAdmin'], $_POST['nomorKamar'], $_POST['tipeKamar'], $_POST['idKamar'], $_POST['status']);
}
// ACTION HAPUS
if (isset($_GET['actTipeKamar'])) {
    if ($_GET['actTipeKamar'] == 'hapusTipeKamar') {
        $kelolaM->hapusTipeKamar($_GET['idTipeKamar']);
    } else if ($_GET['actTipeKamar'] == 'hapusFotoDetailTipeKamar') {
        $kelolaM->hapusFotoDetailTipeKamar($_GET['idFotoKamar'], $_GET['idTipeKamar']);
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

if (isset($_GET['actDiskon'])) {
    if ($_GET['actDiskon'] == 'hapusDiskon') {
        $kelolaM->hapusDiskon($_GET['idDiskon']);
    }
}
