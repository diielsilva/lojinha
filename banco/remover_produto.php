<?php
    require_once("../controle/admin_logado.php");
    require_once("conexao.php");
    $id = $_POST["id-remocao"];
    $sql = "DELETE FROM produto WHERE id=$id";
    if($id == ""){
        $_SESSION["erro-remocao"] = "IMPOSSÍVEL REMOVER SEM O ID";
        header("location: ../telas/remover_produto.php");
    }
    else{
        mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)>0){
            $_SESSION["erro-remocao"] = "PRODUTO REMOVIDO COM SUCESSO";
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location: ../telas/remover_produto.php");
        }
        else{
            $_SESSION["erro-remocao"] = "ERRO AO REMOVER PRODUTO";
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location: ../telas/remover_produto.php");
        }
    }