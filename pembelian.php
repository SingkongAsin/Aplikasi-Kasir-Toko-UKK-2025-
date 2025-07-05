<div class="container-fluid px-4">
    <h1 class="mt-4">Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>
    <a href="?page=pembelian_tambah" class="btn btn-primary">+ Tambah Pembelian</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Penjualan</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = mysqli_query($koneksi, "
            SELECT 
                penjualan.TanggalPenjualan, 
                penjualan.TotalHarga, 
                penjualan.PenjualanID, 
                pelanggan.NamaPelanggan 
            FROM penjualan 
            LEFT JOIN pelanggan ON penjualan.PelangganID = pelanggan.PelangganID
        ");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $data['TanggalPenjualan']; ?></td>
            <td><?php echo $data['NamaPelanggan'] ? $data['NamaPelanggan'] : 'Tidak diketahui'; ?></td>
            <td><?php echo number_format($data['TotalHarga'], 0, ',', '.'); ?></td>
            <td>
                <a href="?page=penjualan_detail&id=<?php echo $data['PenjualanID']; ?>" class="btn btn-secondary">Detail</a>
                <a href="?page=penjualan_hapus&id=<?php echo $data['PenjualanID']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
