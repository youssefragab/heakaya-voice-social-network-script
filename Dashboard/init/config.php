<?php



error_reporting(0); //shutdown error reporting for security purposes

@session_start();  // start session

ini_set('session.use_trans_sid', 0);

ini_set('session.use_only_cookies', 1);

//Database connection information

$GLOBALS["host"] = ""; // host server

$GLOBALS["host_user_name"] = ""; // username

$GLOBALS["host_password"] = ""; // password

$GLOBALS["database_name"]= ""; // the database name

$domain = "";

/*/////////////////////////////*/

// connect to database

$db = mysqli_connect($host,$host_user_name,$host_password,$database_name);

 if($db-> connect_errno) {

   die("<center><h2 style='color:black;font-size:14pt;'>Sorry The Website Is Not Available Right Now,Come Back Later</h2></center>");

 }



 if (isset($_SESSION["admin"])) {



 }else {

   header("Location: login.php");

 }





?>

