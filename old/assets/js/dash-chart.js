const sampleChart = document.getElementById('myChart');

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

const data = {
    labels,
    datasets: [{
        data: [100, 200, 250, 700, 540, 900, 800],
        label: "Samlpe Chart with Chart.js",
    }, ],

};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
    },
};

const myChart = new Chart(sampleChart, config);





// const myChart = new Chart(
//     document.getElementById('myChart').getContent('2d'),
//     config
// );

// const config = {
//     type: 'line',
//     data: data,
//     options: {}
// };

// const labels = [
//     'January',
//     'February',
//     'March',
//     'April',
//     'May',
//     'June',
// ];
// const data = {
//     labels: labels,
//     datasets: [{
//         label: 'My First dataset',
//         backgroundColor: 'rgb(255, 99, 132)',
//         borderColor: 'rgb(255, 99, 132)',
//         data: [0, 10, 5, 2, 20, 30, 45],
//     }]
// };
// // === include 'setup' then 'config' above ===