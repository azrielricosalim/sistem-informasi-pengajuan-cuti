
<div class="text"> 
          <div class="nama"><span style=" font-size:19px; color:white; margin-right:5px;"><?= $user['nama_lengkap'] ?>  </span>
                            <span style="color:#77ff00; font-size:19px;">(<?= $user['level'] ?>)</span><br><br>
                            <!-- <span class="span1"><?= $user['jabatan'] ?></span> -->
                            <span class="span1"><a href="<?= BASE_URL . 'dashboard_admin.php?page=edit_data_profile'?>"><i class='bx bxs-id-card bx-tada' ></i>profile</a></span>
          </div>
          <div class="tanggal" id="clock">
            <?php
              date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang diinginkan
              setlocale(LC_TIME, 'id_ID'); // Set lokal ke Bahasa Indonesia
              $tanggal_sekarang = strftime("%d %B %Y ");
              
              echo "<p>{$tanggal_sekarang}</p>";
            ?>
          </div>
</div>
