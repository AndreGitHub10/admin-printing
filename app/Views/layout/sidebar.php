<header class="header body-pd shadow" id="header">
    <div class="header_toggle"> <i class='bx bx-menu bx-x' id="header-toggle"></i> </div>
    <div class="w-100 p-2 d-flex align-items-center justify-content-between">
        <span class="fw-bold fs-4 text-primary-emphasis"><?php echo ($menu_active == 'dashboard') ? 'Dashboard' : ('Hasil WIP ' . (($menu_active == 'laminating') ? 'Laminasi' : ucfirst($menu_active))); ?></span>
        <span class="align-middle fw-bold fs-5"><?php echo ucfirst(session()->get('name')); ?> (<?php echo ucfirst(session()->get('user_level')) ?>)</span>
    </div>
</header>
<div class="l-navbar show-nav" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i>
                <marquee> <span class="nav_logo-name">PT. Putra Mandiri Intipack</span></marquee>
            </a>
            <div class="nav_list">
                <a href="<?php echo base_url(session()->get('user_level') . '/dashboard') ?>" class="nav_link <?php echo ($menu_active == 'dashboard') ? 'active' : ''; ?>">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="<?php echo base_url(session()->get('user_level') . '/printing') ?>" class="nav_link <?php echo ($menu_active == 'printing') ? 'active' : ''; ?>">
                    <i class='bx bx-printer nav_icon'></i>
                    <span class="nav_name">Printing</span>
                </a>
                <a href="<?php echo base_url(session()->get('user_level') . '/laminating') ?>" class="nav_link <?php echo ($menu_active == 'laminating') ? 'active' : ''; ?>">
                    <i class='bx bx-printer nav_icon'></i>
                    <span class="nav_name">Laminasi</span>
                </a>
                <a href="<?php echo base_url(session()->get('user_level') . '/slitting') ?>" class="nav_link <?php echo ($menu_active == 'slitting') ? 'active' : ''; ?>">
                    <i class='bx bx-printer nav_icon'></i>
                    <span class="nav_name">Slitting</span>
                </a>
            </div>
        </div> <a href="<?php echo base_url('/logout') ?>" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Keluar</span> </a>
    </nav>
</div>