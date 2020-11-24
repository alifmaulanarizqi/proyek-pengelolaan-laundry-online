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
    $tmp = "";

    $query = "SELECT * FROM products";
    $select_all_products_query = mysqli_query($connection, $query);

    if(isset($_POST["submit"])) {
      while($row = mysqli_fetch_assoc($select_all_products_query)) {
        if($field_product_code == $row["kode_produk"]) {
          $tmp = "kembar";
        }
      }

      if($tmp == "kembar") {
        echo "<script>alert('Kode produk tidak boleh sama');</script>";
      } else {
        $query_add_product = "INSERT INTO products(kode_produk, nama, harga, keterangan) VALUES ('$field_product_code', '$field_product_name', '$field_product_price', '$field_product_info')";

        $result = mysqli_query($connection, $query_add_product);
        header("Location: produk.php");

        if(!$result) {
          die("Query FAILED " . mysqli_error($connection));
        }
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



// transaksi.php
  // display transactions
  function displayTransactions(){
    global $connection;

    $query = "SELECT * FROM transactions";
    $select_all_transactions_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_transactions_query)) {
      $transaction_id = $row["id"];
      $transaction_product = $row["produk"];
      $customer_name = $row["nama_customer"];
      $customer_email = $row["email_customer"];
      $laundry_weight = $row["berat_laundry"];
      $transaction_date = $row["tanggal"];
      $transaction_price = $row["harga"];
      $transaction_price = number_format($transaction_price);

      echo "<tr>
              <td>$transaction_id</td>
              <td>$transaction_product</td>
              <td>$customer_name</td>
              <td>$customer_email</td>
              <td>$laundry_weight</td>
              <td>$transaction_date</td>
              <td>Rp $transaction_price</td>
            </tr>";
    }
  }

  // link product field with database
  function displayProductList() {
    global $connection;

    $query = "SELECT * FROM products";
    $select_all_products_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_products_query)) {
      $kode_produk = $row["kode_produk"];

      echo "<option>$kode_produk</option>";
    }
  }

  // set form field
  function setFieldAddTransaction() {
    global $field_customer_name; global $field_customer_email; global $field_product; global $field_laundry_weight; global $field_date; global $connection;

    if(isset($_POST["submit"])) {
      $field_customer_name = $_POST["nama"];
      $field_customer_email = $_POST["email"];
      $field_product = $_POST["product"];
      $field_laundry_weight = $_POST["berat"];
      $field_date = $_POST["tanggal-transaksi"];
      $field_date = date('Y-m-d', strtotime($field_date));

      // prevent sql injection
      $field_customer_name = mysqli_real_escape_string($connection, $field_customer_name);
      $field_customer_email = mysqli_real_escape_string($connection, $field_customer_email);
      $field_product = mysqli_real_escape_string($connection, $field_product);
      $field_laundry_weight = mysqli_real_escape_string($connection, $field_laundry_weight);
      $field_date = mysqli_real_escape_string($connection, $field_date);
    }
  }

  // add transaction
  function addTransaction() {
    global $field_customer_name; global $field_customer_email; global $field_product; global $field_laundry_weight; global $field_date; global $connection;

    if(isset($_POST["submit"])) {
      $query = "SELECT * FROM products";
      $select_all_employees_query = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_all_employees_query)) {
        $kode_produk = $row["kode_produk"];
        if($kode_produk == $field_product) {
          $harga_produk = $row["harga"];
          break;
        }
      }

      addCustomer();

      $harga_produk *= $field_laundry_weight;
      $query_add_transaction = "INSERT INTO transactions(produk, nama_customer, email_customer, berat_laundry, tanggal, harga) VALUES ('$field_product', '$field_customer_name', '$field_customer_email', '$field_laundry_weight', '$field_date', '$harga_produk')";

      $result = mysqli_query($connection, $query_add_transaction);
      header("Location: transaksi.php");

      if(!$result) {
        die("Query FAILED " . mysqli_error($connection));
      }

    }
  }

  // add customers
  function addCustomer() {
    global $field_customer_name; global $field_customer_email; global $connection;

    $query = "SELECT * FROM transactions";
    $select_all_transactions_query = mysqli_query($connection, $query);

    if(mysqli_num_rows($select_all_transactions_query) > 0) {
      $dataExist = 0;
      while ($row = mysqli_fetch_assoc($select_all_transactions_query)) {
        $nama_customer = $row["nama_customer"];
        $email = $row["email_customer"];

        if($nama_customer == $field_customer_name && $email == $field_customer_email) {
          $dataExist++;
        }
      }

      if($dataExist == 0) {
        $query_add_customer = "INSERT INTO customers(nama, jml_transaksi, email) VALUES ('$field_customer_name', '1', '$field_customer_email')";
      } else {
        $query2 = "SELECT * FROM customers";
        $select_all_customers_query = mysqli_query($connection, $query2);

        while ($row = mysqli_fetch_assoc($select_all_customers_query)) {
          $nama_customer = $row["nama"];
          $email = $row["email"];
          $id_customer = $row["id"];

          if($nama_customer == $field_customer_name && $email == $field_customer_email) {
            $query_add_customer = "UPDATE customers SET jml_transaksi = $dataExist+1 WHERE id = '$id_customer'";
            break;
          }
        }

      }
    } else {
      $query_add_customer = "INSERT INTO customers(nama, jml_transaksi, email) VALUES ('$field_customer_name', '1', '$field_customer_email')";
    }

    $result = mysqli_query($connection, $query_add_customer);
    if(!$result) {
      die("Query FAILED " . mysqli_error($connection));
    }

  }

  // display customers
  function displayCustomers() {
    global $connection;

    $query = "SELECT * FROM customers";
    $select_all_customers_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_customers_query)) {
      $customer_id = $row["id"];
      $customer_name = $row["nama"];
      $customer_email = $row["email"];
      $customer_total_transaction = $row["jml_transaksi"];

      echo "<tr>
              <td>$customer_id</td>
              <td>$customer_name</td>
              <td>$customer_total_transaction</td>
              <td>$customer_email</td>
            </tr>";
    }
  }
// end of transaksi.php



// pegawai.php
  // set form field
  function setFieldAddEmployee() {
    global $field_employee_name; global $field_employee_email; global $field_employee_age; global $field_employee_gender; global $field_employee_posisi;
    global $field_employee_start_date; global $field_employee_salary; global $connection;

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
  }

  // add employee
  function addEmployee() {
    global $field_employee_name; global $field_employee_email; global $field_employee_age; global $field_employee_gender; global $field_employee_posisi;
    global $field_employee_start_date; global $field_employee_salary; global $connection;

    if(isset($_POST["submit"])) {
      $query_add_employee = "INSERT INTO employees(nama, posisi, email, umur, gender, start_date, gaji) VALUES ('$field_employee_name', '$field_employee_posisi', '$field_employee_email', '$field_employee_age', '$field_employee_gender', '$field_employee_start_date', '$field_employee_salary')";

      $result = mysqli_query($connection, $query_add_employee);
      header("Location: pegawai.php");

      if(!$result) {
        die("Query FAILED " . mysqli_error($connection));
      }
    }
  }

  // display employees
  function displayEmployees() {
    global $connection;

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
  }

  // delete employee
  function deleteEmployee() {
    global $connection;

    if(isset($_GET["delete"])) {
      $the_employee_id = $_GET["delete"];
      $query = "DELETE FROM employees WHERE id = '$the_employee_id'";
      $query_delete = mysqli_query($connection, $query);
      header("Location: pegawai.php");
    }
  }
// end of pegawai.php

?>
