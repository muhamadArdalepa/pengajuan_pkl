<!--
Nama File   : form_daftar.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Halaman untuk memasukkan pendaftar baru
-->
<?php
include "koneksi.php";
$sql = "SELECT * FROM pengajuan_pkl WHERE id=".$_GET['id'];
$query = mysqli_query($db,$sql);
$list = mysqli_fetch_assoc($query);

$title = "Edit Pengajuan | Information System of Informatics Engineering";
$index = 5;
$is_nogin = true;
include "assets/template/god.php";
include "assets/template/star.php";
?>
<div class="galaxy galaxy-active">
    <?php include "assets/template/sun.php";?>
    <div class="earth text-center">

        <form class="form-container d-inline-block text-start" action="proses_edit_pengajuan.php" method="POST">
            <h3 class="text-center">EDIT PENGAJUAN</h3>
            <h1 class="text-center mb-4">PKL</h1>
            <div class="form-group d-flex">
                <input type="hidden" name="id" id="id" value="<?= $list['id'];?>" required>
                <div class="form-input-group me-3" style="width: 100%;">
                    <label for="nama_mahasiswa">Nama</label>
                    <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?= $list['nama_mahasiswa'];?>" required>
                </div>
                <div class="form-input-group">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="A" <?= $list['kelas'] == "A" ? "selected" : "";?> >A</option>
                        <option value="B" <?= $list['kelas'] == "B" ? "selected" : "";?> >B</option>
                        <option value="C" <?= $list['kelas'] == "C" ? "selected" : "";?> >C</option>
                        <option value="D" <?= $list['kelas'] == "D" ? "selected" : "";?> >D</option>
                        <option value="I" <?= $list['kelas'] == "IC" ? "selected" : "";?> >IC</option>
                    </select>
                </div>
                
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" style="width: 100%;">
                    <option value="Pending" <?= $list['status'] == "Pending" ? "selected" : "";?> >Pending</option>
                    <option value="Diterima" <?= $list['status'] == "Diterima" ? "selected" : "";?> >Diterima</option>
                    <option value="Ditolak" <?= $list['status'] == "Ditolak" ? "selected" : "";?> >Ditolak</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_tempat">Nama Tempat</label>
                <input type="text" name="nama_tempat" id="nama_tempat" value="<?= $list['nama_tempat'];?>" required>
            </div>

            <div class="form-group">
                <label for="ket">Keterangan</label>
                <textarea name="ket" id="ket" rows="5"><?= $list['ket'];?></textarea>
            </div>

            <div class="btn-group d-flex">
                <button class="btn me-3" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i>Go&nbsp;Back</button>
                <button class="btn ms-3"><input style="border: none;text-align: left;" type="submit" value="Simpan" name="simpan"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </form>
    </div>

    <?php include "assets/template/grass.php";?>
</div>
<?php include "assets/template/crust.php";?>