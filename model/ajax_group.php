<?php
include('homeModel.php');

if (isset($_POST['act'])) {
    if ($_POST['act'] == 'cekTanggalBooking') {
        $awalSewa = $_POST['tanggal'];
        $lamaSewa = $_POST['lamaSewa'];
        $idTipeKamar = base64_decode($_POST['idTipeKamar']);

        $html = "";
        $result = $homeM->cekKetersediaanKamar($awalSewa, $lamaSewa, $idTipeKamar);
        $html .= "<select name='kamar' id='kamar' required>
        <option value='' selected hidden>Pilih Nomor Kamar</option>";
        foreach ($result as $k => $v) {
            $html .= "<option value='" . $v->nomorKamar . "' " . $v->html . ">Nomor " . $v->nomorKamar . " status " . $v->ketersediaan . "</option>";
        }
        $html .= "</select>";


        echo json_encode($html);
    }
    if ($_POST['act'] == 'cekListDiskon') {
        $result = $homeM->searchDiskonKamar($_POST['namaDiskon']);
        if ($result) {
            echo json_encode(['status' => true, 'dataResult' => $result]);
        } else {
            echo json_encode(['status' => false]);
        }
    }
}
