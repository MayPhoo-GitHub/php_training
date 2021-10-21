$(document).ready(function () {
  showGraph();
});

function showGraph() {
  var position = [];
  var salary = [];

  for (var i in data) {
    position.push(data[i].position);
    salary.push(data[i].salary);
  }

  var chartdata = {
    labels: position,
    datasets: [
      {
        label: "Salary Graph",
        backgroundColor: "#49e2ff",
        borderColor: "#46d5f1",
        hoverBackgroundColor: "#cccccc",
        hoverBorderColor: "#666666",
        data: salary,
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
