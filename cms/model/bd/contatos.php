<?php

/***************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de contatos dentro do banco
 * Autor: Laise
 * Data: 07/04/2022
 * Versão: 1.0
 ****************************************************************************/

//pegando arquivo que estabelece a conexão com Banco
require_once('conexaoMysql.php');

function selectAllContatos()
{
    $conexao = conexaoMysql();

    //Script que irá ser usado no banco
    $sql = "select * from tblcontatos order by idcontato desc";

    //Indo no banco e guardando o resultado dentro da váriavel
    $result = mysqli_query($conexao, $sql);

    //Verificando se existe alguma coisa dentro do banco
    if ($result) {

        $cont = 0;

        //Percorrendo o array e criando um outro a partir do leitura dele
        while ($rsDados =  mysqli_fetch_assoc($result)) {
            $arrayDados[$cont] = array(
                'id'        => $rsDados['idcontato'],
                'nome'      => $rsDados['nome'],
                'email'     => $rsDados['email'],
                'assunto'   => $rsDados['assunto'],
                'mensagem'  => $rsDados['mensagem']
            );

            $cont++;
        }
        fecharConexaoMysql($conexao);
        return $arrayDados;
    }
}

function deleteContato($id)
{

    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $sql = "delete from tblcontatos where id=" . $id;

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);
    return $statusResposta;
}
