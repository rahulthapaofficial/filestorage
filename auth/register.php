<?php
session_start();
require_once '../config/config.php';

if (isset($_SESSION['is_authenticated'])) {
   if (isset($_SESSION['is_verified'])) {
      if ($_SESSION['is_verified']) {
         header('Location: ' . BASE_URL . 'dashboard');
      }
   }
}

if (isset($_SESSION['message'])) {
   $message = $_SESSION['message'];
}
?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>File Storage | Store and Explore Your Files</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="../assets/images/favicon.ico" />

   <link rel="stylesheet" href="../assets/css/backend.min.css">
   <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
   <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">

   <!-- Viewer Plugin -->
   <!--PDF-->
   <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/pdf/pdf.viewer.css">
   <!--Docs-->
   <!--PPTX-->
   <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css">
   <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css">
   <!--All Spreadsheet -->
   <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css">
   <!--Image viewer-->
   <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css">
   <!--officeToHtml-->
   <link rel="stylesheet" href="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css">
</head>

<body class=" ">
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->

   <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
            <div class="row justify-content-center align-items-center height-self-center">
               <div class="col-md-5 col-sm-12 col-12 align-self-center">
                  <div class="sign-user_card">
                     <h3 class="mb-3">Sign Up</h3>
                     <p>Create your account.</p>
                     <form id="registerForm" action="<?php echo BASE_URL . 'action/register' ?>" method="POST">
                        <div class="row">
                           <div class="col-lg-12">
                              <?php
                              if (isset($_SESSION['message'])) { ?>
                                 <div class="alert alert-danger" role="alert">
                                    <div class="iq-alert-text"><?php echo $message ?></div>
                                 </div>
                              <?php
                                 unset($_SESSION['message']);
                              } ?>
                           </div>
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" name="first_name" type="text" value="<?php echo @$_POST['first_name'] ?>" placeholder=" ">
                                 <label>First Name</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" name="last_name" type="text" value="<?php echo @$_POST['last_name'] ?>" placeholder=" ">
                                 <label>Last Name</label>
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" name="mobile_no" type="number" value="<?php echo @$_POST['mobile_no'] ?>" placeholder=" ">
                                 <label>Mobile No.</label>
                              </div>
                           </div>
                           <!-- <div class="col-lg-12">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" name="email" type="email" value="<?php echo @$_POST['email'] ?>" placeholder=" ">
                                 <label>Email</label>
                              </div>
                           </div> -->
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" name="password" type="password" placeholder=" ">
                                 <label>Password</label>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="floating-label form-group">
                                 <input class="floating-input form-control" name="confirm_password" type="password" placeholder=" ">
                                 <label>Confirm Password</label>
                              </div>
                           </div>
                        </div>
                        <button type="button" name="sign_up" class="btn btn-primary" id="registerBtn">Sign Up</button>
                        <p class="mt-3">
                           Already have an Account? <a href="<?php echo BASE_URL . 'auth/login' ?>" class="text-primary">Sign In</a>
                        </p>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>

   <!-- Backend Bundle JavaScript -->
   <script src="../assets/js/backend-bundle.min.js"></script>

   <!-- Chart Custom JavaScript -->
   <script src="../assets/js/customizer.js"></script>

   <!-- Chart Custom JavaScript -->
   <script src="../assets/js/chart-custom.js"></script>

   <!--PDF-->
   <script src="../assets/vendor/doc-viewer/include/pdf/pdf.js"></script>
   <!--Docs-->
   <script src="../assets/vendor/doc-viewer/include/docx/jszip-utils.js"></script>
   <script src="../assets/vendor/doc-viewer/include/docx/mammoth.browser.min.js"></script>
   <!--PPTX-->
   <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/filereader.js"></script>
   <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/d3.min.js"></script>
   <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/nv.d3.min.js"></script>
   <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/pptxjs.js"></script>
   <script src="../assets/vendor/doc-viewer/include/PPTXjs/js/divs2slides.js"></script>
   <!--All Spreadsheet -->
   <script src="../assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.js"></script>
   <script src="../assets/vendor/doc-viewer/include/SheetJS/xlsx.full.min.js"></script>
   <!--Image viewer-->
   <script src="../assets/vendor/doc-viewer/include/verySimpleImageViewer/js/jquery.verySimpleImageViewer.js"></script>
   <!--officeToHtml-->
   <script src="../assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.js"></script>
   <script src="../assets/js/doc-viewer.js"></script>
   <!-- app JavaScript -->
   <script src="../assets/js/app.js"></script>

   <script>
      $(document).ready(function() {
         $('#registerBtn').click(function() {
            $(this).prop('disabled', true);
            $('#registerForm').submit();
         });
      });
   </script>
</body>

</html>