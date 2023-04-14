<?php
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADASTRO DE VENDAS</title>
</head>
<body>
    <form action="controller_cadastro.php" method="post">
        <label for="nome">COMPRADOR</label>
        <input type="text" id="nome" name="nome"><br><br>

        <label for="animal">ANIMAL</label>
        <input type="text" id="animal" name="animal"><br><br>

        <label for="lote">NUMERO DO LOTE</label>
        <input type="text" id="lote" name="lote"><br><br>

        <label for="telefone">TELEFONE</label>
        <input type="tel" id="telefone" name="telefone"><br><br>

        <label for="numeroParcela">NUMERO DE PARCELAS</label>
        <input type="number" name="numParcelas" id="numParcelas" min="1" max="36" required><br><br>

        <label for="valorVenda">VALOR DA VENDA</label>
        <input type="text" id="valorvenda" name="valorvenda"><br><br>

        <label for="comissao">COMISSÃO</label>
        <input type="text" id="comissao" name="comissao"><br><br>

        <label for="desconto">DESCONTO</label>
        <input type="text" id="desconto" name="desconto"><br><br>

        <label for="valorFinalVenda">VALOR FINAL DA VENDA</label>
        <input type="text" id="vlrfinal" name="vlrfinal"><br><br>

        <label for="sinal">SINAL</label>
        <input type="text" id="sinal" name="sinal"><br><br>

        <label for="saldoDevedor">SALDO DEVEDOR</label>
        <input type="text" id="saldodevedor" name="saldodevedor"><br><br>

        <label for="valorRecebido">VALOR RECEBIDO</label>
        <input type="text" id="valorrecebido" name="valorrecebido"><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>