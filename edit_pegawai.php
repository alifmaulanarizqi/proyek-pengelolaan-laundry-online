<!-- edit pegawai -->
<?php
  $employee_id = "";
  $employee_name = "";
  $employee_email = "";
  $employee_age = "";
  $employee_gender = "";
  $employee_position = "";
  $employee_start_date = "";
  $employee_salary = "";
  $check_employee = "";
  $notifsuccess = "";
  $nama_dulu = "";
  $email_dulu = "";
  $posisi_dulu = "";

  getEditEmployeeValue();
  editEmployee();
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
      <div class="row pt-md-5 mt-md-4 mb-5">
        <div class="col-sm-12 mb-0">
          <div class="card shadow">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-muted">Edit Pegawai</h6>
            </div>
            <div class="card-body pb-0">
              <form action="" method="post">
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama</label>
                  <div class="col-sm-10 position-relative">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" value="<?php echo $employee_name; ?>" required>
                    <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="email">Email</label>
                  <div class="col-sm-10 position-relative">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" value="<?php echo $employee_email; ?>" required>
                    <i class="fas fa-envelope position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="umur">Umur</label>
                  <div class="col-sm-10 position-relative">
                    <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukan umur" value="<?php echo $employee_age; ?>" required>
                    <i class="fas fa-sort-numeric-up position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold">Gender</label>
                  <div class="col-sm-10">
                    <select class="browser-default custom-select" name="gender" required>
                      <?php
                        if($employee_gender == "pria") {
                          echo "<option selected value='pria'>Pria</option>
                                <option value='wanita'>Wanita</option>";
                        } else {
                          echo "<option value='pria'>Pria</option>
                                <option selected value='wanita'>Wanita</option>";
                        }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold">Posisi</label>
                  <div class="col-sm-10">
                    <select class="browser-default custom-select" name="posisi" required>
                      <?php
                        displayPositionList();
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold">Start Date</label>
                  <div class="input-group col-sm-10 position-relative date">
                    <input placeholder="Pilih tanggal" type="text" class="form-control datepicker" name="start-date" value="<?php echo $employee_start_date; ?>" required>
                    <i class="fas fa-calendar position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group mb-4">
                  <label class="control-label col-sm-5 font-weight-bold" for="gaji">Gaji Pegawai</label>
                  <div class="col-sm-10 position-relative">
                    <input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukan gaji" value="<?php echo $employee_salary; ?>" required>
                    <i class="fas fa-dollar-sign position-absolute text-muted icon-in-field" tabindex=0></i>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default form-button" name="edit-pegawai">Edit Pegawai</button>
                    <span class="text-danger"><?php echo $check_employee; ?></span>
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
