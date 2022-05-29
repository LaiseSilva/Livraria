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
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    //Definindo dados de ação e component
    $component = strtoupper($_GET['component']);
    $action = strtoupper($_GET['action']);

    //Definindo quem está validando
    switch ($component) {

        case 'CONTATOS':
            require_once('controller/controllerContatos.php');
            if ($action == 'DELETAR') {
                $idContato = $_GET['id'];

                $resposta = excluirContato($idContato);

                if (is_bool($resposta)) {
                    if ($resposta) {
                        echo ("<script>
                                    alert('Registro excluído com sucesso!');
                                    window.location.href = 'dashboardContatos.php';
                              </script>");
                    } elseif (is_array($resposta)) {
                        echo ("<script>
                                    alert('" . $resposta['message'] . "');
                                    window.history.back();
                              </script>");
                    }
                }
            }
            break;
        case 'GENEROS':
            require_once('controller/controllerGeneros.php');

            if ($action == 'INSERIR') {

                $resultado = inserirGenero($_POST);
                if (is_bool($resultado)) {
                    if ($resultado)
                        echo ("<script>
                                    alert('Registro inserido com sucesso!');
                                    window.location.href = 'dashboardGeneros.php';
                              </script>");
                } elseif (is_array($resultado))
                    echo ("<script>
                                alert('" . $resultado['message'] . "');
                                window.history.back();                   
                         </script>");
            } elseif ($action == 'DELETAR') {
                $idGenero = $_GET['id'];
                $resposta = excluirGenero($idGenero);

                if (is_bool($resposta)) {
                    if ($resposta) {
                        echo ("<script>
                                alert('Registro excluído com sucesso!');
                                window.location.href = 'dashboardGeneros.php';
                            </script>");
                    } elseif (is_array($resposta)) {
                        echo ("<script>
                                    alert('" . $resposta['message'] . "');
                                    window.history.back();
                            </script>");
                    }
                }
            } elseif ($action == 'BUSCAR') {
                $idGenero = $_GET['id'];

                $dados = buscarGenero($idGenero);

                session_start();

                $_SESSION['dadosGeneros'] = $dados;

                require_once('dashboardGeneros.php');
            } elseif ($action == 'EDITAR') {
                $idGenero = $_GET['id'];

                $resultado = atualizarGenero($_POST, $idGenero);

                if (is_bool($resultado)) {
                    if ($resultado)
                        echo ("<script>
                                    alert('Registro atualizado com sucesso!');
                                    window.location.href = 'dashboardGeneros.php';                        
                              </script>");
                } elseif (is_array($resultado)) {
                    echo ("<script>
                                    alert('" . $resultado["message"] . "');
                                    window.history.back();                        
                              </script>");
                }
            }
            break;
        case 'USUARIOS':
            require_once('controller/controllerUsuarios.php');

            if ($action == 'INSERIR') {
                $resultado = inserirUsuario($_POST, $_FILES);
                if (is_bool($resultado)) {

                    if ($resultado)
                        echo ("<script>
                                        alert('Registro inserido com sucesso!');
                                        window.location.href = 'dashboardUsuarios.php';
                                  </script>");
                } elseif (is_array($resultado))
                    echo ("<script>
                                alert('" . $resultado['message'] . "');
                                window.history.back();
                          </script>");
            } elseif ($action == 'BUSCAR') {
                $idUsuario = $_GET['id'];

                $dados = buscarUsuario($idUsuario);

                session_start();

                $_SESSION['dadosUsuarios'] = $dados;

                require_once('dashboardUsuarios.php');
            } elseif ($action == 'DELETAR') {
                $idUsuario = $_GET['id'];
                $resposta = excluirUsuario($idUsuario);

                if (is_bool($resposta)) {
                    if ($resposta) {
                        echo ("<script>
                        alert('Registro excluído com sucesso!');
                        window.location.href = 'dashboardUsuarios.php';
                    </script>");
                    } elseif (is_array($resposta)) {

                        echo ("<script>
                                    alert('" . $resposta['message'] . "');
                                    window.history.back();
                            </script>");
                    }
                }
            } elseif ($action == 'EDITAR') {
                $idUsuario = $_GET['id'];

                $resultado = atualizarUsuario($_POST, $idUsuario);

                if (is_bool($resultado)) {
                    if ($resultado) {
                        echo ("<script>
                                    alert('Registro atualizado com sucesso!');
                                    window.location.href = 'dashboardUsuarios.php';                        
                              </script>");
                    }
                } elseif (is_array($resultado)) {


                    echo ("<script>
                                alert('" . $resultado["message"] . "');
                                window.history.back();                        
                           </script>");
                }
            }
            break;
        case 'PRODUTOS':
            require_once('controller/controllerProdutos.php');

            if ($action == 'INSERIR') {
                if (isset($_FILES) && !empty($_FILES)) {
                    $resultado = inserirProduto($_POST, $_FILES);
                } else {
                    $resultado = inserirProduto($_POST, null);
                }

                if (is_bool($resultado)) {
                    if ($resultado)
                        echo ("<script>
                                    alert('Registro inserido com sucesso!');
                                    window.location.href = 'dashboardAdmProdutos.php';
                              </script>");
                } elseif (is_array($resultado)) {
                    echo ("<script>
                                alert('" . $resultado['message'] . "');
                                window.history.back();
                           </script>");
                }
            } elseif ($action == 'BUSCAR') {
                $idProduto = $_GET['id'];

                $dados = buscarProduto($idProduto);

                session_start();

                $_SESSION['dadosProdutos'] =  $dados;

                require_once('dashboardAdmProdutos.php');
            } elseif ($action == 'DELETAR') {
                $idproduto = $_GET['id'];
                $foto = $_GET['foto'];

                $arrayDados = array(
                    "id"   => $idproduto,
                    "foto" => $foto
                );

                $resposta = excluirProduto($arrayDados);

                if (is_bool($resposta)) {
                    if ($resposta) {
                        echo ("<script>
                                alert('Registro excluído com sucesso!');
                                window.location.href = 'dashboardAdmProdutos.php';
                        </script>");
                    } elseif (is_array($resposta)) {

                        echo ("<script>
                                    alert('" . $resposta['message'] . "');
                                    window.history.back();
                            </script>");
                    }
                }
            } elseif ($action == 'EDITAR') {
                $id = $_GET['id'];
                $foto = $_GET['foto'];

                $arrayDados = array(
                    "id"   => $id,
                    "foto" => $foto,
                    "files" => $_FILES
                );


                $resultado = atualizarProduto($_POST, $arrayDados);


                if (is_bool($resultado)) {
                    if ($resultado) {
                        echo ("<script>
                        alert('Registro atualizado com sucesso!');
                        window.location.href = 'dashboardAdmProdutos.php';
                    </script>");
                    } elseif (is_array($resultado)) {

                        echo ("<script>
                                    alert('" . $resultado['message'] . "');
                                    window.history.back();
                            </script>");
                    }
                }
            }
            break;
        case 'PRODUTO_GENERO':
            require_once('controller/controllerProduto_Genero.php');

            if ($action == 'INSERIR') {

                $resultado = inserirProdutoGenero($_POST);
                if (is_bool($resultado)) {
                    if ($resultado)
                        echo ("<script>
                                    alert('Registro inserido com sucesso!');
                                    window.location.href = 'produto&genero.php';
                              </script>");
                } elseif (is_array($resultado))
                    echo ("<script>
                                alert('" . $resultado['message'] . "');
                                window.history.back();                   
                         </script>");
            } elseif ($action == 'DELETAR') {
                $idProdutoGenero = $_GET['id'];
                $resposta = excluirProdutoGenero($idProdutoGenero);

                if (is_bool($resposta)) {
                    if ($resposta) {
                        echo ("<script>
                                alert('Registro excluído com sucesso!');
                                window.location.href = 'produto&genero.php';
                            </script>");
                    } elseif (is_array($resposta)) {
                        echo ("<script>
                                    alert('" . $resposta['message'] . "');
                                    window.history.back();
                            </script>");
                    }
                }
            } elseif ($action == 'BUSCAR') {
                $idProdutoGenero = $_GET['id'];

                $dados = buscarProdutoGenero($idProdutoGenero);


                session_start();

                $_SESSION['dadosProdutoGenero'] = $dados;
                require_once('produto&genero.php');
            } elseif ($action == 'EDITAR') {
                $idProdutoGenero = $_GET['id'];

                $resultado = atualizarProdutoGenero($_POST, $idProdutoGenero);

                if (is_bool($resultado)) {
                    if ($resultado)
                        echo ("<script>
                                    alert('Registro atualizado com sucesso!');
                                    window.location.href = 'produto&genero.php';                        
                              </script>");
                } elseif (is_array($resultado)) {
                    echo ("<script>
                                    alert('" . $resultado["message"] . "');
                                    window.history.back();                        
                              </script>");
                }
            }
            break;
    }
}
