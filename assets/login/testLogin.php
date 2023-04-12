<?php
session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
        // ACESSAR O SISTEMA
        include_once('config.php');
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // print_r('Usuario: ' . $usuario);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);
        
        // VERIFICANDO NO BANCO SE EXISTE USUARIO E SENHA
        $sql ="SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
        // EXECUTANDO QUERY
        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        // VERIFICAR SE USUARIO E SENHA ESTÃO INCORRETOS AO FAZER LOGIN
        if(mysqli_num_rows($result) <1) {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: view.php');
        }
        else {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: ../interface/view.php');
        }
    }
    else 
    {
        // NÃO ACESSA
        header('Location: view.php');
        // echo "Usuário ou senha inválidos.";
        
    }
?>