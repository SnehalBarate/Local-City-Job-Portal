<?php
  require_once('static/lib/functions.php');
  $fcall= new class_functions();

  if(isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['username']);
    header("location:login.php");
  }
  $flag2=0;
  if(isset($_POST['send_btn']))
  {
    $f_name=$_POST['f_name'];
    $l_name=$_POST['l_name'];
    $cnt_email_id=$_POST['cnt_email_id'];
    $cnt_mobile_no=$_POST['cnt_mobile_no'];
    $report_msg=$_POST['report_msg'];
    
    if($fcall->store_contact_us_details($f_name, $l_name, $cnt_email_id, $cnt_mobile_no, $report_msg))
    {
      //Send Whatsapp Message
        $whatsapp_message = "
        💥💥💥💥💥💥💥💥 \n

        *Local City Job*

        Dear $f_name, $l_name,
        Thank You For Contacting Us \n
        
        We Will Try To Solve Your Problem....

        \n Note:Automatic Software Message".
        "\n💥💥💥💥💥💥💥💥";

        $url =  "http://web.cloudwhatsapp.com/wapp/api/send?apikey=7a7bc6e92e1447d4ac545dac48eebee4&mobile=$cnt_mobile_no&msg=".urlencode($whatsapp_message);
        //echo $response = file_get_contents($url);
      
      $flag2=$_SESSION['flag2'];
    }
  }
  
?>
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
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
    integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS"
    crossorigin="anonymous"></script>
  
  <script>
  function redirectToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
      section.style.display = 'block';
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>


  <style>
    /* ALL YOUR ORIGINAL CSS - UNTOUCHED */
    body
    {
      background-color: #e0ebeb;
    }
.icon-list {
    display: flex;
    column-gap: 10px;
    margin-top: 10px;
}
.icon-list i{
   font-size: 25px;
}
.icons {
    display: flex;
    column-gap: 30px;
    margin-top: 50px;
    margin-left: 7px;
}
.icons i{
    font-size: 25px;
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
{      border:none;
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
  
  margin-bottom:30px;
}

.cst_btn
{
  border-radius: 0px;
  background-color: #095a54;
  color:antiquewhite !important;
  width: 120px;
}  
.hidden {
      display: none;
      margin-top: 70px;
      margin:auto;
      
    }
    
    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="static/images/logoimg.png" alt="logo" class="logo">
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
  
    <br><br>
  <form action="contact_us.php" method="POST">
    <div class="container ">
        <div class="row cst_row">
            <div class="col-md-3 contact-info-box ">
                <br>
                <h4>Contact Info</h4>
         </center>
                <div>
                    <div class="icon-list">
                      <i class="bi bi-geo-alt reg-form "></i>
            
                      <a href="#" onclick="redirectToSection('section1'); return false;" style="color: white;"> 
            <p> 52,near SB vihar,Balaji sarover hotel,asra chowk,hotagi road,Solapur-413003</p></a>
                    </div>
        
                    <div class="icon-list">
                        <i class="bi bi-envelope-at"></i>
                        <p>sarsunity05@gmail.com</p>
                    </div>
                    <div class="icon-list">
                      <i class="bi bi-telephone-outbound"></i>
                        <p>8767213110/9175201493</p>
                    </div>
          
                </div>
                <div class="icons">
                  <i class="bi bi-facebook"></i>
                  <i class="bi bi-twitter"></i>
                  <i class="bi bi-instagram"></i>
                  <i class="bi bi-whatsapp"></i> 
                </div>
            </div>
      
            <div class="col-md-9 Register ">
                <h4 style="padding: 20px 5px;">Send a Message</h4>
        <?php
          if($flag2==1)
          {
        ?>
          <div class="alert alert-success" role="alert">
            Reported Submitted Successfully.....
          </div>
        <?php 
        }
        ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control inputbox" id="floatingInput" name="f_name" placeholder="name@example.com">
                            <label for="floatingInput">First Name</label>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control inputbox" id="floatingInput"  name="l_name" placeholder="name@example.com">
                            <label for="floatingInput">Last Name</label>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control inputbox" id="floatingInput" name="cnt_email_id" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control inputbox" name="cnt_mobile_no" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Mobile No</label>
                          </div>
                    </div>
                </div>
                <br>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="report_msg" id="floatingTextarea2" style="height: 70px"></textarea>
                    <label for="floatingTextarea2">Write a message here...</label>
                  </div>
                <br>
                <input class="btn btn-primary cst_btn" type="submit" name="send_btn" value="Send" />
            </div>
      
        </div>
    </div>
  </form>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3802.2622204123563!2d75.91715337396845!3d17.
    637735395547253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc5da1ed3381eed%3A0x6fdb8e3ff8ffd70c!2sDream%20Technology!5e0!3m2!1sen!2sin!4v1689683493711!5m2!1sen!2sin"
     width="800" height="400" 
    style="border:2px solid;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="section1" class="hidden">
  </iframe><br /><br />
  <footer>
  <div class="container-fluid footer_desi">
    <div class="row">
      <div class="col-md-3">
        <img src="static/images/logoimg.png" alt="logo" class="logo" style="margin-top:20px;"/><br>
        <span style="font-size:20px; margin-left:40px;">©</span>
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