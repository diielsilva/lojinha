<?php
    require_once("conexao.php");
    require_once("../controle/admin_logado.php");
    $descricao = $_POST["desc-produto"];
    $valor = $_POST["valor-produto"];
    $qtd = $_POST["qtd-produto"];
    $sql = "INSERT INTO produto VALUES (null,'$descricao',$valor,$qtd)";
   
    if($descricao == ""|| $valor == ""|| $qtd == ""){
        $_SESSION["cadastro"] = "ERRO AO CADASTRAR PRODUTO,PREENCHA TODOS OS CAMPOS";
        header("location: ../telas/cadastrar_produto.php");
    }
    else{
        mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)>0){
            $_SESSION["cadastro"] = "PRODUTO CADASTRADO COM SUCESSO";
            header("location: ../telas/cadastrar_produto.php");
            mysqli_commit($conexao);
            mysqli_close($conexao);
        }
        else{
            $_SESSION["cadastro"] = "ERRO AO CADASTRAR PRODUTO";
            header("location: ../telas/cadastrar_produto.php");
            mysqli_commit($conexao);
            mysqli_close($conexao);
        }
    }
    