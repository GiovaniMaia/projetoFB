<?php
session_start();
if(isset($_SESSION['id_usuario'])) {
    // usuário está logado, redirecionar para a página desejada
    header("Location: view.php"); // substitua "dashboard.php" pela página que deseja redirecionar
} else {
    // usuário não está logado, exibir o formulário de login
    // ...
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="model.php">  <!-- usado metodo post chamando o model.php -->
    <label for="usuario">Usuário:</label>
    <input type="text" name="usuario" id="usuario"><br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha"><br>
    <input type="submit" value="Entrar">
  </form>
</body>
</html>

