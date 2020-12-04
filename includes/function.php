<!-- database connection -->
<?php include "dbConnection.php"; ?>

<?php

// index.php
  // count number of employees
  function getTotalEmployees() {
    global $connection; global $total_employees;

    $query = "SELECT COUNT(*) AS number_employees FROM employees";
    $select_all_employees_query = mysqli_query($connection, $query);
    $total_employees = mysqli_fetch_assoc($select_all_employees_query)["number_employees"];
  }

  // count number of customers
  function getTotalCustomers() {
    global $connection; global $total_customers;

    $query = "SELECT COUNT(*) AS number_customers FROM customers";
    $select_all_customers_query = mysqli_query($connection, $query);
    $total_customers = mysqli_fetch_assoc($select_all_customers_query)["number_customers"];
  }

  // display recent transactions
  function displayRecentTransactions() {
    global $connection;

    $query = "SELECT * FROM transactions ORDER BY id DESC LIMIT 5";
    $select_the_five_last_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_the_five_last_query)) {
      $transaction_id = $row["id"];
      $transaction_product = $row["id_produk"];
      $customer_id = $row["id_customer"];
      $laundry_weight = $row["berat_laundry"];
      $transaction_date = $row["tanggal"];
      $transaction_price = $row["harga"];
      $transaction_price = number_format($transaction_price);

      echo "<tr>
              <td>$transaction_id</td>
              <td>$transaction_product</td>
              <td>$customer_id</td>
              <td>$laundry_weight</td>
              <td>$transaction_date</td>
              <td>Rp $transaction_price</td>
            </tr>";
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
      $product_name = $row["nama"];
      $product_price = $row["harga"];
      $product_price = number_format($product_price);
      $product_info = $row["keterangan"];

      echo "<tr>
              <td>$product_id</td>
              <td>$product_name</td>
              <td>Rp $product_price</td>
              <td>$product_info</td>
              <td><a href='produk.php?source=edit_produk&edit_produk_id=$product_id'>Edit</a></td>
              <td><a href='produk.php?delete=$product_id'>Delete</a></td>
            </tr>";
    }
  }

  // get value of edit product
  function getEditProductValue() {
    global $connection; global $product_id; global $product_name; global $product_price; global $product_detail;

    if(isset($_GET["edit_produk_id"])) {
      $product_id = $_GET["edit_produk_id"];
    }

    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $select_product_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_product_query);

    $product_name = $row["nama"];
    $product_price = $row["harga"];
    $product_detail = $row["keterangan"];
  }

  // edit product
  function editProduct() {
    global $connection; global $product_id; global $product_name; global $product_price; global $product_detail; global $notifsuccess; global $double_product_id;

    if(isset($_POST["edit-produk"])) {
      $the_product_id = $_POST["kode-produk"];
      $the_product_name = $_POST["nama"];
      $the_product_price = $_POST["harga"];
      $the_product_detail = $_POST["keterangan"];

      $query = "SELECT id FROM products WHERE NOT id = '$product_id'";
      $select_product_id_query = mysqli_query($connection, $query);

      $check_poduct_id = "";
      while ($row = mysqli_fetch_assoc($select_product_id_query)) {
        if($the_product_id == $row["id"]) {
          $check_poduct_id = "kembar";
          break;
        }
      }

      if($check_poduct_id == "kembar") {
        $double_product_id = "Produk id sudah digunakan";
      } else {
        $query = "UPDATE products SET id = '$the_product_id', nama = '$the_product_name', harga = $the_product_price, keterangan = '$the_product_detail' WHERE id = '$product_id'";
        $update_product_query = mysqli_query($connection, $query);

        $query = "UPDATE transactions SET id_produk = '$the_product_id' WHERE id_produk = '$product_id'";
        $update_transaction_query = mysqli_query($connection, $query);
        $notifsuccess = "Data produk bergasil diubah";

        $product_id = "";
        $product_name = "";
        $product_price = "";
        $product_detail = "";
      }

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
      $transaction_product = $row["id_produk"];
      $customer_id = $row["id_customer"];
      $laundry_weight = $row["berat_laundry"];
      $transaction_date = $row["tanggal"];
      $transaction_price = $row["harga"];
      $transaction_price = number_format($transaction_price);

      echo "<tr>
              <td>$transaction_id</td>
              <td>$transaction_product</td>
              <td>$customer_id</td>
              <td>$laundry_weight</td>
              <td>$transaction_date</td>
              <td>Rp $transaction_price</td>
              <td><a href='transaksi.php?source=edit_transaksi&edit_transaksi_id=$transaction_id'>Edit</a></td>
              <td><a href='transaksi.php?delete=$transaction_id&cust_id=$customer_id'>Delete</a></td>
            </tr>";
    }
  }

  // delete transaction
  function deleteTransaction() {
    global $connection;

    if(isset($_GET["delete"])) {
      $the_transaction_id = $_GET["delete"];
      $the_customer_id = $_GET["cust_id"];

      $query = "SELECT jml_transaksi FROM customers WHERE id='$the_customer_id'";
      $customer_total_transaction_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($customer_total_transaction_query);
      $customer_total_transaction = $row["jml_transaksi"];

      if($customer_total_transaction == 1) {
        $query = "DELETE FROM customers WHERE id='$the_customer_id'";
        $result = mysqli_query($connection, $query);
      } else {
        $query = "UPDATE customers SET jml_transaksi = $customer_total_transaction-1 WHERE id='$the_customer_id'";
        $result = mysqli_query($connection, $query);
      }

      $query = "DELETE FROM transactions WHERE id = '$the_transaction_id'";
      $result = mysqli_query($connection, $query);
      header("Location: transaksi.php");
    }
  }

  // link product field with database
  function displayProductList() {
    global $connection; global $product_id;

    $query = "SELECT * FROM products";
    $select_all_products_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_products_query)) {
      $id_produk = $row["id"];

      if($product_id == $id_produk) {
        echo "<option selected value='$id_produk'>$id_produk</option>";
      } else {
        echo "<option value='$id_produk'>$id_produk</option>";
      }

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
      $query = "SELECT harga FROM products WHERE id = '$field_product'";
      $select_all_employees_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($select_all_employees_query);
      $harga_produk = $row["harga"];

      addCustomer();

      $query = "SELECT id FROM customers WHERE nama='$field_customer_name' AND email='$field_customer_email'";
      $select_id_customers_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($select_id_customers_query);
      $customer_id = $row["id"];

      $harga_produk *= $field_laundry_weight;
      $query_add_transaction = "INSERT INTO transactions(id_produk, id_customer, berat_laundry, tanggal, harga) VALUES ('$field_product', '$customer_id', '$field_laundry_weight', '$field_date', '$harga_produk')";

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

    $query2 = "SELECT id FROM customers WHERE nama='$field_customer_name' AND email='$field_customer_email'";
    $select_id_customers_query = mysqli_query($connection, $query2);
    $row = mysqli_fetch_assoc($select_id_customers_query);
    $the_customer_id = $row["id"];

    $count_query = "SELECT COUNT(*) AS banyak_data FROM transactions";
    $select_count_query = mysqli_query($connection, $count_query);
    $row = mysqli_fetch_assoc($select_count_query);
    $manyRows = $row["banyak_data"];

    if($manyRows > 0) {
      $count_query = "SELECT COUNT(*) AS banyak_data FROM transactions WHERE id_customer='$the_customer_id'";
      $select_count_query = mysqli_query($connection, $count_query);
      $row = mysqli_fetch_assoc($select_count_query);
      $dataExist = $row["banyak_data"];

      if($dataExist == 0) {
        $query_add_customer = "INSERT INTO customers(nama, jml_transaksi, email) VALUES ('$field_customer_name', '1', '$field_customer_email')";
      } else {
        $query2 = "SELECT * FROM customers";
        $select_all_customers_query = mysqli_query($connection, $query2);

        while ($row = mysqli_fetch_assoc($select_all_customers_query)) {
          $nama_customer = $row["nama"];
          $email = $row["email"];
          $id_customer = $row["id"];
          $jumlah_transaksi = $row["jml_transaksi"];

          if($nama_customer == $field_customer_name && $email == $field_customer_email) {
            $query_add_customer = "UPDATE customers SET jml_transaksi = $jumlah_transaksi+1 WHERE id = '$id_customer'";
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
// end of transaksi.php



// pelanggan.php
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
              <td><a href='pelanggan.php?source=edit_customer&edit_customer_id=$customer_id'>Edit</a></td>
              <td><a href='pelanggan.php?delete=$customer_id'>Delete</a></td>
            </tr>";
    }
  }

  // get value of edit customer
  function getEditCustomerValue() {
    global $connection; global $customer_id; global $customer_name; global $customer_email;

    if(isset($_GET["edit_customer_id"])) {
      $customer_id = $_GET["edit_customer_id"];
    }

    $query = "SELECT * FROM customers WHERE id = '$customer_id'";
    $select_customers_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_customers_query);

    $customer_name = $row["nama"];
    $customer_email = $row["email"];
  }

  // edit customer
  function editCustomer() {
    global $connection; global $customer_id; global $customer_name; global $customer_email; global $notifsuccess;

    if(isset($_POST["edit-customer"])) {
      $the_customer_name = $_POST["nama"];
      $the_customer_email = $_POST["email"];

      $query = "UPDATE customers SET nama = '$the_customer_name', email = '$the_customer_email' WHERE id = $customer_id";
      $update_customer_query = mysqli_query($connection, $query);
      $notifsuccess = "Data pelanggan berhasil diubah";

      $customer_name = "";
      $customer_email = "";
    }

  }

  // delete customer
  function deleteCustomer() {
    global $connection;

    if(isset($_GET["delete"])) {
      $the_customer_id = $_GET["delete"];

      $query = "DELETE FROM transactions WHERE id_customer ='$the_customer_id'";
      $query_delete = mysqli_query($connection, $query);

      $query = "DELETE FROM customers WHERE id = '$the_customer_id'";
      $query_delete = mysqli_query($connection, $query);
      header("Location: pelanggan.php");
    }
  }
// end of pelanggan.php




// edit_transaksi.php
  // get value of transaction
  function getEditTransactionValue() {
    global $connection; global $transaction_id; global $customer_name; global $customer_email; global $product_id; global $laundry_weight;

    if(isset($_GET["edit_transaksi_id"])) {
      $transaction_id = $_GET["edit_transaksi_id"];
    }

    $query = "SELECT * FROM transactions WHERE id = '$transaction_id'";
    $select_transaction_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_transaction_query);

    $product_id = $row["id_produk"];

    $customer_id = $row["id_customer"];
    $query = "SELECT * FROM customers WHERE id = $customer_id";
    $select_name_email_query = mysqli_query($connection, $query);
    $row2 = mysqli_fetch_assoc($select_name_email_query);
    $customer_name = $row2["nama"];
    $customer_email = $row2["email"];

    $product_id = $row["id_produk"];
    $laundry_weight = $row["berat_laundry"];
  }

  // edit transaction
  function editTransaction() {
    global $connection; global $transaction_id; global $customer_name; global $customer_email; global $product_id; global $laundry_weight; global $notifsuccess;

    if(isset($_POST["edit-transaksi"])) {
      $the_customer_name = $_POST["nama"];
      $the_customer_email = $_POST["email"];
      $produk_id = $_POST["product"];
      $laundry_weight = $_POST["berat"];

      if($customer_name == $the_customer_name && $customer_email == $the_customer_email) {
        $query = "SELECT harga FROM products WHERE id = '$produk_id'";
        $select_price_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_price_query);
        $product_price = $row["harga"];
        $transaction_product_price = $product_price * $laundry_weight;

        $query = "UPDATE transactions SET id_produk = '$produk_id', berat_laundry = $laundry_weight, tanggal = now(), harga = $transaction_product_price WHERE id = $transaction_id";
        $update_post_query = mysqli_query($connection, $query);
      } else {
        $query = "SELECT * FROM customers WHERE nama = '$customer_name' AND email = '$customer_email'";
        $select_id_customers_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($select_id_customers_query);
        $customer_id = $row["id"];
        $number_of_transaction = $row["jml_transaksi"];

        if($number_of_transaction == 1) {
          $query = "DELETE FROM customers WHERE id = $customer_id";
          $delete_customer_query = mysqli_query($connection, $query);

          $query = "SELECT * FROM customers WHERE nama = '$the_customer_name' AND email = '$the_customer_email'";
          $select_customers_query = mysqli_query($connection, $query);

          if(!is_null($select_customers_query)) {
            $query = "SELECT * FROM customers WHERE nama = '$the_customer_name' AND email = '$the_customer_email'";
            $select_customers_query = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select_customers_query);
            $customer_id2 = $row["id"];
            $number_of_transaction2 = $row["jml_transaksi"];

            $query = "UPDATE customers SET jml_transaksi = $number_of_transaction2+1 WHERE id = $customer_id2";
            $update_customer_query = mysqli_query($connection, $query);

            $query = "UPDATE transactions SET id_customer = $customer_id2 WHERE id = $transaction_id";
            $update_transaction_query = mysqli_query($connection, $query);
          } else {
            $query = "INSERT INTO customers(nama, jml_transaksi, email) VALUES ('$the_customer_name', '1', '$the_customer_email')";
            $add_customer_query = mysqli_query($connection, $query);
          }
        } else {
          $query = "UPDATE customers SET jml_transaksi = $number_of_transaction-1 WHERE id = $customer_id";
          $update_customer_query = mysqli_query($connection, $query);

          $query = "SELECT MAX(id) AS 'max_id' FROM customers";
          $max_customer_id_query = mysqli_query($connection, $query);
          $row = mysqli_fetch_assoc($max_customer_id_query);
          $max_customer_id = $row["max_id"];

          $query = "UPDATE transactions SET id_customer = $max_customer_id+1 WHERE id = $transaction_id";
          $update_transaction_query = mysqli_query($connection, $query);

          $query = "INSERT INTO customers(nama, jml_transaksi, email) VALUES ('$the_customer_name', '1', '$the_customer_email')";
          $add_customer_query = mysqli_query($connection, $query);
        }

      }

      $notifsuccess = "Transaksi berhasil diubah";
      $customer_name = "";
      $customer_email = "";
      $product_id = "";
      $laundry_weight = "";
    }
  }

// end of edit_transaksi.php




// pegawai.php
  // set form field
  function setFieldAddEmployee() {
    global $field_employee_name; global $field_employee_email; global $field_employee_age; global $field_employee_gender; global $field_employee_posisi;
    global $field_employee_start_date; global $field_employee_salary; global $connection;

    if(isset($_POST["tambah-pegawai"])) {
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

    if(isset($_POST["tambah-pegawai"])) {
      $query = "SELECT id FROM positions WHERE posisi='$field_employee_posisi'";
      $select_position_id_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($select_position_id_query);
      $position_id = $row["id"];

      $query_add_employee = "INSERT INTO employees(nama, posisi, email, umur, gender, start_date, gaji) VALUES ('$field_employee_name', '$position_id', '$field_employee_email', '$field_employee_age', '$field_employee_gender', '$field_employee_start_date', '$field_employee_salary')";

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
              <td><a href='pegawai.php?delete-pegawai=$employee_id'>Delete</a></td>
            </tr>";
    }
  }

  // link product field with database
  function displayPositionList() {
    global $connection;

    $query = "SELECT * FROM positions";
    $select_all_positions_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_positions_query)) {
      $nama_posisi = $row["posisi"];

      echo "<option value='<?php echo $nama_posisi; ?>'>$nama_posisi</option>";
    }
  }

  // delete employee
  function deleteEmployee() {
    global $connection;

    if(isset($_GET["delete-pegawai"])) {
      $the_employee_id = $_GET["delete-pegawai"];
      $query = "DELETE FROM employees WHERE id = '$the_employee_id'";
      $query_delete = mysqli_query($connection, $query);
      header("Location: pegawai.php");
    }
  }

  // set form field
  function setFieldAddPosition() {
    global $field_position_name; global $connection;

    if(isset($_POST["tambah-posisi"])) {
      $field_position_name = $_POST["nama"];
    }

    // prevent sql injection
    $field_position_name = mysqli_real_escape_string($connection, $field_position_name);
  }

  // add position
  function addPosition() {
    global $field_position_name; global $position_err; global $connection;

    if(isset($_POST["tambah-posisi"])) {
      $count_query = "SELECT COUNT(*) AS banyak_data FROM positions WHERE posisi='$field_position_name'";
      $select_count_query = mysqli_query($connection, $count_query);
      $row = mysqli_fetch_assoc($select_count_query);
      $manyRows = $row["banyak_data"];

      if($manyRows == 0) {
        $query_add_position = "INSERT INTO positions(posisi) VALUES ('$field_position_name')";

        $result = mysqli_query($connection, $query_add_position);
        header("Location: pegawai.php");

        if(!$result) {
          die("Query FAILED " . mysqli_error($connection));
        }
      } else {
        $position_err = "Posisi $field_position_name sudah terdaftar";
      }

    }
  }

  // display positions
  function displayPositions() {
    global $connection;

    $query = "SELECT * FROM positions";
    $select_all_positions_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_positions_query)) {
      $position_id = $row["id"];
      $position_name = $row["posisi"];

      echo "<tr>
              <td>$position_id</td>
              <td>$position_name</td>
              <td><a href='pegawai.php?delete-posisi=$position_id'>Delete</a></td>
            </tr>";
    }
  }

  // delete position
  function deletePosition() {
    global $connection;

    if(isset($_GET["delete-posisi"])) {
      $the_position_id = $_GET["delete-posisi"];
      $query = "DELETE FROM positions WHERE id = '$the_position_id'";
      $query_delete = mysqli_query($connection, $query);
      header("Location: pegawai.php");
    }
  }
// end of pegawai.php

?>
