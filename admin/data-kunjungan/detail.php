<?php 
$menu = 'Data Kunjungan';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';
include '../jadwal-kunjungan/format_date_indo.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
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
    </div>

    <!-- Form Konfirmasi Pemesanan -->
    <?php if (in_array($data['status'], ["Proses", "Berhasil Booking"])) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Konfirmasi Pemesanan</h3>
                    <form action="action/proses.php" method="POST" class="mb-2">
                        <input type="hidden" name="action" value="<?= $action; ?>">
                        <input type="hidden" name="id_pemesanan" value="<?= encryptID($data['id_pemesanan']) ?>">
                        <?php if($data['status'] == "Proses") : ?>
                        <button type="submit" class="btn btn-primary w-100"
                            onclick="return confirm('Apakah Anda yakin ingin mengonfirmasi booking?')">Konfirmasi
                            Booking</button>
                        <?php elseif($data['status'] == "Berhasil Booking") : ?>
                        <button type="submit" class="btn btn-success w-100"
                            onclick="return confirm('Apakah Anda yakin ingin mengonfirmasi pembayaran?')">Konfirmasi
                            Pembayaran</button>
                        <?php endif; ?>
                    </form>
                    <?php if($data['status'] == "Proses") : ?>
                    <form action="action/proses.php" method="POST">
                        <input type="hidden" name="action" value="tolak">
                        <input type="hidden" name="id_pemesanan" value="<?= encryptID($data['id_pemesanan']) ?>">
                        <button type="submit" class="btn btn-danger w-100"
                            onclick="return confirm('Apakah Anda yakin ingin tolak booking?')">Ditolak</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>



<?php 
 include '../partials/footer.php';
?>