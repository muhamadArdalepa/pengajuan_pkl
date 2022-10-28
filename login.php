<!-- 
Nama File   : login.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Halaman login
-->
<?php
$title = "Login | Information System of Informatics Engineering";
$index = 0;
$is_nogin = false;
include "assets/template/god.php";
include "assets/template/sun.php";
?>
<div class="vh-100 pos-rel" style="padding-top: var(--sun-height);">
    <div class="form-container perfect-center">
        <h1 class="mb-4 text-center">LOGIN</h1>
            <!-- form login -->
            <!-- form ini akan mengirimkan username dan password ke proses login dengan metode post -->
        <form  action="proses_login.php" method="post">
        <div class="form-group">
            <label for="user-username">Username</label>
            <input type="username" id="user-username" name="username" required  autocomplete="name">
        </div>
        <div class="form-group">
            <label for="user-password">Password</label>
            <input type="password" id="user-password" name="password" required>
        </div>
            <!-- link apabila user lupa password -->
        <a href="forgot_password.php">
            <legend>Forgot Password</legend>
        </a>
        <input class="btn" type="submit" value="Login" name="submit">
        </form>
    </div>
</div>
        <!-- end form login -->
<?php include "assets/template/crust.php";?>