<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class class_functions
{
    private $con;

    function __construct()
    {
        // Database connectivity
        $host = getenv("DB_HOST");
        $port = (int) getenv("DB_PORT");
        $user = getenv("DB_USER");
        $pass = getenv("DB_PASSWORD");
        $db   = getenv("DB_NAME");

        $this->con = new mysqli(
            $host,
            $user,
            $pass,
            $db,
            $port
        );

        if ($this->con->connect_error) {
            die("Database Connection Failed: " . $this->con->connect_error);
        }

        $this->con->set_charset("utf8mb4");
    }


    function create_user_account($full_name,$email_id,$mobile_no,$dob,$gender,$country,$state,$city,$password)
    {
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s A");

        // duplicate check
        if ($chk = $this->con->prepare("SELECT `email_id`,`mobile_no` FROM `users_data` WHERE `email_id`=? OR `mobile_no`=?"))
        {
            $chk->bind_param("ss", $email_id, $mobile_no);
            $chk->execute();
            $chk->store_result();

            if ($chk->num_rows > 0)
            {
                $chk->bind_result($db_email, $db_mobile);
                $chk->fetch();
                $chk->close();

                if ($db_email == $email_id)
                {
                    $_SESSION['flag'] = 2;
                }
                else
                {
                    $_SESSION['flag'] = 3;
                }

                return false;
            }

            $chk->close();
        }

        if ($stmt = $this->con->prepare("INSERT INTO `users_data`(`full_name`, `email_id`, `mobile_no`, `dob`, `gender`, `country`, `state`, `city`, `password`,`reg_date`,`reg_time`) VALUES (?,?,?,?,?,?,?,?,?,?,?)"))
        {
            $stmt->bind_param(
                "sssssssssss",
                $full_name,
                $email_id,
                $mobile_no,
                $dob,
                $gender,
                $country,
                $state,
                $city,
                $password,
                $current_date,
                $current_time
            );

            if ($stmt->execute())
            {
                $_SESSION['flag'] = 4;
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function get_users_details()
    {
        if ($stmt = $this->con->prepare("SELECT `id`,`full_name`,`email_id`,`mobile_no`,`dob`,`gender`,`country`,`state`,`city`,`password`,`reg_date`,`reg_time` from `users_data`"))
        {
            $stmt->bind_result(
                $res_id,
                $res_full_name,
                $res_email_id,
                $res_mobile_number,
                $res_dob,
                $res_gender,
                $res_country,
                $res_state,
                $res_city,
                $res_password,
                $res_date,
                $res_time
            );

            if ($stmt->execute())
            {
                $data = array();
                $counter = 0;

                while ($stmt->fetch())
                {
                    $data[$counter]['id'] = $res_id;
                    $data[$counter]['full_name'] = $res_full_name;
                    $data[$counter]['email_id'] = $res_email_id;
                    $data[$counter]['mobile_number'] = $res_mobile_number;
                    $data[$counter]['dob'] = $res_dob;
                    $data[$counter]['gender'] = $res_gender;
                    $data[$counter]['country'] = $res_country;
                    $data[$counter]['state'] = $res_state;
                    $data[$counter]['city'] = $res_city;
                    $data[$counter]['password'] = $res_password;
                    $data[$counter]['date'] = $res_date;
                    $data[$counter]['time'] = $res_time;

                    $counter++;
                }

                if (!empty($data))
                {
                    return $data;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function delete_user_data($del_id)
    {
        if ($stmt = $this->con->prepare("DELETE from `users_data` where `id`=?"))
        {
            $stmt->bind_param("i",$del_id);

            if ($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function update_user_record($var_full_name,$var_r_email_id,$var_mobile_no,$var_dob,$var_gender,$var_country,$var_state,$var_city,$var_password,$res_edit_id)
    {
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s t");

        if ($stmt = $this->con->prepare("UPDATE `users_data` SET `full_name`=?,`email_id`=?,`mobile_no`=?,`dob`=?,`gender`=?,`country`=?,`state`=?,`city`=?,`password`=?,`reg_date`=?,`reg_time`=? WHERE `id`=?"))
        {
            $stmt->bind_param(
                "sssssssssssi",
                $var_full_name,
                $var_r_email_id,
                $var_mobile_no,
                $var_dob,
                $var_gender,
                $var_country,
                $var_state,
                $var_city,
                $var_password,
                $current_date,
                $current_time,
                $res_edit_id
            );

            if ($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function login_authentication($var_email_id)
    {
        if ($stmt = $this->con->prepare("SELECT `password` FROM `users_data` WHERE `email_id`=?"))
        {
            $stmt->bind_param("s",$var_email_id);
            $stmt->bind_result($res_password);

            if ($stmt->execute())
            {
                if ($stmt->fetch())
                {
                    return $res_password;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function get_mobile_no($var_email_id)
    {
        if ($stmt = $this->con->prepare("SELECT `mobile_no` FROM `users_data` WHERE `email_id`=?"))
        {
            $stmt->bind_param("s",$var_email_id);
            $stmt->bind_result($res_mobile_no);

            if ($stmt->execute())
            {
                if ($stmt->fetch())
                {
                    return $res_mobile_no;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    // ============================================================
    // FORGOT PASSWORD
    // ============================================================

    function reset_password($email_id, $mobile_no, $new_password)
    {
        if ($stmt = $this->con->prepare(
            "UPDATE `users_data`
             SET `password`=?
             WHERE `email_id`=? AND `mobile_no`=?"
        ))
        {
            $stmt->bind_param(
                "sss",
                $new_password,
                $email_id,
                $mobile_no
            );

            if ($stmt->execute())
            {
                if ($stmt->affected_rows > 0)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function store_job_details($job_name,$company_name,$workplace_type,$country,$state,$city,$salary,$more_details,$contact_no)
    {
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s A");

        // duplicate check
        if ($chk = $this->con->prepare("SELECT `j_id` FROM `job_details` WHERE `job_name`=? AND `company_name`=?"))
        {
            $chk->bind_param("ss", $job_name, $company_name);
            $chk->execute();
            $chk->store_result();

            if ($chk->num_rows > 0)
            {
                $chk->close();
                $_SESSION['flag1'] = 1;
                return false;
            }

            $chk->close();
        }

        if ($stmt = $this->con->prepare("INSERT INTO `job_details`(`job_name`, `company_name`, `workplace_type`, `country`, `state`, `city`,`salary`,`more_details`, `contact_no`, `pst_date`,`pst_time`) VALUES (?,?,?,?,?,?,?,?,?,?,?)"))
        {
            $stmt->bind_param(
                "sssssssssss",
                $job_name,
                $company_name,
                $workplace_type,
                $country,
                $state,
                $city,
                $salary,
                $more_details,
                $contact_no,
                $current_date,
                $current_time
            );

            if ($stmt->execute())
            {
                $_SESSION['flag1'] = 2;
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function get_all_job_details_based_on_city($var_country,$var_state,$var_city)
    {
        if ($stmt = $this->con->prepare("SELECT `job_name`,`company_name`,`workplace_type`,`salary`,`more_details`,`contact_no`,`pst_date` FROM `job_details` WHERE `country`=? AND `state`=? AND `city`=?"))
        {
            $stmt->bind_param("sss",$var_country,$var_state,$var_city);

            $stmt->bind_result(
                $job_name,
                $company_name,
                $workplace_type,
                $salary,
                $more_details,
                $contact_no,
                $pst_date
            );

            if ($stmt->execute())
            {
                $data = array();
                $counter = 0;

                while ($stmt->fetch())
                {
                    $data[$counter]['job_name'] = $job_name;
                    $data[$counter]['company_name'] = $company_name;
                    $data[$counter]['workplace_type'] = $workplace_type;
                    $data[$counter]['city'] = $var_city;
                    $data[$counter]['state'] = $var_state;
                    $data[$counter]['salary'] = $salary;
                    $data[$counter]['more_details'] = $more_details;
                    $data[$counter]['contact_no'] = $contact_no;
                    $data[$counter]['pst_date'] = $pst_date;

                    $counter++;
                }

                if (!empty($data))
                {
                    return $data;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function get_all_job_details()
    {
        if ($stmt = $this->con->prepare("SELECT `job_name`, `company_name`, `workplace_type`, `state`, `city`, `salary`, `more_details`, `contact_no`, `pst_date` FROM `job_details`"))
        {
            $stmt->bind_result(
                $job_name,
                $company_name,
                $workplace_type,
                $var_state,
                $var_city,
                $salary,
                $more_details,
                $contact_no,
                $pst_date
            );

            if ($stmt->execute())
            {
                $data = array();
                $counter = 0;

                while ($stmt->fetch())
                {
                    $data[$counter]['job_name'] = $job_name;
                    $data[$counter]['company_name'] = $company_name;
                    $data[$counter]['workplace_type'] = $workplace_type;
                    $data[$counter]['city'] = $var_city;
                    $data[$counter]['state'] = $var_state;
                    $data[$counter]['salary'] = $salary;
                    $data[$counter]['more_details'] = $more_details;
                    $data[$counter]['contact_no'] = $contact_no;
                    $data[$counter]['pst_date'] = $pst_date;

                    $counter++;
                }

                if (!empty($data))
                {
                    return $data;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function get_jobs_details()
    {
        if ($stmt = $this->con->prepare("SELECT `j_id`,`job_name`,`company_name`,`workplace_type`,`country`,`state`,`city`,`salary`,`more_details`,`contact_no`, `category`, `pst_date`,`pst_time` FROM `job_details`"))
        {
            $stmt->bind_result(
                $res_j_id,
                $res_job_name,
                $res_company_name,
                $res_workplace_type,
                $res_country_name,
                $res_state,
                $res_city,
                $res_salary,
                $res_more_details,
                $res_contact_no,
                $res_category,
                $res_j_date,
                $res_j_time
            );

            if ($stmt->execute())
            {
                $data = array();
                $counter = 0;

                while ($stmt->fetch())
                {
                    $data[$counter]['j_id'] = $res_j_id;
                    $data[$counter]['job_name'] = $res_job_name;
                    $data[$counter]['company_name'] = $res_company_name;
                    $data[$counter]['workplace_type'] = $res_workplace_type;
                    $data[$counter]['j_country'] = $res_country_name;
                    $data[$counter]['j_state'] = $res_state;
                    $data[$counter]['j_city'] = $res_city;
                    $data[$counter]['salary'] = $res_salary;
                    $data[$counter]['more_details'] = $res_more_details;
                    $data[$counter]['contact_no'] = $res_contact_no;
                    $data[$counter]['category'] = $res_category;
                    $data[$counter]['date'] = $res_j_date;
                    $data[$counter]['time'] = $res_j_time;

                    $counter++;
                }

                if (!empty($data))
                {
                    return $data;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function get_all_job_details_based_on_category($category)
    {
        if ($stmt = $this->con->prepare("SELECT `job_name`, `company_name`, `workplace_type`, `state`, `city`, `salary`, `more_details`, `contact_no`, `pst_date` FROM `job_details` WHERE `category`=?"))
        {
            $stmt->bind_param("s",$category);

            $stmt->bind_result(
                $job_name,
                $company_name,
                $workplace_type,
                $var_state,
                $var_city,
                $salary,
                $more_details,
                $contact_no,
                $pst_date
            );

            if ($stmt->execute())
            {
                $data = array();
                $counter = 0;

                while ($stmt->fetch())
                {
                    $data[$counter]['job_name'] = $job_name;
                    $data[$counter]['company_name'] = $company_name;
                    $data[$counter]['workplace_type'] = $workplace_type;
                    $data[$counter]['city'] = $var_city;
                    $data[$counter]['state'] = $var_state;
                    $data[$counter]['salary'] = $salary;
                    $data[$counter]['more_details'] = $more_details;
                    $data[$counter]['contact_no'] = $contact_no;
                    $data[$counter]['pst_date'] = $pst_date;

                    $counter++;
                }

                if (!empty($data))
                {
                    return $data;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function store_contact_us_details($f_name, $l_name, $cnt_email_id, $cnt_mobile_no, $report_msg)
    {
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s t");

        if ($stmt = $this->con->prepare("INSERT INTO `contact_us_data`(`f_name`, `l_name`, `cnt_email_id`, `cnt_mobile_no`, `report_msg`, `rpt_date`, `rpt_time`) VALUES (?,?,?,?,?,?,?)"))
        {
            $stmt->bind_param(
                "sssssss",
                $f_name,
                $l_name,
                $cnt_email_id,
                $cnt_mobile_no,
                $report_msg,
                $current_date,
                $current_time
            );

            if ($stmt->execute())
            {
                $_SESSION['flag2'] = 1;
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function get_contact_us_details()
    {
        if ($stmt = $this->con->prepare("SELECT `c_id`, `f_name`, `l_name`, `cnt_email_id`, `cnt_mobile_no`, `report_msg`, `rpt_date`, `rpt_time` FROM `contact_us_data`"))
        {
            $stmt->bind_result(
                $c_id,
                $f_name,
                $l_name,
                $cnt_email_id,
                $cnt_mobile_no,
                $report_msg,
                $current_date,
                $current_time
            );

            if ($stmt->execute())
            {
                $data = array();
                $counter = 0;

                while ($stmt->fetch())
                {
                    $data[$counter]['c_id'] = $c_id;
                    $data[$counter]['f_name'] = $f_name;
                    $data[$counter]['l_name'] = $l_name;
                    $data[$counter]['cnt_email_id'] = $cnt_email_id;
                    $data[$counter]['cnt_mobile_no'] = $cnt_mobile_no;
                    $data[$counter]['report_msg'] = $report_msg;
                    $data[$counter]['current_date'] = $current_date;
                    $data[$counter]['current_time'] = $current_time;

                    $counter++;
                }

                if (!empty($data))
                {
                    return $data;
                }
                else
                {
                    return false;
                }
            }
        }

        return false;
    }


    function delete_job_details($del_id1)
    {
        if ($stmt = $this->con->prepare("DELETE FROM `job_details` WHERE `j_id`=?"))
        {
            $stmt->bind_param("i",$del_id1);

            if ($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function update_job_details($job_name,$company_name,$workplace_type,$country,$state,$city,$salary,$more_details,$contact_no,$job_edit_id)
    {
        $current_date = date("Y-m-d");
        $current_time = date("H:i:s t");

        if ($stmt = $this->con->prepare("UPDATE `job_details` SET `job_name`=?,`company_name`=?,`workplace_type`=?,`country`=?,`state`=?,`city`=?,`salary`=?,`more_details`=?,`contact_no`=?,`pst_date`=?,`pst_time`=? WHERE `j_id`=?"))
        {
            $stmt->bind_param(
                "sssssssssssi",
                $job_name,
                $company_name,
                $workplace_type,
                $country,
                $state,
                $city,
                $salary,
                $more_details,
                $contact_no,
                $current_date,
                $current_time,
                $job_edit_id
            );

            if ($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }


    function delete_report($del_id2)
    {
        if ($stmt = $this->con->prepare("DELETE FROM `contact_us_data` WHERE `c_id`=?"))
        {
            $stmt->bind_param("i",$del_id2);

            if ($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        return false;
    }
}

?>
