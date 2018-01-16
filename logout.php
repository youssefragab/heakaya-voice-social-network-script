<?php
//language
if (isset($_COOKIE["language"])) {
  include "en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "ar-strings.php";
}
session_start();
session_regenerate_id(true);
if (isset($_SESSION["this_is_session_for_user"])) {
session_destroy();
}else {
  header("Location: index.php");
}

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
 <title><?php echo $title; ?></title>
 <link href="css/animate.css" rel="stylesheet">
 <link href="images/icon.png" rel="icon" >
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
 <?php


if (isset($_COOKIE["language"])) {
echo "
.logout-container img {
  display:none;
}

";
}
  ?>

 </style>
  </head>
 <body>
<!--  Start Work Area  -->
<div id="#header" style="padding: 10px 10px 0px 10px">



    <?php
    echo '

      <div class="header-right" style="padding-bottom:0px;padding-top:5px;">
    <a href="index.php"><img src="images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>
    <h2 class="label">'.$website_name.'</h2>
    </div>

    <div class="header-left" style="padding:0;padding-bottom:15px">
    <a href="language.php"><h4 class="lan" style="font-family:Cairo">'.$language.'</h4></a>
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


     ?>



</div>

 <div class="main-content">
<center>
<div class="logout-container z-depth-1">
 <?php echo $log_out; ?> <img src="images/smile-icon.png" />
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
