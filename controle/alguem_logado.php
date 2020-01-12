<?php
    session_start();
    if(isset($_SESSION["usuario"]) == FALSE){
        header("location: ../index.php");
    }