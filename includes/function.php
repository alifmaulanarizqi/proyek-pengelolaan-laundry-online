<!-- database connection -->
<?php include "dbConnection.php"; ?>

<?php
// index.php
  // count number of employees
  function getTotalEmployees() {
    global $connection; global $total_employees;

    $query = "SELECT * FROM employees";
    $select_all_employees_query = mysqli_query($connection, $query);

    while (mysqli_fetch_assoc($select_all_employees_query)) {
      $total_employees++;
    }
  }
// end of index.php


// pengaturan.php
  // set form field
  function setDisplayAndLaundryName() {
    global $connection;
    global $laundry_name;
    global $display_name;

    $laundry_name = $_POST["nama-laundry"];
    $display_name = $_POST["nama-display"];

    // prevent sql injection
    $laundry_name = mysqli_real_escape_string($connection, $laundry_name);
    $display_name = mysqli_real_escape_string($connection, $display_name);
  }

  // get laundry name and display name
  function getLaundryAndDisplayName(){
    global $connection;

    $query = "SELECT * FROM user";
    $user_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($user_query);
    $laundry_name = $row["nama_laundry"];
    $display_name = $row["nama_display"];
  }

  // update display and laundry name
  function updateDisplayAndLaundryName() {
    global $connection;
    global $laundry_name;
    global $display_name;

    $query = "UPDATE user SET nama_display ='$display_name', nama_laundry ='$laundry_name' WHERE id ='1'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
      die("Query FAILED " . mysqli_error($connection));
    }
  }

  // set field form
  function setDisplayAndLaundryPassword() {
    global $connection;
    global $old_password;
    global $new_password;
    global $conrifm_new_password;

    $old_password = $_POST["password-lama"];
    $new_password = $_POST["password-baru"];
    $conrifm_new_password = $_POST["password-baru-konfirmasi"];

    // prevent sql injection
    $old_password = mysqli_real_escape_string($connection, $old_password);
    $new_password = mysqli_real_escape_string($connection, $new_password);
    $conrifm_new_password = mysqli_real_escape_string($connection, $conrifm_new_password);

    // encrypt password
    $hashFormat = "$2y$10$";
    $salt = "usesomesillystringforsalt";
    $hashFormatAndSalt = $hashFormat . $salt;
    $old_password = crypt($old_password, $hashFormatAndSalt);
    $new_password = crypt($new_password, $hashFormatAndSalt);
    $conrifm_new_password = crypt($conrifm_new_password, $hashFormatAndSalt);
  }

  // notif when user input wrong password
  function oldPasswordIsWrong() {
    global $connection;
    global $old_password;
    global $old_password_err;

    $old_password_copy = $old_password;

    $query = "SELECT * FROM user";
    $user_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($user_query);
    $old_password = $row["password"];

    if($old_password != $old_password_copy) {
      $old_password_err = "Password lama tidak sesuai.";
    }
  }

  // notif when user input new password and confirmation doesn't match
  function newAndConfirmPasswordNotMatch() {
    global $connection;
    global $new_password;
    global $conrifm_new_password;
    global $new_password_err;
    global $conrifm_new_password_err;

    if($new_password != $conrifm_new_password) {
      $new_password_err = $conrifm_new_password_err = "Password baru dan konfirmasi password tidak sesuai.";
    }
  }

  // update password
  function updatePassword() {
    global $connection;
    global $old_password;
    global $new_password;
    global $conrifm_new_password;
    global $old_password_err;
    global $new_password_err;
    global $conrifm_new_password;

    $query = "UPDATE user SET password = '$new_password' WHERE id ='1'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
      die("Query FAILED " . mysqli_error($connection));
    }
  }
  // end of pengaturan.php



// produk.php
  // set form field
  function setFieldAddProduct() {
    global $field_product_code; global $field_product_name; global $field_product_price; global $field_product_info; global $connection;

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
  }

  // add product
  function addProduct() {
    global $field_product_code; global $field_product_name; global $field_product_price; global $field_product_info; global $connection;

    if(isset($_POST["submit"])) {
      $query_add_product = "INSERT INTO products(kode_produk, nama, harga, keterangan) VALUES ('$field_product_code', '$field_product_name', '$field_product_price', '$field_product_info')";

      $result = mysqli_query($connection, $query_add_product);
      header("Location: produk.php");

      if(!$result) {
        die("Query FAILED " . mysqli_error($connection));
      }
    }
  }

  // display products
  function displayProducts() {
    global $connection;

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
  }

  // delete product
  function deleteProduct() {
    global $connection;

    if(isset($_GET["delete"])) {
      $the_product_id = $_GET["delete"];
      $query = "DELETE FROM products WHERE id = '$the_product_id'";
      $delete_query = mysqli_query($connection, $query);
      header("Location: produk.php");
    }
  }
// end of produk.php

?>
