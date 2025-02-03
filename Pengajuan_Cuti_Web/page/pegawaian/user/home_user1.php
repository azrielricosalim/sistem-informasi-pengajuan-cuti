
<?php

require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
$statuse = isset($_GET['statuse']) ? ($_GET['statuse']) : false;


?>

<link rel="stylesheet" href="../../style/style.css">

<div class="data-user"><h1>data pengajuan cuti</h1>
<?php if($process_user == 'success') :?>
            <div class="alert alert-success" role="alert">
                data berhasil di masukan
            </div>
<?php endif; ?>

<?php if($status == 'success') :?>
            <div class="alert alert-success" role="alert">
                data berhasil di update
            </div>
<?php endif; ?>

<?php if($statuse == 'success') :?>
            <div class="alert alert-success" role="alert">
                data berhasil di hapus
            </div>
<?php endif; ?></div> 

<form method="post" action="" class="pencarian">
    <input type="text" name="search" placeholder="Cari nama..." class="i_pencarian">
    <input type="submit" name="submit" value="tampilkan | cari" class="b_pencarian">
</form>


<table class="table">
    
    <thead>
        <tr>
        <th scope="col" class="data">No</th>
        <th scope="col" class="data">nama lengkap</th>
        <th scope="col" class="data">nip</th>
        <th scope="col" class="data">lama cuti</th>
        <th scope="col" class="data">jenis kelamin</th>
        <th scope="col" class="data">tanggal mulai</th>
        <th scope="col" class="data">tanggal selesai</th>
        <th scope="col" class="data">jenis cuti</th>
        <th scope="col" class="data">nama_panitera</th>
        <th scope="col" class="data">nama_ketua</th>
        <th scope="col" class="data">app_panitera</th>
        <th scope="col" class="data">app_ketua</th>
        <th scope="col" class="data">Action</th>
        </tr>
    </thead>
    <tbody class="box-data">

        <?php
        if (isset($_POST['submit'] ) == '$_SESSION[nip]') {
            $search = $_POST['search'];
        
            // SQL query untuk mencari nama di dalam tabel
            
            // $sql = "SELECT * FROM pengajuan_cuti_pegawai WHERE  nama_lengkap LIKE '%$search%'";
            $result = $koneksi->query("SELECT * FROM tbl_data_cuti_pegawai AS cuti
                        INNER JOIN 
                            tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai 
                            WHERE pegawai.nama_pegawai LIKE '%$search%'");
            $user = $result->fetch_all(MYSQLI_REFRESH_GRANT);
            // $result = $koneksi->query($sql);

            // $result = $koneksi->query($user);
        }else{
            $id_user = $_SESSION['id_user'];

            $user = $koneksi->query("SELECT 
                cuti.*,
                pegawai.*
                FROM 
                tbl_data_cuti_pegawai AS cuti
            INNER JOIN 
                tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai WHERE pegawai.nip='$_SESSION[nip]'
                ")->fetch_all(MYSQLI_REFRESH_GRANT);
        }
            
            $no = 1;
            
        foreach($user as $usr):?>

        <tr>
        <th scope="row" class="data-box"><?= $no++; ?></th>
        <td class="data-db"><?= $usr['nama_pegawai']?></td>
        <td class="data-db"><?= $usr['nip']?></td>
        <td class="data-db"><?= $usr['lama_cuti']?></td>
        <td class="data-db"><?= $usr['jenis_kelamin']?></td>
        <td class="data-db"><?= $usr['tanggal_mulai']?></td>
        <td class="data-db"><?= $usr['tanggal_selesai']?></td>
        <td class="data-db"><?= $usr['jenis_cuti']?></td>
        <td class="data-db"><?= $usr['nama_panitera']?></td>
        <td class="data-db"><?= $usr['nama_ketua']?></td>
        <td class="data-db" style="font-weight:bold; color: rgb(255, 255, 255);  text-align: center;"><?= $usr['app_panitera']?></td>
        <td class="data-db" style="font-weight:bold; color: rgb(255, 255, 255);  text-align: center;"><?= $usr['app_ketua']?></td>
        
        <td class="data-db2">
            <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_user/process_pegawai/process_delete.php?id_pegawai='.$usr['id_pegawai'] ?>">delete</a>
            <a class="btn btn-info badge"  href="<?= BASE_URL . 'dashboard_pegawai.php?page=edit_user&id_pegawai='.$usr['id_pegawai'] ?>" >edit</a>
        </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    
</table>
