<?php

require_once '../libraries/Database.php';
require_once '../helper/flash_session.php';

class dataModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showDataTransaksi()
    {

        $select = "SELECT
        -- INFO USER
        u.idUser,
            u.namaUser,
            u.email,
            u.jenisKelamin,
            u.nomorTelepon,
        -- 	INFO DETAIL KAMAR
        t.idTransaksi,
        t.namaTipeKamar,
            t.nomorKamar,
            t.pilihanDetailFasilitas,
            
        -- 	INFO WAKTU DETAIL KAMAR
        t.tanggalWaktuTransaksi,
            t.lamaSewa,
            t.awalSewa,
            t.akhirSewa,
            
        -- 	INFO PEMBAYARAN
        t.totalPembayaran,
        t.totalPembayaranNormal,
        t.namaDiskon,
        t.potonganHarga,
            t.buktiPembayaran,
            t.`status`
            
        FROM
            `transaksi` t
            LEFT JOIN m_user u ON t.idUser = u.idUser
            
        ";
        $this->db->query($select);

        return $this->db->resultAll();
    }

    public function exportDataTransaksi()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Transaksi_" . date('d-m-Y') . ".xls");
        $html = "<table border='1'>";


        $html .= "
        <tr>
                <th>ID User</th>
                <th>Nama User</th>
                <th>Email User</th>
                <th>Nomor Telp User</th>
                <th>Jenis Kelamin User</th>
                <th>ID Transaksi</th>
                <th>Nama Tipe Kamar</th>
                <th>Nomor Kamar</th>
                <th>Fasilitas Kamar</th>
                <th>Tgl Transaksi</th>
                <th>Lama Sewa</th>
                <th>Awal Sewa</th>
                <th>Akhir Sewa</th>                
                <th>Kode Diskon</th>
                <th>Potongan Harga Diskon</th>
                <th>Total Pembayaran Normal</th>
                <th>Total Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
              </tr>";
        foreach ($this->showDataTransaksi() as $k => $x) {

            $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $urlBuktiBayar = str_replace('view/DataExport.php', 'images/bukti-bayar/', $actual_link) . $x->buktiPembayaran;

            $html .= " <tr>
            <td>" . $x->idUser . "</td>
            <td>" . $x->namaUser . "</td>
            <td>" . $x->email . "</td>
            <td>" . $x->nomorTelepon . "</td>
            <td>" . $x->jenisKelamin . "</td>
            <td>" . $x->idTransaksi . "</td>
            <td>" . $x->namaTipeKamar . "</td>
            <td>" . $x->nomorKamar . "</td>
            <td>" . $x->pilihanDetailFasilitas . "</td>
            <td>" . ($x->tanggalWaktuTransaksi). "</td>
            <td>" . $x->lamaSewa . "</td>
            <td>" . ($x->awalSewa) . "</td>
            <td>" . ($x->akhirSewa) . "</td>
            <td>" . ($x->namaDiskon) . "</td>
            <td>" . formatRupiah($x->potonganHarga) . "</td>
            <td>" . formatRupiah($x->totalPembayaranNormal) . "</td>
            <td>" . formatRupiah($x->totalPembayaran) . "</td>
            <td><a target=\"_blank\" style=\"font-size: 12px;\" href=\"$urlBuktiBayar\">" . $urlBuktiBayar . "</a></td>
            <td>" . $x->status . "</td>
          </tr>
";
        }
        $html .= "</table>";
        echo $html;
        exit;
    }
    public function showDataUser()
    {
        $select = "SELECT 
        u.idUser,
        u.namaUser,
        u.jenisKelamin,
        u.tanggalLahir,
        u.nomorTelepon,
        u.email
        FROM 
        m_user u";

        $this->db->query($select);

        return $this->db->resultAll();
    }

    public function exportDataUser()
    {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Fasilitas_" . date('d-m-Y') . ".xls");
        $html = "<table border='1'>";


        $html .= "
        <tr>
        <th>ID Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Jenis Kelamin Pelanggan</th>
        <th>Tanggal Lahir Pelanggan</th>
        <th>Nomor Telp Pelanggan</th>
        <th>Email</th>
              </tr>";
        foreach ($this->showDataUser() as $k => $x) {

            $html .= "<tr>
            <td>" . $x->idUser . "</td>
            <td>" . $x->namaUser . "</td>
            <td>" . $x->jenisKelamin . "</td>
            <td>" . ($x->tanggalLahir) . "</td>
            <td>" . $x->nomorTelepon . "</td>
            <td>" . $x->email . "</td>
            </tr>
            ";
        }
        $html .= "</table>";
        echo $html;
        exit;
    }
}

$dataM = new dataModel();
