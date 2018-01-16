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
<title><?php echo $privacy_policy_title; ?></title>
<link href="images/icon.png" rel="icon" >
<link rel="stylesheet" href="css/font-awesome.min.css" />
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

<li class="border-left my-messages" style="position:relative;width:100%;border-left:0"><h4><a class="back" href="<?php echo $_SERVER["HTTP_REFERER"]; ?>" ><?php echo $back; ?></a> <?php echo $privacy_label; ?></h4></li>

</ul>


</div>

<?php

if (!isset($_COOKIE["language"])) {
  echo '

  <div class="container-home">

  <div class="policy-container">
    <span style="font-weight:bold;">: سرية وخصوصية المعلومات</span>
  <br/>
    أن خصوصية موقع حكاية ومستخدميه من الأمور التي نولي لها اهتمام كبيراً
    ونعتبرها من الأمور الأساسية التي نحرص عليها، كما اننا نحترم ونحمي خصوصية
    جميع مستخدمي موقع حكاية، لذلك فإننا لن نكشف اي معلومات لأي طرف ثالث الا
   بعد الحصول على اذن مسبق منه او اذا استلزم الأمر قانونيا.
   <br/>
  <br/>
    <span style="font-weight:bold;">: نوعية المعلومات التي تجمع عنك</span>
  <br/>
  لا نقوم في موقع حكاية بجمع أي معلومات خاصة بك (مثل اسمك وكلمة السر الخاصة بك
   ، إلخ) فهي فقط تستخدم لكي تستطيع الدخول الي موقعنا
    والمعلومات التي يسجلها موقع حكاية ويحفظها هي معلومات مثل
   الوقت الذي تتصفح به ونوع المتصفح ولغته و عنوان الاي بي الخاص بك
   وتُستعمل هذه المعلومات لتوفير خدمات أفضل لمستخدمي موقع
   حكاية.
    <br/>
    <br/>
    <span style="font-weight:bold;">  : مسؤلية موقع حكاية</span>
    <br/>
    لا يتحمل موقع حكاية اي مسؤلية عن المعلومات التي يقدمها المستخدمين في الموقع
    ولا يتحمل مسؤلية الرسائل الصوتية التي يتبادلها المستخدمين
    واذا ثبت اي عمل غير مشروع او رسائل غير لائقة يتم حجب المستخدم من الموقع من خلال الاي بي الخاص به مدي الحياة وتسليمه الي السلطات اذا لزم ذلك
  <br/>
  <br/>
  <span style="font-weight:bold;">  : محتوى موقع حكاية</span>
  <br/>

  يحتوي موقع حكاية علي معلومات غير حساسة للمستخدمين فقط اسماء المستخدمين وكلمات السر والدولة التي يختاروها بأنفسهم ويمكنهم تغييرها في اي وقت

  و يحتوي موقع حكاية علي الرسائل الصوتية مجهولة الهوية التي يتبادلها المستخدمين ويتم حذف الرسائل الخاصة بالمستخدم نهائيا من السيرفر الخاص بنا عندما يقوم المستخدم بحذفها او عندما يقوم المستخدم بحذف حسابه
  </br>
  <br/>
  <span style="font-weight:bold;">: سياسة الحسابات المحذوفة</span>
  <br/>
  عندما يقوم مستخدم بحذف حسابه من موقعنا يتم حذف جميع معلوماته والرسائل المستلمة الخاصة به من السيرفر ولا يستطيع اي احد ان يقوم
  بالتسجيل بنفس اسم المستخدم الخاص به مرة اخري لمنع انتحال الشخصيات
  <br/>
  <br/>
  <span style="font-weight:bold;"> : موافقتك والتغييرات في سياسة الخصوصية </span>
  <br/>
  إن تصفحك واستخدامك لخدمات موقع حكاية يعني بأنك موافق على سياسة الخصوصية والمعلومات
     واستعمالها كما هو مذكور في هذه السياسة . وقد يقوم موقع حكاية بإجراء
    تغيرات في سياسة الخصوصية من حين إلى آخر. وعندما نقوم بذلك سنضع تلك
    التغييرات على هذه الصفحة لكي تكون أنت دائما على علم بسياسة الخصوصية والمعلومات
    التي نجمعها وكيفية استخدامنا لها وفي أية ظروف نكشف عنها.
  </br>
  </div>


  </div>

  ';
}else if (isset($_COOKIE["language"])) {
  echo '
  <div class="container-home">

  <div class="policy-container">
    <span style="font-weight:bold;">Privacy Of The Information :</span>
  <br/>
      The privacy of the Heakaya users Information are things that we pay great attention to We consider them to be essential and we respect and protect privacy of all Heakaya users, so we will not disclose any information to any third party except After obtaining permission from the user or if required by law.
   <br/>
  <br/>
    <span style="font-weight:bold;">The type of information that collects about you :</span>
  <br/>
       We do not collect any information about you such as (your name, password, Etc.) there are only use to help you access your account on our site, and we save some of your browser information such as The time you browse, browser type, language, and IP address This information is used to provide better services to Heakaya users
    <br/>
    <br/>
    <span style="font-weight:bold;">Responsibility of Heakaya :</span>
    <br/>
      Heakaya Do not take responsibility for the information provided by users on the site And does not take responsibility for voice messages exchanged by users If any illegal action or inappropriate messages is proven, the user will be blocked from the site through his / her IP and delivered to the authorities if necessary.
  <br/>
  <br/>
  <span style="font-weight:bold;">Heakaya Content :</span>
  <br/>
  The Heakaya website contains information that is not sensitive to users, only user names, passwords and the country of their choice and can be changed at any time

     The site contains anonymous voice messages exchanged by users and the messages will be deleted  permanently from our server when the user delet the messages or when the user delete his account

  </br>
  <br/>
  <span style="font-weight:bold;">Deleted accounts policy :</span>
  <br/>
  When a user deletes his account from our site, his information and his messages will be deleted from the server and no one can
  longer Register his username again to prevent impersonation
  <br/>
  <br/>
  <span style="font-weight:bold;">Your approval and the changes to the Privacy Policy :</span>
  <br/>
  Your browsing and using of the Heakaya Web Services means that you agree to our Privacy Policy and Information and we will do Changes in the privacy policy from time to time. And when we do that we will put those
  Changes to this page so that you are always aware of our privacy policy and information Which we collect and how we use them and in what circumstances we disclose them.
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
