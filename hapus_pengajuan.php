<!-- 
Nama File   : hapus.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Melakukan proses hapus data
-->
<?php //memuat modul koneksi database
include "koneksi.php";
//mengecek apakah ada id yang dikirimkan
if(isset($_GET['id'])){
    // jika ada id yang dikirimkan, masukkan id tersebut ke dalam $id
    $id = $_GET['id'];
    // membuat query penghapusan data berdasarkan id yang dikirimkan 
    $sql = "DELETE FROM pengajuan_pkl WHERE id=$id";
    $query = mysqli_query($db,$sql);
    if ($query) {
        // apabila query berhasil, kembalikan ke halaman list_pendaftar dan ptambahkan pesan berhasil menghaspus
        header('Location: list_pengajuan.php?template=success_hapus');
    }else{
        // jika query gagal, program akan dihentikan
        die("Gagal melakukan hapus");
    }
}else{
    // jika tidak ada id yang dikirimkan, maka program dihentikan
    die("Akses dilarang");
}