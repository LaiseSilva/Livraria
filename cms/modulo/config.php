<?php

/*************************************************************************************
 * Objetivo: Arquivo responsável pela criação de váriaveis e constantes do projeto
 * Autor: Laise
 * Data:25/04/2022
 * Versão: 1.0   
 *****************************************************************************/

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

const ERRO_NENHUM_CAMPO_PREENCHIDO = array(
   'idErro'  => 8,
   'message' => 'Por favor preencha os campos'
);
