<?php
session_start();
session_regenerate_id(true);
if(!isset($_SESSION["this_is_session_for_user"])) {
header("Location: ../");
}else {
  require "../init/config.php";
  $user_name = $_SESSION["this_is_session_for_user"];
  $query = "select * from tablefor_users where thisisuser_name='" . $user_name . "'";
  $execute_query = mysqli_query($db,$query) or die("error");
  $user = mysqli_fetch_array($execute_query,MYSQLI_ASSOC);

  // extract messages
  $messages_query = "select * from this_is_users_audio_sounds where sound_message_user='" .$user_name. "' and sound_message_statue='active' order by id desc";
  $execute_me_query = mysqli_query($db,$messages_query);
}

//language
if (isset($_COOKIE["language"])) {
  include "../en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "../ar-strings.php";
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
<title><?php echo $settings_home_title; ?></title>
<link href="../css/animate.css" rel="stylesheet">
<link href="../images/icon.png" rel="icon" >
<link rel="stylesheet" href="../css/font-awesome.min.css" />
<link rel="stylesheet" href="../css/materialize.min.css" />
<?php echo $style_file_2; ?>
<style>
.language-panel {
  top: 49px;
  left: 40px;
}
body {
  overflow-x: hidden;
}
.user-header ul li:hover {
  background-color: transparent;
  background-image: none;
  cursor: default;
}
#bars {
  position: relative;
  top:-150px;
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
</style>
<link href="../css/<?php echo $media; ?>" rel="stylesheet">
<style>
.back {
  float:left;color:white;position:absolute;top:15px;left:15px;
}
</style>
<script src="../js/html5shiv.min.js"></script>
<script src="../js/respond.min.js"></script>
 </head>
<body>
  <span class="over-layer"></span>

  <div class="confirm-delete" style="min-height:100px">

<?php echo $confirm_del_1; ?>
<br/>
<form action="deleteaccount.php" method="post" id="form">
<a class="return"><h3><?php echo $return; ?></h3></a>
<a class="delete-my-account"><h3><?php echo $delete_2; ?></h3></a>
<input type="hidden" name="delete" />
</form>
  </div>

<!--  Start Work Area  -->
<?php
if (isset($_SESSION["this_is_session_for_user"])) {
  // session user
  $user_session = $_SESSION["this_is_session_for_user"];
  $query_extract_usernames_2 = "select * from tablefor_users where thisisuser_name='" . $user_session . "'";
  $extract_username_from_database_2 = mysqli_query($db, $query_extract_usernames_2);
   $user_2 = mysqli_fetch_array($extract_username_from_database_2,MYSQLI_ASSOC);
  echo '
  <div class="header-right" style="padding-bottom:0px;padding-top:5px;">
  <a href="../index.php"><img src="../images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>
<h2 class="label">'.$website_name.'</h2>
  </div>

  <div class="header-left" style="padding:0;padding-bottom:15px">

    <nav>
        <div class="nav-wrapper">

          <a href="#" data-activates="mobile-demo" class="button-collapse"><i style="margin-left:10px;line-height:72px;" class="material-icons">menu</i></a>
          <ul class="side-nav" id="mobile-demo">
            <div class="side-header">
               <center>
                 <img src="../profile_pictures_for_users/'.$user["thisisuser_picture"].'" />
                 <h4 style="font-family:Cairo;font-size:9pt;">'.$user["thisis_name"].'</h4>
               </center>
            </div>
            <li><a class="sp-2" href="../index.php">'.$home.'</a> <i style="font-size:14pt;" class="fa fa-home list-side"></i></li>
            <li><a  class="sp-2" href="../home" style="padding-right:13px;margin-top:2px">'.$my_messages.'</a> <i style="font-size:14pt;right:4px" class="fa fa-envelope list-side"></i></li>
            <li><a  class="sp-2" href="../settings">'.$account_settings_label.'</a> <i style="font-size:14pt;" class="fa fa-gear list-side"></i></li>
            <li><a class="sp-2" href="../help">'.$help.'</a> <i class="fa fa-life-ring list-side" style="font-size:14pt;float:right;right:3px"></i></li>
            <li><a  class="sp-2" href="../policy">'.$privacy_label.'</a> <i class="fa fa-shield list-side" style="font-size:14pt;float:right;"></i></li>

            <li><a class="sp-2" href="../logout">'.$log_out_label.'</a> <i style="font-size:14pt;" class="fa fa-sign-in list-side"></i></li>
          </ul>
        </div>
      </nav>

  </div>


  ';
}

 ?>

<div class="user-header message-header">
<ul>

<li class="border-left my-messages" style="position:relative;width:100%;border-left:0"><h4><a class="back" href="../home" ><?php echo $back; ?></a><?php echo $account_settings_label; ?></h4></li>

</ul>


</div>

<div class="container-home">

<div class="settings-menu">

<div class="setting-option">
  <a href="editaccount">  <img src="../images/left-arrow.png" /> <?php echo $edit_account_settings_label; ?> </a>

</div>

<div class="setting-option">
  <a href="changepassword">  <img src="../images/left-arrow.png" /><?php echo $change_pass_label; ?></a>

</div>

<div class="setting-option">
  <a href="updatepicture">  <img src="../images/left-arrow.png" /><?php echo $change_pic_label; ?></a>

</div>

<div class="setting-option">
  <a href="privacy">  <img src="../images/left-arrow.png" /> <?php echo $privacy_settings_label; ?></a>

</div>

<div class="setting-option">
  <a style="cursor:pointer" class="delete-account"><img src="../images/delete-icon.png" style="position:relative;top:5px;"/><?php echo $delte_acc_label ;?></a>

</div>
</div>


</div>







<!--  End Work Area  -->
<script src="../js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script type="text/javascript" src="../js/<?php echo $js; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){

     $(".button-collapse").sideNav();
});
</script>
  </body>
</html>
