<?php
// ob_start MUST be the very first line. No spaces or enters before this tag.
ob_start(); 

// CHANGE: Updated folder path for your library
require_once('static/lib/functions.php');
$fcall = new class_functions();

// --- 1. EXCEL EXPORT LOGIC (Must stay at the top to avoid Warnings) ---
if(isset($_GET['excel_export']))
{
    // Fetch user data
    $reg_user_data = $fcall->get_users_details();
    
    // ob_end_clean() removes any accidental warnings or spaces before the download starts
    if (ob_get_length()) ob_end_clean();
    
    $filename = "user_report_" . date('Ymd') . ".xls";         
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    $show_column = false;
    if(!empty($reg_user_data)) 
    {
        foreach($reg_user_data as $record) 
        {
            if(!$show_column) 
            {
                // Display column names in the first row
                echo implode("\t", array_keys($record)) . "\n";
                $show_column = true;
            }
            echo implode("\t", array_values($record)) . "\n";
        }
    }
    // exit prevents the HTML design from being added inside your Excel file
    exit;  
}

// --- 2. DELETE LOGIC ---
if(isset($_GET['delete_id']))
{
    $del_id = $_GET['delete_id'];
    $fcall->delete_user_data($del_id);
}
if(isset($_GET['delete_id1']))
{
    $del_id1 = $_GET['delete_id1'];
    $fcall->delete_job_details($del_id1);
}
if(isset($_GET['delete_id2']))
{
    $del_id2 = $_GET['delete_id2'];
    $fcall->delete_report($del_id2);
}
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-grid.css" />
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-reboot.css" />
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap-utilities.css" />

        <script src="static/js/bootstrap.js"></script>
        <script src="static/js/bootstrap.bundle.js"></script>
        
        <title>Users Report</title>
        <style>
            /* YOUR EXACT ORIGINAL DESIGN STYLES */
            table {
                width: 100%;
                border-collapse: collapse;
                background-color: white;
            }
            th {
                background-color: #999999;
            }
            td, th {
                border: 1px solid;
                text-align: left;
                padding: 5px;
            }
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            h1 {
                text-align: center;
                margin-left: 40%;
                margin-right: 40%;
                border-radius: 5px;
                background-color: black;
                color: white;
                padding: 5px;
            }
            h3 {
                text-align: center;
                margin-left: 40%;
                margin-right: 40%;
                border-radius: 5px;
                background-color: white;
                padding: 5px;
            }
        </style>
    </head>
    <body style="background-color:#cce6ff;">
    <br />
    <h1>Users Report</h1>
    <h1><a href="users_report.php?excel_export" style="color:white; text-decoration:none;">Export Excel</a></h1>
    <br />
    
    <h3>Registered User</h3>
    <table>
        <thead>
            <tr>
                <th>Sr No</th><th>Full Name</th><th>Email ID</th><th>Mobile No</th>
                <th>DOB</th><th>Gender</th><th>Country</th><th>State</th>
                <th>City</th><th>Password</th><th>Date</th><th>Time</th>
                <th>Edit</th><th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $reg_user_data = $fcall->get_users_details();
            if(!empty($reg_user_data))
            {
                $counter = 0;
                foreach($reg_user_data as $record)
                {
                    $res_id = $record['id'];
                    ?>
                    <tr>
                        <td><?php echo $counter+1; ?></td>
                        <td><?php echo $record['full_name']; ?></td>
                        <td><?php echo $record['email_id']; ?></td>
                        <td><?php echo $record['mobile_number']; ?></td>
                        <td><?php echo $record['dob']; ?></td>
                        <td><?php echo $record['gender']; ?></td>
                        <td><?php echo $record['country']; ?></td>
                        <td><?php echo $record['state']; ?></td>
                        <td><?php echo $record['city']; ?></td>
                        <td><?php echo $record['password']; ?></td>
                        <td><?php echo $record['date']; ?></td>
                        <td><?php echo $record['time']; ?></td>
                        <td><a href="edit_user_record.php?edit_id=<?php echo $res_id; ?>">Edit</a></td>
                        <td><a href="users_report.php?delete_id=<?php echo $res_id; ?>">Delete</a></td>
                    </tr>
                    <?php
                    $counter++;
                }
            } else { echo "<tr><td colspan='14'>No Data Found</td></tr>"; }
        ?>
        </tbody>
    </table>

    <br /><br />
    <h3>Registered Job</h3>
    <table>
        <thead>
            <tr>
                <th>Sr No</th><th>Job Name</th><th>Company Name</th><th>WorkPlace Type</th>
                <th>Country</th><th>State</th><th>City</th><th>Salary</th>
                <th>More Details</th><th>Contact No.</th><th>Category</th>
                <th>Post Date</th><th>Post Time</th><th>Edit</th><th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $reg_job_data = $fcall->get_jobs_details();
            if(!empty($reg_job_data))
            {
                $counter = 0;
                foreach($reg_job_data as $record)
                {
                    $res_j_id = $record['j_id'];
                    ?>
                    <tr>
                        <td><?php echo $counter+1; ?></td>
                        <td><?php echo $record['job_name']; ?></td>
                        <td><?php echo $record['company_name']; ?></td>
                        <td><?php echo $record['workplace_type']; ?></td>
                        <td><?php echo $record['j_country']; ?></td>
                        <td><?php echo $record['j_state']; ?></td>
                        <td><?php echo $record['j_city']; ?></td>
                        <td><?php echo $record['salary']; ?></td>
                        <td><?php echo $record['more_details']; ?></td>
                        <td><?php echo $record['contact_no']; ?></td>
                        <td><?php echo $record['category']; ?></td>
                        <td><?php echo $record['date']; ?></td>
                        <td><?php echo $record['time']; ?></td>
                        <td><a href="edit_job_details.php?edit_id1=<?php echo $res_j_id; ?>">Edit</a></td>
                        <td><a href="users_report.php?delete_id1=<?php echo $res_j_id; ?>">Delete</a></td>
                    </tr>
                    <?php $counter++;
                }
            } else { echo "<tr><td colspan='15'>No Data Found</td></tr>"; }
        ?>
        </tbody>
    </table>

    <br /><br />
    <h3>Contact-Us</h3>
    <table>
        <thead>
            <tr>
                <th>Sr No</th><th>First Name</th><th>Last Name</th><th>Email ID</th>
                <th>Mobile No</th><th>Report Message</th><th>Date</th><th>Time</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $contact_us_data = $fcall->get_contact_us_details();
            if(!empty($contact_us_data))
            {
                $counter = 0;
                foreach($contact_us_data as $record)
                {
                    $c_id = $record['c_id'];
                    ?>
                    <tr>
                        <td><?php echo $counter+1; ?></td>
                        <td><?php echo $record['f_name']; ?></td>
                        <td><?php echo $record['l_name']; ?></td>
                        <td><?php echo $record['cnt_email_id']; ?></td>
                        <td><?php echo $record['cnt_mobile_no']; ?></td>
                        <td><?php echo $record['report_msg']; ?></td>
                        <td><?php echo $record['current_date']; ?></td>
                        <td><?php echo $record['current_time']; ?></td>
                        <td><a href="users_report.php?delete_id2=<?php echo $c_id; ?>">Delete</a></td>
                    </tr>
                    <?php $counter++;
                }
            } else { echo "<tr><td colspan='9'>No Data Found</td></tr>"; }
        ?>
        </tbody>
    </table>
    <br /><br />
    </body>
</html>
<?php 
// Final step for output buffering
ob_end_flush(); 
?>