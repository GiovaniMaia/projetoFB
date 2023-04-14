
<!DOCTYPE html>
<html>
<head>
  <meta lang="pt-br">
  
  <title>Login</title>
  <link rel="stylesheet" href="view_login.css">
  <!--<link src="/js/script.js" defer></script> -->
</head>
<body>
  <h1>Login</h1>
  <form method="POST" action="testLogin.php" id="form"> <!-- usado metodo post chamando o model.php --> 
    
    <input type="text" name="usuario" id="usuario" placeholder="Usuário">
    <input type="password" name="senha" id="senha" placeholder="Senha">
    <span id="msg"></span>
    <input type="submit" name="submit" value="Entrar">
  </form>
</body>
</html>

