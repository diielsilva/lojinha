<?php
require("../controle/alguem_logado.php");
require("../banco/conexao.php");

if (!isset($_SESSION["carrinho"])) {
    header("location: ../telas/realizar_venda.php");
} 
else{
    if (isset($_SESSION["carrinho"]) && sizeof($_SESSION["carrinho"]) == 0) {
        header("location: ../telas/erro_geral.php");
    }
    else{
        $valorcarrinho = 0;
        $idvendedor = 0;
        $idvenda = 0;
        $formapagamento = $_POST["forma-pgt"];
        $uservendedor = $_SESSION["usuario"];
        $sql = "SELECT id FROM vendedor WHERE usuario='$uservendedor'";
        $resultado = mysqli_query($conexao, $sql);
        if(mysqli_affected_rows($conexao)){
            $coluna = mysqli_fetch_array($resultado);
            $idvendedor = $coluna["id"];
            $datavenda = date("Y/m/d");
            if(isset($_SESSION["valor-final"])){
                $valorvenda = $_SESSION["valor-final"];
            }
            else{
                $valorvenda = $_SESSION["totalcarrinho"];
            }
            $sql = "INSERT INTO venda(id,fk_vendedor,datavenda,valor,formapagamento) values (null,$idvendedor,'$datavenda',$valorvenda,'$formapagamento')";
            mysqli_query($conexao, $sql);
            if(mysqli_affected_rows($conexao)>0){
                $idvenda = mysqli_insert_id($conexao);
                for ($x = 0; $x < sizeof($_SESSION["carrinho"]); $x++) {
                    $idproduto = $_SESSION["carrinho"][$x][0];
                    $qtdproduto = $_SESSION["carrinho"][$x][3];
                    $sql = "INSERT INTO item_venda(fk_venda,fk_produto,quantidade) values ($idvenda,$idproduto,$qtdproduto)";
                    mysqli_query($conexao, $sql);
                    
                    if (mysqli_affected_rows($conexao) > 0) {
                        
                        $sql = "SELECT quantidade FROM produto WHERE id=$idproduto";
                        $resultado = mysqli_query($conexao, $sql);
                        $linha = mysqli_fetch_array($resultado);
                        $qtdestoque = $linha["quantidade"];
                        $qtdatual = $qtdestoque - $qtdproduto;
                        $sql = "UPDATE produto SET quantidade=$qtdatual WHERE id=$idproduto";
                        mysqli_query($conexao, $sql);
                    
                    }
                }
                unset($_SESSION["carrinho"]);
                unset($_SESSION["totalcarrinho"]);
                if(isset($_SESSION["valor-final"])){
                    unset($_SESSION["valor-final"]);
                }
                header("location: ../telas/venda_concluida.php");
                mysqli_commit($conexao);
                mysqli_close($conexao);
            }
        }
        else{
            header("location: ../telas/erro_geral.php");
        }
    }
}
