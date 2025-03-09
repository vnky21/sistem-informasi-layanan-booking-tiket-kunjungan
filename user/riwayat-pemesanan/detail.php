<?php 
$menu = 'Riwayat Pemesanan';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';
include '../../admin/jadwal-kunjungan/format_date_indo.php';

$id_pemesanan = isset($_GET['id']) ? decryptID($_GET['id']) : null;

// Untuk edit, dapatkan data kriteria dari database
if (isset($id_pemesanan)) {
    $resultSelect = selectData("tb_pemesanan INNER JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung = tb_pengunjung.id_pengunjung INNER JOIN tb_jadwal_kunjungan ON tb_pemesanan.id_jadwal = tb_jadwal_kunjungan.id_jadwal", "*", "id_pemesanan = $id_pemesanan");
    $data = $resultSelect->fetch_assoc();
}

?>

<div class="content-wrapper">
    <div class="row">
        <!-- Kolom untuk Informasi Pemesan -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4" style="font-size: 1.5rem;">Informasi Pemesan</h4>
                    <p><strong>Nama :</strong> <?= $data['nama'] ?></p>
                    <p><strong>Email :</strong> <?= $data['email'] ?></p>
                    <p><strong>No HP :</strong> <?= $data['no_hp'] ?></p>
                    <p><strong>Tanggal Lahir :</strong> <?= $data['tgl_lahir'] ?></p>
                    <p><strong>Tanggal Pemesanan :</strong>
                        <?= tgl_indo(date("Y-m-d", strtotime($data['tanggal_pemesanan']))) ?> - Jam
                        <?= date("H:i", strtotime($data['tanggal_pemesanan'])) ?></p>
                </div>
            </div>
        </div>

        <!-- Kolom untuk Detail Pemesanan -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4" style="font-size: 1.5rem;">Detail Pemesanan</h4>
                    <p><strong>Status : </strong>
                        <?php if ($data["status"] == 'Proses') : ?>
                        <span
                            style="background-color: #ffc107; color: #000; padding: 0.5em 2em; border-radius: 50px; display: inline-block;">
                            <?= $data["status"] ?>
                        </span>
                        <?php elseif ($data["status"] == 'Berhasil Booking') : ?>
                        <span
                            style="background-color:rgb(44, 90, 183); color: #fff; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                            <?= $data["status"] ?>
                        </span>
                        <?php elseif ($data["status"] == 'Berkunjung') : ?>
                        <span
                            style="background-color: #28a745; color: #fff; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                            <?= $data["status"] ?>
                        </span>
                        <?php elseif ($data["status"] == 'Ditolak') : ?>
                        <span
                            style="background-color: rgb(192, 47, 47); color: #fff; padding: 0.5em 1em; border-radius: 50px; display: inline-block;">
                            <?= $data["status"] ?>
                        </span>
                        <?php endif; ?>
                    </p>
                    <p><strong>Tanggal Kunjungan :</strong> <?= tgl_indo($data["tanggal_kunjungan"]) ?>
                    <p><strong>Waktu :</strong> <?= date("H:i", strtotime($data["waktu_mulai"])); ?> - <?= date("H:i", strtotime($data["waktu_selesai"])); ?></p>
                    <p><strong>Jumlah Tiket :</strong> <?= $data['jumlah_tiket'] ?> Tiket</p>
                    <p><strong>Total Harga :</strong> Rp <?= number_format($data['jumlah_tiket'] * $data['harga'], 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <a href="index.php" class="btn btn-primary w-100">Kembali</a>
    </div>

</div>



<?php 
 include '../partials/footer.php';
?>