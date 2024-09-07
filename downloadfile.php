<?php
include 'koneks.php';

$pilih = $_POST['kategori'];
$sql = mysqli_query($conn, "SELECT 
    transaksi_penjualan.id_transaksi,
    master_pelanggan.nama_pelanggan,
    master_produk.nama_produk,
    transaksi_penjualan.jumlah,
    transaksi_penjualan.total_harga,
    transaksi_penjualan.status_pembayaran,
    transaksi_penjualan.metode_pembayaran,
    transaksi_penjualan.diskon,
    transaksi_penjualan.tanggal_transaksi
FROM transaksi_penjualan
INNER JOIN master_pelanggan ON transaksi_penjualan.id_pelanggan = master_pelanggan.id_pelanggan
INNER JOIN master_produk ON transaksi_penjualan.id_produk = master_produk.id_produk
ORDER BY transaksi_penjualan.tanggal_transaksi DESC");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($pilih == "excel") {
        // Export ke Excel
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data_Transaksi.xls");
        echo "<table border='1'>";
        echo "<tr>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Metode Pembayaran</th>
                <th>Diskon</th>
                <th>Tanggal Transaksi</th>
              </tr>";

        while ($data = mysqli_fetch_array($sql)) {
            echo "<tr>
                    <td>{$data['id_transaksi']}</td>
                    <td>{$data['nama_pelanggan']}</td>
                    <td>{$data['nama_produk']}</td>
                    <td>{$data['jumlah']}</td>
                    <td>{$data['total_harga']}</td>
                    <td>{$data['status_pembayaran']}</td>
                    <td>{$data['metode_pembayaran']}</td>
                    <td>{$data['diskon']}</td>
                    <td>{$data['tanggal_transaksi']}</td>
                  </tr>";
        }
        echo "</table>";
    } elseif ($pilih == "pdf") {
        // Export ke PDF
        require('fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(200, 10, 'DATA TRANSAKSI', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 10, 'ID TRANSAKSI', 1, 0, 'C');
        $pdf->Cell(40, 10, 'NAMA PELANGGAN', 1, 0, 'C');
        $pdf->Cell(40, 10, 'NAMA PRODUK', 1, 0, 'C');
        $pdf->Cell(30, 10, 'JUMLAH', 1, 0, 'C');
        $pdf->Cell(30, 10, 'TOTAL HARGA', 1, 0, 'C');
        $pdf->Ln();

        while ($data = mysqli_fetch_array($sql)) {
            $pdf->Cell(30, 10, $data['id_transaksi'], 1, 0, 'C');
            $pdf->Cell(40, 10, $data['nama_pelanggan'], 1, 0, 'C');
            $pdf->Cell(40, 10, $data['nama_produk'], 1, 0, 'C');
            $pdf->Cell(30, 10, $data['jumlah'], 1, 0, 'C');
            $pdf->Cell(30, 10, $data['total_harga'], 1, 0, 'C');
            $pdf->Ln();
        }

        $pdf->Output('D', 'Data_Transaksi.pdf');
        exit;
    }
}
?>
