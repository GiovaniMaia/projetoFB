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

// definir o fuso horário padrão
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view_cadastro.css">
    
    <title>CADASTRO DE VENDAS</title>
</head>
<body>
    <form action="controller_cadastro.php" method="POST">
        <label for="nome">COMPRADOR</label><br>
            <input type="text" id="nome" name="nome"><br><br>

        <label for="animal">ANIMAL</label><br>
            <input type="text" id="animal" name="animal"><br><br>

        <label for="lote">NUMERO DO LOTE</label><br>
            <input type="text" id="lote" name="lote"><br><br>

        <label for="telefone">TELEFONE</label><br>
            <input type="tel" id="telefone" name="telefone"><br><br>

        <label for="lote">NUMERO NOTA FISCAL</label><br>
            <input type="text" id="notaFiscal" name="notaFiscal"><br><br>
            
        <label for="">PARCELAS</label><br>
            <input type="text" name="numeroParcela" size="" placeholder="R$ 0,00" required="required"><br><br>

        <label for="">VALOR DA VENDA</label><br>
            <input type="text" name="valorVenda" size="" placeholder="R$ 0,00" required="required"><br><br>

        <label for="comissao">COMISSÃO</label><br>
            <input type="text" id="comissao" name="comissao" placeholder="R$ 0,00" required><br><br>

        <label for="desconto">DESCONTO</label><br>
            <input type="text" id="desconto" name="desconto" placeholder="R$ 0,00" required><br><br>

        <!--<label for="valorFinalVenda">VALOR FINAL DA VENDA</label><br>
            <input type="text" id="valorFinalVenda" name="valorFinalVenda" placeholder="R$ 0,00" required><br><br> -->

        <label for="sinal">SINAL</label><br>
            <input type="text" id="sinal" name="sinal" placeholder="R$ 0,00"><br><br>

        <!--<label for="saldoDevedor">SALDO DEVEDOR</label><br>
            <input type="text" id="saldoDevedor" name="saldoDevedor" placeholder="R$ 0,00" required><br><br>

        <label for="valorRecebido">VALOR RECEBIDO</label><br>
            <input type="text" id="valorRecebido" name="valorRecebido" placeholder="R$ 0,00" required><br><br> -->

        <input type="submit" value="Enviar">
</body>
</html>