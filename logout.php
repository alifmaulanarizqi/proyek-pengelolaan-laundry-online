<?php session_start(); ?>

<?php
$_SESSION["email"] = null;
$_SESSION["name"] = null;
$_SESSION["role"] = null;

header("Location: login.php");
?>
