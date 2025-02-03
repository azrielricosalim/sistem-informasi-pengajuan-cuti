<?php
require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$iduser = $_GET['id_panitera'];

mysqli_query($koneksi, "DELETE FROM tbl_data_panitera WHERE id_panitera=$iduser");
header("location: " . BASE_URL . 'dashboard_admin.php?page=home_pk&statuse=success');

?>