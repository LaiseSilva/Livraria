<?php
/*************************************************
 * Objetivo: Arquivo para criar a conexão BD Mysql
 * Autor: Laise
 * Data: 07/04/2022
 * Versão: 1.0
**************************************************/

//constante que estabele a conexão com o banco

const SERVER = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'dblivraria';

//Abrindo conexão com o banco
function conexaoMysql()
{
    $conexao = array();

    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    if($conexao)
        return $conexao;
    else
        return false;

}

function fecharConexaoMysql($conexao)
{
    mysqli_close($conexao);
}








?>