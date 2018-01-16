<?php

include "../init/config.php";

class baneUser {

  public $con;
  public $host;
  public $host_user_name;
  public $host_password;
  public $database_name;

  public function __construct () {

   $this->host = $GLOBALS["host"];
   $this->host_user_name = $GLOBALS["host_user_name"];
   $this->host_password = $GLOBALS["host_password"];
   $this->database_name = $GLOBALS["database_name"];
   $this->con = mysqli_connect( $this->host, $this->host_user_name, $this->host_password, $this->database_name);


  }

  public function bane ($table,$id) {

// get information
$check_query = "select * from " .$table. " where id=" . $id;
$extract_info = mysqli_query($this->con,$check_query);
$info = mysqli_fetch_array($extract_info,MYSQLI_ASSOC);
if($info["statue"] == "banned") {
  $query = "update " .$table." set statue='notbanned' where id=" . $id;
  $execute = mysqli_query($this->con,$query);

  if ($execute == true) {
    $resault =  "User Has Been UnBanned Successfully";
  }else {
    $resault =  "Something Went Wrong, Please Try Again";
  }

}else if($info["statue"] == "notbanned") {
  $query = "update " .$table." set statue='banned' where id=" . $id;
  $execute = mysqli_query($this->con,$query);

  if ($execute == true) {
    $resault =  "User Has Been Banned Successfully";
  }else {
    $resault =  "Something Went Wrong, Please Try Again";
  }
}


return $resault;
  }


}



 ?>
