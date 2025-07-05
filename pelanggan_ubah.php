<?php
$id = $_GET['id'];

if(isset($_POST['nama_pelanggan'])) {
    $Nama = $_POST['nama_pelanggan'];
    $Alamat = $_POST['alamat'];
    $NomorTelepon = $_POST['no_telepon'];

    // Pastikan nama kolom di query sesuai dengan yang ada di database
    $query = mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$Nama', Alamat='$Alamat', NomorTelepon='$NomorTelepon' WHERE PelangganID=$id");
    if($query) {
        echo '<script>alert("Ubah data berhasil")</script>';
        echo '<script>window.location="?page=pelanggan"</script>';
    } else {
        echo '<script>alert("Ubah data gagal")</script>';
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE PelangganID=$id");
$data = mysqli_fetch_array($query);
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
                <td><input class="form-control" value="<?php echo $data['NamaPelanggan']; ?>" type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea name="alamat" rows="5" class="form-control"><?php echo $data['Alamat']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>No. Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="tel" value="<?php echo $data['NomorTelepon']; ?>" name="no_telepon"></td>
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
