$(document).ready(function () {
  showGraph();
});

function showGraph() {
  var position = [];
  var avg_salary = [];

  for (var i in data) {
    position.push(data[i].position);
    avg_salary.push(data[i].avg_salary);
  }
  
  var chartdata = {
    labels: position,
    datasets: [
      {
        label: "Salary of Employees",
        backgroundColor: "#49e2ff",
        borderColor: "#46d5f1",
        hoverBackgroundColor: "#cccccc",
        hoverBorderColor: "#666666",
        data: avg_salary,
      },
    ],
  };

  var graphTarget = $("#graphCanvas");

  var barGraph = new Chart(graphTarget, {
    type: "bar",
    data: chartdata,
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              min: 0,
            },
          },
        ],
      },
    },
  });
}
