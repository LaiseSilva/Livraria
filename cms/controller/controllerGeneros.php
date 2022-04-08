<?php

/**************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de generos dentro do banco
 * Autor: Laise
 * Data: 08/04/2022
 * Versão: 1.0
***************************************************************************/

function listarContatos()
{
    require_once('model/bd/generos.php');

    $dados = selectAllContatos();

    if(!empty($dados))
        return $dados;
    else
        return false;
}



?>