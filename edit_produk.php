<!-- edit product -->
<?php
  $product_id = "";
  $product_name = "";
  $product_price = "";
  $product_detail = "";
  $notifsuccess = "";
  $double_product_id = "";

  getEditProductValue();
  editProduct();
?>

<!-- form -->
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
      <div class="row pt-md-5 mt-md-4 mb-5">
        <div class="col-sm-12 mb-0">
          <div class="card shadow">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-muted">Edit Produk</h5>
            </div>
            <div class="card-body pb-0">
              <form action="" method="post">
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="the_produk_id">Kode Produk</label>
                  <div class="col-sm-10 position-relative">
                    <input type="text" class="form-control" id="the_produk_id" name="kode-produk" placeholder="Masukan produk id" value="<?php echo $product_id; ?>" required>
                    <i class="fas fa-id-card position-absolute text-muted icon-in-field" tabindex=0></i>
                    <span class="text-danger"><?php echo $double_product_id; ?></span>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama</label>
                  <div class="col-sm-10 position-relative">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" value="<?php echo $product_name; ?>" required>
                    <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="harga">Harga</label>
                  <div class="col-sm-10 position-relative">
                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan harga" value="<?php echo $product_price; ?>" required>
                    <i class="fas fa-dollar-sign position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="keterangan">Keterangan</label>
                  <div class="col-sm-10 position-relative">
                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan keterangan" value="<?php echo $product_detail; ?>" required>
                    <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default form-button" name="edit-produk">Edit Produk</button>
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
