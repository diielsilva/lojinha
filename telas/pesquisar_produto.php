<?php
    require_once("../controle/alguem_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/pesquisar_produto.css">
    <title>PESQUISAR PRODUTO</title>
</head>
<body>
    <div id="pesquisa">
        <header>
            <h1>PESQUISAR PRODUTO</h1>
        </header>
        <form action="exibe_pesquisa.php" method="post">
            <input type="text" name="descricao" placeholder="INSIRA A DESCRIÇÃO(EX O NOME)">
            <input type="submit" value="PESQUISAR">
        </form>
        <br><br>
        <?php
                if(isset($_SESSION["erro-pesquisa"])){
                    echo "<div id='result'>".$_SESSION["erro-pesquisa"]."</div>";
                    unset ($_SESSION["erro-pesquisa"]);
                }
        ?>
        <form action="../controle/voltar_menu.php" method="post">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
    </div>
</body>
</html>