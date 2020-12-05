<!-- edit position -->
<?php
  $position_id = "";
  $position_name = "";
  $notifsuccess = "";
  $notifdanger = "";

  getEditPositionValue();
  editPosition();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
      <div class="row pt-md-5 mt-md-4 mb-5">
        <div class="col-sm-12 mb-0">
          <div class="card shadow">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-muted">Edit Posisi</h6>
            </div>
            <div class="card-body pb-0 col-sm-12">
              <form action="" method="post">
                <div class="form-group mb-7">
                  <label class="control-label col-sm-12 font-weight-bold" for="nama">Nama</label>
                  <div class="col-sm-10 position-relative">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama posisi" value="<?php echo $position_name; ?>" required>
                    <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default form-button" name="edit-posisi">Edit Posisi</button>
                    <span class="text-success"><?php echo $notifsuccess; ?></span>
                    <span class="text-danger"><?php echo $notifdanger; ?></span>
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
