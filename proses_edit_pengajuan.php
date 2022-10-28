<!-- 
    Nama File   : proses_edit.php
    NIM         : 3202016004
    Nama        : Muhamad Ardalepa
    Deskripsi   : Melakukan pemrosesan edit data
 -->
<?php
//memuat modul koneksi database
include "koneksi.php";
// mengecek apakah user mengakses file ini melalui tombol simpan, atau tidak
// yaitu dengan mengecek, apakah pada super variable post terdapat key "simpan"
if(isset($_POST['simpan'])){
    // jika true, isi semua variable sesuai dengan yang diinpukan user pada form edit
    $id = $_POST['id'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    $nama_tempat = $_POST['nama_tempat'];
    $ket = $_POST['ket'];

    // query mysql untuk mengubah data(nim, nama, jenis kelamin, tanggal lahir, dan alamat)
    // berdasarkan id mahasiswa
    $sql = "UPDATE pengajuan_pkl set nama_mahasiswa='$nama_mahasiswa', status='$status',
            kelas='$kelas',nama_tempat='$nama_tempat',
            ket='$ket' WHERE id=$id";
    $query = mysqli_query($db,$sql);

    if ($query) {
        // jika query berhsil, kembalikan user ke halaman list pendaftar dengan pesan sukses
        header('Location: list_pengajuan.php?template=success_edit');
    }else{
        // jika gagal, kembalikan user ke halaman list pendaftar dengan pesan failed
        header('Location: list_pengajuan.php?template=failed_edit');
    }
}else{
    // jika user mengakses file ini tanpa melalui form edit, maka program akan dihentikan.
    die("Akses dilarang");
}