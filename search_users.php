<?php
include "init/config.php";
//language
if (isset($_COOKIE["language"])) {
  include "en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "ar-strings.php";
}
if (isset($_POST["username"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {

$user_name_ = htmlspecialchars($_POST["username"]);
$user_name = mysqli_real_escape_string($db,$user_name_);

$search_query = "select * from tablefor_users where thisisuser_name like '%$user_name%' and account_statue='active' limit 4";
$execute_query = mysqli_query($db,$search_query);

if (mysqli_num_rows($execute_query) !== 0 && strlen($user_name) <= 25) {
  while ($user = mysqli_fetch_array($execute_query,MYSQLI_ASSOC)) {
    echo '
    <a href="s/'.$user["thisisuser_name"].'"><div class="results-container waves-effect waves-light" data="'.$user["thisisuser_name"].'">
    <img src="profile_pictures_for_users/'.$user["thisisuser_picture"].'" />
    <div class="username-conatiner">
    <h5 class="counter">'.$user["thisis_name"].'</h5>

    </div>

    </div><span class="user-label">@'.$user["thisisuser_name"].'</span></a>


    ';
  }

}else {
  echo "<center><h6 style='color:#999999;font-size:14pt;'>".$no_res."</h6></center>";
}



}else {
  header("Location: 404.php");
}




 ?>
