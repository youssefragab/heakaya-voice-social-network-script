<?php



session_start();

session_regenerate_id(true);

if (isset($_POST["mc"])) {

if(!isset($_SESSION["this_is_session_for_user"]) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {

header("Location: ../index.php");

}else {

  require "../init/config.php";

  $user_name = $_SESSION["this_is_session_for_user"];

  $message_code_ = htmlspecialchars($_POST["mc"]);

  $message_code = mysqli_real_escape_string($db,$message_code_);

  $check_auth_query = "select * from this_is_users_audio_sounds where sound_message_code='" .$message_code."' and sound_message_user='" . $user_name ."'";

  $e_c_a = mysqli_query($db,$check_auth_query);

  $sound_message_name_ = mysqli_fetch_array($e_c_a,MYSQLI_ASSOC);

  $sound_message_name = $sound_message_name_["sound_message_name"];

  $auth_statue = mysqli_num_rows($e_c_a);

  if ($auth_statue == 1) {

    function generateRandomString($length = 10) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {

            $randomString .= $characters[rand(0, $charactersLength - 1)];

        }

        return $randomString;

    }

  $sound_share_code = generateRandomString();

  $check_shares = "select * from this_is_users_shares where sound_message_code='" .$message_code. "'";

  $e_check_shares = mysqli_query($db,$check_shares);

  if (mysqli_num_rows($e_check_shares) == 0) {

  $insert_share_query = "insert into this_is_users_shares (sound_share_code,sound_message_code,sound_message_name,sound_message_user) values ('".$sound_share_code."','".$message_code."','".$sound_message_name."','".$user_name."')";

  $execute = mysqli_query($db,$insert_share_query);

  if ($execute == true) {

    echo "http://heakaya.com/share/" . $sound_share_code;

  }else {

    die("<center>حدث خطأ الرجاء الرجوع للصفحة السابقة</center>");

  }

}else {

  $fetch_r = mysqli_fetch_array($e_check_shares,MYSQLI_ASSOC);

  echo "http://heakaya.com/share/" . $fetch_r["sound_share_code"];

}

  }else {

    header("Location: ../404.php");

  }

}





}else {

  header("Location: ../404.php");

}







 ?>

