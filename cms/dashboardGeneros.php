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
                <a href="" class="item-menu">
                    <span class="material-icons tamanho-icon">
                        category
                    </span>
                    <p>Administrar Categorias</p>
                </a>
            </div>

            <div class="container-item-menu">
                <a href="./dashboardContatos.php" class="item-menu">
                    <i class="material-icons tamanho-icon">
                        rate_review
                    </i>
                    <p>Contatos</p>
                </a>
            </div>

            <div class="container-item-menu">
                <a href="" class="item-menu">
                    <i class="material-icons tamanho-icon">
                        perm_identity
                    </i>
                    <p>Usuários</p>
                </a>
            </div>
        </div>

        <div class="usuario">
            <span>Bem vindo Laise</span>
            <a href="" class="item-menu">
                <i class="material-icons tamanho-icon">
                    logout
                </i>
                <p>Logout</p>
            </a>

        </div>
    </nav>

    <div id="container-formulario">
        <h1>Cadastrar Categorias</h1>
        <form action="router.php?component=generos&action=inserir" class="formulario" method="post">
            <div>
                <input class="input" type="text" name="nome" value="" placeholder="Digite a nova categoria">
            </div>
            <div class="btnEnviar">
                <input class="input-botao" type="submit" name="btnEnviar" value="Salvar">
            </div>
        </form>
    </div>

    <div id="consultaDeMensagens">
        <table class="tblConsulta">
            <tr class="tblTitulo">
                <td class="tblTitulo">
                    <h1>Generos</h1>
                </td>
            </tr>

            <tr class="tblLinhas">
                <th class="tblColunas">Nome</th>
            </tr>


            <?php
                require_once('controller/controllerGeneros.php');
                $listGeneros = listarGeneros();

                foreach ($listGeneros as $item) {
            ?>


                <tr class="tblLinhas">
                    <td class="tblRegistro tblColunas"><?=$item['nome'];?></td>
                    <td class="tblColunas">
                        <a onclick="return confirm('Deseja realmente excluir essa categoria?');" href="router.php?component=generos&action=deletar&id=<?=$item['id']?>">
                            <img class="icone-excluir" src="./img/excluir.png" alt="">
                        </a>
                    </td>

                    <td class="tblColunas">
                        <a>
                            <img class="icone-editar" src="./img/editar.png" alt="">
                        </a>
                    </td>

                </tr>

            <?php
            }
            ?>


    </div>


    <footer id="footer">

    </footer>
</body>

</html>