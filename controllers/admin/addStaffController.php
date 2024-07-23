<?php

session_start();
include "../connection.php";


$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$occupation = $_POST["occupation"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$password = $_POST["password"];

if (empty($first_name) || $first_name == 0) {
    echo ("Please enter first name.");
} else if (empty($last_name) || $last_name == 0) {
    echo ("Please enter last name.");
} else if (empty($username) || $username ==0) {
    echo ("Please enter username.");
}else {
    $searchUser_rs = Database::search("SELECT * FROM `user` WHERE `username`='"+$username+"' ");
    if ($searchUser_rs->num_rows > 0) {
echo "user";
    } else {
        Database::iud("INSERT INTO `user` (`email`,`first_name`,`last_name`,`username`,`password`,`positions_id`,`gender_id`) VALUES ('"+$email+"','"+$first_name+"','"+$last_name+"','"+$username+"','"+$password+"','"+$occupation+"','"+$gender+"')");
        $model_has_brand_id = Database::$connection->insert_id;
    }

}
?>