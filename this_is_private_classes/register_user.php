<?php
// include config
@include "init/config.php";
require_once "connection.php";
// the class
class registeruser extends connection {



public function register($user_name_data,$name_data,$password_data,$country_data,$user_picture_data,$user_gender_data,$ip_data) {
if (!empty($user_name_data) && !empty($password_data) && !empty($country_data) && !empty($user_picture_data) && !empty($user_gender_data) && !empty($name_data) ) {

// filter inputs
  $user_name_strip = htmlspecialchars($user_name_data);
  $password_strip_html = htmlspecialchars($password_data);
  $country = htmlspecialchars($country_data);
  $user_picture = htmlspecialchars($user_picture_data);
  $user_gender = htmlspecialchars($user_gender_data);
  $user_name_2 = strtolower($user_name_strip);
  $ip = htmlspecialchars($ip_data);
  $user_name = str_replace(' ', '',$user_name_2);
  $name = htmlspecialchars($name_data);
  $password_no_spaces = str_replace(" ","",$password_strip_html);
//
$query_extract_usernames = "select * from tablefor_users where thisisuser_name='" . $user_name. "'";
$extract_username_from_database = mysqli_query($this->con, $query_extract_usernames);
$count_user_names = mysqli_num_rows($extract_username_from_database);
// validate inputs
 if ($count_user_names > 0 ) {
  header("Location: ../register.php?error=usernamealreadyexist");
  die();
} else if (strlen($user_name) > 25 || strlen($user_name) < 5) {
  header("Location: ../register.php?error=usernamelength");
  die();
} else if (preg_match('/[^A-Za-z0-9-.-_]/', $user_name))
{
header("Location: ../register.php?error=unnie");
die();
} else if (strlen($password_no_spaces) < 8 || strlen($password_no_spaces) > 30) {
  header("Location: ../register.php?error=password");
  die();
} else if (preg_match('/[^A-Za-z0-9-.]/', $password_no_spaces)) {
  header("Location: ../register.php?error=pwnie");
  die();
} else if (strlen($country) < 3) {
  header("Location: ../register.php?error=country");
  die();
} else if ($user_gender !== "ذكر" && $user_gender !== "انثي") {
header("Location: ../register.php?error=gender");

} else {
// encrypt password
$password = md5($password_no_spaces);
// enter data to database
  $query = "insert into tablefor_users (thisisuser_name,thisis_name,thisisuser_password,thisisuser_country,thisisuser_picture,thisisuser_gender,
  user_joined_time,user_ip_address,account_statue,privacy) values
  ('".$user_name."','".$name."','".$password."','".$country."','".$user_picture."','".$user_gender."',now(),'".$ip."','active','public')";
$register = mysqli_query($this->con, $query);
//

  if ($register == true) {
    $_SESSION["this_is_session_for_user"] = $user_name;
    header("Location: http://heakaya.com/home");
  }else {
  header("Location: ../register.php?error=failed");
  }

}


} else {
  header("Location: ../register.php?error=missing");
}

// echo result

}
}








 ?>
