<?php

session_start();
session_regenerate_id(true);

require_once "../this_is_private_classes/update_user_info.php";

if ( isset($_POST["username"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain ) {
$current_user_name = $_SESSION["this_is_session_for_user"];
$update = new updateUser();
$update->editUser($current_user_name,$_POST["username"],$_POST["name"],$_POST["country"]);
}else {
  header("Location: editaccount.php");
}
 ?>
