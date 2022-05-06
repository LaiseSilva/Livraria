<?php

/************************************************************************
 * Obejtivo: Arquivo será responsável de manipular os dados de produtos
 * Autor: Laise
 * Data: 06/05/2022
 * Versão: 1.0
*************************************************************************/

require_once('model/bd/produtos.php');

function inserirProduto($dadosProdutos){

    $nomeFoto = (string) null;

    if(!empty($dadosProdutos)){
        if(!empty($dadosProdutos['nome']) && !empty($dadosProdutos['valor']) && !empty($dadosProdutos['desconto']) 
            && !empty($dadosProdutos['destaque']) && !empty($dadosProdutos['descricao'])){}
    }
}




?>