<?php
    require_once("../controle/alguem_logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/carrinho_compra.css">
    <title>CARRINHO DE COMPRA</title>
</head>
<body>
    <div>
        <header>
            <h1>GABI MAKE</h1>
            <h3>ENDEREÇO RUA SEVERINO ALEXANDRE DA SILVA</h3>
            <h3></h3>
        </header>
        <?php
            if(isset($_SESSION["carrinho"])){
                $total = 0;
                for($x=0;$x<sizeof($_SESSION["carrinho"]);$x++){
                    $total += ($_SESSION["carrinho"][$x][2]*$_SESSION["carrinho"][$x][3]);
                    echo "<table>";
                    echo "<tr>";
                    echo "<td>CÓDIGO</td>";
                    echo "<td>DESCRIÇÃO</td>";
                    echo "<td>VL UN</td>";
                    echo "<td>QTDE</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$_SESSION["carrinho"][$x][0]."</td>";
                    echo "<td>".$_SESSION["carrinho"][$x][1]."</td>";
                    echo "<td>".$_SESSION["carrinho"][$x][2]."</td>";
                    echo "<td>".$_SESSION["carrinho"][$x][3]."</td>";
                    echo "</tr>";
                    echo "</table>";
                } 
                if(isset($_SESSION["valor-final"])){
                    echo "<div id='valor-final'>TOTAL DA COMPRA: R$".number_format($_SESSION["valor-final"],2,'.','')."</div>";
                }
                else{
                    echo "<div id='total'>TOTAL DA COMPRA: R$".$total."</div>"; 
                    //var_dump($_SESSION["totalcarrinho"]);
                } 
                
                
            }
            else{
                echo ("CARRINHO VAZIO");
            }
        ?>
    </div>
</body>
</html>