<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
        }

        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <h1>Password Reset</h1>

    <br><br>
    <form id="myForm" onsubmit="return submitForm()" method="post">
        <div id="result" style="color: red;"></div><br>
        <div class="form-group">
            <!-- Take input for Password and confirm password -->
            <label for="password">New Password</label><br>
            <input type="password" name="password" placeholder="Enter password" class="form-control" id="password"
                required><br><br>
            <label for="confirm_password">Confirm Password</label><br>
            <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control"
                id="confirm_password" required><br><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>

<script>
    //FORGOT PASSWORD
    function submitForm() {
        var xhr = new XMLHttpRequest();
        var formData = new FormData(document.getElementById("myForm"));
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                document.getElementById("result").innerHTML = xhr.responseText;
            }
        };
        xhr.open("POST", "<?php echo $token; ?>/change", true);
        xhr.send(formData);
        return false;
    }

</script>
</script>