<?php
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

$iduser = $_GET['id_pegawai'];

mysqli_query($koneksi, "DELETE FROM tbl_data_pegawai WHERE id_pegawai=$iduser");
header("location: " . BASE_URL . 'dashboard_pegawai.php?page=home_user1&statuse=success');

?>