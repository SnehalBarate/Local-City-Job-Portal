<!DOCTYPE html>
<html lang="en">
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
    /* YOUR EXACT ORIGINAL DESIGN STYLES */
    body
    {
      background-color: #e6ffff;
    }

    .contact-info-box{
        background-color: #095a54;
        color: white;
    }
    .Register
    {
      background-color:white;
      color: #095a54;
    }
    .inputbox
    {       border:none;
            border-radius:0px;
            border-bottom:1px solid black;
            width:300px;
    }
     .inputbox:focus
    {
            border:none;
            box-shadow:none;
            border-bottom:1px solid black;
    }
    .cst_row
    {
      height: 400px;
    }

    .cst_btn
    {
      border-radius: 0px;
      background-color: #095a54;
      color:antiquewhite;
      width: 120px;
    } 
    </style>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="static/images/logoimg.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <li class="nav-item active">
           <input type="submit" value="Jobs" form="searchform" name="search_btn" class="nav-link menu2" >
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
       <?php if(!isset($_SESSION['username'])) : ?>
      <li class="nav-item active">
                <a class="nav-link menu1" href="login.php">Login</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link menu1" href="registration.php">Register</a>
              </li> 
  
    <?php else: ?>
      <li class="nav-item active">
                <a class="nav-link menu1" href="index.php?logout='1'">Log-out</a>
              </li>
    <?php endif; ?>
      </ul>
    </div>
  </nav>
  </body>
</html>