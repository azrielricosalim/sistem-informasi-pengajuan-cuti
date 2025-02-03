<?php
session_start();
require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$nama_panitera = $_POST['nama_panitera'];
$nip_panitera = $_POST['nip_panitera'];

$nama_ketua = $_POST['nama_ketua'];
$nip_ketua = $_POST['nip_ketua'];

$id_pk = $_POST['id_pk'];

if (empty($nama_panitera) ||
    empty($nip_panitera) ||
    empty($nama_ketua) ||
    empty($nip_ketua))  {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=edit_pk&id_pk=' . $id_pk . '&emptyform=true');
} else {
    $query = mysqli_query($koneksi, "UPDATE persetujuan_p_k SET  
    nama_panitera='$nama_panitera',  
    nip_panitera='$nip_panitera',  
    nama_ketua='$nama_ketua',
    nip_ketua='$nip_ketua' WHERE id_pk='$id_pk'");
    header("location: " . BASE_URL . 'dashboard_admin.php?page=home_pk&status=success');
}

?>
