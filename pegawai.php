<!-- header -->
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
                  <h5 class="m-0 font-weight-bold text-muted">Data Pegawai</h5>
                </div>
                <div class="card-body pb-0">
                  <table id="dtBasicExample" class="table table-striped table-bordered table-style-css" style="width:100%">
                    <thead>
                      <tr>
                        <th class="font-weight-bold">ID</th>
                        <th class="th-sm font-weight-bold">Nama</th>
                        <th class="th-sm font-weight-bold">Posisi</th>
                        <th class="th-sm font-weight-bold">Email</th>
                        <th class="th-sm font-weight-bold">Umur</th>
                        <th class="th-sm font-weight-bold">Gender</th>
                        <th class="th-sm font-weight-bold">Start date</th>
                        <th class="th-sm font-weight-bold">Gaji</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!-- display employeet -->
                      <?php
                        displayEmployees();
                      ?>

                      <!-- delete employees -->
                      <?php
                        deleteEmployee();
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
      $field_employee_name = "";
      $field_employee_email = "";
      $field_employee_age = "";
      $field_employee_gender = "";
      $field_employee_posisi = "";
      $field_employee_start_date = "";
      $field_employee_salary = "";

      setFieldAddEmployee();
    ?>

    <!-- add employee -->
    <?php
      addEmployee();
    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
          <div class="row mb-5">
            <div class="col-sm-12 mb-0">
              <div class="card shadow">
                <div class="card-header py-3">
                  <h5 class="m-0 font-weight-bold text-muted">Tambah Pegawai</h5>
                </div>
                <div class="card-body pb-0">
                  <form action="" method="post">
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
                        <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="email">Email</label>
                      <div class="col-sm-10 position-relative">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" required>
                        <i class="fas fa-envelope position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="umur">Umur</label>
                      <div class="col-sm-10 position-relative">
                        <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukan umur" required>
                        <i class="fas fa-sort-numeric-up position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold">Gender</label>
                      <div class="col-sm-10">
                        <select class="browser-default custom-select" name="gender" required>
                          <option selected disabled value="">Pilih jenis kelamin...</option>
                          <option value="pria">Pria</option>
                          <option value="wanita">Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold">Posisi</label>
                      <div class="col-sm-10">
                        <select class="browser-default custom-select" name="posisi" required>
                          <option selected disabled value="">Pilih posisi...</option>
                          <option value="manager">Manager</option>
                          <option value="pemasaran">Pemasaran</option>
                          <option value="kasir">Kasir</option>
                          <option value="pencuci">Pencuci</option>
                          <option value="admin">Admin</option>
                          <option value="penjemur">Penjemur</option>
                          <option value="penyetrika">Penyetrika</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold">Start Date</label>
                      <div class="input-group col-sm-10 position-relative date">
                        <input placeholder="Pilih tanggal" type="text" class="form-control datepicker" name="start-date" required>
                        <i class="fas fa-calendar position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="gaji">Gaji Pegawai</label>
                      <div class="col-sm-10 position-relative">
                        <input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukan gaji" required>
                        <i class="fas fa-dollar-sign position-absolute text-muted icon-in-field" tabindex=0></i>
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
