// SIDEBAR TOGGLE
var sidebarOpen = false;
var sidebar = document.getElementById('sidebar');

function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add('sidebar-responsive');
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if (sidebarOpen) {
    sidebar.classList.remove('sidebar-responsive');
    sidebarOpen = true;
  }
}

// ---------- CHARTS ----------

// Define static data for the chart
var staticData = {
  xLabels: [
    '00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00',
    '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00',
    '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'
  ],
  yLabels: [
    'RBK', 'KMA', 'IKT', 'BNA', 'KGW', 'PLT', 'PDA', 'SUA', 'KDT', 'GEY',
    'GPL', 'TBL', 'ULP', 'NVP', 'INO', 'GBD', 'WLA', 'RZL', 'HTN', 'KGA',
    'TKL', 'WTG', 'GWN', 'NOA', 'ABL', 'PPL', 'OHA', 'IGH', 'HPT', 'DLA',
    'BDA', 'HLO', 'ELL', 'DDR', 'UDW', 'HEA', 'BAD'
  ],
  predictedCrossings: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
  liveCrossing: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
  defaultCrossing: [null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null],
};

// AREA CHART
// Sample dummy data for Default Crossing with station and time information
var defaultCrossingData = [
  { station: 'RBK', time: '00:00', value: 10 },
  { station: 'KMA', time: '01:00', value: 20 },
  { station: 'IKT', time: '02:00', value: 15 },
  // Add more data points here...
];

// Transform the default crossing data into series format
var defaultCrossingSeries = defaultCrossingData.map(function (point) {
  return point.value;
});

// AREA CHART
var areaChartOptions = {
  series: [
    {
      name: 'Predicted Crossings',
      data: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 200],
    },
    {
      name: 'Live Crossing',
      data: [], // Initialize with an empty array
    },
    {
      name: 'Default Crossing',
      data: defaultCrossingSeries, // Use the transformed data
    },
  ],
  chart: {
    type: 'area',
    background: 'transparent',
    height: 2500,
    stacked: false,
    toolbar: {
      show: true,
    },
  },
  colors: ['#00ab57', '#d50000', '#FFFF00'],
  labels: staticData.xLabels,
  dataLabels: {
    enabled: false,
  },
  fill: {
    gradient: {
      opacityFrom: 0.4,
      opacityTo: 0.1,
      shadeIntensity: 1,
      stops: [0, 100],
      type: 'vertical',
    },
    type: 'gradient',
  },
  grid: {
    borderColor: '#55596e',
    yaxis: {
      lines: {
        show: true,
      },
    },
    xaxis: {
      lines: {
        show: true,
      },
    },
  },
  legend: {
    labels: {
      colors: '#f5f7ff',
    },
    show: true,
    position: 'top',
  },
  markers: {
    size: 0,
  },
  stroke: {
    curve: 'smooth',
  },
  xaxis: {
    axisBorder: {
      color: '#55596e',
      show: true,
    },
    axisTicks: {
      color: '#55596e',
      show: true,
    },
    labels: {
      offsetY: 1,
      style: {
        colors: '#f5f7ff',
      },
    },
  },
  yaxis: [
    {
      title: {
        text: 'Stations',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
        formatter: function (value) {
          var index = Math.floor(value / 5);
          if (staticData.yLabels[index]) {
            return staticData.yLabels[index];
          }
          return '';
        },
      },
      tickAmount: 40,
    },
    {
      opposite: true,
      title: {
        text: 'Stations',
        style: {
          color: '#f5f7ff',
        },
      },
      labels: {
        style: {
          colors: ['#f5f7ff'],
        },
        formatter: function (value) {
          var index = Math.floor(value / 50);
          if (staticData.yLabels[index]) {
            return staticData.yLabels[index];
          }
          return '';
        },
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
    theme: 'dark',
  },
};

// Re-render the chart with the static data
var areaChart = new ApexCharts(
  document.querySelector('#area-chart'),
  areaChartOptions
);
areaChart.render();


