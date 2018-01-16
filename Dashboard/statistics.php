<?php


include "init/config.php";

$get_users_query = "select * from tablefor_users where account_statue='active' and thisisuser_gender='ذكر'";
$execute_gu_query = mysqli_query($db,$get_users_query);
$users_number = mysqli_num_rows($execute_gu_query);

$get_users_query2 = "select * from tablefor_users where account_statue='active'";
$execute_gu_query2 = mysqli_query($db,$get_users_query2);
$users_number2 = mysqli_num_rows($execute_gu_query2);

$get_users_query_3 = "select * from tablefor_users where account_statue='active' and thisisuser_gender='انثي'";
$execute_gu_query_3 = mysqli_query($db,$get_users_query_3);
$users_number_3 = mysqli_num_rows($execute_gu_query_3);

$get_users_query4 = "select * from tablefor_users where account_statue='deleted'";
$execute_gu_query4 = mysqli_query($db,$get_users_query4);
$users_number4 = mysqli_num_rows($execute_gu_query4);

//
$get_messages_query = "select * from this_is_users_audio_sounds where sound_message_statue='notactive'";
$execute_mq = mysqli_query($db,$get_messages_query);
$messages_number = mysqli_num_rows($execute_mq);

$get_messages_query5 = "select * from this_is_users_audio_sounds where sound_message_statue='deleted'";
$execute_mq5 = mysqli_query($db,$get_messages_query5);
$messages_number5 = mysqli_num_rows($execute_mq5);

// 

$get_messages_query6 = "select * from this_is_users_audio_sounds where sound_message_statue='active'";
$execute_mq6 = mysqli_query($db,$get_messages_query6);
$messages_number6 = mysqli_num_rows($execute_mq6);
//
$get_messages_share = "select * from this_is_users_shares";
$execute_gms = mysqli_query($db,$get_messages_share);
$shares_number = mysqli_num_rows($execute_gms);

//
$get_views_query = "select * from website_settings";
$execute_views_query = mysqli_query($db,$get_views_query);
$fetch_views_results = mysqli_fetch_assoc($execute_views_query);
$current_views = $fetch_views_results["website_views"];

//
$total_share_views = "SELECT SUM(sound_message_views) AS value_sum2 FROM this_is_users_shares";
$exe = mysqli_query($db,$total_share_views);
$total_share_v = mysqli_fetch_assoc($exe);
$total = $total_share_v['value_sum2'];
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
        <li >
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
        <li class="active">
          <i class="fa fa-bar-chart icon"></i>
          <a href="statistics.php">statistics</a>
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
          <div class="col-lg-4">
            <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num" style="color:#5c93dc;">
               <i class="fa fa-user"></i> <span class="users"><?php echo $users_number; ?></span>
              </h1>
              <h5 class="stat">Total Male Users</h5>
             
            </div>
        
                                         <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-female" style="margin-right:10px;"></i><span class="views"><?php echo $users_number_3; ?></span>
              </h1>
              <h5 class="stat">Total Female Users</h5>
              
            </div>
            </div>
            <div class="col-lg-4">
                     <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-check"></i> <span class="messages2"><?php echo $users_number2; ?></span>
              </h1>
              <h5 class="stat">Total Active Accounts</h5>
              
            </div>
               <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-trash"></i> <span class="shares"><?php echo $users_number4; ?></span>
              </h1>
              <h5 class="stat">Total Deleted Accounts</h5>
              
            </div>
          </div>
                     <div class="col-lg-4">
                     <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa  fa-envelope-open"></i> <span class="messages2"><?php echo $messages_number; ?></span>
              </h1>
              <h5 class="stat">Total Uncomplete Messages</h5>
              
            </div>
               <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-trash"></i> <span class="shares"><?php echo $messages_number5; ?></span>
              </h1>
              <h5 class="stat">Total Deleted Messages</h5>
              
            </div>
          </div>
                                 <div class="col-lg-6">
                     <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa  fa-envelope"></i> <span class="messages2"><?php echo $messages_number6; ?></span>
              </h1>
              <h5 class="stat">Total Complete Messages</h5>
              
            </div>
                                     </div>
             <div class="col-lg-6">
               <div class="total-songs dash_panel text-center z-depth-4">
              <h1 class="num"  style="color:#5c93dc">
                <i class="fa fa-eye"></i> <span class="shares"><?php echo $total; ?></span>
              </h1>
              <h5 class="stat">Total Shared Messages View</h5>
              
            </div>
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

    <!-- end the script -->
  </body>
</html>
