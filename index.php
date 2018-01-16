<?php session_start(); ?>
<?php include "header.php"; ?>

<div class="layer" style="width:100%;height:100vh;z-index:9999;position:fixed"></div>
<span class="result-show" data="no"></span>
 <div class="main-content">

<center>

<h2 class="sentence1"></h2>

</center>



<div class="search-container z-depth-1">

<input type="text" placeholder="<?php echo $search_friend; ?>" class="search-field" />
<div class="search-icon">
<i class="large material-icons">search</i>
</div>


</div>
<div class="results">
<label><?php echo $search_res_lan; ?></label>
<div class="user-result">







</div>
</div>

</div>











<!--  End Work Area  -->
<script src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/<?php echo $js; ?>"></script>
<script type="text/javascript" src="js/typed.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

     $(".button-collapse").sideNav();

});
</script>
<script src="js/wow.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function(){

    Typed.new('.sentence1', {
      strings: ["<?php echo $welcome; ?>"],
      typeSpeed: 1,

    });


});

new WOW().init();
</script>
  </body>
</html>
