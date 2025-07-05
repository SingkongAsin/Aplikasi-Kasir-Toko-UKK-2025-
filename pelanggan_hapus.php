<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE PelangganID=$id");
if($query) {
    echo '<script>alert("Hapus data berhasil"); location.href="?page=pelanggan"</script>';
    echo '<script>window.location="?page=pelanggan"</script>';
} else {
    echo '<script>alert("Hapus data gagal")</script>';
}