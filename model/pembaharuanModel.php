<?php

require_once '../libraries/Database.php';
require_once '../helper/flash_session.php';

class pembaharuanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function showPembaharuan($status)
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
       t.status,
       t.type,
       REPLACE(JSON_EXTRACT(detailLainnya,'$.totalPengembalianValue'),'\"','') pengembalian
       
       
   FROM
       `transaksi_pembaharuan` t
       LEFT JOIN m_user u ON t.idUser = u.idUser
       
       WHERE t.`status` IN ('{$status}')";
        $this->db->query($select);

        return $this->db->resultAll();
    }

    public function rejectTrans($idTransaksi, $reason)
    {

        $update = "UPDATE transaksi_pembaharuan SET status='Ditolak Perpanjangan',reason='{$reason}',idAdmin='{$_SESSION['admin_session_login']->idAdmin}' WHERE idTransaksi = '{$idTransaksi}'";
        $this->db->query($update);

        if ($this->db->returnExecute()) {




            $cekTrans = "SELECT * FROM transaksi_pembaharuan WHERE idTransaksi = '{$idTransaksi}' ";
            $this->db->query($cekTrans);
            $infoTans = $this->db->single();
            $cekUser = "SELECT * FROM m_user WHERE idUser='{$infoTans->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();
            // notif wa
            sendWhatsApp($infoUser->nomorTelepon, "===== Notification Reject Perpanjangan Kos46A =====
Mohon Maaf transaksi perpanjangan anda dengan detail berikut :
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
        header('Location: ../view/KelolaPembaharuan.php');
        exit;
    }
    public function approveTrans($idTransaksi)
    {
// PENGECAKAN TYPE AGAR PENGURANGAN DPT DI SETUJUI DAN DITOLAK BLM
        
        $update = "UPDATE transaksi_pembaharuan SET status='Diterima Perpanjangan',idAdmin='{$_SESSION['admin_session_login']->idAdmin}' WHERE idTransaksi = '{$idTransaksi}'";
        $this->db->query($update);

        if ($this->db->returnExecute()) {



            $cekTrans = "SELECT * FROM transaksi_pembaharuan WHERE idTransaksi = '{$idTransaksi}' ";
            $this->db->query($cekTrans);
            $infoTans = $this->db->single();

            // UPDATE REFRENSI
            $updateRef = "UPDATE transaksi SET status='Diterima dengan Pembaharuan',idAdmin='{$_SESSION['admin_session_login']->idAdmin}' WHERE idTransaksi = '{$infoTans->idTransaksiRefrensi}'";
            $this->db->query($updateRef);
            $this->db->returnExecute();

            // KURANGI DISKON
            $cekDiskon = "SELECT * FROM diskon WHERE namaDiskon = '{$infoTans->namaDiskon}'";
            $this->db->query($cekDiskon);
            $infoDiskon = $this->db->single();
            if ($infoDiskon) {
                $updateDiskon = "UPDATE diskon SET `limit`='" . ($infoDiskon->limit - 1) . "' WHERE idDiskon = '{$infoDiskon->idDiskon}'";
                $this->db->query($updateDiskon);
                $this->db->returnExecute();
            }

            $cekUser = "SELECT * FROM m_user WHERE idUser='{$infoTans->idUser}'";
            $this->db->query($cekUser);
            $infoUser = $this->db->single();


            // notif wa
            sendWhatsApp($infoUser->nomorTelepon, "===== Notification Approve Perpanjangan Kos46A =====
Transaksi Perpanjangan anda dengan detail berikut :
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
        header('Location: ../view/KelolaPembaharuan.php');
        exit;
    }
}

$pembaharuanM = new pembaharuanModel();


if (isset($_GET['actPembaharuan'])) {
    if ($_GET['actPembaharuan'] == 'tolakPembaharuan') {
        $pembaharuanM->rejectTrans($_GET['idTransaksi'], $_GET['reason']);
    } else if ($_GET['actPembaharuan'] == 'terimaPembaharuan') {
        $pembaharuanM->approveTrans($_GET['idTransaksi']);
    }
}
