<?php
include "init/config.php";
if(isset($_FILES["data"]) && isset($_POST["fname"])) {

	$valid_file_types = array(

			"audio/mp3",

      "audio/mp4",

			"audio/ogg",

	);
  $format = end((explode(".", $_FILES["data"]["name"])));
  $user_ = htmlspecialchars($_POST["fname"]);
  $user = mysqli_real_escape_string($db,$user_);
if (in_array($_FILES['data']['type'],$valid_file_types) && strpos($_FILES['data']['name'], 'php') == false) {
		 $filename = $user . "_" . rand(1,999999999) . "_" . rand(1,999999999) . "." . $format;
		 move_uploaded_file($_FILES["data"]["tmp_name"], 'rv6cd464l499gIh5tSoesGzm4d2wAgy4VQi2F3eAZ2k/' . $filename);
		 $query_extract_id = "select * from tablefor_users where thisisuser_name='" . $user_name. "'";
		 $extract_id_from_database = mysqli_query($db, $query_extract_id);
		 $id = mysqli_fetch_array($extract_id_from_database,MYSQLI_ASSOC);
		 $re = uniqid(rand(),true);
		 $mcode = sha1($re);
		 $resault = "messagename=" . $filename . "&&username=" . $user . "&&messagecode=" . $mcode;
		 $date = date("d/m/Y h:i a", time());
		 $insert_message_query = "insert into this_is_users_audio_sounds (sound_message_name,sound_message_date,sound_message_code,
		 sound_message_statue,sound_message_user) values ('".$filename."','".$date."','".$mcode."','notactive','".$user."')";
		 $execute_query_2 = mysqli_query($db,$insert_message_query);
		 header("Location: proceed/".$user ."/".$mcode);
}else if ($format == "m4a" && strpos($_FILES['data']['name'], 'php') == false) {
$filename = $user . "_" . rand(1,999999999) . "_" . rand(1,999999999) . ".mp3";
		 move_uploaded_file($_FILES["data"]["tmp_name"], 'rv6cd464l499gIh5tSoesGzm4d2wAgy4VQi2F3eAZ2k/' . $filename);
		 $query_extract_id = "select * from tablefor_users where thisisuser_name='" . $user_name. "'";
		 $extract_id_from_database = mysqli_query($db, $query_extract_id);
		 $id = mysqli_fetch_array($extract_id_from_database,MYSQLI_ASSOC);
		 $re = uniqid(rand(),true);
		 $mcode = sha1($re);
		 $resault = "messagename=" . $filename . "&&username=" . $user . "&&messagecode=" . $mcode;
		 $date = date("d/m/Y h:i a", time());
		 $insert_message_query = "insert into this_is_users_audio_sounds (sound_message_name,sound_message_date,sound_message_code,
		 sound_message_statue,sound_message_user) values ('".$filename."','".$date."','".$mcode."','notactive','".$user."')";
		 $execute_query_2 = mysqli_query($db,$insert_message_query);
		 header("Location: proceed/".$user ."/".$mcode);

} else if ($format == "aac" && strpos($_FILES['data']['name'], 'php') == false) {

	     $filename = $user . "_" . rand(1,999999999) . "_" . rand(1,999999999) . ".mp3";
			 move_uploaded_file($_FILES["data"]["tmp_name"], 'rv6cd464l499gIh5tSoesGzm4d2wAgy4VQi2F3eAZ2k/' . $filename);
			 $query_extract_id = "select * from tablefor_users where thisisuser_name='" . $user_name. "'";
			 $extract_id_from_database = mysqli_query($db, $query_extract_id);
			 $id = mysqli_fetch_array($extract_id_from_database,MYSQLI_ASSOC);
			 $re = uniqid(rand(),true);
			 $mcode = sha1($re);
			 $resault = "messagename=" . $filename . "&&username=" . $user . "&&messagecode=" . $mcode;
			 $date = date("d/m/Y h:i a", time());
			 $insert_message_query = "insert into this_is_users_audio_sounds (sound_message_name,sound_message_date,sound_message_code,
			 sound_message_statue,sound_message_user) values ('".$filename."','".$date."','".$mcode."','notactive','".$user."')";
			 $execute_query_2 = mysqli_query($db,$insert_message_query);
			 header("Location: proceed/".$user ."/".$mcode);

}else {
header("Location: u/" . $_POST["fname"] . "&invalid");

}


}else {
header("Location: 404.php");
}

?>
