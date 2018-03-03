 $(document).on('click', '.video', function() {
        var idVideo = this.id;
        location.replace("play.php");
        $("#mainVideo").load("play/includeExternal.php", {idVideo: idVideo});
});
$(document).on('click', '.video', function() {
        var click = this;
        $("#mainVideo").load("play/includeExternal.php", {click: click});
});