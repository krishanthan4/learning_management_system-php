<?php

session_start();

if(isset($_SESSION["admin_lms"])){

    $_SESSION["admin_lms"] = null;
    session_destroy();

    echo ("success");

}

?>