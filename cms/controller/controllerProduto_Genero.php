<?php

/**************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de produtos eS generos
 * Autor: Laise
 * Data: 23/05/2022
 * Versão: 1.0
 ***************************************************************************/

//Importe do arquivo de configuraçõs do projeto
require_once('modulo/config.php');
require_once('model/bd/produto_Genero.php');

function inserirProdutoGenero($dadosProdutoGenero)
{

   if (!empty($dadosProdutoGenero)) {
      if (!empty($dadosProdutoGenero['produto']) && !empty($dadosProdutoGenero['genero'])) {
         $dados = array(
            'idproduto' => $dadosProdutoGenero['produto'],
            'idgenero' => $dadosProdutoGenero['genero']
         );

         if (insertProdutoGenero($dados))
            return true;
         else
            return ERRO_INSERIR_BANCO;
      } else
         return ERRO_CAMPO_OBRIGATORIO;
   } else
      return ERRO_OBEJETO_NULL;
}

function listarProdutoGenero()
{

   $dados = selectAllProdutoGenero();

   if (!empty($dados))
      return $dados;
   else
      return false;
}

function excluirProdutoGenero($id)
{
   if (!empty($id) && $id != 0 && is_numeric($id)) {
      if (deleteProdutoGenero($id))
         return true;
      else
         return ERRO_EXCLUIR_BANCO;
   } else
      return ERRO_EXCLUIR_ID_INVALIDO;
}

function atualizarProdutoGenero($dadosProdutoGenero, $id)
{
   if (!empty($dadosProdutoGenero)) {
      if (!empty($dadosProdutoGenero['produto']) && !empty($dadosProdutoGenero['genero'])) {
         if (!empty($id) && is_numeric($id) && $id != 0) {
            $dados = array(
               'id'   => $id,
               'idproduto' => $dadosProdutoGenero['produto'],
               'idgenero' => $dadosProdutoGenero['genero'],
            );

            if (uptadeProdutoGenero($dados))
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

function buscarProdutoGenero($id)
{
   if ($id != 0 && !empty($id) && is_numeric($id)) {
      $dados = selectByIdProdutoGenero($id);

      if (!empty($dados))
         return $dados;
      else
         return false;
   } else
      return ERRO_BUSCAR;
}
