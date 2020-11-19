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
                  <div class="chart-pie">
                    <canvas id="myPieChart"></canvas>
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

<!-- footer  -->
<?php include "includes/footer.php"; ?>
