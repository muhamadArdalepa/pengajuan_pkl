<!-- 
Nama File   : form_edit.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Halaman untuk memasukkan pendaftar baru
-->
<?php
include "koneksi.php";
$sql = "SELECT * FROM mahasiswa WHERE id=".$_GET['id'];
$query = mysqli_query($db,$sql);
$list = mysqli_fetch_assoc($query);

$title = "Ubah ".$list['nama_mahasiswa']." | Information System of Informatics Engineering";
$index = 2;
$is_nogin = true;
include "assets/template/god.php";
include "assets/template/star.php";
?>
<div class="galaxy galaxy-active">
    <?php include "assets/template/sun.php";?>
    <div class="earth text-center">

        <form class="form-container d-inline-block text-start" action="proses_edit.php" method="POST">
            <h3 class="text-center">FORMULIR PENGUBAHAN</h3>
            <h1 class="text-center mb-4">MAHASISWA</h1>
            <!-- grouping label dan input NIM menggunakan div -->
            <input type="hidden" name="id" value="<?= $list['id'];?>">
            <div class="form">
                <label for="nim">NIM</label>
                <input value="<?= $list['nim'];?>" type="text" name="nim" id="nim" required>
            </div>

            <!-- grouping label dan input Nama menggunakan div -->
            <div class="form-group">
                <label for="nama_mahasiswa">Nama</label>
                <input value="<?= $list['nama_mahasiswa'];?>" type="text" name="nama_mahasiswa" id="nama_mahasiswa" required>
            </div>

            <!-- grouping label dan input Jenis Kelamin menggunakan div -->
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input value="<?= $list['jenis_kelamin'];?>" type="text" name="jenis_kelamin" id="jenis_kelamin" required>
            </div>

            <!-- grouping label dan input Tanggal Lahir menggunakan div -->
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>

                <!-- tanggal lahir menggunakan input[type=date] agar pada saat proses input tanggal, format yang dikirimkan, sesuai dengan format tanggal di database(mysql) -->
                <input value="<?= $list['tanggal_lahir'];?>" type="date" name="tanggal_lahir" id="tanggal_lahir" required>
            </div>

            <!-- grouping label dan input Alamat menggunakan div -->
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" placeholder="Alamat" rows="5"><?= $list['alamat'];?></textarea>
            </div>

            <!-- tombol kembali -->
            <div class="btn-group d-flex">
                <button class="btn me-3" onclick="history.back()"><i class="fa-solid fa-chevron-left"></i>Go&nbsp;Back</button>
                <button class="btn ms-3"><input style="border: none;text-align: left;" type="submit" value="Simpan" name="simpan"><i class="fa-solid fa-floppy-disk"></i></button>
                
            </div>
        </form>
    </div>

        <!-- end form pendaftaran-->
    <?php include "assets/template/grass.php";?>
</div>
<?php include "assets/template/crust.php";?>