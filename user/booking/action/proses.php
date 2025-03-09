<?php
session_start();
// if(!isset($_SESSION['login']) && $_SESSION['login'] !== true){
//     header('Location: http://app-electre.test/');
//     die;
// }

include '../../../functions/hash.php';
include '../../../functions/crud.php';

// Menerima data dari formulir
$action = isset($_POST['action']) ? $_POST['action'] : '';
$id_jadwal = isset($_POST['jadwal']) ? $_POST['jadwal'] : '';
$jumlah_tiket = isset($_POST['jumlah_tiket']) ? $_POST['jumlah_tiket'] : 0;
$id_pengunjung = decryptID($_SESSION['id']);

if ($action == 'tambah') {
    // Cek apakah jadwal ada
    $resultJadwal = selectData("tb_jadwal_kunjungan", "*", "id_jadwal = $id_jadwal");
    $jadwal = $resultJadwal->fetch_object();

    if (!$jadwal) {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Jadwal Tidak Ditemukan";
        header('Location: ' . '../../dashboard/index.php');
        exit;
    }

    // 1. Cek apakah jumlah tiket melebihi slot tersedia
    if ($jumlah_tiket > $jadwal->slot_tersedia) {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Slot tersedia tidak mencukupi! slot tersisa " . $jadwal->slot_tersedia;
        header('Location: ' . '../../dashboard/index.php');
        exit;
    }

    // 2. Cek apakah jadwal dan waktu belum terlewat
    $waktuSekarang = date('Y-m-d H:i:s');
    $jadwalWaktuMulai = $jadwal->tanggal_kunjungan . ' ' . $jadwal->waktu_mulai;
    if ($waktuSekarang > $jadwalWaktuMulai) {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Jadwal Sudah Terlewatkan";
        header('Location: ' . '../../dashboard/index.php');
        exit;
    }

    // 3. Cek apakah pengguna sudah memesan tiket di hari yang sama
    $resultBooking = selectData("tb_pemesanan", "*", "id_pengunjung = $id_pengunjung AND id_jadwal = $id_jadwal AND status = 'Proses'" );
    if ($resultBooking->num_rows > 0) {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Kamu telah pesan kunjungan untuk hari yang sama dan sedang proses";
        header('Location: ' . '../../dashboard/index.php');
        exit;
    }

    // 4. Insert Data Pemesanan
    $dataInsert = array(
        'id_pengunjung' => $id_pengunjung,
        'id_jadwal' => $id_jadwal,
        'jumlah_tiket' => $jumlah_tiket,
        'tanggal_pemesanan' => date('Y-m-d H:i:s'),
        'status' => 'Proses' // status awal
    );
    $resultInsert = insertData("tb_pemesanan", $dataInsert);

    if ($resultInsert) {
        // 5. Update slot_tersedia pada jadwal
        $newSlot = $jadwal->slot_tersedia - $jumlah_tiket;
        $dataUpdate = array(
            'slot_tersedia' => $newSlot
        );
        $resultUpdate = updateData("tb_jadwal_kunjungan", $dataUpdate, "id_jadwal = $id_jadwal");

        if ($resultUpdate) {
            $_SESSION['alert'] = "success2";
            $_SESSION['message'] = "Silahkan datang saat jadwal kunjungan";
            header('Location: ' . '../../dashboard/index.php');
        } else {
            echo "Gagal mengupdate slot tersedia.";
        }
    } else {
        echo "Gagal memesan tiket.";
    }
}
