

<?php





require "init/config.php";

$user_name = $_SESSION["this_is_session_for_user"];

$query = "select * from tablefor_users where thisisuser_name='" . $user_name . "'";

$execute_query = mysqli_query($db,$query) or die("not connected");

$user = mysqli_fetch_array($execute_query,MYSQLI_ASSOC);



//language

if (isset($_COOKIE["language"])) {

  include "en-strings.php";

}else if (!isset($_COOKIE["language"])) {

  include "ar-strings.php";

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

<meta name="keywords" content="Sarahah,ask.fm,sayat.me,ask,sayat,voice Messages,Sound Message, sarahah.com,Footbal,facebook,twitter,instagram,snapchat,news,صراحة,موقع صراحة ,اسك ,سايت,فيس بوك ,تويتر,انستاجرام,اخبار,سناب شات, موقع رسائل صوتية,رسائل صوتية مجهولة, حكاية,اخبار كرة القدم,مصر,السعودية,قطر,يوتيوب,افلام,مسلسلات,مسلسلات رمضان 2017, كلبش,خلصانة بشياكة">

<meta name="author" content="John Doe">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="theme-color" content="#5b81ec" >

<title><?php echo $title; ?></title>

<link href="css/animate.css" rel="stylesheet">

<link href="images/icon.png" rel="icon" >
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="css/font-awesome.min.css" />

<link rel="stylesheet" href="css/materliaze-rtl.css" />

<?php

echo $style_file;

 ?>

<link href="css/<?php echo $media; ?>" rel="stylesheet">

<script src="js/html5shiv.min.js"></script>

<script src="js/respond.min.js"></script>

<style>

.side-nav i {

    font-size: 14pt;

    position: relative;

    top: 17px;

    right: 5px;

}

.side-nav li {

  padding-right: 7px

}

.sentence1 {

  font-size:13pt;line-height:35px;height:70px;

}

@media screen and (max-width:339px) {

  .sentence1 {

    font-size: 12pt;

  }

}

@media screen and (max-width:316px) {

  .sentence1 {

    font-size: 11pt;

  }

}

@media screen and (max-width:293px) {

  .sentence1 {

    font-size: 8pt;

  }

}

@media screen and (min-width:800px) {

.sentence1 {

  font-size: 17pt;

}

}

.lan {

  left: 100px;

  top: 20px;

}



</style>

 </head>

<body>

<!--  Start Work Area  -->

<span class="l-state" visible="no" />

<div class="fixed-action-btn">

   <a class="btn-floating btn-large language-click">

    <?php echo $language_icon; ?>

   </a>

 </div>

 <div class="language-icon waves-effect waves-light">

 <a href="language.php"><div class="language" style="<?php if ( isset($_COOKIE["language"]) ) {echo "font-family: 'Cairo', sans-serif;";} else {echo "font-family: 'Open Sans', sans-serif;";} ?>"><?php echo $language; ?></div></a>

 </div>

 <div id="#header" style="padding: 10px 10px 0px 10px">



 <?php



 if (isset($_SESSION["this_is_session_for_user"])) {

   echo '

   <div class="header-right" style="padding-bottom:0px;padding-top:5px;">

   <a href="index.php"><img src="images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>

<h2 class="label">'.$website_name.'</h2>

   </div>



   <div class="header-left" style="padding:0;padding-bottom:15px">

  <a href="language.php"><h4 style="font-family:cairo" class="lan">'.$language.'</h4></a>

     <nav>

         <div class="nav-wrapper">



           <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" style="font-size: 16pt;
    margin-top: 5px;"></i></a>

           <ul class="side-nav" id="mobile-demo">

             <div class="side-header">

                <center>

                  <img src="profile_pictures_for_users/'.$user["thisisuser_picture"].'" />

                  <h4 style="font-family:Cairo;font-size:9pt">'.$user["thisis_name"].'</h4>

                </center>

             </div>

             <li><a class="sp-2" href="index.php">'.$home.'</a> <i style="font-size:14pt;" class="fa fa-home"></i></li>

             <li><a  class="sp-2" href="home" style="padding-right:13px;margin-top:2px">'.$my_messages.'</a> <i style="font-size:14pt;right:4px" class="fa fa-envelope"></i></li>

             <li><a  class="sp-2" href="settings">'.$account_settings_label.'</a> <i style="font-size:14pt;" class="fa fa-gear"></i></li>

             <li><a class="sp-2" href="help">'.$help.'</a> <i class="fa fa-life-ring list-side" style="font-size:14pt;float:right;right:3px"></i></li>

             <li><a  class="sp-2" href="policy">'.$privacy_label.'</a> <i class="fa fa-shield list-side" style="font-size:14pt;float:right;"></i></li>

             <li><a  class="sp-2" href="contactus">'.$contact_label.'</a> <i class="fa fa-phone list-side" style="font-size:14pt;float:right;"></i></li>

             <li><a class="sp-2" href="logout">'.$log_out_label.'</a> <i style="font-size:14pt;" class="fa fa-sign-in"></i></li>

           </ul>

         </div>

       </nav>



   </div>



   ';

 }else if (!isset($_SESSION["this_is_session_for_user"])) {

   echo '



     <div class="header-right" style="padding-bottom:0px;padding-top:5px;">

   <a href="index.php"><img src="images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>

<h2 class="label">'.$website_name.'</h2>

   </div>



 <div class="header-left" style="padding:0;padding-bottom:15px">

<a href="language.php"><h4 class="lan" style="font-family:Cairo">'.$language.'</h4></a>

     <nav>

         <div class="nav-wrapper">



           <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars" style="font-size: 16pt;
    margin-top: 5px;"></i></a>

           <ul class="side-nav" id="mobile-demo">

             <div class="side-header">

                <center>

                  <img src="images/vector.png" />

                  <h4>'.$user_login_label.'</h4>

                </center>

             </div>

             <li><a href="login.php">'.$login_label.'</a> <i class="fa fa-sign-in list-side" style="font-size:14pt;float:right;"></i></li>

             <li><a  class="sp-2" href="register.php" style="padding-right:11px;">'.$register_label.'</a> <i class="fa fa-user-plus list-side" style="font-size:14pt;float:right;right:1.5px"></i></li>

             <li><a class="sp-2" href="help">'.$help_label.'</a> <i class="fa fa-life-ring list-side" style="font-size:14pt;float:right;right:3px"></i></li>

              <li><a class="sp-2" href="contactus">'.$contact_label.'</a> <i class="fa fa-phone list-side" style="font-size:14pt;float:right;"></i></li>

             <li><a href="policy">'.$privacy_label.'</a> <i class="fa fa-shield list-side" style="font-size:14pt;float:right;"></i></li>
             <li><a href="https://play.google.com/store/apps/details?id=com.baviux.voicechanger&hl=ar" target="_blank">'.$voice_changer.'</a> <i class="fa fa-microphone list-side" style="font-size:14pt;float:right;"></i></li>


           </ul>

         </div>

       </nav>

   ';

 }





  ?>





 </div>

