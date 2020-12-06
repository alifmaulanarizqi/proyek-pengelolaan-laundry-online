<?php session_start(); ?>

<?php
  $_SESSION["username"] = null;
  $_SESSION["password"] = null;
  $_SESSION["role"] = null;
  $_SESSION["laundry_name"] = null;

  header("Location: login.php");
?>
