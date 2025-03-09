<?php 
$menu = 'Riwayat Kunjungan';

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';
include '../../admin/jadwal-kunjungan/format_date_indo.php';

$id_pemesanan = isset($_GET['id']) ? decryptID($_GET['id']) : null;

// Untuk edit, dapatkan data kriteria dari database
if (isset($id_pemesanan)) {
    $resultSelect = selectData(
        "tb_riwayat_kunjungan 
         INNER JOIN tb_pemesanan ON tb_riwayat_kunjungan.id_pemesanan = tb_pemesanan.id_pemesanan 
         INNER JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung = tb_pengunjung.id_pengunjung 
         INNER JOIN tb_jadwal_kunjungan ON tb_pemesanan.id_jadwal = tb_jadwal_kunjungan.id_jadwal",
        "*", 
        "tb_riwayat_kunjungan.id_pemesanan = $id_pemesanan"
    );
    $data = $resultSelect->fetch_assoc();
}

?>

<div class="content-wrapper">
    <div class="row">
       
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4" style="font-size: 1.5rem;">Pilih Bulan dan Tahun</h4>
                    <form action="action/print.php" method="GET" target="_blank">
                        <div class="form-group">
                            <label for="bulan" class="font-weight-bold">Pilih Bulan</label>
                            <select name="bulan" id="bulan" class="form-select" style="color: #1f1f1f !important;" required>
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun" class="font-weight-bold">Pilih Tahun</label>
                            <select name="tahun" id="tahun" class="form-select" style="color: #1f1f1f !important;" required>
                                <option value="">Pilih Tahun</option>
                                <?php
                                // Menampilkan tahun dari 2020 hingga tahun sekarang
                                for ($i = 2024; $i <= date('Y'); $i++) {
                                    echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" title="Cetak PDF">
                            <i class="mdi mdi-file-pdf-box"></i> Cetak PDF
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<?php 
 include '../partials/footer.php';
?>