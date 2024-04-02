<?php 
require_once "../connection.php";

if(isset($_POST["admin_id"])){
    $admin_id =$_POST["admin_id"] ;
try {
    $deleteAdmin = Database::search("DELETE FROM `administrators` WHERE `id`='".$admin_id."'");
    echo "success";

} catch (\Throwable $th) {
echo "error";
}
}


