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
    case "edit_pegawai":
      include "edit_pegawai.php";
      break;
    case "edit_posisi":
      include "edit_posisi.php";
      break;
    default:
      include "tabel_dan_form_pegawai.php";
      break;
  }
?>

<!-- footer  -->
<?php include "includes/footer.php"; ?>
