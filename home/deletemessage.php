<?php

session_start();
session_regenerate_id(true);
if(!isset($_SESSION["this_is_session_for_user"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {
header("Location: ../index.php");
}else {
  require "../init/config.php";
  $user_name = $_SESSION["this_is_session_for_user"];
  $message_code_ = htmlspecialchars($_GET["mc"]);
  $message_code = mysqli_real_escape_string($db,$message_code_);
  $check_auth_query = "select * from this_is_users_audio_sounds where sound_message_code='" .$message_code."' and sound_message_user='" . $user_name ."'";
  $e_c_a = mysqli_query($db,$check_auth_query);
  $auth_statue = mysqli_num_rows($e_c_a);
  if ($auth_statue == 1) {
  $delete_query = "update this_is_users_audio_sounds set sound_message_statue='deleted' where sound_message_code='" .$message_code."' and sound_message_user='" . $user_name ."'";
  $execute = mysqli_query($db,$delete_query);
  $share_query = "select * from this_is_users_shares where sound_message_code='".$message_code."' and sound_message_user='".$user_name."'";
  $execute_share = mysqli_query($db,$share_query);
  if (mysqli_num_rows($execute_share) !== 0) {
    $delete_share = "delete from this_is_users_shares where sound_message_code='".$message_code."' and sound_message_user='".$user_name."'";
    $execute_delete_share = mysqli_query($db,$delete_share);
    if ($execute == true && $execute_delete_share == true) {
      header("Location: ../home");
    }else {
      header("Location: ../404.php");
    }
  }
  if ($execute == true) {
    header("Location: ../home");
  }else {
    header("Location: ../404.php");
  }
  }else {
    header("Location: ../404.php");
  }
}




 ?>
