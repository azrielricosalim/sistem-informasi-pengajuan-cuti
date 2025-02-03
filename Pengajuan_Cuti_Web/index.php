<?php

require_once('function/helper.php');
require_once('function/koneksi.php');

session_start();
// if (isset($_SESSION['id'] )){
//     header("location: " . BASE_URL);
// }
// $_SESSION['nama_user'] = $nama_user;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SDN Kusnan Cirebon</title>
    <link rel="icon" href="img/logo.png" type="image/png">


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="<?=BASE_URL.'style/style.css'?>">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    
    <section class="hlogin">
        <div class="blogin">
            <form class="logine" method="POST" action="<?=BASE_URL.'process/process_login.php'?>">
                <div class="box">
                    <img src="img/logo.png" alt="">
                    <h1>SDN Kusnan Cirebon </h1>
                    <input type="text" name="multi_user" class="nama" placeholder="NAMA_LENGKAP / NIP">
                </div>
                <div class="box">
                    <input type="password" name="pass_user" id="pass" class="Pass" placeholder="PASSWORD">
                    <div class="melihat_pass">
                        <input type="checkbox" onclick="myFunction()">
                        <ion-icon name="eye" style="font-size: 30px;"></ion-icon>
                    </div>
                    <h4>Tampilkan Password</h4>
                    <script>
                        function myFunction() {
                            var x = document.getElementById("pass");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                </div>

                <div class="box">
                    <button class="log-in">login</button>
                </div>
            </form>
        </div>
        <div class="fto_pn_cirebon">
            <img src="img/sdn_kusnan.jpeg" alt="">
            <h1>pengajuan cuti</h1>
        </div>
    </section>
    <!-- <script src="js/keamanan_base_url.js"></script> -->
    
</body>


</html>
