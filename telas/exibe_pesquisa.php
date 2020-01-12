<?php
    require_once("../controle/alguem_logado.php");
    require_once("../banco/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/exibe_pesquisa.css">
    <title>EXIBIR PESQUISA</title>
</head>
<body>
    <div id="exibe">
        <header>
            <h1>EXIBIR PRODUTOS</h1>
        </header>
        <table border="1">
            <tr>
                <th>ID DO PRODUTO</th>
                <th>DESCRIÇÃO DO PRODUTO</th>
                <th>VALOR DO PRODUTO</th>
                <th>QTD DO PRODUTO</th>
            </tr>
            <?php
                $descricao = $_POST["descricao"];
                if($descricao == ""){
                    $_SESSION["erro-pesquisa"] = "INSIRA ALGUM NOME PARA PESQUISAR";
                    header("location: pesquisar_produto.php");
                }
                else{
                $sql = "SELECT *FROM PRODUTO WHERE descricao LIKE '%$descricao%' ";
                $resultado = mysqli_query($conexao,$sql);
                while($coluna = mysqli_fetch_array($resultado)){
                    echo "<tr>";
                    echo "<td>".$coluna["id"]."</td>";
                    echo "<td>".$coluna["descricao"]."</td>";
                    echo "<td>R$ ".$coluna["valor"]."</td>";
                    echo "<td>".$coluna["quantidade"]."</td>";
                    echo "</tr>";
                }
                }
                mysqli_commit($conexao);
                mysqli_close($conexao);
            ?>
        </table>
        <form action="../controle/voltar_menu.php">
            <input type="submit" value="VOLTAR AO MENU">
        </form>
    </div>
</body>
</html>