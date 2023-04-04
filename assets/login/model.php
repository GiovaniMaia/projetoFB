<?php

// conexão com banco de dados

$servername = "localhost"; // nome do servidor do banco
$username = "root"; // nome do usuario do banco
$password = ""; // senha do usuario
$dbname = "fazendaberrante"; // nome do banco 

$conn = new mysqli($servername, $username, $password, $dbname); // criando uma conexão do banco

// checando a conexão com o banco

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// verificando se o formulario de login foi enviado

if(isset($_POST['usuario']) && isset($_POST['senha'])) {   // usado isset para saber se a variavel está definida

    // pegando os dados do formulario
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // query para buscar o usuario no banco
    $sql ="SELECT * FROM usuarios WHERE usuario='$usuario' AND senha='$senha'";
    $result = $conn->query($sql);

    // checando se a query retornou resultado
    if ($result->num_rows > 0) {
        // usuario autenticado com sucesso
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id']; // armazenando o id do usuario na sessão
        header("Location: ../interface/view.php"); // direcionar o usuario para proxima pagina
        exit();
    } else {
        // usuario não encontrado no banco
        echo "Usuário ou senha inválidos!";
    }
}

// fechando a conexão com o banco

$conn->close();
?>
