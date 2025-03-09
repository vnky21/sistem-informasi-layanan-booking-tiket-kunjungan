<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>App Museum - Login</title>
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
                            <strong>Login anda gagal, </strong> <?= $_SESSION['message'] ?>
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
                            <h4>Login</h4>
                            <h6 class="font-weight-light">Silahkan admin login terlebih dahulu!</h6>
                            <form class="pt-3" action="login.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control " name="username" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-group position-relative">
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password" required>
                                    <span toggle="#password" class="mdi mdi-eye field-icon toggle-password "
                                        onclick="togglePassword('password')"></span>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
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