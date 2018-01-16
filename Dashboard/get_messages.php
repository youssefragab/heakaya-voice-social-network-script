<?php
include "init/config.php";
$get_messages_query = "select * from this_is_users_audio_sounds where sound_message_statue='active'";
$execute_mq = mysqli_query($db,$get_messages_query);
$messages_number = mysqli_num_rows($execute_mq);
echo $messages_number;
?>