$(document).ready(function() 
 {
		var commentNew = 0;
    $(document).on('click', '.btn_more', function() { 
        commentNew = commentNew + 2;
        $("#box").load("comments/load-comments.php",{
            commentNewto: commentNew
        });
    });
});


$(document).ready(function() 
 {
 	$("#form-set").submit(function(event)
 	{
 		event.preventDefault();
 		var message = $("#commentMessage").val();
 		var nickname = $("#nickname").val();
 		var date = $("#date").val();
 		var idVideo = $("#idVideo").val();
 		var submit = $("#commentButton").val();
 		$("#form-message").load("comments/setComment.php", {
 			message: message,
 			submit: submit,
 			nickname: nickname,
 			idVideo: idVideo,
 			date: date
 		});
 	});
});


// var modal = document.getElementById('myModal');
// var pic = document.getElementById('addTo');
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks the button, open the modal
// var action = 1;
// pic.onclick= function(){
//   if(action==1){
//     document.getElementById("result").innerHTML = "";
//     modal.style.display = "block";
//     action = 2;
//   }
//   else{
//     modal.style.display = "none";
//     action=1;
//   }
// };
  
// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//     modal.style.display = "none";

// }

// //When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";

//     }
// }

$(document).ready(function(){


  //Avoid hide guys by footer when scrollin
    $(window).scroll(function checkOffset() {

        if($('.menu').offset().top + $('.menu').height()
                                               >= $('.footer').offset().top - 0){
            $('.menu').css('bottom', '10%');

          }
        if($(document).scrollTop() + window.innerHeight < $('.footer').offset().top)
            $('.menu').css('bottom', 'auto'); // restore when you scroll up
    });

    //Menu animations
      $("#boy1").mouseover(function(){
        if ($(this).css('opacity') != '1'){
            $(this).animate({'opacity':1});
          }
      });
      var action = 1;
      $("#boy1").click(function(){
        if(action==1){
            $("#home").css("visibility","visible");
            $(this).animate({'opacity':1});
            action = 2;
        }
        else{
          $("#home").css("visibility","hidden");
          $(this).animate({'opacity':0.5});
          action=1;
        }
      });

      $("#boy1").mouseout(function(){
        if ($(this).css('opacity') == '1'){
            $(this).animate({'opacity':0.5});
            setTimeout(function () {
              $("#home").css("visibility","hidden");
        },2500);
        }
      });

      $("#boy2").mouseover(function(){
        if ($(this).css('opacity') != '1'){
            $(this).animate({'opacity':1});
          }
      });
      var action = 1;
      $("#boy2").click(function(){
        if(action==1){
            $("#help").css("visibility","visible");
            $(this).animate({'opacity':1});
            action = 2;
        }
        else{
          $("#help").css("visibility","hidden");
          $(this).animate({'opacity':0.5});
          action=1;
        }
      });

      $("#boy2").mouseout(function(){
        if ($(this).css('opacity') == '1'){
            $(this).animate({'opacity':0.5});
            setTimeout(function () {
              $("#help").css("visibility","hidden");
        },2500);
        }
      });

      $("#girl").mouseover(function(){
        if ($(this).css('opacity') != '1'){
            $(this).animate({'opacity':1});
          }
      });
      var action = 1;
      $("#girl").click(function(){
        if(action==1){
            $("#list").css("visibility","visible");
            $(this).animate({'opacity':1});
            action = 2;
        }
        else{
          $("#list").css("visibility","hidden");
          $(this).animate({'opacity':0.5});
          action=1;
        }
      });

      $("#girl").mouseout(function(){
        if ($(this).css('opacity') == '1'){
            $(this).animate({'opacity':0.5});
            setTimeout(function () {
              $("#list").css("visibility","hidden");
        },2500);
          }
      });

  $("#menu").click(function(){
    if ($(".person").css('opacity') == '1'){
        $(".person").animate({'opacity':0.5})
        $(".option").css("visibility","hidden");
      }
      else{
        $(".person").animate({'opacity':1})
        $(".option").css("visibility","visible");
      }
  });


  //Search bar hide when stopping mouse movement
  var timeout = null
$(document).on('mousemove', function() {
  if (timeout !== null) {
     $('.search-container').show();
      clearTimeout(timeout);
  }

  timeout = setTimeout(function() {
       $('.search-container').hide();
       $(".person").animate({'opacity':0.5});
      $(".option").css("visibility","hidden");
  }, 6000);
});
});
