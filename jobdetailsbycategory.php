<?php
    require_once('static/lib/functions.php');
    $fcall= new class_functions();

    if(isset($_GET['logout']))
    {
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
        /* ALL YOUR ORIGINAL STYLES REMAIN UNCHANGED */
        .job-head
        {
            font-family:verdana;
            margin-top:20px;
        }
        .card 
        {   
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }
        .display_job
        {
            border:1px solid darkblue;
            border-radius:5px;
            background-color:white;
            box-shadow:10px 10px 5px #aaaaaa;
            
        }

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.5rem 1.5rem;
}
.j-name
{
    font-family: Georgia, serif;
    margin-bottom:1px;
}
.j-company
{
    font-family: Georgia, serif;

}
.job-snw
{
    font-family: Georgia, serif;
    background-color:lightgrey;
    padding:5px;
    margin-right:10px;
}

.job-info1
{
    font-family: Georgia, serif;
    font-size:18px;
}
.job-info2
{
    font-family: Georgia, serif;
    font-size:15px;
}

    </style>
    
    <title>Job Details</title>
</head>

<body style="background-color:#cce6ff;">
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
                <a class="nav-link menu1">User: <?php echo $_SESSION['username']; ?></a>
                </li>
            <li class="nav-item active">
                <a class="nav-link menu1" href="index.php?logout='1'">Log-out</a>
              </li>

        <?php endif; ?>
      </ul>
    </div>
  </nav>    

    
        <h2 class="text-center mb-3 wow fadeInUp job-head" data-wow-delay="0.1s">Find A Job In Your Desired City</h2>
          <form action="jobdetails.php" method="POST" id="searchform" >
        <div class="search-bar" style="padding:20px;">
        <div class="row g-4">
          <div class="col-md-1 mx-auto">

          </div>
          <div class="col-md-3 mx-auto">
            <input type="text" name="country" required id="country"  class="form-control search-input" placeholder="Country">
          </div>
        
          <div class="col-md-3 mx-auto">
            <input type="text" name="state" id="state" required class="form-control search-input" placeholder="State">
          </div>
          <div class="col-md-3 mx-auto">
            <input type="text" name="city" id="city" required class="form-control search-input" placeholder="City">
          </div>
      
          <div class="col-md-2 mx-auto">
          <input type="submit" value="Search" form="searchform" name="search_btn" class="search-btn"/>
          </div>
    </div>
    </div>
    </form>
    <div class="container" style="margin-bottom:19px;" >
    <h3 class="text-center mb-5" style="font-family:verdana; margin-top:20px;">Job Details</h3>
        <?php
        if(isset($_GET['category']))
        {
            $category=$_GET['category'];
            $job_details= array();
            $job_details=$fcall->get_all_job_details_based_on_category($category);
            if(!empty($job_details))
            {
                $counter = 0;
        
                foreach($job_details as $record)
                {
            $job_name       =   $job_details[$counter]['job_name'];
            $company_name   =   $job_details[$counter]['company_name'];
            $workplace_type     =   $job_details[$counter]['workplace_type'];
            $var_city   =   $job_details[$counter]['city'];
            $var_state      =   $job_details[$counter]['state'];
            $salary     =   $job_details[$counter]['salary'];
            $more_details       =   $job_details[$counter]['more_details'];
            $contact_no     =   $job_details[$counter]['contact_no'];
            $pst_date       =   $job_details[$counter]['pst_date'];
        ?>
        <div class="row">
        
            <div class="col-md-1">
            </div>
             
  
            <div class="col-md-10 display_job">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-lg-row">
                            <div class="row flex-fill" >
                                <div class="col-sm-6">
                                    <h4 class="j-name" ><?php echo $job_name; ?></h4>
                                    <h5 class="j-company"><?php echo $company_name; ?></h5>
                                    <p class="fa fa-map-marker" style="font-size:18px"><?php echo " ",$var_city,", ",$var_state; ?></p><br />
                                    <span class="job-snw"><?php echo "Salary";?><i class="bi bi-currency-rupee"></i></i><?php echo $salary, " /-";?></span>
                                    <span class="job-snw"><i class="bi bi-briefcase-fill"></i><?php echo " ",$workplace_type; ?></span> 
                                </div>
                                <div class="col-sm-6">
                                    <p class="job-info1" style="margin-bottom:-5px;">More Details:</p>
                                    <p class="job-info2" style="margin-top:1px;"><?php echo $more_details; ?></p>
                                    <div class="icon-list">
                                        <p class="job-info1" style="margin-bottom:-5px;">Contact-Us: </p>
                                        <i class="bi bi-telephone-outbound"></i>
                                        <span ><?php echo " ",$contact_no; ?></span>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-1">
            </div>
        </div>
        <br />
        <?php
                        $counter++;
                        }
                    }
                    else
                    {
                        echo "No data found";
                    }
        }
        
                ?>
    </div>
</body>

</html>