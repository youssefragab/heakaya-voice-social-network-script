<?php
require "init/config.php";
 if(isset($_POST['sender_name']) && isset($_POST["sender_email"]) && isset($_POST["message_subject"]) && isset($_POST['message_text']) && parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == $domain) {
 if (empty($_POST['sender_name']) || empty($_POST["sender_email"]) || empty($_POST["message_subject"]) || empty($_POST['message_text'])) {
   header("Location: contactus.php?proccess=error");
 }else {
  $sender_name = htmlspecialchars($_POST['sender_name']);
  $sender_email = htmlspecialchars($_POST["sender_email"]);
  $message_subject = htmlspecialchars($_POST["message_subject"]);
  $message_text = htmlspecialchars($_POST['message_text']);
  if (isset($_SESSION["this_is_session_for_user"])) {
  $heakaya_user_name = $_SESSION["this_is_session_for_user"];
}else {
  $heakaya_user_name = "";
}
$date = date("d/m/Y h:i a", time());
$insert_query = "insert into contact_us_table (sender_name,sender_email,sender_heakaya_user_name,message_subject,message_text,message_date)
 values('".$sender_name."','".$sender_email."','".$heakaya_user_name."','".$message_subject."','".$message_text."','".$date."')";
 $execute = mysqli_query($db,$insert_query);
 if ($execute == true) {
   header("Location: contactus.php?proccess=success");
 }else {
   header("Location: contactus.php?proccess=dbfailer");
 }
}
 }else {
   header("Location: contactus.php");
 }





 ?>
