<?php

    // conectando o banco
    
    require_once('../login/geral_class.php');
    
    // coletando dados do fomulario

    $nome = $_POST['nome'];
    $animal = $_POST['animal'];
    $lote = $_POST['lote'];
    $telefone = $_POST['telefone'];
    $numParcela = $_POST['numeroParcela'];
    $valorVenda = $_POST['valorVenda'];
    $comissao = $_POST['comissao'];
    $desconto = $_POST['desconto'];
    $valorFinalVenda = $_POST['valorFinalVenda'];
    $sinal = $_POST['sinal'];
    $saldoDevedor = $_POST['saldoDevedor'];
    $valorRecebido = $_POST['valorRecebido'];

    // verificando conexão 
    if ($conexao->connect_error) {
      die("Conexão falhou: " . $conexao->connect_error);
    }
    // inserindo dados no banco
    $sql = "INSERT INTO comprador (nome_comprador, telefone) VALUES ('$nome', '$telefone')";
      $conexao->query($sql);
    $sql = "INSERT INTO animal (nome_animal, numero_lote) VALUES ('$animal', '$lote')";
      $conexao->query($sql);
    /*$sql = "INSERT INTO venda (valor_venda, comissao, desconto, valor_final, sinal, saldo_devedor, valor_recebido) VALUES ('$valorVenda', '$comissao', '$desconto', '$valorFinalVenda', '$sinal', '$saldoDevedor', '$valorRecebido')";
      $conexao->query($sql);
    $sql = "INSERT INTO parcelas (numero_parcela, valor_parcela) VALUES ('$numParcela', '$valorVenda')";
      $conexao->query($sql);
    */
    
    $conexao->close();

    echo "Dados inseridos com sucesso!";
    // testando se os dados foram inseridos ou não

    /*if (mysqli_query($conexao, $sql)) {
        echo "Registro adicionado com sucesso!";
      } else {
        echo "Erro ao adicionar registro: " . mysqli_error($conexao);
      }
      
      // Fechamento da conexão com o banco de dados
      mysqli_close($conexao);
      */
?>
