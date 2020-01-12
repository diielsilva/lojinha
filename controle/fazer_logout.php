<?php
    session_start();
    unset($_SESSION["usuario"]);
    unset($_SESSION["acesso"]);
    session_destroy();
    header("location: ../index.php");