<?php
    require_once("../controle/alguem_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/erro_geral.css">
    <title>ERRO GERAL</title>
</head>
<body>
    <div id="erro">
        <header>
            <h1>DESCULPE, ALGO DEU ERRADO</h1>
        </header>
        <form action="../controle/voltar_menu.php">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
    </div>
</body>
</html>