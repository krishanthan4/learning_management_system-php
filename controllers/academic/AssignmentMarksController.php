<?php 
    require_once "../../connection.php";

if($_POST["student_email"] && $_POST["assignment_id"] && $_POST["marks"]){

$search_studentHasMarks = Database::search("SELECT * FROM `student_has_assignment` WHERE `student_email`=? AND `assignment_id`=?",[$_POST["student_email"],$_POST["assignment_id"]]);
if($search_studentHasMarks->num_rows == 1){
echo "already";
}else{
    Database::iud("INSERT INTO `student_has_assignment` (`student_email`,`assignment_id`,`marks`,`mark_sent`) VALUES (?,?,?,?)",[$_POST["student_email"],$_POST["assignment_id"],$_POST["marks"],1]);
echo "success";
}

}else if($_POST["student_email"] && $_POST["assignment_id"]){

        $search_studentHasMarks = Database::search("SELECT * FROM `student_has_assignment` WHERE `student_email`=? AND `assignment_id`=?",[$_POST["student_email"],$_POST["assignment_id"]]);
        if($search_studentHasMarks->num_rows == 1){
        $student_email_rs = $search_studentHasMarks->fetch_assoc();
        Database::iud("UPDATE `student_has_assignment` SET `mark_sent`='1' WHERE `student_email`=? AND `assignment_id`=?",[$_POST["student_email"],$_POST["assignment_id"]]);
        echo "success";
        }
}
?>