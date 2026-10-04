<?php
require_once('static/lib/functions.php');
$fcall = new class_functions();

$flag = 0;

if(isset($_POST['reset_btn']))
{
    $email_id = $_POST['email_id'];
    $mobile_no = $_POST['mobile_no'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($new_password != $confirm_password)
    {
        $flag = 1;
    }
    else
    {
        if($fcall->reset_password($email_id, $mobile_no, $new_password))
        {
            $flag = 3;
        }
        else
        {
            $flag = 2;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet"
          href="static/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet"/>

    <title>Forgot Password</title>

    <style>
        .forgot_box {
            width: 430px;
            padding: 28px 38px 25px;
            margin: 35px auto 30px;
            text-align: center;
            box-sizing: border-box;
        }

        .forgot_box h2 {
            margin: 0 0 18px;
            font-size: 32px;
            font-weight: bold;
        }

        .forgot_box .img_set {
            width: 90px;
            height: 90px;
            margin-bottom: 20px;
        }

        .forgot_box .form {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .forgot_box .textbox {
            width: 100%;
            height: 42px;
            border: none;
            border-bottom: 2px solid #333;
            background: transparent;
            outline: none;
            font-size: 16px;
            padding: 8px 5px;
            box-sizing: border-box;
        }

        .forgot_box .form-label {
            position: absolute;
            left: 5px;
            top: 8px;
            font-size: 17px;
            font-weight: 600;
            pointer-events: none;
            transition: 0.2s;
        }

        .forgot_box .textbox:focus + .form-label,
        .forgot_box .textbox:not(:placeholder-shown) + .form-label {
            top: -18px;
            font-size: 13px;
            color: #0066cc;
        }

        .forgot_box .textbox:focus {
            border-bottom: 2px solid #0066cc;
        }

        .forgot_box .btn_desi {
            width: 100%;
            height: 45px;
            margin-top: 5px;
            border: none;
            border-radius: 25px;
            background: #111;
            color: white;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .forgot_box .btn_desi:hover {
            background: #0066cc;
            transform: translateY(-1px);
        }

        .bottom_links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 22px;
            padding-top: 15px;
            border-top: 1px solid rgba(0, 0, 0, 0.15);
        }

        .bottom_link {
            color: #0066cc;
            font-size: 15px;
            font-weight: 600;
            text-decoration: underline;
        }

        .bottom_link:hover {
            color: #004c99;
        }

        .alert {
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success_box {
            background: #dff3e4;
            border: 1px solid #b8dfc2;
            border-radius: 10px;
            padding: 18px 15px;
            margin-bottom: 20px;
        }

        .success_icon {
            display: block;
            font-size: 35px;
            color: #198754;
            margin-bottom: 8px;
        }

        .success_box h5 {
            margin: 5px 0;
            font-weight: 600;
            color: #155724;
        }

        .success_box p {
            margin: 5px 0 15px;
            color: #3d6145;
            font-size: 14px;
        }

        .login_btn {
            display: inline-block;
            padding: 9px 22px;
            background: #0d6efd;
            color: white !important;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .login_btn:hover {
            background: #0b5ed7;
            text-decoration: none;
        }

        @media (max-width: 600px)
        {
            .forgot_box {
                width: 90%;
                padding: 25px 25px 22px;
                margin-top: 25px;
            }

            .forgot_box h2 {
                font-size: 27px;
            }

            .bottom_links {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>

<body style="background-image: url('static/images/regbg2.jpg');"
      class="regbackground">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <img src="static/images/logoimg.png"
         alt="logo"
         class="logo">

    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse"
         id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
                <a class="nav-link menu1" href="index.php">
                    Home
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link menu1" href="post_job.php">
                    Post-Job
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link menu1" href="contact_us.php">
                    Contact-Us
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link menu1" href="about-us.php">
                    About-Us
                </a>
            </li>

            <form action="jobdetails.php"
                  method="POST"
                  id="searchform">

                <li class="nav-item active">

                    <input type="submit"
                           value="Jobs"
                           form="searchform"
                           name="search_btn"
                           class="nav-link menu2"/>

                    <input type="hidden"
                           value="Country"
                           name="country">

                    <input type="hidden"
                           value="State"
                           name="state">

                    <input type="hidden"
                           value="City"
                           name="city">

                </li>

            </form>

        </ul>

        <ul class="navbar-nav ms-auto">

            <li class="nav-item active">
                <a class="nav-link menu1" href="login.php">
                    Login
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link menu1" href="registration.php">
                    Register
                </a>
            </li>

        </ul>

    </div>
</nav>


<?php if($flag == 3) : ?>

    <!-- PASSWORD RESET SUCCESS -->

    <div class="logo_box forgot_box">

        <h2>
            Password Reset
        </h2>

        <img src="static/images/profile.png"
             class="img_set"
             alt="Profile">

        <div class="success_box">

            <i class="bi bi-check-circle-fill success_icon"></i>

            <h5>
                Password Reset Successfully!
            </h5>

            <p>
                Your password has been updated successfully.
            </p>

            <a href="login.php" class="login_btn">
                Click here to Login
            </a>

        </div>

        <div class="bottom_links">

            <a href="login.php"
               class="bottom_link">
                ← Back to Login
            </a>

            <a href="registration.php"
               class="bottom_link">
                Create account →
            </a>

        </div>

    </div>


<?php else : ?>

    <!-- FORGOT PASSWORD FORM -->

    <div class="logo_box forgot_box">

        <h2>
            Forgot Password
        </h2>

        <img src="static/images/profile.png"
             class="img_set"
             alt="Profile">


        <?php if($flag == 1) : ?>

            <div class="alert alert-danger" role="alert">
                Password and Confirm Password do not match.
            </div>

        <?php endif; ?>


        <?php if($flag == 2) : ?>

            <div class="alert alert-danger" role="alert">
                Email or Mobile Number is incorrect.
            </div>

        <?php endif; ?>


        <form action="forgot_pass.php"
              method="post">

            <div class="form">

                <input type="email"
                       name="email_id"
                       placeholder=" "
                       class="textbox"
                       required>

                <label class="form-label">
                    Email
                </label>

            </div>


            <div class="form">

                <input type="text"
                       name="mobile_no"
                       placeholder=" "
                       class="textbox"
                       required>

                <label class="form-label">
                    Mobile Number
                </label>

            </div>


            <div class="form">

                <input type="password"
                       name="new_password"
                       placeholder=" "
                       class="textbox"
                       required>

                <label class="form-label">
                    New Password
                </label>

            </div>


            <div class="form">

                <input type="password"
                       name="confirm_password"
                       placeholder=" "
                       class="textbox"
                       required>

                <label class="form-label">
                    Confirm Password
                </label>

            </div>


            <input type="submit"
                   value="Reset Password"
                   class="btn_desi"
                   name="reset_btn">

        </form>


        <div class="bottom_links">

            <a href="login.php"
               class="bottom_link">
                ← Back to Login
            </a>

            <a href="registration.php"
               class="bottom_link">
                Create account →
            </a>

        </div>

    </div>

<?php endif; ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>

</body>
</html>
