<?php
  require_once('static/lib/functions.php');
  $fcall = new class_functions();

  if(isset($_GET['logout']))
  {
    session_destroy();
    header("location:login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

  <style>

    .align {
      margin-top: 50px;
      background-color: #ccddff;
      flex-direction: row;
    }

    .cs-btn {
      margin-top: 20px;
      border-radius: 0px;
      background-color: #095a54;
    }

    .cst_desi {
      background-color: #e0ebeb;
      margin-top: 50px;
    }

    @media only screen and (max-width:800px)
    {
      .cst_img {
        width: inherit;
      }
    }

  </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <img src="static/images/logoimg.png" alt="logo" class="logo">

  <button class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">

    <span class="navbar-toggler-icon"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- LEFT MENU -->

    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link menu1" href="index.php">Home</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link menu1" href="post_job.php">Post-Job</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link menu1" href="contact_us.php">Contact-Us</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link menu1" href="about-us.php">About-Us</a>
      </li>

      <form action="jobdetails.php" method="POST" id="searchform">

        <li class="nav-item active">

          <input type="submit"
                 value="Jobs"
                 form="searchform"
                 name="search_btn"
                 class="nav-link menu2"/>

          <input type="hidden" value="Country" name="country">
          <input type="hidden" value="State" name="state">
          <input type="hidden" value="City" name="city">

        </li>

      </form>

    </ul>


    <!-- RIGHT MENU -->

    <ul class="navbar-nav ms-auto">

      <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) : ?>

        <!-- LOGGED IN -->

        <li class="nav-item active">

          <a class="nav-link menu1" href="index.php?logout=1">
            Log-out
          </a>

        </li>

      <?php else: ?>

        <!-- NOT LOGGED IN -->

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

      <?php endif; ?>

    </ul>

  </div>

</nav>


<br><br><br>


<!-- MAIN SECTION -->

<div class="container">

  <div class="row">

    <div class="col-md-5">

      <h1>
        Let's make your next <br>great hire Fast...
      </h1>

      <h1>
        Let's Post a new job and Hire skilled employee...
      </h1>

      <a href="form_post_job.php">

        <button type="button"
                class="btn btn-primary btn-lg cs-btn">

          Post a Job

        </button>

      </a>

    </div>


    <div class="col-md-7">

      <img src="static/images/emp.jpg" class="cst_img" />

    </div>

  </div>

</div>


<!-- HOW TO POST JOB -->

<div class="container align">

  <h1 style="text-align: center; margin-bottom:20px;">
    How to post a job
  </h1>

  <div class="row">

    <div class="col-md-4">

      <div class="card cst_" style="width: 18rem;">

        <h4 style="text-align: center;">
          Create your Account
        </h4>

        <img src="static/images/post_account.jpg"
             class="card-img-top"
             alt="...">

        <div class="card-body">

          <p class="card-text" style="font-weight:lighter;">
            All you need is your email address to create an account and start building your job post.
          </p>

        </div>

      </div>

    </div>


    <div class="col-md-4">

      <div class="card" style="width: 18rem;">

        <h4 style="text-align: center;">
          Build your job post
        </h4>

        <img src="static/images/img.jpg"
             class="card-img-top"
             alt="...">

        <div class="card-body">

          <p class="card-text" style="font-weight:lighter;">
            Then just add a title Description, and location to your job post, and your are ready to go.
          </p>

        </div>

      </div>

    </div>


    <div class="col-md-4">

      <div class="card" style="width: 18rem;">

        <h4 style="text-align: center;">
          Post a Job
        </h4>

        <img src="static/images/lady.jpg"
             class="card-img-top"
             alt="...">

        <div class="card-body">

          <p class="card-text c-txt" style="font-weight:lighter;">
            After you post your job According to your need you will find a employee which you want.
          </p>

        </div>

      </div>

    </div>

  </div>

</div>


<!-- DESCRIPTION -->

<div class="container cst_desi">

  <div class="row">

    <div class="col-md-12">

      <h2 style="text-align:center;">
        Save time and effort in your hiring journey.
      </h2>

      <p style="font-size: 18px; font-weight:lighter;">

        Finding the best fit for the job shouldn’t be a full-time job.
        local city job's simple and powerful tools let you source,
        screen, and hire faster.

      </p>

    </div>

  </div>

</div>


<!-- FOOTER -->

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

          <a href="login.php">
            <li>Login</li>
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
