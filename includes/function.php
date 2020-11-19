<!-- database connection -->
<?php include "dbConnection.php"; ?>

<?php

// pengaturan.html - pengaturan nama
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
// end of pengaturan.html - pengaturan nama


// pengaturan.html - pengaturan password

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
// end of pengaturan.html - pengaturan password

?>
