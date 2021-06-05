<!-- header  -->
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
    case "edit_transaksi";
      include "edit_transaksi.php";
      break;
    default:
      include "tabel_dan_form_transaksi.php";
      break;
  }
?>

<!-- footer  -->
<?php include "includes/footer.php"; ?>
