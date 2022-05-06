<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/dashboard.css">
    <link rel="stylesheet" href="./style/tabelas.css">
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

    <nav id="nav">
        <div class="navegacao">

            <div class="container-item-menu">
                <a href="" class="item-menu">
                    <span class="material-icons tamanho-icon">
                        auto_stories
                    </span>
                    <p>Administrar Produtos</p>
                </a>
            </div>

            <div class="container-item-menu">
                <a href="dashboardGeneros.php" class="item-menu">
                    <span class="material-icons tamanho-icon">
                        category
                    </span>
                    <p>Administrar Categorias</p>
                </a>
            </div>

            <div class="container-item-menu">
                <a href="dashboardContatos.php" class="item-menu">
                    <i class="material-icons tamanho-icon">
                        rate_review
                    </i>
                    <p>Contatos</p>
                </a>
            </div>

            <div class="container-item-menu">
                <a href="dashboardUsuarios.php" class="item-menu">
                    <i class="material-icons tamanho-icon">
                        perm_identity
                    </i>
                    <p>Usuários</p>
                </a>
            </div>
        </div>

        <div class="usuario">
            <span>Bem vindo Laise</span>
            <a href="index.html" class="item-menu">
                <i class="material-icons tamanho-icon">
                    logout
                </i>
                <p>Logout</p>
            </a>

        </div>
    </nav>

    <div id="consultaDeMensagens">
        <table class="tblConsulta">
            <tr class="tblTitulo">
                <td class="tblTitulo">
                    <h1>Mensagens Clientes</h1>
                </td>
            </tr>

            <tr class="tblLinhas">
                <th class="tblColunas">Nome</th>
                <th class="tblColunas">Assunto</th>
            </tr>

            <?php
            require_once('controller/controllerContatos.php');
            $listContato = listarContatos();

            foreach ($listContato as $item) {

            ?>

                <tr class="tblLinhas">
                    <td class="tblRegistro tblColunas"><?= $item['nome'] ?></td>
                    <td class="tblColunas"><?= $item['assunto'] ?></td>
                    <td class="tblopcoes">
                        <a onclick="return confirm('Deseja realmente excluir esse dado?');" href="router.php?component=contatos&action=deletar&id=<?= $item['id'] ?>">
                            <img class="icone-excluir" src="./img/excluir.png" alt="">
                        </a>
                    </td>

                    <td class="tblopcoes">
                        <a>
                            <img class="icone-visualizar" src="./img/visualizador.png" alt="">
                        </a>
                    </td>
                </tr>




            <?php
            }
            ?>


        </table>

    </div>

</body>

</html>