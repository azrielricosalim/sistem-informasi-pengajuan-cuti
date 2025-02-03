
    <div class="sidebar" >
        <div class="logo-details">
        <svg xmlns="http://www.w3.org/2000/svg"  width="30" height="30" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
    <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
    <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
    </svg>
            <div class="logo_name">Menu Admin</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list" >
            <li>
                <a  href="<?= BASE_URL . 'dashboard_admin.php?page=halaman_utama_admin'?>">
                <i class='bx bxs-dashboard bx-tada' ></i>
                    <span class="links_name">DASHBOARD ADMIN</span>
                </a>
                <span class="tooltip">DASHBOARD ADMIN</span>
            </li>
            <li>
                <a href="<?= BASE_URL . 'dashboard_admin.php?page=create_user'?>">
                <i class='bx bx-user bx-tada' ></i>
                <span class="links_name">ADD AKUN USER</span>
                </a>
                <span class="tooltip">ADD AKUN USER</span>
            </li>
            <li>
                <a href="<?= BASE_URL . 'dashboard_admin.php?page=menu_table'?>">
                <i class='bx bx-table bx-tada' ></i>
                <span class="links_name">MENU CARD</span>
                </a>
                <span class="tooltip">MENU CARD</span>
            </li>

            <li>
                <a href="<?= BASE_URL . 'dashboard_admin.php?page=edit_user&id_user='.$user['id_user'] ?>"">
                <i class='bx bx-user-pin bx-tada' ></i>
                <span class="links_name">UBAH PASSWORD</span>
                </a>
                <span class="tooltip">UBAH PASSWORD</span>
            </li>
            <li class="profile">
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