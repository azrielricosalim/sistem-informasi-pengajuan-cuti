<?php

require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$nama_panitera = $_POST['nama_panitera'];
$nip_panitera = $_POST['nip_panitera'];

// $nama_ketua = $_POST['nama_ketua'];
// $nip_ketua = $_POST['nip_ketua'];

//pengecekan pelengkapan data
if (empty($nama_panitera)||
    empty($nip_panitera)) {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=create_panitera&process_user=failed');
} else {
    mysqli_query($koneksi, "INSERT INTO tbl_data_panitera(
        nama_panitera,
        nip_panitera
        ) VALUES (
            '$nama_panitera',
            '$nip_panitera'
            )");
    header("location: " . BASE_URL . 'dashboard_admin.php?page=home_panitera&process_user=success');
}
?>