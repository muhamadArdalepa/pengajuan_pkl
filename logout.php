<!-- 
Nama File   : logout.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Melakukan Logout
-->
<?php
// memulai fungsi dari session
session_start();
// menambahkan session username
$_SESSION['username'];
// menghapus isi dari session username
unset($_SESSION['username']);
// menghapus semua session
session_unset();
// menghapus session
session_destroy();
// mengembalikan user ke halaman login
header("Location: login.php");