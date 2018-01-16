<?php

include "init/config.php";

$get_m_query = "select * from contact_us_table order by id desc";
$execute = mysqli_query($db,$get_m_query);



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
        <li>
          <i class="fa fa-home icon"></i>
          <a href="index.php">Dashboard</a>
        </li>
        <li>
          <i class="fa fa-users icon"></i>
          <a href="members.php">Members</a>
        </li>
        <li class="active">
          <i class="fa fa-envelope icon"></i>
          <a href="messages.php">Messages</a>
        </li>
        <li>
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
      <div class="play-manager">
        <div class="table-title">
          <h1>Heakaya Members</h1>
        </div>
        <div class="table-th hidden-xs hidden-sm">
          <div class="row">
            <div class="col-lg-2 col-md-2"><span>Sender Name</span></div>
            <div class="col-lg-2 col-md-2"><span>Sender Email</span></div>
              <div class="col-lg-2 col-md-2"><span>H - User Name</span></div>
               <div class="col-lg-2 col-md-2"><span>Subject</span></div> 
              <div class="col-lg-2 col-md-2"><span>Date</span></div>
            <div class="col-lg-2 col-md-2 text-center"><span>Settings</span></div>
          </div>
        </div>
        <div class="table-body">
<?php
            
while ($message = mysqli_fetch_assoc($execute)) {
    
    echo '
              <div class="row">
            <div class="col-lg-2 col-md-4">
              <div class="sounds-play-now">
                <h4><span style="font-family: Cairo, sans-serif;">'.$message['sender_name'].'</span></h4>
              </div>
            </div>
            <div class="col-lg-2 col-md-2">
              <!-- if you want to make it offline just remove "online" tag -->
              <div class="info">'.$message["sender_email"].'</div>
            </div>
            <div class="col-lg-2 col-md-2">
            <div class="info" style="font-family: Cairo, sans-serif;">'.$message["sender_heakaya_user_name"].'</div>
            </div>
               <div class="col-lg-2 col-md-2">
            <div class="info" style="font-family: Cairo, sans-serif;">'.$message["message_subject"].'</div>
            </div>
              <div class="col-lg-2 col-md-2"><div class="info" style="font-family: Cairo, sans-serif;">'.$message['message_date'].'</div></div>
            <div class="col-lg-2 col-md-2 text-center">
              <div class="settings-link">
                <a href="show_message.php?id='.$message["id"].'" class="btn">
                 Open
                </a>
              </div>
            </div>
          </div>
    
    
    ';
    
}            
            
            
?>
   
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
    <script>
      $(document).ready(function () {

      });
    </script>
    <!-- end the script -->
  </body>
</html>
