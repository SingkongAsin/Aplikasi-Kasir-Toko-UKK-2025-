<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $PelangganID = $_POST['PelangganID'];
    $produk = $_POST['produk'];
    $total = 0;
    $tanggal = date('Y-m-d');

    // Mulai transaksi
    mysqli_begin_transaction($koneksi);

    try {
        // Tambahkan data ke tabel penjualan
        $query_penjualan = mysqli_query($koneksi, "INSERT INTO penjualan (TanggalPenjualan, PelangganID, TotalHarga) VALUES ('$tanggal', '$PelangganID', '0')");
        if (!$query_penjualan) {
            throw new Exception("Gagal menambahkan data penjualan");
        }

        // Ambil ID penjualan terakhir
        $PenjualanID = mysqli_insert_id($koneksi);

        // Loop produk yang dibeli
        foreach ($produk as $ProdukID => $Jumlah) {
            if ($Jumlah > 0) {
                // Ambil detail produk
                $produk_query = mysqli_query($koneksi, "SELECT NamaProduk, Harga, Stok FROM produk WHERE ProdukID = '$ProdukID'");
                $produk_data = mysqli_fetch_assoc($produk_query);

                if (!$produk_data) {
                    throw new Exception("Produk dengan ID $ProdukID tidak ditemukan");
                }

                if ($produk_data['Stok'] < $Jumlah) {
                    throw new Exception("Stok tidak mencukupi untuk produk: " . $produk_data['NamaProduk']);
                }

                $Subtotal = $produk_data['Harga'] * $Jumlah;
                $total += $Subtotal;

                // Masukkan ke tabel detailpenjualan
                $query_detail = mysqli_query($koneksi, "INSERT INTO detailpenjualan (PenjualanID, ProdukID, JumlahProduk, SubTotal) VALUES ('$PenjualanID', '$ProdukID', '$Jumlah', '$Subtotal')");
                if (!$query_detail) {
                    throw new Exception("Gagal menambahkan detail penjualan untuk produk: " . $produk_data['NamaProduk']);
                }

                // Update stok produk
                $update_stok = mysqli_query($koneksi, "UPDATE produk SET Stok = Stok - $Jumlah WHERE ProdukID = '$ProdukID'");
                if (!$update_stok) {
                    throw new Exception("Gagal memperbarui stok untuk produk: " . $produk_data['NamaProduk']);
                }
            }
        }

        // Update total harga di tabel penjualan
        $update_total = mysqli_query($koneksi, "UPDATE penjualan SET TotalHarga = '$total' WHERE PenjualanID = '$PenjualanID'");
        if (!$update_total) {
            throw new Exception("Gagal memperbarui total harga penjualan");
        }

        // Commit transaksi
        mysqli_commit($koneksi);

        echo '<script>alert("Transaksi berhasil disimpan"); location.href="?page=pembelian";</script>';
    } catch (Exception $e) {
        // Rollback transaksi jika terjadi error
        mysqli_rollback($koneksi);
        echo '<script>alert("Terjadi kesalahan: ' . $e->getMessage() . '");</script>';
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol>
    <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <select class="form-control form-select" name="PelangganID" required>
                        <?php
                        $p = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                        while ($pel = mysqli_fetch_array($p)) {
                            echo '<option value="' . $pel['PelangganID'] . '">' . $pel['NamaPelanggan'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <?php
            $pro = mysqli_query($koneksi, "SELECT * FROM produk");
            while ($produk = mysqli_fetch_array($pro)) {
            ?>
            <tr>
                <td><?php echo $produk['NamaProduk'] . ' (Stok: ' . $produk['Stok'] . ')'; ?></td>
                <td>:</td>
                <td>
                    <input class="form-control" type="number" step="1" min="0" max="<?php echo $produk['Stok']; ?>" name="produk[<?php echo $produk['ProdukID']; ?>]" value="0">
                </td>
            </tr>
            <?php
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>
