<?php 
require "../connection.php";
if(isset($_POST["teacher_id"]) AND isset($_POST["subject_id"])){
  $subject_rs=  Database::search("SELECT * FROM `teacher_has_subject` WHERE `teacher_id`='".$_POST["teacher_id"]."' AND `subject_id`='".$_POST["subject_id"]."'");
if($subject_rs->num_rows==0){
    Database::iud("INSERT INTO `teacher_has_subject` (`teacher_id`,`subject_id`) VALUES ('".$_POST["teacher_id"]."','".$_POST["subject_id"]."')");
    echo "success";
}else{
    echo "error";
}
}
?>