'use strict';

//Função para criar os cards dos livros
const criarCard = (livro) => {
  const card = document.createElement('div');
  card.classList.add('card-streaming');

  card.innerHTML = `
      <div class="imagem-produto">
          <img class="imagem" src="${livro.imagem}" alt="${livro.nome}">
      </div>

      <div class="container-informacoes">
          <p class="preco">${livro.valor}</p>
          <p class="pequena-descricao">${livro.pequena_descricao}</p>
     </div>

      <div class="saiba-mais">
          <a href="#">
                <img src="./img/olho-saiba-mais.png" alt="">
          </a>
      </div>
      `;
  return card;
};

const carregarLivros = (livros) => {
  const container = document.querySelector('.containeer-produtos');

  const cards = produtos.map(criarCard);

  container.replaceChildres(...cards);
};

carregarProdutos(db);
