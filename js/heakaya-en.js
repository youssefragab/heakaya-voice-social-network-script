$(document).ready(function(){function d(a){$(function(){e(),$(".record-hover").attr("clicked","yes"),$(".stoprecord").show(),$(".avatar").show(),$(".record-hover").hide(),$(".record").hide(),$(".guide").text("\u062c\u0627\u0631\u064a \u0627\u0644\u062a\u0633\u062c\u064a\u0644...\u0627\u0636\u063a\u0637 \u0639\u0644\u064a \u0627\u0644\u0627\u064a\u0642\u0648\u0646\u0629 \u0644\u0644\u062a\u0648\u0642\u0641")});var d=b.createMediaStreamSource(a);c=new Recorder(d,{numChannels:1})}function e(){c&&c.record()}function f(){c&&c.stop(),g(),c.clear()}function g(){c&&c.exportWAV(function(){})}$(".language").click(function(){$(".language-panel").toggle()}),$(".language-panel ul li").mouseenter(function(){$(".language-panel ul li").removeClass("active-language"),$(this).addClass("active-language")}),$(".language-panel").mouseleave(function(){$(this).hide()}),setTimeout(function(){$(".social1").animate({top:"0px"}),$(".login1").show(),$(".register1").show()},3e3),$(".user-home").css("display","none"),$(".user-share-link").css("display","none"),$(".profile").click(function(){$(".user-home").css("display","block"),$(".user-share-link").css("display","block"),$(".messages-container").animate({right:"-100%"}),$(".messages-container").css("display","none"),$(".user-home").animate({left:"0%"}),$(".user-share-link").animate({left:"0%"}),$(".container-home").css("padding","0")}),$(".my-messages").click(function(){$(".user-home").animate({left:"-100%"}),$(".user-share-link").animate({left:"-100%"}),$(".user-home").css("display","none"),$(".user-share-link").css("display","none"),$(".messages-container").css("display","block"),$(".messages-container").animate({right:"0%"})}),$(".record").mouseenter(function(){$(this).hide(),$(".record-hover").show()}),$(".record-hover").mouseleave(function(){$(this).hide(),"no"==$(this).attr("clicked")&&$(".record").show()});var b,c;$(function(){$(".record-hover").click(function(){try{window.AudioContext=window.AudioContext||window.webkitAudioContext,navigator.getUserMedia=navigator.getUserMedia||navigator.webkitGetUserMedia||navigator.mozGetUserMedia||navigator.msGetUserMedia,window.URL=window.URL||window.webkitURL,b=new AudioContext}catch(a){alert("No web audio support in this browser!")}navigator.getUserMedia({audio:!0},d,function(){$(".guide").text("\u0642\u0645 \u0628\u0627\u0644\u0633\u0645\u0627\u062d \u0644\u0635\u0644\u0627\u062d\u064a\u0629 \u0627\u0644\u0648\u0644\u0648\u062c \u0644\u0644\u0645\u064a\u0643\u0631\u0648\u0641\u0648\u0646 \u0644\u0644\u0645\u062a\u0627\u0628\u0639\u0629")})}),$(".avatar").click(function(){f()})}),$(".editaccount").click(function(){var a=$(".user-name").val(),b=$(".name").val(),c=$(".country").val();$.ajax({url:"editaccount_proccess.php",type:"post",data:{username:a,name:b,country:c},success:function(a){"\u062a\u0645 \u062a\u062d\u062f\u064a\u062b \u0627\u0644\u0645\u0639\u0644\u0648\u0645\u0627\u062a \u0628\u0646\u062c\u0627\u062d"==a?($(".error-report img").attr("src","../images/true-icon.png"),$(".account-info-container").css("paddingTop","0"),$(".error-report").show(),$(".error-report span").text(a),$("body,html").animate({scrollTop:"0"})):($(".account-info-container").css("paddingTop","0"),$(".error-report").show(),$(".error-report span").text(a),$("body,html").animate({scrollTop:"0"}))}})}),$(".con").remove(),$(".yes").click(function(){var a=$("#code").val(),b=$("#username").val(),c=$(this).attr("data"),d=$("#enc").val();$.ajax({url:"soundeffectoptions_proccess.php",type:"post",data:{effect:c,code:a,bonnor:d},success:function(){window.location="proceed/"+b+"/"+a}})}),$(".updatepassword").click(function(){var a=$(".old-password").val(),b=$(".new-password").val(),c=$(".confirm-new-password").val();$.ajax({url:"changepassword_proccess.php",type:"post",data:{oldpassword:a,newpassword:b,confirmpassword:c},success:function(a){"\u062a\u0645 \u062a\u062d\u062f\u064a\u062b \u0627\u0644\u0645\u0639\u0644\u0648\u0645\u0627\u062a \u0628\u0646\u062c\u0627\u062d"==a?($(".error-report img").attr("src","../images/true-icon.png"),$(".account-info-container").css("paddingTop","0"),$(".error-report").show(),$(".error-report span").text(a),$("body,html").animate({scrollTop:"0"})):($(".account-info-container").css("paddingTop","0"),$(".error-report").show(),$(".error-report span").text(a),$("body,html").animate({scrollTop:"0"}))}})}),$(".cancel").click(function(){var a=document.getElementById("user").value;window.location="../../u/"+a})}),$(".search-container input").focus(function(){$(".language-click").hide(),$(".search-container").css("min-height","51px"),$(".search-container").css("background-color","white"),$(".search-container").removeClass("z-depth-2"),$(".search-icon i").css("color","#ed2553"),$(".sentence1").addClass("animated bounceOut"),$(".search-container").css("position","relative"),$(".search-container").animate({top:"-175px"})}),$(".search-container input").focusout(function(){"yes"==$(".result-show").attr("data")||($(".results").animate({top:"-600px"}),$(document).width()<800&&$(".language-click").show(),$(".search-container").css("min-height","52px"),$(".search-container").css("background-color","#ed2553"),$(".search-container").addClass("z-depth-1"),$(".search-icon i").css("color","white"),$(".search-container").css("position","relative"),$(".search-container").animate({top:"0px"},function(){$(".sentence1").removeClass("animated bounceOut"),$(".sentence1").addClass("animated bounceIn")}))}),$(".language-click").click(function(){"no"==$(".l-state").attr("visible")?($(".language-icon").animate({bottom:0},100),$(".l-state").attr("visible","yes")):($(".language-icon").animate({bottom:"-90px"},100),$(".l-state").attr("visible","no"))}),$(".layer").click(function(){"yes"==$(".result-show").attr("data")&&($(".layer").hide(),$(".results").animate({top:"-600px"}),$(document).width()<800&&$(".btn-floating.btn-large").show(),$(".search-container").css("min-height","52px"),$(".search-container").css("background-color","#ed2553"),$(".search-container").addClass("z-depth-1"),$(".search-icon i").css("color","white"),$(".search-container").css("position","relative"),$(".search-container").animate({top:"0px"},function(){$(".sentence1").removeClass("animated bounceOut"),$(".sentence1").addClass("animated bounceIn")}))}),$(document).width()<800&&($(".focus").focus(function(){$(".language-click").hide()}),$(".focus").focusout(function(){$(".language-click").show()})),$(".button-collapse").show(),$(document).width()>768&&$(".button-collapse i").css("marginLeft","25px"),$(".search-field").keyup(function(){if(0==$(this).val().length)$(".results").hide(),$(".result-show").attr("data","no"),$(".layer").hide();else if($(this).val().length>1){$(".results").css("top","-178px"),$(".results").show(),$(".result-show").attr("data","yes"),$(".layer").show(),$(".language-click").hide();var a=$(this).val();$.ajax({url:"search_users.php",type:"post",data:{username:a},success:function(a){$(".user-result").html(a)}})}}),$(".open-message").click(function(){var a=$(this).attr("data");window.location="../message/"+a}),$(".share-message").click(function(){var a=$(this).attr("data");$(".over-layer").show(),$(".share-generate").show(),$.ajax({url:"share_message_proccess.php",type:"post",data:{mc:a},success:function(a){setTimeout(function(){$(".share-generate").hide(),$(".share-r").show(),$(".share-r span").text(a)},3e3)}})}),$(".over-layer").click(function(){$(this).hide(),$(".share-generate").hide(),$(".share-r").hide()}),$(".delete-account").click(function(){$(".over-layer").fadeIn(),$(".confirm-delete").animate({top:"7px"})}),$(".over-layer").click(function(){$(this).fadeOut(),$(".confirm-delete").animate({top:"-100%"})}),$(".return").click(function(){$(".over-layer").fadeOut(),$(".confirm-delete").animate({top:"-100%"})}),$(".delete-my-account").click(function(){$("#form").submit()}),$(".update-privacy").click(function(){var a=$(".privacy").val();$.ajax({url:"privacy_proccess.php",type:"post",data:{privacy:a},success:function(a){"\u062a\u0645 \u062a\u062d\u062f\u064a\u062b \u0627\u0644\u0645\u0639\u0644\u0648\u0645\u0627\u062a \u0628\u0646\u062c\u0627\u062d"==a?($(".error-report img").attr("src","../images/true-icon.png"),$(".account-info-container").css("paddingTop","0"),$(".error-report").show(),$(".error-report span").text(a),$("body,html").animate({scrollTop:"0"})):($(".account-info-container").css("paddingTop","0"),$(".error-report").show(),$(".error-report span").text(a),$("body,html").animate({scrollTop:"0"}))}})}),$(".list-side").css("float","left"),$(".side-nav i").css("left","10px"),$(".side-nav li").css("text-align","left"),$(".side-nav a").css("padding-left","22px"),$(".sp-2").css("position","relative"),$(".sp-2").css("top","2px"),$(".lan").css("top","12px"),$(".lan").css("left","auto"),$(".lan").css("right","75px"),$(".lan").css("top","21px"),$(".back").css("left","auto"),$(".back").css("right","15px"),$(".file").change(function(){$("#message-upload-icon").removeClass("fa fa-upload"),$("#message-upload-icon").addClass("fa fa-check"),$(".file-upload").css("border","4px solid #FFFFFF"),$(".file-upload").css("background-position","0 200%"),$(".file-upload").css("color","white"),setTimeout(function(){$("#message-up").submit()},1100)});
