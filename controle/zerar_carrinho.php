<?php
    require_once("alguem_logado.php");
    if(isset($_SESSION["carrinho"])){
        unset($_SESSION["carrinho"]);
        unset($_SESSION["totalcarrinho"]);
        header("location: ../telas/realizar_venda.php");
        
    }
    if(isset($_SESSION["valor-final"])){
        unset($_SESSION["valor-final"]);
    }