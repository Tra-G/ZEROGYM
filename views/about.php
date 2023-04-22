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
    <link rel="stylesheet" href="<?php echo assets('css/about.css'); ?>">
    <title><?php echo $title; ?></title></title>
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
                <i style="color: #fff;" class="fa fa-times" aria-hidden="true"></i>
                <ul>
                    <a href="<?php echo redirect(''); ?>">
                        <li>Home</li>
                    </a>

                    <a href="<?php echo redirect('blog'); ?>">
                        <li>Blog</li>
                    </a>

                    <a href="<?php echo redirect('about'); ?>">
                        <li>About Us</li>
                    </a>
                    <a href="<?php echo redirect('contact'); ?>">
                        <li>Contact Us</li>
                    </a>

                    <a href="<?php echo redirect('register'); ?>">
                        <li>Join Us</li>
                    </a>
                </ul>

                <div class="account">
                    <a class="login" href="<?php echo redirect('login'); ?>">
                        <li>Login</li>
                    </a>
                </div>
            </div>


            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="account1">
                <a class="login" href="<?php echo redirect('login'); ?>">
                    <li>Login</li>
                </a>
            </div>
        </div>
    </div>
    </div>


    <div class="sms">
        <div class="photo">
            <div class="photo-details">
                <div class="photo-text">
                    <span class="photo-span1">Stay Focused, Stay Fit</span>
                    <span class="photo-span2">Fitness Life Centre</span>
                </div>
            </div>
        </div>
    </div>


    <div class="about">
        <div class="about1">
            <p>About Us</p>
        </div>
    </div>


    <div class="sect2-about">
        <div class="sect2-flex">
            <div class="item-image">
                <img src="<?php echo assets('images/img25.jpg'); ?>">
            </div>

            <div class="text-container">
                <p class="sect2text1">Learn bodybuilding from the professionals as your guide.</p>
                <div>
                    <p class="sect2text2">We offer training in various difficulty levels that you can enjoy from fitness trainers. You will learn bodybuilding from professionals with our competent and experienced staff.</p>
                    <button class="sect2btn">Learn More</button>
                </div>

                <ul class="sect2-li">
                    <div class="liststyle">
                        <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                        <li>We make you professional by adding your sincerity as well as professionalism.</li>
                    </div>

                    <div class="liststyle">
                        <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                        <li>We always travel with the best equipment, respecting people and the environment.
                        </li>
                    </div>

                    <div class="liststyle">
                        <i style="color: #DEEF0B;" class="fa fa-check" aria-hidden="true"></i>
                        <li>We also provide necessary equipment to give you solid growth and effective </li>
                    </div>
                </ul>
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

    <div class="line"></div>


    <footer>
        <div class="footer-container">
            <div class="footer-item">
                <div class="footer-header">
                    <p>QUICK LINKS</p>
                </div>

                <div class="footer-text1">
                    <ul>
                        <li><a href="<?php echo redirect(''); ?>">Home</a></li>
                        <li><a href="<?php echo redirect('about'); ?>">About Us</a></li>
                        <li><a href="<?php echo redirect('blog'); ?>">Blog</a></li>
                        <li><a href="<?php echo redirect('contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-item">
                <div class="footer-header support">
                    <p>ACCOUNT</p>
                </div>

                <div class="footer-text1">
                    <ul>
                        <li><a href="<?php echo redirect('user/dashboard'); ?>">My Account</a></li>
                        <li><a href="<?php echo redirect('login'); ?>">Login</a></li>
                        <li><a href="<?php echo redirect('register'); ?>">Join Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-item news">
                <div class="footer-header">
                    <p>NEWSLETTER</p>
                </div>

                <div class="footer-text">
                    <p>Subscribe to our latest newsletter to get news about special discounts.</p>
                    <input type="search" placeholder="Enter your email">
                    <div class="footerbtn">
                        <button class="footer-btn">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>



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

    </script>

</body>
</html>