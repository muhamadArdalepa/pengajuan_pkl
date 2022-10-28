<!-- 
Nama File   : index.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : File index sebagai dashboard utama
-->
<?php
$title = "ISIE | Information System of Informatics Engineering";
$index = 1;
$is_nogin = true;
include "assets/template/god.php";
include "assets/template/star.php";
?>
<div class="galaxy galaxy-active">
    <?php include "assets/template/sun.php";?>
    <div class="marvel pos-rel">
        <div class="marvel-system">
            <div class="marvel-god">
                <small>WELCOME TO</small>
                <h1 style="color: var(--healor);">INFORMATION&nbsp;SYSTEM</h1>
                <h2>OF&nbsp;INFORMATICS&nbsp;ENGINEERING</h2>
                <p>Politeknik&nbsp;Negeri&nbsp;Pontianak</p>
                <div class="mt-3">
                    <a href="form_daftar.php" class="btn"><i class="fa-solid fa-plus"></i>&nbsp;Tambah&nbsp;Pendaftar</a>
                    <a href="list_pendaftar.php" class="btn"><i class="fa-solid fa-table"></i>&nbsp;List&nbsp;Pendaftar</a>
                </div>
            </div>
            <img class="marvel-picture" src="https://polnep.ac.id/uploads/blog/621446a722d16.png" alt="">
        </div>
    </div>
    <?php include "assets/template/grass.php";?>
</div>
<?php include "assets/template/crust.php";?>