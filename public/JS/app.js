const formTest = document.querySelector('#form-teste');

if (formTest!==null) {
    formTest.addEventListener('submit', function(e) {
        e.preventDefault()
    });
}


// Evento com função que só ocorre quando a página estiver totalmente carregada através do uso do DOMContentLoaded
document.addEventListener("DOMContentLoaded", function () {
    const perguntas = document.querySelectorAll(".pergunta");
    const totalPerguntas = perguntas.length;
    let currentStep = 0;
    const progressBar = document.querySelector(".progress");

    const showStep = (step) => {
        perguntas.forEach(function (pergunta, index) {
            if (index === step) {
                pergunta.style.display = "block";
            } else {
                pergunta.style.display = "none";
            }
        });

        // Atualiza a barra de progresso
        const progressWidth = ((step + 1) / totalPerguntas) * 100;
        progressBar.style.width = progressWidth + "%";

        // Sinalizar que passou de um x número de perguntas
        const body = document.querySelector(".teste-vocacional");
        const animation = document.querySelector(".animation-questions");
        const animationP = document.querySelector("#animationP");
        const animationImg = document.querySelector("#imagegif");

    };

    const nextStep = () => {
        if (currentStep < totalPerguntas - 1) {
            currentStep++;
            showStep(currentStep);
        }
    };

    const previousStep = () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    };

    const previousButtons = document.querySelectorAll(".previous");

    // Eliminar botão anterior da 1ª pergunta
    previousButtons[0].disabled = true;
    previousButtons[0].classList.add('btn-disabled')
    previousButtons[0].style.backgroundColor = 'transparent'
    previousButtons[0].style.border = 'none'

    // Evento de clique sobre o botão previous
    previousButtons.forEach((previousButton) => {
        previousButton.addEventListener("click", function () {
            previousStep();
        });
    });

    showStep(currentStep);

    // Adicionar o evento de clique às respostas (respostas funcionam como next button)
    const respostaButtons = document.querySelectorAll(".pergunta input[type=radio]");
    respostaButtons.forEach((respostaButton) => {
        respostaButton.addEventListener("click", function () {
            nextStep();
        });
    });
});


const pesquisarButton = document.querySelector('#pesquisarButton');
const distritoSearchInput = document.querySelector('#distritoSearch');

// Adicione um evento de clique ao botão de pesquisa
if(pesquisarButton){
pesquisarButton.addEventListener('click', filterResults);
}

// Adicione um evento de tecla para o campo de input


if(distritoSearchInput){
distritoSearchInput.addEventListener('keyup', function (event) {
  if (event.key === 'Enter') {
    filterResults();
  }
});
}

function filterResults() {
  const inputText = distritoSearchInput.value.toLowerCase();
  const distritoElements = document.querySelectorAll('.distrito');
  const searchMessage = document.querySelector('.message-search-distrito');
  let isDistritoFound = false;

  distritoElements.forEach(element => {
    const distritoName = element.innerText.toLowerCase();
    const parentElement = element.parentElement;

    parentElement.style.display = 'none';

    if (distritoName.includes(inputText)) {
      parentElement.style.display = 'block';
      isDistritoFound = true;
    } else {
      parentElement.style.display = 'none';
    }
  });

  if (!isDistritoFound) {
    searchMessage.innerText = 'Distrito não encontrado';
  } else {
    searchMessage.innerText = '';
  }
}
