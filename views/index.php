<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Sono:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!--icon link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo assets('css/style.css'); ?>">
</head>
<body>
    <div class="nav">
        <div class="navbar">
            <header class="nav-title">
                <a href="<?php echo redirect(''); ?>">
                    <i class="fa-solid fa-dumbbell fa-2xl" style="color: #DEEF0B;"></i>
                    <p class="navtext">zero<span>gym</span></p>
                    <span class="mdi mdi-weight-lifter"></span>
                </a>
            </header>

            <nav class="navlinks">
                <i style="color: #fff;" class="fa fa-times"></i>
                <div>
                    <a href="<?php echo redirect(''); ?>">
                        <span>Home</span>
                    </a>

                    <a href="<?php echo redirect('blog'); ?>">
                        <span>Blog</span>
                    </a>

                    <a href="<?php echo redirect('about'); ?>">
                        <span>About Us</span>
                    </a>
                    <a href="<?php echo redirect('contact'); ?>">
                        <span>Contact Us</span>
                    </a>

                    <a href="<?php echo redirect('register'); ?>">
                        <span>Join Us</span>
                    </a>
                </div>

                <div class="account">
                    <a class="login" href="<?php echo redirect('login'); ?>">
                        <span>Login</span>
                    </a>
                </div>
            </nav>

            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="account1">
                <a class="login" href="<?php echo redirect('login'); ?>">
                    <span>Login</span>
                </a>
            </nav>
        </div>
    </div>


    <div class="containerbox">
        <swiper-container class="sms" navigation="false" pagination="true" effect="fade" space-between="30"
                centered-slides="true" autoplay-delay="5500" loop="true" autoplay-disable-on-interaction="false">
                <swiper-slide class="slide1">
                    <div class="card-details">
                        <p class="cardtext">Build your perfect body and accelerate a healthy growth</p>
                        <span class="cardbutton">
                            <a href="<?php echo redirect('about'); ?>">
                                Learn More
                            </a>
                        </span>
                    </div>
                </swiper-slide>

                <swiper-slide class="slide3">
                    <div class="card-details">
                        <p class="cardtext">Learn Fitness From Professionals To Build A Healthy Growth</p>
                        <span class="cardbutton">
                            <a href="<?php echo redirect('about'); ?>">
                                Learn More
                            </a>
                        </span>
                    </div>
                </swiper-slide>

        </swiper-container>
    </div>


    <div class="sect2">
        <header class="sect2-head">
            <p >Why choose us?</p>
        </header>

        <div class="flex-container">
            <div class="container1">
                <img src="<?php echo assets('images/img29.jpg'); ?>" alt="keep your mind and body">
            </div>

            <div class="container2">
                <h1 class="container2-header">
                    keep your mind and body <span>strong with us!</span>
                </h1>
                <p class="container2-text">We provide instructors with years of experience to assist your health journey. We also provide nutrition to make your workout effective.</p>
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
                    <img src="<?php echo assets('images/img15.jpg'); ?>" alt="Weight lifter">
                    <div class="card-text">
                        <header class="cardtitle">
                            Weight lifter
                        </header>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img20.jpg'); ?>" alt="Fitness workout">
                    <div class="card-text">
                        <header class="cardtitle">
                            Fitness Workout
                        </header>

                    </div>
                </div>

                <div class="cardbox">
                    <img src="<?php echo assets('images/img25.jpg'); ?>" alt="Push ups">
                    <div class="card-text">
                        <header class="cardtitle">
                            Push Up
                        </header>

                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="sect4">
        <div>
            <header class="sect4header">
                <p class="sect4header">Pricing Plans</p>
            </header>

            <div class="sect4-container">
                <div class="con">
                    <header class="con-head">
                        <h3>Silver Package</h3>
                    </header>

                    <div class="con-price">
                        <h3 class="price1">£39</h3>
                        <p class="price2">per month</p>
                    </div>

                    <div class="benefits">
                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>24/7 GYM manager support</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>01 Sweatshirt</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Access to Videos</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color:#626262;" class="fa fa-check"></i>
                            <span style="color:#626262;">Weight Lifting</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color:#626262;" class="fa fa-check"></i>
                            <span style="color:#626262;">Swimming pool 13:00 - 18:00</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color:#626262;" class="fa fa-check"></i>
                            <span style="color:#626262;">Muscle Stretching & Relaxing room</span>
                        </div>
                    </div>

                    <div class="benefits-btn">
                        <span>
                            <a href="<?php echo redirect('register'); ?>">Join Us</a>
                        </span>
                    </div>
                </div>

                <div class="con">
                    <header class="con-head">
                        <h3>Gold Package</h3>
                    </header>

                    <div class="con-price">
                        <h3 class="price1">£69</h3>
                        <p class="price2">per month</p>
                    </div>

                    <div class="benefits">
                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>24/7 GYM manager support</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>01 Sweatshirt</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Access to Videos</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Weight Lifting</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #626262;" class="fa fa-check"></i>
                            <span style="color:#626262;">Swimming pool 13:00 - 18:00</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #626262;" class="fa fa-check"></i>
                            <span style="color:#626262;">Muscle Stretching & Relaxing room</span>
                        </div>
                    </div>

                    <div class="benefits-btn">
                        <span>
                            <a href="<?php echo redirect('register'); ?>">Join Us</a>
                        </span>
                    </div>
                </div>

                <div class="con">
                    <header class="con-head">
                        <h3>Platinum Package</h3>
                    </header>

                    <div class="con-price">
                        <h3 class="price1">£129</h3>
                        <p class="price2">per month</p>
                    </div>

                    <div class="benefits">
                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>24/7 GYM manager support</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>01 Sweatshirt</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Access to Videos</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Weight Lifting</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Swimming pool 13:00 - 18:00</span>
                        </div>

                        <div class="benefits-icon">
                            <i style="color: #DEEF0B;" class="fa fa-check"></i>
                            <span>Muscle Stretching & Relaxing room</span>
                        </div>

                    </div>

                    <div class="benefits-btn Platinum">
                        <span>
                            <a href="<?php echo redirect('register'); ?>">Join Us</a>
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
                    <img src="<?php echo assets('images/img2.jpg'); ?>" alt="Crossfit Coach">
                    <div class="coach">
                        <span class="coachname">Jack Foeg</span>
                        <span class="coachwork">Crossfit Coach</span>
                    </div>
                </div>

                <div class="sect5-image">
                    <img src="<?php echo assets('images/img3.jpg'); ?>" alt="Fitness Trainer">
                    <div class="coach">
                        <span class="coachname">Mary Wayne</span>
                        <span class="coachwork">Fitness Trainer</span>
                    </div>
                </div>


                <div class="sect5-image">
                    <img src="<?php echo assets('images/img24.jpg'); ?>" alt="Bodybuilding Coach">

                    <div class="coach">
                        <span class="coachname">Sandy Newman</span>
                        <span class="coachwork">Bodybuilding Coach</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="sect6">
        <div class="sect6-container">
            <div class="sect6-story">
                <div class="sect6image">
                    <img src="<?php echo assets('images/img31.webp'); ?>" alt="Success Stories">
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
        <div class="footer-container">
            <div class="footer-item">
                <div class="footer-header">
                    <p>INFORMATION</p>
                </div>

                <div class="footer-text1">
                    <span><a href="<?php echo redirect(''); ?>">Home</a></span>
                    <span><a href="<?php echo redirect('about'); ?>">About</a></span>
                    <span><a href="<?php echo redirect('contact'); ?>">Contact</a></span>
                    <span><a href="<?php echo redirect('blog'); ?>">Blog</a></span>
                    <span><a href="<?php echo redirect('login'); ?>">Account</a></span>
                </div>
            </div>

            <div class="footer-item news">
                <div class="footer-header">
                    <p>NEWSLETTER</p>
                </div>

                <div class="footer-text">
                    <p>Subscribe to our latest newsletter to get news about special discounts.</p>
                    <form action="#">
                        <input type="search" placeholder="Enter your email">
                        <div class="footerbtn">
                            <button class="footer-btn">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script>
        const hamburger = document.querySelector(".hamburger");
        const menu = document.querySelector(".navlinks");
        const closeIcon = document.querySelector('.fa-times');

        hamburger.addEventListener("click", function() {
            menu.classList.toggle("show");
        });

        closeIcon.addEventListener('click', () => {
  menu.classList.remove('show');
});


// Add smooth scroll animation to all anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth'
    });
  });
});

    </script>
</body>
</html>