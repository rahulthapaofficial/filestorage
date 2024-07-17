<nav id="sidebar" class="sidebar">
    <a class="sidebar-brand" href="<?php echo BASE_URL . '/admin' ?>">
        <img src="<?php echo BASE_URL . 'assets/images/logo-white.png' ?>" class="img-fluid rounded-normal" alt="logo">
    </a>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="https://ui-avatars.com/api/?name=<?php echo $userFullName ?>" class="img-fluid rounded-circle mb-2" alt="<?php echo $userFullName ?>" />
            <div class="font-weight-bold"><?php echo $userFullName ?></div>
            <small><?php echo $_SESSION['admin_email'] ?></small>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item active">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/dashboard' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/viewpackages' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-box-open"></i> <span class="align-middle">Packages</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/payment-setups' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-credit-card"></i>
                    <span class="align-middle">Payment Setups</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/subscriptions' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-server"></i> <span class="align-middle">Subscriptions</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/users' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-users"></i> <span class="align-middle">Users</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/folders' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-folder"></i> <span class="align-middle">Folders</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="<?php echo BASE_URL . 'admin/files' ?>">
                    <i class="align-middle mr-2 fas fa-fw fa-file"></i> <span class="align-middle">Files</span>
                </a>
            </li>
        </ul>
    </div>
</nav>