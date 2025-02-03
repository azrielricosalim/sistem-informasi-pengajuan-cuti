<?php
session_start();
require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

// tbl_data_cuti_pegawai pK
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_hp = $_POST['nomor_hp'];
$kabupaten = $_POST['kabupaten'];
$masa_kerja = $_POST['masa_kerja'];
$jenis_cuti = $_POST['jenis_cuti'];
$alasan_cuti = $_POST['alasan_cuti'];
$lama_cuti = $_POST['lama_cuti'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$nama_panitera = $_POST['nama_panitera'];
$nama_ketua = $_POST['nama_ketua'];
$app_panitera = $_POST['app_panitera'];
$app_ketua = $_POST['app_ketua'];

// tbl_data_pegawai FK
$nama_pegawai = $_POST['nama_lengkap'];
$nip = $_POST['nip'];
$unit_kerja = $_POST['unit_kerja'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$alamat = $_POST['alamat'];

// tbl_data_jabatan FK
$nama_jabatan = $_POST['nama_jabatan'];

$id_cuti_pegawai = $_POST['id_cuti_pegawai'];
$id_pegawai = $_POST['id_pegawai'];
$id_jabatan = $_POST['id_jabatan'];

if (empty($jenis_kelamin) ||
        empty($nomor_hp) ||
        empty($kabupaten) ||
        empty($masa_kerja) ||
        empty($jenis_cuti) ||
        empty($alasan_cuti) ||
        empty($lama_cuti) || 
        empty($tanggal_mulai) || 
        empty($tanggal_selesai) || 
        empty($nama_panitera) || 
        empty($nama_ketua) || 
        empty($app_panitera) || 
        empty($app_ketua) || 
        empty($nama_pegawai) || 
        empty($nip) || 
        empty($unit_kerja) || 
        empty($pendidikan_terakhir) || 
        empty($alamat) || 
        empty($nama_jabatan) 
        )  {
    header("location: " . BASE_URL . 'dashboard_pegawai.php?page=edit_user&process_user=failed');
} else {
    $query_cuti=mysqli_query($koneksi, "UPDATE tbl_data_cuti_pegawai SET 
        id_pegawai='$id_pegawai',
        id_jabatan='$id_jabatan',
        jenis_kelamin='$jenis_kelamin',
        nomor_hp='$nomor_hp',
        kabupaten='$kabupaten',
        masa_kerja='$masa_kerja',
        jenis_cuti='$jenis_cuti',
        alasan_cuti='$alasan_cuti',
        lama_cuti='$lama_cuti',
        tanggal_mulai='$tanggal_mulai',
        tanggal_selesai='$tanggal_selesai',
        nama_panitera='$nama_panitera',
        nama_ketua='$nama_ketua',
        app_panitera='$app_panitera',
        app_ketua='$app_ketua' WHERE id_cuti_pegawai='$id_cuti_pegawai'");

    $query_pegawai = mysqli_query($koneksi, "UPDATE tbl_data_pegawai SET
        nama_pegawai='$nama_pegawai',
        nip='$nip',
        unit_kerja='$unit_kerja',
        pendidikan_terakhir='$pendidikan_terakhir',
        alamat='$alamat' WHERE id_pegawai='$id_pegawai'");

    $query_jabatan = mysqli_query($koneksi, "UPDATE tbl_data_jabatan SET nama_jabatan='$nama_jabatan' WHERE id_jabatan='$id_jabatan'");

    if ($query_jabatan && $query_cuti && $query_pegawai ) {
        header("location: " . BASE_URL . 'dashboard_pegawai.php?page=home_user1&status=success');
    } else {
        header("location: " . BASE_URL . 'dashboard_pegawai.php?page=edit_user&id_cuti_pegawai=' . $id_cuti_pegawai . '&emptyform=true');
    }
}

?>
