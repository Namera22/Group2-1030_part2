<?php
require_once 'settings.php';
    session_start();
    $errors = array();
    $conn = mysqli_connect($host, $user, $password, $database);
    function sanitise_input($data, $conn) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($conn, $data);
        return $data;}
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $job_reference = sanitise_input($_POST["job_reference"], $conn);
        if(empty($job_reference)){
            $errors[]= "Please enter the job reference number";
        }
        if(!preg_match("/^[a-z0-9]{5}$/i", $job_reference)){
            $errors[]= "Please enter a reference number with the correct parameters (a-z, A-Z, 0-9)";
        }
        $job_description = sanitise_input($_POST["job_description"], $conn);
        $first_name = sanitise_input($_POST["first_name"], $conn);
        if(empty($first_name)){
            $errors[]= "Please enter your first name";
        }
        if(!preg_match("/^[a-z]{1,20}$/i", $first_name)){
            $errors[]= "Please enter a valid first name";
        }
        $last_name = sanitise_input($_POST["last_name"], $conn);
        if(empty($last_name)){
            $errors[]= "Please enter your last name";
        }
        if(!preg_match("/^[a-z]{1,20}$/i", $last_name)){
            $errors[]= "Please enter a valid last name";
        }
        $dob = $_POST["dob"] ?? null;
        $gender = sanitise_input($_POST["gender"], $conn);
        $email = sanitise_input($_POST["email"], $conn);
        $phone = sanitise_input($_POST["phone"], $conn);
        $address = sanitise_input($_POST["address"], $conn);
        $suburbtown = sanitise_input($_POST["suburbtown"], $conn);
        $state = sanitise_input($_POST["state"], $conn);
        $postcode = sanitise_input($_POST["postcode"], $conn);
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
        $other_skills = sanitise_input($_POST["other_skills"], $conn);
    }
    else{
    header('Location: index.php');
    exit();
    }
?>