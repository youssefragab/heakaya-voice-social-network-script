<?php
include "init/config.php";

//extract search number
$get_search_num = "select * from website_settings";
$execute_get_counter = mysqli_query($db,$get_search_num);
$current_num = mysqli_fetch_assoc($execute_get_counter);
$new_counter = $current_num["search_counter"] + 1;
$counter_query = "UPDATE website_settings set search_counter='".$new_counter."'";
$execute_update = mysqli_query($db,$counter_query);



 ?>
