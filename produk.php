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
                  <h5 class="m-0 font-weight-bold text-muted">Data Produk</h5>
                </div>
                <div class="card-body pb-0">
                  <table id="dtBasicExample" class="table table-striped table-bordered table-style-css" style="width:100%">
                    <thead>
                      <tr>
                        <th class="font-weight-bold">Id</th>
                        <th class="font-weight-bold">Kode Produk</th>
                        <th class="th-sm font-weight-bold">Nama</th>
                        <th class="th-sm font-weight-bold">Harga/Kilo</th>
                        <th class="th-sm font-weight-bold">Keterangan</th>
                        <th class="th-sm font-weight-bold">Delete</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!-- display products -->
                      <?php
                        $query = "SELECT * FROM products";
                        $select_all_products_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_all_products_query)) {
                          $product_id = $row["id"];
                          $product_code = $row["kode_produk"];
                          $product_name = $row["nama"];
                          $product_price = $row["harga"];
                          $product_price = number_format($product_price);
                          $product_info = $row["keterangan"];

                          echo "<tr>
                                  <td>$product_id</td>
                                  <td>$product_code</td>
                                  <td>$product_name</td>
                                  <td>Rp $product_price</td>
                                  <td>$product_info</td>
                                  <td><a href='produk.php?delete=$product_id'>Delete</a></td>
                                </tr>";
                        }
                      ?>

                      <!-- delete products -->
                      <?php
                        if(isset($_GET["delete"])) {
                          $the_product_id = $_GET["delete"];
                          $query = "DELETE FROM products WHERE id = '$the_product_id'";
                          $delete_query = mysqli_query($connection, $query);
                          header("Location: produk.php");
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
      $field_product_code = $_POST["kode-produk"];
      $field_product_name = $_POST["nama"];
      $field_product_price = $_POST["harga"];
      $field_product_info = $_POST["keterangan"];

      // prevent sql injection
      $field_product_code = mysqli_real_escape_string($connection, $field_product_code);
      $field_product_name = mysqli_real_escape_string($connection, $field_product_name);
      $field_product_price = mysqli_real_escape_string($connection, $field_product_price);
      $field_product_info = mysqli_real_escape_string($connection, $field_product_info);
    }
    ?>

    <!-- add product -->
    <?php
      if(isset($_POST["submit"])) {
        $query_add_product = "INSERT INTO products(kode_produk, nama, harga, keterangan) VALUES ('$field_product_code', '$field_product_name', '$field_product_price', '$field_product_info')";

        $result = mysqli_query($connection, $query_add_product);
        header("Location: produk.php");

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
                  <h5 class="m-0 font-weight-bold text-muted">Tambah Produk</h5>
                </div>
                <div class="card-body pb-0">
                  <form action="" method="post">
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="the_produk_id">Kode Produk</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="the_produk_id" name="kode-produk" placeholder="Masukan produk id" required>
                        <i class="fas fa-id-card position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="nama">Nama</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama" required>
                        <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="harga">Harga</label>
                      <div class="col-sm-10 position-relative">
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan harga" required>
                        <i class="fas fa-dollar-sign position-absolute text-muted icon-in-field" tabindex=0></i>
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label class="control-label col-sm-5 font-weight-bold" for="keterangan">Keterangan</label>
                      <div class="col-sm-10 position-relative">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan keterangan" required>
                        <i class="fas fa-user position-absolute text-muted icon-in-field" tabindex=0></i>
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
