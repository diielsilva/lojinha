<?php
    require_once("../banco/conexao.php");
    require_once("alguem_logado.php");

    $usuario = $_POST["user-admin"];
    $senha = $_POST["senha-admin"];
    $desconto = $_POST["desconto"];
    if($usuario == "" || $senha == "" || $desconto == ""){
        $_SESSION["erro-desconto"] = "INSIRA TODOS OS CAMPOS PARA DAR DESCONTO";
        header("location: ../telas/realizar_venda.php");
    }
    else{
        if(isset($_SESSION["carrinho"]) && $_SESSION["carrinho"] > 0){
            $sql = "SELECT *FROM admin WHERE usuario='$usuario' AND senha='$senha'";
            mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)>0){
            $desconto = $desconto/100;
            $valordesconto = $_SESSION["totalcarrinho"] * $desconto;
            $_SESSION["totalcarrinho"] = $_SESSION["totalcarrinho"] - $valordesconto;
            $_SESSION["valor-final"] = $_SESSION["totalcarrinho"];
            $_SESSION["conc-desc"] = "DESCONTO DADO SOBRE O VALOR TOTAL DO CARRINHO";
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location: ../telas/realizar_venda.php");
        }
        else{
            $_SESSION["erro-desconto"] = "USUÁRIO OU SENHA INCORRETO(A)";
            header("location: ../telas/realizar_venda.php");
            mysqli_commit($conexao);
            mysqli_close($conexao);
        }
        }
        else{
            $_SESSION["erro-desconto"] = "CARRINHO INEXISTENTE OU COM VALOR 0";
            header("location: ../telas/realizar_venda.php");
        }
        
    }