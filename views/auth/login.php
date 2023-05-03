<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/all.min.css"> -->
    <link rel="stylesheet" href="<?php echo assets('css/login.css'); ?>">
    <link rel="stylesheet" href="<?php echo assets('css/global.css'); ?>">
    <!--ICON LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div class="background"></div>
    <form id="myForm" onsubmit="return submitForm()" method="post" class="modal">
        <div class="modal-header">
            <p>Forgot Your Password?</p>
        </div>

        <div id="result" class="modal-text">
            That's okay, it happens! Enter your email to reset password
        </div>

        <div class="email-modal">
            <input class="email-input" type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="email-modal">
            <button type="submit">Reset Password</button>
        </div>

        <div class="email-modal closebtn">
            <button type="submit">Go back</button>
        </div>
    </form>


    <div class="flex-item">
        <div class="first-half">
            <div class="container-flex">
                <form method="post">
                    <div class="titlehead">
                        <div class="nav-title">
                            <a href="<?php echo redirect(''); ?>">
                                <i class="fa-solid fa-dumbbell fa-2xl" style="color: #deef0b"></i>
                                <p class="navtext">zero<span>gym</span></p>
                                <span style="background-color: red" class="mdi mdi-weight-lifter"></span>
                            </a>
                        </div>

                        <div>
                            <p class="titlehead1">
                                Welcome to zero<span style="color: #deef0b">gym</span>
                            </p>
                            <?php if (!empty($errors)): ?>
                                <p class="titlehead2">
                                    <?php foreach ($errors as $error): ?>
                                        <span>
                                            <?php echo $error; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </p>
                            <?php else: ?>
                                <p class="titlehead2">Let's get you up and running with zerogym</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="signup">
                        <div>
                            <div class="textinput">
                                <i style="color: #deef0b" class="fa icon fa-envelope" aria-hidden="true"></i>
                                <input name="email" type="email" placeholder="Email" required>
                            </div>

                            <div class="textinput">
                                <div><i style="color: #deef0b" class="fa icon fa-unlock-alt" aria-hidden="true"></i>
                                </div>

                                <i onclick="toggleVisibility()" style="color: #deef0b" class="fa-solid fa-eye"></i>
                                <div class="input-wid">
                                    <input name="password" id="password" type="password" placeholder="Password"
                                        required>
                                </div>

                            </div>

                            <div class="reminder">
                                <div>
                                    <input type="checkbox">
                                    <span>Remember me</span>
                                </div>

                                <div class="forgot-password">
                                    Forgot password
                                </div>
                            </div>

                            <div class="signup-btn">
                                <button type="submit">Login</button>
                            </div>

                            <div class="log">
                                Don't have an account?
                                <a style="color: #fff" href="<?php echo redirect('register'); ?>">Sign up</a>
                            </div>
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


        let modal = document.querySelector('.modal');
        let background = document.querySelector('.background');
        let closeBtn = document.querySelector('.closebtn');
        let forgotPassword = document.querySelector('.forgot-password');

        function openForm() {
            background.style.display = 'block';
            modal.style.display = 'block';
        }

        function closeForm() {
            background.style.display = 'none';
            modal.style.display = 'none';
        }

        forgotPassword.onclick = openForm;
        closeBtn.onclick = closeForm;



        //FORGOT PASSWORD
        function submitForm() {
            var xhr = new XMLHttpRequest();
            var formData = new FormData(document.getElementById("myForm"));
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
            };
            xhr.open("POST", "reset", true);
            xhr.send(formData);
            return false;
        }

    </script>
</body>

</html>