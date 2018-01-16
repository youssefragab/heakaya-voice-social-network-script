<?php
//language
if (isset($_COOKIE["language"])) {
  include "en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "ar-strings.php";
}
include "init/config.php";
if (isset($_GET["user"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {
$user_name = mysqli_real_escape_string($db,$_GET["user"]);
if (strlen($user_name) > 25 || strlen($user_name) < 5) {
header("Location: ../../404.php");
die();
} else if (preg_match('/[^A-Za-z0-9-.-_]/', $user_name))
{
header("Location: ../../404.php");
die();
} else {

  $audio_  = mysqli_real_escape_string($db,$_GET["audio"]);
  $audio = htmlspecialchars($audio_);
  $check_audio = "select * from this_is_users_audio_sounds where sound_message_code='" . $audio . "' and sound_message_user='" .$user_name. "' and sound_message_statue='active'";
  $execute_check_audio = mysqli_query($db,$check_audio);
  $audio_num = mysqli_fetch_array($execute_check_audio,MYSQLI_ASSOC);
 if ($audio_num["done_view"] == "true") {
   header("Location: ../../404.php");
 }else {
   $i_c = "update this_is_users_audio_sounds set done_view='true' where sound_message_code='" . $audio . "' and sound_message_user='" .$user_name. "' and sound_message_statue='active'";
   $e_i_c = mysqli_query($db,$i_c);
 }
}





$query_extract_usernames = "select * from tablefor_users where thisisuser_name='" . $user_name. "'";
$extract_username_from_database = mysqli_query($db, $query_extract_usernames);
$count_user_names = mysqli_num_rows($extract_username_from_database);
if ($count_user_names === 0 ) {
 header("Location: ../../404.php");
 die();
} else {
  $messages_query = "select * from this_is_users_audio_sounds where sound_message_user='" .$user_name. "' and sound_message_statue='active'";
  $execute_me_query = mysqli_query($db,$messages_query);
  $messages_num = mysqli_num_rows($execute_me_query);
 $user = mysqli_fetch_array($extract_username_from_database,MYSQLI_ASSOC);
 $privacy = $user["privacy"];
 if ($privacy == "private") {
 $shadow = 1;
 }
 if ($user["thisisuser_gender"] == "ذكر") {
   $gender = $gender_lan;
   $gender1 = $m_got;
   $gender2 = $m_sent;
   $gender_icon = "male.png";
 }else if ($user["thisisuser_gender"] == "انثي") {
   $gender = $gender_female;
   $gender1 = $m_got;
   $gender2 = $m_sent;
   $gender_icon = "female.png";
 }
}
} else {
  header("Location: 404.php");
}
// add view
$get_views_query = "select * from website_settings";
$execute_views_query = mysqli_query($db,$get_views_query);
$fetch_views_results = mysqli_fetch_assoc($execute_views_query);
$current_views = $fetch_views_results["website_views"];
//add new view
$new_view = $current_views + 1;
$update_views_query = "update website_settings set website_views='" . $new_view . "'";
$execute_update_v = mysqli_query($db,$update_views_query);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
 <head>
<meta charset="utf-8">
<meta name="description" content="احصل علي رسائل صوتية مجهولة الهوية من اصدقائك وعائلتك وايضا من اشخاص لا تعرفهم وقم بمشاركة الرسائل علي وسائل التواصل الاجتماعي">
<meta name="keywords" content="Sarahah,ask.fm,sayat.me,ask,sayat,voice Messages,Sound Message, sarahah.com,facebook,twitter,instagram,snapchat,news,صراحة,موقع صراحة ,اسك ,سايت,فيس بوك ,تويتر,انستاجرام,اخبار,سناب شات, موقع رسائل صوتية,رسائل صوتية مجهولة, حكاية">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#5b81ec" >
<title><?php if(isset($_COOKIE["language"])) {echo $user_title;} ?> <?php echo $user["thisis_name"]; ?> <?php if(!isset($_COOKIE["language"])) {echo $user_title;} ?></title>
<link href="../../images/icon.png" rel="icon" >
<link rel="stylesheet" href="../../css/font-awesome.min.css" />
<link rel="stylesheet" href="../../css/materialize.min.css" />
<?php echo $style_file_3; ?>
<style>
.profile-header {
  left:0%;
}
.language-panel {
  top: 49px;
  left: 40px;
  z-index: 9999999999999
}
@media screen and (max-width: 345px) {
.header-right ul li {
    font-size: 8pt;
}
}
select option {
  color: black;
}
select {
  color: #777777;
  margin-bottom: 15px;
}
.user-header {
  display: none;
}
#footer {
  min-height:65px;padding-top:25px
}
.side-nav i {
  float: right;
    font-size: 14pt;
    position: relative;
    top: 17px;
    right: 5px;
}
.side-nav li {
  padding-right: 7px
}
.success-alert {
  width: 90%;
   min-height: 60px;
   padding: 10px;
 background-color: #ed2553;
 border-radius: 5px;
padding-top:17px;
}
@media screen and (min-width:800px) {
  .success-alert {
    width: 30%;
  }
}
</style>
<link href="../../css/<?php echo $media; ?>" rel="stylesheet">
<script src="../../js/html5shiv.min.js"></script>
<script src="../../js/respond.min.js"></script>
 </head>
<body>

<!--  Start Work Area  -->
<div id="#header">

  <?php

  if (isset($_SESSION["this_is_session_for_user"])) {
    // session user
    $user_session = $_SESSION["this_is_session_for_user"];
    $query_extract_usernames_2 = "select * from tablefor_users where thisisuser_name='" . $user_session . "'";
    $extract_username_from_database_2 = mysqli_query($db, $query_extract_usernames_2);
     $user_2 = mysqli_fetch_array($extract_username_from_database_2,MYSQLI_ASSOC);
    echo '
    <div class="header-right" style="padding-bottom:0px;padding-top:5px;">
    <a href="../../index.php"><img src="../../images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>
  <h2 class="label">'.$website_name.'</h2>
    </div>

    <div class="header-left" style="padding:0;padding-bottom:15px">

      <nav>
          <div class="nav-wrapper">

            <a href="#" data-activates="mobile-demo" class="button-collapse"><i style="margin-left:10px;line-height:72px;" class="material-icons">menu</i></a>
            <ul class="side-nav" id="mobile-demo">
              <div class="side-header">
                 <center>
                   <img src="../../profile_pictures_for_users/'.$user["thisisuser_picture"].'" />
                   <h4 style="font-family:Cairo;font-size:9pt;">'.$user["thisis_name"].'</h4>
                 </center>
              </div>
              <li><a class="sp-2" href="../../index.php">'.$home.'</a> <i style="font-size:14pt;" class="fa fa-home list-side"></i></li>
              <li><a  class="sp-2" href="../../home" style="padding-right:13px;margin-top:2px">'.$my_messages.'</a> <i style="font-size:14pt;right:4px" class="fa fa-envelope list-side"></i></li>
              <li><a  class="sp-2" href="../../settings">'.$account_settings_label.'</a> <i style="font-size:14pt;" class="fa fa-gear list-side"></i></li>
              <li><a class="sp-2" href="../../help">'.$help.'</a> <i class="fa fa-life-ring list-side" style="font-size:14pt;float:right;right:3px"></i></li>
              <li><a  class="sp-2" href="../../policy">'.$privacy_label.'</a> <i class="fa fa-shield list-side" style="font-size:14pt;float:right;"></i></li>

              <li><a class="sp-2" href="../../logout">'.$log_out_label.'</a> <i style="font-size:14pt;" class="fa fa-sign-in list-side"></i></li>
            </ul>
          </div>
        </nav>

    </div>
    ';
  }else if (!isset($_SESSION["this_is_session_for_user"])) {
    echo '

    <div class="header-right" style="padding-bottom:0px;padding-top:5px;">
  <a href="../../index.php"><img src="../../images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>
  <h2 class="label">'.$website_name.'</h2>
  </div>

  <div class="header-left" style="padding:0;padding-bottom:15px">

    <nav>
        <div class="nav-wrapper">

          <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="margin-left:10px;line-height:72px;">menu</i></a>
          <ul class="side-nav" id="mobile-demo">
            <div class="side-header">
               <center>
                 <img src="../../images/vector.png" />
                 <h4>'.$user_login_label.'</h4>
               </center>
            </div>
            <li><a href="../../login.php">'.$login_label.'</a> <i class="fa fa-sign-in list-side" style="font-size:14pt;float:right;"></i></li>
            <li><a  class="sp-2" href="../../register.php" style="padding-right:11px;">'.$register_label.'</a> <i class="fa fa-user-plus list-side" style="font-size:14pt;float:right;right:1.5px"></i></li>
            <li><a class="sp-2" href="../../help">'.$help_label.'</a> <i class="fa fa-life-ring list-side" style="font-size:14pt;float:right;right:3px"></i></li>
             <li><a class="sp-2" href="../../contactus">'.$contact_label.'</a> <i class="fa fa-phone list-side" style="font-size:14pt;float:right;"></i></li>
            <li><a href="../../policy">'.$privacy_label.'</a> <i class="fa fa-shield list-side" style="font-size:14pt;float:right;"></i></li>
          </ul>
        </div>
      </nav>
    ';
  }


   ?>


</div>

<div class="container-home" style="padding:0px">

<div class="profile-header" style="border-top:1px solid white;">
<center>
<div class="user-info">
<img src="../../profile_pictures_for_users/<?php echo $user["thisisuser_picture"]; ?>" class="user-pic" />
<h5 tyle="font-family:Cairo"><?php echo $user["thisis_name"]; ?></h5>
<div class="more-info">
<input type="hidden" id="user" value="<?php echo $user_name; ?>" />
<center>
<span style="float:right;margin-left:25px;font-family:Cairo"><?php echo $user["thisisuser_country"];?><img  style="margin-left:3px;" src="../../images/location-tag.png"/></span>
<span style="float:right;margin-left:0px;top:1px;position:relative;min-height:25px;"><?php echo $gender; ?><img  style="top: 5px;width: 18px;left: 4px;" src="../../images/<?php echo $gender_icon; ?>"/></span>
<center>
</div>
</div>
</center>

</div>
<?php
if ($privacy == "public") {



 echo '

 <div class="user-header no-hover z-depth-2" style="display:block;margin-bottom:20px;">

 <ul>



 <li class="border-left my-messages"><h4><span>'.$gender1.'</span> <span>'.$messages_num.' </span> '.$me_label.'</h4></li>
 <li class="profile"><h4>'.$gender2.'</span> <span>'.$user["sent_confess"].'  </span> <span> '.$me_label.'</span> </h4></li>

 </ul>





 </div>



 ';

}else {

 echo '

 <div class="user-header no-hover z-depth-4" style="display:block;margin-bottom:20px;">

 <ul>



 <li class="border-left my-messages" style="width:100%;border-left:0"><h4>'.$private_user.'</h4></li>

 </ul>





 </div>



 ';

}



 ?>


<div class="recorder-container" style="padding-bottom:25px;padding-top:20px;min-height:auto">

  <center>


  <div class="success-alert">
    <?php
    if (isset($_COOKIE["language"])) {
      echo '
      <img  style="  display: inline;position: relative;
        top: 5px;
        right: 8px;
        width: 20px;
        height: 20px;" src="../../images/true.png" />

      ';
    }
           ?>
  <h5 style="display: inline;
      margin-right: 8px;
      margin: 0;
      color: white;
      font-size: 12pt;"><?php echo $send_success; ?></h5>
      <?php
if (!isset($_COOKIE["language"])) {
  echo '
  <img  style="  display: inline;position: relative;
    top: 5px;
    left: 10px;
    width: 20px;
    height: 20px;" src="../../images/true.png" />

  ';
}
       ?>

  </div>


  </center>

</div>




</div>




<!--  End Work Area  -->
<script src="../../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../../js/materialize.min.js"></script>
<script type="text/javascript" src="../../js/<?php echo $js; ?>"></script>
<script>
$(function () {
$(".button-collapse").sideNav();
if ($(document).width() <= 361) {
  $(".true-icon").css("float","left");
  $(".true-icon").css("top","-12px");
  $(".true-icon").css("right","-6px");
}
});
</script>
  </body>
</html>
