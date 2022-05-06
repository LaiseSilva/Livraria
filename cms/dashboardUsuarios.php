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
   <link rel="stylesheet" href="./style/forms.css">
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
               <i class="material-icons tamanho-icon">
                  perm_identity
               </i>
               <p>Usuários</p>
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
            <h1>Cadastro de Usuários</h1>
         </div>

         <div class="cadastroInformacoes">
            <form action="<?= $form ?>" method="post">
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
                     <label>Email: </label>
                  </div>

                  <div class="entradaDeDados">
                     <input class="input" type="email" name="email" value="<?= isset($email) ? $email : null ?>" placeholder="Digite o email" maxlength="100">
                  </div>
               </div>

               <div class="campos">
                  <div class="cadastroDados">
                     <label>Senha: </label>
                  </div>

                  <div class="entradaDeDados">
                     <input class="input" type="password" name="senha" value="<?= isset($senha) ? $senha : null ?>" placeholder="Digite a senha" maxlength="100">
                  </div>
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
                     <h1>Consulta de Usuários</h1>
                  </td>
               </tr>

               <div class="container-tr">
                  <tr id="tblLinhas">
                     <td class="tblColunas destaque"> Nome</td>
                     <td class="tblColunas destaque"> Email</td>
                     <td class="tblColunas destaque"> Ações</td>
                  </tr>
                
               </div>


               <?php
               require_once('controller/controllerUsuarios.php');
               $listUsuarios = listarUsuarios();

               foreach ($listUsuarios as $item) {
               ?>

                  <tr id="tblLinhas">
                     <td class="tblColunas registros"><?= $item['nome']; ?></td>

                     <td class="tblColunas registros"><?= $item['email']; ?></td>

                     <td class="tblColunas registros">
                        <a onclick="return confirm('Deseja realmente excluir esse usuário?');" href="router.php?component=usuarios&action=deletar&id=<?= $item['id'] ?>">
                           <img class="excluir" src="./img/excluir.png" alt="excluir">
                        </a>

                        <a href="router.php?component=usuarios&action=buscar&id=<?= $item['id'] ?>">
                           <img class="editar" src="./img/editar.png" alt="editar">
                        </a>

                        <a>
                           <img class="visualizar" src="./img/visualizador.png" alt="">
                        </a>
                     </td>
                  </tr>
                  

               <?php
               }
               ?>
         </section>

      </section>

   </div>



   </footer>
</body>

</html>