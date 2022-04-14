<?php

/**************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de generos dentro do banco
 * Autor: Laise
 * Data: 08/04/2022
 * Versão: 1.0
***************************************************************************/

function inserirGenero($dadosGeneros)
{
    
    if(!empty($dadosGeneros))
    {
        if(!empty($dadosGeneros['txtNome']))
        {
            $dados = array(
                'nome' => $dadosGeneros['txtNome']
            );

            require_once('model/bd/generos.php');


            if(insertGenero($dados))
                return true;
            else
                return array('idErro'   => 2,
                             'message'  => 'Não foi possível inserir o dado no banco');
        }
    }else
        return array('idErro'  => 2,
                     'message' => 'O campo obrigatório não foi preenchido!');
}

function listarGeneros()
{
    require_once('model/bd/generos.php');

    $dados = selectAllContatos();

    if(!empty($dados))
        return $dados;
    else
        return false;
}

function excluirGenero($id)
{
    if(!empty($id) && $id != 0 && is_numeric($id))
    {
        require_once('model/bd/generos.php');

        if(deleteGenero($id))
            return true;
        else
            return array(
                'idErro'   => 1,
                'mensagem' => 'O banco de dados não pode excluir o registro'
            ); 
    }else 
        return array(
            'idErro'   => 1,
            'mensagem' => 'Não é possível excluir um registro sem um id válido'
        );
}

?>