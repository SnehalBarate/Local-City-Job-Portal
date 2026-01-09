<?php
    require_once('static/lib/functions.php');
    $fcall = new class_functions();
    
    if(isset($_GET['logout']))
    {
        unset($_SESSION['username']);
        header("location:login.php");
    }
    
    $res_edit_id    =   "";
    if(isset($_GET['edit_id']))
    {
        $res_edit_id    =   $_GET['edit_id'];
        $_SESSION['edit_id']    =   $res_edit_id;
    }
    
    // FIXED: Added a check to prevent session errors if the page is opened directly
    $res_edit_id    =   isset($_SESSION['edit_id']) ? $_SESSION['edit_id'] : "";
    
    if(isset($_POST['update_btn']))
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
    
        $fcall->update_user_record($var_full_name,$var_r_email_id,$var_mobile_no,$var_dob,$var_gender,$var_country,$var_state,$var_city,$var_password,$res_edit_id);
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="static/css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <title>Update Users Record</title>
</head>

<body style="background-image: url('static/images/regbg2.jpg');" class="regbackground">

    <div class="form_container" style="font-size:15px;">
        <form action="users_report.php" method="POST" autocomplete="off">
            <center style="margin-bottom:30px;">
                <h2>Update Record</h2>
            </center>
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

            <label>Select Your Country</label>
            <select name="country" required class="input_box form-control">
                <option value="Select Your Country">Select Your Country</option>
                <option value="India">India</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <option value="Germany">Germany</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Bangladesh">Bangladesh</option>
            </select>

            <label> Select Your State </label>
            <select name="state" required class="input_box form-control">
                <option value="Select Your State">Select Your State</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Punjab">Punjab</option>
                <option value="Kerala">Kerala</option>
                <option value="Odisha">Odisha</option>
            </select>
            <label>Select Your City </label>
            <select name="city" required class="input_box form-control">
                <option value="Select Your City">Select Your City</option>
                <option value="Solapur">Solapur</option>
                <option value="Pune">Pune</option>
                <option value="Nagpur">Nagpur</option>
                <option value="Mysore">Mysore</option>
                <option value="Bangalore">Bangalore</option>
                <option value="Hubli-Dharwar">Hubli-Dharwar</option>
                <option value="Kolar">Kolar</option>
            </select>

            
             <label>Password</label>
            <input type="password" class="input_box form-control" id="pass" required name="password" placeholder="Enter password" />
            <br />
            <center><input type="submit" class="button" name="update_btn" value="UPDATE"></center>
        </form>
    </div>

</body>

</html>