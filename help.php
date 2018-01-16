<?php
include "init/config.php";
//language
if (isset($_COOKIE["language"])) {
  include "en-strings.php";
}else if (!isset($_COOKIE["language"])) {
  include "ar-strings.php";
}
// add view
$get_views_query = "select * from website_settings";
$execute_views_query = mysqli_query($db,$get_views_query);
$fetch_views_results = mysqli_fetch_assoc($execute_views_query);
$current_views = $fetch_views_results["website_views"];
//add new view
$new_view = $current_views + 1;
$update_views_query = "update website_settings set website_views='" . $new_view . "'";
$execute_update_v = mysqli_query($db,$update_views_query);
 ?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
 <head>
<meta charset="utf-8">
<meta name="description" content="احصل علي رسائل صوتية مجهولة الهوية من اصدقائك وعائلتك وايضا من اشخاص لا تعرفهم وقم بمشاركة الرسائل علي وسائل التواصل الاجتماعي">
<meta name="keywords" content="Sarahah,ask.fm,sayat.me,ask,sayat,voice Messages,Sound Message, sarahah.com,facebook,twitter,instagram,snapchat,news,صراحة,موقع صراحة ,اسك ,سايت,فيس بوك ,تويتر,انستاجرام,اخبار,سناب شات, موقع رسائل صوتية,رسائل صوتية مجهولة, حكاية">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#5b81ec" >
<title><?php echo $title_help; ?></title>
<link href="images/icon.png" rel="icon" >
<link rel="stylesheet" href="css/materialize.min.css" />
<?php echo $style_file; ?>
<style>
.language-panel {
  top: 49px;
  left: 40px;
}
body {
  overflow-x: hidden;
}
.user-header ul li:hover {
  background-color: transparent;
  background-image: none;
  cursor: default;
}
#bars {
  position: relative;
  top:-150px;
}

</style>
<link href="css/<?php echo $media; ?>" rel="stylesheet">
<style>
.back {
  float:left;color:white;position:absolute;top:15px;left:15px;
}
</style>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
 </head>
<body>
<!--  Start Work Area  -->



<div class="user-header message-header">
<ul>

<li class="border-left my-messages" style="position:relative;width:100%;border-left:0"><h4><a class="back" href="<?php echo $_SERVER["HTTP_REFERER"]; ?>" ><?php echo $back; ?></a> <?php echo $help; ?></h4></li>

</ul>


</div>

<?php

if (!isset($_COOKIE["language"])) {

echo '

<div class="container-home">

<div class="policy-container">
  <span style="font-weight:bold;">كيفية تسجيل رسائل صوتية مجهولة؟</span>
<br/>
يمكنك تسجيل رسائل صوتية مجهولة بعدة طرق
<br/>
<span style="font-weight:bold;direction:ltr">تغيير صوتك من خلال حبالك الصوتية</span><span style="font-weight:bold;float:right">-1</span>
<br/>
اذا كان لديك/ي القدرة علي تغيير صوتك بنفسك توجه الي مسجل الصوت علي هاتفك وقم بتسجيل رسالتك
<br/>
  <span style="font-weight:bold;direction:ltr">تغيير صوتك من خلال سد فتحتي انفك</span><span style="font-weight:bold;float:right">-2</span>
<br/>
قم بالتوجه الي مسجل الصوت علي هاتفك وقم بسد فتحتي انفك وابدأ في تسجيل رسالتك
وسوف تلاحظ تغير صوتك كليا
  <br/>
  <span style="font-weight:bold;direction:ltr">قم بتحميل واستعمال برامج تغيير الصوت</span><span style="font-weight:bold;float:right">-3</span>
  <br/>
قم بالتوجه الي متجر التطبيقات الخاص بهاتفك وابحث عن برامج تغيير الصوت وقم بتحميل احد البرامج
و قم بتسجيل رسالتك من خلاله
<br/>
<br/>
<span style="font-weight:bold;">كيف اجد صفحة شخص ما؟</span>
<br/>
لكي تجد صفحة شخص ما في الموقع يجب عليك اولا الحصول علي اسم المستخدم الخاص بهذا الشخص فبعد الحصول عليه توجه
الي مربع البحث في الصفحة الرئيسية وقم بكتابة اسم المستخدم فستظهر لك نتائج البحث قم بالضغط  عليها وسوف يتم توجيهك الي صفحة الشخص
<br/>
<br/>
<span style="font-weight:bold;">كيف ارسل رسالة الي شخص ما؟</span>
<br/>
عندما تصل الي صفحة الشخص المطلوب ارسال الرسالة اليه قم بالضغط علي زر الرفع الموجود في الصفحة وسوف يطلب منك تحديد
ملف الرسالة الصوتية من جهازك فقم بتحديد الرسالة وسوف يتم تلقائيا تحويلك الي صفحة معاينة الرسالة وتأكيد الارسال
فقم بالاستماع الي الرسالة واضغط علي زر ارسال ليتم ارسال الرسالة
</br>
</div>


</div>
';

}else if (isset($_COOKIE["language"])) {
echo '
<div class="container-home">

<div class="policy-container">
  <span style="font-weight:bold;">How To Record Anonymous Voice Messages ?</span>
<br/>
You can record anonymous voice messages in several ways
<br/>
<span style="font-weight:bold;direction:ltr"> Change your voice through your vocal cords</span><span style="margin-right:5px;font-weight:bold;float:left"> -1 </span>
<br/>
If you have the ability to change your own voice, go to the voice recorder on your phone and record your message
<br/>
  <span style="font-weight:bold;direction:ltr">Change your voice by closing  your nose openings</span><span style="margin-right:5px;font-weight:bold;float:left">-2</span>
<br/>
Go to the sound recorder on your phone and close your nose openings and start recording your message
You will notice that your voice has changed completely
  <br/>
  <span style="font-weight:bold;direction:ltr">Download and use voice change programs</span><span style="margin-right:5px;font-weight:bold;float:left">-3</span>
  <br/>
  Go to your phone application store, search for voice changer programs, and download a program
  And record your message through it
<br/>
<br/>
<span style="font-weight:bold;">How I can find someone ?</span>
<br/>
In order to find someone in the site you must first get the user name of this person...after you receive it
go ahead and go to the search box in the home page and type the username. Your search results will appear. Click it and you will be redirected to the person profile
<br/>
<br/>
<span style="font-weight:bold;">How do I send a message to someone?</span>
<br/>
When you reach the page of the person you want to send the message to, click the Upload button on the page and you will be asked to select
The voice message file from your device Select the message and you will automatically be redirected to the message preview page to confirm the send
Listen to the message and press the Send button to send the message
</br>
</div>


</div>

';
}




 ?>




<!--  End Work Area  -->
<script src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/<?php echo $js; ?>"></script>
<script type="text/javascript">
$(document).ready(function(){

     $(".button-collapse").sideNav();


});
</script>
  </body>
</html>
