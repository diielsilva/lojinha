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
        <link rel="stylesheet" href="../css/vendas_do_dia.css">
        <title>VENDAS DO DIA</title>
    </head>
    <body>
        <header>
            <h1>VENDAS DO DIA</h1>
        </header>
        <table border="1">
            <tr>
                <th>ID DA VENDA</th>
                <th>ID DO VENDEDOR DA VENDA</th>
                <th>DATA DA VENDA</th>
                <th>VALOR DA VENDA</th>
                <th>FORMA DE PAGAMENTO</th>
            </tr>
            <?php
                $totaldia=0;
                
                $datadia = date("Y/m/d");
                $sql = "SELECT *FROM venda WHERE datavenda='$datadia'";
                $resultado = mysqli_query($conexao,$sql);
                if(mysqli_affected_rows($conexao) > 0){
                    while($linha = mysqli_fetch_array($resultado)){
                        echo "<tr>";
                        echo "<td> ".$linha["id"]."</td>";
                        echo "<td> ".$linha["fk_vendedor"]."</td>";
                        echo "<td> ".$linha["datavenda"]."</td>";
                        echo "<td> ".$linha["valor"]."</td>";
                        echo "<td> ".$linha["formapagamento"]."</td>";
                        $totaldia+= $linha["valor"];
                        echo "</tr>";
                    }
                    
                }
                echo "<div id='total-dia'><strong>TOTAL DO DIA:</strong> ".$totaldia."</div>";
            ?>
        </table>
        <form action="../controle/voltar_menu.php" method="post">
                <input type="submit" value="VOLTAR AO MENU">
        </form>
    </body>
    </html>