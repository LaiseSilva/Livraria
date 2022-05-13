<?php

   $form = (string) "router.php?component=produtos&action=inserir";
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
         <h1>Cadastro de Produtos</h1>
      </div>

      <div class="cadastroInformacoes">
         <form action="<?=$form?>" method="post">
            <div class="campos">
               <div class="cadastroDados">
                  <label>Nome: </label>
               </div>

               <div class="entradaDeDados">
                  <input class="input" type="text" name="nome" value="" placeholder="Digite o nome" maxlength="100">
               </div>
            </div>

            <div class="campos">
               <div class="cadastroDados">
                  <label>Preço: </label>
               </div>

               <div class="entradaDeDados">
                  <input class="input" type="number" name="valor" value="" placeholder="Digite o preço" maxlength="100">
               </div>
            </div>

            <div class="campos">
               <div class="cadastroDados">
                  <label>Percentual de desconto </label>
               </div>

               <div class="entradaDeDados">
                  <input class="input" type="number" name="desconto" value="" placeholder="Digite a porcentagem de desconto" maxlength="100">
               </div>
            </div>

            <div class="campos">
               <div class="cadastroDados">
                  <label>É destaque? </label>
               </div>

               <div class="entradaDeDados">
                  <input class="input" type="radio" name="destaque" value="true" > Sim
                  <input class="input" type="radio" name="destaque" value="false" checked> Não
               </div>
            </div>

            <div class="campos">
               <div class="cadastroDados">
                  <label>Sinopse</label>
               </div>

               <div class="entradaDeDados">
                  <textarea class="input" name="sinopse" id="" cols="30" rows="10"></textarea>
               </div>
            </div>
            
            <div class="campos">
               <div class="cadastroDados">
                  <label>Imagem</label>
               </div>

               <div class="entradaDeDados">
                  <input type="file" name="imagem" id="" accept=".jpg, .png, .jpeg">
               </div>
            </div>

            

            <div class="enviar">
               <input type="submit" name="btnEnviar" value="Salvar">
            </div>
         </form>
      </div>
      </section>

     
   </div>

</body>

</html>