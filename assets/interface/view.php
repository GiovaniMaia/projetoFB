<?php
session_start();
	// print_r($_SESSION);
	// se não existir usuario e senha direcionar para login e destruir sessão com unset
	if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)) {
		
		unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
		header('Location: ../login/view.php');
		
	}
	// usuario logado com sucesso
	$logado = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página de Teste</title>
    <link rel="stylesheet" href="view_interface.css">
</head>
<body>
	<h1>Bem-vindo à página de teste!</h1>
	<a href="#">CADASTRAR CLIENTES E DIVIDENDOS</a><br><br>
	<a href="#">BUSCAR CLIENTES E DIVIDENDOS</a><br><br>
	
	<form action="logout.php">
  		<button type="submit">Deslogar</button>
	</form>
</body>
</html>

