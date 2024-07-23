<?php

session_start();

if(isset($_SESSION["academic_lms"])){

    $_SESSION["academic_lms"] = null;
    session_destroy();

    echo ("success");

}

?>