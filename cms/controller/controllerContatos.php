<?php

/**************************************************************
 * Objetivo: Arquivo que irá manipular os dados de contato
 * Autor: Laise
 * Data: 07/04/2022
 * Versão: 1.0
***************************************************************/

//Importe do arquivo de configurações do projeto
require_once('modulo/config.php');

 function listarContatos()
 {
    require_once('model/bd/contatos.php');
    
    $dados = selectAllContatos();

      if(!empty($dados))
        return $dados;
      else
        return false;
 }

 function excluirContato($id)
 {
      if(!empty($id) && $id != 0 && is_numeric($id)){
         require_once('model/bd/contatos.php');

         if(deleteContato($id))
            return true;
         else
            return ERRO_EXCLUIR_BANCO;
      }
      else
         return ERRO_EXCLUIR_ID_INVALIDO;
 }
