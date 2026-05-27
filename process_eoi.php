<?php
require_once 'settings.php';
    session_start();
    $errors = array();
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    $create = "CREATE TABLE IF NOT EXISTS EOI (
    EOInumber int(11) NOT NULL AUTO_INCREMENT,
    job_reference varchar(5) NOT NULL,
    job_description varchar(100) DEFAULT NULL,
    first_name varchar(30) NOT NULL,
    last_name varchar(30) NOT NULL,
    dob date NOT NULL,
    gender varchar(20) NOT NULL,
    email varchar(100) NOT NULL,
    phone varchar(12) NOT NULL,
    address varchar(40) NOT NULL,
    suburbtown varchar(40) NOT NULL,
    state varchar(4) NOT NULL,
    postcode varchar(4) NOT NULL,
    other_skills text DEFAULT NULL,
    communication tinyint(1) DEFAULT NULL,
    problem_solving tinyint(1) DEFAULT NULL,
    leadership tinyint(1) DEFAULT NULL,
    technical tinyint(1) DEFAULT NULL,
    time_management tinyint(1) DEFAULT NULL,
    teamwork tinyint(1) DEFAULT NULL,
    adaptability tinyint(1) DEFAULT NULL,
    data_analysis tinyint(1) DEFAULT NULL,
    customer_service tinyint(1) DEFAULT NULL,
    project_management tinyint(1) DEFAULT NULL,
    critical_thinking tinyint(1) DEFAULT NULL,
    attention_to_detail tinyint(1) DEFAULT NULL,
    status enum('NEW','CURRENT','FINAL') NOT NULL DEFAULT 'NEW',
    PRIMARY KEY (EOInumber)
)";
mysqli_query($conn, $create);
    function sanitise_input($data, $conn) {
        $data = trim($data)
        $data = stripslashes($data)
        $data = htmlspecialchars($data)
        $data = mysqli_real_escape_string($conn, $data);
        return $data;}
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $job_reference = sanitise_input($_POST["job_reference"], $conn);
        if(empty($job_reference)){
            $errors[]= "Please enter the job reference number";
        }
        elseif(!preg_match("/^[a-z0-9]{5}$/i", $job_reference)){
            $errors[]= "Please enter a reference number with the correct parameters (a-z, A-Z, 0-9)";   
        }
        $job_description = sanitise_input($_POST["job_description"], $conn);
        $first_name = sanitise_input($_POST["first_name"], $conn);
        if(empty($first_name)){
            $errors[]= "Please enter your first name";
        }
        elseif(!preg_match("/^[a-z]{1,20}$/i", $first_name)){
            $errors[]= "Please enter a valid first name";
        }  
        $last_name = sanitise_input($_POST["last_name"], $conn);
        if(empty($last_name)){
            $errors[]= "Please enter your last name";
        }
        elseif(!preg_match("/^[a-z]{1,20}$/i", $last_name)){
            $errors[]= "Please enter a valid last name";
        }
        $dob = $_POST["dob"] ?? null;
        if(empty($dob)){
            $errors[]= "Please enter your date of birth";
        }
        $gender = sanitise_input($_POST["gender"], $conn);
        if(empty($gender)){
            $errors[]= "Please select a gender";
        }
        $email = sanitise_input($_POST["email"], $conn);
        if(empty($email)){
            $errors[]= "Please enter your email";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address";
        }
        $phone = sanitise_input($_POST["phone"], $conn);
        if(empty($phone)){
            $errors[]= "Please enter your phone number";
        }
        elseif(!preg_match("/^[0-9]{8,12}$/", $phone)){
            $errors[]= "Please enter a valid phone number";
        }
        $address = sanitise_input($_POST["address"], $conn);
        if(empty($address)){
            $errors[]= "Please enter your address";
        }
        $suburbtown = sanitise_input($_POST["suburbtown"], $conn);
        if(empty($suburbtown)){
            $errors[]= "Please enter your suburb/town";
        }
        $state = sanitise_input($_POST["state"], $conn);
        if(empty($state)){
            $errors[]= "Please enter your state";
        }
        $postcode = sanitise_input($_POST["postcode"], $conn);
        if(empty($postcode)){
            $errors[]= "Please enter your postcode";
        }
        elseif(!preg_match("/^[0-9]{4}$/", $postcode)){
            $errors[]= "Please enter a valid postcode";
        }
        $communication = isset($_POST["communication"]) ? 1 : 0;
        $problem_solving = isset($_POST["problem_solving"]) ? 1 : 0;
        $leadership = isset($_POST["leadership"]) ? 1 : 0;
        $technical = isset($_POST["technical"]) ? 1 : 0;
        $time_management = isset($_POST["time_management"]) ? 1 : 0;
        $teamwork = isset($_POST["teamwork"]) ? 1 : 0;
        $adaptability = isset($_POST["adaptability"]) ? 1 : 0;
        $data_analysis = isset($_POST["data_analysis"]) ? 1 : 0;
        $customer_service = isset($_POST["customer_service"]) ? 1 : 0;
        $project_management = isset($_POST["project_management"]) ? 1 : 0;
        $critical_thinking = isset($_POST["critical_thinking"]) ? 1 : 0;
        $attention_to_detail = isset($_POST["attention_to_detail"]) ? 1 : 0;
        if(($communication + $problem_solving + $leadership + $technical + $time_management + $teamwork + $adaptability + $data_analysis + $customer_service + $project_management + $critical_thinking + $attention_to_detail) == 0){
            $errors[] = "Please select at least one skill";
        }
        $other_skills = sanitise_input($_POST["other_skills"], $conn);
    
        if(!empty($errors)) {
            foreach($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
        }}
        else {
            $query = "INSERT INTO EOI (job_reference, job_description, first_name, last_name, dob, gender, email, phone, address, suburbtown, state, 
            postcode, communication, problem_solving, leadership, technical, time_management, teamwork, adaptability, data_analysis, customer_service,
             project_management, critical_thinking, attention_to_detail, other_skills) VALUES ('$job_reference', '$job_description', '$first_name', '$last_name', '$dob',
              '$gender', '$email', '$phone', '$address', '$suburbtown', '$state', '$postcode', '$communication', '$problem_solving', '$leadership', '$technical', '$time_management',
               '$teamwork', '$adaptability', '$data_analysis', '$customer_service', '$project_management', '$critical_thinking', '$attention_to_detail', '$other_skills')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $eoi_number = mysqli_insert_id($conn);
                echo "<p>Application submitted successfully! Your EOI number is: <strong>$eoi_number</strong></p>";
            } else {
                echo "<p>Error submitting application. Please try again.</p>";
            }
        }
    }
    else{
    header('Location: index.php');
    exit();
    }
?>