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
        /* ==========================================
           FORGOT PASSWORD CARD
        ========================================== */

        .forgot_box {
            width: 430px !important;
            height: auto !important;
            min-height: 0 !important;
            max-height: none !important;

            padding: 28px 38px 25px !important;
            margin: 35px auto 40px !important;

            text-align: center !important;
            box-sizing: border-box !important;

            position: relative !important;
        }

        .forgot_box h2 {
            margin: 0 0 18px !important;
            font-size: 32px !important;
            font-weight: bold !important;
        }

        .forgot_box .img_set {
            width: 90px !important;
            height: 90px !important;
            margin-bottom: 22px !important;
        }

        /* ==========================================
           FORM
        ========================================== */

        .forgot_box form {
            width: 100% !important;
            height: auto !important;

            margin: 0 !important;
            padding: 0 !important;

            position: static !important;
        }

        .forgot_box .form {
            width: 100% !important;

            margin-bottom: 20px !important;

            text-align: left !important;

            position: static !important;
        }

        /* ==========================================
           LABEL
        ========================================== */

        .forgot_box .form-label {
            position: static !important;

            display: block !important;

            margin: 0 0 6px 5px !important;

            font-size: 16px !important;
            font-weight: 600 !important;

            color: #111 !important;

            pointer-events: auto !important;
        }

        /* ==========================================
           INPUT
        ========================================== */

        .forgot_box .textbox {
            width: 100% !important;
            height: 42px !important;

            border: none !important;
            border-bottom: 2px solid #333 !important;

            background: rgba(255,255,255,0.25) !important;

            outline: none !important;

            font-size: 16px !important;

            padding: 7px 5px !important;

            box-sizing: border-box !important;
        }

        .forgot_box .textbox:focus {
            border-bottom: 2px solid #0066cc !important;
        }

        /* ==========================================
           RESET BUTTON
        ========================================== */

        .forgot_box .btn_desi {
            position: static !important;

            display: block !important;

            width: 100% !important;
            height: 45px !important;

            margin: 8px 0 0 !important;
            padding: 0 !important;

            border: none !important;
            border-radius: 25px !important;

            background: #111 !important;
            color: white !important;

            font-size: 17px !important;
            font-weight: 600 !important;

            cursor: pointer !important;

            float: none !important;
            clear: both !important;

            transform: none !important;

            transition: 0.2s !important;
        }

        .forgot_box .btn_desi:hover {
            background: #0066cc !important;
            transform: translateY(-1px) !important;
        }

        /* ==========================================
           BOTTOM LINKS
        ========================================== */

        .forgot_box .bottom_links {
            position: static !important;

            width: 100% !important;
            height: auto !important;

            margin: 22px 0 0 !important;
            padding: 15px 0 0 !important;

            display: flex !important;

            justify-content: space-between !important;
            align-items: center !important;

            border-top: 1px solid rgba(0,0,0,0.15) !important;

            clear: both !important;
        }

        .forgot_box .bottom_link {
            position: static !important;

            float: none !important;

            margin: 0 !important;

            color: #0066cc !important;

            font-size: 15px !important;
            font-weight: 600 !important;

            text-decoration: underline !important;
        }

        .forgot_box .bottom_link:hover {
            color: #004c99 !important;
        }

        /* ==========================================
           ALERT
        ========================================== */

        .forgot_box .alert {
            margin-bottom: 20px !important;
            font-size: 14px !important;
        }

        /* ==========================================
           SUCCESS MESSAGE
        ========================================== */

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

        /* ==========================================
           MOBILE
        ========================================== */

        @media (max-width: 600px)
        {
            .forgot_box {
                width: 90% !important;

                padding: 25px 25px 22px !important;

                margin-top: 25px !important;
            }

            .forgot_box h2 {
                font-size: 27px !important;
            }

            .forgot_box .bottom_links {
                flex-direction: column !important;

                gap: 12px !important;
            }
        }
    </style>
</head>


<body style="background-image: url('static/images/regbg2.jpg');"
      class="regbackground">


<!-- NAVBAR -->

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
                <a class="nav-link menu1"
                   href="index.php">
                    Home
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link menu1"
                   href="post_job.php">
                    Post-Job
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link menu1"
                   href="contact_us.php">
                    Contact-Us
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link menu1"
                   href="about-us.php">
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

                <a class="nav-link menu1"
                   href="login.php">

                    Login

                </a>

            </li>


            <li class="nav-item active">

                <a class="nav-link menu1"
                   href="registration.php">

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


        <a href="login.php"
           class="login_btn">

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

        <div class="alert alert-danger"
             role="alert">

            Password and Confirm Password do not match.

        </div>

    <?php endif; ?>


    <?php if($flag == 2) : ?>

        <div class="alert alert-danger"
             role="alert">

            Email or Mobile Number is incorrect.

        </div>

    <?php endif; ?>


    <form action="forgot_pass.php"
          method="post">


        <!-- EMAIL -->

        <div class="form">

            <label class="form-label">
                Email
            </label>

            <input type="email"
                   name="email_id"
                   placeholder=" "
                   class="textbox"
                   required>

        </div>


        <!-- MOBILE -->

        <div class="form">

            <label class="form-label">
                Mobile Number
            </label>

            <input type="text"
                   name="mobile_no"
                   placeholder=" "
                   class="textbox"
                   required>

        </div>


        <!-- NEW PASSWORD -->

        <div class="form">

            <label class="form-label">
                New Password
            </label>

            <input type="password"
                   name="new_password"
                   placeholder=" "
                   class="textbox"
                   required>

        </div>


        <!-- CONFIRM PASSWORD -->

        <div class="form">

            <label class="form-label">
                Confirm Password
            </label>

            <input type="password"
                   name="confirm_password"
                   placeholder=" "
                   class="textbox"
                   required>

        </div>


        <!-- RESET BUTTON -->

        <input type="submit"
               value="Reset Password"
               class="btn_desi"
               name="reset_btn">

    </form>


    <!-- BOTTOM LINKS -->

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
