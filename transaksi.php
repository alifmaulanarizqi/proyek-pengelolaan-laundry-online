<!-- header  -->
<?php include "includes/header.php"; ?>

<!-- navbar -->
<?php include "includes/navbar.php" ?>

<!-- modal -->
<?php include "includes/modal.php" ?>

    <!-- table -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row pt-md-5 mt-md-4 mb-5">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h5 class="m-0 font-weight-bold text-muted">Data Transaksi</h5>
                </div>
                <div class="card-body pb-0">
                  <table id="dtBasicExample" class="table table-striped table-bordered table-style-css" style="width:100%">
                    <thead>
                      <tr>
                        <th class="font-weight-bold">Id</th>
                        <th class="font-weight-bold">Product</th>
                        <th class="font-weight-bold">Nama_cust</th>
                        <th class="font-weight-bold">Email_cust</th>
                        <th class="font-weight-bold">Berat</th>
                        <th class="font-weight-bold">Tanggal</th>
                        <th class="font-weight-bold">Harga</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!-- display transactions -->
                      <?php
                        displayTransactions();
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of table -->

    <!-- form -->

    <!-- set form field -->
    <?php
      $field_customer_name = "";
      $field_customer_email = "";
      $field_product = "";
      $field_laundry_weight = "";
      $field_date = "";

      setFieldAddTransaction();
    ?>

    <!-- add transaction -->
    <?php
      addTransaction();
    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row mb-5">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h5 class="m-0 font-weight-bold text-muted">Tambah Transaksi</h5>
                </div>
                <div class="card-body pb-0">
                  <form action="" method="post">
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama">
                        <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="email">Email</label>
                      <div class="col-sm-10 position-relative">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email">
                        <i class="fas fa-envelope position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold">Product</label>
                      <div class="col-sm-10">
                        <select class="browser-default custom-select" name="product">
                          <option selected disabled>Pilih product...</option>
                          <?php
                            displayProductList();
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="berat">Berat(Kg)</label>
                      <div class="col-sm-10 position-relative">
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukan berat">
                        <i class="fas fa-weight position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold">Tanggal</label>
                      <div class="input-group col-sm-10 position-relative date">
                        <input placeholder="Pilih tanggal" type="text" class="form-control datepicker" name="tanggal-transaksi">
                        <i class="fas fa-calendar position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default form-button" name="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of form -->

<!-- footer  -->
<?php include "includes/footer.php"; ?>
