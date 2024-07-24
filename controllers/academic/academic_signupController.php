<?php
session_start();
require_once "../../connection.php";
$username = $_POST["username"];
$password = $_POST["password"];
$verification_code = $_POST["verification_code"];
if (empty($username)) {
    echo "Please Enter Your username";
} else if (empty($password)) {
    echo "Please Enter Your Password.";
} else if (empty($verification_code)) {
    echo "Please Enter Your verification code.";
} else {
    $searchAcademic_rs = Database::search("SELECT * FROM `user` WHERE `username`='" . $username . "' AND `password`='" . $password . "' AND `positions_id`='4'");
    if ($searchAcademic_rs->num_rows == 1) {
        $updateQuery = "UPDATE `user` SET `verification_code`='" . $verification_code . "' WHERE `username`='" . $username . "' AND `password`='" . $password . "' AND `positions_id`='4'";
        $resultSet = Database::iud($updateQuery);
        $_SESSION["academic_lms"] = $searchAcademic_rs->fetch_assoc();
        setcookie("academic_username_lms", $username, time() + (60 * 60 * 24 * 365), "/");
        setcookie("academic_password_lms", $password, time() + (60 * 60 * 24 * 365), "/");
        echo "success";
    } else {
        echo "Something Went Wrong";
    }
}
?>
