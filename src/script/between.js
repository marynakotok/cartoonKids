$(document).on('click', '.video', function() {
        var idVideo = this.id;
        $("#mainVideo").load("play/include.php", {idVideo: idVideo});
});

//  $(document).on('click', '#likes', function() {
//  	    // var video = $("#mainV");
//       //   var srcVideo = video.src;
//       //   alert(srcVideo);
//         //$("#mainVideo").load("play/include.php", {idVideo: idVideo});
// });
// $(document).on('click', '#dislikes', function() {
//  	    // var video = $("#mainV");
//       //   var srcVideo = video.src;
//       //   alert(srcVideo);
//         //$("#mainVideo").load("play/include.php", {idVideo: idVideo});
// });
//  $(document).on('click', '#sharing', function() {
//  	    // var video = $("#mainV");
//       //   var srcVideo = video.src;
//       //   alert(srcVideo);
//         //$("#mainVideo").load("play/include.php", {idVideo: idVideo});
// });
$(document).on('click', '#addTo', function() {
 	    // var video = $("#mainV");
      //   var srcVideo = video.src;
      //   alert(srcVideo);
        //$("#mainVideo").load("play/include.php", {idVideo: idVideo});
});

var music = new Audio("../img/yes.wav");
var like=0;
var dislike=0;
var view = 0;

$(document).on('click', '#like', function() {
        like++;
        $("#likes").html(like);
        music.play();
});
$(document).on('click', '#view', function() {
        view++;
        $("#views").html(view);
        music.play();
});

$(document).on('click', '#dislike', function() {
        dislike++;
        $("#dislikes").html(dislike);
        music.play();
});


