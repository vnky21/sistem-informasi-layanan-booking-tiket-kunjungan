<?php
session_start();

include '../../../functions/hash.php';
include '../../../functions/crud.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$id_pemesanan = isset($_POST['id_pemesanan']) ? htmlspecialchars(decryptID($_POST['id_pemesanan'])) : '';

if ($action == 'booking') {

    $dataUpdate = array(
        'status' => 'Berhasil Booking'
    );

    $resultUpdate = updateData("tb_pemesanan", $dataUpdate, "id_pemesanan = $id_pemesanan");

    if ($resultUpdate) {
        $_SESSION['alert'] = "success";
        $_SESSION['message'] = "Data kunjungan berhasil booking!";
        header('Location: '. '../index.php');
    } else {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Gagal memperbarui data";
        header('Location: '. '../index.php');
    }

}elseif ($action == 'bayar') {
    $dataUpdate = array(
        'status' => 'Berkunjung'
    );

    $resultUpdate = updateData("tb_pemesanan", $dataUpdate, "id_pemesanan = $id_pemesanan");

    $dataInsertRiwayat = array(
        'id_pemesanan' => $id_pemesanan
    );
    insertData('tb_riwayat_kunjungan', $dataInsertRiwayat);

    if ($resultUpdate) {
        
                $_SESSION['alert'] = "success";
                $_SESSION['message'] = "Data kunjungan berhasil bayar dan ditambahkan ke Riwayat Kunjungan!";
                header('Location: ' . '../index.php');

    } else {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Gagal memperbarui data!";
        header('Location: ' . '../index.php');
    }

} elseif ($action == 'tolak') {

    $dataUpdate = array(
        'status' => 'Ditolak'
    );

    $resultUpdate = updateData("tb_pemesanan", $dataUpdate, "id_pemesanan = $id_pemesanan");

    if ($resultUpdate) {
        $_SESSION['alert'] = "success";
        $_SESSION['message'] = "Data kunjungan berhasil ditolak!";
        header('Location: '. '../index.php');
    } else {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Gagal memperbarui data";
        header('Location: '. '../index.php');
    }
}
?>
