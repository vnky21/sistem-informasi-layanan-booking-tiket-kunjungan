<?php
include '../functions/crud.php';

session_start();

$nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama'])  : ''; 
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email'])  : ''; 
$tgl_lahir = isset($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir'])  : ''; 
$no_hp = isset($_POST['no_hp']) ? htmlspecialchars($_POST['no_hp'])  : ''; 
$no_hp = str_replace(' ', '', $no_hp);
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password'])  : ''; 
$password2 = isset($_POST['confirm-password']) ? htmlspecialchars($_POST['confirm-password'])  : ''; 



if (empty($nama) || empty($email) || empty($tgl_lahir) || empty($no_hp) || empty($password) || empty($password2)){

    $_SESSION['alert'] = "error";
    $_SESSION['message'] = 'Semua data wajib terisi!';
    header('Location: '. '.');

}else{

    $result = selectData('tb_pengunjung', '*', "email = '$email' OR no_hp = '$no_hp'");
    if($result->num_rows > 0){

        $_SESSION['alert'] = "error";
        $_SESSION['message'] = 'Email atau No. HP telah terdaftar!';
        header('Location: '. '.');

    }else{

        if($password != $password2){

            $_SESSION['alert'] = "error";
            $_SESSION['message'] = 'Password dan Konfirmasi Password tidak sama!';
            header('Location: '. '.');

        }else{

            if(strlen($password) < 8){
                $_SESSION['alert'] = "error";
                $_SESSION['message'] = 'Password minimal 8 karakter!';
                header('Location: '. '.');

            }else{

                $dataInsert = array(
                    'nama' => $nama,
                    'email' => $email,
                    'tgl_lahir' => $tgl_lahir,
                    'no_hp' => $no_hp,    
                    'password' => password_hash($password, PASSWORD_DEFAULT) 
                );

                $resultInsert = insertData("tb_pengunjung", $dataInsert);

                if ($resultInsert) {

                    $_SESSION['alert'] = "success";
                    $_SESSION['message'] = "silahkan login!";
                    header('Location: '. '../login');

                } else {
                    echo "Gagal menambahkan data.";
                }

            }
            
        }
    }
}

?>