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
                        $query = "SELECT * FROM employees";
                        $select_all_employees_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_all_employees_query)) {
                          $employee_id = $row["id"];
                          $employee_name = $row["nama"];
                          $employee_position = $row["posisi"];
                          $employee_email = $row["email"];
                          $employee_age = $row["umur"];
                          $employee_gender = $row["gender"];
                          $employee_start_date = $row["start_date"];
                          $employee_salary = $row["gaji"];
                          $employee_salary = number_format("$employee_salary");

                          echo "<tr>
                                  <td>$employee_id</td>
                                  <td>$employee_name</td>
                                  <td>$employee_position</td>
                                  <td>$employee_email</td>
                                  <td>$employee_age</td>
                                  <td>$employee_gender</td>
                                  <td>$employee_start_date</td>
                                  <td>Rp $employee_salary</td>
                                  <td><a href='pegawai.php?delete=$employee_id'>Delete</a></td>
                                </tr>";
                        }
                      ?>

                      <!-- delete employees -->
                      <?php
                        if(isset($_GET["delete"])) {
                          $the_employee_id = $_GET["delete"];
                          $query = "DELETE FROM employees WHERE id = '$the_employee_id'";
                          $query_delete = mysqli_query($connection, $query);
                          header("Location: pegawai.php");
                        }
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
      if(isset($_POST["submit"])) {
        $field_employee_name = $_POST["nama"];
        $field_employee_email = $_POST["email"];
        $field_employee_age = $_POST["umur"];
        $field_employee_gender = $_POST["gender"];
        $field_employee_posisi = $_POST["posisi"];
        $field_employee_start_date = $_POST["start-date"];
        $field_employee_start_date = date('Y-m-d', strtotime($field_employee_start_date));
        $field_employee_salary = $_POST["gaji"];

        // prevent sql injection
        $field_employee_name = mysqli_real_escape_string($connection, $field_employee_name);
        $field_employee_email = mysqli_real_escape_string($connection, $field_employee_email);
        $field_employee_age = mysqli_real_escape_string($connection, $field_employee_age);
        $field_employee_gender = mysqli_real_escape_string($connection, $field_employee_gender);
        $field_employee_posisi = mysqli_real_escape_string($connection, $field_employee_posisi);
        $field_employee_start_date = mysqli_real_escape_string($connection, $field_employee_start_date);
        $field_employee_salary = mysqli_real_escape_string($connection, $field_employee_salary);
      }
    ?>

    <!-- add employee -->
    <?php
    if(isset($_POST["submit"])) {
      $query_add_employee = "INSERT INTO employees(nama, posisi, email, umur, gender, start_date, gaji) VALUES ('$field_employee_name', '$field_employee_posisi', '$field_employee_email', '$field_employee_age', '$field_employee_gender', '$field_employee_start_date', '$field_employee_salary')";

      $result = mysqli_query($connection, $query_add_employee);
      header("Location: pegawai.php");

      if(!$result) {
        die("Query FAILED " . mysqli_error($connection));
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
