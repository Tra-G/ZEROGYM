<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Sono:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!--icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--Stylesheet link-->
    <link rel="stylesheet" href="<?php echo assets('css/style.css'); ?>">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="nav">
        <div class="navbar">
            <div class="nav-title">
                <a href="<?php echo redirect(''); ?>">
                    <i class="fa-solid fa-dumbbell fa-2xl" style="color: #DEEF0B;"></i>
                    <p class="navtext">zero<span>gym</span></p>
                    <span class="mdi mdi-weight-lifter"></span>
                </a>
            </div>

            <div class="navlinks">
                <ul>
                    <a href="<?php echo redirect("") ?>">
                        <li>Home</li>
                    </a>

                    <a href="<?php echo redirect("about") ?>">
                        <li>About Us</li>
                    </a>

                    <a href="<?php echo redirect("blog") ?>">
                        <li>Blog</li>
                    </a>

                    <a href="<?php echo redirect("contact") ?>">
                        <li>Contact Us</li>
                    </a>

                    <a href="<?php echo redirect("register") ?>">
                        <li>Join Us</li>
                    </a>
                </ul>
            </div>

            <div class="account">
                <a class="login" href="<?php echo redirect("login") ?>">
                    <li>Login</li>
                </a>


            </div>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>


    <div class="containerbox">
        <swiper-container class="sms" navigation="true" effect="fade" space-between="30"
                centered-slides="true" autoplay-delay="5500" loop="true" autoplay-disable-on-interaction="false">
                <swiper-slide class="slide1">
                    <div class="card-details">
                        <p class="cardtext">Build your perfect body and accelerate a healthy growth</p>
                        <span class="cardbutton">
                            <a href="<?php echo redirect("about") ?>">
                                Learn More
                            </a>
                        </span>
                    </div>
                </swiper-slide>

                <swiper-slide class="slide2">
                    <div class="card-details">
                        <p class="cardtext">Make the most of your workout. Get results you can see and feel.</p>
                        <span class="cardbutton">
                            <a href="<?php echo redirect("about") ?>">
                                Learn More
                            </a>
                        </span>
                    </div>
                </swiper-slide>

                <swiper-slide class="slide3">
                    <div class="card-details">
                        <p class="cardtext">Learn Fitness From Professionals. Learn To Defend Your Health.</p>
                        <span class="cardbutton">
                            <a href="<?php echo redirect("about") ?>">
                                Learn More
                            </a>
                        </span>
                    </div>
                </swiper-slide>


            </swiper-container>
    </div>
    </div>

    <div class="sect2">
        <div class="sect2-head">
            <p>Why choose us?</p>
        </div>
        <div class="flex-container">
            <div class="container1">
                <img src="<?php echo assets('images/img29.jpg'); ?>">


            </div>

            <div class="container2">
                <h1 class="container2-header">
                    keep your mind and body <span>strong with us!</span>
                </h1>
                <p class="container2-text">We provide instructors with years of experirnce to assist your health journey. We also provide nutrition to make your workout effective.</p>
                <a class="container2-btn" href="<?php echo redirect('about'); ?>">
                    About Us
                </a>
            </div>
        </div>
    </div>


    <div class="sect3">
        <div class="sect3-container">
            <div class="sect3-header">
                <h1>Training Programs</h1>
            </div>


            <div class="card">
                <div class="cardbox">
                    <img src="<?php echo assets('images/img15.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Weight lifter</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img16.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Cardio strength</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img20.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Fitness workout</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img12.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Rope Exercise</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img25.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Push ups</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img28.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Lever pull</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img26.png'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Power Yoga</p>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img27.jpg'); ?>">
                    <div class="card-text">
                        <p class="cardtitle">Leg Exercise</p>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="sect4">
        <div>
            <div class="sect4header">
                <p class="sect4header">Pricing Plans</p>
            </div>

            <div class="sect4-container">
                <div class="con">
                    <div class="con-head">
                        <h3>Silver Package</h3>
                    </div>

                    <div class="con-price">
                        <h3 class="price1">$39</h3>
                        <p class="price2">per month</p>
                    </div>

                    <div class="benefits">
                        <ul>
                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>24/7 GYM manager support</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>01 Sweatshirt</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Access to Videos</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color:#626262;" class="fa fa-times" aria-hidden="true"></i>
                                <li style="color:#626262;">Weight Lifting</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color:#626262;" class="fa fa-times" aria-hidden="true"></i>
                                <li style="color:#626262;">Swimming pool 13:00 - 18:00</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color:#626262;" class="fa fa-times" aria-hidden="true"></i>
                                <li style="color:#626262;">Muscle Stretching & Relaxing room</li>
                            </div>
                        </ul>
                    </div>

                    <div class="benefits-btn">
                        <span>
                            <a href="<?php echo redirect('register'); ?>">Join Us</a>
                        </span>
                    </div>
                </div>

                <div class="con">
                    <div class="con-head">
                        <h3>Gold Package</h3>
                    </div>

                    <div class="con-price">
                        <h3 class="price1">$69</h3>
                        <p class="price2">per month</p>
                    </div>

                    <div class="benefits">
                        <ul>
                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>24/7 GYM manager support</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>01 Sweatshirt</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Access to Videos</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Weight Lifting</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #626262;" class="fa fa-times" aria-hidden="true"></i>
                                <li style="color:#626262;">Swimming pool 13:00 - 18:00</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #626262;" class="fa fa-times" aria-hidden="true"></i>
                                <li style="color:#626262;">Muscle Stretching & Relaxing room</li>
                            </div>
                        </ul>
                    </div>

                    <div class="benefits-btn">
                        <span>
                            <a href="<?php echo redirect('register'); ?>">Join Us</a>
                        </span>
                    </div>
                </div>

                <div class="con">
                    <div class="con-head">
                        <h3>Platinum Package</h3>
                    </div>

                    <div class="con-price">
                        <h3 class="price1">$129</h3>
                        <p class="price2">per month</p>
                    </div>

                    <div class="benefits">
                        <ul>
                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>24/7 GYM manager support</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>01 Sweatshirt</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Access to Videos</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Weight Lifting</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Swimming pool 13:00 - 18:00</li>
                            </div>

                            <div class="benefits-icon">
                                <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                                <li>Muscle Stretching & Relaxing room</li>
                            </div>
                        </ul>
                    </div>

                    <div class="benefits-btn Platinum">
                        <span>
                            <a href="<?php echo redirect("register") ?>">Join Us</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="sect5">
        <div class="sect5-container">
            <div class="sect5-header">
                <p>Our <span>Trainers</span> </p>
            </div>

            <div class="sect5-cont">
                <div class="sect5-image">
                    <img src="<?php echo assets('images/img2.jpg'); ?>">
                    <div class="coach">
                        <span class="coachname">Jack Foeg</span>
                        <span class="coachwork">Crossfit Coach</span>
                    </div>
                </div>

                <div class="sect5-image">
                    <img src="<?php echo assets('images/img3.jpg'); ?>">
                    <div class="coach">
                        <span class="coachname">Mary Wayne</span>
                        <span class="coachwork">Fitness Trainer</span>
                    </div>
                </div>

                <div class="sect5-image">
                    <img src="<?php echo assets('images/img5.png'); ?>">

                    <div class="coach">
                        <span class="coachname">James loy</span>
                        <span class="coachwork">Bodybuilding Coach</span>
                    </div>
                </div>

                <div class="sect5-image">
                    <img src="<?php echo assets('images/img24.jpg'); ?>">

                    <div class="coach">
                        <span class="coachname">Sandy Newman</span>
                        <span class="coachwork">Zumba Coach</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sect6">
        <div class="sect6-container">
            <div class="sect6-story">
                <div class="sect6image">
                    <img src="<?php echo assets('images/img17.png'); ?>">
                </div>

                <div class="sect6-text">
                    <p class="sect6-text1">Success Stories Speak On our Behalf</p>
                    <span class="sect6-text2">
                        <a href="<?php echo redirect('register'); ?>">
                            Become a member
                        </a>
                    </span>
                </div>
            </div>
            <div class="line"></div>
        </div>
    </div>


    <footer>
        <div class="footer-container" style="padding-left: 40px; padding-right: 40px">

            <div class="footer-item">
                <div class="footer-header">
                    <p>QUICK LINKS</p>
                </div>

                <div class="footer-text">
                    <ul>
                        <li><a href="<?php echo redirect
                        (''); ?>">Home</a></li>
                        <li><a href="<?php echo redirect
                        ('about'); ?>">About Us</a></li>
                        <li><a href="<?php echo redirect
                        ('blog'); ?>">Blog</a></li>
                        <li><a href="<?php echo redirect
                        ('contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-item">
                <div class="footer-header">
                    <p>ACCOUNT</p>
                </div>

                <div class="footer-text">
                    <ul>
                        <li><a href="<?php echo redirect
                        ('login'); ?>">Login</a></li>
                        <li><a href="<?php echo redirect
                        ('register'); ?>">Join Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-item">
                <div class="footer-header">
                    <p>NEWSLETTER</p>
                </div>

                <div class="footer-text">
                    <p>Subscribe to our latest newsletter to get news about special discounts.</p>
                    <input type="search" placeholder="Enter your email">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
</body>
</html>