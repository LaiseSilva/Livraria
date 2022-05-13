<?php

/**************************************************************
 * Objetivo: Arquivo que irá manipular os dados de Usuários
 * Autor: Laise
 * Data: 25/04/2022
 * Versão: 1.0
 ***************************************************************/

//Importe do arquivo de configurações do projeto
require_once('modulo/config.php');

function inserirUsuario($dadosUsuario, $file)
{
   if (!empty($dadosUsuario)) {
      if (!empty($dadosUsuario['nome']) && !empty($dadosUsuario['email']) && !empty($dadosUsuario['senha'])) {
         $arrayDados = array(
            "nome"  => $dadosUsuario['nome'],
            "email" => $dadosUsuario['email'],
            "senha" => $dadosUsuario['senha'],
            "foto"  => null
         );

         require_once('model/bd/usuarios.php');

         if (insertUsuario($arrayDados))
            return true;
         else
            return array(
               'idErro'   => 2,
               'message'  => 'Não foi possível inserir o dado no banco'
            );
      } else
         return array(
            'idErro'  => 2,
            'message' => 'O campo obrigatório não foi preenchido!'
         );
   }
}

function listarUsuarios()
{
   require_once('model/bd/usuarios.php');

   $dados = selectAllUsuarios();

   if (!empty($dados))
      return $dados;
   else
      return false;
}


function excluirUsuario($id)
{
   if (!empty($id) && is_numeric($id) && $id != 0) {
      require_once('model/bd/usuarios.php');

      if (deleteUsuario($id))
         return true;
      else
         return ERRO_EXCLUIR_BANCO;
   } else
      return ERRO_EXCLUIR_ID_INVALIDO;
}

function buscarUsuario($id)
{
   if (is_numeric($id) && $id != 0 && !empty($id)) {
      require_once('model/bd/usuarios.php');

      $dados = selectByIdUsuario($id);

      if (!empty($dados))
         return $dados;
      else
         return ERRO_BUSCAR;
   }
}

function atualizarUsuario($dadosUsuario, $id)
{
   if (!empty($dadosUsuario)) {
      if (!empty($dadosUsuario['nome']) && !empty($dadosUsuario['email']) && !empty($dadosUsuario['senha'])) {

         if (!empty($id) && is_numeric($id) && $id != 0) {


            $arrayDados = array(
               'id'    => $id,
               "nome"  => $dadosUsuario['nome'],
               "email" => $dadosUsuario['email'],
               "senha" => $dadosUsuario['senha']
            );

            require_once('model/bd/usuarios.php');

            if (uptadeUsuario($arrayDados))
               return true;
            else
               return ERRO_ATUALIZAR_BANCO;
         } else
            return ERRO_ATUALIZAR_ID_INVALIDO;
      } else
         return ERRO_CAMPO_OBRIGATORIO;
   } else
      return ERRO_NENHUM_CAMPO_PREENCHIDO;
}

//OBS:verificar o id, esqueci
