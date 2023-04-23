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
    <link rel="stylesheet" href="<?php echo assets('css/post.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
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
            </div>

            <div class="account">
                <a class="login" href="<?php echo redirect('login'); ?>">
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


    <div class="sms">
        <div class="bg-img">

        </div>
    </div>

    <div class="flex-texts1">
        <div>
            <div class="flex-texts2">
               <p class="flex-header"> <?php echo $post['title']; ?></p>
               <p class="flex-date"><span style="color: #DEEF0B;">By Admin</span> | <span style="color: #DEEF0B;"><?php echo date("j F, Y", strtotime($post['created_at'])); ?></span></p>

               <div class="flextext">
                <p class="p1">
                    <?php echo $post['content']; ?>
                </p>
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

            <div class="footer-item">
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


</body>
</html>