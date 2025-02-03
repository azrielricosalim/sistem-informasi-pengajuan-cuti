<?php

require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

$nama_lengkap = $_POST['nama_lengkap'];
$nama_depan = $_POST['nama_depan'];
$nip = $_POST['nip'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nama_jabatan = $_POST['nama_jabatan'];
$nama_golongan = $_POST['nama_golongan'];
$unit_kerja = $_POST['unit_kerja'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$alamat = $_POST['alamat'];
$pass_user = md5($_POST["pass_user"]);
$level = $_POST['level'];

$id_user = $_POST['id_user'];
$id_jabatan = $_POST['id_jabatan'];
$id_golongan = $_POST['id_golongan'];

//pengecekan pelengkapan data
if (empty($nama_lengkap)|| 
    empty($nama_depan) || 
    empty($nip) || 
    empty($jenis_kelamin) || 
    empty($nama_jabatan) ||
    empty($nama_golongan) ||
    empty($unit_kerja) ||
    empty($pendidikan_terakhir) ||
    empty($alamat) ||
    empty($pass_user) || 
    empty($level)) {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=create_user&process_user=failed');
} else {

   // Insert into tbl_multi_user
    $query_user=mysqli_query($koneksi, "INSERT INTO tbl_multi_user(
        nama_lengkap, 
        nama_depan, 
        nip,
        jenis_kelamin,
        pass_user, 
        level
    ) VALUES (
        '$nama_lengkap',
        '$nama_depan', 
        '$nip',
        '$jenis_kelamin',
        '$pass_user', 
        '$level'
    )");
    $id_user = mysqli_insert_id($koneksi);
    // Insert into tbl_data_golongan
    $query_golongan = mysqli_query($koneksi, "INSERT INTO tbl_data_golongan(nama_golongan, id_user) VALUES ('$nama_golongan','$id_user')");
    // Get the last inserted ID from tbl_data_golongan
    $id_golongan = mysqli_insert_id($koneksi);
// Insert into tbl_data_jabatan
    $query_jabatan=mysqli_query($koneksi, "INSERT INTO tbl_data_jabatan(nama_jabatan, id_user) VALUES ('$nama_jabatan', '$id_user')");
    $id_jabatan = mysqli_insert_id($koneksi);
    // Insert into tbl_data_pegawai
    $query_pegawai = mysqli_query($koneksi, "INSERT INTO tbl_data_pegawai SET
        nama_pegawai='$nama_lengkap', 
        nip='$nip', 
        id_jabatan='$id_jabatan',
        id_golongan='$id_golongan',
        id_user='$id_user',
        unit_kerja='$unit_kerja', 
        pendidikan_terakhir='$pendidikan_terakhir', 
        alamat='$alamat'"
    );

        // Check for success or handle errors
    if ($query_jabatan && $query_golongan && $query_pegawai && $query_user) {
        header("location: " . BASE_URL . 'dashboard_admin.php?page=home_user&process_user=success');
    } else {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=create_user&process_user=failed');
    }
}
?>