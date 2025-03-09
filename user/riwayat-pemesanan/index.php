<?php 
$menu = 'Riwayat Pemesanan';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../admin/jadwal-kunjungan/format_date_indo.php';
include '../../functions/crud.php';
include '../../functions/hash.php';

$id_pengunjung = decryptID($_SESSION['id']);
$result = selectData("tb_pemesanan INNER JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung = tb_pengunjung.id_pengunjung INNER JOIN tb_jadwal_kunjungan ON tb_pemesanan.id_jadwal = tb_jadwal_kunjungan.id_jadwal", "*", "tb_pemesanan.id_pengunjung = $id_pengunjung");
$dataPemesanan = [];
if ($result->num_rows > 0) {
    // Menyimpan data dari setiap baris ke dalam array asosiatif
    while ($row = $result->fetch_object()) {
        $dataPemesanan[] = $row;
    }
}
?>

<div class="content-wrapper">
    <?php if(isset($_SESSION['message']) && $_SESSION['alert'] == 'success') : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil,</strong> <?= $_SESSION['message'] ?>
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
                            <h4 class="card-title">Data Jadwal Kunjungan</h4>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mb-3">

                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengunjung</th>
                                    <th>Jadwal Kunjungan</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 1;
                                foreach($dataPemesanan as $data) : ?>
                                <tr>
                                    <td><?= $i++ ?>.</td>
                                    <td><?= $data->nama ; ?></td>
                                    <td><?= tgl_indo($data->tanggal_kunjungan).' ('.date("H:i", strtotime($data->waktu_mulai)); ?>
                                        - <?= date("H:i", strtotime($data->waktu_selesai)).')'; ?></td>
                                    <td><?= $data->jumlah_tiket; ?></td>
                                    <td><?= 'Rp ' . number_format($data->jumlah_tiket * $data->harga, 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                    <?php if ($data->status == 'Proses') : ?>
                                        <span
                                            style="background-color: #ffc107; color: #000; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                                            <?= $data->status ?>
                                        </span>
                                        <?php elseif ($data->status == 'Berhasil Booking') : ?>
                                        <span
                                            style="background-color:rgb(44, 90, 183); color: #fff; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                                            <?= $data->status ?>
                                        </span>
                                        <?php elseif ($data->status == 'Berkunjung') : ?>
                                        <span
                                            style="background-color: #28a745; color: #fff; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                                            <?= $data->status ?>
                                        </span>
                                        <?php elseif ($data->status == 'Ditolak') : ?>
                                        <span
                                            style="background-color:rgb(192, 47, 47); color: #fff; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                                            <?= $data->status ?>
                                        </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="detail.php?id=<?= encryptID($data->id_pemesanan); ?>"
                                            class="btn btn-outline-primary"><i class="mdi mdi-rename-box"></i></a>
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

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>