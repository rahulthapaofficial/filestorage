<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo BASE_URL . 'dashboard' ?>" class="header-logo">
            <img src="<?php echo BASE_URL . 'assets/images/logo.png' ?>" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="<?php echo BASE_URL . 'assets/images/logo-white.png' ?>" class="img-fluid rounded-normal darkmode-logo d-none" alt="logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <div class="new-create select-dropdown input-prepend input-append">
            <div class="btn-group">
                <label data-toggle="dropdown">
                    <div class="search-query selet-caption"><i class="las la-plus pr-2"></i>Create New</div><span class="search-replace"></span>
                    <span class="caret">
                        <!--icon-->
                    </span>
                </label>
                <ul class="dropdown-menu">
                    <li>
                        <div class="item" data-toggle="modal" data-target="#createFolderModal"><i class="ri-folder-add-line pr-3"></i>New Folder</div>
                    </li>
                    <li>
                        <div class="item" data-toggle="modal" data-target="#uploadFileModal"><i class="ri-file-upload-line pr-3"></i>Upload Files</div>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="active">
                    <a href="<?php echo BASE_URL . 'dashboard' ?>" class="">
                        <i class="las la-home iq-arrow-left"></i><span>Dashboard</span>
                    </a>
                    <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>

                <li class=" ">
                    <a href="<?php echo BASE_URL . 'folders' ?>" class="">
                        <i class="ri-folder-line iq-arrow-left"></i><span>Folders</span>
                    </a>
                    <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="<?php echo BASE_URL . 'files' ?>" class="">
                        <i class="lar la-file-alt iq-arrow-left"></i><span>Files</span>
                    </a>
                    <ul id="page-files" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="<?php echo BASE_URL . 'trash' ?>" class="">
                        <i class="las la-trash-alt iq-arrow-left"></i><span>Trash</span>
                    </a>
                    <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="<?php echo BASE_URL . 'plans' ?>" class="">
                        <i class="las la-server iq-arrow-left"></i><span>Plans</span>
                    </a>
                    <ul id="page-delete" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>

            </ul>
        </nav>
        <div class="sidebar-bottom">
            <h4 class="mb-3"><i class="las la-cloud mr-2"></i>Storage</h4>
            <p><?php echo getStorageDetails()['totalUsedSpace'] ?> / <?php echo getStorageDetails()['totalStorage'] ?> Used</p>
            <div class="iq-progress-bar mb-3">
                <?php if (getStorageDetails()['totalUsedSpacePercent'] < 50) : ?>
                    <span class="bg-primary iq-progress progress-1" data-percent="<?php echo getStorageDetails()['totalUsedSpacePercent'] ?>">
                    </span>
                <?php elseif (getStorageDetails()['totalUsedSpacePercent'] > 50 && getStorageDetails()['totalUsedSpacePercent'] < 80) : ?>
                    <span class="bg-warning iq-progress progress-1" data-percent="<?php echo getStorageDetails()['totalUsedSpacePercent'] ?>">
                    </span>
                <?php elseif (getStorageDetails()['totalUsedSpacePercent'] > 80 && getStorageDetails()['totalUsedSpacePercent'] < 90) : ?>
                    <span class="bg-success iq-progress progress-1" data-percent="<?php echo getStorageDetails()['totalUsedSpacePercent'] ?>">
                    </span>
                <?php else : ?>
                    <span class="bg-danger iq-progress progress-1" data-percent="<?php echo getStorageDetails()['totalUsedSpacePercent'] ?>">
                    </span>
                <?php endif; ?>
            </div>
            <p><?php echo getStorageDetails()['totalUsedSpacePercent'] ?>% Full - <?php echo getStorageDetails()['freeStorage'] ?> Free</p>
            <a href="<?php echo BASE_URL . 'plans' ?>" class="btn btn-outline-primary view-more mt-4">Buy Storage</a>
        </div>
        <div class="p-3"></div>
    </div>
</div>