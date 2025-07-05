<?php
if(isset($_POST['nama_produk'])) {
    $Nama = $_POST['nama_produk'];
    $Harga = $_POST['harga'];
    $Stok = $_POST['stok'];

    $query = mysqli_query($koneksi, "INSERT INTO produk(NamaProduk, Harga, Stok) VALUES ('$Nama', '$Harga', '$Stok')");
    if($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=produk";</script>';
    } else {
        echo '<script>alert("Tambah data gagal")</script>';
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-danger">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0.01" name="harga" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="1" name="stok" required></td>
            </tr>
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
