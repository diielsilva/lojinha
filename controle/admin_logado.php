<?php
    session_start();
    if(isset($_SESSION["usuario"]) == FALSE){
        header("location: ../index.php");
    }
    if(isset($_SESSION["usuario"])==TRUE && $_SESSION["acesso"]!="admin"){
        header("location: ../index.php");
    }