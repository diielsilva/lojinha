<?php
    require_once("../banco/conexao.php");

    $acesso = $_POST["acesso"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    if($acesso == "admin"){
        $sql = "SELECT *FROM admin WHERE usuario='$usuario' AND senha='$senha'";
        mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)>0){
            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION["acesso"] = $acesso;
            header("location: ../telas/menu_admin.php");
            mysqli_commit($conexao);
            mysqli_close($conexao);
        }
        else{
            session_start();
            $_SESSION["erro-login"] = "USUÁRIO OU SENHA INCORRETO(A)";
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location: ../index.php");
        }

    }
    else{
        $sql = "SELECT *FROM vendedor WHERE usuario='$usuario' AND senha='$senha'";
        mysqli_query($conexao,$sql);
        if(mysqli_affected_rows($conexao)>0){
            session_start();
            $_SESSION["usuario"] = $usuario;
            $_SESSION["acesso"] = $acesso;
            header("location: ../telas/menu_vendedor.php");
            mysqli_commit($conexao);
            mysqli_close($conexao);
        }
        else{
            session_start();
            $_SESSION["erro-login"] = "USUÁRIO OU SENHA INCORRETO(A)";
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location: ../index.php");
        }
    }