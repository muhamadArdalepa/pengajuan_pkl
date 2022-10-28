<!-- 
Nama File   : koneksi.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : File modul koneksi ke database
-->
<?php 
$server = "localhost"; // nama server
$user = "root"; // nama user
$pass = ""; // password
$db_name = "pemrograman_web"; // nama database

// membuat variabel untuk koneksi ke database
$db = mysqli_connect($server,$user,$pass,$db_name);
if (!$db) {
    // apabila gagal terhubung, hentikan program
    die("gagal terhubung ke database : ". mysqli_connect_error());
}