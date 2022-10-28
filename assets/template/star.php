
<div class="star star-active">
    <h3 class="star-god">MENU</h3>
    <div class="star-system">
        <div class="star-head">
            <small>Logged&nbsp;in&nbsp;as</small>
            <div class="star-picture" style="background-image: url(assets/img/<?= $user['img']; ?>);"></div>
            <div><?= str_replace(" ","&nbsp;",$user['full_name']);?></div>
            <small class="mb-3"><?= $user['role'];?></small>
            <a href="index.php" class="star-member mb-2 <?= $index == 1 ? "star-member-active":"" ?>">Dashboard<i class="fa-solid fa-house"></i></a>
            <a href="list_pendaftar.php" class="star-member mb-2 <?= $index == 2 ? "star-member-active":"" ?>">List&nbsp;Pendaftar&nbsp;<i class="fa-solid fa-table"></i></a>
            <a href="form_daftar.php" class="star-member mb-2 <?= $index == 3 ? "star-member-active":"" ?>">Daftar&nbsp;Baru&nbsp;<i class="fa-solid fa-plus"></i></a>
            <a href="form_pengajuan.php" class="star-member mb-2 <?= $index == 4 ? "star-member-active":"" ?>">Pengajuan&nbsp;PKL&nbsp;<i class="fa-solid fa-briefcase"></i></a>
            <a href="list_pengajuan.php" class="star-member <?= $index == 5 ? "star-member-active":"" ?>">List&nbsp;Pengajuan&nbsp;<i class="fa-solid fa-table-list"></i></a>
        </div>
        <a class="star-member" href="logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
</div>