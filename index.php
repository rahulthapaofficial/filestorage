<?php
include 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Storage | Store and Explore Your Files</title>
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

    <!-- TOP HEADER START FORM HERE  -->
    <section>
        <header>
            <div class="logo"><a href="<?php echo BASE_URL ?>">File Storage</a>
            </div>
            <div class="header-items">
                <div class="btn">
                    <a href="<?php echo BASE_URL . 'auth/register' ?>"><i class="las la-user-plus"></i> Create Account</a>
                </div>
                <div class="btn">
                    <a href="<?php echo BASE_URL . 'auth/login' ?>"><i class="las la-sign-in-alt"></i> Log in</a>
                </div>
            </div>
        </header>
        <!-- TOP HEADER END FORM HERE  -->

        <!-- NAVBAR START FORM HERE  -->
    </section>
    <section>
        <nav>
            <li><a href="#start">What is File Storage</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#pricing">Pricing</a></li>
        </nav>
    </section>
    <!-- NAVBAR END FORM HERE  -->

    <!-- FEATURES SECTION START FROM HERE -->
    <section>
        <div class="features-section">
            <div class="features-img">
                <img src="./assets/images/svg/undraw_secure_files_re_6vdh.svg" alt="">
            </div>
            <div class="features-content">
                <h5>Secure Cloud Storage and Communication
                    Privacy by Design</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequatur, veritatis ipsum deserunt amet accusamus
                    quos officiis incidunt odit provident modi laudantium
                    quibusdam molestias excepturi sed labore impedit
                    temporibus magnam facilis!</p>
            </div>
        </div>
        <div class="features-section-2">
            <div class="features-content">
                <h5>Secure Cloud Storage and Communication
                    Privacy by Design</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequatur, veritatis ipsum deserunt amet accusamus
                    quos officiis incidunt odit provident modi laudantium
                    quibusdam molestias excepturi sed labore impedit
                    temporibus magnam facilis!</p>
            </div>
            <div class="features-img">
                <img src="./assets/images/svg/Secure Server-amico.svg" alt="">
            </div>
        </div>

        <div class="features-section">
            <div class="features-img">
                <img src="./assets/images/svg/Sharing articles-amico.svg" alt="">
            </div>
            <div class="features-content">
                <h5>Highly secure server</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequatur, veritatis ipsum deserunt amet accusamus
                    quos officiis incidunt odit provident modi laudantium
                    quibusdam molestias excepturi sed labore impedit
                    temporibus magnam facilis!</p>
            </div>
        </div>
        <div class="features-section-2">
            <div class="features-content">
                <h5>Easy and Fast Transfer Files</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequatur, veritatis ipsum deserunt amet accusamus
                    quos officiis incidunt odit provident modi laudantium
                    quibusdam molestias excepturi sed labore impedit
                    temporibus magnam facilis!</p>
            </div>
            <div class="features-img">
                <img src="./assets/images/svg/Transfer files-amico.svg" alt="">
            </div>
        </div>

        <div class="features-section">
            <div class="features-img">
                <img src="./assets/images/svg/Fast loading-amico.svg" alt="">
            </div>
            <div class="features-content">
                <h5>Fast Downloding</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequatur, veritatis ipsum deserunt amet accusamus
                    quos officiis incidunt odit provident modi laudantium
                    quibusdam molestias excepturi sed labore impedit
                    temporibus magnam facilis!</p>
            </div>
        </div>
        <div class="features-section-2">
            <div class="features-content">
                <h5>Secure Cloud Storage and Communication
                    Privacy by Design</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consequatur, veritatis ipsum deserunt amet accusamus
                    quos officiis incidunt odit provident modi laudantium
                    quibusdam molestias excepturi sed labore impedit
                    temporibus magnam facilis!</p>
            </div>
            <div class="features-img">
                <img src="./assets/images/svg/Uploading-amico.svg" alt="">
            </div>
        </div>
    </section>
    <!-- PRICING SECTION START FROM HERE ! -->
    <section id="pricing">
        <div class="pricing-section">
            <div class="pricing-heading-title">
                <h1>Looking for a cloud storage alternative? Try MEGA.</h1>
                <h3>Take full advantage of MEGA with a Pro account.</h3>
                <h5>Annual subscription is 16% cheaper than 12 monthly payments</h5>
            </div>
            <div class="togle">

            </div>
            <div class="card-wrapper">
                <div class="price-card">
                    <div class="price-card-content">
                        <h2>Starter</h2>
                        <p>Get started with secure file storage.</p>
                        <h3>Rs. 6,000/-</h3>
                        <p>NPR <br> /year <br></p>
                        <a href="#">Get Pro Starter</a>
                    </div>
                    <div class="packages">
                        <ul>
                            <li><strong>2 TB Storage</strong></li>
                            <li><strong>5 TB Transfer</strong></li>
                            <li>Share easily and privately</li>
                            <li>end large files securely</li>
                            <li>Auto backup</li>
                            <li>File versioning</li>
                            <li>Private team messaging</li>
                            <li>Custom Rubbish Bin cleaner</li>
                            <li>ecure video conferencing</li>
                        </ul>
                    </div>
                </div>
                <div class="price-card">
                    <div class="price-card-content">
                        <h2>Basic</h2>
                        <p>Get started with secure file storage.</p>
                        <h3>Rs. 8,000/-</h3>
                        <p>NPR <br> /year <br></p>
                        <a href="#">Get Pro Starter</a>
                    </div>
                    <div class="packages">
                        <ul>
                            <li><strong>4 TB Storage</strong></li>
                            <li><strong>10 TB Transfer</strong></li>
                            <li>Share easily and privately</li>
                            <li>end large files securely</li>
                            <li>Auto backup</li>
                            <li>File versioning</li>
                            <li>Private team messaging</li>
                            <li>Custom Rubbish Bin cleaner</li>
                            <li>ecure video conferencing</li>
                        </ul>
                    </div>
                </div>
                <div class="price-card">
                    <div class="price-card-content">
                        <h2>Premium</h2>
                        <p>Get started with secure file storage.</p>
                        <h3>Rs. 10,000/-</h3>
                        <p>NPR <br> /year <br></p>
                        <a href="#">Get Pro Starter</a>
                    </div>
                    <div class="packages">
                        <ul>
                            <li><strong>6 TB GB Storage</strong></li>
                            <li><strong>15 TB Transfer</strong></li>
                            <li>Share easily and privately</li>
                            <li>end large files securely</li>
                            <li>Auto backup</li>
                            <li>File versioning</li>
                            <li>Private team messaging</li>
                            <li>Custom Rubbish Bin cleaner</li>
                            <li>ecure video conferencing</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- PLAN SECTION END FORM HERE  -->

    <!-- FOOTER SECTION START FROM HERE -->
    <div id="footer">
        <div class="footer-content about-section">
            <a href="<?php echo BASE_URL ?>">
                File Storage
            </a>
            <h3 class="footer-title">The Team Nested</h3>
            <h4 class="footer-title">User-Encrypted Cloud Services</h4>
            <h4 class="footer-title">© File Storage <?php echo date('Y') ?> All rights reserved</h5>
                <div class="footer-content social-media">
                    <h1 class="follow-us-heading">FOLLOW US</h1>
                    <ul>
                        <li><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li><a href="#"><i class="lab la-linkedin-in"></i></i></a></li>
                        <li><a href="#"><i class="lab la-github"></i></a></li>
                        <li><a href="#"><i class="lab la-instagram"></i></a></li>
                        <li><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li><a href="#"><i class="lab la-youtube"></i></a></li>
                    </ul>
                </div>
        </div>

        <div class="quick-links">
            <h1 class="heading-title">Quick Links</h1>
            <div class="footer-content links">
                <a href="#">What is File Storage</a>
                <a href="#">Features</a>
                <a href="#">Business</a>
                <a href="#pricing">Pricing</a>
            </div>
        </div>
        <div class="support">
            <h1 class="heading-title">Support</h1>
            <div class="footer-content links">
                <a href="#">Help Center</a>
                <a href="#">Contact Us</a>
                <a href="#">Get Support</a>
            </div>
        </div>

        <div class="legal">
            <h1 class="heading-title">Legal</h1>
            <div class="footer-content links">
                <a href="#">Terms of Services</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Takedown Guidance Policy</a>
            </div>
        </div>

        <div class="payment-gateway">
            <h1 class="heading-title">We Accept</h1>
            <div class="payment-gateway-links">
                <img src="./assets/images/Esewa-Remittance-Payment.png" alt="">
                <img src="./assets/images/Khalti_Digital_Wallet_Logo.png" alt="">
            </div>
        </div>
        <!-- FOOTER SECTION END FROM HERE -->

</body>

</html>