<?php include('common/header.php') ?>

<div class="wrapper">

    <?php include('common/sidebar.php') ?>
    <?php include('common/navbar.php') ?>

    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-transparent card-block card-stretch card-height mb-3">
                        <div class="d-flex justify-content-between">
                            <div class="select-dropdown input-prepend input-append">
                                <div class="btn-group">
                                    <label data-toggle="dropdown">
                                        <div class="dropdown-toggle search-query">My Drive<i class="las la-angle-down ml-3"></i></div><span class="search-replace"></span>
                                        <span class="caret">
                                            <!--icon-->
                                        </span>
                                    </label>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="item"><i class="ri-folder-add-line pr-3"></i>New Folder</div>
                                        </li>
                                        <li>
                                            <div class="item"><i class="ri-file-upload-line pr-3"></i>Upload Files</div>
                                        </li>
                                        <li>
                                            <div class="item"><i class="ri-folder-upload-line pr-3"></i>Upload Folders</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dashboard1-dropdown d-flex align-items-center">
                                <div class="dashboard1-info">
                                    <a href="#calander" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul id="calander" class="iq-dropdown collapse list-inline m-0 p-0 mt-2">
                                        <li class="mb-2">
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Calander"><i class="las la-calendar iq-arrow-left"></i></a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Keep"><i class="las la-lightbulb iq-arrow-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="Tasks"><i class="las la-tasks iq-arrow-left"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card card-block card-stretch card-height iq-welcome" style="background: url(assets/images/layouts/mydrive/background.png) no-repeat scroll right center; background-color: #ffffff; background-size: contain;">
                        <div class="card-body property2-content">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="col-lg-8 col-sm-8 p-0">
                                    <h3 class="mb-3">Welcome <?php echo $_SESSION['first_name']; ?></h3>
                                    <p class="mb-5">You have <a href="<?php echo BASE_URL . 'folders' ?>"><?php echo countTotalFolders() ?> Folders</a> and <a href="<?php echo BASE_URL . 'files' ?>"><?php echo countTotalFiles() ?> Files</a> in your storage</p>
                                    <a href="<?php echo BASE_URL . 'folders' ?>">Manage Now<i class="las la-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Quick Access</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline p-0 mb-0 row align-items-center">
                                <li class="col-lg-6 col-sm-6 mb-3 mb-sm-0">
                                    <a href="<?php echo BASE_URL . 'folders' ?>">
                                        <div style="cursor: pointer;" class="p-2 text-center border rounded">
                                            <div>
                                                <img src="assets/images/layouts/mydrive/folders.png" class="img-fluid mb-1" alt="Folders">
                                            </div>
                                            <p class="mb-0"><?php echo countTotalFolders() ?> Folders</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="col-lg-6 col-sm-6">
                                    <a href="<?php echo BASE_URL . 'files' ?>">
                                        <div style="cursor: pointer;" class="p-2 text-center border rounded">
                                            <div>
                                                <img src="assets/images/layouts/mydrive/files.png" class="img-fluid mb-1" alt="Files">
                                            </div>
                                            <p class="mb-0"><?php echo countTotalFiles() ?> Files</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                if (getFiles('document')) : ?>
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-transparent ">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <div class="header-title">
                                    <h4 class="card-title">Documents</h4>
                                </div>
                                <div class="card-header-toolbar d-flex align-items-center">
                                    <a href="<?php echo BASE_URL . 'files?type=document' ?>" class=" view-more">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endif;
                foreach (getFiles('document') as $key => $file) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body image-thumb">
                                <a href="#" data-title="<?php echo $file['file_name'] ?>" data-load-file="file" data-load-target="#resolte-contaniner" data-url="<?php echo $file['file_dir'] ?>" data-toggle="modal" data-target="#exampleModal">
                                    <div class="mb-4 text-center p-3 rounded iq-thumb">
                                        <div class="iq-image-overlay"></div>
                                        <img src="<?php echo $file['image_url'] ?>" class="img-fluid" alt="image1">
                                    </div>
                                    <h6><?php echo $file['file_name'] ?></h6>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-lg-12">
                    <div class="card card-block card-stretch card-transparent">
                        <div class="card-header d-flex justify-content-between pb-0">
                            <div class="header-title">
                                <h4 class="card-title">Folders</h4>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <span class="dropdown-toggle dropdown-bg btn bg-white" id="dropdownMenuButton1" data-toggle="dropdown">
                                        Name<i class="ri-arrow-down-s-line ml-1"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="#">Last modified</a>
                                        <a class="dropdown-item" href="#">Last modifiedby me</a>
                                        <a class="dropdown-item" href="#">Last opened by me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach (getFolders() as $key => $folder) : ?>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo BASE_URL . 'folders?slug=' . $folder['slug'] ?>" class="folder">
                                        <div class="icon-small bg-danger rounded mb-4">
                                            <i class="ri-folder-line"></i>
                                        </div>
                                    </a>
                                    <div class="card-header-toolbar">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown">
                                                <i class="ri-more-2-fill"></i>
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                                                <a class="dropdown-item" href="<?php echo BASE_URL . 'folders?slug=' . $folder['slug'] ?>"><i class="ri-eye-fill mr-2"></i>View</a>
                                                <a class="dropdown-item" href="<?php echo BASE_URL . 'action/folders/delete?slug=' . $folder['slug'] ?>"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo BASE_URL . 'folders?slug=' . $folder['slug'] ?>" class="folder">
                                    <h6 class="mb-2"><?php echo $folder['name'] ?></h6>
                                    <p class="mb-2"><i class="lar la-clock text-danger mr-2 font-size-16"></i> <?php echo date('d M, Y', strtotime($folder['created_at'])) ?></p>
                                    <p class="mb-0"><i class="las la-file-alt text-danger mr-2 font-size-16"></i> <?php echo $folder['total_files'] ?> Files</p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-lg-12 col-xl-12">
                    <div class="card card-block card-stretch card-height files-table">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Files</h4>
                            </div>
                            <div class="card-header-toolbar d-flex align-items-center">
                                <a href="<?php echo BASE_URL . 'files' ?>" class=" view-more">View All</a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0 table-borderless tbl-server-info">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Members</th>
                                            <th scope="col">Last Edit</th>
                                            <th scope="col">Size</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach (getFiles() as $key => $file) : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="icon-small bg-danger rounded mr-3">
                                                            <i class="ri-file-excel-line"></i>
                                                        </div>
                                                        <div data-load-file="file" data-load-target="#resolte-contaniner" data-url="<?php echo $file['file_dir'] ?>" data-toggle="modal" data-target="#exampleModal" data-title="Weekly-report.pdf" style="cursor: pointer;"><?php echo $file['file_name'] ?></div>
                                                    </div>
                                                </td>
                                                <td>Me</td>
                                                <td><?php echo $file['modified_date_time'] ?></td>
                                                <td><?php echo $file['size'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle" id="dropdownMenuButton6" data-toggle="dropdown">
                                                            <i class="ri-more-fill"></i>
                                                        </span>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
                                                            <a class="dropdown-item" href="<?php echo BASE_URL . 'action/files/delete?slug=' . $file['slug'] ?>"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                                            <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                                            <a class="dropdown-item" href="<?php echo $file['file_dir'] ?>"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $premiumPackage = getPremiumPackage();
                if ($premiumPackage) : ?>
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height  plan-bg">
                            <div class="card-body">
                                <h4 class="mb-3 text-white">Unlock Your plan</h4>
                                <p>Expanded Storage, Access To<br> More Features On File Storage</p>
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-8 go-white ">
                                        <button onclick="makePayment(<?php echo $premiumPackage['id'] . ',' . $premiumPackage['price'] ?>)" data-packageid="<?php echo $premiumPackage['id'] ?>" class="btn d-inline-block mt-5">Go Premium</button>
                                    </div>
                                    <div class="col-4">
                                        <img src="assets/images/layouts/mydrive/lock-bg.png" class="img-fluid" alt="image1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include('common/footer.php') ?>