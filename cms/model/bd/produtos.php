<?php

/***********************************************************************
 * Obejetivo: Arquivo que irá manipular os dados de produtos no banco
 * Autor: Laise
 * Data: 06/05/2022
 * Versão: 1.0
 ***********************************************************************/

//Importe das configurações do banco
require_once('conexaoMysql.php');

//Função de inserir no banco
function insertProduto($dadosProdutos)
{

    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $script = "insert into tblprodutos(nome,
                                valor, 
                                desconto,
                                destaque,
                                sinopse,
                                foto)
                            value
                            ('" . $dadosProdutos['nome'] . "',
                             '" . $dadosProdutos['valor'] . "',
                             '" . $dadosProdutos['desconto'] . "',
                             " . $dadosProdutos['destaque'] . ",
                             '" . $dadosProdutos['sinopse'] . "',
                             '" . $dadosProdutos['foto'] . "');";
    if (mysqli_query($conexao, $script)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);

    return $statusResposta;
}

//Função para pegar todos os produtos
function selectAllProdutos()
{
    //Abre a conexão com o banco
    $conexao = conexaoMysql();

    $script = "select * from tblprodutos order by idproduto desc";

    $result =  mysqli_query($conexao, $script);

    if ($result) {
        $cont = 0;

        while ($rsDados = mysqli_fetch_assoc($result)) {

            $arrayDados[$cont] = array(
                'id'       => $rsDados['idproduto'],
                'nome'     => $rsDados['nome'],
                'valor'    => $rsDados['valor'],
                'desconto' => $rsDados['desconto'],
                'destaque' => $rsDados['destaque'],
                'sinopse'  => $rsDados['sinopse'],
                'foto'     => $rsDados['foto']
            );

            $cont++;
        }
    }

    fecharConexaoMysql($conexao);

    if (isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

//Função para deletar um produto
function deleteProduto($id)
{
    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $script = "delete from tblprodutos where idproduto=" . $id;

    if (mysqli_query($conexao, $script)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);
    return $statusResposta;
}

function selectByIdProduto($id)
{
    $conexao = conexaoMysql();

    $script = "select * from tblprodutos where idproduto=" . $id;

    $result = mysqli_query($conexao, $script);

    if ($result) {
        if ($rsDados = mysqli_fetch_assoc($result)) {
            $arrayDados = array(
                'id'       => $rsDados['idproduto'],
                'nome'     => $rsDados['nome'],
                'valor'    => $rsDados['valor'],
                'desconto' => $rsDados['desconto'],
                'destaque' => $rsDados['destaque'],
                'sinopse'  => $rsDados['sinopse'],
                'foto'     => $rsDados['foto']
            );
        }

        fecharConexaoMysql($conexao);
        return $arrayDados;
    }
}

function uptadeProduto($dadosProdutos)
{

    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $script = "update tblprodutos set
                          nome      = '" . $dadosProdutos['nome'] . "',
                          valor     = '" . $dadosProdutos['valor'] . "',
                          desconto  = '" . $dadosProdutos['desconto'] . "',
                          destaque  =  " . $dadosProdutos['destaque'] . ",
                          sinopse   =  '" . $dadosProdutos['sinopse'] . "',
                          foto      =   '" . $dadosProdutos['foto'] . "'
                 where idproduto=" . $dadosProdutos['id'];



    if (mysqli_query($conexao, $script)) {
        if (mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);

    return $statusResposta;
}
