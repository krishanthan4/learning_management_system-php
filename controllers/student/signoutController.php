<?php

session_start();

if(isset($_SESSION["student_lms"])){

    $_SESSION["student_lms"] = null;
    session_destroy();

    echo ("success");

}

?>