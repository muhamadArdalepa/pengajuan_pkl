<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/0c0888491f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="universe">
        <div class="star star-active">
            <h3 class="star-god">MENU</h3>
            <div class="star-system">
                <div class="star-head">
                    <small>Logged&nbsp;in&nbsp;as</small>
                    <div class="star-picture" style="background-image: url(assets/img/profile.png);"></div>
                    <div>MUHAMAD&nbsp;ARDALEPA</div>
                    <small class="mb-3">Universe&nbsp;Administrator</small>
                    <a href="index.php" class="star-member mb-2">Dashboard<i class="fa-solid fa-house"></i></a>
                    <a href="list_pendaftar.php" class="star-member mb-2">List&nbsp;Pendaftar&nbsp;<i class="fa-solid fa-plus"></i></a>
                    <a href="form_daftar.php" class="star-member">Daftar&nbsp;Baru&nbsp;<i class="fa-solid fa-table"></i></a>
                </div>
                <a class="star-member" href="logout.php">Logout<i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
        <div class="galaxy galaxy-active">
            <nav class="sun">
                <button class="star-toggle" onclick="toggleStar()"></button>
                <div class="sun-god">
                    <h3>ISIE</h3>
                    <div>&nbsp;|&nbsp;Information&nbsp;System&nbsp;of&nbsp;Informatics&nbsp;Engineering&nbsp;</div>
                </div>
                <hr style="width: 100%;">
            </nav>
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
            <div class="grass">
                <div class="grass-system">
                    <small>&#169;</small>
                    <small>Muhamad Ardalepa</small>
                    <small>Wallnut</small>
                    <small>2022</small>
                </div>
                <div class="grass-system">
                    <a href="https://github.com/muhamadArdalepa" class="small"><i class="fa-brands fa-github"></i></a>
                    <a href="https://wa.me/6281521544674" class="small"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="https://t.me/hex_ff0000" class="small"><i class="fa-brands fa-telegram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/script/script.js"></script>
</body>
</html>