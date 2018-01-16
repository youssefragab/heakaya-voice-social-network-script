<?php
include "../init/config.php";
//language
if (isset($_COOKIE["language"])) {
  include "../en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "../ar-strings.php";
}
session_start();
session_regenerate_id(true);
if (isset($_SESSION["this_is_session_for_user"])) {
session_destroy();
}else {
header("Location: ../index.php");
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
 <title><?php echo $change_pic_title; ?></title>
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

 .error-report {
   color: #ed2553;
       font-size: 10pt;
       background-color: white;
       margin-bottom: 35px;
       padding: 10px;
       text-align: center;
       display:none;
       margin-top: 15px;
       width: 95%;
       <?php if (!isset($_COOKIE["language"])) {echo "padding-bottom: 15px;";} ?>
 }
 .error-icon {
   position: relative;
     top: 5px;
     left: 30px;
 }

 </style>
 <link href="../css/<?php echo $media; ?>" rel="stylesheet">
 <style>
 .back {
   float:left;color:white;position:absolute;top:15px;left:15px;
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
 .header-right img {
   margin-top: 2px;
 }
 .error-icon {
   display: none;
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
 <script src="../js/html5shiv.min.js"></script>
 <script src="../js/respond.min.js"></script>
  </head>
 <body>
<!--  Start Work Area  -->
<div id="#header" style="padding: 10px 10px 0px 10px">


    <?php
echo '
<div class="header-right" style="padding-bottom:0px;padding-top:5px;">
<a href="../index.php"><img src="../images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>
<h2 class="label">'.$website_name.'</h2>
</div>

<div class="header-left" style="padding:0;padding-bottom:15px">

<nav>
    <div class="nav-wrapper">

      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="margin-left:10px;line-height:72px;">menu</i></a>
      <ul class="side-nav" id="mobile-demo">
        <div class="side-header">
           <center>
             <img src="../images/vector.png" />
             <h4>'.$user_login_label.'</h4>
           </center>
        </div>
        <li><a href="../login.php">'.$login_label.'</a> <i class="fa fa-sign-in list-side" style="font-size:14pt;float:right;"></i></li>
        <li><a  class="sp-2" href="../register.php" style="padding-right:11px;">'.$register_label.'</a> <i class="fa fa-user-plus list-side" style="font-size:14pt;float:right;right:1.5px"></i></li>
        <li><a class="sp-2" href="../help">'.$help_label.'</a> <i class="fa fa-life-ring list-side" style="font-size:14pt;float:right;right:3px"></i></li>
         <li><a class="sp-2" href="../contactus">'.$contact_label.'</a> <i class="fa fa-phone list-side" style="font-size:14pt;float:right;"></i></li>
        <li><a href="../policy">'.$privacy_label.'</a> <i class="fa fa-shield list-side" style="font-size:14pt;float:right;"></i></li>
      </ul>
    </div>
  </nav>


';

     ?>



</div>


 <div class="main-content">
<center>
<div class="logout-container z-depth-4">
 <?php echo $acc_deleted_success; ?><img src="../images/smile-icon.png" />
</div>



</center>
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
