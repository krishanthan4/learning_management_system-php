<?php
session_start();

require_once "../../connection.php";

$username = $_POST["username"];
$password = $_POST["password"];

if (empty($username)) {
    echo "Please Enter Your username";
} else if (empty($password)) {
    echo "Please Enter Your Password.";
}  else {
    $searchAcademic_rs = Database::search("SELECT * FROM `user` WHERE `username`='" . $username . "' AND `password`='" . $password . "' AND `positions_id`='4'");
    $fetch = $searchAcademic_rs->fetch_assoc();
    if ($searchAcademic_rs->num_rows == 1 && $fetch["verification_code"]!==null) {
        $_SESSION["academic_lms"] = $fetch;
        setcookie("academic_username_lms", $username, time() + (60 * 60 * 24 * 365), "/");
        setcookie("academic_password_lms", $password, time() + (60 * 60 * 24 * 365), "/");
        echo "success";
    } else {
        echo "Something Went Wrong";
    }
}
?>
