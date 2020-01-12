<?php
    require_once("../controle/alguem_logado.php");
    if(!isset($_SESSION["carrinho"])){
        $_SESSION["carrinho"] = array();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/realizar_venda.css">
    <title>REALIZAR VENDA</title>
</head>
<body>
    <div id="venda">
        <header>
            <h1>REALIZAR VENDA</h1>
        </header>
        <form action="../controle/adicionar_item.php" method="post">
            <input type="number" name="id-produto" placeholder="INSIRA O ID DO PRODUTO">
            <input type="number" name="qtd-produto" placeholder="INSIRA A QUANTIDADE">
            <input type="submit" value="ADICIONAR AO CARRINHO">
        </form>
        <form action="../controle/zerar_carrinho.php" method="post">
            <input type="submit" value="ZERAR O CARRINHO">
        </form>
        <form action="carrinho_compra.php" method="post" target="_blank">
            <input type="submit" value="VER CARRINHO">
        </form>
        <form action="../banco/realizar_venda.php" method="post">
            <select name="forma-pgt">
                <option value="Cartao de credito">CARTÃO DE CRÉDITO</option>
                <option value="Cartao de debito">CARTÃO DE DÉBITO</option>
                <option value="Dinheiro">DINHEIRO</option>
            </select>
            <input type="submit" value="FINALIZAR VENDA">
        </form>
        <form action="../controle/dar_desconto.php" method="post">
            <h3>DESCONTO</h3>
            <input type="text" name="user-admin" placeholder="INSIRA O USUÁRIO DO ADMINISTRADOR">
            <input type="password" name="senha-admin" placeholder="INSIRA A SENHA DO ADMINISTRADOR">
            <input type="number" name="desconto" placeholder="INSIRA A PORCENTAGEM DO DESCONTO">
            <input type="submit" value="DAR DESCONTO">
        </form>
        <form action="../controle/voltar_menu.php" method="post">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
        <?php
            if(isset($_SESSION["erro-add"])){
                echo "<div id='erro-add'>".$_SESSION["erro-add"]."</div>";
                unset($_SESSION["erro-add"]);
            }
            else if(isset($_SESSION["prod-add"])){
                echo "<div id='prod-add'>".$_SESSION["prod-add"]."</div>";
                unset($_SESSION["prod-add"]);
            }
            else if(isset($_SESSION["erro-desconto"])){
                echo "<div id='erro-desconto'>".$_SESSION["erro-desconto"]."</div>";
                unset($_SESSION["erro-desconto"]);
            }
            else if(isset($_SESSION["conc-desc"])){
                echo "<div id='conc-desc'>".$_SESSION["conc-desc"]."</div>";
                unset($_SESSION["conc-desc"]);
            }
        ?>
    </div>
</body>
</html>