<?php

//language

if (isset($_COOKIE["language"])) {

  include "../en-strings.php";

}else if (!isset($_COOKIE["language"])) {

  include "../ar-strings.php";

}

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

  $messages_num = mysqli_num_rows($execute_me_query);



  if ($user["thisisuser_gender"] == "ذكر") {

    $gender = $gender_lan;

    $gender1 = "حصل علي";

    $gender2 = "ارسل";

    $gender_icon = "male.png";

  }else if ($user["thisisuser_gender"] == "انثي") {

    $gender = $gender_female;

    $gender1 = "حصلت علي";

    $gender2 = "ارسلت";

    $gender_icon = "female.png";

  }

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

<meta name="theme-color" content="#5b81ec" >

<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $heakaya_home; ?></title>

<link href="../css/animate.css" rel="stylesheet">

<link href="../images/icon.png" rel="icon">

<link rel="stylesheet" href="../css/font-awesome.min.css" />

<link rel="stylesheet" href="../css/materialize.min.css" />

<?php echo $style_file_2; ?>

<style>



body {

  overflow-x: hidden;

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



@media screen and (min-width:800px) {

  .header-right {

    padding-right: 30px;

  }



}

.lan {

  left: 83px;

  top: 11px

}

</style>

<script src="../js/html5shiv.min.js"></script>

<script src="../js/respond.min.js"></script>

 </head>

<body>

  <div class="share-generate z-depth-4"><h5><?php echo $loading_generate; ?></h5></div>

  <div class="share-r z-depth-4"><h5><?php echo $success_generate; ?></h5></br><span></span></div>

  <span class="over-layer"></span>

<!--  Start Work Area  -->

<?php



  echo '

  <div class="header-right" style="padding-bottom:0px;padding-top:5px;">

  <a href="../index.php"><img src="../images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>

<h2 class="label">'.$website_name.'</h2>

  </div>



  <div class="header-left" style="padding:0;padding-bottom:15px">

 <a href="../language.php"><h4 class="lan" style="font-family:Cairo">'.$language.'</h4></a>

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





?>



<div class="user-header">

<ul>



<li class="border-left my-messages"><h4><?php if (!isset($_COOKIE["language"])) {echo"(".$messages_num.")";} ?> <?php echo $messages_home;  ?> <?php if (isset($_COOKIE["language"])) {echo"(".$messages_num.")";} ?></h4></li>

<li class="profile"><h4><?php echo $my_profile; ?></h4></li>

</ul>





</div>



<div class="container-home">



<div class="messages-container" style="position:relative;">





<?php

if ($messages_num !== 0) {

while ($message = mysqli_fetch_array($execute_me_query,MYSQLI_ASSOC)) {



echo '



<div class="message">

  <div class="delete-mobile">

<a href="deletemessage.php?mc='.$message["sound_message_code"].'"><img src="../images/delete-icon.png" style="width:15px;height:15px;" /></a>



  </div>

<div class="date">

<h2>'.$message["sound_message_date"].'</h2>

</div>

<div class="options">

<a ><div class="button-message open-message" data="'.$message["sound_message_code"].'"><span>'.$listen.'</span> <img src="../images/play.png" /></div></a>

<a ><div class="button-message share-message" data="'.$message["sound_message_code"].'"><span>'.$share.'</span> <img src="../images/share.png" /></div></a>

<a href="deletemessage.php?mc='.$message["sound_message_code"].'"><div class="button-message open-message delete"><span>'.$delete.'</span> <img src="../images/trash.png" /></div></a>

</div>





</div>





';



}

}else {

  echo "<center><div class='nomessage-alert'><h2>".$no_messages."</h2></div></center>" ;

}









 ?>











</div>

<div class="profile-header user-home" style="border-bottom:1px solid white">

<center>

  <div class="user-info">

  <img src="../profile_pictures_for_users/<?php echo $user["thisisuser_picture"]; ?>" class="user-pic" />

  <h5 style="font-family:Cairo"><?php echo $user["thisis_name"]; ?></h5>

  <div class="more-info">

    <center>

  <span style="position:relative;top:1px;float:right;margin-left:25px;font-family:Cairo;"><?php echo $user["thisisuser_country"];?><img  style="margin-left:3px;top:6px;" src="../images/location-tag.png"/></span>

  <span style="float:right;margin-left:0px;top:1px;position:relative;min-height:25px;"><?php echo $gender; ?><img  style="top: 5px;width: 18px;left: 4px;" src="../images/<?php echo $gender_icon; ?>"/></span>

  <center>

  </div>

  </div>

</center>



</div>

<div class="user-share-link" style="padding-top:25px;">

<center>

<div class="box-word share-word z-depth-4"><?php echo $share_username; ?></div>

<div class="box-word z-depth-4"><?php echo $user_name; ?></div>

<div class="box-word share-word z-depth-4"><?php echo $share_profile_link; ?></div>

<div class="box-word link-box z-depth-4">http://heakaya.com/u/<?php echo $user_name; ?></div>

</center>

</div>









</div>





<!--  End Work Area  -->

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript" src="../js/materialize.min.js"></script>

<script type="text/javascript" src="../js/<?php echo $js; ?>"></script>

<script type="text/javascript">

$(document).ready(function(){

$(".lan").css("top","11px");

     $(".button-collapse").sideNav();



});

</script>

  </body>

</html>

