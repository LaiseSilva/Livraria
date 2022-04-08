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




?>