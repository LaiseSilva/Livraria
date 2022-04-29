<?php

/***************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de Usuários dentro do banco
 * Autor: Laise
 * Data: 25/04/2022
 * Versão: 1.0
 ****************************************************************************/

//Importe das configurações do banco
require_once('conexaoMysql.php');


//Função para inserir um usuário no banco
function insertUsuario($dadosUsuarios)
{
   //Váriavel para retorno da função
   $statusResposta = (bool) false;

   //abre a conexão com banco
   $conexao = conexaoMysql();

   //script para enviar para o banco
   $sql = "insert into tblusuarios(nome,
                         email,
                         senha,
                         foto)
                     values(
                     '" . $dadosUsuarios['nome'] . "',
                      '" . $dadosUsuarios['email'] . "',
                      '" . $dadosUsuarios['senha'] . "',
                      '" . $dadosUsuarios['foto'] . "');";

   //Verifica se o script está correto e executa no banco
   if (mysqli_query($conexao, $sql)) {
      //valida se teve sucesso no script
      if (mysqli_affected_rows($conexao))
         $statusResposta = true;
   }

   //fecha a conexão com o banco
   fecharConexaoMysql($conexao);
   return $statusResposta;
}

//Função para puxar todos os usuários do banco
function selectAllUsuarios()
{
   //Abre a conexao com o bd
   $conexao = conexaoMysql();

   //script para enviar para o banco
   $sql = 'select * from tblusuarios order by idusuario desc';

   //executa o script no banco
   $resultado = mysqli_query($conexao, $sql);

   //valida se retornou algo do banco
   if ($resultado) {
      $cont = 0;

      //conversão dos dados do banco em um array manipulável no banco em while, pois está pegando todos os dados
      while ($rsDados = mysqli_fetch_assoc($resultado)) {
         //montando o array
         $arrayDados[$cont] = array(
            'id'    => $rsDados['idusuario'],
            'nome'  => $rsDados['nome'],
            'email' => $rsDados['email'],
            'senha' => $rsDados['senha'],
            'foto' => $rsDados['foto']
         );

         $cont++;
      }

      //fecha a conexão com o banco
      fecharConexaoMysql($conexao);
      //retorna o array
      return $arrayDados;
   }
}

//Função para deletar um usário
function deleteUsuario($id)
{
   //Váriavel para retorno da função
   $statusResposta = (bool) false;

   //abre a conexão com banco
   $conexao = conexaoMysql();

   //script para enviar para o banco
   $sql = "delete from tblusuarios where idusuario=" . $id;

   //Verifica se o script está correto e executa no banco
   if (mysqli_query($conexao, $sql)) {
      //valida se teve sucesso no script
      if (mysqli_affected_rows($conexao))
         $statusResposta = true;
   }

   //fecha a conexão com o banco
   fecharConexaoMysql($conexao);
   return $statusResposta;
}

//Função para pegar somente um usuário
function selectByIdUsuario($id)
{
   //Abre a conexão com o banco
   $conexao = conexaoMysql();

   //script para enviar para o banco
   $sql = 'select * from tblusuarios where idusuario =' . $id;

   //executa o script no banco
   $resultado = mysqli_query($conexao, $sql);

   //valida se retornou algo do banco
   if ($resultado) {

      //conversão dos dados do banco em um array manipulável no banco
      if ($rsDados = mysqli_fetch_assoc($resultado)) {

         //montando o array
         $arrayDados = array(
            'id'    => $rsDados['idusuario'],
            'nome'  => $rsDados['nome'],
            'email' => $rsDados['email'],
            'senha' => $rsDados['senha'],
            'foto' => $rsDados['foto']
         );
      }

      //fecha a conexão com o banco
      fecharConexaoMysql($conexao);

      //retorna o array
      return $arrayDados;
   }
}

//Função para realizar a atualização de um usuário no banco
function uptadeUsuario($dadosUsuarios)
{
   //Váriavel para retorno da função
   $statusResposta = (bool) false;

   //Abre a conexão com o banco
   $conexao = conexaoMysql();

   //script para enviar para o banco
   $sql = "update tblusuarios set 
               nome  = '" . $dadosUsuarios['nome'] . "',
               email = '" . $dadosUsuarios['email'] . "',
               senha = '" . $dadosUsuarios['senha'] . "'
            where idusuario=" . $dadosUsuarios['id'];

   //Verifica se o script está correto e executa no banco
   if (mysqli_query($conexao, $sql)) {

      //valida se teve sucesso no script
      if (mysqli_affected_rows($conexao))
         $statusResposta = true;
   }

   //fecha a conexão com o banco
   fecharConexaoMysql($conexao);

   return $statusResposta;
}
