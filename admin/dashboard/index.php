<?php 

$menu = "Dashboard";

include '../partials/header.php';
include '../partials/sidebar.php';
include '../../functions/crud.php';
include '../../functions/hash.php';


$totalProses = selectData('tb_pemesanan', 'COUNT(*) as total', "status = 'Proses'")->fetch_assoc()['total'];
$totalBerhasilBooking = selectData('tb_pemesanan', 'COUNT(*) as total', "status = 'Berhasil Booking'")->fetch_assoc()['total'];
$totalUser = selectData('tb_pengunjung', 'COUNT(*) as total')->fetch_assoc()['total'];
$currentMonth = date('Y-m');
$totalBerkunjungBulanIni = selectData('tb_pemesanan', 'COUNT(*) as total', "status = 'Berkunjung' AND DATE_FORMAT(tanggal_pemesanan, '%Y-%m') = '$currentMonth'")->fetch_assoc()['total'];
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="../../assets/admin/images/dashboard/people.svg" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <h3 class=" font-weight-normal">Selamat Datang, Admin!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
    <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
                <div class="card-body">
                    <p class="mb-4"><span style="font-weight: bolder; font-size: 17px;"> Total Data </span> <br> Kunjungan Status Proses</p>
                    <p class="fs-30 mb-2"><?php echo $totalProses; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
                <div class="card-body">
                    <p class="mb-4"><span style="font-weight: bolder; font-size: 17px;"> Total Data </span> <br>Kunjungan Status Berhasil Booking</p>
                    <p class="fs-30 mb-2"><?php echo $totalBerhasilBooking; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-light-blue">
                <div class="card-body">
                    <p class="mb-4"><span style="font-weight: bolder; font-size: 17px;"> Total Data </span> <br> Pengguna Terdaftar</p>
                    <p class="fs-30 mb-2"><?php echo $totalUser; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4  stretch-card transparent">
            <div class="card card-light-danger">
                <div class="card-body">
                    <p class="mb-4"><span style="font-weight: bolder; font-size: 17px;"> Total Data </span> <br> Berhasil Berkunjung Bulan Ini</p>
                    <p class="fs-30 mb-2"><?php echo $totalBerkunjungBulanIni; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<?php 
 include '../partials/footer.php';
?>