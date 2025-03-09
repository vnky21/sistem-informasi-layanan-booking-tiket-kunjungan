<?php
session_start();

include '../../../functions/hash.php';
include '../../../functions/crud.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$id_jadwal = isset($_POST['id_jadwal']) ? htmlspecialchars(decryptID($_POST['id_jadwal'])) : '';
$tanggal_kunjungan = isset($_POST['tanggal_kunjungan']) ? htmlspecialchars($_POST['tanggal_kunjungan']) : '';
$waktu_mulai = isset($_POST['waktu_mulai']) ? htmlspecialchars($_POST['waktu_mulai']) : '';
$waktu_selesai = isset($_POST['waktu_selesai']) ? htmlspecialchars($_POST['waktu_selesai']) : '';
$kapasitas = isset($_POST['kapasitas']) ? htmlspecialchars($_POST['kapasitas']) : '';
$harga = isset($_POST['harga']) ? htmlspecialchars($_POST['harga']) : '';
$ket = isset($_POST['ket']) ? htmlspecialchars($_POST['ket']) : '';

if ($action == 'tambah') {

    $dataInsert = array(
        'tanggal_kunjungan' => $tanggal_kunjungan,
        'waktu_mulai' => $waktu_mulai,
        'waktu_selesai' => $waktu_selesai,
        'kapasitas' => $kapasitas,
        'harga' => $harga,
        'slot_tersedia' => $kapasitas,
        'ket' => $ket
    );

    $resultInsert = insertData("tb_jadwal_kunjungan", $dataInsert);

    if ($resultInsert) {
        $_SESSION['alert'] = "success";
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header('Location: ' . '../index.php');
    } else {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Gagal menambahkan data";
        header('Location: ' . '../index.php');
    }
} elseif ($action == 'edit' && $id_jadwal) {

    $dataUpdate = array(
        'tanggal_kunjungan' => $tanggal_kunjungan,
        'waktu_mulai' => $waktu_mulai,
        'waktu_selesai' => $waktu_selesai,
        'kapasitas' => $kapasitas,
        'harga' => $harga,
        'ket' => $ket
    );

    $resultUpdate = updateData("tb_jadwal_kunjungan", $dataUpdate, "id_jadwal = $id_jadwal");

    if ($resultUpdate) {
        $_SESSION['alert'] = "success";
        $_SESSION['message'] = "Data berhasil diubah!";
        header('Location: ' . '../index.php');
    } else {
        $_SESSION['alert'] = "error";
        $_SESSION['message'] = "Gagal memperbarui data";
        header('Location: ' . '../index.php');
    }
}
