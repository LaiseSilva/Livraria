<?php

/***********************************************************************
 * Obejetivo: Arquivo que irá manipular os dados de produtos no banco
 * Autor: Laise
 * Data: 06/05/2022
 * Versão: 1.0
 ***********************************************************************/
 
 require_once('conexaoMysql.php');

 function insertProduto($dadosProdutos)
 {
    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $script = "insert into tblProdutos(nome,
                                valor, 
                                percentualdesconto,
                                destaque,
                                descricao,
                                foto)
                            values
                            ('".$dadosProdutos['nome']."',
                             '".$dadosProdutos['valor']."',
                             '".$dadosProdutos['percentualdesconto']."',
                             '".$dadosProdutos['destaque']."',
                             '".$dadosProdutos['descricao']."',
                             '".$dadosProdutos['imagem']."');";

    if(mysqli_query($conexao, $script)){
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);

    return $statusResposta;
 }

 function uptadeProduto($dadosProdutos){}

 function deleteProduto($id){}


?>