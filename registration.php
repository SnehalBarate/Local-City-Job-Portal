<?php
    require_once('static/lib/functions.php');
    $fcall= new class_functions();
    
    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("location:login.php");
    }
    $flag=0;
    if(isset($_POST['submit_btn']))
    {
        
        $var_full_name=$_POST['full_name'];
        $var_r_email_id=$_POST['r_email_id'];
        $var_mobile_no=$_POST['mobile_no'];
        $var_dob=$_POST['dob'];
        $var_gender=$_POST['gender'];
        $var_country=$_POST['country'];
        $var_state=$_POST['state'];
        $var_city=$_POST['city'];
        $var_password=$_POST['password'];
        $var_system_captcha =   $_POST['system_captcha'];
        $var_user_captcha   =   $_POST['user_captcha'];
        if($var_system_captcha==$var_user_captcha)
        {
            if($fcall->create_user_account($var_full_name,$var_r_email_id,$var_mobile_no,$var_dob,$var_gender,$var_country,$var_state,$var_city,$var_password))
            {   
                // Account created logic
            }
        }
        else
        {
            $flag=1;
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
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
        
    <title>Registration</title>
</head>

<body style="background-image: url('static/images/regbg2.jpg');" class="regbackground">
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
    <div class="form_container" style="font-size:15px;">
        <form action="registration.php" method="POST" autocomplete="off">
            <center style="margin-bottom:30px;">
                <h2>Registration</h2>
            </center>
            <?php
            if($flag==1)
            {
        ?>
                <div class="alert alert-danger" role="alert">
                    Invalid Captcha.... Refill the details...
                </div>
        <?php 
            }
            if($flag==2)
            {
        ?>
                <div class="alert alert-danger" role="alert">
                    Already Registered with this Email
                </div>
        <?php 
            }
            if($flag==3)
            {
        ?>
                <div class="alert alert-danger" role="alert">
                    Already Registered with this Mobile No.
                </div>
        
        <?php 
            }
        if($flag==4)
            {
        ?>
                <div class="alert alert-success" role="alert">
                    Registered Successfully..... Now You Can Login
                </div>
        <?php 
            }
        ?>
            <label>Enter Full Name</label>
            <input type="text" class="input_box form-control" required name="full_name" placeholder="Enter Full name" />

            <label>Enter Email ID</label>
            <input type="email" class="input_box form-control" required name="r_email_id" placeholder="Enter E-mail Id" />

            <label>Enter Mobile Number</label>
            <input type="number" class="input_box form-control" required name="mobile_no" placeholder="Enter Mobile No" />

            <label>Enter DOB</label>
            <input type="date" class="input_box form-control" required name="dob" value="DOB" />
            
             <label>Select Your Gender</label>
            <br />
            &#160 &#160 <input type="radio" name="gender" value="Male" />Male
            &#160
            &#160
            &#160
            <input type="radio" name="gender" value="Female" />Female
            &#160
            &#160
            &#160
            <input type="radio" name="gender" value="other" />Other
            <br />
            <br />

            <label>Enter Your Country</label>
            <input name="country" required class="input_box form-control" placeholder="Country">
                

            <label>Enter Your State </label>
            <input name="state" required class="input_box form-control" placeholder="State">
                
            <label>Enter Your City </label>
            <input type="text" name="city" required class="input_box form-control" placeholder="City">
            

           
             <label>Password</label>
            <input type="password" class="input_box form-control" id="pass" required name="password" placeholder="Enter password" />
            <?php
                $random_value = rand(50000,99000)
            ?>
            <label>Enter Captcha Code..</label>
            <input type="text" class="form-control" readonly name="system_captcha" value="<?php echo $random_value; ?>" />
            <input type="text" class="form-control" name="user_captcha" placeholder="Enter Captcha Code" />
            <br />

            <center><input type="submit" class="button" name="submit_btn" value="SUBMIT"></center>
        </form>
    </div>
</body>
</html>