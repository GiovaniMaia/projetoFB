<?php

?>

<!DOCTYPE html>
<html>
<head>
  <meta lang="pt-br">
  
  <title>Login</title>
  <link rel="stylesheet" href="view_login.css">
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="testLogin.php">  <!-- usado metodo post chamando o model.php -->
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario" id="usuario"><br>
    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha"><br>
    <input type="submit" name="submit" value="Entrar">
  </form>
</body>
</html>

