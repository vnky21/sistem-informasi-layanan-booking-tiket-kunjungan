<?php
require('../../../assets/admin/vendors/fpdf/fpdf.php');
include '../../jadwal-kunjungan/format_date_indo.php';
require('../../../functions/crud.php');

if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
    $bulan = htmlspecialchars($_GET['bulan']);
    $tahun = htmlspecialchars($_GET['tahun']);

    $whereClause = "YEAR(tb_pemesanan.tanggal_pemesanan) = '$tahun'";

    if (!empty($bulan)) {
        $whereClause .= " AND MONTH(tb_pemesanan.tanggal_pemesanan) = '$bulan'";
    }

    $sql = "SELECT 
                tb_pengunjung.nama AS nama_pengunjung,
                tb_pengunjung.no_hp,
                tb_pemesanan.tanggal_pemesanan,
                tb_jadwal_kunjungan.tanggal_kunjungan,
                CONCAT(TIME_FORMAT(waktu_mulai, '%H:%i'), ' - ', TIME_FORMAT(waktu_selesai, '%H:%i')) AS waktu_kunjungan,
                tb_pemesanan.jumlah_tiket,
                (tb_pemesanan.jumlah_tiket * tb_jadwal_kunjungan.harga) AS total_harga
            FROM tb_pemesanan
            JOIN tb_pengunjung ON tb_pemesanan.id_pengunjung = tb_pengunjung.id_pengunjung
            JOIN tb_jadwal_kunjungan ON tb_pemesanan.id_jadwal = tb_jadwal_kunjungan.id_jadwal
            WHERE $whereClause";

    $result = resultQuery($sql);

    // Create PDF
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 7, 'Laporan Riwayat Kunjungan Museum', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 7,  bln_indo($bulan) .' '. $tahun, 0, 1, 'C');
    $pdf->Ln(5);

    // Table header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(200, 200, 200);
    $pdf->Cell(9, 10, 'No', 1, 0, 'C', true);
    $pdf->Cell(60, 10, 'Nama Pengunjung', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'No HP', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Tanggal Pemesanan', 1, 0, 'C', true);
    $pdf->Cell(65, 10, 'Tanggal & Waktu Kunjungan', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Jumlah Tiket', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Total Harga (Rp)', 1, 1, 'C', true);

    // Table content
    $pdf->SetFont('Arial', '', 10);
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {

            $pdf->Cell(9, 10, $i, 1, 0, 'C');
            $pdf->Cell(60, 10, $row['nama_pengunjung'], 1);
            $pdf->Cell(30, 10, $row['no_hp'], 1);
            $pdf->Cell(40, 10, tgl_indo(date("Y-m-d", strtotime($row['tanggal_pemesanan']))), 1);
            $pdf->Cell(65, 10, tgl_indo(date("Y-m-d", strtotime($row['tanggal_kunjungan']))) . ' (' . $row['waktu_kunjungan'] . ')', 1);
            $pdf->Cell(30, 10, $row['jumlah_tiket'], 1, 0, 'C');
            $pdf->Cell(40, 10, number_format($row['total_harga']), 1, 1, 'R');

            $i++;
        }
    } else {
        $pdf->Cell(0, 10, 'Tidak ada data untuk bulan dan tahun yang dipilih.', 1, 1, 'C');
    }

    // Output PDF
    $pdf->Output('I', 'Laporan_Riwayat_Kunjungan.pdf');
} else {
    echo "Parameter bulan dan tahun wajib diisi.";
}
?>
