<!-- 
    Nama File   : proses_pendaftaran.php
    NIM         : 3202016004
    Nama        : Muhamad Ardalepa
    Deskripsi   : Melakukan pemrosesan data yang akan dikirimkan ke database
 -->
<?php
//memuat modul koneksi database
include "koneksi.php";

// mengecek apakah user mengakses file ini melalui tombol daftar, atau tidak
// yaitu dengan mengecek, apakah pada super variable post terdapat key "daftar"
if(isset($_POST['daftar'])){
    // jika true, isi semua variable sesuai dengan yang diinpukan user pada form daftar
    $nim = $_POST['nim'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // query mysql untuk menambahkan data
    // karena pada kasus ini id bertipe bigint yang auto increment, maka id cukup diisi dengan null
    $sql = "INSERT INTO mahasiswa VALUES(null,'$nim','$nama_mahasiswa','$jenis_kelamin','$tanggal_lahir','$alamat')";
    $query = mysqli_query($db,$sql);

    if ($query) {
        // jika query berhsil, kembalikan user ke halaman list pendaftar dengan pesan sukses
        header('Location: list_pendaftar.php?template=success_daftar');
    }else{
        // jika gagal, kembalikan user ke halaman list pendaftar dengan pesan failed
        header('Location: list_pendaftar.php?template=failed_daftar');
    }
}else{
    // jika user mengakses file ini tanpa melalui form daftar, maka program akan dihentikan.
    die("Akses dilarang");
}