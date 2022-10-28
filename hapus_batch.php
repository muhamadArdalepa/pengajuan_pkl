<!-- 
Nama File   : hapus_batch.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Melakukan proses hapus data secara batch
-->
<?php 
include "koneksi.php";
if (isset($_POST['delete_batch'])) {
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM mahasiswa WHERE id IN (";
        for ($i=0; $i < count($id); $i++) { 
            $sql .= $id[$i];
            if (!($i == (count($id)-1))) {$sql .= ",";}else{$sql .= ")";}
        }
        $query = mysqli_query($db,$sql);
        if ($query) {
            // apabila query berhasil, kembalikan ke halaman list_pendaftar dan ptambahkan pesan berhasil menghaspus
            header('Location: list_pendaftar.php?template=success_hapus');
        }else{
            // jika query gagal, program akan dihentikan
            die("Gagal melakukan hapus");
        }
    }else{
        header("Location: list_pendaftar.php?template=no_select");
    }
}else{
    die("Akses dilarang");
}