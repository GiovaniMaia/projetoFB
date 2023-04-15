<?php
session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
        // ACESSAR O SISTEMA
        include_once('geral_class.php');
        $usuario = $_POST['usuario']; // armazenando usuario na variavel $usuario
        $senha = $_POST['senha']; // armazenando senha na variavel $senha

         //print_r('Usuario: ' . $usuario);
         // print_r('<br>');
         //print_r('Senha: ' . $senha); 
        
        
        // VERIFICANDO NO BANCO SE EXISTE USUARIO E SENHA
        $sql ="SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
        // EXECUTANDO QUERY PARA CONSULTAR A $SQL ACIMA
        $result = $conexao->query($sql);

        print_r($sql);
        print_r($result); 
        
        // VERIFICAR SE USUARIO E SENHA ESTÃO INCORRETOS AO FAZER LOGIN
        if(mysqli_num_rows($result) <1) { // se resultado <1 quer dizer que não foi encontrado usuario e senha no banco
            unset($_SESSION['usuario']); // unset remove a variavel da sessão usuario e senha e redireciona para pagina de login
            unset($_SESSION['senha']);
            header('Location: view.php');
        }
        else {
            $_SESSION['usuario'] = $usuario; // caso encontrado valor a variavel sessão usara o header location
            $_SESSION['senha'] = $senha; // para te mandar para a proxima pagina
            //header('Location: ../interface/view.php');
            header('Location: ../interface/view.php');
        }
    }
    else 
    {
        // NÃO ACESSA
        header('Location: view.php');  // caso variavel sessão não existir te manda para pagina de login
        //echo "Usuário ou senha inválidos.";
        
        
    }
?>