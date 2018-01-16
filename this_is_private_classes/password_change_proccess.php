<?php

include "../init/config.php";
require_once "connection.php";
//language
if (isset($_COOKIE["language"])) {
  include "../en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "../ar-strings.php";
}


class change extends connection {

public function password ($current_user_name,$oldpassword_data,$new_password_data,$password_confirm_data) {

  $query_extract_id = "select * from tablefor_users where thisisuser_name='" . $current_user_name. "'";
  $extract_id_from_database = mysqli_query($this->con, $query_extract_id);
  $id = mysqli_fetch_array($extract_id_from_database,MYSQLI_ASSOC);
  $current_password = $id["thisisuser_password"];
  global $missing_data_login;
  global $current_pass_wrong;
  global $the_new_pass_nm;
  global $password_length;
  global $password_english;
  global $failed_register;
  global $update_info_success_label;
  // filter data
  if (empty($oldpassword_data) && empty($new_password_data) && empty($password_confirm_data)) {

  echo $missing_data_login;
  die();

  }

  $old_password_safe = htmlspecialchars($oldpassword_data);
  $new_password_safe = htmlspecialchars($new_password_data);
  $password_confirm_safe = htmlspecialchars($password_confirm_data);
  $password_new = mysqli_real_escape_string($this->con,$new_password_safe);
  $password_new_confirm = mysqli_real_escape_string($this->con,$password_confirm_safe );
  $old_password = md5(str_replace(' ', '',$old_password_safe));
  $new_password = str_replace(' ', '',$password_new);
  $password_confirm = str_replace(' ', '',$password_new_confirm);

  if ($old_password !== $current_password) {
    echo $current_pass_wrong;
    die();
  } else if ($new_password !== $password_confirm) {

    echo $the_new_pass_nm;
    die();

  } else if (strlen($new_password) < 8 || strlen($new_password) > 30) {
    echo $password_length;
    die();
  } else if (preg_match('/[^A-Za-z0-9-.]/', $new_password)) {
    echo $password_english;
    die();
  } else {
    $password = md5($new_password);
    $edit_query  = "update tablefor_users set thisisuser_password='".$password. "' where id=" . $id["id"];
    $update = mysqli_query($this->con, $edit_query);
    if ($update == false) {
      echo $failed_register;
    }else {
      echo $update_info_success_label;
    }
    }







}
}










 ?>
