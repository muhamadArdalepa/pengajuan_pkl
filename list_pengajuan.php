<?php
$title = "List Pengajuan PKL | Information System of Informatics Engineering";
$index = 5;
$is_nogin = true;
include "koneksi.php";
include "assets/template/god.php";
include "assets/template/star.php";
if(isset($_GET['search'])){$search = $_GET['search'];}else{$search="";}
if(isset($_GET['sort'])){$sort = $_GET['sort'];}else{$sort = "id";}
if(isset($_GET['sc'])){$sc = $_GET['sc'];}else{$sc = "asc";}
if(isset($_GET['page'])){$page = $_GET['page'];}else{$page=1;}
if(isset($_GET['filter'])){$filter = $_GET['filter'];}else{$filter = ["nama_mahasiswa","kelas","nama_tempat","tanggal_pengajuan","status"];}
$get_str = "search=$search&sort=$sort&sc=$sc&filter[]=".implode("&filter[]=",$filter)."&page=$page";
?>
<div class="galaxy galaxy-active">
    <?php include "assets/template/sun.php";?>
    <div class="earth">
        <div class="earth-god">
            <h1>LIST PENGAJUAN PKL</h1>
            <a href="form_pengajuan.php" class="btn" ><i class="fa-solid fa-plus"></i>&nbsp;Tambah&nbsp;Pengajuan</a>
        </div>

        <form class="tool-form py-3" action="list_pengajuan.php" method="get">
            <div class="tool-group">
                <input class="me-1" type="checkbox" name="filter[]" id="nama_mahasiswa" value="nama_mahasiswa" <?= in_array("nama_mahasiswa",$filter)?"checked":"";?>>
                <label class="me-2" for="nama_mahasiswa">Nama</label>
                <input class="me-1" type="checkbox" name="filter[]" id="kelas" value="kelas" <?= in_array("kelas",$filter)?"checked":"";?>>
                <label class="me-2" for="kelas">Kelas</label>
                <input class="me-1" type="checkbox" name="filter[]" id="nama_tempat" value="nama_tempat" <?= in_array("nama_tempat",$filter)?"checked":"";?>>
                <label class="me-2" for="nama_tempat">Tempat</label>
                <input class="me-1" type="checkbox" name="filter[]" id="tanggal_pengajuan" value="tanggal_pengajuan" <?= in_array("tanggal_pengajuan",$filter)?"checked":"";?>>
                <label class="me-2" for="tanggal_pengajuan">Tanggal</label>
                <input class="me-1" type="checkbox" name="filter[]" id="status" value="status" <?= in_array("status",$filter)?"checked":"";?>>
                <label for="status">Status</label>
            </div>
            <div class="tool-group"style="flex-grow: 1;">
                <input class="search-box" type="text" name="search" value="<?= $search;?>">
                <button class="search-btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="tool-group ">

                <select class="ms-1" name="sort"  onchange="this.form.submit()">
                    <option value="nama_mahasiswa" <?= $sort=="nama_mahasiswa" ? "selected" : null;?>>Nama</option>
                    <option value="kelas" <?= $sort=="kelas" ? "selected" : null;?>>Kelas</option>
                    <option value="nama_tempat" <?= $sort=="nama_tempat" ? "selected" : null;?>>Tempat</option>
                    <option value="tanggal_pengajuan" <?= $sort=="tanggal_pengajuan" ? "selected" : null;?>>Tanggal</option>
                    <option value="status" <?= $sort=="status" ? "selected" : null;?>>Status</option>
                </select>

                <input class="ms-2" type="radio" name="sc" value="ASC" id="ASC" <?= $sc=="ASC" ? "checked" : null;?> onchange="this.form.submit()">
                <label class="ms-1" for="ASC">ASC</label>
                <input class="ms-2" type="radio" name="sc" value="DESC" id="DESC" <?= $sc=="DESC" ? "checked" : null;?> onchange="this.form.submit()">
                <label class="ms-1" for="DESC">DESC</label>
            </div>
        </form>
        <?php 
        if($search!=""){
            echo "<a href=\"list_pengajuan.php?".str_replace("search=".$search."&","",$get_str)."\" class=\"badge mb-3\">$search</a>";
        };?>

        <form action="hapus_batch_pengajuan.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Nama Tempat</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Waktu Balasan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                $sql = "SELECT * FROM pengajuan_pkl";
                if($search!=""){
                    $sql .= " WHERE";
                    for ($i=0; $i < count($filter); $i++) { 
                        $sql .= " ".$filter[$i]. " LIKE '%".$search."%'";
                        if (!($i == (count($filter)-1))) {
                            $sql .= " or";
                        }
                    }
                }



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

                        <td style="width: 3rem;vertical-align: middle;">
                            <div class="d-flex" style="align-items: center;justify-content: space-between;">
                                <label for="id-<?= $list['id'];?>"><?= ++$no;?></label>
                                <input type="checkbox" name="id[]" id="id-<?= $list['id'];?>" value="<?= $list['id'];?>">
                            </div>
                        </td>

                        <td><?= $list['nama_mahasiswa'];?></td>
                        <td>
                            <?= $list['kelas']=="I"?"IC":$list['kelas'];?>
                        </td>
                        <td><?= $list['nama_tempat'];?></td>
                        <td><?= $list['tanggal_pengajuan'];?></td>
                        
                        <td style="width: 3rem;vertical-align: middle;">
                            <div class="d-flex" style="align-items: center;justify-content: space-between;">
                                    <?= $list['status'];?>
                                    <?php if($list['status']=='Pending'){;?>
                                        <a href="proses_status.php?status=Diterima&id=<?= $list['id'];?>" class="badge small mx-2"><i class="fa-solid fa-check"></i></a>
                                        <a href="proses_status.php?status=Ditolak&id=<?= $list['id'];?>" class="badge small"><i class="fa-solid fa-xmark"></i></a>
                                    <?php };?>
                            </div>
                        </td>
                        <td><?= $list['waktu_balasan'];?></td>
                        <td><?= $list['ket'];?></td>

                        <td style="width: 6rem; text-align: center;">
                            <a class="badge small" href="form_edit_pengajuan.php?id=<?= $list['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                           
                            <a class="badge small" href="hapus_pengajuan.php?id=<?= $list['id'];?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php };?>
                </tbody>
            </table>
            
            <div class="tool-form py-3">
                <div class="tool-group">
                    <input class="btn me-1" type="reset" name="reset" id="" value="Reset">
                    <input class="btn" type="submit" name="delete_batch" id="" value="Hapus yang ditandai">
                </div>

                <div class="tool-group">
                    <?php 
                    $get_str_no_page = str_replace("page=".$page,"",$get_str);
                    ;?>
                    <?= ($page>1) ? "<a class=\"btn\" href=\"?$get_str_no_page page=".($page-1)."\">&laquo;</a>" : null ?>
                    
                    <?php for ($i=1; $i <= $n_page; $i++) { ?>
                        <a class="btn <?= $i==$page ? "btn-active" : null;?>" href="list_pengajuan.php?<?= $get_str_no_page."page=".$i;?>"><?= $i;?></a>
                    <?php };?>

                    <?= !($page==$n_page) ? "<a class=\"btn\" href=\"?$get_str_no_page page=".($page+1)."\">&raquo;</a>" : null ?>
                </div>
                <p class="badge">
                    Total Data
                    <?php $sql = "SELECT * FROM pengajuan_pkl";$all = mysqli_query($db,$sql);$total = mysqli_num_rows($all);echo $total?>
                </p>
            </div>

        </form>
    </div>
    <?php include "assets/template/grass.php";?>
</div>
<?php include "assets/template/crust.php";?>