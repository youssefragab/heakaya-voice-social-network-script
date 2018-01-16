<?php

// include config
include "init/config.php";
require_once "connection.php";
//

//the login class
class login_user extends connection {

public function login ($user_name_data,$password_data) {

  if (!empty($user_name_data) && !empty($password_data)) {

// filter data
$user_name_strip = htmlspecialchars($user_name_data);
$user_name_2 = strtolower($user_name_strip);
$user_name = str_replace(' ', '',$user_name_2);
// filter password
$password_strip_html = htmlspecialchars($password_data);
$password_no_spaces = str_replace(" ","",$password_strip_html);
$user_password = md5($password_no_spaces);


//*///////////////////*

// extract users data from database
$query = "select * from tablefor_users WHERE thisisuser_name='".$user_name."' and thisisuser_password='".$user_password."'";
$login = mysqli_query($this->con, $query);
$count = mysqli_num_rows($login);
$data = mysqli_fetch_array($login,MYSQLI_ASSOC);


 if ($count == 1 && $data["account_statue"] == "active") {
   $_SESSION["this_is_session_for_user"] = $user_name;
   header("Location: http://heakaya.com/home");
 } else {
   header("Location: ../login.php?error=w");
 }



  } else {
  header("Location: ../login.php?error=m");
  }




}
}
















 ?>
