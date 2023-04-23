<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Sono:wght@400;500&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/contacts.css'); ?>">
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

    <section class="contact-container relative flex align-center justify-center">
        <span class="overlay absolute"></span>
        <div class="contact-box flex space-between relative">

            <article class="contact-list">
                 <h2 class="contact-heading">
                    Contact Us
                </h2>
                <ul class="official-contact_list">
                    <h4 class="list-heading">Offical Lines</h4>
                    <li>
                        <i class="fa fa-phone"></i>
                        <span>+234-123-456-789</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-whatsapp"></i>
                        <span>+234-987-654-321</span>
                    </li>
                    <li>
                        <i class="fa fa-at"></i>
                        <span>hello@zerogym.com</span>
                    </li>
                </ul>

                <ul class="social-contact_list">
                    <h4 class="list-heading">Social Media Handles</h4>
                    <li>
                        <i class="fa-brands fa-twitter"></i>
                        <span>@zero_gym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-linkedin"></i>
                        <span>the_zero_gym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-instagram"></i>
                        <span>the_real_zerogym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook"></i>
                        <span>real_zerogym</span>
                    </li>

                </ul>
            </article>
            <article class="contact-message relative flex align-center ">
                <h2 class="heading">Kindly Leave us a message</h2>
                <textarea placeholder="message..." class="contact-textarea" name="contact-message" id="contact-message" cols="30" rows="8"></textarea>
                <button class="btn">Submit</button>
            </article>
            <section class="absolute contact-footer flex align-center space-between">
                <div class="subscribe-area flex">
                    <input type="email" placeholder="kindly enter your email">
                    <button class="btn subscribe-btn" title="get all our lastest deals...">Subscribe</button>
                    <small>Unsubscribe anytime...</small>
                </div>
                <address class="contact-address">
                    Head Office: 55, Jacklin drive-view, opp. federal secretariat, Abuja.
                    <p>- you can also find us in all major cities of the country...</p>
                </address>

            </section>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-item flex2">
                <div class="footer-header footer-head">
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

            <div class="footer-item flex2">
                <div class="footer-header footer-head">
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

            <div class="footer-item">
                <div class="footer-header footer-head new">
                    <p>NEWSLETTER</p>
                </div>

                <div class="footer-text">
                    <p>Subscribe to our latest newsletter to get news about special discounts.</p>
                    <input type="search" placeholder="Enter your email">
                    <div class="footerbtn">
                        <button>Subscribe</button>
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