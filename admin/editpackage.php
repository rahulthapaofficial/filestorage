<?php include("common/header.php");
$package = getPackageById($_GET['id']);
?>
<div class="wrapper">
    <?php include("common/sidebar.php"); ?>
    <div class="main">
        <?php include("common/navbar.php"); ?>
        <main class="content">
            <div class="container-fluid">

                <div class="header">
                    <h1 class="header-title">
                        Modify Package
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL . 'admin/dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo BASE_URL . 'admin/viewpackages' ?>">Package</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Modify</li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Modify Package</h5>
                            </div>
                            <div class="card-body">
                                <form id="validation-form" action="<?php echo BASE_URL . 'admin/action/packages/update?id=' . $package['id'] ?>" method="POST">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="validation-name" value="<?php echo $package['name'] ?>" placeholder="Package Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Storage Size
                                                    <span class="text-danger">*</span>
                                                    <small class="text-primary">(Enter Storage Size in Kilobytes)</small>
                                                </label>
                                                <input type="text" class="form-control" name="validation-size" value="<?php echo $package['storage_size'] ?>" placeholder="Storage Size">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Price
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="validation-price" value="<?php echo $package['price'] ?>" placeholder="Price">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Duration
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" name="validation-duration">
                                                    <option value="">Select Duration</option>
                                                    <option value="Lifetime" <?php echo $package['duration'] == 'Lifetime' ? 'selected' : '' ?>>Life Time</option>
                                                    <option value="Annum" <?php echo $package['duration'] == 'Annum' ? 'selected' : '' ?>>Per Annum</option>
                                                    <option value="Semiannual" <?php echo $package['duration'] == 'Semiannual' ? 'selected' : '' ?>>Per Semiannual</option>
                                                    <option value="Month" <?php echo $package['duration'] == 'Month' ? 'selected' : '' ?>>Per Month</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include("common/footer.php"); ?>
    </div>
</div>
<svg width="0" height="0" style="position:absolute">
    <defs>
        <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong">
            <path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z">
            </path>
        </symbol>
    </defs>
</svg>

<script src="js/app.js"></script>

<script>
    $(function() {
        // Initialize validation
        $("#validation-form").validate({
            focusInvalid: true,
            rules: {
                "validation-name": {
                    required: true
                },
                "validation-size": {
                    required: true
                },
                "validation-price": {
                    required: true
                },
                "validation-duration": {
                    required: true
                },
            },
            // Errors
            errorPlacement: function errorPlacement(error, element) {
                var $parent = $(element).parents(".form-group");
                // Do not duplicate errors
                if ($parent.find(".jquery-validation-error").length) {
                    return;
                }
                $parent.append(
                    error.addClass("jquery-validation-error small form-text invalid-feedback")
                );
            },
            highlight: function(element) {
                var $el = $(element);
                var $parent = $el.parents(".form-group");
                $el.addClass("is-invalid");
                // Select2 and Tagsinput
                if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") === "tagsinput") {
                    $el.parent().addClass("is-invalid");
                }
            },
            unhighlight: function(element) {
                $(element).parents(".form-group").find(".is-invalid").removeClass("is-invalid");
            }
        });
    });
</script>

</body>

</html>