<?php
include "init/config.php";
$get_messages_share = "select * from this_is_users_shares";
$execute_gms = mysqli_query($db,$get_messages_share);
echo $shares_number = mysqli_num_rows($execute_gms);

?>