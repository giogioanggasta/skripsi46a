<?php

require_once '../libraries/Database.php';
require_once '../helper/flash_session.php';

class laporanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showLaporanFasilitas()
    {

        $select = "SELECT
        fp.idPengelolaan,
        fp.idFasilitas,
        fp.namaFasilitas,
        fp.hargaFasilitas,
        fp.created_at,
        ad.namaAdmin
    FROM
    fasilitas_pengelolaan fp
    LEFT JOIN admin ad ON fp.idAdmin = ad.idAdmin ORDER BY fp.created_at DESC";
        $this->db->query($select);

        return $this->db->resultAll();
    }

    public function exportLaporanFasilitas()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Fasilitas_" . date('d-m-Y') . ".xls");
        $html = "<table border='1'>";


        $html .= "
        <tr>
          <th>ID Pengelolaan</th>
          <th>ID Fasilitas</th>
          <th>Nama Fasilitas</th>
          <th>Harga Fasilitas</th>
          <th>Tanggal Perubahan</th>
          <th>Diubah Oleh</th>
        </tr>";
        foreach ($this->showLaporanFasilitas() as $k => $v) {

            $html .= "<tr>
            <td>" . $v->idPengelolaan . "</td>
            <td>" . $v->idFasilitas . "</td>
            <td>" . $v->namaFasilitas . "</td>
            <td>" . formatRupiah($v->hargaFasilitas) . "</td>
            <td>" . formatTgl($v->created_at) . " " . formatWaktu($v->created_at) . " </td>
            <td>" . $v->namaAdmin . "</td>
          </tr>
";
        }
        $html .= "</table>";
        echo $html;
        exit;
    }



    public function showLaporanTipeKamar()
    {

        $select = "SELECT
        mtp.idPengelolaan,
        mtp.idTipeKamar,
        mtp.namaTipeKamar,
        mtp.hargaTipeKamar,
        mtp.created_at,
        ad.namaAdmin
    FROM
    m_tipekamar_pengelolaan mtp
    LEFT JOIN admin ad ON mtp.idAdmin = ad.idAdmin ORDER BY mtp.created_at DESC";
        $this->db->query($select);

        return $this->db->resultAll();
    }

    public function exportLaporanTipeKamar()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Tipe Kamar_" . date('d-m-Y') . ".xls");
        $html = "<table border='1'>";


        $html .= "
        <tr>
        <th>ID Pengelolaan</th>
        <th>ID Tipe Kamar</th>
        <th>Nama Tipe Kamar</th>
        <th>Harga Tipe Kamar</th>
        <th>Tanggal Perubahan</th>
        <th>Diubah Oleh</th>
        </tr>";
        foreach ($this->showLaporanTipeKamar() as $k => $v) {

            $html .= "<tr>
            <td>" . $v->idPengelolaan . "</td>
            <td>" . $v->idTipeKamar . "</td>
            <td>" . $v->namaTipeKamar . "</td>
            <td>" . formatRupiah($v->hargaTipeKamar) . "</td>
            <td>" . formatTgl($v->created_at) . " " . formatWaktu($v->created_at) . " </td>
            <td>" . $v->namaAdmin . "</td>
          </tr>
";
        }
        $html .= "</table>";
        echo $html;
        exit;
    }
}

$laporanM = new laporanModel();
