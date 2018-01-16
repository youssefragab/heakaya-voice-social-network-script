<?php
//language
if (isset($_COOKIE["language"])) {
  include "en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "ar-strings.php";
}
session_start();
session_regenerate_id(true);
if (isset( $_SESSION["this_is_session_for_user"] ) ) {
  header("Location: home");
}else {

  if (isset($_GET["error"])) {
  $error_visibility = "block";
  $error = $_GET["error"];
  if ($error == "w") {
    $error_report = $wrong_data_login;
  } else if ($error == "m") {
    $error_report = $missing_data_login;
  }else {
      $error_visibility = "none";
  }

}else {
    $error_visibility = "none";
}

}


 ?>
<?php include "header.php"; ?>
<style>
.error-report {
  color: #ed2553;
      font-size: 10pt;
      background-color: white;
      margin-bottom: 35px;
      padding: 10px 10px 12px 10px;
      text-align: center;
      display:<?php echo $error_visibility;?>;
      border-radius: 5px;
}
.error-icon {
  position: relative;
    top: 5px;
    left: 6px;
    display: <?php echo $error_icon; ?>
}
@media screen and (max-width:389px) {
  .container {
    width: 100%;
padding-left: 20px;
padding-right: 20px;
  }
  .main-content {
    padding: 0
  }
  .error-report {
    font-size: 9pt;
  }
}
</style>

<!--  Start Work Area  -->


 <div class="main-content" style="padding-top:25px;">
<center>

<div class="container z-depth-1">
  <div class="error-report" ><?php echo $error_report; ?><img class="error-icon" src="images/error-icon.png" width="20" height="20" /></div>
<form action="login/index.php" method="post" >

<input type="text" placeholder="<?php echo $user_name_place; ?>" name="user_name" class="focus" />
<input type="password" placeholder="<?php echo $password_place; ?>" name="user_password" class="focus"/>
<button name="login"><?php echo $login_button; ?></button>
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
     $("title").text("<?php echo $title_login; ?>");
});
</script>
  </body>
</html>
