
<div class="sidebar" >
        <div class="logo-details">
        <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
    <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
    <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
    </svg>
            <div class="logo_name">Menu</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="<?= BASE_URL . 'dashboard_pegawai.php?page=halaman_utama_pegawai'?>">
                <i class='bx bxs-dashboard bx-tada' ></i>
                    <span class="links_name">DASHBOARD</span>
                </a>
                <span class="tooltip">DASHBOARD PEGAWAI</span>
                
            </li>
            <li>
                <a href="<?= BASE_URL . 'dashboard_pegawai.php?page=create_pengajuan_user'?>">
                <i class='bx bx-spreadsheet bx-tada bx-rotate-90' ></i>
                <span class="links_name">FORM PENGAJUAN CUTI</span>
                </a>
                <span class="tooltip">FORMULIR PENGAJUAN CUTI</span>
            </li>
            <li>
                <a href="<?= BASE_URL . 'dashboard_pegawai.php?page=home_user1'?>">
                <i class='bx bx-table bx-tada' ></i>
                <span class="links_name">DATA PENGAJUAN</span>
                </a>
                <span class="tooltip">DATA PENGAJUAN</span>
            </li>
        
            <li class="profile1">
                <div class="profile-details">
                    <img src="img/logo.png" class="profile-img" alt="profileImg">
                    <div class="name_job">
                        <div class="name" ><?= $user['nama_depan'] ?></div>
                        <div class="job"><?= $user['nip'] ?></div>
                    </div>
                    <a href="<?= BASE_URL . 'process/process_logout.php'?>"><i class='bx bx-log-out' id="log_out"></i></a>
                </div>
            
            </li>

        
        </ul>
    </div>
    
