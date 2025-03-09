<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>App Museum - Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="../assets/admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../assets/admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/admin/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/admin/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/admin/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <?php if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'error') : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Register akun anda gagal, </strong> <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        $_SESSION['alert'] = null;
                        endif;
                        ?>
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="../assets/admin/images/logo.png" alt="logo">
                            </div>
                            <h4>Halaman Login</h4>
                            <h6 class="font-weight-light">Silahkan login untuk melalukan booking kunjungan!</h6>
                            <form class="pt-3" action="register.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control " name="nama" id="nama"
                                        placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control " name="email" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control " name="tgl_lahir" id="tgl_lahir"
                                        placeholder="Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " name="no_hp" id="no_hp"
                                        placeholder="No. HP" oninput="formatPhoneNumber(this)">
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                    <span toggle="#password" class="mdi mdi-eye field-icon toggle-password "
                                        onclick="togglePassword('password')"></span>
                                        <p class="mt-1 ms-2">* Password minimal 8 karakter</p>
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password" name="confirm-password" class="form-control" id="confirm-password"
                                        placeholder="Konfirmasi Password" required>
                                    <span toggle="#confirm-password" class="mdi mdi-eye field-icon toggle-password "
                                        onclick="togglePassword('confirm-password')"></span>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Sudah punya akun? silahkan <a href="../login" class="text-primary">Login</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const fieldType = field.getAttribute("type") === "password" ? "text" : "password";
            field.setAttribute("type", fieldType);

            // Toggle the eye icon
            const icon = field.nextElementSibling;
            icon.classList.toggle("mdi-eye");
            icon.classList.toggle("mdi-eye-off");
        }

        function formatPhoneNumber(input) {
            // Mengambil nilai input dan menghapus karakter selain angka
            let value = input.value.replace(/\D/g, ''); 

            // Format sesuai panjang input
            if (value.length > 12) {
                value = value.replace(/(\d{4})(\d{4})(\d{5})/, '$1 $2 $3');
            } else {
                value = value.replace(/(\d{4})(\d{4})(\d{0,4})/, '$1 $2 $3');
            }

            // Mengubah nilai input dengan format baru
            input.value = value.trim();
        }
    </script>

    <style>
        .field-icon {
            position: absolute;
            right: 15px;
            top: 15px;
            cursor: pointer;
            color: #6c757d;
            font-size: 23px;
        }
    </style>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assets/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/admin/js/off-canvas.js"></script>
    <script src="../assets/admin/js/template.js"></script>
    <script src="../assets/admin/js/settings.js"></script>
    <script src="../assets/admin/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>