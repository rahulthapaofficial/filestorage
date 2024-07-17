<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="<?php echo BASE_URL . 'dashboard' ?>" class="header-logo">
                    <img src="<?php echo BASE_URL . 'assets/images/logo.png' ?>" class="img-fluid rounded-normal light-logo" alt="logo">
                    <img src="<?php echo BASE_URL . 'assets/images/logo-white.png' ?>" class="img-fluid rounded-normal darkmode-logo d-none" alt="logo">
                </a>
            </div>
            <div class="iq-search-bar device-search">

                <form>
                    <div class="input-prepend input-append">
                        <div class="btn-group">
                            <label class="dropdown-toggle searchbox" data-toggle="dropdown">
                                <input class="dropdown-toggle search-query text search-input" type="text" placeholder="Type here to search..."><span class="search-replace"></span>
                                <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                                <span class="caret">
                                    <!--icon-->
                                </span>
                            </label>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo BASE_URL . 'files?type=pdf' ?>">
                                        <div class="item"><i class="far fa-file-pdf bg-info"></i>PDFs</div>
                                    </a>
                                </li>
                                <li><a href="<?php echo BASE_URL . 'files?type=document' ?>">
                                        <div class="item"><i class="far fa-file-alt bg-primary"></i>Documents</div>
                                    </a></li>
                                <li><a href="<?php echo BASE_URL . 'files?type=spreadsheet' ?>">
                                        <div class="item"><i class="far fa-file-excel bg-success"></i>Spreadsheet</div>
                                    </a></li>
                                <li><a href="<?php echo BASE_URL . 'files?type=presentation' ?>">
                                        <div class="item"><i class="far fa-file-powerpoint bg-danger"></i>Presentation</div>
                                    </a></li>
                                <li><a href="<?php echo BASE_URL . 'files?type=image' ?>">
                                        <div class="item"><i class="far fa-file-image bg-warning"></i>Photos & Images</div>
                                    </a></li>
                                <li><a href="<?php echo BASE_URL . 'files?type=video' ?>">
                                        <div class="item"><i class="far fa-file-video bg-info"></i>Videos</div>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">
                <div class="change-mode">
                    <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                        <div class="custom-switch-inner">
                            <p class="mb-0"> </p>
                            <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                            <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                <span class="switch-icon-left"><i class="a-left"></i></span>
                                <span class="switch-icon-right"><i class="a-right"></i></span>
                            </label>
                        </div>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                    <i class="ri-menu-3-line"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-settings-3-line"></i>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton02">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card pt-0"><i class="ri-settings-3-line"></i> Settings</a>
                                            <a href="#" class="iq-sub-card"><i class="ri-hard-drive-line"></i> Get Drive for desktop</a>
                                            <a href="#" class="iq-sub-card"><i class="ri-keyboard-line"></i> Keyboard Shortcuts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown caption-content">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- <div class="caption bg-primary line-height"> -->
                                <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>" alt="<?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>" class="rounded-circle">
                                <!-- </div> -->
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton03">
                                <div class="card mb-0">
                                    <div class="card-header d-flex justify-content-between align-items-center mb-0">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">Profile</h4>
                                        </div>
                                        <div class="close-data text-right badge badge-primary cursor-pointer "><i class="ri-close-fill"></i></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-header">
                                            <div class="cover-container text-center">
                                                <img src="https://ui-avatars.com/api/?name=<?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>" alt="<?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>" class="rounded-circle">
                                                <div class="profile-detail mt-3">
                                                    <h5><a href="#"><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></a></h5>
                                                    <p><?php echo $_SESSION['email'] ?></p>
                                                </div>
                                                <a href="<?php echo BASE_URL . 'action/logout' ?>" class="btn btn-primary">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>