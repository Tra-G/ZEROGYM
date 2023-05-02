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
            <header class="nav-title">
                <a href="<?php echo redirect(''); ?>">
                    <i class="fa-solid fa-dumbbell fa-2xl" style="color: #DEEF0B;"></i>
                    <p class="navtext">zero<span>gym</span></p>
                    <span class="mdi mdi-weight-lifter"></span>
                </a>
            </header>

            <div class="navlinks">
                <i style="color: #fff;" class="fa fa-times" aria-hidden="true"></i>
                <div>
                    <a href="<?php echo redirect(''); ?>">
                        <span>Home</span>
                    </a>

                    <a href="<?php echo redirect('blog'); ?>">
                        <span>Blog</span>
                    </a>

                    <a href="<?php echo redirect('about'); ?>l">
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
            </div>



            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="account1">
                <a class="login" href="<?php echo redirect('login'); ?>">
                    <span>Login</span>
                </a>
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
                <header class="flex-header"><?php echo $post['title']; ?></header>
               <p class="flex-date"><span style="color: #DEEF0B;">By Admin</span> | <span style="color: #DEEF0B;"><?php echo date("j F, Y", strtotime($post['created_at'])); ?></span></p>

               <div class="flextext">
                    <?php echo $post['content']; ?>
               </div>

               <div class="arror-key">
                <div class="prev">
                    <i class="fa fa-arrow-left"></i>
                    <span>Previous</span>
                </div>

                <div class="next">
                    <span>Next</span>
                    <i class="fa fa-arrow-right"></i>
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