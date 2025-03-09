<?php 
$menu = 'Data Objek';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';


$conn = connectDB();

$action = isset($_GET['action']) ? $_GET['action'] : 'tambah';
$id_objek = isset($_GET['id']) ? decryptID($_GET['id']) : null;

// Untuk edit, dapatkan data kriteria dari database
if ($action == 'edit' && $id_objek) {
    $resultSelect = selectData("tb_objek", "*", "id_objek = $id_objek");
    $dataObjek = $resultSelect->fetch_assoc();
}
?>

<div class="content-wrapper">
    <?php if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'error') : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Gagal Ditambahkan, </strong> <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    $_SESSION['alert'] = null;
    endif;
    ?>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Form <?= ($action == 'edit') ? 'Edit' : 'Tambah' ?> Data Objek</h4>
                    <form class="forms-sample" action="action/proses.php" method="POST">
                        <input type="hidden" name="action" value="<?= $action; ?>">
                        <?php if($action == 'edit') : ?>
                        <input type="hidden" name="id_objek" value="<?= encryptID($id_objek); ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="nama">Nama Objek</label>
                            <input type="text" value="<?= isset($dataObjek['nama']) ? $dataObjek['nama'] : '' ?>"
                                class="form-control" name="nama" id="nama" placeholder="Nama Objek" required >
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required><?= isset($dataObjek['keterangan']) ? $dataObjek['keterangan'] : '' ?></textarea>
                        </div>

                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <button class="btn btn-light">Cancel</button>
                                <button type="submit" class="btn btn-primary me-2"><?= ($action == 'edit') ? 'Edit' : 'Tambah' ?> Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        right: 10px;
        top: 35px;
        cursor: pointer;
        color: #6c757d;
        font-size: 23px;
    }
</style>



<?php include '../partials/footer.php';
?>