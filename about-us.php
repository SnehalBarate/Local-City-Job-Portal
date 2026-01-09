<?php
  require_once('static/lib/functions.php'); 
  $fcall= new class_functions();

  if(isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['username']);
    header("location:login.php");
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="static/css/style.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <title>About-Us</title>
</head>

<body class="about-us-bg">
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

    <form action="jobdetails.php" method="POST" id="searchform">
    <li class="nav-item active">
            <input type="submit" value="Jobs" form="searchform" name="search_btn" class="nav-link menu2"/>
        <input type="hidden" value="Country" name="country" >
        <input type="hidden" value="State" name="state">
        <input type="hidden" value="City" name="city">
         </li>
    </form>
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
                <a class="nav-link menu1">User: <?php echo $_SESSION['username']; ?></a>
      </li>
      <li class="nav-item active">
                <a class="nav-link menu1" href="index.php?logout='1'">Log-out</a>
              </li>

    <?php endif; ?>
      </ul>
    </div>
  </nav>  
    <div class="about-us">
        <center><h1 class="au">About Us</h1></center>
        <p class="info">
            Local City Job is the site which provides jobs in your area.<br />
            The project is being implemented under the guidance of managing director of Dream Technology, Shrikant Kadam. <br /> 
            It works towards bridging the gap between job-seekers and employers.<br />
            The digital centralized portal provides a wide range of services including job search, job matching, rich content, services of local service providers like drivers,plumbers,etc for households and various other services<br />
            Local City Job does not charge any fees for registration on the portal and its services.<br />
        </p>
    </div>
    <div class="team">
        <h1 class="t-m">Team Members</h1>
        <ul class="t-names">
            <li>Barate Snehal</li>
            <li>Bhosale Rajnandini</li>
            <li>Devarkonda Shrutika</li>
            <li>Vhandre Archana</li>
        </ul>
    </div>
    <div class="au-design">
        <img src="static/images/au-bg.png" class="imgh"/>
    </div>
  
  <footer>
  <div class="container-fluid footer_desi">
    <div class="row">
      <div class="col-md-3">
        <img src="static/images/logoimg.png" alt="logo" class="logo"style="margin-top:20px;"/><br>
        <span style="font-size:20px; margin-left:40px;">&copy;</span>
        <span style="font-size:15px; margin-top:20px;">2023</span>
      </div>
      <div class="col-md-3">
    
        <h5 style=" margin-top:40px;">QUICK LINKS</h5>
        <ul type="none">
        <a href="#"> <li>New jobs</li></a>
        <a href="#"> <li>New jobs</li></a>
                <a href="#"><li>New jobs</li></a>
                <a href="#"><li>New jobs</li></a>
        </ul>
       
      </div>
      <div class="col-md-3">
      
        <h5 style=" margin-top:40px;">RESOURCES</h5>
        <ul type="none">  
        <a href="index.php">  <li>Home</li></a>
        <a href="post_job.php"> <li>Post Free Job</li></a>
        <a href="login.php"><li>Login</li></a>
        <a href="contact_us.php"> <li>Contact us</li></a>
        </ul>
       
      </div>
      <div class="col-md-3">
      
        <h4 style=" margin-top:40px;">Get in touch</h4>
        <div class="icon-list">
        <i class="bi bi-envelope-at"></i>
        <span style="color:rgb(117, 157, 226);">sarsunity05@gmail.com</span><br><br>
        </div>
        <div class="icon-list">
        <i class="bi bi-telephone-outbound"></i>
        <span style="color:rgb(117, 157, 226);">8767213110/9175201493</span>
        </div>
                        
      </div>
       </div>
  </div>
</footer>
</body>

</html>