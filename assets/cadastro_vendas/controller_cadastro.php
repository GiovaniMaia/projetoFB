<?php

    // conectando o banco
    
    require_once('../login/geral_class.php');  //puxando dados de conexão da geral_class
   
    // declarando array metodo POST para coletar os dados do form HTML,
    // para testar as array basta fazer um print_R($_POST); 

    $nome = $_POST['nome'];
    $animal = $_POST['animal'];
    $lote = $_POST['lote'];
    $telefone = $_POST['telefone'];
    $parcela = $_POST['numeroParcela'];
    $valor = $_POST['valorVenda'];
    $comissao = $_POST['comissao'];
    $desconto = $_POST['desconto'];
    $valorFinal = $_POST['valorFinalVenda'];
    $sinal = $_POST['sinal'];
    $saldoDevedor = $_POST['saldoDevedor'];
    $valorRecebido = $_POST['valorRecebido'];
    
      // verificando conexão 
      if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
      }

      // inserindo dados no banco
      $sql = "INSERT INTO comprador (nome_comprador, telefone) 
      VALUES ('$nome', '$telefone')";
      $conexao->query($sql);
      $id_comprador = $conexao->insert_id; // armazenado o id do comprador

      $sql = "INSERT INTO animal (nome_animal, numero_lote) 
      VALUES ('$animal', '$lote')";
      $conexao->query($sql);
      $id_animal = $conexao->insert_id; // armazenado o id do animal
      
      $sql = "INSERT INTO venda (id_comprador, id_animal, valor_venda, comissao, desconto, valor_final, sinal, saldo_devedor, valor_recebido) 
      VALUES ('$id_comprador', '$id_animal', '$valor', '$comissao', '$desconto', '$valorFinal', '$sinal', '$saldoDevedor', '$valorRecebido')";
      $conexao->query($sql);
      $id_venda = $conexao->insert_id; // armazenado o id do venda e inserido id animal e comprador

      $sql = "INSERT INTO parcelas (id_venda, numero_parcela, valor_parcela) 
      VALUES ('$id_venda', '$parcela', '$valor')";  // inserido id venda 
      $conexao->query($sql); 

      $conexao->close();  
      
      // conexão ok
      echo "Dados inseridos com sucesso!";
      //print_r($_POST);
    
?>
