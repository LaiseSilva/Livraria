<?php
/*******************************************************************************
 * Objetivo: Arquivo de rota que irá segmentar as ações encaminhadas pela view
 * Autor: Laise
 * Data: 07/04/2022   08/04/2022
 * Versão: 1.0        2.0
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
            break;
        case 'GENEROS':
            require_once('controller/controllerGeneros.php');

            
            if($action == 'INSERIR')
            {
                
                $resultado = inserirGenero($_POST);

                if(is_bool($resultado))
                {
                    if($resultado)
                        echo("<script>
                                    alert('Registro inserido com sucesso!');
                                    window.location.href = 'dashboardGeneros.php';
                              </script>");
                }elseif(is_array($resultado))
                    echo("<script>
                                alert('".$resultado['message']."');
                                window.history.back();                   
                         </script>");
            }
            
            elseif($action == 'DELETAR')
            {
                $idGenero = $_GET['id'];
                $resposta = excluirGenero($idGenero);

                if(is_bool($resposta))
                {
                    if($resposta)
                    {
                        echo("<script>
                                alert('Registro excluído com sucesso!');
                                window.location.href = 'dashboardGeneros.php';
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

            elseif($action == 'BUSCAR')
            {
                $idGenero = $_GET['id'];

                $dados = buscarGenero($idGenero);

                session_start();

                $_SESSION['dadosGeneros'] = $dados;

                require_once('dashboardGeneros.php');
            }

            elseif($action == 'EDITAR')
            {
                $idGenero = $_GET['id'];

                $resultado = atualizarGenero($_POST, $idGenero);

                if(is_bool($resultado))
                {
                    if ($resultado)
                        echo("<script>
                                    alert('Registro atualizado com sucesso!');
                                    window.location.href = 'dashboardGeneros.php';                        
                              </script>");
                }elseif(is_array($resultado))
                {
                    echo("<script>
                                    alert('".$resultado["message"]."');
                                    window.history.back();                        
                              </script>");
                }
            }
            
    }
}





?>