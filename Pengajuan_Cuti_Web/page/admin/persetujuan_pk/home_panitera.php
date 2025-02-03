
<?php

require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
$statuse = isset($_GET['statuse']) ? ($_GET['statuse']) : false;


$user = mysqli_query($koneksi, "SELECT * FROM tbl_data_panitera");


?>

<link rel="stylesheet" href="../../style/style.css">





<div class="tbl_h">
<h1 style="margin-bottom: 20px;">DATA PANITERA</h1>

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
    <?php endif; ?>

    <table class="table1" >
    
        <thead>
            <tr>
            <th scope="col" class="data">No</th>
            <th scope="col" class="data">nama panitera</th>
            <th scope="col" class="data">nip panitera</th>
            <th scope="col" class="data">Action</th>
            </tr>
        </thead>
        <tbody class="box-data">
    
            <?php
            
                $no = 1;
            foreach($user as $usr):?>
    
            <tr>
            <th scope="row" class="data-box"><?= $no++; ?></th>
            <td class="data-db"><?= $usr['nama_panitera']?></td>
            <td class="data-db"><?= $usr['nip_panitera']?></td>
            <td class="data-db2">
                <!-- <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_user/process_admin/process_p_k/process_delete.php?id_panitera='.$usr['id_panitera'] ?>">delete</a> -->
                <a class="btn1 btn-info badge"  href="<?= BASE_URL . 'dashboard_admin.php?page=edit_pk&id_panitera='.$usr['id_panitera'] ?>" >lihat form</a>
            </td>
            </tr>
            <?php endforeach;?>
        </tbody>
        
    </table>
</div>

