<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

session_start();
unset($_SESSION['id_user']);

header('location: ' . BASE_URL);
?>