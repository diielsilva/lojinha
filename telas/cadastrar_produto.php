<?php
    require_once("../controle/admin_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/cadastrar_produto.css">
    <title>CADASTRAR PRODUTO</title>
</head>

<body>
    <div id="cadastro">
        <header>
            <h1>CADASTRAR PRODUTO</h1>
        </header>
        <form action="../banco/cadastrar_produto.php" method="post">
            <input type="text" name="desc-produto" placeholder="INSIRA DESCRIÇÃO DO PRODUTO">
            <input type="number" name="valor-produto" placeholder="INSIRA O VALOR DO PRODUTO" step="0.01">
            <input type="number" name="qtd-produto" placeholder="INSIRA A QUANTIDADE DO PRODUTO">
            <input type="submit" value="CADASTRAR">
        </form>
        <?php
            if(isset($_SESSION["cadastro"])){
                echo "<div id='result'>".$_SESSION["cadastro"]."</div>";
                unset($_SESSION["cadastro"]);
            }
        ?>
        <form action="../controle/voltar_menu.php" method="post">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
    </div>
</body>

</html>