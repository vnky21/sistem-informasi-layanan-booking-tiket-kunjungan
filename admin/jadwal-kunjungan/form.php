<?php 
$menu = 'Jadwal Kunjungan';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';


$conn = connectDB();

$action = isset($_GET['action']) ? $_GET['action'] : 'tambah';
$id_jadwal = isset($_GET['id']) ? decryptID($_GET['id']) : null;

// Untuk edit, dapatkan data kriteria dari database
if ($action == 'edit' && $id_jadwal) {
    $resultSelect = selectData("tb_jadwal_kunjungan", "*", "id_jadwal = $id_jadwal");
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
                    <h4 class="card-title mb-3">Form <?= ($action == 'edit') ? 'Edit' : 'Tambah' ?> Jadwal Kunjungan Museum</h4>
                    <form class="forms-sample" action="action/proses.php" method="POST">
                        <input type="hidden" name="action" value="<?= $action; ?>">
                        <?php if($action == 'edit') : ?>
                        <input type="hidden" name="id_jadwal" value="<?= encryptID($id_jadwal); ?>">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                            <input type="date" value="<?= isset($dataObjek['tanggal_kunjungan']) ? $dataObjek['tanggal_kunjungan'] : '' ?>"
                                class="form-control" name="tanggal_kunjungan" id="tanggal_kunjungan" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="time" value="<?= isset($dataObjek['waktu_mulai']) ? $dataObjek['waktu_mulai'] : '' ?>"
                                class="form-control" name="waktu_mulai" id="waktu_mulai" required>
                        </div>

                        <div class="form-group">
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="time" value="<?= isset($dataObjek['waktu_selesai']) ? $dataObjek['waktu_selesai'] : '' ?>"
                                class="form-control" name="waktu_selesai" id="waktu_selesai" required>
                        </div>

                        <div class="form-group">
                            <label for="kapasitas">Kapasitas</label>
                            <input type="number" value="<?= isset($dataObjek['kapasitas']) ? $dataObjek['kapasitas'] : '' ?>"
                                class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" required>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" value="<?= isset($dataObjek['harga']) ? $dataObjek['harga'] : '' ?>"
                                class="form-control" name="harga" id="harga" placeholder="Harga" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" value="<?= isset($dataObjek['ket']) ? $dataObjek['ket'] : '' ?>"
                                class="form-control" name="ket" id="ket" placeholder="Keterangan" required>
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


<?php include '../partials/footer.php';
?>