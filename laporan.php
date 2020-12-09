<!-- header -->
<?php include "includes/header.php"; ?>

<!-- navbar -->
<?php include "includes/navbar.php" ?>

<!-- modal -->
<?php include "includes/modal.php" ?>

    <!-- line chart -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row pt-md-5 mt-md-4 mb-5">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-muted">Pendapatan Bulan Ini</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of line chart -->

    <!-- bar chart and pie chart -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row mb-5">

            <!-- bar chart -->
            <div class="col-xl-7 col-lg-12 mb-5">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-muted">Pendapatan Bulanan</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of bar chart -->

            <!-- pie chart -->
            <div class="col-xl-5 col-lg-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-muted">Perbandingan Produk</h6>
                </div>
                <div class="card-body">
                  <div class="chart-pie" id="chart-container">
                    <canvas id="myPiechart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of pie chart -->

          </div>
        </div>
      </div>
    </div>
    <!-- end of bar chart and pie chart -->

    <!-- footer -->
    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-white pt-3">
            <div class="row">
              <div class="col-lg-6 footer-font-size footer-center">
                <ul class="list-inline">
                  <li class="list-inline-item mr-2">
                    <a href="#" class="text-dark link-style-none">About</a>
                  </li>
                  <li class="list-inline-item mr-2">
                    <a href="#" class="text-dark link-style-none">Contact</a>
                  </li>
                  <li class="list-inline-item mr-2">
                    <a href="#" class="text-dark link-style-none">Support</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 footer-font-size d-flex justify-content-end footer-center delete-display-flex">
                <p>Copyright &copy; 2020 <a href="#" class="link-style-none">Kelompok5</a>. All Rights Reserved</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end of footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <!-- bar chart script -->
    <script src="js/stylechart.js"></script>

    <!-- pie chart -->
    <script>
      $(document).ready(function () {
            showGraph();
      });

      function showGraph() {
        {
          $.post("data_piechart.php",
          function (data) {
            console.log(data);
            var id = [];
            var number_of_transaction = [];

            for(var i in data) {
              id.push(data[i].id);
              number_of_transaction.push(data[i].jml_transaksi);
            }

            var chartdata = {
              labels: id,
              datasets: [{
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: 'rgba(234, 236, 244, 1)',
                data: number_of_transaction
              }]
            };

            var graphTarget = $("#myPiechart");

            var barGraph = new Chart(graphTarget, {
              type: 'doughnut',
              data: chartdata,
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: false
                },
                cutoutPercentage: 80,
              }
            });
          });
        }
      }
    </script>

    <!-- area chart -->
    <script>
      $(document).ready(function () {
        showGraph2();
      });

      function showGraph2() {
        {
          $.post("data_areachart.php",
          function (data) {
            console.log(data);
            var tanggal = [];
            var total = [];

            for(var i in data) {
              tanggal.push(data[i].tanggal);
              total.push(data[i].total);
            }

            var chartdata = {
              labels: tanggal,
              datasets: [{
                label: "Pendapatan",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: total
              }]
            };

            var graphTarget = $("#myAreaChart");

            var barGraph = new Chart(graphTarget, {
              type: 'line',
              data: chartdata,
              options: {
                maintainAspectRatio: false,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'date'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      padding: 10,
                      callback: function(value, index, values) {
                        return 'Rp' + number_format(value);
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: false
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
                    }
                  }
                }
              }
            });
          });
        }
      }
    </script>

    <!-- bar chart -->
    <script>
      $(document).ready(function () {
        showGraph3();
      });

      function showGraph3() {
        {
          $.post("data_barchart.php",
          function (data) {
            console.log(data);
            var bulan = [];
            var total_per_bulan = [];

            for(var i in data) {
              bulan.push(data[i].bulan);
              total_per_bulan.push(data[i].total_per_bulan);
            }

            var chartdata = {
              labels: bulan,
              datasets: [{
                label: "Pendapatan",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: total_per_bulan
              }]
            };

            var graphTarget = $("#myBarChart");

            var barGraph = new Chart(graphTarget, {
              type: 'bar',
              data: chartdata,
              options: {
                maintainAspectRatio: true,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    time: {
                      unit: 'month'
                    },
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 7
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      beginAtZero: true,
                      padding: 10,
                      callback: function(value, index, values) {
                        return 'Rp' + number_format(value);
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: false
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
                    }
                  }
                }
              }
            });
          });
        }
      }
    </script>

  </body>
  </html>
