<?php
$title = "Pengajuan PKL | Information System of Informatics Engineering";
$index = 4;
$is_nogin = true;
include "assets/template/god.php";
include "assets/template/star.php";
?>
<div class="galaxy galaxy-active">
    <?php include "assets/template/sun.php";?>
    <div class="earth text-center">
        <form class="form-container d-inline-block text-start" action="proses_pengajuan.php" method="POST">
            <h3 class="text-center">FORMULIR PENGAJUAN</h3>
            <h1 class="text-center mb-4">PKL</h1>
            <div class="form-group d-flex">
                <div class="form-input-group me-3" style="width: 100%;">
                    <label for="nama_mahasiswa">Nama</label>
                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" required>
                </div>
                <div class="form-input-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="I">IC</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_tempat">Nama Tempat</label>
                <input type="text" name="nama_tempat" id="nama_tempat" required>
            </div>
            <div class="form-group">
                <label for="ket">Keterangan</label>
                <textarea name="ket" id="ket" rows="5"></textarea>
            </div>
            <div class="btn-group d-flex">
                <button class="btn me-3" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i>Go&nbsp;Back</button>
                <button class="btn ms-3"><input style="border: none;text-align: left;" type="submit" value="Submit" name="submit"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </form>
    </div>

    <?php include "assets/template/grass.php";?>
</div>
<?php include "assets/template/crust.php";?>