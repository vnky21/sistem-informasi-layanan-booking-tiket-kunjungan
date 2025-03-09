<?php
session_start();
// include file fungsi yang diperlukan
include '../../../functions/hash.php';
include '../../../functions/crud.php';

$id_pemesanan = isset($_GET['id']) ? htmlspecialchars(decryptID($_GET['id'])) : ''; 

if (!empty($id_pemesanan)) {

    $pemesananData = selectData('tb_pemesanan', ['id_jadwal', 'jumlah_tiket'], "id_pemesanan = $id_pemesanan");

    if ($pemesananData && $pemesananData->num_rows > 0) {
        $row = $pemesananData->fetch_assoc();
        $id_jadwal = $row['id_jadwal'];
        $jumlah_tiket = $row['jumlah_tiket'];


        $updateSlot = resultQuery("UPDATE tb_jadwal_kunjungan SET slot_tersedia = slot_tersedia + $jumlah_tiket WHERE id_jadwal = $id_jadwal");

        if ($updateSlot) {

            $resultDelete = deleteData('tb_pemesanan', "id_pemesanan = $id_pemesanan");

            if ($resultDelete) {
                $_SESSION['alert'] = "success";
                $_SESSION['message'] = "Data berhasil dihapus dan slot tersedia diperbarui.";
                header('Location: ' . '../index.php');
            } else {
                $_SESSION['alert'] = "danger";
                $_SESSION['message'] = "Gagal menghapus data pemesanan.";
            }
        } else {
            $_SESSION['alert'] = "danger";
            $_SESSION['message'] = "Gagal memperbarui slot tersedia.";
        }
    } else {
        $_SESSION['alert'] = "danger";
        $_SESSION['message'] = "Data pemesanan tidak ditemukan.";
    }
} else {
    $_SESSION['alert'] = "danger";
    $_SESSION['message'] = "ID pemesanan tidak valid.";
}

header('Location: ' . '../index.php');
?>
