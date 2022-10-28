<!-- Nama File   : proses_edit.php
    NIM         : 3202016004
    Nama        : Muhamad Ardalepa
    Deskripsi   : Melakukan pemrosesan edit data -->
<?php //memuat modul koneksi database
include "koneksi.php";
// mengecek apakah user mengakses file ini melalui tombol simpan, atau tidak
// yaitu dengan mengecek, apakah pada super variable post terdapat key "simpan"
if(isset($_POST['simpan'])){
    // jika true, isi semua variable sesuai dengan yang diinpukan user pada form edit
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    // query mysql untuk mengubah data(nim, nama, jenis kelamin, tanggal lahir, dan alamat)
    // berdasarkan id mahasiswa
    $sql = "UPDATE mahasiswa set nim='$nim', nama_mahasiswa='$nama_mahasiswa',
            jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',
            alamat='$alamat' WHERE id=$id";
    $query = mysqli_query($db,$sql);
    if ($query) {
        // jika query berhsil, kembalikan user ke halaman list pendaftar dengan pesan sukses
        header('Location: list_pendaftar.php?template=success_edit');
    }else{
        // jika gagal, kembalikan user ke halaman list pendaftar dengan pesan failed
        header('Location: list_pendaftar.php?template=failed_edit');
    }
}else{
    // jika user mengakses file ini tanpa melalui form edit, maka program akan dihentikan.
    die("Akses dilarang");
}