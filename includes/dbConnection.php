<?php
  $connection = mysqli_connect("localhost", "root", "", "laundry");
  if(!$connection) {
    die("Fail to connect to database");
  }
?>
