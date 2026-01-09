<?php
  require_once('static/lib/functions.php');
  $fcall= new class_functions();
  
  if(isset($_GET['logout']))
  {
    session_destroy();
    unset($_SESSION['username']);
    header("location:login.php");
  }
  $flag1=0;
  if(isset($_POST['submit_pst_job_form']))
  {
    $job_name=$_POST['job_name'];
    $company_name=$_POST['company_name'];
    $workplace_type=$_POST['workplace_type'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $salary=$_POST['salary'];
    $more_details=$_POST['more_details'];
    $contact_no=$_POST['contact_no'];
    
    $fcall->store_job_details($job_name,$company_name,$workplace_type,$country,$state,$city,$salary,$more_details,$contact_no);
    $flag1=$_SESSION['flag1'];
  }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>post_job_form</title>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

  <style>
    /* ALL ORIGINAL DESIGN STYLES REMAIN UNTOUCHED */
    .cst_post {
      border: 3px solid black;
      border-radius: 30px;
      margin: auto;
      background-color:#e0ebeb;
    }

    .cst_btn {
      border-radius: 25px;
      padding: 2px;
      width: 100px;
      margin: auto;
      margin-top: 20px;
      margin-bottom: 10px;
      background-color:  #095a54;;
    }
    .cst_btn:hover
    {
      background-color:  #0d6efd;
      color:black;
    }
    .cst_input
    {
      border:2px solid black;
      margin-bottom: 25px;

    }
    .cst_input:focus
    {
      box-shadow: none;
      border:2px solid blue;
      
    }
    .cen_btn
    {
      display: flex;
      justify-content: center;
      align-items: center;
    }
   .required input::after
    {
      content:"*";
    }
  </style>
</head>

<body>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-md-6 cst_post">
        <h2 style="text-align:center;">Post a job now</h2>
        <form action="form_post_job.php" method="POST">
    <?php 
      if($flag1==1)
      {
    ?>
        <div class="alert alert-danger" role="alert">
          Already Registered with this Job Name and Company/Association Name
        </div>
    <?php 
      }
    if($flag1==2)
      {
    ?>
        <div class="alert alert-success" role="alert">
          Job Posted Successfully....
        </div>
    <?php 
      }
    ?>
          <div class="mb-3 page_heading">
            <label for="exampleFormControlInput1" class="form-label title">Job name</label>
            <input type="text" required class="form-control form_container cst_input" name="job_name" id="exampleFormControlInput1"
              placeholder="Add the title you are hiring for" />
        
            <label for="exampleFormControlInput1"  class="form-label ">Company</label>
            <input type="text" required class="form-control form_container cst_input" name="company_name" id="exampleFormControlInput1"
              placeholder="Company Name" />
        
            <label for="exampleFormControlInput1"class="form-label ">Workplace type</label>
            <select class="form-select form-select-sm input_box form_container cst_input" name="workplace_type" required aria-label=".form-select-sm example"  >
              <option selected>Open this select menu</option>
              <option >On-site Type</option>
              <option >Remote Type</option>
              <option >Hybrid Type</option>
            </select>
      
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label input_box ">Job Location</label>
              <input type="text" class="form-control form_container cst_input" name="country" id="formGroupExampleInput" placeholder="Country" required>
              <input type="text" class="form-control form_container cst_input" name="state" id="formGroupExampleInput" placeholder="State" required>
              <input type="text" class="form-control form_container cst_input" name="city" id="formGroupExampleInput" placeholder="City" required>
            </div>


            <label for="formGroupExampleInput" class="form-label input_box ">Salary</label>
            <input type="text" class="form-control form_container cst_input" name="salary" id="formGroupExampleInput" placeholder="Enter salary" required>
        
          <label for="floatingTextarea2">More details</label>
          <textarea class="form-control cst_input" name="more_details" placeholder="More details" id="floatingTextarea2" required></textarea>

          <label for="formGroupExampleInput" class="form-label input_box " required>Contact no</label>
              <input type="tel" class="form-control form_container cst_input" name="contact_no" id="formGroupExampleInput">
          
          <div class="cen_btn">
          <input type="submit" name="submit_pst_job_form" class="btn btn-primary btn-lg cst_btn">
      </div>
          </div>
      </div>
      </form>
    </div>
  </div>

  <br><br>

  <script
    src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>
</html>