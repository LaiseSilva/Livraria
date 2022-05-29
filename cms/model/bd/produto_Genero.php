<?php

/***************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de produtos generos dentro do banco
 * Autor: Laise
 * Data: 23/05/2022
 * Versão: 1.0
 ****************************************************************************/

require_once('conexaoMysql.php');

//Função para puxar todos os usuários do banco
function selectAllProdutoGenero()
{
   //Abre a conexao com o bd
   $conexao = conexaoMysql();

   //script para enviar para o banco
   $script = "select * from tblproduto_genero order by idprodutogenero desc";

   //executa o script no banco
   $result = mysqli_query($conexao, $script);

   //valida se retornou algo do banco
   if ($result) {
      $cont = 0;

      //conversão dos dados do banco em um array manipulável no banco em while, pois está pegando todos os dados
      while ($rsDados = mysqli_fetch_assoc($result)) {
         //montando o array
         $arrayDados[$cont] = array(
            'id'         => $rsDados['idprodutogenero'],
            'idproduto'  => $rsDados['idproduto'],
            'idgenero'   => $rsDados['idgenero']
         );

         $cont++;
      }

      //fecha a conexão com o banco
      fecharConexaoMysql($conexao);

      //retorna o array
      return $arrayDados;
   }
}

function deleteProdutoGenero($id)
{
   //Váriavel para retorno da função
   $statusResposta = (bool) false;

   $conexao = conexaoMysql();

   $sql = "delete from tblproduto_genero where idprodutogenero=" . $id;

   if (mysqli_query($conexao, $sql)) {
      if (mysqli_affected_rows($conexao))
         $statusResposta = true;
   }

   fecharConexaoMysql($conexao);
   return $statusResposta;
}

function insertProdutoGenero($dadosProdutoGenero)
{
   $statusResposta = (bool) false;

   $conexao = conexaoMysql();

   $sql = "insert into tblproduto_genero(idproduto,idgenero) 
                        values(" . $dadosProdutoGenero['idproduto'] . ",
                               " . $dadosProdutoGenero['idgenero'] . ");";


   if (mysqli_query($conexao, $sql)) {
      if (mysqli_affected_rows($conexao))
         $statusResposta = true;
   }

   fecharConexaoMysql($conexao);

   return $statusResposta;
}

function uptadeProdutoGenero($dadosProdutoGenero)
{
   $statusResposta = (bool) false;

   $conexao = conexaoMysql();

   $sql = "update tblproduto_genero set
                    idproduto = " . $dadosProdutoGenero['idproduto'] . ",
                    idgenero = " . $dadosProdutoGenero['idgenero'] . "
                where idprodutogenero= " . $dadosProdutoGenero['id'];

   if (mysqli_query($conexao, $sql)) {
      if (mysqli_affected_rows($conexao))
         $statusResposta = true;
   }

   fecharConexaoMysql($conexao);
   return $statusResposta;
}

function selectByIdProdutoGenero($id)
{
   $conexao = conexaoMysql();

   $sql = "select * from tblproduto_genero where idprodutogenero =" . $id;

   $result = mysqli_query($conexao, $sql);

   if ($result) {
      if ($rsDados = mysqli_fetch_assoc($result)) {
         $arrayDados = array(
            "id"         => $rsDados['idprodutogenero'],
            "idproduto"  => $rsDados['idproduto'],
            "idgenero"   => $rsDados['idgenero'],
         );

         fecharConexaoMysql($conexao);

         return $arrayDados;
      }
   }
}
