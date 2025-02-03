<?php
session_start();
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

$nama_pegawai = $_POST['nama_lengkap'];
$nama_depan = $_POST['nama_depan'];
$nip = $_POST['nip'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$nama_jabatan = $_POST['nama_jabatan'];
$nama_golongan = $_POST['nama_golongan'];
$alamat = $_POST['alamat'];
$unit_kerja = $_POST['unit_kerja'];

$id_pegawai = $_POST['id_pegawai'];
$id_jabatan = $_POST['id_jabatan'];
$id_golongan = $_POST['id_golongan'];
$id_user = $_POST['id_user'];



if (empty($nama_pegawai) ||   
    empty($nama_depan) ||   
    empty($nip) || 
    empty($nama_jabatan) || 
    empty($nama_golongan) || 
    empty($jenis_kelamin) || 
    empty($pendidikan_terakhir) || 
    empty($alamat)||
    empty($unit_kerja)) {
    header("location: " . BASE_URL . 'dashboard_pegawai.php?page=edit_data_profile&process_user=failed');
} else {
    $query_pegawai=mysqli_query($koneksi, "UPDATE tbl_data_pegawai SET 
        nama_pegawai='$nama_pegawai', 
        nip='$nip', 
        id_jabatan='$id_jabatan', 
        id_golongan='$id_golongan', 
        id_user='$id_user', 
        pendidikan_terakhir='$pendidikan_terakhir', 
        alamat='$alamat',
        unit_kerja='$unit_kerja' WHERE id_pegawai='$id_pegawai'");

    $query_jabatan = mysqli_query($koneksi, "UPDATE tbl_data_jabatan SET nama_jabatan='$nama_jabatan', id_user='$id_user' WHERE id_jabatan='$id_jabatan'");
    $query_user = mysqli_query($koneksi, "UPDATE tbl_multi_user SET nama_lengkap='$nama_pegawai', nip='$nip', nama_depan='$nama_depan' , jenis_kelamin='$jenis_kelamin' WHERE id_user='$id_user'");
    $query_golongan = mysqli_query($koneksi, "UPDATE tbl_data_golongan SET nama_golongan='$nama_golongan', id_user='$id_user' WHERE id_golongan='$id_golongan'");
    // Check for success or handle errors
    if ($query_jabatan && $query_golongan && $query_user && $query_pegawai ) {
        header("location: " . BASE_URL . 'dashboard_pegawai.php?page=edit_data_profile&status=success');
    } else {
        header("location: " . BASE_URL . 'dashboard_pegawai.php?page=edit_data_profile&id_pegawai=' . $id_pegawai . '&emptyform=true');
    }
}

?>
