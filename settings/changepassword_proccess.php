<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION["this_is_session_for_user"])) {
  require_once "../this_is_private_classes/password_change_proccess.php";
if ( isset($_POST["oldpassword"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain ) {
  $current_user_name = $_SESSION["this_is_session_for_user"];
  $chagnepassword = new change();
  $chagnepassword->password($current_user_name,$_POST["oldpassword"],$_POST["newpassword"],$_POST["confirmpassword"]);
}else {
  header("Location: ../index.php");
}
}else {
  header("Location: ../index.php");
}
 ?>
