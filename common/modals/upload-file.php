<div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="uploadFileModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFileModalTitle">Create Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo BASE_URL . 'action/files/store' ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if (isset($_SESSION['is_file_uploaded'])) :
                                if (!$_SESSION['is_file_uploaded']) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <div class="iq-alert-text"><?php echo $_SESSION['message'] ?></div>
                                    </div>
                            <?php endif;
                            endif ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select Folder</label>
                                <select class="form-control" name="folder_id">
                                    <option value="" disabled selected>Select Folder</option>
                                    <?php
                                    foreach (getFolders() as $key => $folder) : ?>
                                        <option value="<?php echo $folder['id'] ?>"><?php echo $folder['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Folder Name</label>
                                <input class="form-control" name="file" type="file" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>