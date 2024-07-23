<?php
session_start();

require_once "../../connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo "Please Enter Your email";
} else if (empty($password)) {
    echo "Please Enter Your Password.";
}  else {
    $searchstudent_rs = Database::search("SELECT * FROM `student` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
    $fetch = $searchstudent_rs->fetch_assoc();
    if ($searchstudent_rs->num_rows == 1 && $fetch["verification_code"]!==null) {
        $_SESSION["student_lms"] = $fetch;
        setcookie("student_email_lms", $email, time() + (60 * 60 * 24 * 365), "/");
        setcookie("student_password_lms", $password, time() + (60 * 60 * 24 * 365), "/");
        echo "success";
    } else {
        echo "Something Went Wrong";
    }
}
?>
