<?php
session_start();
// if(!isset($_SESSION['login']) && $_SESSION['login'] !== true){
//     header('Location: http://app-electre.test/');
//     die;
// }
include '../../../functions/hash.php';
include '../../../functions/crud.php';


$id_objek = isset($_GET['id']) ? htmlspecialchars(decryptID($_GET['id'])) : ''; 

$resultDelete = deleteData('tb_objek', "id_objek = $id_objek");

if($resultDelete){

    $_SESSION['alert'] = "success";
    $_SESSION['message'] = "di Hapus";
    header('Location: '. '../index.php');

} else {
    echo "Gagal menambahkan data.";
}
