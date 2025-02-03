<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

//mengecek request
$nip = $_POST['multi_user'];
$nama_lengkap = $_POST['multi_user'];
$password = md5($_POST['pass_user']);

$query = mysqli_query($koneksi, "SELECT * FROM tbl_multi_user WHERE (nip='$nip' OR nama_lengkap='$nama_lengkap') AND  pass_user= '$password'");


//mengecek pengguna
if(mysqli_num_rows($query) != 0) {
    $row = mysqli_fetch_assoc($query);
    	//membuat session
		session_start();
		// $_SESSION['id_user'] = $row['id_user'];
		// $_SESSION['nama_lengkap'] = $nip;
		// $_SESSION['level'] = $row['level'];

    // cek jika user login sebagai admin
	if($row['level']=="admin"){
		// mencari level_user atau id user
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['level'] = $row['level'];
		// buat session login dan username
		$_SESSION['nip'] = $nip;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location: " . BASE_URL . 'dashboard_admin.php?page=halaman_utama_admin');

	// cek jika user login sebagai pegawai
	}else if($row['level']=="pegawai"){
		// mencari level_user atau id user
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['level'] = $row['level'];
		// buat session login dan username
		$_SESSION['nama_lengkap'] = $nama_lengkap;
		$_SESSION['nip'] = $nip;
		$_SESSION['level'] = "pegawai";
		// alihkan ke halaman dashboard pegawai
		header("location: " . BASE_URL . 'dashboard_pegawai.php?page=halaman_utama_pegawai');
		

	// cek jika user login sebagai pengurus
	// }else if($row['level_user']=="operator"){
	// 	// mencari level_user atau id user
	// 	$_SESSION['id'] = $row['id'];
	// 	$_SESSION['level_user'] = $row['level_user'];
	// 	// buat session login dan username
	// 	$_SESSION['nama_user'] = $username;
	// 	$_SESSION['level_user'] = "operator";
	// 	header("location: " . BASE_URL . 'dashboard_operator.php');
    }
} else {
    header("location: " . BASE_URL);
}
?>