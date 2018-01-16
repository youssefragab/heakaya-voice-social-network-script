<?php

//language

if (isset($_COOKIE["language"])) {

  include "en-strings.php";

}else if (!isset($_COOKIE["language"])) {

  include "ar-strings.php";

}

session_start();

session_regenerate_id(true);

  require "init/config.php";

  $user_name = $_SESSION["this_is_session_for_user"];

  $query = "select * from tablefor_users where thisisuser_name='" . $user_name . "'";

  $execute_query = mysqli_query($db,$query) or die("error");

  $user = mysqli_fetch_array($execute_query,MYSQLI_ASSOC);

  $share_code_ = htmlspecialchars($_GET["sc"]);

  $share_code = mysqli_real_escape_string($db,$share_code_);

  $check_auth_query = "select * from this_is_users_shares where sound_share_code='" .$share_code."'";

  $e_c_a = mysqli_query($db,$check_auth_query);

  $auth_statue = mysqli_num_rows($e_c_a);

  if ($auth_statue == 1) {

     $enc_mess_n = mysqli_fetch_array($e_c_a,MYSQLI_ASSOC);

     $m_code = $enc_mess_n["sound_message_code"];

     $m_name = $enc_mess_n["sound_message_name"];

     $m_user = $enc_mess_n["sound_message_user"];

     $views = $enc_mess_n["sound_message_views"];

     //

     $current_view_num = $enc_mess_n["sound_message_views"];

     $add_view = $current_view_num + 1;

     $add_v_query = "update this_is_users_shares set sound_message_views='".$add_view."' where sound_message_code='".$m_code."' and sound_message_user='".$m_user."'";

     $execute_v_query = mysqli_query($db,$add_v_query);

  }else {

    header("Location: ../404.php");

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

<title> <?php echo $share_title; ?> <?php echo $m_user; ?></title>

<link href="../images/icon.png" rel="icon" >

<?php



echo '<script class="con" src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

<script class="con" src="../js/jquery-3.1.0.min.js"></script>';



?>

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

.avatar-listen {

  display:none;

  cursor:pointer;

}

#bars {

  display: none;

}

#resume {

  display: none;

}

#header-right img {

  margin-top: 1px;

}

@media screen and (min-width:800px) {

  .header-right {

    padding-right: 30px;



  }



}

.play-message-container img {

  cursor: pointer;

}

</style>

<script class="html5shiv con" type="text/javascript">

var _$_7c01=["<?php echo $m_name; ?>","<?php echo $m_code; ?>","\x64\x65\x63\x72\x79\x70\x74","\x41\x45\x53"];var a3f5v6h7=CryptoJS[_$_7c01[3]][_$_7c01[2]](_$_7c01[0],_$_7c01[1])

</script>

<link href="../css/<?php echo $media; ?>" rel="stylesheet">

<style>

.back {

  float:left;color:white;position:absolute;top:15px;left:15px;

}

.lan {

  left: 50px;

  top: 0px;

}

</style>

<script src="../js/p-s-m-2.js"></script>

<script src="../js/html5shiv.min.js"></script>

<script src="../js/respond.min.js"></script>

 </head>

<body>

  <span class="l-state" visible="no" />

  <div class="fixed-action-btn">

     <a class="btn-floating btn-large language-click">

      <?php echo $language_icon; ?>

     </a>

   </div>

   <div class="language-icon waves-effect waves-light">

   <a href="../language.php"><div class="language" style="<?php if ( isset($_COOKIE["language"]) ) {echo "font-family: 'Cairo', sans-serif;";} else {echo "font-family: 'Open Sans', sans-serif;";} ?>"><?php echo $language; ?></div></a>

   </div>

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

}else if (!isset($_SESSION["this_is_session_for_user"])) {

  echo '



  <div class="header-right" style="padding-bottom:0px;padding-top:5px;">

<a href="../index.php"><img src="../images/logo.png" style="width:40px; height:40px;margin-right:8px;margin-top:1px"/></a>

<h2 class="label">'.$website_name.'</h2>

</div>



<div class="header-left" style="padding:0;padding-bottom:15px">

<a href="../language.php"><h4 class="lan" style="font-family:Cairo">'.$language.'</h4></a>

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

}





 ?>





</div>



<div class="user-header message-header">

<ul>



<li class="border-left my-messages" style="position:relative;width:100%;border-left:0">

  <h4>

    <?php if (!isset($_COOKIE["language"])) { echo '<span class="profile" style="color:wheat;cursor:pointer" data="../u/'.$m_user.'">'.$m_user.'</span>';} ?>

    <?php echo $share_label; ?>

    <?php if (isset($_COOKIE["language"])) { echo '<span class="profile" style="color:wheat;cursor:pointer" data="../u/'.$m_user.'">'.$m_user.'</span>';} ?>

 </h4></li>



</ul>





</div>



<div class="container-home" style="position:relative">



  <div class="avatar avatar-listen" style="top:90px">

  </div>

<div class="play-message-container">



<center style="overflow:visible;margin-top:30px;">

<img src="../images/resume-icon.png"  width="300" height="300" id="resume"/>

<img src="../images/play-mess2.png"  width="300" height="300" id="play"/>

</center>



</div>

<center><div class="views-share" style='background-color:#ed2553;border-radius:4px;padding:5px;color:white;position:absolute;top:15px;padding-right:8px;<?php if (isset($_COOKIE["language"])) {echo "right:10px";} ?>'><i class="fa fa-eye" style="margin-right:4px;"></i> <?php echo $views; ?></div></center>

</div>









</div>





<!--  End Work Area  -->

<script src="../js/jquery-3.1.0.min.js"></script>

<script type="text/javascript" src="../js/materialize.min.js"></script>

<script type="text/javascript" src="../js/<?php echo $js; ?>"></script>

<script type="text/javascript">

$(document).ready(function(){



     $(".button-collapse").sideNav();

     $(".lan").css("top","12px");

     $(".lan").css("left","auto");

     <?php

if (!isset($_COOKIE["language"])) {

  echo '



$(".lan").css("left","80px");

$(".lan").css("top","11px");

  ';

}

     ?>

     $(".profile").click(function () {



         window.location= $(this).attr("data");

     });

     if($(document).width() >= 601) {

       $(".avatar").css("top","80px");

     }

});

</script>

  </body>

</html>

