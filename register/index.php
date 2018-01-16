<?php

require "../init/config.php";
require_once "../this_is_private_classes/register_user.php";

if (isset($_POST["register"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {
  $valid_file_types = array(

      "image/png",

      "image/jpeg",

      "image/jpg",

  );
$size = is_array(getimagesize($_FILES["user_picture"]["tmp_name"]));
  if (in_array($_FILES['user_picture']['type'],$valid_file_types) && $size == true ) {
    @$user_picture =  $_POST["user_name"] . "_"  .  rand(1,99999) . '.' . end(explode(".",$_FILES["user_picture"]["name"]));
    $ip = $_SERVER['REMOTE_ADDR'];
    $register = new registeruser();
    $register->register($_POST["user_name"],$_POST["name"],$_POST["user_password"],$_POST["user_country"],$user_picture,$_POST["user_gender"],$ip);
    $RandomAccountNumber = uniqid();
     move_uploaded_file($_FILES['user_picture']['tmp_name'], '../profile_pictures_for_users/' . $user_picture);
  }else if ($_FILES["user_picture"]["size"] == 0) {
    header("Location: ../register.php?error=inf");
    die("error");

  } else {
      header("Location: ../register.php?error=invalidimage");
      die("error");
  }




} else {
  header("Location: ../register.php");
}


 ?>
