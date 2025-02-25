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
        const questaoDiv = document.querySelector(".teste-feedback");
        const imagemgif = document.getElementById("imagegif");

        if(step == 0) {
            questaoDiv.innerText = ".";
            questaoDiv.style.color = "transparent";
            imagemgif.style.display = "none";
        }else if(step % 20 == 0) {
            questaoDiv.innerText = `Já respondeste a ${step} perguntas`;
            questaoDiv.style.color = "#4b4e6d";
            imagemgif.style.display = "block";
        }else{
            questaoDiv.innerText = ".";
            questaoDiv.style.color = "transparent";
            imagemgif.style.display = "none";
        }


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



const labels = ['Agricultura', 'Artes e Humanidades', 'Ciências', 'Ciêncas Sociais, Comércio e Direito', 'Educação', 'Engenharias, Indústrias e Construção', 'Saúde e Protecção Social', 'Serviços'];
const data = {
  labels: labels,
  datasets: [{
    label: 'Percentagem',
    data: [68, 70, 90, 10, 35, 50, 60, 20],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)',
      'rgb(100, 100, 100, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'rgb(100, 100, 100)'
    ],
    borderWidth: 1
  }]
};

const ctx = document.getElementById('myBarChart');

new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});



const data2 = {
  labels: labels,
  datasets: [{
    label: 'Áreas de Estudo',
    data: [68, 70, 90, 10, 35, 50, 60, 20],
    fill: true,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  }]
};

const ctx2 = document.getElementById('myRadarChart');

new Chart(ctx2, {
  type: 'radar',
  data: data,
  options: {
    elements: {
      line: {
        borderWidth: 3
      }
    }
  }
});





