<?php

require_once('function/helper.php');
require_once('function/koneksi.php');

session_start();


$create_panitera = isset($_GET['page']) ? ($_GET['page']) : false;
$total_pengajuan = isset($_GET['page']) ? ($_GET['page']) : false;
$surat_cetak_cuti = isset($_GET['page']) ? ($_GET['page']) : false;
$edit_user1 = isset($_GET['page']) ? ($_GET['page']) : false;
$edit_data_profile = isset($_GET['page']) ? ($_GET['page']) : false;
$create_user = isset($_GET['page']) ? ($_GET['page']) : false;
$menu_table = isset($_GET['page']) ? ($_GET['page']) : false;
$halaman_utama_admin = isset($_GET['page']) ? ($_GET['page']) : false;
$edit_panitera = isset($_GET['page']) ? ($_GET['page']) : false;
$edit_ketua = isset($_GET['page']) ? ($_GET['page']) : false;



if ($_SESSION['level'] !== 'admin'){
  header("location: " . BASE_URL.'dashboard_pegawai.php');
}else if(isset($_SESSION['id_user'] ) == null){
  header("location: " . BASE_URL);
}
$user = mysqli_fetch_array (mysqli_query($koneksi, "SELECT * FROM tbl_multi_user WHERE id_user='$_SESSION[id_user]'"));
// $user = mysqli_fetch_array (mysqli_query($koneksi, "SELECT * FROM pengajuan_cuti_pegawai"));

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <meta charset="UTF-8">
      <title> Dashboard admin </title>
      <link rel="icon" href="img/logo.png" type="image/png">

      <!-- Boxicons CDN Link -->
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?=BASE_URL.'style/style.css'?>">
        <!-- <link rel="stylesheet" href="<?=BASE_URL.'style/surat_cetak_style.css'?>"> -->
        <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500;600&display=swap" rel="stylesheet">
    </head>
<body>


  <!-- bagian kontent -->
  <section class="home-section">
      

        <div class="content">
          <div class="container">
            <div class="sub-content mt-5">
            
            <?php 


            $total_pengajuan = "page/admin/total_pengajuan/$total_pengajuan.php";
            if (file_exists($total_pengajuan)) {
              include 'form/navbar_admin.php';
              include 'home-nav.php';

              include_once($total_pengajuan);
            }else {
            }

            $create_panitera = "page/admin/persetujuan_pk/$create_panitera.php";
            if (file_exists($create_panitera)) {
              include 'form/navbar_admin.php';
              include 'home-nav.php';

              include_once($create_panitera);
            }else {
            }
            
            $edit_user1 = "page/admin/total_pengajuan/page_pegawai/$edit_user1.php";
            if (file_exists($edit_user1)) {
              include 'form/navbar_admin.php';
              include 'home-nav.php';

              include_once($edit_user1);
            }else {
            }



            $surat_cetak_cuti = "page/$surat_cetak_cuti.php";
            if (file_exists($surat_cetak_cuti)) {
              // Sertakan halaman admin
              include_once($surat_cetak_cuti);
            } else {
            }
            ?>

            <?php 
            $halaman_utama_admin = "page/admin/$halaman_utama_admin.php";
            if (file_exists($halaman_utama_admin)) {
              include 'form/navbar_admin.php';
              include 'home-nav.php';
              
              include_once($halaman_utama_admin);
              // include 'page/admin/persetujuan_pk/home_pk.php';
            }else {
            }
            ?>
            
            <?php
            $create_user = "page/admin/user/$create_user.php";
            if (file_exists($create_user)) {
              include 'form/navbar_admin.php';
              include 'home-nav.php';

              include_once($create_user);
            }else {
            }
            ?>

            <?php
            $menu_table = "page/admin/menu_table/$menu_table.php";
              if (file_exists($menu_table)) {
              include 'form/navbar_admin.php';
              include 'home-nav.php';

                include_once($menu_table);
              }else {
            }
            ?>

            <?php
            $edit_panitera = "page/admin/persetujuan_pk/$edit_panitera.php";
              if (file_exists($edit_panitera)) {

                include_once($edit_panitera);
              }else {
            }

            $edit_ketua = "page/admin/persetujuan_pk/$edit_ketua.php";
              if (file_exists($edit_ketua)) {

                include_once($edit_ketua);
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
