<?php
include "../connection.php";
include "../function.php";
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$mobile_number = $_POST["mobile_number"];
$gender = $_POST["gender"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];
$province = $_POST["province"];
$district = $_POST["district"];
$city = $_POST["city"];
$username = $_POST["username"];
$position = $_POST["position"];
$admin_id = $_POST["admin_id"];
if ($gender == "Select") {
    echo ("Please select your Gender !");
} else if ($province == "Select") {
    echo ("Please select your Province !");
} else if ($district == "Select") {
    echo ("Please select your District !");
} else if ($city == "Select") {
    echo ("Please select your City !");
} else {
        Database::iud("UPDATE `administrators` SET `first_name`=?,`last_name`=?,`mobile_number`=?,`gender`=?,`username`=?,`password`=?,`position_id`=?, WHERE 
        id=?", [$first_name, $last_name, $mobile_number, $gender,$username,$password,$position, $admin_id]);
        $address_resultSet = Database::search("SELECT * FROM `address` WHERE `line1`=? OR `line2`=? ", [$line1,$line2]);
        if($address_resultSet->num_rows == 1) {
            Database::iud("UPDATE user_has_address SET city_city_id=?,line1=?,
            line2=?,postal_code=? WHERE user_email=?", [$city, $line1, $line2, $pcode, $email]);
        } else {
            Database::iud("INSERT INTO user_has_address(user_email,city_city_id,line1,line2,postal_code) 
            VALUES (?,?,?,?,?)",[$email,$city,$line1,$line2,$pcode]);
        }
        if (sizeof($_FILES) == 1) {
            $image = $_FILES["image"];
            $image_extension = $image["type"];
            $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");
            if (in_array($image_extension, $allowed_image_extensions)) {
                $new_img_extension;
                if ($image_extension == "image/jpeg") {
                    $new_img_extension = ".jpeg";
                } else if ($image_extension == "image/png") {
                    $new_img_extension = ".png";
                } else if ($image_extension == "image/svg+xml") {
                    $new_img_extension = ".svg";
                }
                $file_name = "../resources/profile_images/" . $first_name . "_" . uniqid() . $new_img_extension;
                if (!file_exists("../resources/profile_images/")) {
                    mkdir("../resources/profile_images/", 0777, true);
                }
                move_uploaded_file($image["tmp_name"], $file_name);
                $profile_img_rs = Database::search("SELECT * FROM profile_img WHERE user_email=?",[$email]);
                if ($profile_img_rs->num_rows == 1) {
                    Database::iud("UPDATE profile_img SET path=? WHERE user_email=?",[$file_name,$email]);
                    echo ("Updated");
                } else {
                    Database::iud("INSERT INTO profile_img (path,user_email) VALUES (?,?)",[$file_name,$email]);
                    echo ("Saved");
                }
            }
        } else if (sizeof($_FILES) == 0) {
            echo ("You have not selected any image.");
        } else {
            echo ("You must select only 01 profile image.");
        }
}
?>