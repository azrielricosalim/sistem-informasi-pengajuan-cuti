
<?php

require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
$statuse = isset($_GET['statuse']) ? ($_GET['statuse']) : false;


$user = mysqli_query($koneksi, "SELECT 
                cuti.*,
                pegawai.*
            FROM 
                tbl_data_cuti_pegawai AS cuti
            INNER JOIN 
                tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai");

if (isset($_POST['verifikasi'])){
    $appid = $_POST['appid'];
    $sql = "UPDATE tbl_data_cuti_pegawai SET app_panitera='disetujui', app_ketua='disetujui' WHERE id_cuti_pegawai = '$appid'";
    $user = mysqli_query($koneksi, $sql);
    
    if ($user === true) {
        echo "<script>
                alert('Berhasil di disetujui');
                hidden = document.getElementById('hidden');
                hidden.style.display = 'block';
                window.open('dashboard_admin.php?page=total_pengajuan','_self');
                </script>";
    } else {
        echo "<script>
        alert('failed Approved');
        </script>";
    }
}

// Periksa status approval dari sesi
?>


<!-- <link rel="stylesheet" href="../../style/style.css"> -->

<div class="data-user"><h1>DATA PENGAJUAN CUTI PEGAWAI</h1>
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
    <input type="text" name="search1" placeholder="Cari Nama / Nip..." class="i_pencarian">
    <select  name="search2">
        <option ></option>
        <option>disetujui</option>
        <option>menunggu persetujuan</option>
    </select>
    <input type="submit" name="submit" value="tampilkan | cari" class="b_pencarian">
</form>


<table class="table">
    
    <thead>
        <tr>
        <th scope="col" class="data">No</th>
        <th scope="col" class="data">nama lengkap</th>
        <th scope="col" class="data">nip</th>
        <th scope="col" class="data">jenis kelamin</th>
        <th scope="col" class="data">lama cuti</th>
        <th scope="col" class="data">jenis cuti</th>
        <th scope="col" class="data">app panitera</th>
        <th scope="col" class="data">app ketua</th>
        <th scope="col" class="data">Action</th>
        </tr>
    </thead>
    <tbody class="box-data">

        <?php
        if (isset($_POST['submit'])) {
            $search1 = $_POST['search1'];
            $search2 = $_POST['search2'];
        
            // SQL query untuk mencari nama di dalam tabel
            
            $sql = "SELECT 
                cuti.*,
                pegawai.* 
                FROM tbl_data_cuti_pegawai AS cuti
                    INNER JOIN 
                        tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai 
                    WHERE 
                        (nip LIKE '%$search1%' OR nama_pegawai LIKE '%$search1%') 
                        AND (app_panitera LIKE '%$search2%' OR app_ketua LIKE '%$search2%') ";
                
            $result = $koneksi->query($sql);
            $user = $result->fetch_all(MYSQLI_ASSOC);
        }else{
            $user = $koneksi->query("SELECT 
                cuti.*,
                pegawai.*  FROM tbl_data_cuti_pegawai AS cuti
                INNER JOIN 
                    tbl_data_pegawai AS pegawai ON cuti.id_pegawai = pegawai.id_pegawai")->fetch_all(MYSQLI_ASSOC); 
        }

        // $showPrintButton = false;
        
            $no = 1;
        
            
        foreach($user as $usr):?>

        <tr>
            <th scope="row" class="data-box"><?= $no++; ?></th>
            <td class="data-db"><?= $usr['nama_pegawai']?></td>
            <td class="data-db"><?= $usr['nip']?></td>
            <td class="data-db"><?= $usr['jenis_kelamin']?></td>
            <td class="data-db"><?= $usr['lama_cuti']?></td>
            <td class="data-db"><?= $usr['jenis_cuti']?></td>
            <td class="data-db" style=" color: rgb(255, 255, 255);  text-align: center;">
                                    <?=
                                            $usr['app_panitera']
                                    ?>
                                </td>
            <td class="data-db" style=" color: rgb(255, 255, 255);  text-align: center;">
                                    <?=
                                            $usr['app_ketua']
                                    ?>
            </td>
            <td class="data-db" style="background: transparent; display: flex;">
                <form method="POST" class="btn btn-info badge" style="background-color: rgb(0, 182, 121);">
                    <input type="hidden" name="appid" value="<?php echo $usr['id_cuti_pegawai']; ?>">
                    <input type="submit"  name="verifikasi" value="verifikasi">
                </form>
                <a class="btn btn-info badge "  href="<?= BASE_URL . 'page/surat_cetak_cuti.php?id_pegawai='.$usr['id_pegawai'] ?>" target="_BLANK" >cetak</a>
            </td>
            <td class="data-db2" style="background: transparent; display: flex;">
                <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_user/process_admin/process_pegawai/process_delete.php?id_pegawai='.$usr['id_pegawai'] ?>">delete</a>
                <a class="btn btn-info badge"  href="<?= BASE_URL . 'dashboard_admin.php?page=edit_user1&id_pegawai='.$usr['id_pegawai'] ?>" >Lihat Form</a>
                
            </td>
            

        </tr>
        <?php endforeach;?>
        
    </tbody>
    
</table>

</body>
</html>