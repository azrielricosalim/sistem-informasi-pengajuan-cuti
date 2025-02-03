<?php 
require_once('function/helper.php');
require_once('function/koneksi.php');

// SQL query untuk mengambil jumlah data dari tabel
$sql = "SELECT COUNT(*) as total_data FROM tbl_multi_user";
$result = $koneksi->query($sql);

// Mengambil hasil query
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_data_akun_user = $row["total_data"];
} else {
    $total_data_akun_user = 0;
}

$sql = "SELECT COUNT(*) as total_data FROM tbl_data_cuti_pegawai";
$result = $koneksi->query($sql);

// Mengambil hasil query
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_data_pengajuan_pegawai = $row["total_data"];
} else {
    $total_data_pengajuan_pegawai = 0;
}
?>



<div class="h_utama">
    <div class="box_awal">
        <div class="card">
        <input type="checkbox" id="check_button">

            <div class="nama_table">
                <h3>total pengajuan pegawai<br> </h3>
            </div>
            <div class="total_semua">
                <span style="font-size: 60px; color:bisque;"><?php echo $total_data_pengajuan_pegawai; ?></span>
            </div>

            <div class="next_halaman">
                <a href="<?= BASE_URL . 'dashboard_admin.php?page=total_pengajuan'?>">masuk</a>
            </div>
            
        </div>

        <div class="card">
        <input type="checkbox" id="check_button">

            <div class="nama_table">
                <h3>total akun user<br> </h3>
            </div>
            <div class="total_semua">
                <span style="font-size: 60px; color:bisque;"><?php echo $total_data_akun_user; ?></span>
            </div>

            <div class="next_halaman">
                <a href="<?= BASE_URL . 'dashboard_admin.php?page=home_user'?>">masuk</a>
            </div>
            
        </div>

    </div>
    
</div>