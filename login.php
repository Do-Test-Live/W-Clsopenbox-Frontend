<?php
session_start();
include('include/dbController.php');
$db_handle = new DBController();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $row_count = $db_handle->numRows("SELECT * FROM userlogin where email='$email' and password='$password'");
    $data = $db_handle->runQuery("SELECT * FROM userlogin where email='$email' and password='$password'");
    if ($row_count > 0) {
        $_SESSION['userid'] = $data[0]['id'];
        echo "<script>
                alert('Login Successful.');
                window.location.href='index.php';
                </script>";
    } else {
        echo "<script>
                alert('Incorrect Data.');
                window.location.href='login.php';
                </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'
          rel='stylesheet'>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <style>
        .login-form-input {
            box-shadow: inset 0 0 5px 5px #21233c;
            background: #3f3f5dde;
            color: white;
            border-radius: 25px;
            border: 1px solid white;
            height: 45px;
        }

        ::placeholder {
            color: white !important;
            font-size: 13px;
            padding-left: 0.25rem;
            font-family: 'Jura', sans-serif;
            font-weight: 100;
        }

        .btn-login, .btn-login:hover {
            border-radius: 25px;
            background: #0033ff;
            border: 1px solid #0033ff;
            color: #00f6ff;
            font-family: 'orbitron', sans-serif;
        }

        .login-header {
            color: #00f6ff;
            font-family: 'orbitron', sans-serif;
            font-size: 40px;
        }

        .btn-create, .btn-create:hover {
            border-radius: 25px;
            background: #f14848;
            border: 1px solid #f14848;
            color: #ffffff;
            font-family: 'orbitron', sans-serif;
        }

        .or-text {
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #00f6ff;
            line-height: 0.1em;
            margin: 10px 0 20px;
        }

        .or-text span {
            color: #00f6ff;
            background: #1f2233;
            padding: 0 10px;
            font-family: 'Jura', sans-serif;
            font-size: 12px;
        }

        .forgot-password {
            font-family: 'Jura', sans-serif;
        }
    </style>
</head>
<body style="background: url('assets/images/content/BG.jpg'); background-repeat: no-repeat; background-position: center;background-size: cover; height: 100%">
<div class="container d-flex justify-content-center align-items-center">
    <div class="row mt-5">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <img alt="" style="height: 100px; width: 138px;" src="assets/images/10sec/Logo.png"/>
        </div>
        <div class="col-12 text-center">
            <h2 class="mt-5 login-header">Log in</h2>
        </div>
        <div class="col-12 mt-4 ps-5 pe-5">
            <form action="" method="post">
                <div class="mb-3">
                    <input class="form-control login-form-input" name="email" placeholder="Email" required
                           type="email"/>
                </div>
                <div class="mb-4">
                    <input class="form-control login-form-input" name="password" placeholder="Password" required
                           type="password"/>
                </div>
                <div class="mb-3">
                    <button type="submit" name="login" class="btn btn-primary w-100 btn-login">Log In</button>
                </div>
            </form>
            <div class="mb-4">
                <p class="text-white text-center"><a href="#" class="text-decoration-none text-white forgot-password">Forgot
                        password?</a></p>
            </div>
            <div class="mb-3">
                <p class="text-white text-center or-text"><span>OR</span></p>
            </div>
            <div class="mb-3">
                <a href="signup.php" class="btn btn-warning w-100 btn-create">Create Account</a>
            </div>
        </div>

    </div>
</div>
</body>
</html>
