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

    #myChart {
        width: 100vw; /* Use 100% of the viewport width */
        height: 100vh; /* Use 100% of the viewport height */
        background-color: #fff; /* Set a background color for the chart container */
        border-radius: 0; /* Remove rounded corners */
        box-shadow: none; /* Remove the box shadow */
        background-color: #fff; /* Set a background color for the chart container */
        border-radius: 5px; /* Add rounded corners */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }

  </style>
</head>
<body>
  <canvas id="myChart"></canvas>
  <script>
    // Function to fetch data from the API and update the chart
    async function fetchDataAndPlotChart() {
      try {
        // Fetch data from the API
        const response = await fetch('https://sheetdb.io/api/v1/b8ewgyuuvef8o');
        const data = await response.json();

        // Create an object to store data points for each train
        const trainData = {};

        // Loop through the data and organize it by train number
        data.forEach(item => {
          const trainNumber = item.train;
          if (!trainData[trainNumber]) {
            trainData[trainNumber] = [];
          }
          trainData[trainNumber].push({
            x: parseFloat(item.time), // 'Time' is the key for x-axis data in the API response
            y: item.station, // 'Station' is the key for y-axis data in the API response
          });
        });

        // Reverse the order of y-axis categories for each train
        for (const trainNumber in trainData) {
          if (trainData.hasOwnProperty(trainNumber)) {
            trainData[trainNumber].reverse();
          }
        }

        // Create a scatter line chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const chart = new Chart(ctx, {
          type: 'scatter', // Use 'scatter' for a scatter plot
          data: {
            datasets: [],
          },
          options: {
            scales: {
              x: {
                type: 'linear', // Use a linear scale for the x-axis (numeric)
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Time Series',
                },
              },
              y: {
                type: 'category', // Use a category scale for the y-axis
                beginAtZero: true,
                title: {
                  display: true,
                  text: 'Stations',
                },
              },
            },
          },
        });

        // Add datasets for each train to the chart
        for (const trainNumber in trainData) {
          if (trainData.hasOwnProperty(trainNumber)) {
            chart.data.datasets.push({
              label: trainNumber,
              data: trainData[trainNumber],
              borderColor: getRandomColor(), // Generate a random color for each train
              borderWidth: 1,
              pointBackgroundColor: getRandomColor(), // Generate a random color for points
              pointRadius: 5,
              showLine: true,
            });
          }
        }

        chart.update(); // Update the chart to display the data points
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    // Function to generate a random color for chart elements
    function getRandomColor() {
      const letters = '0123456789ABCDEF';
      let color = '#';
      for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }

    // Call the function to fetch and plot the chart when the page loads
    fetchDataAndPlotChart();
  </script>
</body>
</html>
