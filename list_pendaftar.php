<!-- 
Nama File   : list pendaftar.php
NIM         : 3202016004
Nama        : Muhamad Ardalepa
Deskripsi   : Halaman untuk menampilkan list pendaftar
-->
<?php
$title = "List Pendaftar | Information System of Informatics Engineering";
$index = 2;
$is_nogin = true;
include "koneksi.php";
include "assets/template/god.php";
include "assets/template/star.php";

// proses pengolahan URL
if(isset($_GET['search'])){$search = $_GET['search'];}else{$search="";}
if(isset($_GET['sort'])){$sort = $_GET['sort'];}else{$sort = "id";}
if(isset($_GET['sc'])){$sc = $_GET['sc'];}else{$sc = "asc";}
if(isset($_GET['page'])){$page = $_GET['page'];}else{$page=1;}
if(isset($_GET['filter'])){$filter = $_GET['filter'];}else{$filter = ["nim","nama_mahasiswa","jenis_kelamin","alamat"];}

$get_str = "search=$search&sort=$sort&sc=$sc&filter[]=".implode("&filter[]=",$filter)."&page=$page";

?>
<div class="galaxy galaxy-active">
    <?php include "assets/template/sun.php";?>
    <div class="earth">
        <div class="earth-god">
            <h1>LIST PENDAFTAR</h1>
            <a href="form_daftar.php" class="btn" ><i class="fa-solid fa-plus"></i>&nbsp;Tambah&nbsp;Pendaftar</a>
        </div>

        <form class="tool-form py-3" action="list_pendaftar.php" method="get">
            <!-- filter -->
            <div class="tool-group">
                <span class="btn me-1"><i class="fa-solid fa-filter"></i></span>
                <!-- mengecek, apakah ada data kolom yang difilter -->
                <input class="me-1" type="checkbox" name="filter[]" id="nim" value="nim" <?= in_array("nim",$filter)?"checked":"";?>>
                <label class="me-2" for="nim">NIM</label>
                <input class="me-1" type="checkbox" name="filter[]" id="nama_mahasiswa" value="nama_mahasiswa" <?= in_array("nama_mahasiswa",$filter)?"checked":"";?>>
                <label class="me-2" for="nama_mahasiswa">Nama</label>
                <input class="me-1" type="checkbox" name="filter[]" id="jenis_kelamin" value="jenis_kelamin" <?= in_array("jenis_kelamin",$filter)?"checked":"";?>>
                <label class="me-2" for="jenis_kelamin">Jenis&nbsp;Kelamin</label>
                <input class="me-1" type="checkbox" name="filter[]" id="alamat" value="alamat" <?= in_array("alamat",$filter)?"checked":"";?>>
                <label for="alamat">Alamat</label>
                <!-- end filter -->
            </div>
            <div class="tool-group"style="flex-grow: 1;">
                <input class="search-box" type="text" name="search" value="<?= $search;?>">
                <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="tool-group ">

            <!-- sort -->
                <span class="btn"><i class="fa-solid fa-sort"></i></span>
                <select class="ms-1" name="sort"  onchange="this.form.submit()">
                    <option value="id" <?= $sort=="id" ? "selected" : null;?>>Waktu Daftar</option>
                    <option value="nim" <?= $sort=="nim" ? "selected" : null;?>>NIM</option>
                    <option value="nama_mahasiswa" <?= $sort=="nama_mahasiswa" ? "selected" : null;?>>Nama</option>
                    <option value="jenis_kelamin" <?= $sort=="jenis_kelamin" ? "selected" : null;?>>Jenis Kelamin</option>
                    <option value="tanggal_lahir" <?= $sort=="tanggal_lahir" ? "selected" : null;?>>Tanggal Lahir</option>
                    <option value="alamat" <?= $sort=="alamat" ? "selected" : null;?>>Alamat</option>
                </select>

                <input class="ms-2" type="radio" name="sc" value="ASC" id="ASC" <?= $sc=="ASC" ? "checked" : null;?> onchange="this.form.submit()">
                <label class="ms-1" for="ASC">ASC</label>
                <input class="ms-2" type="radio" name="sc" value="DESC" id="DESC" <?= $sc=="DESC" ? "checked" : null;?> onchange="this.form.submit()">
                <label class="ms-1" for="DESC">DESC</label>
                <!-- end sort -->
            </div>
        </form>
        <?php 
        if($search!=""){
            echo "<a href=\"list_pendaftar.php?".str_replace("search=".$search."&","",$get_str)."\" class=\"badge mb-3\">$search</a>";
        };?>
        <!-- end nav pencarian -->

        <!-- form hapsu batch  -->
        <form action="hapus_batch.php" method="post">
            <!-- table pendaftar -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $sql = "SELECT * FROM mahasiswa";
                if($search!=""){
                    $sql .= " WHERE";
                    for ($i=0; $i < count($filter); $i++) { 
                        $sql .= " ".$filter[$i]. " LIKE '%".$search."%'";
                        if (!($i == (count($filter)-1))) {
                            $sql .= " or";
                        }
                    }
                }


                // sorting
                if($sort!=""){
                    $sql .= " ORDER BY $sort $sc";
                }

                $offset = 5;
                $query = mysqli_query($db,$sql);
                $total = mysqli_num_rows($query);
                $n_page =  $total%$offset==0 ? ceil($total/$offset)  + 1 : ceil($total/$offset) ;

                if($page!=""){
                    $limit = (($page-1)*$offset);
                    $sql .= " LIMIT $limit,$offset";
                }else{
                    $limit=0;
                    $sql .= " LIMIT $offset";
                }

                $no = $limit;
                $query = mysqli_query($db,$sql);


                while($list=mysqli_fetch_array($query)){;?>
                    <tr>
                        <!-- menampilkan sekaligus menambahkan variable $no pada setiap perulangan -->

                        <td style="width: 3rem;vertical-align: middle;">
                            <div class="d-flex" style="align-items: center;justify-content: space-between;">
                                <!-- select -->
                                <label for="id-<?= $list['id'];?>"><?= ++$no;?></label>
                                <input type="checkbox" name="id[]" id="id-<?= $list['id'];?>" value="<?= $list['id'];?>">
                                <!-- end select -->
                            </div>
                        </td>

                        <!-- menampilkan data yang telah ditampung dalam variable list, sesuai nama table yang ada di database -->
                        <td><?= $list['nim'];?></td>
                        <td><?= $list['nama_mahasiswa'];?></td>
                        <td><?= $list['jenis_kelamin'];?></td>
                        <td><?= $list['tanggal_lahir'];?></td>
                        <td><?= $list['alamat'];?></td>

                        <!-- cell aksi akan menampung button atau link aksi, seperti edit, hapus dan detail -->
                        <td style="width: 6rem; text-align: center;">
                            <!-- link edit akan mengarahkan halaman ke form edit dengan parameter id -->
                            <a class="badge small" href="form_edit.php?id=<?= $list['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                           
                            <!-- link hapus akan menghapus data berdasarkan  id -->
                            <a class="badge small" href="hapus.php?id=<?= $list['id'];?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php };?>
                </tbody>
            </table>
            <!-- end table pendaftar -->
            
            <!-- tombol reset dan hapus untuk data yang telah ditandai -->
            <div class="tool-form py-3">
                <div class="tool-group">
                    <input class="btn me-1" type="reset" name="reset" id="" value="Reset">
                    <input class="btn" type="submit" name="delete_batch" id="" value="Hapus yang ditandai">
                </div>

                <!-- pagination -->
                <div class="tool-group">
                    <?php 
                    $get_str_no_page = str_replace("page=".$page,"",$get_str);
                    ;?>
                    <?= ($page>1) ? "<a class=\"btn\" href=\"?$get_str_no_page page=".($page-1)."\">&laquo;</a>" : null ?>
                    
                    <?php for ($i=1; $i <= $n_page; $i++) { ?>
                        <a class="btn <?= $i==$page ? "btn-active" : null;?>" href="list_pendaftar.php?<?= $get_str_no_page."page=".$i;?>"><?= $i;?></a>
                    <?php };?>

                    <?= !($page==$n_page) ? "<a class=\"btn\" href=\"?$get_str_no_page page=".($page+1)."\">&raquo;</a>" : null ?>
                </div>
                <!-- end pagination -->



                <p class="badge">
                    Total Data
                    <?php $sql = "SELECT * FROM mahasiswa";$all = mysqli_query($db,$sql);$total = mysqli_num_rows($all);echo $total?>
                </p>
            </div>

        </form>
    </div>
    <?php include "assets/template/grass.php";?>
</div>
<?php include "assets/template/crust.php";?>