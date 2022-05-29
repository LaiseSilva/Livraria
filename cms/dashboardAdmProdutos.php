<?php
//Importe do arquivo de configurações do projeto usado para pegar a foto do diretório
require_once('modulo/config.php');

$form = (string) "router.php?component=produtos&action=inserir";

$foto = (string) null;

$destaque = null;

if (session_status()) {
   if (!empty($_SESSION['dadosProdutos'])) {
      $id        = $_SESSION['dadosProdutos']['id'];
      $nome    = $_SESSION['dadosProdutos']['nome'];
      $valor        = $_SESSION['dadosProdutos']['valor'];
      $desconto        = $_SESSION['dadosProdutos']['desconto'];
      $destaque        = $_SESSION['dadosProdutos']['destaque'];
      $sinopse        = $_SESSION['dadosProdutos']['sinopse'];
      $foto        = $_SESSION['dadosProdutos']['foto'];

      $form = (string) "router.php?component=produtos&action=editar&id=" . $id . "&foto=" . $foto;

      unset($_SESSION['dadosProdutos']);
   }
}
?>

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
   <title>Cadastro de produtos</title>
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
            <a href="dashboardAdmProdutos.php" class="item">
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

      <section id="cadastro">
         <div class="tituloCadastro">
            <h1>Cadastro de Produtos</h1>
         </div>

         <div class="cadastroInformacoes">
            <form action="<?= $form ?>" method="post" enctype="multipart/form-data">
               <div class="campos">
                  <div class="cadastroDados">
                     <label>Nome: </label>
                  </div>

                  <div class="entradaDeDados">
                     <input class="input" type="text" name="nome" value="<?= isset($nome) ? $nome : null ?>" placeholder="Digite o nome" maxlength="100">
                  </div>
               </div>

               <div class="campos">
                  <div class="cadastroDados">
                     <label>Preço: </label>
                  </div>

                  <div class="entradaDeDados">
                     <input class="input" type="number" name="valor" value="<?= isset($valor) ? $valor : null ?>" placeholder="Digite o preço" maxlength="100">
                  </div>
               </div>

               <div class="campos">
                  <div class="cadastroDados">
                     <label>Percentual de desconto </label>
                  </div>

                  <div class="entradaDeDados">
                     <input class="input" type="number" name="desconto" value="<?= isset($desconto) ? $desconto : null ?>" placeholder="Digite a porcentagem de desconto" maxlength="100">
                  </div>
               </div>

               <div class="campos">
                  <div class="cadastroDados">
                     <label>É destaque? </label>
                  </div>

                  <div class="entradaDeDados">
                     <input class="input" type="radio" name="destaque" value="true" <?= ($destaque) == '1' ? "checked" : null ?>>
                     <p>Sim</p>
                     <input class="input" type="radio" name="destaque" <?= ($destaque) == '0' ? "checked" : null ?> value="false"> Não
                  </div>
               </div>

               <div class="campos">
                  <div class="cadastroDados">
                     <label>Sinopse</label>
                  </div>

                  <div class="entradaDeDados">
                     <textarea class="input" name="sinopse" id="" cols="30" rows="10">
                        <?= isset($nome) ? $nome : null ?>
                     </textarea>
                  </div>
               </div>

               <div class="campos">
                  <div class="cadastroDados">
                     <label>Imagem</label>
                  </div>

                  <div class="entradaDeDados">
                     <input type="file" name="imagem" accept=".jpg, .png, .jpeg">
                  </div>
               </div>
               <div class="campos">
                  <img src="<?= DIRETORIO_FILE_UPLOAD . $foto ?>">
               </div>
               <div class="enviar">
                  <input type="submit" name="btnEnviar" value="Salvar">
               </div>
            </form>
         </div>

         <section id="consultaDeDados">
            <table id="tblConsulta">
               <tr>
                  <td id="tblTitulo" colspan="6">
                     <h1>Consulta de Produtos</h1>
                  </td>
               </tr>

               <div class="container-tr">
                  <tr id="tblLinhas">
                     <td class="tblColunas destaque"> Nome</td>
                     <td class="tblColunas destaque"> Preço</td>
                     <td class="tblColunas destaque"> Desconto</td>
                     <td class="tblColunas destaque"> Destaque</td>
                     <td class="tblColunas destaque"> Sinopse</td>
                     <td class="tblColunas destaque"> Imagem</td>
                  </tr>

               </div>


               <?php
               require_once('controller/controllerProdutos.php');
               $listarProdutos = listarProdutos();

               foreach ($listarProdutos as $item) {
               ?>

                  <tr id="tblLinhas">
                     <td class="tblColunas registros"><?= $item['nome']; ?></td>
                     <td class="tblColunas registros"><?= $item['valor']; ?></td>
                     <td class="tblColunas registros"><?= $item['desconto']; ?></td>
                     <td class="tblColunas registros"><?= $item['destaque'] == 0 ? "Não" : "Sim"; ?></td>
                     <td class="tblColunas registros"><?= $item['sinopse']; ?></td>
                     <td class="tblColunas registros"><?= $item['foto']; ?></td>

                     <td class="tblColunas registros">
                        <a onclick="return confirm('Deseja realmente excluir esse produto?');" href="router.php?component=produtos&action=deletar&id=<?= $item['id'] ?>">
                           <img class="excluir" src="./img/excluir.png" alt="excluir">
                        </a>

                        <a href="router.php?component=produtos&action=buscar&id=<?= $item['id'] ?>&foto=<?= $foto ?>">
                           <img class="editar" src="./img/editar.png" alt="editar">
                        </a>
                     </td>
                  </tr>


               <?php
               }
               ?>
         </section>
      </section>


   </div>

</body>

</html>