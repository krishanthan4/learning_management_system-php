<?php 
require_once "../connection.php";

if(isset($_POST["teacher_id"])){
    $teacher_id =$_POST["teacher_id"] ;
try {
    $deleteAdmin = Database::search("DELETE FROM `teacher` WHERE `teacher_id`='".$teacher_id."'");
    echo "success";

} catch (\Throwable $th) {
echo "error";
}
}


