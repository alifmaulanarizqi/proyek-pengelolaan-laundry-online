<!-- header -->
<?php include "includes/header.php"; ?>

<!-- navbar -->
<?php include "includes/navbar.php"; ?>

<!-- modal -->
<?php include "includes/modal.php" ?>

    <!-- form -->

    <!-- name setting -->
    <?php
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["ganti-nama"])) {
          setDisplayAndLaundryName();
          updateDisplayAndLaundryName();
          header("Location: pengaturan.php");
        }
      }
    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row pt-md-5 mt-md-4 mb-5">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-muted">Pengaturan Nama</h6>
                </div>
                <div class="card-body pb-0">
                  <form action="" method="post">
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="namaLaundry">Nama Laundry</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="namaLaundry" name="nama-laundry" value="<?php echo $laundry_name; ?>" required>
                        <i class="fas fa-clipboard-check position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama Display</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="nama" name="nama-display" value="<?php echo $display_name; ?>" required>
                        <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10 ml-3">
                        &nbsp;<button type="submit" class="btn btn-default form-button" name="ganti-nama">Submit</button>
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

    <!-- password setting -->
    <?php
      $old_password = "";
      $new_password = "";
      $conrifm_new_password = "";
      $old_password_err = "";
      $new_password_err = "";
      $conrifm_new_password_err = "";
      $notifsuccess = "";

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["ganti-password"])) {
          setDisplayAndLaundryPassword();
          oldPasswordIsWrong();
          newAndConfirmPasswordNotMatch();
          if($old_password_err == "" && $new_password_err == "" && $conrifm_new_password_err == "") {
            updatePassword();
          }
        }
      }
    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row mb-5">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-muted">Pengaturan Password</h6>
                </div>
                <div class="card-body pb-0">
                  <form action="" method="post">
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="passwordLama">Password Lama</label>
                      <div class="col-sm-10 position-relative">
                        <input type="password" class="form-control" id="passwordLama" name="password-lama" placeholder="Masukan password lama" required><span class="error"><?php echo $old_password_err; ?></span>
                        <i class="fas fa-key position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="passwordBaru">Password Baru</label>
                      <div class="col-sm-10 position-relative">
                        <input type="password" class="form-control" id="passwordBaru" name="password-baru" placeholder="Masukan password baru" required><span class="error"><?php echo $new_password_err; ?></span>
                        <i class="fas fa-lock position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="passwordBaruKonfirmasi">Konfirmasi Password</label>
                      <div class="col-sm-10 position-relative">
                        <input type="password" class="form-control" id="passwordBaruKonfirmasi" name="password-baru-konfirmasi" placeholder="Masukan password baru" required><span class="error"><?php echo $conrifm_new_password_err; ?></span>
                        <i class="fas fa-lock position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default form-button" name="ganti-password">Submit</button>
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

<!-- footer  -->
<?php include "includes/footer.php"; ?>
