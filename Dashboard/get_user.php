<?php

include "init/config.php";

$get_users_query = "select * from tablefor_users where account_statue='active'";
$execute_gu_query = mysqli_query($db,$get_users_query);
echo $users_number = mysqli_num_rows($execute_gu_query);

?>