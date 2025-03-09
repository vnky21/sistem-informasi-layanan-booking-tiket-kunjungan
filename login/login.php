<?php
include '../functions/crud.php';
include '../functions/hash.php';

session_start();

$akun = isset($_POST['akun']) ? htmlspecialchars($_POST['akun'])  : ''; 
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password'])  : ''; 

$result = selectData('tb_pengunjung', '*', "email = '$akun' OR no_hp = '$no_telp'");

if($result->num_rows > 0){

    $row = $result->fetch_assoc();
    if(password_verify($password, $row['password'])){

        $_SESSION['login'] = true;
        $_SESSION['id'] = encryptID($row['id_pengunjung']);
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['alert'] = "success";
        header('Location: '. '../user/dashboard');

    }else{

        $_SESSION['alert'] = "error";
        $_SESSION['message'] = 'Password yang anda masukkan salah';
        header('Location: '. '.');
    }
}else{

    $_SESSION['alert'] = "error";
    $_SESSION['message'] = 'Akun yang anda masukkan salah';
    header('Location: '. '.');

}

?>