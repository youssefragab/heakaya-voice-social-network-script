<?php
session_start();
session_regenerate_id(true);
//language
if (isset($_COOKIE["language"])) {
  include "../en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "../ar-strings.php";
}
if(isset($_SESSION["this_is_session_for_user"])) {
require "../init/config.php";
$user_name = $_SESSION["this_is_session_for_user"];
$query_extract_id = "select * from tablefor_users where thisisuser_name='" . $user_name. "'";
$extract_id_from_database = mysqli_query($db, $query_extract_id);
$id = mysqli_fetch_array($extract_id_from_database,MYSQLI_ASSOC);
  if (isset($_POST["privacy"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {
    $privacy = htmlspecialchars($_POST["privacy"]);
    $privay_query = "update tablefor_users set privacy='".$privacy."' where id=" . $id["id"];
    $execute = mysqli_query($db,$privay_query);

    if ($execute == true) {
    echo $update_info_success_label;
    }else {
      echo $failed_register;
    }

  }else {
    header("Location: privacy.php");
  }

}else {
  header("Location: ../");
}
 ?>
