<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$status = isset($_GET['status']) ? ($_GET['status']) : false;

$query_panitera = mysqli_query($koneksi,"SELECT * FROM tbl_data_panitera");
$user=mysqli_fetch_assoc($query_panitera);
?>

<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_admin/process_p_k/process_edit_panitera.php'?>">
    <h1>BENDAHARA (FORM)</h1>
    <P>untuk nama formulir ttd di prin cetak</P>
    <?php if($status == 'success') :?>
            <div class="alert alert-danger" role="alert" style="background-color: rgb(0, 128, 255); color: white;">
                berhasil di update
            </div>
    <?php endif;?>

    <div class="box">
        <div class="box-form">
            <div class="in_terpisah">
                <input name="id_panitera" value="<?= $user['id_panitera'] ?>" type="hidden" >
                <div class="mb-3">
                    <label for="nama_panitera" class="form-label">Nama Panitera (lengkap)</label>
                    <input type="text" class="form-control" id="nama_panitera" name="nama_panitera" size="35" value="<?= $user['nama_panitera']?>">
                </div>
                <div class="mb-3">
                    <label for="nip_panitera" class="form-label">Nip Bendahara</label>
                    <input type="number" class="form-control" id="nip_panitera" name="nip_panitera" size="35" value="<?= $user['nip_panitera']?>">
                </div>
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Submit update</button>


</form>