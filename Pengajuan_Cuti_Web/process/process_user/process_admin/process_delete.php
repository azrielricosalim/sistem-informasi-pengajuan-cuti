<?php
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

$iduser = $_GET['id_user'];
mysqli_query($koneksi, "DELETE FROM tbl_multi_user WHERE id_user=$iduser");
header("location: " . BASE_URL . 'dashboard_admin.php?page=home_user&statuse=success');

?>