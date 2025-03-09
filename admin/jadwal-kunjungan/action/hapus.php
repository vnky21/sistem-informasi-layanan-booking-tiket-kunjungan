<?php
session_start();

include '../../../functions/hash.php';
include '../../../functions/crud.php';


$id_jadwal = isset($_GET['id']) ? htmlspecialchars(decryptID($_GET['id'])) : ''; 

$resultDelete = deleteData('tb_jadwal_kunjungan', "id_jadwal = $id_jadwal");

if($resultDelete){

    $_SESSION['alert'] = "success";
    $_SESSION['message'] = "di Hapus";
    header('Location: '. '../index.php');

} else {
    echo "Gagal menambahkan data.";
}
