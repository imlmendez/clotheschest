var id, target, option;

function success(pos) {
  var crd = pos.coords;

  if (target.latitude === crd.latitude && target.longitude === crd.longitude) {
    console.log('Congratulation, you reach the target');
    navigator.geolocation.clearWatch(id);
  }
};

function error(err) {
  console.warn('ERROR(' + err.code + '): ' + err.message);
};

target = {
  latitude : 0,
  longitude: 0,
}

options = {
  enableHighAccuracy: false,
  timeout: 5000,
  maximumAge: 0
};

id = navigator.geolocation.watchPosition(success, error, options);
Notification.requestPermission().then(function(permission) { console.log('permiss', permission)});


window.addEventListener('beforeunload', function(event) {
    console.log('I am the 1st one.');
  });
  window.addEventListener('unload', function(event) {
    console.log('I am the 3rd one.');
  });

  
$(document).ready(function(){
    header_handler();
    





    const myInput = document.getElementById('myInput');
    myInput.onpaste = e => e.preventDefault();





    toggleMenu();
    $(window).resize(function() {
        toggleMenu();
    });

    //change h4 for p in cookies popup
    $('.ct-ultimate-gdpr-cookie-modal-slider-desc p').each(function(){
        $(this).addClass('title-sections');
    });
});

function toggleMenu(){
    var media_mobile = window.matchMedia("(max-width: 991px)");
    if(media_mobile.matches){
        if (!$('.m-mobile').hasClass('show')){
            $('.m-mobile').addClass('show');
        }
        if($('.m-desktop').hasClass('show')){
            $('.m-desktop').removeClass('show');
        }
    }else{
        if ($('.m-mobile').hasClass('show')){
            $('.m-mobile').removeClass('show');
        }
        if(!$('.m-desktop').hasClass('show')){
            $('.m-desktop').addClass('show');
        }
    }
}

function header_handler(){
    $(".lang span").click(function(){
        $(".lang").addClass("visible");
        setTimeout(function(){
            $(".lang").removeClass("visible");
        },5000);
    });
    $(".seguir span").click(function(){
        $(".seguir a").addClass("visible");
        setTimeout(function(){
            $(".seguir a").removeClass("visible");
        },5000);
    });
}


function isScrolledIntoView(el) {
    var rect = el.getBoundingClientRect();
    var elemTop = rect.top;
    var elemBottom = rect.bottom;

    // Only completely visible elements return true:
    var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
    // Partially visible elements return true:
    //isVisible = elemTop < window.innerHeight && elemBottom >= 0;
    return isVisible;
}