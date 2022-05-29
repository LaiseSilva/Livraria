<?php
$form = (string) "router.php?component=produto_genero&action=inserir";

$idproduto = null;
$idgenero = null;

if (session_status()) {
   if (!empty($_SESSION['dadosProdutoGenero'])) {
      $id = $_SESSION['dadosProdutoGenero']['id'];
      $idproduto = $_SESSION['dadosProdutoGenero']['idproduto'];
      $idgenero = $_SESSION['dadosProdutoGenero']['idgenero'];

      $form = (string) "router.php?component=produto_genero&action=editar&id=" . $id;

      unset($_SESSION['dadosProdutoGenero']);
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
   <title>Usuários</title>
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

      <div class="cadastroInformacoes">
         <form action="<?= $form ?>" method="post">
            <div class="campos">
               <div class="cadastroDados">
                  <label>Produto: </label>
               </div>

               <div class="entradaDeDados">
                  <select name="produto">
                     <option value="">Selecione um item</option>
                     <?php
                     require_once('controller/controllerProdutos.php');

                     $listaProdutos = listarProdutos();

                     foreach ($listaProdutos as $item) {
                     ?>
                        <option <?= $idproduto == $item['id'] ? 'selected' : null ?> value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>

                     <?php
                     }

                     ?>
                  </select>
               </div>
            </div>

            <div class="campos">
               <div class="cadastroDados">
                  <label>Generos: </label>
               </div>

               <div class="entradaDeDados">
                  <select name="genero">
                     <option value="">Selecione um item</option>
                     <?php
                     require_once('controller/controllerGeneros.php');

                     $listaGeneros = listarGeneros();

                     foreach ($listaGeneros as $item) {
                     ?>
                        <option <?= $idgenero == $item['id'] ? 'selected' : null ?> value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>
                     <?php
                     }

                     ?>
                  </select>
               </div>
            </div>

            <div class="enviar">
               <input type="submit" name="btnEnviar" value="Salvar">
            </div>
         </form>

         <section id="consultaDeDados">
            <table id="tblConsulta">
               <tr>
                  <td id="tblTitulo" colspan="6">
                     <h1>Consulta de Produtos e suas categorias</h1>
                  </td>
               </tr>

               <tr id="tblLinhas">
                  <td class="tblColunas destaque"> Produto</td>
                  <td class="tblColunas destaque"> Genero</td>
               </tr>


               <?php
               require_once('controller/controllerProduto_Genero.php');
               $listaProdutosGeneros = listarProdutoGenero();

               foreach ($listaProdutosGeneros as $item) {
                  $produto = buscarProduto($item['idproduto']);
                  $genero = buscarGenero($item['idgenero']);
               ?>

                  <tr id="tblLinhas">
                     <td class="tblColunas registros"><?= $produto['nome']; ?></td>
                     <td class="tblColunas registros"><?= $genero['nome']; ?></td>


                     <td class="tblColunas registros">
                        <a onclick="return confirm('Deseja realmente excluir esse item?');" href="router.php?component=produto_genero&action=deletar&id=<?= $item['id'] ?>">
                           <img class="excluir" src="./img/excluir.png" alt="excluir">
                        </a>

                        <a href="router.php?component=produto_genero&action=buscar&id=<?= $item['id'] ?>">
                           <img class="editar" src="./img/editar.png" alt="editar">
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