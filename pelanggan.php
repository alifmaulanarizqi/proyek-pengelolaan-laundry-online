<!-- header -->
<?php include "includes/header.php"; ?>

<!-- navbar -->
<?php include "includes/navbar.php" ?>

<!-- modal -->
<?php include "includes/modal.php" ?>

<?php
  $source = "";
  if(isset($_GET["source"])) {
    $source = $_GET["source"];
  }

  switch($source) {
    case "edit_customer";
      include "edit_customer.php";
      break;
    default:
      include "tabel_pelanggan.php";
      break;
  }
?>

<!-- footer  -->
<?php include "includes/footer.php"; ?>
