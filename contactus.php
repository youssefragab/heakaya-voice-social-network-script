<?php

session_start();

session_regenerate_id(true);

require "init/config.php";

$user_name = $_SESSION["this_is_session_for_user"];

$query = "select * from tablefor_users where thisisuser_name='" . $user_name . "'";

$execute_query = mysqli_query($db,$query) or die("error");

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

<meta name="keywords" content="Sarahah,ask.fm,sayat.me,ask,sayat,voice Messages,Sound Message, sarahah.com,facebook,twitter,instagram,snapchat,news,صراحة,موقع صراحة ,اسك ,سايت,فيس بوك ,تويتر,انستاجرام,اخبار,سناب شات, موقع رسائل صوتية,رسائل صوتية مجهولة, حكاية">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="theme-color" content="#5b81ec" >

<title><?php echo $contact_us_title; ?></title>

<link href="images/icon.png" rel="icon" >

<link rel="stylesheet" href="css/font-awesome.min.css" />

<link rel="stylesheet" href="css/materialize.min.css" />

<?php echo $style_file; ?>

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

<link href="css/<?php echo $media; ?>" rel="stylesheet">

<style>

.back {

  float:left;color:white;position:absolute;top:15px;left:15px;

}

.socila-contact {

  width: 100%;

  background-image: url('images/shadow-layer.png');

}

.socila-contact ul {

  width: 100%;



    height: auto;

    overflow: auto;

}

.socila-contact ul li {

  width: 50%;

  text-align: center;

  float: right;

      border: 1px solid white;

}

.socila-contact ul li i {

  margin-right: 5px;

}

.socila-contact ul a {

  color: white;

}

</style>

<script src="js/html5shiv.min.js"></script>

<script src="js/respond.min.js"></script>

 </head>

<body>

<!--  Start Work Area  -->

<div id="#header" style="padding: 10px 10px 0px 10px">

<?php

  if (isset($_SESSION["this_is_session_for_user"])) {

    echo '

    <div class="header-right" style="padding-bottom:0px;padding-top:5px;">

    <a href="index.php"><img src="images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>

  <h2 class="label">'.$website_name.'</h2>

    </div>



    <div class="header-left" style="padding:0;padding-bottom:15px">



      <nav>

          <div class="nav-wrapper">



            <a href="#" data-activates="mobile-demo" class="button-collapse"><i style="margin-left:10px;line-height:72px;" class="material-icons">menu</i></a>

            <ul class="side-nav" id="mobile-demo">

              <div class="side-header">

                 <center>

                   <img src="profile_pictures_for_users/'.$user["thisisuser_picture"].'" />

                   <h4>'.$user["thisis_name"].'</h4>

                 </center>

              </div>

              <li><a href="index.php">الصفحة الرئيسية</a> <i style="font-size:14pt;" class="fa fa-home"></i></li>

              <li><a href="home" style="padding-right:13px;margin-top:2px">الرسائل المستلمة</a> <i style="font-size:14pt;right:4px" class="fa fa-envelope"></i></li>

              <li><a href="settings">اعدادات الحساب</a> <i style="font-size:14pt;" class="fa fa-gear"></i></li>

              <li><a href="help">مساعدة</a> <i class="fa fa-life-ring" style="font-size:14pt;float:right;right:3px"></i></li>

              <li><a href="policy">الخصوصية</a> <i class="fa fa-shield" style="font-size:14pt;float:right;"></i></li>

              <li><a href="contactus">اتصل بنا</a> <i class="fa fa-phone" style="font-size:14pt;float:right;"></i></li>

              <li><a href="logout">تسجيل الخروج</a> <i style="font-size:14pt;" class="fa fa-sign-in"></i></li>

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



      <nav>

          <div class="nav-wrapper">



            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="margin-left:10px;line-height:72px;">menu</i></a>

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

            </ul>

          </div>

        </nav>

    ';

  }





   ?>





</div>

</div>

<div class="user-header message-header">

<ul>



<li class="border-left my-messages" style="position:relative;width:100%;border-left:0"><h4><?php echo $contact_label; ?></h4></li>



</ul>





</div>



<div class="container-home">



<div class="policy-container" style="padding:auto">

  <?php

  if (isset($_GET["proccess"])) {

 if ($_GET["proccess"] == "success") {

   echo "<span style='display:block;text-align:center;width:100%;color:#5cff53;font-weight:bold'>".$success_contact ."</span>";

 }else if ($_GET["proccess"] == "error") {

   echo "<span style='display:block;text-align:center;width:100%;font-weight:bold'>".$missing_data_login."</span>";

 }

 }

   ?>

  <?php echo $send_anonymous_developer; ?>

  </br>

   <div class="socila-contact">

     <ul>

 <a href="http://heakaya.com/u/youssefmousa" target="_blank"><li style="border-left:1px solid white;width:100%"><i class="fa fa-microphone"></i>Heakaya</li></a>

 </ul>

   </div>

  <?php echo $social_net_developer; ?>

 </br>

  <div class="socila-contact">

    <ul>

<a href="http://twitter.com/youssefmousa73" target="_blank"><li style="border-left:1px solid white;"><i class="fa fa-twitter-square"></i>Twitter</li></a>

<a href="https://www.facebook.com/youssef.mousa2001" target="_blank"><li><i class="fa fa-facebook-official"></i>Facebook</li></a>

</ul>

  </div>

<div class="contact-header">

<?php echo $email_developer; ?>

</br>

<div class="socila-contact">

  <ul>

<li style="width:100%"><i class="fa fa-envelope"></i>youssefmousa2001@gmail.com</li>

</ul>

</div>

 <span style="display:block;margin-top:10px"><?php echo $contact_form; ?></span>

</div>

<div class="contact-us-form">

<form method="post" action="contact_us_proccess.php">

<input type="text" placeholder="<?php echo $name_register; ?>" name="sender_name"/>

<input type="text" placeholder="<?php echo $email; ?>"  name="sender_email"/>

<input type="text" placeholder="<?php echo $subject; ?>" name="message_subject"/>

<center style="padding:0;overflow:visible">

<textarea placeholder="<?php echo $your_message; ?>" name="message_text"></textarea>

</center>



</div>

<button><?php echo $send; ?></button>

</div>

<form>



</div>







<!--  End Work Area  -->

<script src="js/jquery-3.1.0.min.js"></script>

<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript" src="js/<?php echo $js; ?>"></script>

<script type="text/javascript">

$(document).ready(function(){



     $(".button-collapse").sideNav();





});

</script>

  </body>

</html>

