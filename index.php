<!-- header -->
<?php include "includes/header.php"; ?>

<!-- navbar -->
<?php include "includes/navbar.php" ?>

<!-- modal -->
<?php include "includes/modal.php" ?>

    <!-- cards -->
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
                    <a href="#" class="text-secondary link-style-none">
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
                    <a href="#" class="text-secondary link-style-none">
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
                        <h6>30 Orang</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <a href="#" class="text-secondary link-style-none">
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
                        <h6>30 Orang</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-secondary">
                    <a href="#" class="text-secondary link-style-none">
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
                        <th class="font-weight-bold">Sale</th>
                        <th class="font-weight-bold">Product</th>
                        <th class="font-weight-bold">Customer</th>
                        <th class="font-weight-bold">Berat</th>
                        <th class="font-weight-bold">Tanggal</th>
                        <th class="font-weight-bold">Harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-muted">
                        <td>0300030</td>
                        <td>LNDRY3</td>
                        <td>001030</td>
                        <td>3</td>
                        <td>30/11/2020</td>
                        <td>Rp163,000</td>
                      </tr>
                      <tr class="text-muted">
                        <td>0290029</td>
                        <td>LNDRY3</td>
                        <td>001029</td>
                        <td>2</td>
                        <td>29/11/2020</td>
                        <td>Rp850,000</td>
                      </tr>
                      <tr class="text-muted">
                        <td>0280028</td>
                        <td>LNDRY3</td>
                        <td>001028</td>
                        <td>1</td>
                        <td>28/11/2020</td>
                        <td>Rp206,850</td>
                      </tr>
                      <tr class="text-muted">
                        <td>0270027</td>
                        <td>LNDRY3</td>
                        <td>001027</td>
                        <td>1</td>
                        <td>27/11/2020</td>
                        <td>Rp357,650</td>
                      </tr>
                      <tr class="text-muted">
                        <td>0260026</td>
                        <td>LNDRY3</td>
                        <td>001026</td>
                        <td>3</td>
                        <td>26/11/2020</td>
                        <td>Rp92,575</td>
                      </tr>
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

<!-- footer  -->
<?php include "includes/footer.php"; ?>
