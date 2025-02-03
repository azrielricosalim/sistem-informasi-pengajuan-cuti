<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$status = isset($_GET['status']) ? ($_GET['status']) : false;

$query_ketua = mysqli_query($koneksi,"SELECT * FROM tbl_data_ketua");
$user=mysqli_fetch_assoc($query_ketua);
?>

<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_admin/process_p_k/process_edit_ketua.php'?>">
    <h1>KEPALA SEKOLAH (FORM)</h1>
    <P>untuk nama formulir ttd di prin cetak</P>
    <?php if($status == 'success') :?>
            <div class="alert alert-danger" role="alert" style="background-color: rgb(0, 128, 255); color: white;">
                berhasil di update
            </div>
    <?php endif;?>

    <div class="box">
        <div class="box-form">
            <div class="in_terpisah">
                <input name="id_ketua" value="<?= $user['id_ketua'] ?>" type="hidden" >
                <div class="mb-3">
                    <label for="nama_ketua" class="form-label">Nama ketua (lengkap)</label>
                    <input type="text" class="form-control" id="nama_ketua" name="nama_ketua" size="35" value="<?= $user['nama_ketua']?>">
                </div>
                <div class="mb-3">
                    <label for="nip_ketua" class="form-label">Nip Kepala Sekolah</label>
                    <input type="number" class="form-control" id="nip_ketua" name="nip_ketua" size="35" value="<?= $user['nip_ketua']?>">
                </div>
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Submit update</button>


</form>