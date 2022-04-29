'use strict';

//Função para criar os cards dos livros
const criarCard = (livro) => {
  const card = document.createElement('div');
  card.classList.add('card-streaming');

  card.innerHTML = `
      
      `;
  return card;
};

const carregarLivros = (livros) => {
  const container = document.querySelector('.container-produtos');

  const cards = produtos.map(criarCard);

  container.replaceChildres(...cards);
};

carregarProdutos(db);
