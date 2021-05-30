$(document).ready(function(){
    setTimeout(function(){
        $(".img-404 svg:first-child").addClass("show");
    },500);
    setTimeout(function(){
        $(".img-404 svg:nth-child(3)").addClass("show");
    },1000);
    setTimeout(function(){
        $(".img-404 img").addClass("show");
        $(".texto-404").addClass("show");
    },1500);
});
