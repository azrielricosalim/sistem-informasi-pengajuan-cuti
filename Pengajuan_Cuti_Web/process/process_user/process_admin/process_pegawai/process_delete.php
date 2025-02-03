<?php
require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$iduser = $_GET['id_pegawai'];

mysqli_query($koneksi, "DELETE FROM tbl_data_pegawai WHERE id_pegawai=$iduser");
header("location: " . BASE_URL . 'dashboard_admin.php?page=total_pengajuan&statuse=success');

?>