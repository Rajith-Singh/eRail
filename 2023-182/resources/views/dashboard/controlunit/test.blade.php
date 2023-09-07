<!DOCTYPE html>
<html>
<head>
  <title>Scatter Line Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Define your CSS styles here */
    /* For example, you can style the chart canvas */
    #myChart {
      width: 800px;
      height: 400px;
    }
  </style>
</head>
<body>
  <canvas id="myChart"></canvas>
  <script>
    // Provided data points
    const dataPoints = [
      { x: 7.28, y: 'RBK' },
      { x: 7.42, y: 'KMA' },
      { x: 7.53, y: 'IKT' },
      { x: 8.04, y: 'BNA' },
      { x: 8.13, y: 'KGW' },
      { x: 8.20, y: 'PLT' },
      { x: 8.35, y: 'PDA' },
      { x: 8.38, y: 'SUA' },
      // Add more data points here
    ];

    // Extract x and y labels from the data
    const xLabels = dataPoints.map(item => item.x);
    const yLabels = dataPoints.map(item => item.y);

    // Create a scatter line chart
    const ctx = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'scatter', // Use 'scatter' for a scatter plot
      data: {
        datasets: [{
          label: 'Scatter Line',
          data: dataPoints, // Use the data points directly
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
          pointBackgroundColor: 'rgba(75, 192, 192, 1)', // Point color
          pointRadius: 5, // Point size
          showLine: true, // Display a line connecting the data points
        }]
      },
      options: {
        scales: {
          x: {
            type: 'linear', // Use a linear scale for the x-axis (numeric)
            beginAtZero: true,
            title: {
              display: true,
              text: 'Time Series'
            },
            ticks: {
              stepSize: 1, // Adjust the step size as needed
              callback: function (value, index, values) {
                return `${value}:00`; // Display time format
              }
            }
          },
          y: {
            type: 'category', // Use a category scale for the y-axis
            labels: yLabels.reverse(), // Reverse the order of y-axis labels
            beginAtZero: true,
            title: {
              display: true,
              text: 'Stations'
            }
          }
        }
      }
    });

    chart.update(); // Update the chart to display the data points
  </script>
</body>
</html>