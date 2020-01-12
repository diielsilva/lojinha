<?php
    require_once("../controle/alguem_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/menu_vendedor.css">
    <title>MENU VENDEDOR</title>
</head>
<body>
    <div id="vendedor">
        <header>
            <h1>MENU DO VENDEDOR</h1>
        </header>
        <form action="../controle/opcao_menu.php" method="post">
            <select name="opcao">
                <option value="pesquisar-produto">PESQUISAR PRODUTO</option>
                <option value="listar-produtos">LISTAR PRODUTOS(TODOS)</option>
                <option value="realizar-venda">REALIZAR VENDA</option>
                <option value="vendas-do-dia">LISTAR VENDAS DO DIA</option>
            </select>
            <input type="submit" value="CONFIRMAR">
        </form>
        <form action="../controle/fazer_logout.php" method="post">
            <input type="submit" value="SAIR">
        </form>
    </div>
</body>
</html>