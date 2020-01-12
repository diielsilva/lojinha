<?php
    require_once("../controle/admin_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/menu_admin.css">
    <title>MENU ADMINISTRADOR</title>
</head>
<body>
    <div id="admin">
        <header>
            <h1>MENU DO ADMINISTRADOR</h1>
        </header>
        <form action="../controle/opcao_menu.php" method="post">
                <select name="opcao">
                <option value="cadastrar-produto">CADASTRAR PRODUTO</option>
                <option value="pesquisar-produto">PESQUISAR PRODUTO</option>
                <option value="listar-produtos">LISTAR PRODUTOS(TODOS)</option>
                <option value="editar-produto">EDITAR PRODUTO</option>
                <option value="remover-produto">REMOVER PRODUTO(SE NÃO FOI VENDIDO)</option>
            </select><br>
            <input type="submit" value="CONFIRMAR">
        </form>

        <form action="../controle/fazer_logout.php" method="post">
            <input type="submit" value="SAIR">
        </form>
    </div>
</body>
</html>