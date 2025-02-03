<?php
session_start();
require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$nama_panitera = $_POST['nama_panitera'];
$nip_panitera = $_POST['nip_panitera'];


$id_panitera = $_POST['id_panitera'];

if (empty($nama_panitera) ||
    empty($nip_panitera))  {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=edit_panitera&id_panitera=' . $id_panitera . '&emptyform=true');
} else {
    $query = mysqli_query($koneksi, "UPDATE tbl_data_panitera SET  
    nama_panitera='$nama_panitera',  
    nip_panitera='$nip_panitera' WHERE id_panitera='$id_panitera'");
    header("location: " . BASE_URL . 'dashboard_admin.php?page=edit_panitera&status=success');
}

?>
