<?php
//language
if (isset($_COOKIE["language"])) {
  include "en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "ar-strings.php";
}
session_start();
session_regenerate_id(true);
if (!isset($_SESSION["this_is_session_for_user"])) {

require "init/config.php";
if (isset($_GET["error"])) {
$error_visibility = "block";
$error = $_GET["error"];

if ($error == "usernamealreadyexist") {
  $error_report = $already_exist;
} else if ($error == "usernamelength") {
  $error_report = $user_name_length;
} else if ($error == "unnie") {
   $error_report = $user_name_nie;
} else if ($error =="password") {
   $error_report = $password_length;
} else if ($error == "pwnie") {
   $error_report = $password_english;
} else if ($error == "country") {
   $error_report = $country_length;
} else if ($error == "failed") {
   $error_report = $failed_register;
} else if ($error == "inf") {
   $error_report = $upload_pic_register;
} else if ($error == "invalidimage") {
   $error_report = $damaged_pic;
} else if ($error == "missing") {
 $error_report = $missing_data_login;
} else if ($error == "gender") {

$error_report = $gender_error_register;

}else {
  $error_visibility = "none";
}

}else {
  $error_visibility = "none";
}

}else {
  header("location: home");
}
 ?>
<?php include "header.php"; ?>
<style>
.error-report {
  color: #ed2553;
      font-size: 10pt;
      background-color: white;
      margin-bottom: 35px;
      padding: 10px;

      display:<?php echo $error_visibility;?>
}
.error-icon {
text-align: center;
display: block;
margin-top: 10px;
  display: <?php echo $error_icon; ?>
}
@media screen and (min-width:800px) {
  .container {
    width: 70%;
  }
}
</style>

 <div class="main-content" style="padding-top:0px;">
<center>

<div class="container z-depth-1" style="padding-top:40px;margin-top:20px;">
<div class="error-report" style=""><?php echo $error_report; ?></div>
<form action="register/index.php" method="post" enctype="multipart/form-data" >

<input type="text" placeholder="<?php echo $user_name_register; ?>" name="user_name" class="focus" />
<input type="text" placeholder="<?php echo $name_register; ?>" name="name" class="focus"/>
<input type="password" placeholder="<?php echo $password_place; ?>"  name="user_password" class="focus"/>
<input type="text" placeholder="<?php echo $country_register; ?>" name="user_country" class="focus"/>
<span><?php echo $profile_picture_register; ?></span>
<input type="file" style="width:95%" name="user_picture" accept="image/*"/>
<select name="user_gender">
<option selected value="ذكر">
<?php echo $male; ?>
</option>

<option value="انثي">
<?php echo $female; ?>
</option>

</select>
<button class="register-button" name="register"><?php echo $register_button; ?></button>
</form>


</div>

</center>

</div>



<!--  End Work Area  -->
<script src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/<?php echo $js; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){

     $(".button-collapse").sideNav();
     $("title").text("<?php echo $title_register; ?>");
});
</script>
  </body>
</html>
