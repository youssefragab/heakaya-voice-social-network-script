<?php

$cookie_name = "language";
$cookie_value = "en";

if(!isset($_COOKIE["language"])) {
  setcookie($cookie_name,$cookie_value,time() + 60*60*24*365, "/");
  $loc = $_SERVER["HTTP_REFERER"];
  header("Location: " . $loc);
}else if (isset($_COOKIE["language"])) {
  setcookie($cookie_name,"", time() - 3600,"/");
  $loc = $_SERVER["HTTP_REFERER"];
  header("Location: " . $loc);
}



 ?>
