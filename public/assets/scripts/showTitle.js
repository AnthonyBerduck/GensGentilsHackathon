$(document).ready(function(){
    $("div button").hover(
        function(){$(this).siblings("h3:first").show();},
        function(){$(this).siblings("h3:first").hide();}
    );
});