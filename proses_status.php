<!-- 
    Nama File   : proses_edit.php
    NIM         : 3202016004
    Nama        : Muhamad Ardalepa
    Deskripsi   : Melakukan pemrosesan edit data
 -->
<?php
//memuat modul koneksi database
include "koneksi.php";
$id = $_GET['id'];
$status = $_GET['status'];
echo $waktu_balasan = date("Y-m-d H:i:s");
$sql = "UPDATE pengajuan_pkl set  status='$status',
        waktu_balasan='$waktu_balasan' WHERE id=$id";
$query = mysqli_query($db,$sql);

if ($query) {
    // jika query berhsil, kembalikan user ke halaman list pendaftar dengan pesan sukses
    header('Location: list_pengajuan.php?template=success_edit');
}else{
    // jika gagal, kembalikan user ke halaman list pendaftar dengan pesan failed
    header('Location: list_pengajuan.php?template=failed_edit');
}
