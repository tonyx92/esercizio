<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">


<?php 

include $_SERVER["DOCUMENT_ROOT"] . "/demo/Martino-Tognoli/db/db.php"; ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/demo/Martino-Tognoli/functions/functions.php"; ?>
<?php session_start(); ?>

<?php
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
     header("Location: ../../index.php");
   exit();
 }
?>