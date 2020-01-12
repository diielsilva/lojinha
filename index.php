<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>HOME</title>
</head>

<body>
    <div id="index">
        <header>
            <h1>INSIRA SEU LOGIN</h1>
        </header>
        <form action="controle/fazer_login.php" method="post">
            <select name="acesso">
                <option value="admin">ADMINISTRADOR</option>
                <option value="vendedor">VENDEDOR</option>
            </select>
            <input type="text" name="usuario" placeholder="INSIRA O USUÁRIO"><br>
            <input type="password" name="senha" placeholder="INSIRA A SENHA"><br>
            <input type="submit" value="ENTRAR"><br>
        </form>
        <br><br><br><br><br>
        <?php
            session_start();
            if(isset($_SESSION["erro-login"])){
                echo "<div id='erro'>".$_SESSION["erro-login"]."</div>";
                unset($_SESSION["erro-login"]);
            }
            session_destroy();
        ?>
    </div>
</body>

</html>