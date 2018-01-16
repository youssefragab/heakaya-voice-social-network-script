<?php
session_start();

if(isset($_SESSION["admin"])) {
  session_destroy();
  header("Location: login.php");
}else if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
}


 ?>
