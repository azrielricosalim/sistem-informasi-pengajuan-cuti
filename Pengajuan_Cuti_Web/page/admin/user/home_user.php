
<?php

require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
$statuse = isset($_GET['statuse']) ? ($_GET['statuse']) : false;


$pegawai = mysqli_fetch_array (mysqli_query($koneksi,"SELECT 
        tbl_data_pegawai.*,
        tbl_multi_user.*,
        tbl_data_golongan.*,
        tbl_data_jabatan.*
    FROM 
        tbl_data_pegawai 
    INNER JOIN 
        tbl_multi_user ON tbl_data_pegawai .id_user = tbl_multi_user.id_user
    INNER JOIN 
        tbl_data_golongan ON tbl_data_pegawai.id_golongan = tbl_data_golongan.id_golongan
    INNER JOIN 
        tbl_data_jabatan ON tbl_data_pegawai.id_jabatan = tbl_data_jabatan.id_jabatan"));


?>

<link rel="stylesheet" href="../../style/style.css">

<div class="data-user"><h1>DATA AKUN USER</h1>
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
        <th scope="col" class="data">jenis kelamin</th>
        <th scope="col" class="data">level</th>
        <th scope="col" class="data">Action</th>
        </tr>
    </thead>
    <tbody class="box-data">

        <?php
        if (isset($_POST['submit'])) {
            $search = $_POST['search'];
        
            // SQL query untuk mencari nama di dalam tabel
            
            $sql = "SELECT * FROM tbl_multi_user WHERE nama_lengkap LIKE '%$search%'";
            

            $result = $koneksi->query($sql);
            $user = $result->fetch_all(MYSQLI_ASSOC);
        }else{
            $user = $koneksi->query("SELECT * FROM tbl_multi_user")->fetch_all(MYSQLI_ASSOC);

        }
            
            $no = 1;
        foreach($user as $usr):?>

        <tr>
        <th scope="row" class="data-box"><?= $no++; ?></th>
        <td class="data-db"><?= $usr['nama_lengkap']?></td>
        <td class="data-db"><?= $usr['nip']?></td>
        <td class="data-db"><?= $usr['jenis_kelamin']?></td>
        <td class="data-db"><?= $usr['level']?></td>
        <td class="data-db2">
            <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_user/process_admin/process_delete.php?id_user='.$usr['id_user'] ?>">delete</a>
            <a class="btn btn-info badge"  href="<?= BASE_URL . 'dashboard_admin.php?page=edit_user&id_user='.$usr['id_user'] ?>" >edit</a>
        </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    
</table>
