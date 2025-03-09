<?php
session_start();
// if(!isset($_SESSION['login']) && $_SESSION['login'] !== true){
//     header('Location: http://app-electre.test/');
//     die;
// }

include '../../../functions/hash.php';
include '../../../functions/crud.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$id_objek = isset($_POST['id_objek']) ? htmlspecialchars(decryptID($_POST['id_objek'])) : '';
$nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama'])  : ''; 
$keterangan = isset($_POST['keterangan']) ? htmlspecialchars($_POST['keterangan'])  : ''; 


if ($action == 'tambah') {
    
        $dataInsert = array(
            'nama' => $nama,
            'keterangan' => $keterangan
        );

        $resultInsert = insertData("tb_objek", $dataInsert);

        if ($resultInsert) {

            $_SESSION['alert'] = "success";
            $_SESSION['message'] = "di Tambahkan";
            header('Location: '. '../index.php');

        } else {
            echo "Gagal menambahkan data.";
        }
    
} elseif ($action == 'edit' && $id_objek) {
    
        $dataUpdate = array(
            'nama' => $nama,
            'keterangan' => $keterangan
        );
    
        $resultUpdate = updateData("tb_objek", $dataUpdate, "id_objek = $id_objek");
    
        if ($resultUpdate) {
    
            $_SESSION['alert'] = "success";
            $_SESSION['message'] = "di Ubah";
            header('Location: '. '../index.php');
    
        } else {
            echo "Gagal memperbarui data.";
        }

}

?>
