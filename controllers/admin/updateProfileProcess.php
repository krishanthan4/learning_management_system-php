<?php
session_start();
include "../../connection.php";
include "../../common.php";

$email = $_SESSION["user"]["email"];

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$province = $_POST["province"];
$district = $_POST["district"];
$city = $_POST["city"];
$pcode = $_POST["pcode"];


 if ($firstName == "") {
    echo ("Add your First Name !");

}else if ($lastName == "") {
    echo ("Add your Last Name !");

}else if ($mobile == "") {
    echo ("Add your Mobile Number !");

}else if (!preg_match("/^07[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo("Invalid Mobile Number !");
}

?>