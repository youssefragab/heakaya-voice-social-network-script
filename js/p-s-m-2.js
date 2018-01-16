$(function () {

  var finame = a3f5v6h7.toString(CryptoJS.enc.Utf8);
  var audio = new Audio("../rv6cd464l499gIh5tSoesGzm4d2wAgy4VQi2F3eAZ2k/" + finame);
$("#play").click(function () {
audio.play();
$(".avatar").show();
$("#play").hide();
$("#resume").show();

});

$(".avatar-listen").click(function () {
audio.pause();
$(".avatar-listen").css("display","none");
$("#play").show();
$("#resume").hide();
});
audio.addEventListener("ended", function(){
     audio.currentTime = 0;
     $(".avatar-listen").css("display","none");
     $("#play").show();
     $("#resume").hide();
});

});
