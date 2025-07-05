<?php
if(isset($_POST['nama_pelanggan'])) {
    $Nama = $_POST['nama_pelanggan'];
    $Alamat = $_POST['alamat'];
    $NomorTelepon = $_POST['no_telepon'];

    $query = mysqli_query($koneksi, "INSERT INTO pelanggan(NamaPelanggan, Alamat, NomorTelepon) values('$Nama', '$Alamat', '$NomorTelepon')");
    if($query) {
        echo '<script>alert("Tambah data berhasil")</script>';
    } else {
        echo '<script>alert("Tambah data gagal")</script>';
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>
    <a href="?page=pelanggan" class="btn btn-danger">Kembali</a>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" rows="5" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="tel" name="no_telepon"></td>
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
