<?php
  require_once('static/lib/functions.php');
  $fcall= new class_functions();
  
  if(isset($_GET['logout']))
  {
    unset($_SESSION['username']);
    header("location:login.php");
  }
  
  $flag=0;
  if(isset($_POST['submit_btn']))
  {
    $var_email_id=$_POST['email_id'];
    $var_password=$_POST['password'];
    $fcall_password= $fcall->login_authentication($var_email_id);
    $fcall_mobile_no=$fcall->get_mobile_no($var_email_id);
    if($fcall_password=="")
    {
      $flag=1;
    }
    else
    {
      if($var_password==$fcall_password)
      {
        $flag=3;
        $_SESSION['username'] = $fcall_mobile_no;
        header("location:index.php");
      }
      else{
         $flag=2;
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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <title>Login</title>
</head>

<body style="background-image: url('static/images/regbg2.jpg');" class="regbackground">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="static/images/logoimg.png" alt="logo" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link menu1" href="index.php">Home</a></li>
        <li class="nav-item active"><a class="nav-link menu1" href="post_job.php">Post-Job</a></li>
        <li class="nav-item active"><a class="nav-link menu1" href="contact_us.php">Contact-Us</a></li>
        <li class="nav-item active"><a class="nav-link menu1" href="about-us.php">About-Us</a></li>
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
          <li class="nav-item active"><a class="nav-link menu1" href="login.php">Login</a></li>
          <li class="nav-item active"><a class="nav-link menu1" href="registration.php">Register</a></li> 
        <?php else: ?>
          <li class="nav-item active"><a class="nav-link menu1">User: <?php echo $_SESSION['username']; ?></a></li>
          <li class="nav-item active"><a class="nav-link menu1" href="index.php?logout='1'">Log-out</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  
  <div class="logo_box" style="margin-top: 50px">
    <h2 style="margin-bottom: 15px; font-weight:bold;">Login Here</h2>
    <img src="static/images/profile.png" class="img_set" />
    
    <?php if($flag==1) : ?>
      <div class="alert alert-danger" role="alert">This user is not registered with us.</div>
    <?php endif; ?>
    
    <?php if($flag==2) : ?>
      <div class="alert alert-danger" role="alert">Incorrect password.</div>
    <?php endif; ?>

    <form action="login.php" method="post">
      <div class="form">
        <input type="email" name="email_id" placeholder=" " class="textbox" />
        <label class="form-label">Email</label>
      </div>

      <div class="form">
        <input type="password" name="password" placeholder=" " class="textbox" />
        <label class="form-label">Password</label>
        <input type="submit" placeholder="SUBMIT" class="btn_desi" name="submit_btn" />
      </div>
    </form>

    <div class="login_container">
      <span><a href="forgot_pass.html" style="float:left;">Forgot password?</a></span>
      <span><a href="registration.php" style="float:right;">Create account</a></span>
    </div>
  </div>
</body>
</html>