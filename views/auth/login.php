<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css"> -->
    <link rel="stylesheet" href="<?php echo assets('css/login.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
    <!--ICON LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div>
        <div class="flex-item">
            <div class="first-half">
                <div class="container-flex">
                    <div>
                        <div class="titlehead">
                            <div class="nav-title">
                                <a href="<?php echo redirect(''); ?>">
                                    <i class="fa-solid fa-dumbbell fa-2xl" style="color: #DEEF0B;"></i>
                                    <p class="navtext">zero<span>gym</span></p>
                                    <span class="mdi mdi-weight-lifter"></span>
                                </a>
                            </div>

                            <div>
                                <p class="titlehead1">Welcome to zero<span style="color: #DEEF0B;">gym</span></p>
                                <p class="titlehead2">Let's get you up and running with zerogym</p>
                            </div>
                        </div>

                        <form action="" method="post" id="login_form">
                            <div class="signup">
                            <?php if (!empty($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li class="titlehead2"><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                                <div>
                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-envelope" aria-hidden="true"></i>
                                        <input name="email" type="text" placeholder="Email" required>
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        <input name="password" type="password" placeholder="Password" required>
                                    </div>

                                    <div class="reminder">
                                        <div>
                                            <input type="checkbox">
                                            <span>Remember me</span>
                                        </div>
                                    </div>

                                    <div class="signup-btn">
                                        <a href="#" onclick="document.getElementById('login_form').submit();">
                                            Login
                                        </a>
                                    </div>

                                    <div class="log">
                                        Don't have an account? <a style="color: #fff;" href="<?php echo redirect('register'); ?>">Sign up</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="second-half">

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
</body>
</html>