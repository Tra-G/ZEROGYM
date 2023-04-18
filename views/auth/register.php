<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css"> -->
    <link rel="stylesheet" href="<?php echo assets('css/signup.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
    <!--ICON LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container-all">
        <div class="left-column">


            <div class="form-content">
                <form style="width:inherit" action="" method="post">
                    <div class="form-container">
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
                                <?php if (!empty($errors)): ?>
                                        <ul>
                                            <?php foreach ($errors as $error): ?>
                                                <li class="titlehead2"><?php echo $error; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php else: ?>
                                    <p class="titlehead2">Let's get you up and running with zerogym</p>
                                    <?php endif; ?>
                            </div>
                        </div>

                            <div class="signup">

                                <div>
                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-user" aria-hidden="true"></i>
                                        <input name="name" type="text" placeholder="Full Name">
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-envelope" aria-hidden="true"></i>
                                        <input name="email" type="email" placeholder="Email">
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-phone" aria-hidden="true"></i>
                                        <input name="phone" type="tel" placeholder="Phone Number">
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-map-marker-alt" aria-hidden="true"></i>
                                        <input name="address" type="text" placeholder="Address">
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-city" aria-hidden="true"></i>
                                        <input name="city" type="text" placeholder="City">
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-map" aria-hidden="true"></i>
                                        <input name="state" type="text" placeholder="State">
                                    </div>

                                    <div class="textinput">
                                        <i style="color: #DEEF0B;" class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        <input name="password" type="password" placeholder="Password">
                                    </div>

                                    <div class="reminder">
                                            <input type="checkbox">
                                            <span>I agree to the Terms and Conditions</span>
                                        </div>

                                    <div>
                                        <button class="signup-btn">
                                            Signup
                                        </button>
                                    </div>

                                    <div class="log">
                                        Already have an account? <a style="color: #fff;" href="<?php echo redirect('login'); ?>">Login</a>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom"></div>
                        </div>
                    </div>

                        </form>

                    </div>

                </div>
                <div class="right-column">
            <!-- Right column content -->
            <div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
</body>
</html>