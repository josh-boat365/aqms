<style>
    .card-matrixChoice {
        height: 28% !important;
    }

    .chart-body {
        height: 40vh;
    }

    .gender-chart {
        width: 45%;
        margin: 0 auto;
        position: relative;
        bottom: 6.2rem;
    }

    .num-response {
        position: relative;
        bottom: 2.2rem;
        left: 4.4rem;
    }

    .department-chart {
        width: 92%;
        height: 61vh;
        margin: 0 auto;
        position: relative;
        right: 2rem;
        bottom: 2.2rem;
    }

    .timeLine-chart {
        width: 96%;
        height: 61vh;
        margin: 0 auto;
        position: relative;
        right: 2rem;
        bottom: 2.2rem;
    }

</style>


<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Gender
            </div>
        </div>
        {{-- <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
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
        </div> --}}
    </div>
    <div class="num-response">
        <h6>{{ $survey->submissions->count() }} @if ($survey->submissions->count() == 1)
                Participant
            @else
                Participant
            @endif
        </h6>
    </div>
    <div class="gender-chart card-body chart-body pt-0">
        <canvas id="genderChart"></canvas>
    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Sessions
            </div>
        </div>
        {{-- <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
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
        </div> --}}
    </div>
    <div class="num-response">
        <h6>{{ $survey->submissions->count() }} @if ($survey->submissions->count() == 1)
                Participant
            @else
                Participant
            @endif
        </h6>
    </div>
    <div class="gender-chart card-body chart-body pt-0">
        <canvas id="sessionsChart"></canvas>

    </div>

</div>

<div class="card question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Departments
            </div>
        </div>
        {{-- <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
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
        </div> --}}
    </div>
    <div class="num-response">
        {{-- // TODO: --}}
        {{-- <h6>XX Participants</h6> --}}
        <h6>{{ $survey->submissions->count() }} @if ($survey->submissions->count() == 1)
                Participant
            @else
                Participant
            @endif
        </h6>
    </div>
    <div class="department-chart card-body chart-body pt-0">
        <canvas id="departmentsChart"></canvas>
    </div>

</div>

<div class="card card-matrixChoice question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Year Group
            </div>
        </div>
        {{-- <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
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

        </div> --}}
    </div>
    <div class="num-response">
        {{-- <h6>XX Participants</h6> --}}
        <h6>{{ $survey->submissions->count() }} @if ($survey->submissions->count() == 1)
                Participant
            @else
                Participant
            @endif
        </h6>
    </div>
    <div class="chart department-chart card-body chart-body pt-0">
        <canvas id="yearGroupChart"></canvas>
    </div>
</div>

<div class="card card-matrixChoice question d-flex mb-4 edit-quesiton">
    <div class="d-flex flex-grow-1 min-width-zero">
        <div
            class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
            <div class="list-item-heading mb-0 truncate w-80 mb-1 mt-1">
                Survey TimeLine
            </div>
        </div>
        {{-- <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
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

        </div> --}}
    </div>
    <!-- <div class="num-response">
        <h6>64 Participants</h6>
    </div> -->
    <div class="chart timeLine-chart card-body chart-body pt-0">
        <canvas id="timeLineChart"></canvas>
    </div>


    {{-- Pie chart for radio choice response type --}}
    <script>
        //config for pie chart for gender
        console.log({{ $users->where('gender', 'Male')->count() }});
        console.log({{ $users->where('gender', 'Female')->count() }});
        const config_genderChart = {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    data: [{{ $users->where('gender', 'Male')->count() }},
                        {{ $users->where('gender', 'Female')->count() }}
                    ],
                    // data: [0, 0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
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
                plugins: {
                    legend: {
                        display: true,
                        position: "right"
                    },
                    tooltip: {
                        enabled: true
                    },
                    datalabels: {
                        align: 'center',
                        formatter: (value, context) => {
                            //console.log(value)
                            //console.log(context.chart.data.datasets[0].data)
                            const datapoints = context.chart.data.datasets[0].data;

                            function totalSum(total, datapoint) {
                                return total + datapoint;
                            }
                            const totalValue = datapoints.reduce(totalSum, 0);
                            const percentageValue = (value / totalValue * 100).toFixed(0);
                            const displayData = [`${value}`, `(${percentageValue}%)`]
                            return displayData;
                        }
                    }
                },
            },
            plugins: [ChartDataLabels]
        };


        //config for pie chart for gender
        const config_sessionsChart = {
            type: 'doughnut',
            data: {
                labels: ['Full-time', 'Part-time'],
                datasets: [{
                    data: [120, 60],
                    backgroundColor: [
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
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
                plugins: {
                    legend: {
                        display: true,
                        position: "right"
                    },
                    tooltip: {
                        enabled: true
                    },
                    datalabels: {
                        align: 'center',
                        formatter: (value, context) => {
                            //console.log(value)
                            //console.log(context.chart.data.datasets[0].data)
                            const datapoints = context.chart.data.datasets[0].data;

                            function totalSum(total, datapoint) {
                                return total + datapoint;
                            }
                            const totalValue = datapoints.reduce(totalSum, 0);
                            const percentageValue = (value / totalValue * 100).toFixed(0);
                            const displayData = [`${value}`, `(${percentageValue}%)`]
                            return displayData;
                        }
                    }
                },
            },
            plugins: [ChartDataLabels]
        };

        //config for bar for departments
        const config_departmentsChart = {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($all_departments_of_study as $department)
                        "{{ $department }}",
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach ($all_departments_of_study as $department)
                            {{ $users->where('department_of_study', $department)->count() }},
                        @endforeach
                        // 120, 60, 78, 78, 90, 12, 45, 30, 22, 10, 32, 54
                    ],
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
                plugins: {
                    labels: {
                        render: 'percentage',
                        showActualPercentages: true,
                        precision: 0
                    },
                    legend: {
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
                tooltip: {
                    enabled: true,
                },

                indexAxis: 'x',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

            },
            plugins: [ChartDataLabels]
        };

        // 

        // config for year group
        const config_yearGroupChart = {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($year_range as $year)
                        '{{ $year }}',
                    @endforeach 'before {{ $year_range[count($year_range) - 1] }}'
                ],
                datasets: [{
                    data: [
                        @foreach ($year_range as $year)
                            {{$users->where('year_of_completion', $year)->count()}},
                        @endforeach
                        {{$users->where('year_of_completion', '!=', null)->where('year_of_completion', '=', $last_year)->count()}},
                    ],
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
                plugins: {
                    labels: {
                        render: 'percentage',
                        showActualPercentages: true,
                        precision: 0
                    },
                    legend: {
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
                tooltip: {
                    enabled: true,
                },

                indexAxis: 'x',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

            },
            plugins: [ChartDataLabels]
        };

        //config for time-line chart
        const config_timeLineChart = {
            type: 'line',
            data: {
                labels: [
                    'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'
                ],
                datasets: [{
                    data: [
                        @for($ind = 1; $ind <= 12; $ind++)
                            {{$submissionsTable->whereMonth('created_at', $ind)->count()}},
                        @endfor
                    ],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 159, 64)',
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
                plugins: {
                    legend: {
                        display: false,
                        position: "right"
                    },
                    tooltip: {
                        enabled: true
                    },
                    datalabels: {
                        align: 'center',
                        formatter: (value, context) => {
                            //console.log(value)
                            //console.log(context.chart.data.datasets[0].data)
                            const datapoints = context.chart.data.datasets[0].data;

                            function totalSum(total, datapoint) {
                                return total + datapoint;
                            }
                            const totalValue = datapoints.reduce(totalSum, 0);
                            const percentageValue = (value / totalValue * 100).toFixed(0);
                            const displayData = [`${value}`, `(${percentageValue}%)`]
                            return displayData;
                        }
                    }
                },
            },
            plugins: [ChartDataLabels]
        };



        //render doughnurt chart for gender
        const genderChart = new Chart(document.getElementById('genderChart'), config_genderChart).getContext("2d");
        //render doughnurt chart for dropdown choice types
        const sessionsChart = new Chart(document.getElementById('sessionsChart'), config_sessionsChart).getContext("2d");

        // //render bar chart
        const departmentsCharts = new Chart(document.getElementById('departmentsChart'), config_departmentsChart)
            .getContext("2d");
        // //render bar
        const yearGroupChart = new Chart(document.getElementById('yearGroupChart'), config_yearGroupChart).getContext("2d");
        // //render line chart
        const timeLineChart = new Chart(document.getElementById('timeLineChart'), config_timeLineChart).getContext("2d");
    </script>
