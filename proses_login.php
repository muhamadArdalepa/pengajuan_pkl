<!-- 
    Nama File   : proses_login.php
    NIM         : 3202016004
    Nama        : Muhamad Ardalepa
    Deskripsi   : Pemrosesan login
 -->
<?php 
//memuat modul koneksi database
include "koneksi.php";
// mengecek apakah user mengakses file ini melalui tombol login, atau tidak
// yaitu dengan mengecek, apakah pada super variable post terdapat key "submit"
if (isset($_POST['submit'])) {
    // jika true, isi semua variable sesuai dengan yang diinpukan user pada form login
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // karena pada database password yang ditampung merupakan password yang terenkripsi, maka untuk proses pengecekan password, harus dengan password yang terenkripsi juga
    //mengenkripsi password yang user inputkan
    $password_encrypted = sha1($password);

    // mengecek apakah username dan password sesuai dengan yang ada di database
    echo $sql = "SELECT * FROM user WHERE username='$username' AND password='$password_encrypted'";
    $query = mysqli_query($db,$sql);

    if($result = mysqli_fetch_array($query)){
        // jika username dan password benar, mulai session dan masukkan username ke dalam session username
        session_start();
        $_SESSION['user'] = $result;
        //lalu arahkan ke halaman dashboard
        header("Location: index.php?template=success_login");
    }else{
        // jika username dan password salah, kembalikan ke login page
        header("Location: login.php?template=failed_login");
    }
}else{
    // jika user mengakses file ini tanpa melalui form login, maka program akan dihentikan.
    die("Akses ditolak");
}
