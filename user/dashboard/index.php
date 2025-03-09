<?php
$menu = "Booking Kunjungan";
include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'tambah';

$result = selectData("tb_jadwal_kunjungan", "*", "tanggal_kunjungan >= CURDATE() ORDER BY tanggal_kunjungan ASC, waktu_mulai ASC ");
$dataKunjungan = [];
if ($result->num_rows > 0) {
    // Menyimpan data dari setiap baris ke dalam array asosiatif
    while ($row = $result->fetch_object()) {
        $dataKunjungan[] = $row;
    }
}

?>

<div class="content-wrapper">
    <?php if (isset($_SESSION['alert']) && $_SESSION['alert'] == 'error') : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal Pesan Tiket, </strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        $_SESSION['alert'] = null;
    elseif (isset($_SESSION['alert']) && $_SESSION['alert'] == 'success2') : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil, </strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        $_SESSION['alert'] = null;
    endif;
    ?>
    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="card data-icon-card-primary">
                <div class="card-body">
                    <h4 class="card-title text-white mb-4">Panduan Pemesanan Tiket</h4>
                    <div class="row">
                        <div class="col-12 text-white">
                            <ol class="text-white font-weight-500 mb-0">
                                <li>Pilih jadwal kunjungan yang tersedia.</li>
                                <li>Harga tiket akan muncul secara otomatis berdasarkan jadwal yang dipilih.</li>
                                <li>Masukkan jumlah tiket yang ingin dipesan.</li>
                                <li>Total harga akan dihitung dan ditampilkan secara otomatis.</li>
                                <li>Klik tombol <b>Booking Kunjungan</b> untuk memproses pemesanan.</li>
                                <li>Cek secara berkala status booking pada menu. Jika status berubah menjadi
                                    <strong>Berhasil Booking</strong>, Anda hanya perlu datang sesuai jadwal.
                                </li>
                                <li>Tiba 15 menit sebelum jam kunjungan dan siapkan pembayaran untuk transaksi di
                                    lokasi.</li>
                            </ol>
                            <p class="mt-3 text-white font-weight-bold">Aturan Pemesanan:</p>
                            <ul class="text-white mb-0">
                                <li>Satu hari hanya dapat memilih satu jadwal kunjungan.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Form Booking Kunjungan</h4>
                    <form class="forms-sample" action="../booking/action/proses.php" method="POST">
                        <input type="hidden" name="action" value="<?= $action; ?>">

                        <!-- Pilihan Jadwal Kunjungan -->
                        <div class="form-group">
                            <label for="jadwal">Jadwal Kunjungan</label>
                            <select name="jadwal" id="jadwal" class="form-select" required onchange="updateHargaTiket()"
                                style="color: #1f1f1f !important;">
                                <option value="">Pilih Jadwal</option>
                                <?php foreach ($dataKunjungan as $kunjungan): ?>
                                    <option value="<?= $kunjungan->id_jadwal; ?>" data-harga="<?= $kunjungan->harga ?>">
                                        <?= $kunjungan->tanggal_kunjungan; ?>
                                        (<?= date("H:i", strtotime($kunjungan->waktu_mulai)); ?> -
                                        <?= date("H:i", strtotime($kunjungan->waktu_selesai)); ?> WITA)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Harga Tiket -->
                        <div class="form-group">
                            <label for="harga_tiket">Harga Tiket</label>
                            <input type="text" class="form-control" name="harga_tiket" id="harga_tiket" readonly
                                placeholder="Harga Tiket">
                        </div>

                        <!-- Jumlah Tiket -->
                        <div class="form-group">
                            <label for="jumlah_tiket">Jumlah Tiket</label>
                            <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket"
                                placeholder="Jumlah Tiket" oninput="updateTotalHarga()">
                        </div>

                        <!-- Total Harga -->
                        <div class="form-group">
                            <label for="total_harga">Total Harga Tiket</label>
                            <input type="text" class="form-control" name="total_harga" id="total_harga" readonly
                                placeholder="Total Harga">
                        </div>

                        <div class="d-flex flex-row-reverse bd-highlight">
                            <div class="p-2 bd-highlight">
                                <button class="btn btn-light" type="button">Cancel</button>
                                <button type="submit" class="btn btn-primary me-2">Booking Kunjungan</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk memformat angka ke format rupiah
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Fungsi untuk mengupdate harga tiket saat jadwal dipilih
    function updateHargaTiket() {
        const jadwalSelect = document.getElementById("jadwal");
        const selectedOption = jadwalSelect.options[jadwalSelect.selectedIndex];
        const hargaTiket = selectedOption.getAttribute("data-harga") || 0;
        const formattedHarga = formatRupiah(hargaTiket);
        document.getElementById("harga_tiket").value = formattedHarga;
        updateTotalHarga();
    }

    // Fungsi untuk mengupdate total harga berdasarkan jumlah tiket
    function updateTotalHarga() {
        const hargaTiketRaw = document.getElementById("harga_tiket").value.replace(/,/g, "") || 0;
        const jumlahTiket = parseInt(document.getElementById("jumlah_tiket").value) || 0;
        const totalHarga = hargaTiketRaw * jumlahTiket;
        const formattedTotalHarga = formatRupiah(totalHarga);
        document.getElementById("total_harga").value = formattedTotalHarga;
    }
</script>


<?php
include '../partials/footer.php'; ?>