<?php 
$menu = 'data_admin';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';

$result = selectData("tb_admin", "*");
$dataAdmin = [];
if ($result->num_rows > 0) {
    // Menyimpan data dari setiap baris ke dalam array asosiatif
    while ($row = $result->fetch_object()) {
        $dataAdmin[] = $row;
    }
}
?>

<div class="content-wrapper">
    <?php if(isset($_SESSION['alert']) && $_SESSION['alert'] == 'success') : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil</strong> <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php 
    $_SESSION['alert'] = null;
    endif;
    ?>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 bd-highlight">
                            <h4 class="card-title">Data Admin</h4>
                        </div>
                        <div class="ms-auto p-2 bd-highlight">
                            <a href="form.php" class="btn btn-success">+ Tambah Data</a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-3">

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach($dataAdmin as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><?= $data->nama; ?></td>
                                    <td><?= $data->username; ?></td>
                                    <td>
                                        <a href="form.php?action=edit&id=<?= encryptID($data->id_admin); ?>" class="btn btn-outline-primary"><i
                                                class="mdi mdi-rename-box"></i></a>
                                        <a href="action/hapus.php?id=<?= encryptID($data->id_admin); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="btn btn-outline-danger"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
 include '../partials/footer.php';
?>