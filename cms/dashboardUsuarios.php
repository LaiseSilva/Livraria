<?php
$form = (string) "router.php?component=usuarios&action=inserir";

if (session_status()) {
   if (!empty($_SESSION['dadosUsuarios'])) {
      $id    = $_SESSION['dadosUsuarios']['id'];
      $nome  = $_SESSION['dadosUsuarios']['nome'];
      $email = $_SESSION['dadosUsuarios']['email'];
      $senha = $_SESSION['dadosUsuarios']['senha'];

      $form = "router.php?component=usuarios&action=editar&id=" . $id;

      unset($_SESSION['dadosUsuarios']);
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

   <div id="container-formulario">
      <h1>Cadastrar Usuários</h1>
      <form action="<?= $form ?>" class="formulario" method="post">
         <div>
            <input class="input" type="text" name="nome" value="<?= @$nome ?>" placeholder="Digite o nome">
         </div>
         <div>
            <input class="input" type="text" name="email" value="<?= @$email ?>" placeholder="Digite o email">
         </div>
         <div>
            <input class="input" type="text" name="senha" value="<?= @$senha ?>" placeholder="Digite a senha">
         </div>
         <div class="btnEnviar">
            <input class="input-botao" type="submit" name="btnEnviar" value="Salvar">
         </div>
      </form>
   </div>

   <div id="consultaDeUsuarios">
      <table class="tblConsulta">
         <tr class="tblTitulo">
            <td class="tblTitulo">
               <h1>Usuários</h1>
            </td>
         </tr>

         <tr class="tblLinhas">
            <th class="tblColunas">Nome</th>
            <th class="tblColunas">Email</th>
         </tr>


         <?php
         require_once('controller/controllerUsuarios.php');
         $listUsuarios = listarUsuarios();

         foreach ($listUsuarios as $item) {
         ?>


            <tr class="tblLinhas">
               <td class="tblRegistro tblColunas"><?= $item['nome']; ?></td>
               <td class="tblRegistro tblColunas"><?= $item['email']; ?></td>
               <td class="tblopcoes">
                  <a onclick="return confirm('Deseja realmente excluir esse usuário?');" href="router.php?component=usuarios&action=deletar&id=<?= $item['id'] ?>">
                     <img class="icone-excluir" src="./img/excluir.png" alt="">
                  </a>
               </td>

               <td class="tblopcoes">
                  <a href="router.php?component=usuarios&action=buscar&id=<?= $item['id'] ?>">
                     <img class="icone-editar" src="./img/editar.png" alt="">
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


   </div>

   </footer>
</body>

</html>