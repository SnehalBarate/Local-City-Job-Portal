<?php
  require_once('static/lib/functions.php');
  $fcall = new class_functions();

  /* =========================
     LOGOUT
     ========================= */

  if(isset($_GET['logout']))
  {
    session_destroy();

    header("location:login.php");
    exit();
  }

  $flag = 0;


  /* =========================
     LOGIN
     ========================= */

  if(isset($_POST['submit_btn']))
  {
    $var_email_id = $_POST['email_id'];
    $var_password = $_POST['password'];

    $fcall_password = $fcall->login_authentication($var_email_id);

    if($fcall_password == "")
    {
      $flag = 1;
    }
    else
    {
      if($var_password == $fcall_password)
      {
        $flag = 3;

        /*
         * ONLY LOGIN STATUS IS STORED.
         * Username/mobile number is NOT stored.
         */
        $_SESSION['logged_in'] = true;

        header("location:index.php");
        exit();
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

  <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">

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


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
          crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
          crossorigin="anonymous"></script>


  <title>Login</title>

</head>


<body>


<!-- =========================
     NAVBAR
     ========================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <img src="static/images/logoimg.png"
       alt="logo"
       class="logo">


  <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>


  <div class="collapse navbar-collapse"
       id="navbarSupportedContent">


    <!-- LEFT MENU -->

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


    <!-- RIGHT MENU -->

    <ul class="navbar-nav ms-auto">

      <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>

        <!-- LOGGED IN -->

        <li class="nav-item active">

          <a class="nav-link menu1"
             href="index.php?logout=1">

            Log-out

          </a>

        </li>

      <?php else: ?>

        <!-- NOT LOGGED IN -->

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

      <?php endif; ?>

    </ul>

  </div>

</nav>


<br><br><br>


<!-- =========================
     LOGIN FORM
     ========================= -->

<div class="container">

  <div class="row justify-content-center">

    <div class="col-md-6">


      <div class="card">

        <div class="card-body">


          <h2 class="text-center">
            Login
          </h2>

          <br>


          <?php if($flag == 1): ?>

            <div class="alert alert-danger">

              Email ID not found.

            </div>

          <?php endif; ?>


          <?php if($flag == 2): ?>

            <div class="alert alert-danger">

              Incorrect Password.

            </div>

          <?php endif; ?>


          <?php if($flag == 3): ?>

            <div class="alert alert-success">

              Login Successful.

            </div>

          <?php endif; ?>


          <form action="login.php"
                method="POST">


            <!-- EMAIL -->

            <div class="form-group">

              <label>
                Email ID
              </label>

              <input type="email"
                     name="email_id"
                     class="form-control"
                     placeholder="Enter Email ID"
                     required>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

              <label>
                Password
              </label>

              <input type="password"
                     name="password"
                     class="form-control"
                     placeholder="Enter Password"
                     required>

            </div>


            <br>


            <input type="submit"
                   name="submit_btn"
                   value="LOGIN"
                   class="btn btn-primary btn-block">


          </form>


          <br>


          <p class="text-center">

            Don't have an account?

            <a href="registration.php">
              Register
            </a>

          </p>


        </div>

      </div>


    </div>

  </div>

</div>


<!-- =========================
     FOOTER
     ========================= -->

<footer>

  <div class="container-fluid footer_desi">

    <div class="row">


      <div class="col-md-3">

        <img src="static/images/logoimg.png"
             alt="logo"
             class="logo"
             style="margin-top:20px;"/>

        <br>

        <span style="font-size:20px; margin-left:40px;">
          &copy;
        </span>

        <span style="font-size:15px; margin-top:20px;">
          2023
        </span>

      </div>


      <div class="col-md-3">

        <h5 style="margin-top:40px;">
          QUICK LINKS
        </h5>

        <ul type="none">

          <a href="#">
            <li>New jobs</li>
          </a>

          <a href="#">
            <li>New jobs</li>
          </a>

          <a href="#">
            <li>New jobs</li>
          </a>

          <a href="#">
            <li>New jobs</li>
          </a>

        </ul>

      </div>


      <div class="col-md-3">

        <h5 style="margin-top:40px;">
          RESOURCES
        </h5>

        <ul type="none">

          <a href="index.php">
            <li>Home</li>
          </a>

          <a href="post_job.php">
            <li>Post Free Job</li>
          </a>

          <a href="contact_us.php">
            <li>Contact us</li>
          </a>

        </ul>

      </div>


      <div class="col-md-3">

        <h4 style="margin-top:40px;">
          Get in touch
        </h4>


        <div class="icon-list">

          <i class="bi bi-envelope-at"></i>

          <span style="color:rgb(117, 157, 226);">
            sarsunity05@gmail.com
          </span>

          <br><br>

        </div>


        <div class="icon-list">

          <i class="bi bi-telephone-outbound"></i>

          <span style="color:rgb(117, 157, 226);">
            8767213110/9175201493
          </span>

        </div>

      </div>


    </div>

  </div>

</footer>


</body>

</html>
