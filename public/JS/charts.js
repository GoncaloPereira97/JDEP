// const labels = ['Agricultura', 'Artes e Humanidades', 'Ciências', 'Ciêncas Sociais, Comércio e Direito', 'Educação', 'Engenharias, Indústrias e Construção', 'Saúde e Protecção Social', 'Serviços'];
// const data = {
//   labels: labels,
//   datasets: [{
//     label: 'Percentagem',
//     data: [10, 70, 90, 15, 35, 50, 60, 20],
//     backgroundColor: [
//       'rgba(255, 99, 132, 0.2)',
//       'rgba(255, 159, 64, 0.2)',
//       'rgba(255, 205, 86, 0.2)',
//       'rgba(75, 192, 192, 0.2)',
//       'rgba(54, 162, 235, 0.2)',
//       'rgba(153, 102, 255, 0.2)',
//       'rgba(201, 203, 207, 0.2)',
//       'rgb(100, 100, 100, 0.2)'
//     ],
//     borderColor: [
//       'rgb(255, 99, 132)',
//       'rgb(255, 159, 64)',
//       'rgb(255, 205, 86)',
//       'rgb(75, 192, 192)',
//       'rgb(54, 162, 235)',
//       'rgb(153, 102, 255)',
//       'rgb(201, 203, 207)',
//       'rgb(100, 100, 100)'
//     ],
//     borderWidth: 1
//   }]
// };

// const ctx = document.getElementById('barChart');

// new Chart(ctx, {
//   type: 'bar',
//   data,
//   options: {
//     indexAxis: 'y',
//   }
// });



const ctx = document.getElementById('barChart');

new Chart(ctx, {
    type: 'bar',
    data,
    options: {
      indexAxis: 'y',
    }
});


const data2 = {
  labels: labels,
  datasets: [{
    label: 'Áreas de Estudo',
    data: [10, 70, 90, 15, 35, 50, 60, 20],
    fill: true,
    backgroundColor: 'rgba(255, 99, 132, 0.2)',
    borderColor: 'rgb(255, 99, 132)',
    pointBackgroundColor: 'rgb(255, 99, 132)',
    pointBorderColor: '#fff',
    pointHoverBackgroundColor: '#fff',
    pointHoverBorderColor: 'rgb(255, 99, 132)'
  }]
};

const ctx2 = document.getElementById('radarChart');

new Chart(ctx2, {
  type: 'radar',
  data: data2,
  options: {
    elements: {
      line: {
        borderWidth: 3
      }
    }
  }
});





// Área de Estudo: Agricultura
const dataAgricultura = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [50, 55],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxAgricultura = document.getElementById('chartAgricultura');

  new Chart(ctxAgricultura, {
    type: 'pie',
    data: dataAgricultura,
    options: {
      responsive: true,
    }
  });


  // Área de Estudo: Artes e Humanidades
  const dataArtesHumanidades = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [60, 40],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxArtesHumanidades = document.getElementById('chartArtesHumanidades');

  new Chart(ctxArtesHumanidades, {
    type: 'pie',
    data: dataArtesHumanidades,
    options: {
      responsive: true,
    }
  });



    // Área de Estudo: Artes e Humanidades
    const dataCiencias = {
        labels: ['Feminino', 'Masculino'],
        datasets: [{
          data: [60, 40],
          backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
        }]
      };

      const ctxCiencias = document.getElementById('chartCiencias');

      new Chart(ctxCiencias, {
        type: 'pie',
        data: dataCiencias,
        options: {
          responsive: true,
        }
      });



      // Área de Estudo: Ciências Sociais, Comércio e Direito
const dataCienciasSociais = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [40, 60],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxCienciasSociais = document.getElementById('chartCienciasSociais');

  new Chart(ctxCienciasSociais, {
    type: 'pie',
    data: dataCienciasSociais,
    options: {
      responsive: true,
    }
  });

// Área de Estudo: Educação
const dataEducacao = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [35, 65],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxEducacao = document.getElementById('chartEducacao');

  new Chart(ctxEducacao, {
    type: 'pie',
    data: dataEducacao,
    options: {
      responsive: true,
    }
  });

// Área de Estudo: Engenharias, Indústrias e Construção
const dataEngenharias = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [50, 50],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxEngenharias = document.getElementById('chartEngenharias');

  new Chart(ctxEngenharias, {
    type: 'pie',
    data: dataEngenharias,
    options: {
      responsive: true,
    }
  });

// Área de Estudo: Saúde e Protecção Social
const dataSaude = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [60, 40],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxSaude = document.getElementById('chartSaude');

  new Chart(ctxSaude, {
    type: 'pie',
    data: dataSaude,
    options: {
      responsive: true,
    }
  });


  // Área de Estudo: Serviços
const dataServicos = {
    labels: ['Feminino', 'Masculino'],
    datasets: [{
      data: [75, 25],
      backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)'],
      borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
    }]
  };

  const ctxServicos = document.getElementById('chartServicos');

  new Chart(ctxServicos, {
    type: 'pie',
    data: dataServicos,
    options: {
      responsive: true,
    }
  });




const data3 = {
    labels: labels,
    datasets: [{
      label: 'Geral',
      data: [25, 60, 70, 60, 55, 45, 60, 40],
      fill: true,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgb(75, 192, 192)',
      pointBackgroundColor: 'rgb(75, 192, 192)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(75, 192, 192)',
    },
      {
      label: 'Feminino',
      data: [50, 60, 40, 65, 70, 35, 50, 30],
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
      label: 'Masculino',
      data: [55, 40, 60, 35, 30, 65, 50, 70],
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      pointBackgroundColor: 'rgb(54, 162, 235)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(54, 162, 235)'
    }]
  };



  const ctx3 = document.getElementById('radarChartPorto');

  new Chart(ctx3, {
    type: 'radar',
    data: data3,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    }
  });



  const data4 = {
    labels: labels,
    datasets: [{
      label: 'Geral',
      data: [25, 60, 80, 60, 60, 70, 80, 40],
      fill: true,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgb(75, 192, 192)',
      pointBackgroundColor: 'rgb(75, 192, 192)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(75, 192, 192)',
    },
      {
      label: 'Feminino',
      data: [60, 50, 30, 65, 80, 35, 45, 25],
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
      label: 'Masculino',
      data: [40, 50, 70, 35, 20, 65, 55, 75],
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      pointBackgroundColor: 'rgb(54, 162, 235)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(54, 162, 235)'
    }]
  };



  const ctx4 = document.getElementById('radarChartLisboa');

  new Chart(ctx4, {
    type: 'radar',
    data: data4,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    }
  });




  const data5 = {
    labels: labels,
    datasets: [{
      label: 'Geral',
      data: [60, 60, 80, 20, 30, 40, 80, 50],
      fill: true,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgb(75, 192, 192)',
      pointBackgroundColor: 'rgb(75, 192, 192)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(75, 192, 192)',
    },
      {
      label: 'Feminino',
      data: [60, 50, 30, 60, 31, 35, 45, 25],
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }, {
      label: 'Masculino',
      data: [40, 50, 70, 40, 69, 65, 55, 75],
      fill: true,
      backgroundColor: 'rgba(54, 162, 235, 0.2)',
      borderColor: 'rgb(54, 162, 235)',
      pointBackgroundColor: 'rgb(54, 162, 235)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(54, 162, 235)'
    }]
  };


  const ctx5 = document.getElementById('radarChartBraga');

  new Chart(ctx5, {
    type: 'radar',
    data: data5,
    options: {
      elements: {
        line: {
          borderWidth: 3
        }
      }
    }
  });
