<?php

require_once '../libraries/Database.php';
require_once '../helper/flash_session.php';

class transaksiModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showTransaksi($status)
    {
        $status = implode("','", $status);
        $select = " SELECT
        t.idTransaksi,
       u.namaUser,
       t.nomorKamar,
       t.namaTipeKamar,
       t.tanggalWaktuTransaksi,
       t.lamaSewa,
       t.buktiPembayaran,
       t.totalPembayaran,
       t.awalSewa,
       t.akhirSewa,
       t.pilihanDetailFasilitas,
       t.status
       
       
   FROM
       `transaksi` t
       LEFT JOIN m_user u ON t.idUser = u.idUser
       
       WHERE t.`status` IN ('{$status}')";
        $this->db->query($select);

        return $this->db->resultAll();
    }

    public function rejectTrans($idTransaksi, $reason)
    {

        $update = "UPDATE transaksi SET status='Ditolak',reason='{$reason}',idAdmin='{$_SESSION['admin_session_login']->idAdmin}' WHERE idTransaksi = '{$idTransaksi}'";
        $this->db->query($update);

        if ($this->db->returnExecute()) {


       

            $cekTrans = "SELECT * FROM transaksi WHERE idTransaksi = '{$idTransaksi}' ";
            $this->db->query($cekTrans);
            $infoTans = $this->db->single();
            $cekUser = "SELECT * FROM m_user WHERE idUser='{$infoTans->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();
            // notif wa
            sendWhatsApp($infoUser->nomorTelepon, "===== Notification Reject Kos46A =====
Mohon Maaf transaksi anda dengan detail berikut :
- Nama Pemesan : {$infoUser->namaUser}
- Tanggal Pemesanan : {$infoTans->tanggalWaktuTransaksi}
- Tipe Kamar : {$infoTans->namaTipeKamar}
- Nomor Kamar : {$infoTans->nomorKamar}
- Lama Sewa : {$infoTans->awalSewa} sampai {$infoTans->akhirSewa} ({$infoTans->lamaSewa} bulan)
Total Yang Harus Dibayar : " . formatRupiah($infoTans->totalPembayaran) . "

Telah ditolak oleh Admin dengan alasan : *" . $reason . "*
Terimakasih.");


            flash('insert_alert', 'Berhasil membatalkan transaksi', 'green');
        } else {
            flash('insert_alert', 'Gagal membatalkan transaksi', 'red');
        }
        header('Location: ../view/KelolaTransaksi.php');
        exit;
    }
    public function approveTrans($idTransaksi)
    {

        $update = "UPDATE transaksi SET status='Diterima',idAdmin='{$_SESSION['admin_session_login']->idAdmin}' WHERE idTransaksi = '{$idTransaksi}'";
        $this->db->query($update);

        if ($this->db->returnExecute()) {


         
            $cekTrans = "SELECT * FROM transaksi WHERE idTransaksi = '{$idTransaksi}' ";
            $this->db->query($cekTrans);
            $infoTans = $this->db->single();

            $cekUser = "SELECT * FROM m_user WHERE idUser='{$infoTans->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();


            // notif wa
            sendWhatsApp($infoUser->nomorTelepon, "===== Notification Approve Kos46A =====
Transaksi anda dengan detail berikut :
- Nama Pemesan : {$infoUser->namaUser}
- Tanggal Pemesanan : {$infoTans->tanggalWaktuTransaksi}
- Tipe Kamar : {$infoTans->namaTipeKamar}
- Nomor Kamar : {$infoTans->nomorKamar}
- Lama Sewa : {$infoTans->awalSewa} sampai {$infoTans->akhirSewa} ({$infoTans->lamaSewa} bulan)
Total Yang Harus Dibayar : " . formatRupiah($infoTans->totalPembayaran) . "

Telah diterima oleh Admin, Terimakasih.");



            flash('insert_alert', 'Berhasil menerima transaksi', 'green');
        } else {
            flash('insert_alert', 'Gagal menerima transaksi', 'red');
        }
        header('Location: ../view/KelolaTransaksi.php');
        exit;
    }
}

$transaksiM = new transaksiModel();


if (isset($_GET['actTransaksi'])) {
    if ($_GET['actTransaksi'] == 'tolakTransaksi') {
        $transaksiM->rejectTrans($_GET['idTransaksi'], $_GET['reason']);
    } else if ($_GET['actTransaksi'] == 'terimaTransaksi') {
        $transaksiM->approveTrans($_GET['idTransaksi']);
    }
}
