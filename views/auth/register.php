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
    <div class="flex-item">
        <div class="first-half">
            <div class="container-flex">
                <form method="post">
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
                            <p class="titlehead2">
                                <?php foreach ($errors as $error): ?>
                                    <span><?php echo $error; ?></span>
                                <?php endforeach; ?>
                            </p>
                            <?php else: ?>
                            <p class="titlehead2">Let's get you up and running with zerogym</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="signup">
                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa fa-user icon" aria-hidden="true"></i>
                            <input name="name" type="text" placeholder="Enter your full name" required>
                        </div>

                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa fa-envelope icon" aria-hidden="true"></i>
                            <input name="email" type="text" placeholder="Enter your Email" required>
                        </div>

                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa-solid fa-phone icon"></i>
                            <input name="phone" type="text" placeholder="Enter your phone number" required>
                        </div>

                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa-solid fa-house icon"></i>
                            <input name="address" type="text" placeholder="Enter your address" required>
                        </div>

                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa-solid fa-city icon"></i>
                            <input name="city" type="text" placeholder="Enter your city" required>
                        </div>

                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa-solid fa-location-dot icon"></i>
                            <input name="postcode" type="text" placeholder="Enter your postcode" required>
                        </div>

                        <div class="textinput">
                            <i style="color: #DEEF0B;" class="fa fa-unlock-alt icon"></i>
                            <i onclick="toggleVisibility()" style="color: #deef0b" class="fa-solid fa-eye"></i>
                            <input name="password" id="password" type="password" placeholder="Enter your Password" required>
                        </div>



                        <div class="signup-btn">
                            <button type="submit">Sign Up</button>
                        </div>

                        <div class="log">
                            Already have an account? <a style="color: #fff;" href="<?php echo redirect('login'); ?>">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="second-half"></div>
    </div>



    <script>
        function toggleVisibility() {
			let passwordInput = document.getElementById("password");
			if (passwordInput.type === "password") {
				passwordInput.type = "text";
			} else {
				passwordInput.type = "password";
			}
		}
    </script>
</body>
</html>