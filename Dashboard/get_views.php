<?php
include "init/config.php";
$get_views_query = "select * from website_settings";
$execute_views_query = mysqli_query($db,$get_views_query);
$fetch_views_results = mysqli_fetch_assoc($execute_views_query);
echo $current_views = $fetch_views_results["website_views"];

?>