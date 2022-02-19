<style>
    .card-matrixChoice{
        height: 28% !important;
    }
    .chart-body{
        height: 40vh;
    }
    .chart-radio{
        width: 79%;
        margin: 0 auto;
        position: relative;
        bottom: 8.2rem;
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
    .toggle-chart{
        position: relative;
        z-index: 2;
    }
    .toggled-table{
        position: relative;
        top: 7rem;
        left: -1rem;
    }
    .table-scroll-q{
        height: 40vh;
        overflow-x: auto;
        overflow-y: auto;
    }
     .t-head-q{
         background-color: #00365a;
         color: white;
         border-top-left-radius: 5px;
         border-bottom-left-radius: 5px;
     }
     .alyt-table-q td{
         border: 1px solid gray;
     }
</style>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">3 </span>Radio Choice Type
            </div>
        </div>
            <!-- Toggle view for chart -->
            <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
                <button class="btn btn-outline-theme-3 icon-button" id="twelveth-tab" data-toggle="tab" href="#twelveth" role="tab" aria-controls="twelveth" aria-selected="false">
                    <i class="iconsminds-pie-chart-3"></i>
                </button>  
            </div> 
            <!-- Toggle view for table -->
            <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
                <button class="btn btn-outline-theme-3 icon-button" id="thirteenth-tab" data-toggle="tab" href="#thirteenth" role="tab" aria-controls="thirteenth" aria-selected="false">
                    <i class="iconsminds-align-justify-all"></i>
                </button>  
            </div> 
        <!-- button for copying/downloading     -->
        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown" >
                <i class="iconsminds-files"></i>
            </button> 
             <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">copy chart</a>
                    <a href="#" class="dropdown-item"> As jpeg file</a>
                    <a href="#" class="dropdown-item"> As excel file</a>
                </div>
        </div>
        </div>
    </div>
    <div class="num-response">
        <h6>20 responses</h6>
    </div>
    <div class="chart-radio card-body chart-body pt-0">
    <div class="tab-content mb-4">
        <div class="tab-pane show active" id="twelveth" role="tabpanel" aria-labelledby="twelvwth-tab">
            <div class="row">
             <canvas id="radioChoice"></canvas>
            </div>
        </div>


        <div class="tab-pane show" id="thirteenth" role="tabpanel" aria-labelledby="thirteenth-tab">
            <div class=" col-12">
             <div class="toggled-table table-scroll-q">
                 <table class="col-12 table table-hover alyt-table-q">
                     <thead class="t-head-q">
                         <tr>
                         <th class="col-1">#</th>
                         <th class="col-3">Number of Choices</th>
                         <th class="col-8">Answer</th>
                         </tr>
                     </thead>
                     <tbody>
                         <tr>
                             <td>1</td>
                             <td>50</td>
                             <td>Male</td>
                         </tr>
                         <tr>
                             <td>2</td>
                             <td>50</td>
                             <td>Female</td>
                         </tr>
                         <tr>
                             <td>3</td>
                             <td>50</td>
                             <td>Prefer Not to say</td>
                         </tr>
                         <tr>
                             <td>4</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, nisi!</td>
                         </tr>
                         <tr>
                             <td>5</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet.</td>
                         </tr>
                         <tr>
                             <td>6</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit.</td>
                         </tr>
                         <tr>
                             <td>7</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quas excepturi non fugiat quis veritatis temporibus, voluptate, nulla quam animi perspiciatis labore eum? Tenetur voluptatibus, nobis quaerat nam accusantium delectus.</td>
                         </tr>
                         <tr>
                             <td>8</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, explicabo.</td>
                         </tr>
                         <tr>
                             <td>9</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</td>
                         </tr>
                         <tr>
                             <td>10</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptas error vel unde nemo vitae ipsa minima quae doloribus, et ea provident aliquid obcaecati! Vero quae harum vitae qui non?</td>
                         </tr>
                         <tr>
                             <td>11</td>
                             <td>50</td>
                             <td>Male</td>
                         </tr>
                         <tr>
                             <td>12</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet.</td>
                         </tr>
                         <tr>
                             <td>13</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                         </tr>
                         <tr>
                             <td>14</td>
                             <td>50</td>
                             <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
            </div>
        </div>

    </div>    
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">5 </span>Checkbox Type
            </div>
        </div>

         <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="sixth-tab" data-toggle="tab" href="#sixth" role="tab" aria-controls="sixth" aria-selected="false">
                 <i class="simple-icon-chart"></i>
            </button>  
        </div> 
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="seventh-tab" data-toggle="tab" href="#seventh" role="tab" aria-controls="seventh" aria-selected="false">
                 <i class="iconsminds-align-justify-all"></i>
            </button>  
        </div> 

        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button> 
              <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Copy chart</a>
                    <a href="#" class="dropdown-item">As jpeg file</a>
                    <a href="#" class="dropdown-item">As excel file</a>
                </div>
        </div>
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

         <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="eighth-tab" data-toggle="tab" href="#eighth" role="tab" aria-controls="eighth" aria-selected="false">
                 <i class="iconsminds-pie-chart-3"></i>
            </button>  
        </div> 
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="nineth-tab" data-toggle="tab" href="#nineth" role="tab" aria-controls="nineth" aria-selected="false">
                 <i class="iconsminds-align-justify-all"></i>
            </button>  
        </div> 


        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button> 
               <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Copy chart</a>
                    <a href="#" class="dropdown-item">As jpeg file</a>
                    <a href="#" class="dropdown-item">As excel file</a>
                </div>
        </div>
        </div>
    </div>
    <div class="num-response">
        <h6>10 responses</h6>
    </div>
    <div class="chart-radio card-body chart-body pt-0">
        <canvas id="dropdownChoice"></canvas>
    </div>

</div>

<div class="card card-matrixChoice question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                <span class="heading-number d-inline-block">2</span>Matrix Choice Type
            </div>
        </div>

         <!-- Toggle view for chart -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="tenth-tab" data-toggle="tab" href="#tenth" role="tab" aria-controls="tenth" aria-selected="false">
                 <i class="simple-icon-chart"></i>
            </button>  
        </div> 
        <!-- Toggle view for table -->
        <div class="custom-control toggle-chart custom-checkbox pl-1 align-self-center pr-0">
            <button class="btn btn-outline-theme-3 icon-button" id="eleventh-tab" data-toggle="tab" href="#eleventh" role="tab" aria-controls="eleventh" aria-selected="false">
                 <i class="iconsminds-align-justify-all"></i>
            </button>  
        </div> 


        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                <i class="iconsminds-files"></i>
            </button> 
                 <div class="dropdown-menu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Copy chart</a>
                    <a href="#" class="dropdown-item">As jpeg file</a>
                    <a href="#" class="dropdown-item">As excel file</a>
                </div>
        </div>
        </div>
    </div>
    <div class="num-response">
        <h6>30 responses</h6>
    </div>
    <div class="chart card-body chart-body pt-0">
        <canvas id="matrixChoice"></canvas>
        
    </div>

</div>

{{-- Pie chart for radio choice response type --}}
<script>

const data = {
    labels: [
        'Male','Female', 'Prefer Not to say', 'other', 'He', 'She', 'Him','With', 'Are',
         'josh', 'josh is the best of all time', 'kay is a mentor at casvalabs', 'i am happy about it', 'python'
         
        ],
    datasets: [{
        data: [20, 60, 10, 5,23,34,56,12,23,24,11,12,13,14],
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
                'rgba(225, 69, 0, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                //added colors
                'rgb(99, 225, 222)',
                'rgb(255, 73, 112)',
                'rgb(149, 149, 149)',
                'rgb(142, 77, 250)',
                'rgb(80, 19, 192)',
                'rgb(19, 225, 82)',
                'rgb(225, 69, 0)'
            ],
            borderWidth: 2,
            hoverOffset: 5,
            // datalabels:{
            //     align: 'top',
            //     anchor: 'end',
            //     offset: 8
            // }
    }, ],

};


//config for pie chart with radio choices
const config_pie_radio = {
    type: 'doughnut',
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
            
        indexAxis: 'y',    
        scales: {
          y: {
            beginAtZero: true
          }
        },
      
    },
      plugins:[ChartDataLabels]
};

//config for muti-bar chart for matrix/grid choice response type
const config_matrix = {
      type: 'bar',
      data:{
            labels: [
            'Practical skills','Subject knowledge', 'Creativity and innovation',
            'Critical thinking skills', 'Educational background', 'Programme of study', 
            'Work experience', 'Basic computer literacy', 'Oral communication',  'Team work',
            'Written communication', 'Entrepreneurial skills', 'Ethics (Loyalty, integrity)',  
            ],
        datasets: [
            {
            label: 'Not Important',
            data: [20, 60, 10, 5,23,34,56,12,23,24,11,12,13],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    
                ],
                borderColor: [
                    'rgb(225, 99, 132)',
                    
                ],
                borderWidth: 2,
                hoverOffset: 5,
            
                
        }, {
            label: 'Fairly Important',
            data: [10, 50, 70, 15,13,24,36,2,63,84,31,19,73],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)'//blue
                    
                ],
                borderColor: [
                    'rgb(54, 162, 235)'
                    
                ],
                borderWidth: 2,
                hoverOffset: 5,

        },
        {
            label: 'Highly Important',
            data: [30, 20, 19, 51,3,4,6,19,25,29,1,38,3],
                backgroundColor: [
                    'rgba(142, 77, 250, 0.2)',//voilet 
                ],
                borderColor: [
                    'rgb(142, 77, 250)'
                ],
                borderWidth: 2,
                hoverOffset: 5,

        },
            
        ]
      },
      options: {
        responsive: true,
            plugins:{
                legend:{
                    display: true,
                    position: "top"
                }
            },
        // indexAxis: 'y',    
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
    //   plugins:[ChartDataLabels]
    };


//render pie chart for radio choice types
const radioChoice = new Chart(document.getElementById('radioChoice'), config_pie_radio);
//render pie chart for dropdown choice types
const dropdownChoice = new Chart(document.getElementById('dropdownChoice'), config_pie_radio);

//render bar chart
const checkboxChoice = new Chart(document.getElementById('checkboxChoice'), config_checkbox);
//render multi-bar chart
const matrixChoice = new Chart(document.getElementById('matrixChoice'), config_matrix);
</script>

