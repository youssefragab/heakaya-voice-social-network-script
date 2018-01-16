<?php
include "init/config.php";
if (isset($_POST["mecode"]) && isset($_POST["user"]) && isset($_POST["mename"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {
$code_ = htmlspecialchars($_POST["mecode"]);
$code = mysqli_real_escape_string($db,$code_);
$user_ = htmlspecialchars($_POST["user"]);
$mname_ = htmlspecialchars($_POST["mename"]);
$mname = mysqli_real_escape_string($db,$mname_);
$user = mysqli_real_escape_string($db,$user_);
$check_query = "select * from this_is_users_audio_sounds where sound_message_code='" .$code. "' and sound_message_user='" .$user. "'
and sound_message_statue='notactive'";
$execute_c_q = mysqli_query($db,$check_query);
$c_q_n = mysqli_num_rows($execute_c_q);
if ($c_q_n == 1) {
$s_m = "update this_is_users_audio_sounds set sound_message_statue='active' , sound_message_name='".$mname."' where sound_message_code='" .$code. "' and sound_message_user='" .$user."'";
$execute_s_m = mysqli_query($db,$s_m);
// update sent_confess
if ($execute_s_m == true) {
  if (isset($_SESSION["this_is_session_for_user"])) {
  	@$loged_user = $_SESSION["this_is_session_for_user"];
  	@$query_extract_sent_confess_num = "select * from tablefor_users where thisisuser_name='" .$loged_user ."'";
  	$execute_query_1 = mysqli_query($db,$query_extract_sent_confess_num);
  	$sent_confess_num = mysqli_fetch_array($execute_query_1,MYSQLI_ASSOC);
    $new_sent_confess = $sent_confess_num["sent_confess"] + 1;
    $update_sent_confess_query = "update tablefor_users set sent_confess='" . $new_sent_confess ."' where thisisuser_name='" .$loged_user. "'";
    $execute_s_c_q = mysqli_query($db,$update_sent_confess_query);
  }
  ///////////////////////////////////////

  //upate recieved confess num
  $query_f_u ="select * from tablefor_users where thisisuser_name='" .$user ."'";
  $e_r_u_r_c = mysqli_query($db,$query_f_u);
  $f_r_u_c = mysqli_fetch_array($e_r_u_r_c,MYSQLI_ASSOC);
  $r_c_n_n = $f_r_u_c["received_conffes"] + 1;
  $u_p_n_n_f_u_c = "update tablefor_users set received_conffes='" . $r_c_n_n ."' where thisisuser_name='" .$user. "'";
  $e_n_r_c_f_u = mysqli_query($db,$u_p_n_n_f_u_c);

}
}else {
  die("<center>عفوا,حدث خطأ ما الرجاء الرجوع للصفحة السابقة</center>");
}

}else {
  header("location: index.php");
}





 ?>
