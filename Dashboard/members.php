<?php

include "init/config.php";
$members_query = "select * from tablefor_users";
$execute = mysqli_query($db,$members_query);

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
        <li class="active">
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
            <div class="col-lg-5 col-md-4"><span>Name</span></div>
            <div class="col-lg-2 col-md-2"><span>State</span></div>
              <div class="col-lg-2 col-md-2"><span>Coutry</span></div>
              <div class="col-lg-2 col-md-2"><span>Gender</span></div>
            <div class="col-lg-1 col-md-2 text-center"><span style="margin-left:-20px">Messages</span></div>
          </div>
        </div>
        <div class="table-body">
<?php
            
while ($member = mysqli_fetch_assoc($execute)) {
    if ($member["account_statue"] == "active") {
        $active = "online";
    }else {
        $active = "";
    }
    echo '
    
              <div class="row">
            <div class="col-lg-5 col-md-4">
              <div class="sounds-play-now">
                <h4><span style="font-family: Cairo, sans-serif;">'.$member["thisis_name"].'</span> - @'.$member["thisisuser_name"].'</h4>
              </div>
            </div>
            <div class="col-lg-2 col-md-2">
              <!-- if you want to make it offline just remove "online" tag -->
              <span class="state-box '.$active.'">'.$member["account_statue"].'</span>
            </div>
            <div class="col-lg-2 col-md-2">
            <div class="info" style="font-family: Cairo, sans-serif;">'.$member["thisisuser_country"].'</div>
            </div>
              <div class="col-lg-2 col-md-2"><div class="info" style="font-family: Cairo, sans-serif;">'.$member['thisisuser_gender'].'</div></div>
            <div class="col-lg-1 col-md-2 ">
              <div class="settings-link">
             
                  <div class="info">'.$member['received_conffes'].'</div>
               
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

      });
    </script>
    <!-- end the script -->
  </body>
</html>
