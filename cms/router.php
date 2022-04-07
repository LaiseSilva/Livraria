<?php
/*******************************************************************************
 * Objetivo: Arquivo de rota que irá segmentar as ações encaminhadas pela view
 * Autor: Laise
 * Data: 07/04/2022
 * Versão: 1.0
********************************************************************************/

//Váriaveis que diz qual é a ação e quem pediu
$action = (string) null;
$component = (string) null;

//Validação para verificar qual é a requisição
if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET')
{
    //Definindo dados de ação e component
    $component = strtoupper($_GET['component']);
    $action = strtoupper($_GET['action']);

    //Definindo quem está validando
    switch($component)
    {
       
        case 'CONTATOS':
            require_once('controller/controllerContatos.php');
            if($action == 'DELETAR')
            {
                $idContato = $_GET['id'];

                $resposta = excluirContato($idContato);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                    alert('Registro excluído com sucesso!');
                                    window.location.href = 'dashboardContatos.php';
                              </script>");
                    }elseif(is_array($resposta))
                    {
                        echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back();
                              </script>");
                    }
                }
            }

            

    }
}





?>