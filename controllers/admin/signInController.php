<?php
session_start();

include "../../connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$rememberMe = $_POST["rememberMe"];

if (empty($email)) {
    echo ("Please Enter Your Email Address.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else {
    $resultSet = Database::search("SELECT * FROM `user` WHERE (`email`= ? AND `password`=?) AND `positions_id`='1'", [$email, $password]);
    $num_rows = $resultSet->num_rows;

    if ($num_rows == 1) {
        echo "success";
        $data = $resultSet->fetch_assoc();

        $_SESSION["admin_lms"] = $data;

        if ($rememberMe == "true") {
            setcookie("admin_email_lms", $email, time() + (60 * 60 * 24 * 365), "/");
            setcookie("admin_password_lms", $password, time() + (60 * 60 * 24 * 365), "/");
        } else {
            setcookie("admin_email_lms", "", time() - 3600, "/");
            setcookie("admin_password_lms", "", time() - 3600, "/");
        }
    } else {
        echo "Invalid Email or Password.";
    }

}




?>