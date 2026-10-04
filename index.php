<?php
  require_once('static/lib/functions.php');
  $fcall = new class_functions();

  if(isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['logged_in']);
    header("location:login.php");
    exit();
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
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
          crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdaS6jQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDzW0"
          crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
          integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
          crossorigin="anonymous"></script>

  <style>
    /* ALL ORIGINAL CSS CLASSES UNTOUCHED */

    .cat-item{
      margin-bottom:30px;
      background-color:white;
      color:darkblue;
      text-decoration:none;
    }

    .icon-txt{
      text-align:center;
      font-family:verdana;
    }

    .icon{
      height:80px;
      margin-right:auto;
      margin-left:auto;
      display:block;
    }

    .cat-head{
      font-family:verdana;
      margin-top:20px;
    }

    .footer_desi
    {
      background-color: black;
      margin-top:60px;
      color:white;
      bottom:0px;
    }
  </style>

  <title>Home</title>
</head>


<body style="background-image: linear-gradient(to bottom , white, #cce6ff, #4da6ff);"
      class="regbackground">

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


      <!-- LOGIN / LOGOUT SECTION -->

      <ul class="navbar-nav ms-auto">

        <?php if(!isset($_SESSION['logged_in'])) : ?>

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

        <?php else: ?>

          <li class="nav-item active">
            <a class="nav-link menu1"
               href="index.php?logout=1">
              Log-out
            </a>
          </li>

        <?php endif; ?>

      </ul>

    </div>

  </nav>


  <div class="scrolldesign">

    <div id="carouselExampleIndicators"
         class="carousel slide"
         data-ride="carousel">

      <ol class="carousel-indicators">

        <li data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"></li>

        <li data-target="#carouselExampleIndicators"
            data-slide-to="1"></li>

        <li data-target="#carouselExampleIndicators"
            data-slide-to="2"></li>

      </ol>


      <div class="carousel-inner">

        <div class="carousel-item active">
          <img class="tales"
               src="static/images/5.png"
               height="500px"
               alt="First slide">
        </div>

        <div class="carousel-item">
          <img class="tales"
               src="static/images/4.jpg"
               height="500px"
               alt="Second slide">
        </div>

        <div class="carousel-item">
          <img class="tales"
               src="static/images/2.gif"
               height="550px"
               alt="Third slide">
        </div>

      </div>


      <a class="carousel-control-prev"
         href="#carouselExampleIndicators"
         role="button"
         data-slide="prev">

        <span class="carousel-control-prev-icon"
              aria-hidden="true"></span>

        <span class="sr-only">
          Previous
        </span>

      </a>


      <a class="carousel-control-next"
         href="#carouselExampleIndicators"
         role="button"
         data-slide="next">

        <span class="carousel-control-next-icon"
              aria-hidden="true"></span>

        <span class="sr-only">
          Next
        </span>

      </a>

    </div>


    <form action="jobdetails.php"
          method="POST"
          id="searchform">

      <div class="search-bar">

        <div class="row g-4">

          <div class="col-md-1 mx-auto"></div>

          <div class="col-md-3 mx-auto">

            <input type="text"
                   name="country"
                   required
                   id="country"
                   class="form-control search-input"
                   placeholder="Country">

          </div>


          <div class="col-md-3 mx-auto">

            <input type="text"
                   name="state"
                   id="state"
                   required
                   class="form-control search-input"
                   placeholder="State">

          </div>


          <div class="col-md-3 mx-auto">

            <input type="text"
                   name="city"
                   id="city"
                   required
                   class="form-control search-input"
                   placeholder="City">

          </div>


          <div class="col-md-2 mx-auto">

            <input type="submit"
                   value="Search"
                   form="searchform"
                   name="search_btn"
                   class="search-btn"/>

          </div>

        </div>

      </div>

    </form>


    <div class="category">

      <h1 class="text-center mb-5 wow fadeInUp cat-head"
          data-wow-delay="0.1s">

        Explore By Category

      </h1>


      <div class="row g-5">

        <div class="col-md-2"></div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Engineer'">

            <img src="static/images/engineer.png"
                 class="mb-3 icon"
                 alt="Engineer/architect"/>

            <h5 class="mb-3 icon-txt">
              Engineer / Architects
            </h5>

          </a>

        </div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Music And Art'">

            <img src="static/images/music.png"
                 class="mb-3 icon"
                 alt="Music and art"/>

            <h5 class="mb-3 icon-txt">
              Music & <br/>Art
            </h5>

          </a>

        </div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Eduation & Training'">

            <img src="static/images/education.png"
                 class="mb-3 icon"
                 alt="Eduation & Training"/>

            <h5 class="mb-3 icon-txt">
              Education & Training
            </h5>

          </a>

        </div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Salon'">

            <img src="static/images/salon.png"
                 class="mb-3 icon"
                 alt="Salon"/>

            <h5 class="mb-3 icon-txt">
              Salon<br />.
            </h5>

          </a>

        </div>


        <div class="col-md-2"></div>

      </div>


      <div class="row">

        <div class="col-md-2"></div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Factory'">

            <img src="static/images/factory.png"
                 class="mb-3 icon"
                 alt="Factory"/>

            <h5 class="mb-3 icon-txt">
              Factory
            </h5>

          </a>

        </div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Driver'">

            <img src="static/images/driver.png"
                 class="mb-3 icon"
                 alt="Driver"/>

            <h5 class="mb-3 icon-txt">
              Driver
            </h5>

          </a>

        </div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Shopkeeper'">

            <img src="static/images/shopkeeper.png"
                 class="mb-3 icon"
                 alt="Shopkeeper"/>

            <h5 class="mb-3 icon-txt">
              Shopkeeper
            </h5>

          </a>

        </div>


        <div class="col-md-2">

          <a class="cat-item rounded p-4"
             href="jobdetailsbycategory.php?category='Food Services'">

            <img src="static/images/restaurant.png"
                 class="mb-3 icon"
                 alt="Food Services"/>

            <h5 class="mb-3 icon-txt">
              Food Services
            </h5>

          </a>

        </div>


        <div class="col-md-2"></div>

      </div>

    </div>

  </div>


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
              <li>Shop-Keeper</li>
            </a>

            <a href="#">
              <li>School Bus Driver</li>
            </a>

            <a href="#">
              <li>Personal Driver</li>
            </a>

            <a href="#">
              <li>Librarian</li>
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
