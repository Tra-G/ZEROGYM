<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo assets('css/reset_landing.css'); ?>">
    <title>
        <?php echo $title; ?>
    </title>
</head>

<body>
    <h2>Password Reset</h2>
    <form id="myForm" onsubmit="return submitForm()" method="post">
        <div class="container">
            <div class="card">
                <!-- <h1>Password Reset</h1> -->
                <form>
                    <p id="red-text" class="red-text"></P>
                    <label style="margin-top: 1rem" for="new-password">New Password:</label>
                    <input name="password" type="password" id="new-password" name="new-password" required>
                    <label for="confirm_password">Confirm Password:</label>
                    <input name="confirm_password" type="password" id="confirm_password" name="confirm-password"
                        required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </form>
</body>

<script>
    //FORGOT PASSWORD
    function submitForm() {
        var xhr = new XMLHttpRequest();
        var formData = new FormData(document.getElementById("myForm"));
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("red-text").innerHTML = xhr.responseText;
                setTimeout(function () {
                    window.location.href = "<?php echo redirect('login'); ?>";
                }, 2000); // Redirect after 2 seconds.
            }
        };
        xhr.open("POST", "<?php echo $token; ?>/change", true);
        xhr.send(formData);
        return false;
    }

</script>

</html>