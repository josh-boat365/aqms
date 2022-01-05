<style>
    .chart-body{
        height: 40vh;
    }
    .chart-radio{
        width: 70%;
        margin: 0 auto;
        position: relative;
        bottom: 6.2rem;
    }
    .num-response{
        position: relative;
        bottom: 2.2rem;
        left: 4.4rem;
    }
    .chart-checkbox{
        width: 92%;
        margin: 0 auto;
        position: relative;
        right: 2rem;
        bottom: 2.2rem;
    }
</style>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">3 </span>Radio Choice Type
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>20 responses</h6>
    </div>
    <div class="chart-radio card-body chart-body pt-0">
        <canvas id="radioChoice"></canvas>
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">5 </span>Checkbox Type
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>15 responses</h6>
    </div>
    <div class="chart-checkbox card-body chart-body pt-0">
        <canvas id="checkboxChoice"></canvas>
        
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">6 </span>Dropdwon Choice Type
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>10 responses</h6>
    </div>
    <div class="chart card-body chart-body pt-0">
        <h1>NO ANALYTICS YET</h1>
        
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">2</span>Matrix Choice Type
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>30 responses</h6>
    </div>
    <div class="chart card-body chart-body pt-0">
        <h1>NO ANALYTICS YET</h1>
        
    </div>

</div>

{{-- Pie chart for radio choice response type --}}
<script>

const data = {
    labels: ['Male','Female', 'Prefer Not to say', 'other', 'He', 'She', 'Him','With', 'Are', 'No'],
    datasets: [{
        data: [300, 600, 10, 5,23,34,56,12,23,24],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
    }, ],

};

//config for pie chart with radio choices
const config_pie_radio = {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
       plugins:{
        legend:{
            display: true,
            position: "right"
        },
        tooltip:{
            enabled: true
        },
        datalabels:{
            align: 'center',
            formatter: (value, context) =>{
                //console.log(value)
                //console.log(context.chart.data.datasets[0].data)
                const datapoints = context.chart.data.datasets[0].data;
                function totalSum( total, datapoint){
                    return total + datapoint;
                }
                const totalValue = datapoints.reduce(totalSum, 0);
                const percentageValue = (value/ totalValue * 100).toFixed(0);
                const displayData = [`${value}`,`(${percentageValue}%)`]
                return displayData;
            }
        }
       },
    },
    plugins:[ChartDataLabels]
};

//config for bar chart with checkbox type choices
const config_checkbox = {
      type: 'bar',
      data,
      options: {
        responsive: true,
            plugins:{
                legend:{
                    display: false,
                    position: "right"
                }
            },
        indexAxis: 'y',    
        scales: {
          y: {
            beginAtZero: true
          }
        },
        datalabels:{
            align: 'top',
            anchor: 'end',
            // formatter: (value, context) =>{
            //     //console.log(value)
            //     //console.log(context.chart.data.datasets[0].data)
            //     const datapoints = context.chart.data.datasets[0].data;
            //     function totalSum( total, datapoint){
            //         return total + datapoint;
            //     }
            //     const totalValue = datapoints.reduce(totalSum, 0);
            //     const percentageValue = (value/ totalValue * 100).toFixed(0);
            //     const displayData = [`${value}`,`(${percentageValue}%)`]
            //     return displayData;
            // }
        }
      },
      plugins:[ChartDataLabels]
    };

//render pie chart
const radioChoice = new Chart(document.getElementById('radioChoice'), config_pie_radio);

//render bar chart
const checkboxChoice = new Chart(document.getElementById('checkboxChoice'), config_checkbox);
</script>

{{-- Bar for checkbox choice response type
<script>
const barCheckbox = document.getElementById('checkboxChoice').getContext('2d');
const data_checkbox = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config_checkbox = {
      type: 'bar',
      data_checkbox,
      options: {
        responsive: true,
            plugins:{
                legend:{
                    display: true,
                    position: "right"
                }
            },
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

const checkboxChoice = new Chart(barCheckbox, config_checkbox);
</script>
 --}}
