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
            $flag = 2;
        }
        else
        {
            $flag = 3;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/style.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            crossorigin="anonymous"></script>

    <title>Forgot Password</title>
</head>

<body style="background-image:url('static/images/regbg2.jpg');"
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

            <li class="nav-item active">
                <a class="nav-link menu1" href="jobdetails.php">
                    Jobs
                </a>
            </li>

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


<div class="logo_box" style="margin-top:50px;">

    <h2 style="margin-bottom:15px; font-weight:bold;">
        Forgot Password
    </h2>

    <img src="static/images/profile.png" class="img_set"/>


    <?php if($flag == 1): ?>

        <div class="alert alert-danger">
            New password and confirm password do not match.
        </div>

    <?php endif; ?>


    <?php if($flag == 2): ?>

        <div class="alert alert-success">
            Password reset successfully.
            <br>
            <a href="login.php">Click here to Login</a>
        </div>

    <?php endif; ?>


    <?php if($flag == 3): ?>

        <div class="alert alert-danger">
            Email ID and Mobile Number do not match our records.
        </div>

    <?php endif; ?>


    <?php if($flag != 2): ?>

        <form action="forgot_pass.php" method="post">

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


            <div class="form">

                <input type="submit"
                       value="RESET PASSWORD"
                       class="btn_desi"
                       name="reset_btn">

            </div>

        </form>

    <?php endif; ?>


    <div class="login_container">

        <span>
            <a href="login.php" style="float:left;">
                Back to Login
            </a>
        </span>

        <span>
            <a href="registration.php" style="float:right;">
                Create account
            </a>
        </span>

    </div>

</div>

</body>
</html>
