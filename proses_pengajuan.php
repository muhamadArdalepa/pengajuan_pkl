<?php
include "koneksi.php";

if(isset($_POST['submit'])){

    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $kelas = $_POST['kelas'];
    $nama_tempat = $_POST['nama_tempat'];
    $ket = $_POST['ket'];
    $tanggal_pengajuan = date('Y-m-d');



    $sql = "INSERT INTO pengajuan_pkl VALUES(null,'$nama_mahasiswa','$kelas','$nama_tempat','$tanggal_pengajuan','Pending',null,'$ket')";
    $query = mysqli_query($db,$sql);

    if ($query) {

        header('Location: list_pengajuan.php?template=success_daftar');
    }else{

        header('Location: list_pengajuan.php?template=failed_daftar');
    }
}else{

    die("Akses dilarang");
}