<?php

/***************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de generos dentro do banco
 * Autor: Laise
 * Data: 08/04/2022
 * Versão: 1.0
 ****************************************************************************/

require_once('conexaoMysql.php');

//Função para puxar todos os usuários do banco
function selectAllGeneros()
{
    //Abre a conexao com o bd
    $conexao = conexaoMysql();

    //script para enviar para o banco
    $sql = "select * from tblgeneros order by idgenero desc";

    //executa o script no banco
    $result = mysqli_query($conexao, $sql);

    //valida se retornou algo do banco
    if ($result) {
        $cont = 0;

        //conversão dos dados do banco em um array manipulável no banco em while, pois está pegando todos os dados
        while ($rsDados = mysqli_fetch_assoc($result)) {
            //montando o array
            $arrayDados[$cont] = array(
                'id'     => $rsDados['idgenero'],
                'nome'   => $rsDados['nome']
            );

            $cont++;
        }

        //fecha a conexão com o banco
        fecharConexaoMysql($conexao);

        //retorna o array
        return $arrayDados;
    }
}

function deleteGenero($id)
{
    //Váriavel para retorno da função
    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $sql = "delete from tblgeneros where idgenero=" . $id;

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);
    return $statusResposta;
}

function insertGenero($dadosGenero)
{
    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $sql = "insert into tblgeneros(nome) 
                        values('" . $dadosGenero['nome'] . "')";


    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);

    return $statusResposta;
}

function uptadeGenero($dadosGeneros)
{
    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $sql = "update tblgeneros set
                    nome = '" . $dadosGeneros['nome'] . "'
                where idgenero= " . $dadosGeneros['id'];

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);
    return $statusResposta;
}

function selectByIdGenero($id)
{
    $conexao = conexaoMysql();

    $sql = "select * from tblgeneros where idgenero =" . $id;

    $result = mysqli_query($conexao, $sql);

    if ($result) {
        if ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados = array(
                "id"    => $rsDados['idgenero'],
                "nome"  => $rsDados['nome'],
            );

            fecharConexaoMysql($conexao);

            return $arrayDados;
        }
    }
}
