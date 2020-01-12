<?php
    require_once("../controle/alguem_logado.php");
    require_once("../banco/conexao.php");

    $id = $_POST["id-produto"];
    $qtd = $_POST["qtd-produto"];
    $valor = 0;
    $qtdestoque = 0;
    $nome = "";
    if($id == "" || $qtd == ""){
        $_SESSION["erro-add"] = "IMPOSSÍVEL ADICIONAR SEM ID OU QUANTIDADE";
        header("location: ../telas/realizar_venda.php");
    }
    else{
        $_SESSION["totalcarrinho"] = 0;
        $sql = "SELECT quantidade,valor,descricao FROM produto WHERE id=$id";
        $resultado = mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)>0){
            $coluna = mysqli_fetch_array($resultado);
            $qtdestoque = $coluna["quantidade"];
            $valor = $coluna["valor"];
            $nome = $coluna["descricao"];
            if($qtdestoque < $qtd){
                $_SESSION["erro-add"] = "IMPOSSÍVEL ADICIONAR, QUANTIDADE DO ESTOQUE INSUFICIENTE";
                header("location: ../telas/realizar_venda.php");
            }
            else{
                $_SESSION["carrinho"][] = [$id,$nome,$valor,$qtd];
                $_SESSION["prod-add"] = "PRODUTO ADICIONADO AO CARRINHO";
                for($x=0;$x<sizeof($_SESSION["carrinho"]);$x++){
                    $_SESSION["totalcarrinho"]+= ($_SESSION["carrinho"][$x][2] * $_SESSION["carrinho"][$x][3]);
                }
                header("location: ../telas/realizar_venda.php");
                //var_dump($_SESSION["totalcarrinho"]);
            }
        }
        else{
            $_SESSION["erro-add"] = "PRODUTO NÃO ENCONTRADO, TENTE NOVAMENTE";
            header("location: ../telas/realizar_venda.php");
        }
    }