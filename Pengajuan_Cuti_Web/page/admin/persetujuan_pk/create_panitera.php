<?php
require_once('./function/helper.php');
require_once('./function/koneksi.php');

$process_user = isset($_GET['process_user']) ? ($_GET['process_user']) : false;



?>

<form class="form-add" method="POST" action="<?= BASE_URL . 'process/process_user/process_admin/process_p_k/process_add.php'?>">
    <h1>ADD BENDAHARA (FORM)</h1>
    <P>untuk nama formulir ttd di prin cetak</P>
    <?php if($process_user == 'failed') :?>
            <div class="alert alert-danger" role="alert">
                semua formulir harus di isi
            </div>
    <?php endif;?>

    <div class="box">
        <div class="box-form">
            <div class="in_terpisah">
                <div class="mb-3">
                    <label for="nama_ketua" class="form-label">Nama Panitera (lengkap)</label>
                    <input type="text" class="form-control" id="nama_panitera" name="nama_panitera" size="35">
                </div>
                <div class="mb-3">
                    <label for="nip_ketua" class="form-label">Nip Panitera</label>
                    <input type="number" class="form-control" id="nip_panitera" name="nip_panitera" size="35">
                </div>
            </div>
        </div>


    </div>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>