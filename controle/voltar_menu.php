<?php
    require_once("alguem_logado.php");
    if($_SESSION["acesso"] == "admin"){
        header("location: ../telas/menu_admin.php");
    }
    else{
        header("location: ../telas/menu_vendedor.php");
    }