<?php

require_once('function/helper.php');
require_once('function/koneksi.php');

session_start();

$create_pengajuan_user = isset($_GET['page']) ? ($_GET['page']) : false;
$halaman_utama_pegawai = isset($_GET['page']) ? ($_GET['page']) : false;
$home_user1 = isset($_GET['page']) ? ($_GET['page']) : false;
$edit_data_profile = isset($_GET['page']) ? ($_GET['page']) : false;


if ($_SESSION['level'] !== 'pegawai'){
    header("location: " . BASE_URL.'dashboard_admin.php');
} else if(isset($_SESSION['id_user'] ) == null){
    header("location: " . BASE_URL);
}


$user = mysqli_fetch_array (mysqli_query($koneksi, "SELECT * FROM tbl_multi_user WHERE id_user='$_SESSION[id_user]'"));
?>  

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title> Dashboard Pegawai </title>
        <link rel="icon" href="img/logo.png" type="image/png">

        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?=BASE_URL.'style/style.css'?>">
            <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500;600&display=swap" rel="stylesheet">
        </head>
<body>
<?php include 'form/navbar_pegawai.php'; ?>

<!-- bagian kontent -->
<section class="home-section">
<?php include 'home-nav-pegawai.php'; ?>

    <!-- <div class="text"> 
        <div class="nama"><span style=" font-size:19px; color:white; margin-right:5px;"><?= $user['nama_user'] ?>  </span>
                            <span style="color:#77ff00; font-size:19px;">(pegawai)</span><br><br>
                            <span class="span1"><?= $user['jabatan'] ?></span>
        </div>
        <div class="tanggal">
            <?php
                date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang diinginkan
                setlocale(LC_TIME, 'id_ID'); // Set lokal ke Bahasa Indonesia
                $tanggal_sekarang = strftime("%d %B %Y");
                echo "<p>{$tanggal_sekarang}</p>";
            ?>
        </div>
    </div> -->

    <div class="content">
        <div class="container">
            <div class="sub-content mt-5">
                
                <?php 
                $halaman_utama_pegawai = "page/pegawaian/$halaman_utama_pegawai.php";
                if (file_exists($halaman_utama_pegawai)) {
                include_once($halaman_utama_pegawai);
                }else {
                }
                ?>

                <?php 
                $edit_data_profile = "page/pegawaian/user/$edit_data_profile.php";
                if (file_exists($edit_data_profile)) {
                include_once($edit_data_profile);
                }else {
                }
                ?>
                
                <?php
                $create_pengajuan_user = "page/pegawaian/user/$create_pengajuan_user.php";
                if (file_exists($create_pengajuan_user)) {
                    include_once($create_pengajuan_user);
                }else {
                }
                ?>

                <?php
                $home_user1 = "page/pegawaian/user/$home_user1.php";
                    if (file_exists($home_user1)) {
                        include_once($home_user1);
                    }else {
                }
                ?>
                
            </div>
        </div>
    </div>
</section>


<script src="js/script.js"></script>
<!-- <script src="js/keamanan_base_url.js"></script> -->

</body>
</html>
<!-- <?php 

?> -->