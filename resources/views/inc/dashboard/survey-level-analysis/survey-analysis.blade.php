<style>
    .card-matrixChoice{
        height: 28% !important;
    }
    .chart-body{
        height: 40vh;
    }
    .gender-chart{
            width: 45%;
            margin: 0 auto;
            position: relative;
            bottom: 6.2rem;
    }
    .num-response{
        position: relative;
        bottom: 2.2rem;
        left: 4.4rem;
    }
    .department-chart{
        width: 92%;
        height: 61vh;
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
                    Gender
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
        <div class="num-response">
        <h6>60 Participants</h6>
        </div>
    <div class="gender-chart card-body chart-body pt-0">
        <canvas id="genderChart"></canvas>
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Sessions
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>30 Participants</h6>
    </div>
    <div class="gender-chart card-body chart-body pt-0">
        <canvas id="sessionsChart"></canvas>
        
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Departments
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>10 Participants</h6>
    </div>
    <div class="department-chart card-body chart-body pt-0">
        <canvas id="departmentsChart"></canvas>
    </div>

</div>

<div class="card card-matrixChoice question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Year Group
            </div>
        </div>
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button">
                <i class="iconsminds-files"></i>
            </button> 
        </div>
    </div>
    <div class="num-response">
        <h6>64 Participants</h6>
    </div>
    <div class="chart department-chart card-body chart-body pt-0">
        <canvas id="yearGroupChart"></canvas>
        
    </div>

</div>

{{-- Pie chart for radio choice response type --}}
<script>
//config for pie chart for gender
const config_genderChart = {
    type: 'doughnut',
    data: {
    labels: ['Male','Female'],
    datasets: [{
        data: [20, 60],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                // 'rgba(255, 205, 86, 0.2)',
                // 'rgba(75, 192, 192, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(201, 203, 207, 0.2)',
                //added colors
                // 'rgba(99, 225, 222, 0.2)',
                // 'rgba(255, 73, 112, 0.2)',
                // 'rgba(149, 149, 149, 0.2)',
                // 'rgba(142, 77, 250, 0.2)',
                // 'rgba(80, 19, 192, 0.2)',
                // 'rgba(19, 225, 82, 0.2)',
                // 'rgba(225, 69, 0, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                // 'rgb(255, 205, 86)',
                // 'rgb(75, 192, 192)',
                // 'rgb(54, 162, 235)',
                // 'rgb(153, 102, 255)',
                // 'rgb(201, 203, 207)',
                //added colors
                // 'rgb(99, 225, 222)',
                // 'rgb(255, 73, 112)',
                // 'rgb(149, 149, 149)',
                // 'rgb(142, 77, 250)',
                // 'rgb(80, 19, 192)',
                // 'rgb(19, 225, 82)',
                // 'rgb(225, 69, 0)'
            ],
            borderWidth: 2,
            hoverOffset: 5,
            // datalabels:{
            //     align: 'top',
            //     anchor: 'end',
            //     offset: 8
            // }
    }, ],

},
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
//config for pie chart for gender
const config_sessionsChart = {
    type: 'doughnut',
    data: {
    labels: ['Full-time','Part-time'],
    datasets: [{
        data: [120, 60],
            backgroundColor: [
                // 'rgba(255, 99, 132, 0.2)',
                // 'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                // 'rgba(153, 102, 255, 0.2)',
                // 'rgba(201, 203, 207, 0.2)',
                //added colors
                // 'rgba(99, 225, 222, 0.2)',
                // 'rgba(255, 73, 112, 0.2)',
                // 'rgba(149, 149, 149, 0.2)',
                // 'rgba(142, 77, 250, 0.2)',
                // 'rgba(80, 19, 192, 0.2)',
                // 'rgba(19, 225, 82, 0.2)',
                // 'rgba(225, 69, 0, 0.2)'
            ],
            borderColor: [
                // 'rgb(255, 99, 132)',
                // 'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                // 'rgb(54, 162, 235)',
                // 'rgb(153, 102, 255)',
                // 'rgb(201, 203, 207)',
                //added colors
                // 'rgb(99, 225, 222)',
                // 'rgb(255, 73, 112)',
                // 'rgb(149, 149, 149)',
                // 'rgb(142, 77, 250)',
                // 'rgb(80, 19, 192)',
                // 'rgb(19, 225, 82)',
                // 'rgb(225, 69, 0)'
            ],
            borderWidth: 2,
            hoverOffset: 5,
            // datalabels:{
            //     align: 'top',
            //     anchor: 'end',
            //     offset: 8
            // }
    }, ],

},
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

//config for bar for departments
const config_departmentsChart = {
      type: 'bar',
      data: {
    labels: ['Accounting and Finance', 'Applied Mathematics and Statistics', 'Civil Engineering', 'Electrical and Electronic Engineering', 
            'Fashion Design and Textiles', 'Interior Design and Upholstery Technology','Liberal Studies and Communications Technology', 'Management and Public Administration', 'Marketing', 'Medical Laboratory Technology', 'Procurement and Supply Chain', 'Science Laboratory Technology', 'Hotel Catering and Industrial Management' ],
    datasets: [{
        data: [120, 60, 78, 78, 90, 12, 45, 30, 22, 10, 32, 54],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
                //added colors
                'rgba(99, 225, 222, 0.2)',
                'rgba(255, 73, 112, 0.2)',
                'rgba(149, 149, 149, 0.2)',
                'rgba(142, 77, 250, 0.2)',
                'rgba(80, 19, 192, 0.2)',
                'rgba(19, 225, 82, 0.2)',
                // 'rgba(225, 69, 0, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                // added colors
                'rgb(99, 225, 222)',
                'rgb(255, 73, 112)',
                'rgb(149, 149, 149)',
                'rgb(142, 77, 250)',
                'rgb(80, 19, 192)',
                'rgb(19, 225, 82)',
                // 'rgb(225, 69, 0)'
            ],
            borderWidth: 2,
            hoverOffset: 5,
            // datalabels:{
            //     align: 'top',
            //     anchor: 'end',
            //     offset: 8
            // }
    }, ],

},
      options: {
        responsive: true,
            plugins:{
                labels:{
                    render: 'percentage',
                    showActualPercentages: true,
                    precision: 0
                },
                legend:{
                    display: false,
                    position: "right"
                },
            //     datalabels:{
            //     formatter: (value, datainfo) =>{
            //     console.log(value)
            //     console.log(datainfo.chart.data.datasets[1].data)
            //     const datavalues = datainfo.chart.data.datasets[1].data;
            //     function totalSum( total, datavalues){
            //         return total + datavalues;
            //     }
            //     const totalValue1 = datavalues.reduce(totalSum, 0);
            //     const percentageValue1 = (value/ totalValue1 * 100).toFixed(0);
            //     const displayData1 = [`${value}`,`(${percentageValue1}%)`]
            //     return displayData;
            // }

            // }
            },
            tooltip:{
                enabled: true,
            },
            
        indexAxis: 'x',    
        scales: {
          y: {
            beginAtZero: true
          }
        },
      
    },
      plugins:[ChartDataLabels]
};

// config for year group
const config_yearGroupChart = {
      type: 'bar',
      data: {
    labels: ['2020', '2019', '2018', '2017', '2016', '2015', '2014', '2013', '2012', '2011', '2010', 
              '2009', '2008', '2007', '2006', '2005', '2004', '2003', '2002', '2001', '2000', 'Before 2022'],
    datasets: [{
        data: [120, 60, 78, 78, 90, 12, 45, 30, 22, 10, 32, 54,100,300,234,28,56,16,90,78,86,95],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
                //added colors
                'rgba(99, 225, 222, 0.2)',
                'rgba(255, 73, 112, 0.2)',
                'rgba(149, 149, 149, 0.2)',
                'rgba(142, 77, 250, 0.2)',
                'rgba(80, 19, 192, 0.2)',
                'rgba(19, 225, 82, 0.2)',
                'rgba(225, 69, 0, 0.2)',
                //newly added colors
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
                 'rgba(99, 225, 222, 0.2)',
                'rgba(255, 73, 112, 0.2)',
                'rgba(149, 149, 149, 0.2)',
                'rgba(142, 77, 250, 0.2)',
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                // added colors
                'rgb(99, 225, 222)',
                'rgb(255, 73, 112)',
                'rgb(149, 149, 149)',
                'rgb(142, 77, 250)',
                'rgb(80, 19, 192)',
                'rgb(19, 225, 82)',
                'rgb(225, 69, 0)',
                //newly added colors
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                 'rgb(99, 225, 222)',
                'rgb(255, 73, 112)',
                'rgb(149, 149, 149)',
                'rgb(142, 77, 250)',
            ],
            borderWidth: 2,
            hoverOffset: 5,
            // datalabels:{
            //     align: 'top',
            //     anchor: 'end',
            //     offset: 8
            // }
    }, ],

},
      options: {
        responsive: true,
            plugins:{
                labels:{
                    render: 'percentage',
                    showActualPercentages: true,
                    precision: 0
                },
                legend:{
                    display: false,
                    position: "right"
                },
            //     datalabels:{
            //     formatter: (value, datainfo) =>{
            //     console.log(value)
            //     console.log(datainfo.chart.data.datasets[1].data)
            //     const datavalues = datainfo.chart.data.datasets[1].data;
            //     function totalSum( total, datavalues){
            //         return total + datavalues;
            //     }
            //     const totalValue1 = datavalues.reduce(totalSum, 0);
            //     const percentageValue1 = (value/ totalValue1 * 100).toFixed(0);
            //     const displayData1 = [`${value}`,`(${percentageValue1}%)`]
            //     return displayData;
            // }

            // }
            },
            tooltip:{
                enabled: true,
            },
            
        indexAxis: 'x',    
        scales: {
          y: {
            beginAtZero: true
          }
        },
      
    },
      plugins:[ChartDataLabels]
};


//render doughnurt chart for gender
const genderChart = new Chart(document.getElementById('genderChart'), config_genderChart).getContext("2d");
//render doughnurt chart for dropdown choice types
const sessionsChart = new Chart(document.getElementById('sessionsChart'), config_sessionsChart).getContext("2d");

// //render bar chart
const departmentsCharts = new Chart(document.getElementById('departmentsChart'), config_departmentsChart).getContext("2d");
// //render bar
const yearGroupChart = new Chart(document.getElementById('yearGroupChart'), config_yearGroupChart).getContext("2d");
</script>

