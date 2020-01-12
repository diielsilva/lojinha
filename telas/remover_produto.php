<?php
    require_once("../controle/admin_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/remover_produto.css">
    <title>REMOVER PRODUTO</title>
</head>
<body>
    <div id="remover">
        <header>
            <h1>REMOVER PRODUTO</h1>
        </header>
        <form action="../banco/remover_produto.php" method="post">
            <input type="number" name="id-remocao" placeholder="INSIRA O ID PARA REMOVER">
            <input type="submit" value="REMOVER">
        </form>
        <br><br><br>
        <?php
            if(isset($_SESSION["erro-remocao"])){
                echo "<div id='result'>".$_SESSION["erro-remocao"]."</div>";
                unset($_SESSION["erro-remocao"]);
            }
        ?>
        <form action="../controle/voltar_menu.php" method="post">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
    </div>
</body>
</html>