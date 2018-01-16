<?php

require "../init/config.php";
require_once "../this_is_private_classes/login_user.php";

if (isset($_POST["login"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {

$login = new login_user();
$login->login($_POST["user_name"],$_POST["user_password"]);


}else {
  header("Location: ../login.php");
}
 ?>
