<?php
    require_once("../controle/alguem_logado.php");
    $opcaomenu = $_POST["opcao"];
    if($opcaomenu == "cadastrar-produto"){
        header("location: ../telas/cadastrar_produto.php");
    }
    else if($opcaomenu == "pesquisar-produto"){
        header("location: ../telas/pesquisar_produto.php");
    }
    else if($opcaomenu == "listar-produtos"){
        header("location: ../telas/listar_produtos.php");
    }
    else if($opcaomenu == "editar-produto"){
        header("location: ../telas/editar_produto.php");
    }
    else if($opcaomenu == "remover-produto"){
        header("location: ../telas/remover_produto.php");
    }
    else if($opcaomenu == "realizar-venda"){
        header("location: ../telas/realizar_venda.php");
    }
    else if($opcaomenu == "ver-carrinho"){
        header("location: ../telas/carrinho_compra.php");
    }
    else if($opcaomenu == "vendas-do-dia"){
        header("location: ../telas/vendas_do_dia.php");
    }