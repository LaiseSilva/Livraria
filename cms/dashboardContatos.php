<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/dashboard.css">
    <link rel="stylesheet" href="./style/tabelas.css">
    <link rel="stylesheet" href="./style/forms.css">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header id="header">
        <div class="descricao">
            <span class="titulo">CMS: Livraria</span>
            <p class="sub">Gerenciamento do conteúdo do site</p>
        </div>

        <div class="logo"></div>
    </header>

    <div id="container">
        <nav id="menu">

            <div class="item-menu">
                <a href="" class="item">
                    <span class="material-icons tamanho-icon">
                        auto_stories
                    </span>
                    <p>Administrar Produtos</p>
                </a>
            </div>

            <div class="item-menu">
                <a href="dashboardGeneros.php" class="item">
                    <span class="material-icons tamanho-icon">
                        category
                    </span>
                    <p>Administrar Categorias</p>
                </a>
            </div>

            <div class="item-menu">
                <a href="dashboardContatos.php" class="item">
                    <i class="material-icons tamanho-icon">
                        rate_review
                    </i>
                    <p>Contatos</p>
                </a>
            </div>

            <div class="item-menu">
                <a href="dashboardUsuarios.php" class="item">
                    <span class="material-symbols-outlined tamanho-icon">
                        group_add
                    </span>
                    <p>Usuários</p>
                </a>
            </div>

            <div class="item-menu">
                <a href="produto&genero.php" class="item">
                    <span class="material-symbols-outlined tamanho-icon">
                        hub
                    </span>
                    <p>Produto&Genero</p>
                </a>
            </div>


            <div class="item-menu">
                <a href="index.html" class="item">
                    <i class="material-icons tamanho-icon">
                        logout
                    </i>
                    <p>Logout</p>
                </a>

            </div>
        </nav>

        <section id="consultaDeDados">
            <table id="tblConsulta">
                <tr>
                    <td id="tblTitulo">
                        Consulta de Mensagens
                    </td>
                </tr>

                <tr id="tblLinhas">
                    <td class="tblColunas destaque">
                        Email
                    </td>

                    <td class="tblColunas destaque">
                        Assunto
                    </td>

                    <td class="tblColunas destaque">
                        Ações
                    </td>
                </tr>

                <tr id="tblLinhas">

                </tr>

                <?php
                require_once('controller/controllerContatos.php');
                $listContato = listarContatos();

                foreach ($listContato as $item) {

                ?>

                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?= $item['nome'] ?></td>

                        <td class="tblColunas registros"><?= $item['assunto'] ?></td>

                        <td class="tblColunas registros">
                            <a onclick="return confirm('Deseja realmente excluir esse dado?');" href="router.php?component=contatos&action=deletar&id=<?= $item['id'] ?>">
                                <img class="excluir" src="./img/excluir.png" alt="">
                            </a>

                            <a>
                                <img class="visualizar" src="./img/visualizador.png" alt="">
                            </a>
                        </td>
                    </tr>




                <?php
                }
                ?>

            </table>
        </section>
    </div>



</body>

</html>