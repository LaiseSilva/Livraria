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
function inserirProduto($dadosProdutos, $file)
{


    //Caso não venha nenhuma foto
    $nomeFoto = (string) null;

    //Verificação para objeto vazio
    if (!empty($dadosProdutos)) {

        //Validação de campos obrigatórios
        if (
            !empty($dadosProdutos['nome']) && !empty($dadosProdutos['valor'])
            && !empty($dadosProdutos['destaque']) && !empty($dadosProdutos['sinopse'])
        ) {
            //Verificação de chegada de algum arquivo
            if ($file['imagem']['nome'] != null) {
                require_once('modulo/upload');

                $nomeFoto = uploadFile($file['imagem']);

                if (is_array($nomeFoto)) {
                    return $nomeFoto;
                }
            }

            $arrayDados = array(
                "nome"     => $dadosProdutos['nome'],
                "valor"    => $dadosProdutos['valor'],
                "desconto" => $dadosProdutos['desconto'],
                "destaque" => $dadosProdutos['destaque'],
                "sinopse"  => $dadosProdutos['sinopse'],
                "foto"     => $nomeFoto
            );


            if (insertProduto($arrayDados))
                return true;
            else
                return ERRO_INSERIR_BANCO;
        } else
            return ERRO_CAMPO_OBRIGATORIO;
    } else
        return ERRO_OBEJETO_NULL;
}

function excluirProduto($arrayDados)
{
    $id = $arrayDados['id'];

    $foto = $arrayDados['foto'];

    if ($id != 0 && !empty($id) && is_numeric($id)) {
        if (deleteProduto($id)) {
            if ($foto != null) {
                if (unlink(DIRETORIO_FILE_UPLOAD . $foto))
                    return true;
                else
                    return ERRO_EXCLUIR_FOTO_DIRETORIO_SERVIDOR;
            } else
                return true;
        } else
            return ERRO_EXCLUIR_BANCO;
    } else
        return ERRO_EXCLUIR_ID_INVALIDO;
}

function listarProdutos()
{
    $dados = selectAllProdutos();

    if (!empty($dados))
        return $dados;
    else
        return false;
}

function buscarProduto($id)
{
    if ($id != 0 && !empty($id) && is_numeric($id)) {
        $dados = selectByIdProduto($id);

        if (!empty($dados))
            return $dados;
        else
            return false;
    } else
        return ERRO_BUSCAR;
}

function atualizarProduto($dadosProdutosAtualizados, $arrayDados)
{
    $statusUpload = (bool) false;

    $id = $arrayDados['id'];

    $foto = $arrayDados['foto'];

    $file = $arrayDados['files'];

    //Verificação para objeto vazio
    if (!empty($dadosProdutosAtualizados)) {

        //Validação de campos obrigatórios
        if (
            !empty($dadosProdutosAtualizados['nome']) && !empty($dadosProdutosAtualizados['valor'])
            && !empty($dadosProdutosAtualizados['destaque']) && !empty($dadosProdutosAtualizados['sinopse'])
        ) {
            if ($id != 0 && !empty($id) && is_numeric($id)) {
                //Verificação de chegada de algum arquivo
                if ($file['imagem']['nome'] != null) {
                    require_once('modulo/upload');

                    $novaFoto = uploadFile($file['imagem']);
                    $statusUpload = true;
                } else {
                    $novaFoto = $foto;
                }

                $arrayDados = array(
                    "id"       => $id,
                    "nome"     => $dadosProdutosAtualizados['nome'],
                    "valor"    => $dadosProdutosAtualizados['valor'],
                    "desconto" => $dadosProdutosAtualizados['desconto'],
                    "destaque" => $dadosProdutosAtualizados['destaque'],
                    "sinopse"  => $dadosProdutosAtualizados['sinopse'],
                    "foto"     => $novaFoto
                );

                if (uptadeProduto($arrayDados)) {

                    if ($statusUpload) {
                        unlink(DIRETORIO_FILE_UPLOAD);
                    }
                    return true;
                } else
                    return ERRO_ATUALIZAR_BANCO;
            } else
                return ERRO_ATUALIZAR_ID_INVALIDO;
        } else
            return ERRO_CAMPO_OBRIGATORIO;
    } else
        return ERRO_OBEJETO_NULL;
}
