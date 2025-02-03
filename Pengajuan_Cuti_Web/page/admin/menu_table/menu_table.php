<?php

require_once('./function/helper.php');
require_once('./function/koneksi.php');
?>
    

<div class="box_menu">
<h2 style="margin-bottom: 10px;">Menu Card</h2>
    <div class="smua_box">
        <div class="menu_pendidik">
            <div class="conten_text"><img src="./img/data_pns.jpg" alt=""></div>
                <div class="container">
                    <div class="box_pendidik">
                        <h3>DATA AKUN USER</h3>
                        <a href="<?= BASE_URL . 'dashboard_admin.php?page=home_user'?>">klik di sini</a>
                    </div>
                </div>
        </div>

        <div class="menu_pendidik">
            <div class="conten_text"><img src="./img/data_non_pns.jpg" alt=""></div>
                <div class="container">
                    <div class="box_pendidik">
                        <h3>DATA PENGAJUAN</h3>
                        <a href="<?= BASE_URL . 'dashboard_admin.php?page=total_pengajuan'?>">klik di sini</a>
                    </div>
                </div>
        </div>

        <div class="menu_pendidik">
            <div class="conten_text"><img src="./img/data_non_pns.jpg" alt=""></div>
                <div class="container">
                    <div class="box_pendidik">
                        <h3>DATA BENDAHARA</h3>
                        <a href="<?= BASE_URL . 'dashboard_admin.php?page=edit_panitera'?>">klik di sini</a>
                    </div>
                </div>
        </div>

        <div class="menu_pendidik">
            <div class="conten_text"><img src="./img/data_non_pns.jpg" alt=""></div>
                <div class="container">
                    <div class="box_pendidik">
                        <h3>DATA KEPALA SEKOLAH</h3>
                        <a href="<?= BASE_URL . 'dashboard_admin.php?page=edit_ketua'?>">klik di sini</a>
                    </div>
                </div>
        </div>

    </div>
</div>
