<?php
session_start();
session_regenerate_id(true);
if(isset($_POST["delete"]) && isset($_SESSION["this_is_session_for_user"])) {
include "../init/config.php";

$user_name = $_SESSION["this_is_session_for_user"];

$query = "update tablefor_users set account_statue='deleted' where thisisuser_name='".$user_name."'";
$execute_query = mysqli_query($db,$query);

if ($execute_query == true) {
  header("Location: ../DeleteAccount");
}else {
  die("حدث خطأ اثناء حذف حسابك");
}
}else {
  header("Location: ../");
}




 ?>
