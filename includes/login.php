<!-- database connectivity -->
<?php include "dbConnection.php"; ?>

<!-- turn on the session -->
<?php session_start(); ?>

<?php
  global $connection;
  if(isset($_POST["login"])) {
    $email = $_POST["emailuser"];
    $password = $_POST["password"];

    // prevent sql injection
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    // encrypt password
    $hashFormat = "$2y$10$";
    $salt = "usesomesillystringforsalt";
    $hashFormatAndSalt = $hashFormat . $salt;
    $password = crypt($password, $hashFormatAndSalt);

    $query = "SELECT * FROM employees WHERE email = '$email'";
    $select_user_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($select_user_query);

    if(is_null($row)) {
      header("Location: ../login.php");
    } else {
      $user_id = $row["id"];
      $user_name = $row["nama"];
      $user_email = $row["email"];
      $user_password = $row["password"];
      $user_role_id = $row["posisi"];

      $query = "SELECT posisi FROM positions WHERE id = $user_role_id";
      $select_position_name_query = mysqli_query($connection, $query);
      $row = mysqli_fetch_assoc($select_position_name_query);
      $user_role = $row["posisi"];

      if($email != $user_email && $password != $user_password) {
        header("Location: ../login.php");
      } else if($email == $user_email && $password == $user_password){
        $_SESSION["email"] = $user_email;
        $_SESSION["name"] = $user_name;
        $_SESSION["role"] = $user_role;

        header("Location: ../index.php");
      } else {
        header("Location: ../login.php");
      }

    }

  }
?>
