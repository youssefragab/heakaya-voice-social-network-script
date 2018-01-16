<?php

include "../init/config.php";

class deleteUser {

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

  public function delete($table,$id) {

    $query = "delete from " .$table." where id=" . $id;
    $execute = mysqli_query($this->con,$query);

    if ($execute == true) {
      $resault =  "User Has Been Deleted Successfully";
    }else {
      $resault =  "Something Went Wrong, Please Try Again";
    }

return $resault;
  }


}



 ?>
