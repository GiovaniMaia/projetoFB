<?php

    // conectando o banco
    
    require_once('../login/geral_class.php');  //puxando dados de conexão da geral_class

    // definir o fuso horário padrão
    date_default_timezone_set('America/Sao_Paulo');
   
    // declarando array metodo POST para coletar os dados do form HTML,
    // para testar as array basta fazer um print_R($_POST); 

    $nome = $_POST['nome'];
    $animal = $_POST['animal'];
    $lote = $_POST['lote'];
    $telefone = $_POST['telefone'];
    $nota_fiscal = $_POST['notaFiscal'];
    $parcela = $_POST['numeroParcela'];
    $valor_inicial = $_POST['valorVenda'];
    $comissao = $_POST['comissao'];
    $desconto = $_POST['desconto'];
    $sinal = $_POST['sinal'];
    
    // varivel valor recebe o valor inicial menos o desconto e comissao
    $valor = $valor_inicial - $desconto - $comissao;

    //echo "O VALOR FINAL DA VENDA É:  $valor<BR><BR>";
   
        // verificando conexão 
        if ($conexao->connect_error) {
            die("Conexão falhou: " . $conexao->connect_error);
        }

        //                              inserindo dados no banco

        $sql = "INSERT INTO comprador (nome_comprador, telefone) 
        VALUES ('$nome', '$telefone')";
        $conexao->query($sql);
        $id_comprador = $conexao->insert_id; // armazenado o id do comprador

        $sql = "INSERT INTO animal (nome_animal, numero_lote) 
        VALUES ('$animal', '$lote')";
        $conexao->query($sql);
        $id_animal = $conexao->insert_id; // armazenado o id do animal
        
        $sql = "INSERT INTO venda (id_comprador, id_animal, valor_venda, comissao, desconto, valor_final, sinal, nota_fiscal) 
        VALUES ('$id_comprador', '$id_animal', '$valor_inicial', '$comissao', '$desconto', '$valor', '$sinal', '$nota_fiscal')"; // $valor
        $conexao->query($sql);
        $id_venda = $conexao->insert_id; // armazenado o id do venda e inserindo id animal e comprador


        //                                GERANDO PARCELAS 

        $parcela = $_POST['numeroParcela'];

        // converter valor para o formato real separado pela virgula
        echo "Valor da compra com descontos e comissão: " . number_format($valor, 2, ',', '.') . "<br>";

        // imprimir a quantidade de parcelas
        echo "Quantidade de parcelas:  $parcela <br><br>";

        $valor_parcela = $valor / $parcela;

        // variavel para controlar o while
        $controle = 1;

        // soma total das parcelas
        $soma_valor_parcela = 0; // variavel padrao 0

        // recuperar data atual
        $data_atual = new DateTime();
        //var_dump($data_atual);

        // laço de repetição para o valor das parcelas
        while($controle <= $parcela) {

            //$id_venda = $conexao->insert_id;

            // somar um mês na data
            $data_atual->add(new DateInterval("P1M"));

            // acessa o if quando é ultima parcela para corrigir o valor da compra
            if($controle == $parcela) {
            
                // ulilizar a soma das parcelas já impressa e subtrair do valor total da compra para obeter o 
                // valor a ultima parcela e corrigir a diferença
                $valor_ultima_parcela = $valor - $soma_valor_parcela;

                // converter o valor da parcela para o formato real separado pela virgula
                echo "Valor da parcela" . number_format($valor_ultima_parcela, 2, ',', '.') . "<br>";

                // somar o valor das parcela
                $soma_valor_parcela += number_format($valor_ultima_parcela, 2, '.', '');
                
                // valor final da parcela
                $valor_final_parcela = $valor_ultima_parcela;

                // caso if para inserção de dados na tabela
                $sql = "INSERT INTO parcelas (id_venda, numero_parcela, valor_parcela, data_vencimento) 
                VALUES ('$id_venda', '$controle', '$valor_final_parcela', '".$data_atual->format('Y-m-d')."')";  // inserido id venda 
                $conexao->query($sql); 
                

            } else {

                //$id_venda = $conexao->insert_id;

                // converter o valor da parcela para o formato real separado pela virgula
                echo "Valor da parcela" . number_format($valor_parcela, 2, ',', '.') . "<br>";

                // somar o valor das parcela
                $soma_valor_parcela += number_format($valor_parcela, 2, '.', '');

                // valor final da parcela
                $valor_final_parcela = $valor_parcela;

                // caso else para inserção da tabela parcelas
                $sql = "INSERT INTO parcelas (id_venda, numero_parcela, valor_parcela, data_vencimento) 
                VALUES ('$id_venda', '$controle', '$valor_final_parcela', '".$data_atual->format('Y-m-d')."')";  // inserido id venda 
                $conexao->query($sql); 
                
            }

            //var_dump($data_atual);

            // converter a data para o formato brasileiro
            echo "Data de vencimento: " . $data_atual->format('Y-m-d') . "<br><br>";

            //echo "Valor da parcela" . number_format($valor_parcela, 2, ',', '.') . "<br>";

            // incrementar a variavel após imprimir a parcela
            $controle++;

        }
        // fechando conexão com o banco
        $conexao->close();
        
        // imprimir valor total da soma das parcelas e converter para formato real separado pela virgula
        echo "<br> Valor total parcelado: " . number_format($soma_valor_parcela, 2, ',', '.') . "<br>"; 

        // conexão ok
        //echo "Dados inseridos com sucesso!" . "<br><br>";
        //print_r($_POST);
        echo "Valor da ultima parcela: " . number_format($valor_final_parcela, 2, ',', '.') . "<br>";
       
?>