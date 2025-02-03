<?php
session_start();
require_once('../../../../function/helper.php');
require_once('../../../../function/koneksi.php');

$nama_lengkap = $_POST['nama_lengkap'];
$nama_depan = $_POST['nama_depan'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$alamat = $_POST['alamat'];
$masa_kerja = $_POST['masa_kerja'];
$lamanya_cuti = $_POST['lamanya_cuti'];
$kecamatan = $_POST['kecamatan'];
$kabupaten = $_POST['kabupaten'];
$nomor_hp = $_POST['nomor_hp'];
$tanggal_mulai_cuti = $_POST['tanggal_mulai_cuti'];
$tanggal_selesai_cuti = $_POST['tanggal_selesai_cuti'];
$jenis_cuti = $_POST['jenis_cuti'];
$alasan_cuti = $_POST['alasan_cuti'];
$persetujuan_atasan = $_POST['persetujuan_atasan'];
$id_user = $_POST['id_pegawai'];

if (empty($nama_lengkap) ||
    empty($nama_depan) ||
    empty($nip) ||
    empty($jabatan) ||
    empty($jenis_kelamin) ||
    empty($pendidikan_terakhir) ||
    empty($alamat) ||
    empty($masa_kerja) ||
    empty($lamanya_cuti) ||
    empty($kecamatan) ||
    empty($kabupaten) ||
    empty($nomor_hp) ||
    empty($tanggal_mulai_cuti)|| 
    empty($tanggal_selesai_cuti) || 
    empty($jenis_cuti) || 
    empty($alasan_cuti) || 
    empty($persetujuan_atasan))  {
    header("location: " . BASE_URL . 'dashboard_admin.php?page=edit_user1&id_pegawai=' . $id_user . '&emptyform=true');
} else {
    $query = mysqli_query($koneksi, "UPDATE pengajuan_cuti_pegawai SET 
    nama_lengkap='$nama_lengkap', 
    nama_depan='$nama_depan', 
    nip='$nip', 
    jabatan='$jabatan', 
    jenis_kelamin='$jenis_kelamin', 
    pendidikan_terakhir='$pendidikan_terakhir', 
    alamat='$alamat',
    masa_kerja='$masa_kerja',
    lamanya_cuti='$lamanya_cuti',
    kecamatan='$kecamatan',
    kabupaten='$kabupaten',
    nomor_hp='$nomor_hp', 
    tanggal_mulai_cuti='$tanggal_mulai_cuti', 
    tanggal_selesai_cuti='$tanggal_selesai_cuti', 
    jenis_cuti='$jenis_cuti', 
    alasan_cuti='$alasan_cuti', 
    persetujuan_atasan='$persetujuan_atasan'  WHERE id_pegawai='$id_user'");
    header("location: " . BASE_URL . 'dashboard_admin.php?page=total_pengajuan&status=success');
}

?>
