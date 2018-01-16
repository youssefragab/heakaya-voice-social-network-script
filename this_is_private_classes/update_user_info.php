<?php


include "../init/config.php";
require_once "connection.php";
//language
if (isset($_COOKIE["language"])) {
  require "../en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  require "../ar-strings.php";
}

class updateUser extends connection {

public function editUser($current_user_name,$user_name_data,$name_data,$country_data) {
//init
$query_extract_id = "select * from tablefor_users where thisisuser_name='" . $current_user_name. "'";
$extract_id_from_database = mysqli_query($this->con, $query_extract_id);
$id = mysqli_fetch_array($extract_id_from_database,MYSQLI_ASSOC);
global $no_update_fields;
global $you_got_username;
global $already_exist;
global $user_name_length;
global $user_name_nie;
global $country_length;
global $failed_register;
global $update_info_success_label;
// filter data
if (empty($user_name_data) && empty($name_data) && empty($country_data)) {
echo $no_update_fields;
die();

}
 if (empty($user_name_data)) {
  $user_name = $current_user_name;
  $count_user_names = 0;
  $cu_user_name = "";
} else  {
  $user_name_strip = htmlspecialchars($user_name_data);
  $user_name_2 = strtolower($user_name_strip);
  $user_name_3 = str_replace(' ', '',$user_name_2);
  $user_name = mysqli_real_escape_string($this->con,$user_name_3);
  $query_extract_usernames = "select * from tablefor_users where thisisuser_name='" .$user_name. "'";
  $extract_username_from_database = mysqli_query($this->con, $query_extract_usernames);
  $count_user_names = mysqli_num_rows($extract_username_from_database);
  $cu_user_name = $current_user_name;
}
if (empty($name_data)) {
  $name = mysqli_real_escape_string($this->con,$id["thisis_name"]);
}else {
$name_ = htmlspecialchars($name_data);
$name = mysqli_real_escape_string($this->con,$name_);
}
if (empty($country_data)) {
  $country = mysqli_real_escape_string($this->con,$id["thisisuser_country"]);
}else {
$country_not_safe = htmlspecialchars($country_data);
$country = mysqli_real_escape_string($this->con, $country_not_safe);
}


 if ($cu_user_name == $user_name) {
 echo $you_got_username;
 die();
 } else if ($count_user_names > 0 ) {
  echo $already_exist;
  die();

} else if (strlen($user_name) > 25 || strlen($user_name) < 5) {
  echo $user_name_length;
  die();
} else if (preg_match('/[^A-Za-z0-9-.]/', $user_name))
{
 echo $user_name_nie;
  die();
} else if (strlen($country) < 3) {
echo $country_length;
  die();
} else {
  $update_messages_q = "update this_is_users_audio_sounds set sound_message_user='".$user_name."' where sound_message_user='".$current_user_name."'";
  $execute_u_m_q = mysqli_query($this->con,$update_messages_q);
  $edit_query  = "update tablefor_users set thisisuser_name='".$user_name. "' , thisis_name='" .$name. "' , 	thisisuser_country='".$country."' where id=" . $id["id"];
  $update = mysqli_query($this->con, $edit_query);
  if ($update == false) {
    echo $failed_register;
  }else {
    $_SESSION["this_is_session_for_user"] = $user_name;
    echo $update_info_success_label;
  }
  }

}


}























 ?>
