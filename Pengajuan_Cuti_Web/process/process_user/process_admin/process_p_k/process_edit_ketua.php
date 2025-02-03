<?php
session_start();
require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$nama_ketua = $_POST['nama_ketua'];
$nip_ketua = $_POST['nip_ketua'];


$id_ketua = $_POST['id_ketua'];

if (empty($nama_ketua) ||
    empty($nip_ketua))  {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=edit_ketua&id_ketua=' . $id_ketua . '&emptyform=true');
} else {
    $query = mysqli_query($koneksi, "UPDATE tbl_data_ketua SET  
    nama_ketua='$nama_ketua',  
    nip_ketua='$nip_ketua' WHERE id_ketua='$id_ketua'");
    header("location: " . BASE_URL . 'dashboard_admin.php?page=edit_ketua&status=success');
}

?>
