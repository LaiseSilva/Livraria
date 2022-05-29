<?php

/*************************************************************************************
 * Objetivo: Arquivo responsável pela criação de váriaveis e constantes do projeto
 * Autor: Laise
 * Data:25/04/2022
 * Versão: 1.0   
 *****************************************************************************/

/***** Váriaves de erro *****/
const ERRO_CAMPO_OBRIGATORIO = array(
   'idErro'  => 1,
   'message' => 'O(s) campo(s) obrigatório(s) não foi(foram) preenchido!'
);

const ERRO_INSERIR_BANCO = array(
   'idErro'  => 2,
   'message' => 'Não foi possível inserir o dado no banco'
);

const ERRO_EXCLUIR_ID_INVALIDO = array(
   'idErro'  => 3,
   'message' => 'Não é possível excluir um registro sem um id válido'
);

const ERRO_EXCLUIR_BANCO = array(
   'idErro'  => 4,
   'message' => 'O banco de dados não pode excluir o registro'
);

const ERRO_BUSCAR = array(
   'idErro'  => 5,
   'message' => 'Não é possível buscar um registro sem um id válido'
);

const ERRO_ATUALIZAR_ID_INVALIDO = array(
   'idErro'  => 6,
   'message' => 'Não é possível atualizar um registro sem um id válido'
);

const ERRO_ATUALIZAR_BANCO = array(
   'idErro'  => 7,
   'message' => 'Não foi possível atualizar no banco'
);

const ERRO_OBEJETO_NULL = array(
   'idErro'  => 8,
   'message' => 'O objeto está vazio'
);

const ERRO_ARQUIVO_PARA_SERVIDOR = array(
   'idErro'  => 9,
   'message' => 'Não foi possível mover o arquivo para o servidor'
);

const ERRO_ARQUIVO_EXT_INVALIDA = array(
   'idErro'  => 10,
   'message' => 'A extensão do arquivo selecionado não é permitida no upload.'
);

const ERRO_ARQUIVO_TAMANHO_INVALIDO = array(
   'idErro'  => 11,
   'message' => 'Tamanho de arquivo inválido no upload.'
);

const ERRO_NENHUM_ARQUIVO_SELECIONADO = array(
   'idErro'  => 12,
   'message' => 'Tamanho de arquivo inválido no upload.'
);

const ERRO_EXCLUIR_FOTO_DIRETORIO_SERVIDOR = array(
   'idErro'  => 13,
   'message' => 'O registro do banco de dados foi excluído com sucesso,
                 porém a imagem não foi excluída do diretório do servidor'
);



/***** Váriaveis para auxiliar no upload de arquivos *****/

//Limitação de 5mb
const MAX_FILE_UPLOAD = 5120;

const EXT_FILE_UPLOAD = array("image/jpg", "image/jpeg", "image/gif", "image/png");

const DIRETORIO_FILE_UPLOAD = "arquivos/";
