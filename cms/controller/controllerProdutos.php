<?php

/************************************************************************
 * Obejtivo: Arquivo será responsável de manipular os dados de produtos
 * Autor: Laise
 * Data: 06/05/2022
 * Versão: 1.0
*************************************************************************/

//Importe de arquivo de modelagem para manipular o BD
require_once('model/bd/produtos.php');

//Importe do arquivo de configurações do projeto
require_once('modulo/config.php');

//Função de inserir
function inserirProduto($dadosProdutos, $file){

    //Caso não venha nenhuma foto
    $nomeFoto = (string) "qualquercoisa.png";

    //Verificação para objeto vazio
    if(!empty($dadosProdutos)){

        //Validação de campos obrigatórios
        if(!empty($dadosProdutos['nome']) && !empty($dadosProdutos['valor'])
            && !empty($dadosProdutos['destaque']) && !empty($dadosProdutos['sinopse'])){

                
                /*Verificação de chegada de algum arquivo
                //if($file['imagem']['nome'] != null){
                    require_once('modulo/upload');

                    $nomeFoto = uploadFile($file['imagem']);

                    if(is_array($nomeFoto)){
                        return $nomeFoto;
                    }
                }*/

               

                $arrayDados = array(
                    "nome"     => $dadosProdutos['nome'],
                    "valor"    => $dadosProdutos['valor'],
                    "desconto" => $dadosProdutos['desconto'],
                    "destaque" => $dadosProdutos['destaque'],
                    "sinopse"  => $dadosProdutos['sinopse'],
                    "foto"     => $nomeFoto
                );

  
                if(insertProduto($arrayDados))
                    return true;
                else
                    return ERRO_INSERIR_BANCO;
        }else
            return ERRO_CAMPO_OBRIGATORIO;
    }else
        return ERRO_OBEJETO_NULL;
}

function listarUsuarios(){
    require_once('model/bd/produtos');

    $dados = selectAllContatos();

    if(!empty($dados))
        return $dados;
    else
        return false;
}