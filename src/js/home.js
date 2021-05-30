
$(document).ready(function(){
    //abrimos la pastilla, despeus de que la imagen inicial se muestre (1s)
    console.log(getUrlParameter('skip'));
    if(!getUrlParameter('skip')){
   
 

        setTimeout(function() { 
            $(".animated-screen .pastilla").addClass("open");
        }, 1000);
        // a mitad de animacion de abrir la pastilla (1.5s), abrimos la imagen interior de la pastilla con la misma duracion y velocidad
        setTimeout(function() { 
            $(" .animated-screen .pastilla img").addClass("open");
        }, 1500);

        //cuando un 75% de la imagen interior es visible (2.25s) se anima la imagen superpuesta
        setTimeout(function() { 
            $(".message").addClass("visible");
        }, 2250);

        //al acabar los efectos de la imagne superpuesta (3.25 + 0.50 espera), hacemos subir y desaparecer los elementos de la pantalla animada
        setTimeout(function() { 
            $(".message, .animated-screen .pastilla, .animated-screen svg").addClass("upped");
        }, 3750);
        
        //al acabar los efectos de la imagne superpuesta (3.25 + 0.75 espera), hacemos subir y desaparecer la pantalla animada, 
        
        setTimeout(function() { 
            $(".animated-screen").addClass("finished");
        }, 4000);

        //al acabar los efectos, cambiamos el scroll a body y hacemos desaparecer la pantallla al acabar
        setTimeout(function() { 
            $("header").addClass("header-fixed");
            $("body").removeClass("noscroll");
            $(".animated-screen").addClass("d-none");
            $(".header-opener").addClass("visible");
        }, 5000);
    }
    else{
        $("header").addClass("header-fixed");
        $("body").removeClass("noscroll");
        $(".animated-screen").addClass("d-none");
        $(".header-opener").addClass("visible");
        $("#home-video").css('animation-delay','1s');
    }

    var $video = $('#home-video');
    var $text = $('#titols-home');


    var mq_mobile = window.matchMedia( "(max-width: 768px)" );

    //skip animation
    $('.animated-screen svg, .animated-screen .pastilla, .animated-screen .message').click(function(){
        
        $("header").addClass("header-fixed");
        $("body").removeClass("noscroll");
        $(".animated-screen").addClass("d-none");
        $(".header-opener").addClass("visible");
        $("#home-video").css('animation-delay','1s');
        
    });
    
    /*
    if(!mq_mobile.matches){

        setTimeout(function() { 
            var mq = window.matchMedia( "(max-width: 1024px)" );
            if(mq.matches){
                $video.css({ 'transform': 'translateX(60%)' });

            }
            else{
                $video.css({ 'transform': 'translateX(75%)' });

            }
            $text.css({ 
                'opacity': '1',
                'filter' : 'blur(0px)'
            });
        }, 8000);
    }
*/
    $(window).scroll(function () {
        //var st = $(this).scrollTop();
        //console.log("st: " + st);
        //if (st == 0) {
        
        var mq_mobile = window.matchMedia( "(max-width: 768px)" );
        if(!mq_mobile.matches){
           
      
            if(!window.pageYOffset){
                
                $video.css({ 'transform': 'translateX(0%)' });
                $text.css({ 
                    'opacity': '0',
                    'filter' : 'blur(15px)'
                });
                
            } else {

                var mq = window.matchMedia( "(max-width: 1024px)" );

                if(mq.matches){
                    $video.css({ 'transform': 'translateX(60%)' });
                }
                else{
                    $video.css({ 'transform': 'translateX(75%)' });
                }




            // $video.css({ 'transform': 'translateX(75%)' });
                $text.css({ 
                    'opacity': '1',
                    'filter' : 'blur(0px)'
                });
            }
        }


        $(".fadeInUp").each(function(index){
            if( isScrolledIntoView($(this)) && !$(this).hasClass("animated")){
                $(this).addClass("wpb_start_animation animated");
            }
       });
    });


    $(window).scroll(function () {
        $(".producte-item").each(function(index){
            if( isScrolledIntoView($(this)) && !$(this).hasClass("open") && $(".site-header").hasClass("header-fixed")){
                $(this).find(".pastilla").addClass("open");
                var elem = $(this);
                setTimeout(function () {

                    elem.find(".imagen").addClass("open");
                    
               
                    
                }, 1000);
            }
       });
       $(".hiden-until-scroll").each(function(index){
            if( isScrolledIntoView($(this)) && !$(this).hasClass("open")){
                $(this).addClass("open");
            }
       });
      
    });

    $(window).on("load scroll resize", function() {
        var parallaxElement = $("  .cataleg-row .producte-item .content-item, .cataleg-row .producte-item .content-item .numeral, .container-img-home >.vc_col-md-7 img, .nosaltres-home img, .blog-home img "),
        parallaxQuantity = parallaxElement.length;
        window.requestAnimationFrame(function() {
            for (var i = 0; i < parallaxQuantity; i++) {
                var currentElement = parallaxElement.eq(i),
                windowTop = $(window).scrollTop(),
                elementTop = currentElement.offset().top,
                elementHeight = currentElement.height(),
                viewPortHeight = window.innerHeight * 0.5 - elementHeight * 0.5,
                scrolled = windowTop - elementTop + viewPortHeight;
                var mq = window.matchMedia( "(max-width: 768px)" );
                var speed_parallax = -0.15;

                if(currentElement.hasClass(".content-item")){
                    var speed_parallax = -0.25;
                }
                if(currentElement.hasClass(".numeral")){
                    var speed_parallax = -0.10;
                }
                if (!mq.matches) {
                    currentElement.css({
                        transform: "translate3d(0," + scrolled * speed_parallax + "px, 0)"
                    });
                }
                else{
                    currentElement.css({
                        transform: "translate3d(0," + scrolled * 0 + "px, 0)"
                    });
                }

            } 
        });


    });

});

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};