<!-- edit transaction -->
<?php
  $transaction_id = "";
  $customer_name = "";
  $customer_email = "";
  $product_id = "";
  $laundry_weight = "";
  $transaction_date = "";
  $notifsuccess = "";

  getEditTransactionValue();
  editTransaction();
?>

<!-- form -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
      <div class="row pt-md-5 mt-md-4 mb-5">
        <div class="col-sm-12 mb-0">
          <div class="card shadow">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-muted">Edit Transaksi</h5>
            </div>
            <div class="card-body pb-0">
              <form action="" method="post">
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama</label>
                  <div class="col-sm-10 position-relative">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" value="<?php echo $customer_name ?>" required>
                    <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="email">Email</label>
                  <div class="col-sm-10 position-relative">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" value="<?php echo $customer_email ?>" required>
                    <i class="fas fa-envelope position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold">Product</label>
                  <div class="col-sm-10">
                    <select class="browser-default custom-select" name="product" required>
                      <?php
                        displayProductList();
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="berat">Berat(Kg)</label>
                  <div class="col-sm-10 position-relative">
                    <input type="number" class="form-control" id="berat" name="berat" placeholder="Masukan berat" value="<?php echo $laundry_weight ?>" required>
                    <i class="fas fa-weight position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default form-button" name="edit-transaksi">Edit Transaksi</button>
                    <span class="text-success"><?php echo $notifsuccess; ?></span>
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
