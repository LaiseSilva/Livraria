<?php

/***************************************************************************
 * Objetivo: Arquivo que irá manipular os dados de generos dentro do banco
 * Autor: Laise
 * Data: 08/04/2022
 * Versão: 1.0
****************************************************************************/

require_once('conexaoMysql.php');

function selectAllContatos()
{
    $conexao = conexaoMysql();

    $sql = "select * from tblgeneros order by idgenero desc";
    
    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont = 0;
        
        while($rsDados = mysqli_fetch_assoc($result))
        {
            $arrayDados[$cont] = array(
                'id'     => $rsDados['idgenero'],
                'nome'   => $rsDados['nome']  
            );

            $cont++;
        }

        fecharConexaoMysql($conexao);
        
        return $arrayDados;
    }
    

}

function deleteGenero($id)
{
    $statusResposta = (bool) false;

    $conexao = conexaoMysql();

    $sql = "delete from tblgeneros where idgenero=".$id;

    if(mysqli_query($conexao,$sql)){
        if(mysqli_affected_rows($conexao))
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
                        values('".$dadosGenero['nome']."')";
    

    if(mysqli_query($conexao,$sql))
    {
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);

    return $statusResposta;
}

function uptadeGenero($dadosGeneros)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "uptade tblgeneros set
                    nome = '".$dadosGeneros['nome']."'
                where idgenero=".$dadosGeneros['id'];

    if(mysqli_query($conexao, $sql))
    {
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    fecharConexaoMysql($conexao);
    return $statusResposta;
}

function selectByIdGenero($id)
{
    $conexao = conexaoMysql();

    $sql = "select * from tblgeneros where idgenero =".$id;

    $result = mysqli_query($conexao, $sql);
    
    if($result)
    {
        if($rsDados = mysqli_fetch_assoc($result))
        {
            $arrayDados = array(
                "id"    => $rsDados['idgenero'],
                "nome"  => $rsDados['nome'],
            );

            fecharConexaoMysql($conexao);

            return $arrayDados;
        }
    }
}
?>