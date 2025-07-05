<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE ProdukID=$id");
if($query) {
    echo '<script>alert("Hapus data berhasil"); location.href="?page=produk"</script>';
    echo '<script>window.location="?page=produk"</script>';
} else {
    echo '<script>alert("Hapus data gagal")</script>';
}