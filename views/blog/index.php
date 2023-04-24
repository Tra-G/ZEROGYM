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
    <link rel="stylesheet" href="<?php echo assets('css/blog.css'); ?>">
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

    <div class="blogpost">
        <div class="blog-image">
            <div class="blog-header">
                <p>Our <span style="color: #DEEF0B;">Blog</span></p>
            </div>

        </div>

        <div class="searchbar">
            <div class="input-flex">
                <input type="search" placeholder="Enter Your Search">
                <button>Search</button>
            </div>
        </div>
    </div>


    <div class="card-details">
        <div class="blog-container">
            <div class="blog-item1">
                <?php if ($posts): ?>
                <?php foreach($posts as $post): ?>
                <div class="blog-card">

                    <div class="blog-img">
                        <img src="<?php echo redirect('assets/media/'.$post['thumbnail_path']); ?>">
                    </div>
                    <p class="blog-text1"><span style="color: #DEEF0B;">By Admin</span> | <span style="color: #DEEF0B;"><?php echo date("j F, Y", strtotime($post['created_at'])); ?></span></p>
                    <p class="blog-text2">
                        <a href="<?php echo redirect("blog/".$post['id']); ?>">
                            <?php echo $post['title']; ?>
                        </a>
                    </p>
                    <p class="blog-text3"><?php echo implode(' ', array_slice(str_word_count($post['content'], 1), 0, 10)); ?>...</p>
                    <a href="<?php echo redirect("blog/".$post['id']); ?>">
                        <div class="blog-btn">
                            Read More
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
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