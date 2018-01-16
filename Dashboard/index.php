<?php


include "init/config.php";

$get_users_query = "select * from tablefor_users where account_statue='active'";
$execute_gu_query = mysqli_query($db,$get_users_query);
$users_number = mysqli_num_rows($execute_gu_query);

//
$get_messages_query = "select * from this_is_users_audio_sounds where sound_message_statue='active'";
$execute_mq = mysqli_query($db,$get_messages_query);
$messages_number = mysqli_num_rows($execute_mq);

//
$get_messages_share = "select * from this_is_users_shares";
$execute_gms = mysqli_query($db,$get_messages_share);
$shares_number = mysqli_num_rows($execute_gms);

//
$get_views_query = "select * from website_settings";
$execute_views_query = mysqli_query($db,$get_views_query);
$fetch_views_results = mysqli_fetch_assoc($execute_views_query);
$current_views = $fetch_views_results["website_views"];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Heakaya - DashBoard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
      <link href="css/materialize.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/dashboard_style.css">
  </head>
  <body>
    <div class="slide-menu">
      <div class="header visible-xs">
        <!--
         Just set the state in this class ;)
         online or offline and it's color will change ;) :D
         and i u need it to be offline just remove "online" class
        -->
        <div class="user-box online">
          <div class="img-container">
            <img src="images/youssef.jpg" alt="" class="z-depth-3">
          </div>
          <span>Youssef Mousa</span>
        </div>
        <div class="search-box">
          <form action="">
            <label>
              <img src="images/search.png" alt="">
            </label>
            <input type="text" placeholder="Search..." class="searchBox">
          </form>
        </div>
      </div>
      <ul class="dash_links list-unstyled">
        <li class="active">
          <i class="fa fa-home icon"></i>
          <a href="index.php">Dashboard</a>
        </li>
        <li>
          <i class="fa fa-users icon"></i>
          <a href="members.php">Members</a>
        </li>
        <li>
          <i class="fa fa-envelope icon"></i>
          <a href="messages.php">Messages</a>
        </li>
        <li>
          <i class="fa fa-bar-chart icon"></i>
          <a href="statistics.php">statistics</a>
        </li>
            <li>
          <i class="fa fa-desktop icon"></i>
          <a href="#" class="full">Full Screen Mode</a>
        </li>
        <li>
      <i class="fa fa-sign-in icon"></i>
      <a href="logout.php" class="full">LogOut</a>
    </li>
      </ul>
    </div>
    <!-- overlay will show when the menu opened in small size -->
    <div class="mobile-menu-overlay">
    </div>
    <div class="top_navbar">
      <div class="logo-box">
        <h3>Heakaya</h3>
      </div>
      <span class="menu-toggle">
        <div class="chart"></div>
        <div class="chart"></div>
        <div class="chart"></div>
      </span>
      <div class="header hidden-xs">
        <div class="search-box">
          <form action="">
            <label>
              <img src="images/search.png" alt="">
            </label>
            <input type="text" placeholder="Search..." class="searchBox">
          </form>
        </div>
        <!--
        Just set the state in this class ;)
        online or offline and it's color will change ;) :D
        and i u need it to be offline just remove "online" class
        -->
        <div class="user-box online">
          <div class="img-container">
            <img src="images/youssef.jpg" alt="" class="z-depth-3">
          </div>
          <span>Youssef Mousa</span>
        </div>
      </div>
    </div>
    <!-- dashboard page content -->
    <div class="dash_page_content">
      <div class="stat_row">
        <div class="row">
          <div class="col-lg-6">
            <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num" style="color:#5c93dc;">
               <i class="fa fa-users"></i> <span class="users"><?php echo $users_number; ?></span>
              </h1>
              <h5 class="stat">Total Registered Users</h5>

            </div>

                                         <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-eye" style="margin-right:10px;"></i><span class="views"><?php echo $current_views; ?></span>
              </h1>
              <h5 class="stat">Total Website Views</h5>

            </div>
            </div>
            <div class="col-lg-6">
                     <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-file-sound-o"></i> <span class="messages2"><?php echo $messages_number; ?></span>
              </h1>
              <h5 class="stat">Total Exchanged Messages</h5>

            </div>
               <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-share-alt-square"></i> <span class="shares"><?php echo $shares_number; ?></span>
              </h1>
              <h5 class="stat">Total Messages Share</h5>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- start the script -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/progressbar.min.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/plugins.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
    <script>
if (annyang) {
  // Let's define our first command. First the text we expect, and then the function it should call
  var commands = {
    'full screen': function() {
            $(document).ready(function () {
          if ($(document).width() > 768) {


            $(".slide-menu").fadeOut();
            $(".dash_page_content").animate({paddingLeft:"25px"});


          }
            });
    }

  };

      var commands2 = {
    'end full screen': function() {
            $(document).ready(function () {
          if ($(document).width() > 768) {

            $(".dash_page_content").animate({paddingLeft:"255px"});
            $(".slide-menu").fadeIn();


          }
            });
    }

  };





  // Add our commands to annyang
  annyang.addCommands(commands);
   annyang.addCommands(commands2);

  // Start listening. You can call this here, or attach this call to an event, button, etc.
  annyang.start();
}
</script>
    <script>
      $(document).ready(function () {
          if ($(document).width() > 768) {
        $(".full").click(function () {

            $(".slide-menu").fadeOut();
            $(".dash_page_content").animate({paddingLeft:"25px"});

        });
          }

     function getUsers() {
     var current = $(".users").html();
     $.ajax({
      url:"get_user.php",
      type:"post",
      success: function (data) {
        $(".users").text(data);
          if (data !== current) {
              var audio = new Audio("notifaction.mp3");
              audio.play();
          }
      }

     });
   }

     function getMessages() {
     var current = $(".messages2").html();
     $.ajax({
      url:"get_messages.php",
      type:"post",
      success: function (data) {
        $(".messages2").text(data);
          if (data !== current) {
              var audio = new Audio("notifaction.mp3");
              audio.play();
          }
      }

     });
   }
       function getViews() {
     var current = $(".views").html();
     $.ajax({
      url:"get_views.php",
      type:"post",
      success: function (data) {
        $(".views").text(data);
          if (data !== current) {
              var audio = new Audio("notifaction.mp3");
              audio.play();
          }
      }

     });
   }
        function getShares() {
     var current = $(".shares").html();
     $.ajax({
      url:"get_shares.php",
      type:"post",
      success: function (data) {
        $(".shares").text(data);
          if (data !== current) {
              var audio = new Audio("notifaction.mp3");
              audio.play();
          }
      }

     });
   }

      setInterval(getMessages, 60000);
      setInterval(getUsers, 63000);
      setInterval(getViews, 66000);
      setInterval(getShares, 69000);
      });
    </script>
    <!-- end the script -->
  </body>
</html>
