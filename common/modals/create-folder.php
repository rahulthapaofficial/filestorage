<div class="modal fade" id="createFolderModal" tabindex="-1" role="dialog" aria-labelledby="createFolderModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFolderModalTitle">Create Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo BASE_URL . 'action/folders/store' ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if (isset($_SESSION['is_folder_created'])) :
                                if (!$_SESSION['is_folder_created']) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="iq-alert-text"><?php echo $_SESSION['message'] ?></div>
                                    </div>
                            <?php endif;
                            endif ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Folder Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Folder Name" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>