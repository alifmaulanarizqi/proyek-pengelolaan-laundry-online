<!-- header -->
<?php include "includes/header.php"; ?>

<!-- navbar -->
<?php include "includes/navbar.php" ?>

<!-- modal -->
<?php include "includes/modal.php" ?>

    <!-- cards -->

    <!-- count number of employees -->
    <?php
      $total_employees = 0;
      getTotalEmployees();
    ?>

    <!-- count number of customers -->
    <?php
      $total_customers = 0;
      getTotalCustomers();
    ?>

    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-4">
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-chart-line fa-3x text-success"></i>
                      <div class="text-right text-secondary">
                        <h6><strong>Pendapatan Tertinggi</strong></h6>
                        <h6>Januari, Rp 500.000</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <a href="index.php" class="text-secondary link-style-none">
                      <i class="fas fa-sync mr-3"></i>
                      <span>Refresh Now</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-sort-amount-down fa-3x text-danger"></i>
                      <div class="text-right text-secondary">
                        <h6><strong>Pendapatan Terendah</strong></h6>
                        <h6>Februari, Rp 200.000</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-secondary link-style-none">
                      <i class="fas fa-sync mr-3"></i>
                      <span>Refresh Now</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-user fa-3x text-info"></i>
                      <div class="text-right text-secondary">
                        <h6><strong>Total Karyawan</strong></h6>
                        <h6><?php echo $total_employees; ?> Orang</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-secondary link-style-none">
                      <i class="fas fa-sync mr-3"></i>
                      <span>Refresh Now</span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 p-2">
                <div class="card card-common">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <i class="fas fa-users fa-3x text-warning"></i>
                      <div class="text-right text-secondary">
                        <h6><strong>Total Pelanggan</strong></h6>
                        <h6><?php echo $total_customers ?> Orang</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <a href="index.php" class="text-secondary link-style-none">
                      <i class="fas fa-sync mr-3"></i>
                      <span>Refresh Now</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of cards -->

    <!-- tables -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row mb-5 mt-3">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3 ">
                  <h6 class="m-0 font-weight-bold text-muted">Transaksi Baru</h6>
                </div>
                <div class="card-body pb-1">
                  <table class="table table-striped table-bordered table-style-css">
                    <thead class="thead-dark">
                      <tr>
                        <th class="font-weight-bold">ID</th>
                        <th class="font-weight-bold">Product</th>
                        <th class="font-weight-bold">Id_cust</th>
                        <th class="font-weight-bold">Berat</th>
                        <th class="font-weight-bold">Tanggal</th>
                        <th class="font-weight-bold">Harga</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!-- display recent transactions -->
                      <?php
                        displayRecentTransactions();
                      ?>

                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <div class="text-left ml-2">
                    <button type="button" class="btn btn-sm btn-primary"><a href="transaksi.php" class="text-white link-style-none">Semua Transaksi</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of tables -->

    <!-- bar chart -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row mb-5">
            <div class="col-xl-8 col-lg-12 mb-0">
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
          </div>
        </div>
      </div>
    </div>
    <!-- end of bar chart -->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <!-- bar chart script -->
    <script src="js/chart/bar-chart.js"></script>

  </body>
  </html>
