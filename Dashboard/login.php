<?php
session_start();
if(isset($_SESSION["admin"])) {
  header("Location: index.php");
}
if (isset($_POST["login"]) && isset($_POST["user_name"]) && isset($_POST["user_password"])) {
require "init/config.php";
$user_name_ = htmlspecialchars($_POST["user_name"]);
$user_name = mysqli_real_escape_string($db,$user_name_);

$user_password_ = htmlspecialchars($_POST["user_password"]);
$user_password = mysqli_real_escape_string($db,$user_password_);

$check_query = "select * from admin_table where user_name='".$user_name."' and user_password='".$user_password."'";
$execute = mysqli_query($db,$check_query);
if(mysqli_num_rows($execute) == 1) {
  session_start();
  $_SESSION["admin"] = $user_name;
  header("Location: index.php");
}else {
  header("Location: login.php");
}

}



 ?>

<!DOCTYPE html>

<html lang="en">

 <head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>DashBoard</title>


 <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans);
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);



.login-page {

  width: 360px;

  padding: 8% 0 0;

  margin: auto;

}

.form {

  position: relative;

  z-index: 1;



      background-image: url(images/shadow2.png);

  max-width: 360px;

  margin: 0 auto 100px;

  padding: 0px 45px 45px 45px;

  text-align: center;

  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

}

.form input {

  font-family: 'Open Sans', sans-serif;

  outline: 0;

  background: #f2f2f2;

  width: 100%;

  border: 0;

  margin: 0 0 15px;

  padding: 15px;

  box-sizing: border-box;

  font-size: 14px;

}

.form button {

  font-family: 'Open Sans', sans-serif;

  text-transform: uppercase;

  outline: 0;

  background: #00c7fc;

  width: 100%;

  border: 0;

  padding: 15px;

  color: #FFFFFF;

  font-size: 14px;

  -webkit-transition: all 0.3 ease;

  transition: all 0.3 ease;

  cursor: pointer;

}

.form button:hover,.form button:active,.form button:focus {

  background:#4d5d70

}

.form .message {

  margin: 15px 0 0;

  color: #b3b3b3;

  font-size: 12px;

}

.form .message a {

  color: #4CAF50;

  text-decoration: none;

}

.form .register-form {

  display: none;

}

.container {

  position: relative;

  z-index: 1;

  max-width: 300px;

  margin: 0 auto;

}

.container:before, .container:after {

  content: "";

  display: block;

  clear: both;

}

.container .info {

  margin: 50px auto;

  text-align: center;

}

.container .info h1 {

  margin: 0 0 15px;

  padding: 0;

  font-size: 36px;

  font-weight: 300;

  color: #1a1a1a;

}

.container .info span {

  color: #4d4d4d;

  font-size: 12px;

}

.container .info span a {

  color: #000000;

  text-decoration: none;

}

.container .info span .fa {

  color: #EF3B3A;

}

body {

  background: #3c4251; /* fallback for old browsers */

  font-family: 'Open Sans', sans-serif;



}

.login-form input,.login-form button {

font-family: 'Open Sans', sans-serif;
}

.sign {





   padding: 25px;

    display: block;

    text-align: center;

    background-color:



    }

    .sign h2 {
font-family: 'Open Sans', sans-serif;
        color:white;

        color: white;

        font-size: 14pt;

        margin: 0;



        }

  @media screen and (max-width:450px) {

    .login-page {

        padding: 100px 10px 10px 10px;

    }

@media screen and (max-width:387px) {
.login-page {
  width: 90%;
}

}

    }

 </style>

 </head>

<body>

<div class="login-page">

  <div class="form">

    <div class="sign"><h2>DashBoard</h2></div>



    <form class="login-form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

      <input type="text" placeholder="username" name="user_name"/>

      <input type="password" placeholder="password" name="user_password"/>

      <button name="login">login</button>



    </form>

  </div>

</div>
