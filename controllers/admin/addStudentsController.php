<?php

session_start();
include "../connection.php";


$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$username = $_POST["username"];
$class_id = $_POST["class_id"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$password = $_POST["password"];
$registered_date = $_POST["registered_date"];
$address_line1 = $_POST["address_line1"];
$address_line2 = $_POST["address_line2"];
$city_id = $_POST["city_id"];
$district_id = $_POST["district_id"];
$province_id = $_POST["province_id"];
//lkl
if (empty($first_name) || $first_name == 0) {
    echo ("Please enter first name.");
} else if (empty($last_name) || $last_name == 0) {
    echo ("Please enter last name.");
} else if (empty($username) || $username ==0) {
    echo ("Please enter username.");
} else if (empty($username) || $username ==0) {
    echo ("Please select a product model.");
} else if (empty($condition)) {
    echo ("Please select a product condition.");
} else if (empty($color) || $color == 0) {
    echo ("Please select a product color.");
} else if (!is_numeric($quantity) || $quantity <= 0) {
    echo ("Please enter a valid product quantity.");
} else if (!is_numeric($cost) || $cost <= 0) {
    echo ("Please enter a valid cost per item.");
} else if (!is_numeric($deliveryColombo) || $deliveryColombo < 0) {
    echo ("Please enter a valid delivery cost within Colombo.");
} else if (!is_numeric($deliveryOther) || $deliveryOther < 0) {
    echo ("Please enter a valid delivery cost out of Colombo.");
} else if (empty($description)) {
    echo ("Please enter a product description.");
} else {
    $mhb_rs = Database::search("SELECT * FROM model_has_brand WHERE model_model_id='" . $model . "' AND 
    brand_brand_id='" . $brand . "'");
    $model_has_brand_id;
    if ($mhb_rs->num_rows > 0) {
        $mhb_data = $mhb_rs->fetch_assoc();
        $model_has_brand_id = $mhb_data["id"];
    } else {
        Database::iud("INSERT INTO model_has_brand(model_model_id,brand_brand_id) VALUES 
        ('" . $model . "','" . $brand . "')");
        $model_has_brand_id = Database::$connection->insert_id;
    }

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $status = 1;

    Database::iud("INSERT INTO product(price,qty,description,title,datetime_added,delivery_fee_colombo,
    delivery_fee_other,category_cat_id,model_has_brand_id,condition_condition_id,status_status_id,
    user_email) VALUES ('" . $cost . "','" . $quantity . "','" . $description . "','" . $title . "','" . $date . "','" . $deliveryColombo . "','" . $deliveryOther . "',
    '" . $category . "','" . $model_has_brand_id . "','" . $condition . "','" . $status . "','" . $email . "')");

    $product_id = Database::$connection->insert_id;

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_image_extensions = array("image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $image_file = $_FILES["image" . $x];
                $file_extension = $image_file["type"];

                if (in_array($file_extension, $allowed_image_extensions)) {

                    $new_img_extension;

                    if ($file_extension == "image/jpeg") {
                        $new_img_extension = ".jpeg";
                    } else if ($file_extension == "image/png") {
                        $new_img_extension = ".png";
                    } else if ($file_extension == "image/svg+xml") {
                        $new_img_extension = ".svg";
                    }

                    $file_name = "../public/images/product_images/" . $title . "" . $x . "" . uniqid() . $new_img_extension;
                    move_uploaded_file($image_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO product_img(img_path,product_id) VALUES 
                ('" . $file_name . "','" . $product_id . "')");

                } else {
                    echo ("Inavid image type.");
                }

            }
        }

        echo ("success");

    } else {
        echo ("Add Atleast 1 Image of the Product");
    }

}
?>