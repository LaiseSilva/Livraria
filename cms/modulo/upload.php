<?php

/****************************************************************
 * Objetivo: Arquivo com a função de fazer uploads de imagem
 * Autor: Laise
 * Data: 13/05/2022
 * Versão: 1.0
 *****************************************************************/

function uploadFile($arrayFile)
{

    require_once('modulo/config.php');

    //Váriveis necessárias da função 
    $arquivo = $arrayFile;
    $sizeFile = (int) 0;
    $typeFile = (string) null;
    $nameFile = (string) null;
    $tempFile = (string) null;

    //Verifica se existe o arquivo válido
    if ($arquivo['size'] > 0 && $arquivo['type'] != "") {
        //Recuperação dos dados
        $sizeFile = $arquivo['size'] / 1024;
        $typeFile = $arquivo['type'];
        $nameFile = $arquivo['name'];
        $tempFile = $arquivo['tmp_name'];

        //Validação para o tamanho do arquivo
        if ($sizeFile <= MAX_FILE_UPLOAD) {
            //Validação para a extensão do upload
            if (in_array($typeFile, EXT_FILE_UPLOAD)) {

                $nome = pathinfo($nameFile, PATHINFO_FILENAME);
                $extensao = pathinfo($nameFile, PATHINFO_EXTENSION);

                $nomeCripty = md5($nome . uniqid(time()));

                $foto = $nomeCripty . "." . $extensao;

                if (move_uploaded_file($tempFile, DIRETORIO_FILE_UPLOAD . $foto)) {
                    return $foto;
                } else
                    return ERRO_ARQUIVO_PARA_SERVIDOR;
            } else
                return ERRO_ARQUIVO_EXT_INVALIDA;
        } else
            return ERRO_ARQUIVO_TAMANHO_INVALIDO;
    } else
        return ERRO_NENHUM_ARQUIVO_SELECIONADO;
}
