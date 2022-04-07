<?php

/**************************************************************
 * Objetivo: Arquivo que irá manipular os dados de contato
 * Autor: Laise
 * Data: 07/04/2022
 * Versão: 1.0
***************************************************************/

 function listarContatos()
 {
    require_once('model/bd/contatos.php');
    
    $dados = selectAllContatos();

      if(!empty($dados))
        return $dados;
      else
        return $false;
 }

 function excluirContato($id)
 {
      if(!empty($id) && $id != 0 && is_numeric($id)){
         require_once('model/bd/contatos.php');

         if(deleteContato($id))
            return true;
         else
            return array (
               'idErro'   => 1,
               'mensagem' => 'O banco de dados não pode excluir o registro'
            );
      }
      else
         return array(
            'idErro'   => 1,
            'mensagem' => 'Não é possível excluir um registro sem um id válido'
         );
 }

?>