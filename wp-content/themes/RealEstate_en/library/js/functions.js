$(document).ready(function(){
    
    $("a.switch_thumb").toggle(function(){
        $(this).removeClass("swap");
        $("ul.display").fadeOut("fast", function() {
            $(this).fadeIn("fast").addClass("thumb_view");
        });
    }, function () {
        $(this).addClass("swap");
        $("ul.display").fadeOut("fast", function() {
            $(this).fadeIn("fast").removeClass("thumb_view");
        });
    });

});