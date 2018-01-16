<?php

class connection {

  // connection properities
  public $con;
  public $hostname;
  public $user_name;
  public $password;
  public $database_name;
  //

    function __construct()
    {
      // database connection information
      $this->hostname = $GLOBALS["host"]; // host server
      $this->user_name = $GLOBALS["host_user_name"]; // username
      $this->password = $GLOBALS["host_password"]; // password
      $this->database_name = $GLOBALS["database_name"]; // the database name

      /*/////////////////////////////*/
      // connect to database
      $this->con = mysqli_connect($this->hostname,  $this->user_name,$this->password,$this->database_name);
    }

}








 ?>
