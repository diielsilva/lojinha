<?php
    require_once("../controle/admin_logado.php");
    require_once("conexao.php");
    $idproduto = $_POST["id-produto"];
    $descproduto = $_POST["desc-produto"];
    $valor = $_POST["valor-produto"];
    $qtd = $_POST["qtd-produto"];
    
    if($idproduto == ""){
        $_SESSION["resultado1"] = "IMPOSSÍVEL EDITAR, O ID NÃO FOI INSERIDO";
        header("location: ../telas/editar_produto.php");
        mysqli_close($conexao);
    }
    else if($descproduto == "" && $valor == "" && $qtd == ""){
        $_SESSION["resultado1"] = "IMPOSSÍVEL EDITAR, INSIRA AO MENOS 1 CAMPO OPCIONAL";
        header("location: ../telas/editar_produto.php");
        mysqli_close($conexao);
    }
    else if($descproduto == "" && $valor == "" && $qtd != ""){
        $sql = "UPDATE produto SET quantidade=$qtd WHERE id=$idproduto";
    }
    else if($descproduto == "" && $valor != "" && $qtd == ""){
        $sql = "UPDATE produto SET valor=$valor WHERE id=$idproduto";
    }
    else if($descproduto == "" && $valor != "" && $qtd != ""){
        $sql = "UPDATE produto SET valor=$valor,quantidade=$qtd WHERE id=$idproduto";
    }
    else if($descproduto != "" && $valor == "" && $qtd == ""){
        $sql = "UPDATE produto SET descricao='$descproduto' WHERE id=$idproduto";
    }
    else if($descproduto != "" && $valor != "" && $qtd == ""){
        $sql = "UPDATE produto SET descricao='$descproduto',valor=$valor WHERE id=$idproduto";
    }
    else if($descproduto != "" && $valor == "" && $qtd != ""){
        $sql = "UPDATE produto SET descricao='$descproduto',quantidade=$qtd WHERE id=$idproduto";
    }
    else if($descproduto != "" && $valor != "" && $qtd != ""){
        $sql = "UPDATE produto SET descricao='$descproduto',valor=$valor,quantidade=$qtd WHERE id=$idproduto";
    }
    mysqli_query($conexao,$sql);
    if(mysqli_affected_rows($conexao) > 0){
        $_SESSION["resultado2"] = "PRODUTO EDITADO COM SUCESSO";
        header("location: ../telas/editar_produto.php");
        mysqli_commit($conexao);
        mysqli_close($conexao);
        
    }
    else{
        $_SESSION["resultado2"] = "ERRO AO EDITAR PRODUTO, TENTE NOVAMENTE";
        header("location: ../telas/editar_produto.php");
        mysqli_commit($conexao);
        mysqli_close($conexao);
        
    }