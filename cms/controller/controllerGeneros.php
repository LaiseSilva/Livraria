<?php

/**************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de generos
 * Autor: Laise
 * Data: 08/04/2022
 * Versão: 1.0
 ***************************************************************************/

//Importe do arquivo de configuraçõs do projeto
require_once('modulo/config.php');

function inserirGenero($dadosGeneros)
{
    if (!empty($dadosGeneros)) {
        if (!empty($dadosGeneros['txtNome'])) {
            $dados = array(
                'nome' => $dadosGeneros['txtNome']
            );

            require_once('model/bd/generos.php');


            if (insertGenero($dados))
                return true;
            else
                return ERRO_INSERIR_BANCO;
        } else
            return ERRO_CAMPO_OBRIGATORIO;
    } else
        return ERRO_OBEJETO_NULL;
}

function listarGeneros()
{
    require_once('model/bd/generos.php');

    $dados = selectAllGeneros();

    if (!empty($dados))
        return $dados;
    else
        return false;
}

function excluirGenero($id)
{
    if (!empty($id) && $id != 0 && is_numeric($id)) {
        require_once('model/bd/generos.php');

        if (deleteGenero($id))
            return true;
        else
            return ERRO_EXCLUIR_BANCO;
    } else
        return ERRO_EXCLUIR_ID_INVALIDO;
}

function atualizarGenero($dadosGeneros, $id)
{
    if (!empty($dadosGeneros)) {
        if (!empty($dadosGeneros['txtNome'])) {
            if (!empty($id) && is_numeric($id) && $id != 0) {
                $dados = array(
                    'id'   => $id,
                    'nome' => $dadosGeneros['txtNome']
                );

                require_once('model/bd/generos.php');

                if (uptadeGenero($dados))
                    return true;
                else
                    return ERRO_ATUALIZAR_BANCO;
            } else
                return ERRO_ATUALIZAR_ID_INVALIDO;
        } else
            return ERRO_CAMPO_OBRIGATORIO;
    } else
        return ERRO_OBEJETO_NULL;
}

function buscarGenero($id)
{
    if ($id != 0 && !empty($id) && is_numeric($id)) {
        require_once('model/bd/generos.php');

        $dados = selectByIdGenero($id);

        if (!empty($dados))
            return $dados;
        else
            return false;
    } else
        return ERRO_BUSCAR;
}
