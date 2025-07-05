<?php
// Ambil ID penjualan dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan detail penjualan dan pelanggan
$query = mysqli_query($koneksi, "SELECT penjualan.TanggalPenjualan, penjualan.TotalHarga, penjualan.PenjualanID, pelanggan.NamaPelanggan 
    FROM penjualan 
    LEFT JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID 
    WHERE penjualan.PenjualanID = '$id'");
$data = mysqli_fetch_array($query);

// Validasi jika data tidak ditemukan
if (!$data) {
    echo '<script>alert("Data penjualan tidak ditemukan!"); location.href="?page=pembelian";</script>';
    exit;
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Detail Pembelian</li>
    </ol>
    <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
    <hr>

    <table class="table">
        <tr>
            <td width="200"><strong>Nama Pelanggan</strong></td>
            <td width="1">:</td>
            <td><?php echo htmlspecialchars($data['NamaPelanggan']); ?></td>
        </tr>
        <tr>
            <td><strong>Tanggal Penjualan</strong></td>
            <td>:</td>
            <td><?php echo htmlspecialchars($data['TanggalPenjualan']); ?></td>
        </tr>
        <tr>
            <td><strong>Total Harga</strong></td>
            <td>:</td>
            <td><?php echo number_format($data['TotalHarga'], 2, ',', '.'); ?></td>
        </tr>
    </table>

    <h3 class="mt-4">Detail Produk</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Query untuk mendapatkan detail produk
            $pro = mysqli_query($koneksi, "SELECT produk.NamaProduk, produk.Harga, detailpenjualan.JumlahProduk, detailpenjualan.SubTotal 
                FROM detailpenjualan 
                LEFT JOIN produk ON detailpenjualan.ProdukID = produk.ProdukID 
                WHERE detailpenjualan.PenjualanID = '$id'");

            // Tampilkan data produk
            while ($produk = mysqli_fetch_array($pro)) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($produk['NamaProduk']); ?></td>
                <td><?php echo number_format($produk['Harga'], 2, ',', '.'); ?></td>
                <td><?php echo $produk['JumlahProduk']; ?></td>
                <td><?php echo number_format($produk['SubTotal'], 2, ',', '.'); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
