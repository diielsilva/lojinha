<?php
    require_once("../controle/admin_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/editar_produto.css">
    <title>EDITAR PRODUTO</title>
</head>
<body>
    <div id="edita">
        <header>
            <h1>EDITAR PRODUTO</h1>
        </header>
        <form action="../banco/editar_produto.php" method="post">
            <input type="number" name="id-produto" placeholder="INSIRA O ID(OBRIGATÓRIO)">
            <input type="text" name="desc-produto" placeholder="INSIRA A DESCRIÇÃO">
            <input type="number" name="valor-produto" placeholder="INSIRA O VALOR" step="0.01">
            <input type="number" name="qtd-produto" placeholder="INSIRA A QUANTIDADE">
            <input type="submit" value="EDITAR">
        </form>
        <br>
        <?php
            if(isset($_SESSION["resultado1"])){
                echo "<div id='result1'>".$_SESSION["resultado1"]."</div>";
                unset($_SESSION["resultado1"]);
            }
            else if(isset($_SESSION["resultado2"])){
                echo "<div id='result2'>".$_SESSION["resultado2"]."</div>";
                unset($_SESSION["resultado2"]);
            }
        ?>
        <form action="../controle/voltar_menu.php">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
    </div>
</body>
</html>