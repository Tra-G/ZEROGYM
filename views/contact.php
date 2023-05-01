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
                        <span>zero_gym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-instagram"></i>
                        <span>zero_gym</span>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook"></i>
                        <span>zero_gym</span>
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
            <div class="footer-item">
                <div class="footer-header">
                    <p>INFORMATION</p>
                </div>

                <div class="footer-text1">
                    <span>Our Classes</span>
                    <span>Product Support</span>
                    <span>Report Abuse</span>
                    <span>Redeem Voucher</span>
                    <span>Checkout</span>
                </div>
            </div>

            <div class="footer-item">
                <div class="footer-header support">
                    <p>SUPPORT</p>
                </div>

                <div class="footer-text1">
                    <span>Policies & Rules</span>
                    <span>Privacy Policy</span>
                    <span>Licence Policy</span>
                    <span>My Account</span>
                    <span>Locality</span>
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