<?php

require_once('../../../function/helper.php');
require_once('../../../function/koneksi.php');

$nama_pegawai = $_POST['nama_lengkap'];
$nip = $_POST['nip'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$nama_jabatan = $_POST['nama_jabatan'];
$alamat = $_POST['alamat'];
$masa_kerja = $_POST['masa_kerja'];
$lama_cuti = $_POST['lama_cuti'];
$kabupaten = $_POST['kabupaten'];
$nomor_hp = $_POST['nomor_hp'];
$unit_kerja = $_POST['unit_kerja'];
$tanggal_mulai = $_POST['tanggal_mulai'];
$tanggal_selesai = $_POST['tanggal_selesai'];
$jenis_cuti = $_POST['jenis_cuti'];
$alasan_cuti = $_POST['alasan_cuti'];
$nama_panitera = $_POST['nama_panitera'];
$nama_ketua = $_POST['nama_ketua'];
$app_panitera = $_POST['app_panitera'];
$app_ketua = $_POST['app_ketua'];


$id_pegawai = $_POST['id_pegawai'];
$id_jabatan = $_POST['id_jabatan'];

//pengecekan pelengkapan data
if (empty($nama_pegawai) ||
        empty($nip) ||
        empty($jenis_kelamin) ||
        empty($pendidikan_terakhir) ||
        empty($alamat) ||
        empty($masa_kerja) ||
        empty($lama_cuti) ||
        empty($kabupaten) ||
        empty($nomor_hp) ||
        empty($unit_kerja) ||
        empty($tanggal_mulai)|| 
        empty($tanggal_selesai) || 
        empty($jenis_cuti) || 
        empty($alasan_cuti) || 
        empty($nama_panitera) || 
        empty($nama_ketua) || 
        empty($app_panitera) || 
        empty($app_ketua) ) {
        // header("location: " . BASE_URL . 'dashboard_pegawai.php?page=create_pengajuan_user&process_user=failed');
} else {
    
    $query_pegawai=mysqli_query($koneksi, "INSERT INTO tbl_data_pegawai SET
            nama_pegawai='$nama_pegawai',
            nip='$nip',
            unit_kerja='$unit_kerja',
            pendidikan_terakhir='$pendidikan_terakhir',
            alamat='$alamat'");
    $id_pegawai= mysqli_insert_id($koneksi);

    $query_jabatan=mysqli_query($koneksi,"INSERT INTO tbl_data_jabatan SET
        nama_jabatan='$nama_jabatan'");
    $id_jabatan= mysqli_insert_id($koneksi);

    
    $query_cuti=mysqli_query($koneksi, "INSERT INTO tbl_data_cuti_pegawai(
        jenis_kelamin, 
        masa_kerja, 
        lama_cuti, 
        kabupaten, 
        nomor_hp, 
        tanggal_mulai, 
        tanggal_selesai, 
        jenis_cuti, 
        alasan_cuti, 
        nama_panitera, 
        nama_ketua, 
        app_panitera,
        app_ketua,
        id_pegawai,
        id_jabatan
        ) VALUES (
            '$jenis_kelamin', 
            '$masa_kerja', 
            '$lama_cuti', 
            '$kabupaten', 
            '$nomor_hp',  
            '$tanggal_mulai',
            '$tanggal_selesai', 
            '$jenis_cuti', 
            '$alasan_cuti',
            '$nama_panitera',
            '$nama_ketua',
            '$app_panitera',
            '$app_ketua',
            '$id_pegawai',
            '$id_jabatan')");


    // $id_user= mysqli_insert_id($koneksi);
    if ($query_cuti && $query_pegawai && $query_jabatan ) {
        header("location: " . BASE_URL . 'dashboard_pegawai.php?page=home_user1&process_user=success');
    } else {
        header("location: " . BASE_URL . 'dashboard_pegawai.php?page=create_pengajuan_user&process_user=failed');
    }
}
?>