$(function () {
    /* ChartJS
    * -------
    * Here we will create a few charts using ChartJS
    */
    //-------------
    //- LINE CHART -
    //--------------
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          data                : [130, 128.5, 126.2, 123, 115, 105, 95]
        },
        
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    var lineChartCanvas = $('#lineChart');
    var lineChartOptions = $.extend(true, {}, areaChartOptions);
    var lineChartData = $.extend(true, {}, areaChartData);
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false;

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: {
        datasets:[
          {
            label               : 'Avance',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius         : true,
            pointColor          : '#000000',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
          }
        ]
      },
      options: lineChartOptions
    });
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart');
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var piechart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: {
        labels: [
            '+ 30 - OBESIDAD',
            '25.0-29.9 - SOBREPESO',
            '18.5-24.9 - PESO NORMAL',
            '- 18.5 PESO BAJO',
        ],
        datasets: [
          {
            backgroundColor : ['#f56954', '#f39c12', '#00a65a', '#00c0ef'],
          }
        ]
      },
      options: {
        maintainAspectRatio : false,
        responsive : true,
      }
    });

    function imc(){
      id = $('#pieChart').data('id');
      $.ajax({
          type:'GET',
          url:'controller/statsController.php',
          data:'id='+id+'&accion=imc',
          success:function(respuesta){
              var resp = $.parseJSON(respuesta);
              if(resp.respuesta == 'exito'){
                  let indice = parseFloat(resp.peso) / Math.pow(parseFloat(resp.altura), 2);
                  if(indice > 30){
                      piechart.data['datasets'][0].data.push(indice, 0, 0, 0);
                  } else if(indice >= 25 & indice <= 29.9){
                      piechart.data['datasets'][0].data.push(0, indice, 0, 0);
                  }else if(indice >= 18.5 & indice <= 24.9){
                      piechart.data['datasets'][0].data.push(0, 0, indice, 0);
                  }else{
                      piechart.data['datasets'][0].data.push(0, 0, 0, indice);
                  }
              }
          },
          error:function(respuesta){
              console.log(respuesta);
          }
      });

      $.ajax({
        type:'GET',
        url:'controller/statsController.php',
        data:'id='+id+'&accion=avance',
        success:function(respuesta){
            var resp = $.parseJSON(respuesta);
            if(resp.respuesta == 'error'){
                console.log(resp.error);
            }else{
                for(data of resp){
                  lineChart.data['labels'].push(data.fecha);
                  lineChart.data['datasets'][0].data.push(data.peso);
                }
            }
        },
        error:function(respuesta){
            console.log(respuesta);
        }
    });
    }

    imc();
});